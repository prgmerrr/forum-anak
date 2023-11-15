<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
        
    <!-- CSS -->
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #ffbf1d26;
            margin: 0;
            padding: 0;
        }

        .cont{
            position: relative;
            height: auto;
            width: 70rem;
            display: flex;
            align-items: center;
            margin-left: 70px;
        }

        .swiper-container {
            width: 100%;
            padding: 20px;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-right: 20px;
        }

        .swiper-slide img {
            max-width: 100%;
            height: auto;
        }

        .swiper-button-next, .swiper-button-prev {
            color: #ffcc00;
            margin: 0 10px 0 10px;
        }

        @media (max-width: 768px) {
            .swiper-button-next, .swiper-button-prev {
              display: none;
            }

            .card {
                max-width: 80%; /* Mengatur lebar maksimum kartu saat mode ponsel */
            }
        }

        .card h2 {
            margin: 10px 0 0 0 ;
            color: #5c5c5c;
        }

        .card p {
            color: #000;
        }

        .card {
            background-color: #ffcf40;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: 0 4 0 4rem;
        }

        .card img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .card .button {
            cursor: pointer;
            padding: 8px 22px;
            border-radius: 10px;
            background-color: #ffc107;
            box-shadow: 3px 2px 2px rgb(249, 175, 0);
            border: none;
        }

        .card .button:hover {
            background-color: #b38707;
            color: #fff;
        }

        .swiper-pagination{
            color: aqua;
        }
    </style>
</head>
<body>
    <section class="cont">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- Your slides go here -->
                <div class="swiper-slide" style="background-image: url('/img/slide1.jpg');">
                    <div class="card">
                        <!-- Your card content for slide 1 -->
                        <img src="slider/img/balap.JPG" alt="rf">
                        <h2>Judul </h2>
                        <p>-----caption-----</p>
                        <button class="button">View</button>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('/img/slide2.jpg');">
                    <div class="card">
                        <!-- Your card content for slide 2 -->
                        <img src="slider/img/balap.JPG" alt="rf">
                        <h2>Judul </h2>
                        <p>-----caption-----</p>
                        <button class="button">View</button>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('/img/slide3.jpg');">
                    <div class="card">
                        <!-- Your card content for slide 3 -->
                        <img src="slider/img/balap.JPG" alt="rf">
                        <h2>Judul </h2>
                        <p>-----caption-----</p>
                        <button class="button">View</button>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('/img/slide3.jpg');">
                    <div class="card">
                        <!-- Your card content for slide 3 -->
                        <img src="slider/img/balap.JPG" alt="rf">
                        <h2>Judul </h2>
                        <p>-----caption-----</p>
                        <button class="button">View</button>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('/img/slide3.jpg');">
                    <div class="card">
                        <!-- Your card content for slide 3 -->
                        <img src="slider/img/balap.JPG" alt="rf">
                        <h2>Judul </h2>
                        <p>-----caption-----</p>
                        <button class="button">View</button>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url('/img/slide3.jpg');">
                    <div class="card">
                        <!-- Your card content for slide 3 -->
                        <img src="slider/img/balap.JPG" alt="rf">
                        <h2>Judul </h2>
                        <p>-----caption-----</p>
                        <button class="button">View</button>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,  // Show 3 slides at a time
            spaceBetween: 100,  // Adjust the space between slides as needed
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>
</html>