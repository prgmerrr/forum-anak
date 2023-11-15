<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--style css-->
    <style>
        * {
    margin: 0;
    padding: 0;
}


body {
    background-color: #ffffff94;
    overflow: auto; /* atau overflow: scroll; */
}


.cloud {
    margin-top: -6rem;
    margin-left: -4rem;
}

.cloud2 {
    margin-top: -16rem;
    margin-left: 29rem; 
    
}
.form-image {
    margin-left: 165px;
    margin-top: 1rem;
    text-align: center;
    justify-content: center;
    align-items: center;
    width: 4rem;
    height: 4rem;
}
.form-container {
    border-radius: 10px;
    width: 25rem;
    height: 32rem;
    margin: 0 auto; 
    margin-top: -6rem; /* Adjust the top margin as needed */
    background-color: #FBECB2;
    box-shadow: 1px 1px 6px #716e66;
}

.form-title {
    margin-top: -18rem;
    font-family: "Poppins", sans-serif;
    font-weight: bold;
    margin-top: px;
    text-align: center;
    color: #000;
    line-height: 100px;
}

.form-input {
    width: 350px;
    height: 36px;
    margin-left: 20px;
    margin-top: 8px;
    border: 2px solid #e1e1e1;
    box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.562);
    border-radius: 5px;
}

.judul {
    font-family: "Poppins", sans-serif;
    font-weight: bold;
    color: rgb(0, 0, 0);
    margin-left: 170px;
}


.form-textarea {
    width: 350px;
    height: 110px;
    margin-left: 20px;
    margin-top: 19px;
    border: 2px solid #e1e1e1;
    box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.562);
    border-radius: 5px;
}


.isi {
    font-family: "Poppins", sans-serif;
    font-weight: bold;
    color: rgb(0, 0, 0);
    margin-left: 160px;
    display: block; /* Menjadikan label "isi" sebagai elemen blok */
    margin-top: 10px; /* Mengatur jarak atas dari label "isi" */
}

.form-button {
    font-family: "Poppins", sans-serif;
    font-weight: bold;
    margin-top: 1rem;
    margin-left: 159px;
    padding: 10px 16px;
    background-color: #ffd323;
    box-shadow: 3px 2px 2px rgb(249, 175, 0);
    border: none;
    color: rgb(0, 0, 0);
    border-radius: 5px;
    cursor: pointer;
}

.cit-foot {
   margin-top: 14px;
}

.cit-foot img {
    margin-bottom: -5px;
}

.footer1 {
    background-color: rgb(136, 234, 31);
    width: 80rem;
    height: 4rem;
}


.social-icons {
    position: fixed;
    top: 35rem;
    left: 19rem;
    display: flex;
    align-items: center;
}

.social-icons a {
    margin-right: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: transparent;
    border: 2px solid white;
    text-decoration: none;
    color: #ffffff; /* Ganti dengan warna ikon yang diinginkan */
    transition: black 0.3s, color 0.3s; /* Efek transisi */
}

.social-icons a:hover {
    background-color: white; /* Warna latar saat dihover */
    color: #333; /* Warna ikon saat dihover */
}

.social-icons a i {
    font-size: 18px; /* Sesuaikan ukuran ikon sesuai kebutuhan */
}

.copyright {
    font-family: "Poppins", sans-serif;
    font-weight: small;
    position: fixed;
    bottom: 15px;
    font-size: 20px;
    left: 10px;
    color: rgb(255, 255, 255); /* Ganti dengan warna yang diinginkan */
}

  

/*-------------------- TAMBAHAN CSS RAFI --------------------*/
label,
input,
textarea {
    text-align:center;
    display: block;
    margin-bottom: 5px;
    color: #000; /* Warna teks ungu tua */
    }


    input[type="text"],
        textarea {
            width: 75%;
            padding-bottom: 2px;
            border: 2px solid #9E8371; /* Warna garis pemisah pastel merah tua */
            border-radius: 5px;
            font-size: 16px;
            margin-left: auto;
            margin-right: auto;
        }

    #kasus {
            color:#000;
            background-color: #ffd323;
            border-radius:5px;
            margin-left: 43%;
            margin-bottom: 15px;
        }

        /* check box*/
        /* Tambahkan aturan CSS untuk checkbox */
.checkbox-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px; /* Sesuaikan dengan jarak yang diinginkan */
}

/* Styling tambahan untuk checkbox */
input[type="checkbox"] {
    cursor: pointer;
    margin-right: 5px; /* Sesuaikan dengan jarak yang diinginkan antara checkbox dan teks */
}


