<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Inventory System Login</title>
  </head>
  <style type="text/css">
  
  form {
  border-style: solid;
  width: 50%;
}

*{
  color: #005100;
}
</style>
  </style>
  <body>

  <div class="bg-image"style=" background-image: url('img/Purple Modern Legal Consultant  Professional Facebook Ad.png'); height: 100vh; background-repeat: no-repeat, repeat;">
  <div class="container">
    <div class="col-sm-2" style="margin-left: -15%;"> 
      <img src="img/cvsu_logo.png" class="img-fluid " alt="...">
    </div>
    <div class="col-sm-2" style="margin-left: 100%; margin-top: -13%;"> 
      <img src="img/CON_logo.png" class="img-fluid " alt="...">
    </div>
<br> 

    <div class="container text-center font-weight-bolder" style="color: #005100; margin-top: -11%;">
      <h2 class="font-weight-bold">Cavite State University</h2>
      <h2 class="font-weight-bold">College of Nursing</h2>
      <h2 class="font-weight-bold" style="margin-left: 2%">Departmet of Medical Technologies</h2>
    </div>

    <div class="container text-center " style="color: #005100;  margin-left: %;">
      <h1 class="font-weight-bolder" >Data System on Inventory of Laboratory Equipment,</h1>
      <h1 class="font-weight-bolder">Glassware, and Reagents for Medical</h1>
      <h1 class="font-weight-bolder">Technology Department</h1>
    </div>

  </div>


  <br><br>
  <div class="container d-flex justify-content-center">
    
  <form  method="post" action="check_login.php" class="clearfix shadow p-3  rounded">
    <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger " role="alert">
        <?=$_GET['error']?>
      </div>
    <?php } ?>
    <div class="form-group row ml-4 mt-4" >
      <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bolder">Username:</label>
      <div class="col-lg-8 ml-4">
        <input type="name"  class="form-control border border-dark bg-transparent ml-4 " id="inputPassword" name="username" placeholder="Username" required>
      </div>
    </div> 
    <div class="form-group row ml-4 mt-4" >
      <label for="inputPassword" class="col-sm-2 col-form-label ">Password:</label>
      <div class="col-lg-8 ml-4">
        <input type="password" name= "password" class="form-control bg-transparent ml-4 border border-dark" id="inputPassword" placeholder="Password" required>
      </div>
    </div>
    <div class="form-group d-flex justify-content-center row">
      <div class="row">
        <button type="submit" class="btn text-white " style="border-radius:4%;  background-color: #005100; " >Login</button>
      </div>
    </div>
        <div class="form-group d-flex justify-content-center row">
      <div class="row">
          <a href="register.php" class="text-center text-white h6" style="text-decoration: none;">SIGN-IN</a>
        </div>
    </div>


  </form>

  </div>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>