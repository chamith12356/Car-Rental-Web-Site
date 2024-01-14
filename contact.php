<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> -Contact Us</title>
  <style>
    .alert.alert-success.alert-dismissible.fade.show.custom-alert {
      position: fixed;
      top: 80px;
      right: 25px;
    }
  </style>
</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>
  <?php
  $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
  $values = [1];
  $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));



  ?>
  <div class="my-5 px - 4">
    <h2 class="fw-bold h-font text-center">Contact Us</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
    UBC Car Rental offers a diverse range of services, including short-term and long-term rentals, event transportation, corporate rentals,<br>
and wedding car rentals.Whether you need a vehicle for a brief period or an extended stay,<br>
UBC Car Rental provides tailored solutions to meet your specific needs.
    <p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb-5 px-4">
        <div class="bg-white rounded shadow p-4 ">
          <iframe class="w-100 rounded mb-4" height="280px" src="<?php echo $contact_r['iframe'] ?>" loading="lazy"></iframe>
          <h5>Address</h5>
          <a href="<?php echo $contact_r['address'] ?>" target="_blank" class="d-inline-block text-decoration-none text-dark mb-3">
            <i class="bi bi-geo-alt-fill"></i> <?php echo $contact_r['address'] ?>
          </a>
          <h5>Call Us</h5>
          <a href="tel:+<?php echo $contact_r['pn1'] ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn1'] ?>

          </a>
          <br>
          <a href="tel:+<?php echo $contact_r['pn2'] ?>" class="d-inline-block  text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i> +<?php echo $contact_r['pn2'] ?>

          </a>
          <h5 class="mt-4">Email</h5>
          <a href="<?php echo $contact_r['email'] ?>" class="d-inline-block  text-decoration-none text-dark">
            <i class="bi bi-envelope-fill"></i><?php echo $contact_r['email'] ?></a>

          <h5 class="mt-4">Follow Us</h5>
          <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block  text-dark fs-5 me-2">

            <i class="bi bi-twitter me-1"></i>


          </a>

          <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block  text-dark fs-5 me-2">

            <i class="bi bi-facebook me-1"></i>


          </a>

          <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block  text-dark fs-5  ">

            <i class="bi bi-instagram me-1"></i>


          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6  px-4">
        <div class="bg-white rounded shadow p-4 ">
          <form method="post">
            <h5>Send a message</h5>
            <div class="mt-3">
              <label for="" style="font-weight: 500;" class="form-label">Name</label>
              <input name="name" required type="text" class="form-control shadow-none" name="" id="">
            </div>

            <div class="mt-3">
              <label for="" style="font-weight: 500;" class="form-label">Email</label>
              <input name="email" required type="email" class="form-control shadow-none" name="" id="">
            </div>

            <div class="mt-3">
              <label for="" style="font-weight: 500;" class="form-label">Subject</label>
              <input name="subject" required type="text" class="form-control shadow-none" name="" id="">
            </div>

            <div class="mt-3">
              <label for="" style="font-weight: 500;" class="form-label">Message</label>
              <textarea name="message" required name="" class="form-control shadow-none" id="" style="resize:none" rows="10"></textarea>
            </div>
            <button type="submit" name="send" class="btn text-white btn-success mt-3">SEND</button>
          </form>
        </div>


      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['send'])) {
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
    $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];


    $res = insert($q, $values, 'ssss');

    if ($res == 1) {
      alert('success', 'Mail Sent!');
    } else {
      alert('eroor', 'Sever Down');
    }
  }

  ?>

  <?php require('inc/footer.php'); ?>
  <script>
    function alert(type, msg) {
      let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
      let element = document.createElement('div');

      element.innerHTML = `<div class="alert ${bs_class} alert-dismissible fade show custom-aler" role="alert">
    <strong class="me-3">${msg}</strong>
    <button type="button"class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>`;
      document.body.append(element);
    }
  </script>
</body>

</html>