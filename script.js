let keranjang = [];

function tambahKeranjang(nama, harga) {
  let produkAda = keranjang.find((p) => p.nama === nama);

  if (produkAda) {
    Swal.fire({
      icon: "warning",
      title: "Produk Sudah Ada!",
      text: "Produk yang kamu pilih sudah ada dalam keranjang!",
      confirmButtonText: "OK",
    });
  } else {
    keranjang.push({ nama, harga });
    tampilKeranjang();

    Swal.fire({
      icon: "success",
      title: "Berhasil!",
      text: `${nama} telah ditambahkan ke keranjang.`,
      timer: 1500,
      showConfirmButton: false,
    });
  }
}

function tampilKeranjang() {
  let tabel = document.querySelector("#tabelKeranjang tbody");
  tabel.innerHTML = "";
  let totalBelanja = 0;

  keranjang.forEach((p, index) => {
    totalBelanja += p.harga;
    let row = `
      <tr>
        <td>${p.nama}</td>
        <td>Rp ${p.harga.toLocaleString("id-ID")}</td>
        <td><button onclick="hapusItem(${index})">Hapus</button></td>
      </tr>
    `;
    tabel.innerHTML += row;
  });

  document.getElementById("totalBelanja").innerText =
    totalBelanja.toLocaleString("id-ID");
}

function hapusItem(index) {
  const nama = keranjang[index].nama;

  Swal.fire({
    title: "Apakah kamu yakin akan menghapus produk ini?",
    text: nama,
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "rgba(247, 7, 7, 1)",
    cancelButtonColor: "#bd8832ff",
    confirmButtonText: "Hapus",
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.isConfirmed) {
      keranjang.splice(index, 1);
      tampilKeranjang();

      Swal.fire({
        icon: "success",
        title: "Terhapus!",
        text: `${nama} telah dihapus dari keranjang.`,
        timer: 1500,
        showConfirmButton: false,
      });
    }
  });
}

// Fungsi checkout
function checkout() {
  if (keranjang.length === 0) {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Keranjang masih kosong!",
    });
  } else {
    Swal.fire({
      icon: "success",
      title: "Terima Kasih!",
      text: "Pesananmu sedang diproses!",
    });
    keranjang = [];
    tampilKeranjang();
  }
}

function filterProduk(kategori) {
  const cards = document.querySelectorAll(".card");
  cards.forEach((card) => {
    if (kategori === "semua" || card.dataset.kategori === kategori) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}

