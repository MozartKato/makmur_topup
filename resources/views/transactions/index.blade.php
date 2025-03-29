<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Transaksi</title>
</head>
<body class="bg-gradient-to-r from-blue-500 to-purple-600 min-h-screen text-gray-800">
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold text-gray-800">Makmur TopUp</h1>
            <ul class="flex space-x-6">
                <li><a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-500">Home</a></li>
                <li><a href="{{ route('transactions.index') }}" class="text-gray-700 hover:text-blue-500">Transaksi</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg mx-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Cari Transaksi</h2>
            <form id="transactionForm" class="flex flex-col gap-3">
                <input type="text" id="transaction_code" name="transaction_code" placeholder="Masukkan Kode Transaksi" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-400">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Cari</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('transactionForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let code = document.getElementById('transaction_code').value;
            if (code) {
                window.location.href = "{{ url('/transaction') }}/" + encodeURIComponent(code);
            }
        });
    </script>

    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-semibold text-white mb-6 text-center">Riwayat Transaksi</h2>
        <div class="overflow-x-auto bg-white p-6 rounded-lg shadow-md">
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="p-4">Tanggal</th>
                        <th class="p-4">Kode Transaksi</th>
                        <th class="p-4">Item</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="p-4">{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                            <td class="p-4 font-mono">{{ substr_replace($transaction->transaction_code, '********',2,8) }}</td>
                            <td class="p-4">{{ $transaction->title }}</td>
                            <td class="p-4 font-semibold">Rp{{ number_format($transaction->amount, 0, ',', '.') }}</td>
                            <td class="p-4">
                                <span class="px-3 py-1 rounded text-white {{ $transaction->status == 'SUCCESSFUL' ? 'bg-green-500' : 'bg-yellow-500' }}">
                                    {{ ucfirst($transaction->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
