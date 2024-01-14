<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> -Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <style>
    .Avialbility-form {

      margin-top: -50px;
      z-index: 2;
      position: relative;
    }



    @media screen and (max-width: 575px) {
      .Avialbility-form {
        margin-top: 25px;
        padding: 0 35px;

      }

    }
  </style>
</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>
  <!-- Carousel -->
  <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/car for backdrop/3.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="" /><!--photo damme naa -->
        </div>
        <div class="swiper-slide">
          <img src="" /> <!--photo damme naa -->
        </div>
        <div class="swiper-slide">
          <img src="" /> <!--photo damme naa -->
        </div>
      </div>

    </div>

  </div>

  <!-- Registration Finished -->

  <!-- Check Avialbility Form -->

  <div class="container Avialbility-form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">

        <h5 class="mb-4">Check Car Avialability</h5>
        <form action="Cars.php">
          <div class="row align-items-end">
            <div class="col-lg-3 mb-3">
              <label class="form-label" style="font-weight : 500;">Vehicle Picked-up Date</label>
              <input type="date" name="checkin" class="form-control shadow-none" required>
            </div>

            <div class="col-lg-3  mb-3">
              <label class="form-label" style="font-weight : 500;">Vehicle Return Date</label>
              <input type="date" name="checkout" class="form-control shadow-none"  required>
            </div>
            <div class="col-lg-3  mb-3">
              <label for="name" class="form-label" style="font-weight : 500;">Type Of Vehicle</label>
              <select class="form-select shadow-none" name="type">
              <?php
                $type_q = mysqli_query($con, "SELECT type FROM car WHERE status='1' AND removed='0'");
    
                while ($type_res = mysqli_fetch_assoc($type_q)) {
                  $type_name = $type_res['type'];
                  echo "<option value='$type_name'>$type_name</option>";
                }
              ?>
              </select>
            </div>
            <div class="col-lg-2  mb-3">
              <label for="name" class="form-label" style="font-weight : 500;">Rental Pacakge</label>
              <select class="form-select shadow-none" name="package">

              <?php
                $type_q = mysqli_query($con, "SELECT name FROM facilities");
    
                while ($type_res = mysqli_fetch_assoc($type_q)) {
                  $type_name = $type_res['name'];
                  echo "<option value='$type_name'>$type_name</option>";
                }
              ?>
              </select>
            </div>
            <input type="hidden" name="check_availability">
            <div class="col-lg-1 mb-lg-3 mt-2">
              <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
            </div>
          </div>

        </form>
      </div>

    </div>

  </div>

  <!-- Our Car Collection -->

  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Car Collection</h2>

  <div class="container">
    <div class="row">


      <?php
      $car_res = select("SELECT * FROM `car` WHERE `status` = ? AND `removed` = ?  ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');
      while ($car_data = mysqli_fetch_assoc($car_res)) {
        $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f INNER JOIN `car_features` rfea ON f.id = rfea.features_id WHERE rfea.car_id = '$car_data[id]'");

        $features_data = "";
        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
          $features_data .= " <span class='badge rounded-pill bg-light text-dark text-wrap '> $fea_row[name] </span>";
        }
        // echo $features_data;

        //get facilities 



        $fec_q = mysqli_query($con, "SELECT f.name FROM `facilities` f INNER JOIN `car_facilities` rfea ON f.id = rfea.facilities_id WHERE rfea.car_id = '$car_data[id]'");

        $facilities_data = "";
        while ($fec_row = mysqli_fetch_assoc($fec_q)) {
          $facilities_data .= " <span class='badge rounded-pill bg-light text-dark text-wrap '> $fec_row[name] </span>";
        }
        // echo $facilities_data;

        // get thumbnail 
        $car_thumb = CARS_IMG_PATH . "thumbnail.jpg";
        $thumb_q = mysqli_query($con, "SELECT * FROM `car_images` WHERE `car_id`='$car_data[id]'AND `thumb`='1'");

        if (mysqli_num_rows($thumb_q) > 0) {
          $thumb_res = mysqli_fetch_assoc($thumb_q);
          $car_thumb = CARS_IMG_PATH . $thumb_res['image'];
        }

        $book_btn ="";

        if(!$settings_r['shutdown']){
          $login = 0;
          $book_btn ="<button class='btn btn-sm text-white custom-bg shadow-none'>Rent Vehicle</button>";
        }

        echo <<<data

                   <div class="col-lg-4 col-md-6 my-3">
               <div class="card border-0 shadow" style="max-width:350px; margin: auto;">
                   <img src="$car_thumb" class="card-img-top">
  
            <div class="card-body">
              <h5>$car_data[name]</h5>
              <h6 class="mb-4">Rs. $car_data[budegt] Per Km</h6>
              <div class="fearures mb-4">
                <h6 class="mb-1"> Car Features</h6>
  
               $features_data
  
              </div>
  
  
              <div class="rating mb-4">
                <h6 class="mb-1"> Rating</h6>
                <span class="badge rounded-pill bg-light">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </span>
  
  
              </div>
              <div class="d-flex justify-content-evenly mb-2">
                <a href="Cars.php" class="btn btn-sm text-white custom-bg shadow-none">Rent Vehicle</a>
                <a href="Cars.php" class="btn btn-sm btn-outline-dark shadow-none">More Details</a>
              </div>
  
  
            </div>
  
          </div>
  
          </div>

          data;
      }
      ?>
      <div class="col-lg-12 text-center mt-5">
        <a href="Cars.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none ">More Vehicles >>></a>
      </div>
    </div>
  </div>

  <!-- Our Services -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Services</h2>
  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
      <?php $res = selectAll('facilities');
      $path = FEATURES_IMG_PATH;

      while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
  

      
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3 m-3">
        <img src="$path$row[icon]" width="150px">
        <h5 class="mt-3">$row[name]</h5>
      </div>
  data;
      }
      ?>




      <div class="col-lg-12 text-center mt-5">
        <a href="services.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Services >>></a>
      </div>
    </div>
  </div>

  <!-- Testimonials -->

  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimonials</h2>

  <div class="container mt-5">
    <div class="swiper swiper-testimonials">
      <div class="swiper-wrapper mb-5">


        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center p-4">
            <img src="images/Testomonials_photos/Chaminda.jpg" width="45px">
            <h6 class="m-0 ms-2">Chamith Sulakshana</h6>
          </div>
          <p>
          Great car rental experience !
          UBC passed us on to travel point tour as an intermediary. 
          Car was a Toyota Hilux DoubleCab, 43000km. 
          The car is simply great. Rental on time at the hotel, 
          return 15 minutes late with WA announcement!!! at the hotel. 
          Contrary to some bad statements, a very good experience with Maki and the actual car rental.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center p-4">
            <img src="images/Testomonials_photos/Ushan.jpg" width="40px">
            <h6 class="m-0 ms-2">Ushan Loshitha</h6>
          </div>
          <p>
          Completely satisfied!
          Friendly staff, good mediation, fair prices. 
          When I forgot my expensive glasses in the glove 
          compartment while island hopping Seychelles on the first island, 
          they arranged for me to collect them at the airport before departure!
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-items-center p-4">
            <img src="images/Testomonials_photos/Buddika.jpg" width="45px">
            <h6 class="m-0 ms-2">Buddika Rajakaruna</h6>
          </div>
          <p>
          Excellent experience with UBC Car Rental
          Excellent experience with UBC from initial 
          booking through to delivery and return. I was particularly impressed by
          their communication and flexibility - due to an airline change I needed 
          to amend the Maki booking, which they processed rapidly and gave an 
          immediate refund for a shorter hire period. 
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
          </div>
        </div>



      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <div class="col-lg-12 text-center mt-5">
    <a href="AboutUs.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know More>>></a>
  </div>

  <!-- Reach Us -->
  <?php
  $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
  $values = [1];
  $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));



  ?>



  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe class="w-100 rounded" height="320px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>

      </div>
      <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-3 ">
          <h5>Call Us</h5>
          <a href="tel:+91767649483" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>

          </a>
          <br>
          <a href="tel:+91767649483" class="d-inline-block  text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn2'] ?>

          </a>

        </div>

        <div class="bg-white p-4 rounded mb-4 ">
          <h5>Follow Us</h5>
          <a href="<?php echo $contact_r['tw'] ?>" target="_blank" class="d-inline-block mb-3 ">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-twitter me-1"></i> Twitter
            </span>

          </a>
          <br>
          <a href="<?php echo $contact_r['fb'] ?>" target="_blank" class="d-inline-block mb-3 ">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-facebook me-1"></i> Facebook
            </span>

          </a>
          <br>
          <a href="<?php echo $contact_r['insta'] ?>" target="_blank" class="d-inline-block mb-3 ">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-instagram me-1"></i> Instagram
            </span>

          </a>




        </div>

      </div>
    </div>
  </div>

  <?php require('inc/footer.php') ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: "fade",
      loop: true,
      autoplay: {

        delay: 3500,
        disableOnInteraction: false,
      }


    });

    var swiper = new Swiper(".swiper-testimonials", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
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
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },

      }
    });
  </script>
</body>

</html>