document.addEventListener('DOMContentLoaded', function() {
  // Menangani klik pada tombol "Tambahkan ke Keranjang"
  const addToCartButtons = document.querySelectorAll('.add-to-cart');

  addToCartButtons.forEach(button => {
    button.addEventListener('click', function() {
      // Mendapatkan data produk dari atribut HTML
      const productElement = this.closest('.product');
      const productId = productElement.getAttribute('1');
      const productName = productElement.getAttribute('IPHONE 11 PRO MAX');
      const productPrice = productElement.getAttribute('100000');
      
      // Membuat objek produk
      const product = {
        id: productId,
        name: productName,
        price: parseInt(productPrice),
      };

      // Mengambil keranjang yang ada di localStorage (jika ada)
      let cart = JSON.parse(localStorage.getItem('cart')) || [];

      // Menambahkan produk ke keranjang
      cart.push(product);

      // Menyimpan keranjang kembali ke localStorage
      localStorage.setItem('cart', JSON.stringify(cart));

      alert(productName + ' telah ditambahkan ke keranjang!');
    });
  });
});