input[type="submit"] {
            background-color: #ffc107; /* Warna latar belakang oranye terang */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 75%;
            margin: 15px auto ;
        
        }

        input[type="submit"]:hover {
            background-color: #b8942a; /* Warna latar belakang oranye gelap (hover) */
        }



        /*RESPONSIF DI HP*/
        @media only screen and (max-width: 768px) {
    .cloud {
        margin-top: -9rem;
        margin-right: auto;
        margin-left: -2rem;
    }

    .cloud2 {
        display: none;
    }

    .form-image {
        margin-top: 10px;
        margin-left: 100px;
    }

    .judul {
        line-height: 27px;
        margin-left: 108px;
    }

    .isi {
        margin-left: 95px;
    }

    .form-container {
        width: 90%;
        height: 38rem;
        margin-left: auto;
        margin-right: auto;
        margin-top: -9rem;
    }

    .form-title {
        font-size: 20px;
        margin-top: -2rem;
        margin-left: 100;
    }

    .form-input,
    .form-textarea {
        width: 90%;
        margin-left: 10px;
    }

    .form-textarea {
        margin-top: 8px;
    }

    .form-button {
        margin-left: 100px;
    }

    .cit-foot {
        width: 100%; /* Sesuaikan lebar gambar */
        height: 3rem;
        margin-top: 20px; /* Sesuaikan dengan kebutuhan untuk menempatkanny */
    }
    .social-icons {
        top: 95%;
        left: 83%;
        transform: translateX(-50%);
    }

    .social-icons a {
        width: 20px;
        height: 20px;
    }

    .footer1 {
        background-color: rgb(136, 234, 31);
        margin-top: 10px;
        padding: 1px;
        text-align: center;
        position: relative;
    }
    .copyright {
        font-size: 13px;
        bottom: 11px;
        left: 33%;
        transform: translateX(-50%);
    }
}


/*RESPONSIF IPAD*/ 
@media only screen and (max-width: 810px) {
    .cont-foto{
        display: flex;
    }
    
    
    .cloud {
        margin-top: -9rem;
        margin-left: -2rem;
        
    }

    .cloud2{
        margin-top: -16rem;
        margin-left: 12rem;
    }

    .form-image {
        margin-top: 10px;
        margin-left: 100px;
    }

    .judul {
        line-height: 27px;
        margin-left: 108px;
    }

    .isi {
        margin-left: 95px;
    }

    .form-container {
        width: 90%;
        height: 38rem;
        margin-left: auto;
        margin-right: auto;
        margin-top: -9rem;
    }

    .form-title {
        font-size: 20px;
        margin-top: -2rem;
        margin-left: 100;
    }

    .form-input,
    .form-textarea {
        width: 90%;
        margin-left: 10px;
    }

    .form-textarea {
        margin-top: 8px;
    }

    .form-button {
        margin-left: 100px;
    }

    .cit-foot {
        width: 100%; /* Sesuaikan lebar gambar */
        height: 3rem;
        margin-top: 20px; /* Sesuaikan dengan kebutuhan untuk menempatkanny */
    }
    .social-icons {
        top: 95%;
        left: 83%;
        transform: translateX(-50%);
    }

    .social-icons a {
        width: 20px;
        height: 20px;
    }

    .footer1 {
        background-color: rgb(136, 234, 31);
        margin-top: 10px;
        padding: 1px;
        text-align: center;
        position: relative;
    }
    .copyright {
        font-size: 13px;
        bottom: 11px;
        left: 33%;
        transform: translateX(-50%);
    }
}


    </style>
</head>
<body>
    <div id= "cont-foto">
        <div class="cloud">
            <img class="cloud" src="arpirasinew/img/awan-removebg-preview.png" width="500" height="500">
        </div>
        <div class="cloud2">
            <img class="cloud2" src="arpirasinew/img/awan2-removebg-preview.png" width="500" height="500">
        </div>  
    </div>
    

    <div class="form-container">

        <h2 class="form-title">Pelaporan Masalah</h2>
        <form action="" method="post" enctype="">
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


    <!-- Tambahkan class "checkbox-container" -->
    <div class="checkbox-container">
        <input type="checkbox" id="anonimus" name="anonimus">
        <label for="anonimus">Laporkan secara anonymous ?</label>
    </div>

            <input type="submit" id="submit" value="Kirim Laporan">
        </form>
    </div>

    <div class="cit-foot">
        <img class="cit-foot" src="arpirasinew/img/WhatsApp Image 2023-11-08 at 11.21.25_1e9607eb.jpg">
    </div>

</body>
</html>
