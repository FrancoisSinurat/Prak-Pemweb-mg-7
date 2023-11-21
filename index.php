<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftarab Mahasiswa</title>
</head>
<body>
    <h2>Formulir Pendaftaran Mahasiswa</h2>
    <form action="proses_form.php" method="post">
        <label for="nama">Nama Mahasiswa:</label>
        <input type="text" name="nama" required>

        <label for="harga">NIM:</label>
        <input type="number" name="nim" required>

        <label for="program_studi">Program Studi:</label>
        <select name="program_studi" id="program_studi">
            <?php
                // Koneksi ke database
                $koneksi = mysqli_connect("localhost", "root", "", "prodi");

                // Periksa koneksi
                if (mysqli_connect_errno()) {
                    die("Koneksi database gagal: " . mysqli_connect_error());
                }
                // ambil data form
               global $data_mhs;
                function tambahProduk($nama, $nim) {
                $data_mhs[] = array('nama' => $nama, 'nim' => $nim);
    }
                // Ambil data program studi dari database
                $query = "SELECT * FROM program_studi";
                $result = mysqli_query($koneksi, $query);

                // Tampilkan sebagai pilihan dalam dropdown
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value=\"{$row['id']}\">{$row['nama_program_studi']}</option>";
                }

                // Tutup koneksi
                mysqli_close($koneksi);
            ?>
            <br>
        </select>
        <input type="submit" value="Submit">
        <br>
    </form>
    <style>
        body {
            width: 80%;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-left: 30px;
            padding-right: 30px;
        }
        form {
            justify-content:center;
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-top:10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        select{
        padding : 10px;
        background-color:light blue;

        }
    </style>
</body>
</html>

