<?php
      $produk = [
        [
          "nama" => "Jenang",
          "harga" => 25000,
          "gambar" => "img/cemilan1.jpg",
          "kategori" => "cemilan"
        ],
        [
          "nama" => "Kue Cucur",
          "harga" => 20000,
          "gambar" => "img/cemilan2.jpg",
          "kategori" => "cemilan"
        ],
        [
          "nama" => "Wajik",
          "harga" => 30000,
          "gambar" => "img/cemilan3.jpg",
          "kategori" => "cemilan"
        ],
        [
          "nama" => "Gethuk",
          "harga" => 35000,
          "gambar" => "img/cemilan4.jpg",
          "kategori" => "cemilan"
        ],
        [
          "nama" => "Mendoan",
          "harga" => 15000,
          "gambar" => "img/cemilan5.jpg",
          "kategori" => "cemilan"
        ],
        [
          "nama" => "ES Dawet Ayu",
          "harga" => 18000,
          "gambar" => "img/minuman1.jpg",
          "kategori" => "minuman"
        ],
        [
          "nama" => "Es Dawet Ireng",
          "harga" => 18000,
          "gambar" => "img/minuman2.jpg",
          "kategori" => "minuman"
        ],
        [
          "nama" => "Wedang Ronde",
          "harga" => 15000,
          "gambar" => "img/minuman3.jpg",
          "kategori" => "minuman"
        ]
      ];

      ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warung Jateng Bite</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Concert+One&family=Libertinus+Serif:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Special+Elite&display=swap" rel="stylesheet">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <h1>Warung Jateng Bite</h1>
  </nav>

  <!-- HOME -->
  <section id="home" class="home">
    <h2>Selamat Datang di Warung Jawa Tengah Bite</h2>
    <p>Menikmati gigitan lezat khas Jawa Tengah</p>
    <div class="filter-btn">
      <button onclick="filterProduk('semua')">Tampilkan Semua</button>
      <button onclick="filterProduk('cemilan')">Makanan</button>
      <button onclick="filterProduk('minuman')">Minuman</button>
    </div>
  </section>
  
  
    <div class="card-container" id="daftarProduk">
      <?php
      foreach ($produk as $p) {
        echo "
        <div class='card' data-kategori='{$p['kategori']}'>
          <img src='{$p['gambar']}' alt='{$p['nama']}'>
          <h3>{$p['nama']}</h3>
          <p class='harga'>Harga: Rp " . number_format($p['harga'], 0, ',', '.') . "</p>
          <button onclick='tambahKeranjang(\"{$p['nama']}\", {$p['harga']})'>Tambah ke Keranjang</button>
        </div>
        ";
        }
      ?>
    </div>
    

  <!-- KERANJANG -->
  <section id="keranjang" class="keranjang">
    <h2>Keranjang Belanja</h2>
    <table id="tabelKeranjang">
      <tbody>
        <!-- Data keranjang akan muncul di sini lewat JavaScript -->
      </tbody>
    </table>

    <div class="total-belanja">
      <h3>Total Belanja: Rp <span id="totalBelanja">0</span></h3>
      <button onclick="checkout()">Checkout</button>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <p>&copy; 2025 Warung Jateng Bite</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="script.js"></script>

</body>
</html>
