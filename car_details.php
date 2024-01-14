<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> - Cars Details</title>

</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>

  <?php

  if (!isset($_GET['id'])) {
    redirect('Cars.php');
  }
  $data = filteration($_GET);

  $car_res = select("SELECT * FROM `car` WHERE `id`=? AND `status` = ? AND `removed` = ?", [$data['id'], 1, 0], 'iii');

  if (mysqli_num_rows($car_res) == 0) {
    redirect('Cars.php');
  }
  $car_data = mysqli_fetch_assoc($car_res);

  ?>





  <div class="container-fluid">
    <div class="row">

      <div class="col-12 my-5 mb-4 px-4">
        <h2 class="fw-bold"><?php echo $car_data['name'] ?></h2>

        <div style="font-size: 14px;">
          <a href="index.php" class="text-secondary text-decoration-none">Home</a>
          <span class="text-secondary"> > </span>
          <a href="Cars.php" class="text-secondary text-decoration-none">CARS</a>
        </div>


      </div>

      <div class="col-lg-7 col-md-12 px-4">

        <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">

        <?php
	        $car_img = CARS_IMG_PATH . "thumbnail.jpg";
	        $stmt = mysqli_prepare($con, "SELECT * FROM `car_images` WHERE `car_id` = ?");
	        if ($stmt) {
    		    mysqli_stmt_bind_param($stmt, 'i', $car_data['id']);
    		    mysqli_stmt_execute($stmt);
    		    $result = mysqli_stmt_get_result($stmt);

    		    if (mysqli_num_rows($result) > 0) {
        		  $active_class = 'active';

        		  while ($img_res = mysqli_fetch_assoc($result)) {
            		$car_img = CARS_IMG_PATH . $img_res['image'];
			          echo "<div class='carousel-item $active_class'><img src='$car_img' class='d-block w-100 rounded' alt='...'></div>";

            		$active_class = ''; // Reset the active_class for subsequent images
        		  }
    		    } else {
        		  echo "<div class='carousel-item'><img src='$car_img' class='d-block w-100' alt='...'></div>";
    		    }
	        }
        ?>

            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="col-lg-5 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow-sm rounded-3">
          <div class="card-body">
            <?php

            echo <<<price
    <h4 class="mb-4">Rs. $car_data[budegt]</h4>
    price;



            $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f INNER JOIN `car_features` rfea ON f.id = rfea.features_id WHERE rfea.car_id = '$car_data[id]'");

            $features_data = "";
            while ($fea_row = mysqli_fetch_assoc($fea_q)) {
              $features_data .= " <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'> $fea_row[name] </span>";
            }
            echo <<<features
    <div class="fearures mb-3">
            <h5 class="mb-1"> Car Features</h5>

            $features_data;


          </div>
    features;

            $fec_q = mysqli_query($con, "SELECT f.name FROM `facilities` f INNER JOIN `car_facilities` rfea ON f.id = rfea.facilities_id WHERE rfea.car_id = '$car_data[id]'");

            $facilities_data = "";
            while ($fec_row = mysqli_fetch_assoc($fec_q)) {
              $facilities_data .= " <span class='badge rounded-pill bg-light text-dark text-wrap me-1 mb-1'> $fec_row[name] </span>";
            }

            echo <<<facilities
      <div class="Services mb-3">
                 <h5 class="mb-1"> Car Services</h5>



             $facilities_data


        </div>
      facilities;
            echo <<<pric
      <div class="Services mb-3">
                 <h5 class="mb-1"> Car Description</h5>
    <h6 class="mb-4"> $car_data[description]</h6>
    </div>
    pric;

            echo <<< book
    <a href="#" class="btn btn-sm w-100 text-white btn-outline-dark custom-bg shadow-none mb-2">Purchase Car</a>
    book;
            ?>

          </div>
        </div>
      </div>
      <!-- <div class="m-3">
      <div class="rating align-items-center mb-4">
              <h6 class="mb-1"> Rating</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </span>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam nemo quas corporis rem in consequatur doloremque facere at ut? Ad, maxime quasi. Laudantium earum maiores enim fugit dignissimos. Doloribus, sit.</p>

            </div>
</div> -->
    </div>
  </div>

  <?php require('inc/footer.php'); ?>

</body>

</html>