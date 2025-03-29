<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Status Transaksi</title>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 flex justify-center items-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
        <h1 class="text-xl font-bold text-gray-800 mb-4">Status Transaksi</h1>
        <p class="text-gray-600"><strong>Kode Transaksi:</strong> {{ $transaction->transaction_code }}</p>
        <p class="text-gray-600"><strong>Nama:</strong> {{ $transaction->name }}</p>
        <p class="text-gray-600"><strong>Email:</strong> {{ $transaction->email }}</p>
        <p class="text-gray-600"><strong>Item:</strong> {{ $transaction->title }}</p>
        <p class="text-gray-600"><strong>Harga:</strong> Rp{{ number_format($transaction->amount, 0, ',', '.') }}</p>
        <p class="font-semibold mt-2 text-lg">
            <strong>Status:</strong> 
            <span class="{{ $transaction->status == 'pending' ? 'text-yellow-500' : ($transaction->status == 'SUCCESSFUL' ? 'text-green-500' : 'text-red-500') }}">
                {{ ucfirst($transaction->status) }}
            </span>
        </p>
        
        @if($transaction->status == 'pending')
            <p class="mt-4 text-sm text-gray-500">Silakan selesaikan pembayaran:</p>
            <a href="https://{{ $transaction->link_url }}" target="_blank" class="block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-2">Bayar Sekarang</a>
        @elseif($transaction->status == 'SUCCESSFUL')
            <p class="mt-4 text-green-500 font-semibold">✅ Transaksi berhasil!</p>
        @else
            <p class="mt-4 text-red-500 font-semibold">❌ Transaksi gagal.</p>
        @endif
        
        <a href="{{ route('main') }}" class="block bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mt-4">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
