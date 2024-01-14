<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> -about</title>

  <style>
    .box {
      border-top-color: var(--teal) !important;

    }
  </style>
</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>

  <div class="my-5 px - 4">
    <h2 class="fw-bold h-font text-center">ABOUT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
    Welcome to UBC Car Rental, where your journey is our priority. <br>
    Established with a passion for delivering unparalleled travel experiences, <br>
    UBC Car Rental stands as your trusted partner in exploration. <br>
    Whether you're a local seeking convenience or a traveler discovering new horizons, <br>
    our commitment is to provide you with reliable, affordable, and top-quality car rental services.
    <p>
  </div>

  <div class="container">
    <div class="row justify-content-betwen align-items-center">
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
        <h3 class="mb-3">UBC Car Rental.</h3>
        <p>
        At UBC Car Rental, we pride ourselves on a mission to redefine your travel expectations. Our diverse fleet, comprising well-maintained vehicles ranging from compact cars to spacious SUVs, ensures that your every need is met. We believe in transparent and competitive pricing, striving to offer you exceptional value for your investment.
        </p>
      </div>
      <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
        <img src="images/aboutus/aboutus.jpg" class="w-100">
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/aboutus/customer.jpg" width="70px"> <!--4TO DNNA ONI-->
          <h4 class="mt-3">100+ CARS</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/aboutus/customer.jpg" width="70px"> <!--4TO DNNA ONI-->
          <h4 class="mt-3">100+ CARS</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/aboutus/customer.jpg" width="70px"> <!--4TO DNNA ONI-->
          <h4 class="mt-3">50+ CUSTO</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-mb-4 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box">
          <img src="images/aboutus/customer.jpg" width="70px"> <!--4TO DNNA ONI-->
          <h4 class="mt-3">150+ REVIEWS</h4>
        </div>
      </div>
    </div>
  </div>
  <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>

  <div class="container px-4">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
        <?php
        $about_r = selectAll("team_details");
        $path = ABOUT_IMG_PATH;
        while ($row = mysqli_fetch_assoc($about_r)) {
          echo <<<data
    <div class="swiper-slide bg-white text-center overflow-hidden rounded">
      <img src="$path$row[picture]" class="w-100"> <!--4to dnn oni -->
      <h5 class="mt-3">$row[name]</h5>
    </div>
data;
        }


        ?>








      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>



  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 40,
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },

        768: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 3,
        },

      }
    });
  </script>
  <?php require('inc/footer.php'); ?>
</body>

</html>