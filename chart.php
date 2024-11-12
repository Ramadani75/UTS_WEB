<?php
// Mulai sesi untuk menggunakan $_SESSION
session_start();

// Ambil data produk dari localStorage (melalui $_POST atau JSON jika diperlukan)
// Misalnya, Anda bisa mengambil data dari localStorage di sisi server melalui AJAX, tapi kali ini kita anggap Anda sudah mengirimkan data via form atau melalui sesi.

// Ambil data keranjang dari sessionStorage (di sisi klien dengan JavaScript)
// Di sini, kita anggap Anda mengirimkan data keranjang melalui POST atau menyimpannya di sesi PHP.

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
function formatCurrency($amount) {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keranjang Belanja</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Keranjang Belanja</h1>
    <nav>
      <a href="index.html">Kembali ke Toko</a>
      <a href="checkout.php">Checkout</a>
    </nav>
  </header>

  <main>
    <?php if (empty($cart)): ?>
      <p>Keranjang Anda kosong. Silakan tambahkan produk.</p>
    <?php else: ?>
      <table>
        <tr>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
        <?php foreach ($cart as $item): ?>
        <tr>
          <td><?php echo htmlspecialchars($item['name']); ?></td>
          <td><?php echo formatCurrency($item['price']); ?></td>
          <td>
            <form action="cart.php" method="POST">
              <input type="hidden" name="productId" value="<?php echo $item['id']; ?>">
              <button type="submit" name="remove_from_cart">Hapus</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
      </table>
      <h3>Total: <?php echo formatCurrency(array_sum(array_column($cart, 'price'))); ?></h3>
    <?php endif; ?>
  </main>
</body>
</html>
