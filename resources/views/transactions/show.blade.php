<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Transaksi</title>
</head>
<body>
    <h1>Status Transaksi</h1>
    <p><strong>Kode Transaksi:</strong> {{ $transaction->transaction_code }}</p>
    <p><strong>Nama:</strong> {{ $transaction->name }}</p>
    <p><strong>Email:</strong> {{ $transaction->email }}</p>
    <p><strong>Item:</strong> {{ $transaction->title }}</p>
    <p><strong>Harga:</strong> Rp{{ number_format($transaction->amount, 0, ',', '.') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($transaction->status) }}</p>
    
    @if($transaction->status == 'pending')
        <p>Silakan selesaikan pembayaran:</p>
        <a href="https://{{ $transaction->link_url }}" target="_blank"><button>Bayar Sekarang</button></a>
    @elseif($transaction->status == 'SUCCESSFUL')
        <p style="color: green;">✅ Transaksi berhasil!</p>
    @else
        <p style="color: red;">❌ Transaksi gagal.</p>
    @endif
    
    <a href="{{ route('main') }}"><button>Kembali Ke halaman Utama</button></a>
</body>
</html>
