<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> -Services</title>
  <style>
    .pop:hover {
      border-top-color: #2EC1AC !important;
      transform: scale(1.03);
      transition: all 0.3s;
    }
  </style>
</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>



  <div class="my-5 px - 4">
    <h2 class="fw-bold h-font text-center">OUR Rental Pacakges</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
    UBC Car Rental offers a diverse range of services, including short-term and long-term rentals, event transportation, corporate rentals, 
    <br>and wedding car rentals.Whether you need a vehicle for a brief period or an extended stay, <br>
    UBC Car Rental provides tailored solutions to meet your specific needs.
    
    <p>
  </div>

  <div class="container">
    <div class="row">
      <?php $res = selectAll('facilities');
      $path = FEATURES_IMG_PATH;

      while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
  <div class="col-lg-4 col-md-6 mb-5 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
          <div class="d-flex algin-0item-center mb-2">
            <img src="$path$row[icon]" width="40px">
            <h5 class="m-2 ms-3 ">$row[name]</h5>
          </div>
          <p>
           $row[description] 
          </p>
        </div>
      </div>
  data;
      }
      ?>

    </div>
  </div>

  <?php require('inc/footer.php'); ?>

</body>

</html>