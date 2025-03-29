<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Items;
use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Str;
use function Pest\Laravel\withHeader;

class GoodsController extends Controller
{
    public function showGames()
    {
        $games = Games::all();
        return view('main', compact('games'));
    }

    public function showItem($id)
    {
        $game = Games::findOrFail($id);
        $items = Items::where('games_id', $id)->get();
        return view('items.index', compact('game', 'items'));
    }

    public function order(Request $request)
    {
        $item_order = Items::findOrFail($request->item_id);

        $transaction_code = 'MT' . time() . \Illuminate\Support\Str::random(5);

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(env('FLIP_SECRET_KEY') . ':'),
            'Content-Type' => 'x-www-form-urlencoded',
            'Accept' => 'application/json',
        ])->asForm()->post('https://bigflip.id/big_sandbox_api/v2/pwf/bill', [
            'title' => $item_order->name,
            'type' => 'SINGLE',
            'amount' => $item_order->price,
            'redirect_url' => env('APP_URL') . '/transaction/' . $transaction_code,
            'step' => 2,
            'sender_name' => $request->name,
            'sender_email' => $request->email,
        ]);

        $data = $response->json();

        $transaction = Transactions::create([
            'transaction_code' => $transaction_code,
            'link_id' => $data['link_id'],
            'title' => $item_order->name,
            'amount' => $item_order->price,
            'name' => $request->name,
            'email' => $request->email,
            'link_url' => $data['link_url'],
        ]);

        if ($response->successful() && isset($data['link_url'])) {
            return redirect()->away('/transaction/' . $transaction_code);
        }

        return response()->json($data, 500);
    }

    public function showTransaction($transaction_code)
    {
        $transaction = Transactions::where('transaction_code', $transaction_code)->first();

        if (!$transaction) {
            abort(404, 'Transaction Not Found');
        }

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(env('FLIP_SECRET_KEY') . ':'),
            'Accept' => 'application/json'
        ])->get("https://bigflip.id/big_sandbox_api/v2/pwf/{$transaction->link_id}/payment");

        $data = $response->json();

        if ($response->successful() && isset($data['data'][0]['status'])) {
            $transaction->status = $data['data'][0]['status'];
            $transaction->save();
        }

        return view('transactions.show', compact('transaction'));
    }

    public function showAllTransactions()
    {
        $transactions = Transactions::orderBy('created_at', 'desc')->take(10)->get();
        return view('transactions.index', compact('transactions'));
    }
}
