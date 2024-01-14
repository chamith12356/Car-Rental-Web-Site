<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <?php require('inc/links.php'); ?>

  <title><?php echo $settings_r['site_title'] ?> -Vehicles</title>

</head>

<body class="bg-light">

  <?php 
    require('inc/header.php');
    
    $checkin_default ="";
    $checkout_default ="";
    $type_default ="";
    if(isset($_GET['check_availability']))
    {
      $frm_data = filteration($_GET);

      $checkin_default = $frm_data['checkin'];
      $checkout_default = $frm_data['checkout'];
      $type_default = $frm_data['type'];
    }
  ?>

  <div class="my-3 px - 4">
    <h2 class="fw-bold h-font text-center">Our Car Collection</h2>
    <div class="h-line bg-dark"></div>

  </div>

  <div class="container-fluid">
    <div class="row">


      <div class="col-lg-3 col-md-12 mb-lg-0 mb-10 ps-10">
        <nav class="navbar navbar-expand-lg  navbar-light bg-white rounded shadow">
          <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2">FILTERS</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
              <!--check availability logic !-->
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="d-flex align-items-center justify-content-between mb-3" style="font-size: 15px;">
                <span>CHECK AVAILABILITY</span>
                <button id="chk_avail_btn" onclick="chk_avail_clear()" class="btn btn-shadow-none btn-sm text-secondary d-none">Reset</button>
              </h5>
                <label class="form-label">Car Purchased Date</label>
                <input type="date" class="form-control shadow-none mb-3" value="<?php echo $checkin_default ?>" id="checkin" onchange="chk_avail_filter()">

                <label class="form-label">Car Returned Date</label>
                <input type="date" class="form-control shadow-none" value="<?php echo $checkout_default ?>" id="checkout" onchange="chk_avail_filter()">
              </div>

              <!-- package(facilities) Section !-->
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="d-flex align-items-center justify-content-between mb-3" style="font-size: 15px;">
                <span>PACKAGE(SERVICE)</span>
                <button id="facilities_btn" onclick="facilities_clear()" class="btn btn-shadow-none btn-sm text-secondary d-none">Reset</button>
                </h5>
                <?php
                
                  $facilities_q = selectAll('facilities');
                  while ($row = mysqli_fetch_assoc($facilities_q))
                  {
                    echo<<<facilities
                      <div class="mb-2">
                        <input type="checkbox" onclick="fetch_cars()" name="facilities"value="$row[id]" class="form-check-input shadow-none me-1" id="$row[id]">
                        <label class="form-check-label" for="$row[id]">$row[name]</label>
                      </div>
                    facilities;
                  }              
                ?>
              </div>

              <!-- passenger validation -->
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="d-flex align-items-center justify-content-between mb-3" style="font-size: 15px;">
                <span>TYPE</span>
                <button id="guests_btn" onclick="guests_clear()" class="btn btn-shadow-none btn-sm text-secondary d-none">Reset</button>
                </h5>
                <div class="d-flex">
                  <div class="me-3">

                    <select class="form-select shadow-none" name="type" id="type" onchange="guests_filter()">
                      <?php
                        $type_q = mysqli_query($con, "SELECT DISTINCT type FROM car WHERE status='1' AND removed='0'");
    
                        while ($type_res = mysqli_fetch_assoc($type_q)) {
                          $type_name = $type_res['type'];
                          $selected = ($type_default == $type_name) ? 'selected' : '';
                          echo "<option value='$type_name' $selected>$type_name</option>";
                        }
                      ?>
                    </select>


                  </div>
                </div>

              </div>
            </div>
          </div>
        </nav>
      </div>

      <div class="col-lg-9 col-md-12 px-4" id="cars-data">
        
      </div>

    </div>
  </div>

  <script>

    let cars_data =document.getElementById('cars-data');

    let checkin =document.getElementById('checkin');
    let checkout =document.getElementById('checkout');
    let chk_avail_btn =document.getElementById('chk_avail_btn');

    let type =document.getElementById('type');
    let guests_btn =document.getElementById('guests_btn');

    let facilities_btn =document.getElementById('facilities_btn');


    function fetch_cars()
    {
      let chk_avail = JSON.stringify({
        checkin:checkin.value,
        checkout:checkout.value
      });
      
      let guests =JSON.stringify({
        type:type.value,
      });

      let facility_list = {"facilities":[]};

      let get_facilities = document.querySelectorAll('[name="facilities"]:checked');
      if(get_facilities.length>0)
      {
        get_facilities.forEach((facility)=>{
          facility_list.facilities.push(facility.value);
        });
        facilities_btn.classList.remove('d-none');
      }
      else{
        facilities_btn.classList.add('d-none');
      }
      facility_list = JSON.stringify(facility_list);

      let xhr = new XMLHttpRequest();
      xhr.open("GET","ajax/cars.php?fetch_cars&chk_avail="+chk_avail+"&guests="+guests+"&facility_list="+facility_list,true);

      xhr.onprogress = function(){
        cars_data.innerHTML ='<div class="spinner-border text-info mb-3 d-block mx-auto" id="loader" role="status"><span class="visually-hidden">Loading...</span></div>';
      }

      xhr.onload =function(){
        cars_data.innerHTML =this.responseText;
      }

      xhr.send();
    }

    function chk_avail_filter(){
      if(checkin.value!='' && checkout.value!=''){
        fetch_cars();
        chk_avail_btn.classList.remove('d-none');
      }
    }

    function chk_avail_clear(){
      checkin.value='';
      checkout.value='';
      chk_avail_btn.classList.add('d-none');
      fetch_cars();
     
    }

    function guests_filter(){
        fetch_cars();
        guests_btn.classList.remove('d-none');
      
    }

    function guests_clear(){
      guests_btn.classList.add('d-none');
      fetch_cars();

    }

    function facilities_clear(){
      let get_facilities = document.querySelectorAll('[name="facilities"]:checked');
      get_facilities.forEach((facility)=>{
        facility.checked =false;
      });
      facilities_btn.classList.add('d-none');
      fetch_cars();

    }

    window.onload = function(){
      fetch_cars();
    }

    

  </script>

  <?php require('inc/footer.php'); ?>

</body>

</html>