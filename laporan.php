<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Pelaporan Masalah</title>
    <style>
        /* Gaya dasar */
        body {
            font-family: 'Arial, sans-serif';
            background-color: #5C5470; /* Warna latar belakang pastel kuning */
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            color: #57465F; /* Warna teks ungu tua */
            max-width: 600px;
            background-color: #F5E8C7; /* Warna latar belakang pastel merah muda */
            padding: 20px;
            border: 1px solid #F5E8C7;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            justify-content: space-between;
            /* Tengahkan kontainer di layar PC */
        }

        h1 {
            color: #000; /* Warna teks ungu tua */
            font-size: 24px;
            margin-top: 20px;
        }

        form {
            color: #5C8374; /* Warna teks ungu tua */
            margin-top: 20px;
        }

        label,
        input,
        textarea {
            text-align:center;
            display: block;
            margin-bottom: 15px;
            color: #000; /* Warna teks ungu tua */
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding-bottom: 20px;
            border: 1px solid #9E8371; /* Warna garis pemisah pastel merah tua */
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="checkbox"] {
            display: none;
            margin:0 auto 0 auto;
        }

        input[type="checkbox"] + label {
            position: relative;
            cursor: pointer;
        }

        input[type="checkbox"] + label::before {
            margin:40px 17.5rem 0 17.5rem;
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 20px;
            border: 2px solid #000; /* Warna border checkbox */
            background-color: #fff; /* Warna latar belakang checkbox */
        }

        input[type="checkbox"]:checked + label::before {
            background-color: #5C8374; /* Warna latar belakang checkbox saat checked */
            border: 2px solid #5C8374; /* Warna border checkbox saat checked */
        }

        input[type="submit"] {
            background-color: #5C8374; /* Warna latar belakang oranye terang */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 65px
        }

        input[type="submit"]:hover {
            background-color: #183D3D; /* Warna latar belakang oranye gelap (hover) */
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Gaya tambahan untuk tema anak-anak */
        .child-image {
            max-width: 250px;
            height: 250px;
            border-radius: 15px;
        }

        .container {
            margin-top: 50px;
        }

        input:active {
            color: #F8CF2C; /* Warna teks saat aktif */
        }

        #anonimus {
            margin: 0 auto;
            width: 30px;
            height: 30px;
        }

        #kasus {
            color:#fff;
            background-color: #5C8374;
            border-radius:5px;
        }

        /* Menggunakan media query untuk layar berukuran kecil (seperti pada perangkat seluler) */
        @media (max-width: 768px) {
            .asu {
                margin-top: 20px; /* Mengurangi margin atas pada layar berukuran kecil */
            }
        }

        /* Menggunakan media query untuk layar berukuran besar (seperti pada komputer) */
        @media (min-width: 769px) {
            .asu {
                margin-top: 50px; /* Menjaga margin atas pada layar berukuran besar */
            }
        }
    </style>
</head>

<body>
    <div style="margin-top: 50px;" class="container asu">
        <!-- Tambahkan gambar anak-anak di sini -->
        <img class="child-image" src="img/logo.png" alt="Anak-anak bahagia">
        <h1>Pelaporan Masalah</h1>
        <form action="" method="post">
            <label for="kasus">Pilih Kasus:</label>
            <select id="kasus" name="kasus">
                <option value="ringan">Ringan</option>
                <option value="serius">Serius</option>
            </select>

            <label for="nama">Nama (Opsional):</label>
            <input type="text" id="nama" name="nama">
            <label for="kontak">Kontak yang bisa dihubungi:</label>
            <input type="text" id="kontak" name="kontak" required>
            <label for="laporan">Laporan :</label>
            <textarea id="laporan" name="laporan" required></textarea>
            <label for="alamat">Lokasi</label>
            <textarea id="alamat" name="alamat" required></textarea>
            <input type="checkbox" id="anonimus" name="anonimus">
            <label for="anonimus">Laporkan secara anonimus</label>
            <input type="submit" id="submit" value="Kirim Laporan">
        </form>
    </div>
</body>

</html>
