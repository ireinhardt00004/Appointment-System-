<?php 
   session_start();
   include "configuration.php";
   if (isset($_SESSION['username']) && isset($_SESSION['std_num'])) {   ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<style type="text/css">
.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
</style>
<body>
<?php
include 'configuration.php';  
$cid=mysqli_real_escape_string($conn,$_SESSION['std_num']);     
$sql = "SELECT * FROM users WHERE std_num = '$cid'";
$edit = mysqli_query($conn, $sql);
 	if (mysqli_num_rows($edit) > 0) {?>
        <?php 
     	while ($rows = mysqli_fetch_assoc($edit)) {?>
<section class="h-100 bg-secondary">
<form class="mb-4">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://cvsu.edu.ph/wp-content/uploads/2022/03/CON-f2f-5.jpg"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: 5rem; border-bottom-left-radius: 5rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body text-black">
                <h3 class="mb-5 text-uppercase">Personal Information</h3>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-outline">
                    	<label>Student Number:</label>
                      <input type="text" id="form3Example1m" value="<?=$rows['std_num'] ?>" class="form-control form-control-lg" />
                    </div>
                  </div>
                  <div class="col-md-6 mb-2">
                    <div class="form-outline">
                    	<label>Name:</label>
                      <input type="text" id="form3Example1n" value="<?=$rows['name'] ?>" class="form-control form-control-lg" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-2"><label>Section:</label>
                    <div class="form-outline">
                      <input type="text" id="form3Example1m1" value="<?=$rows['section'] ?>" class="form-control form-control-lg" />
                    </div>
                  </div>
                  <div class="col-md-6 mb-2"><label>Contact Number:</label>
                    <div class="form-outline">
                      <input type="text" id="form3Example1n1" value="<?=$rows['c_num'] ?>" class="form-control form-control-lg" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-2"><label>UserName:</label>
                    <div class="form-outline">
                      <input type="text" id="form3Example1m1" value="<?=$rows['username'] ?>" class="form-control form-control-lg" />
                    </div>
                  </div>
                  <div class="col-md-6 mb-2"><label>Password:</label>
                    <div class="form-outline">
                      <input type="text" id="form3Example1n1" value="<?=$rows['password'] ?>" class="form-control form-control-lg" />
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-2"><label>Account Registration:</label>
                  <input type="text" id="form3Example8" value="<?=$rows['reg_date'] ?>" class="form-control form-control-lg" />
                </div>
                <div class="mb-4">
                  <button type="button" class="btn btn-outline-danger text-danger"><a href="logout.php" style="text-decoration: none;">LOG_OUT</a></button>
                </div>
              </div>
            </div>
          </div>
        </div><br><br><br><br>
      </div>
    </div>
  </div>
 </form>
<?php }?>
<?php }?>
</section>
</body>
</html>
<?php }else{
  header("Location: index.php");
} ?>