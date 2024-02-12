<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
</head>
<style>
/* Google Fonts - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

* {
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background-color: #4A4A4A;
}

.slide-container {
    max-width: 1120px;
    width: 100%;
    padding: 40px 0;
    
}

.slide-content {
    margin: 20px 40px;
    overflow: hidden;
    border-radius: 25px;
    
}

.card {
    border-radius: 25px;
    border-color: transparent;
    background-color: #4A4A4A;
}

.image-content,
.card-content {
    color: #FFF3C4;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 8px 14px;
}

.image-content {
    position: relative;
    row-gap: 5px;
    padding: 25px 0;
    background-color: ;
}

.overlay {
    margin-top: 10px;
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: #323232;
    border-radius: 25px;
}

/* OVERLAY TIDAL TERPAKAI  */

/* .overlay::before,
.overlay::after {
  content: "";
  position: absolute;
  right: 0;
  bottom: -40px;
  height: 40px;
  width: 40px;
  background-color: #323232;
}

.overlay::after {
  border-radius: 0 25px 0 0;
  background-color: #323232;
} */

.card-image {
    position: relative;
    height: 190px;
    width: 300px;
    border-radius: 10%;
    padding: 2px;

}

.card-image .card-img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 10%;
    margin-top: 10px;
}

.name {
    font-size: 18px;
    font-weight: 500;
    color: #333;
    margin-top: 10px;
}

.description {
    font-size: 14px;
    color: #707070;
    text-align: center;
}

.button {
    border: none;
    font-size: 16px;
    color: #fff;
    padding: 8px 16px;
    background-color: #909090;
    border-radius: 6px;
    margin: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.button:hover {
    background: #e5dab0;
    color: #000;
}

.swiper-navBtn {
    color: #444444;
    transition: color 0.3s ease;
}

.swiper-navBtn:hover {
    color: #000;
}

.swiper-navBtn::before,
.swiper-navBtn::after {
    font-size: 35px;
}

.swiper-button-next {
    right: 0;
}

.swiper-button-prev {
    left: 0;
}

.swiper-pagination-bullet {
    background-color: #6e93f7;
    opacity: 1;
}

.swiper-pagination-bullet-active {
    background-color: #4070f4;
}

@media screen and (max-width: 768px) {
    .slide-content {
        margin: 0 10px;
    }

    .swiper-navBtn {
        display: none;
    }
}
</style>

<body>

    <!-- SLIDER 1 -->
    <div class="slide-container swiper" id="slider1">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                <?php
        $imageDirectory = "../admin/uploads/";
        $images = glob($imageDirectory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        foreach ($images as $image) {
          ?>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="<?= $image ?>" alt="" class="card-img" />
                        </div>
                    </div>
                    <div class="card-content">

                        <h2 class="name">
                            Lorem
                        </h2>
                        <p class="description">

                        </p>
                        <button class="button">View More</button>
                    </div>
                </div>
                <?php
        }
        ?>
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>


    <!-- SLIDER 2 -->
    <div class="slide-container swiper" id="slider2">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                <?php
        $imageDirectory = "../admin/uploads/";
        $images = glob($imageDirectory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        foreach ($images as $image) {
          ?>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="<?= $image ?>" alt="" class="card-img" />
                        </div>
                    </div>
                    <div class="card-content">

                        <h2 class="name">
                            Ipsum
                        </h2>
                        <p class="description">

                        </p>
                        <button class="button">View More</button>
                    </div>
                </div>
                <?php
        }
        ?>
            </div>
        </div>
        <style>
        .card-content {
            background-color: #FFF3C4;
        }
        </style>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>

    <!-- <div class="slide-container swiper" id="slider2">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                <?php
        $imageDirectory = "../admin/uploads/";
        $images = glob($imageDirectory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

        foreach ($images as $image) {
          ?>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="<?= $image ?>" alt="" class="card-img" />
                        </div>
                    </div>
                    <div class="card-content">

                        <h2 class="name">
                            dolor
                        </h2>
                        <p class="description">

                        </p>
                        <button class="button">View More</button>
                    </div>
                </div>
                <?php
        }
        ?>
            </div>
        </div>
        <style>
        .card-content {
            background-color: #FFF3C4;
        }
        </style>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div> -->


</body>

<!-- Swiper JS -->
<script src="js/swiper-bundle.min.js"></script>

<!-- JavaScript -->
<script src="js/script.js"></script>

</html>

