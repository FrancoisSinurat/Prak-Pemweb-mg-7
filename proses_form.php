<?php
// Ambil nilai program studi dari form
$program_studi_id = $_POST['program_studi'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "prodi");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil nama program studi berdasarkan id
$query = "SELECT nama_program_studi FROM program_studi WHERE id = $program_studi_id";
$result = mysqli_query($koneksi, $query);

// Tampilkan hasil
if ($row = mysqli_fetch_assoc($result)) {
    $nama_program_studi = $row['nama_program_studi'];
    echo "Data yang diinputkan adalah :<br>Nama : $nama <br> NIM : $nim <br>Program Studi : $nama_program_studi";
} else {
    echo "Program studi tidak ditemukan.";
}

// Tutup koneksi
mysqli_close($koneksi);
?>
