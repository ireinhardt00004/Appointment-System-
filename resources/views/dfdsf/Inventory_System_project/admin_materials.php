<?php 
   session_start();
   include "configuration.php";
   if (isset($_SESSION['username']) && isset($_SESSION['std_num'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- for data table-->
  <link rel="stylesheet" type="text/css" href="admin.css">

</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="img/con2_logo.png" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
             <div> 
              <a href="admin.php" class="nav_logo" style="text-decoration: none;"> 
                <i class='bx bxs-hdd nav_logo-icon'></i>
                <span class="nav_logo-name">CON INVENTORY</span> </a>
                <div class="nav_list"> 
                  <a href="admin.php" class="nav_link " style="text-decoration: none;"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Inventory Management</span> 
                  </a> 
                  <a href="admin_add_items.php" class="nav_link " style="text-decoration: none;"> 
                    <i class='bx bx-add-to-queue nav_icon'></i>
                    <span class="nav_name">ADD ITEMS</span> 
                  </a> 
                  <a href="admin_edit_items.php" class="nav_link " style="text-decoration: none;"> 
                    <i class='bx bx-edit-alt nav_icon' ></i>
                    <span class="nav_name">EDIT ITEM'S DATA</span> 
                  </a> 
                  <a href="admin_materials.php" class="nav_link active" style="text-decoration: none;"> 
                    <i class='bx bx-book-content nav_icon'></i>
                    <span class="nav_name">MATERIALS</span> 
                  </a> 
                  <a href="admin_borrow.php" class="nav_link" style="text-decoration: none;"> 
                    <i class='bx bx-list-ul nav-icon' ></i> 
                    <span class="nav_name">BORROW TRANSACTION</span> 
                  </a> 
                  <a href="admin_return.php" class="nav_link" style="text-decoration: none;"> 
                    <i class='bx bx-minus-back nav_icon' ></i>
                    <span class="nav_name">RETURN TRANSACTION</span> 
                  </a> 
                </div>
            </div> 
            <a href="logout.php" class="nav_link"  style="text-decoration: none;"> 
              <i class='bx bx-log-out nav_icon'></i> 
              <span class="nav_name">SignOut</span> 
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
    <div class="Container-fluid ml-4"><br><BR><BR><br><br>
    <div>
      <p class=" text-center mt-4 h2" style="color: #004500; font-weight: bolder;"> MATERIALS</p>
    </div><br><br>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <div class="Container-fluid d-flex justify-content-around ">
      <div class="row ">
        <div class="col-lg">        
          <div class="container mt-3 ">
            <h4  style="color: #004500; font-weight: bolder;">EQUIPMENT</h4>
            
            <button type="button" class="btn btn-success col-xxl-12" data-bs-toggle="modal" data-bs-target="#myModal">
             OPEN
            </button>
          </div>
          <!-- The Modal -->
          <div class="modal fade mb-4" id="myModal" >
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title text-primary">EQUIPMENT</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Equipment</th>
                            <th>Quantity</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'configuration.php';         
                          $sql = "SELECT * FROM items WHERE item_type = 'equipment';";
                          $quipment = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($quipment) > 0) {?>
                            <?php 
                            while ($rows = mysqli_fetch_assoc($quipment)) {?>
                            <tr>                          
                                <td><?=$rows['name_item'] ?> </td>
                                <td><?=$rows['quantity'] ?> </td>
                                <td><?=$rows['function'] ?> </td>
                            </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">BACK</button>
                </div>

              </div>
            </div>
          </div>
        </div>


        <div class="col-lg">        
          <div class="container mt-3 ">
            <h4  style="color: #004500; font-weight: bolder;">GLASSWARE</h4>
            
            <button type="button" class="btn btn-success col-xxl-12" data-bs-toggle="modal" data-bs-target="#myModal2">
              OPEN
            </button>
          </div>
          <!-- The Modal -->
          <div class="modal fade mb-4" id="myModal2" >
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title text-primary">GLASSWARE</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   <table id="example2" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Glassware</th>
                            <th>Quantity</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'configuration.php';         
                          $sql = "SELECT * FROM items WHERE item_type = 'glassware';";
                          $quipment = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($quipment) > 0) {?>
                            <?php 
                            while ($rows = mysqli_fetch_assoc($quipment)) {?>
                            <tr>                          
                                <td><?=$rows['name_item'] ?> </td>
                                <td><?=$rows['quantity'] ?> </td>
                                <td><?=$rows['function'] ?> </td>
                            </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">BACK</button>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg">        
          <div class="container mt-3 ">
            <h4 style="color: #004500; font-weight: bolder;">RAGEANTS</h4>
            
            <button type="button" class="btn btn-success col-xxl-12" data-bs-toggle="modal" data-bs-target="#myModal3">
             OPEN
            </button>
          </div>
          <!-- The Modal -->
          <div class="modal fade mb-4" id="myModal3" >
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title text-primary">RAGEANTS</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   <table id="example3" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Equipment</th>
                            <th>Quantity</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'configuration.php';         
                          $sql = "SELECT * FROM items WHERE item_type = 'reagents';";
                          $quipment = mysqli_query($conn, $sql);
                          if (mysqli_num_rows($quipment) > 0) {?>
                            <?php 
                            while ($rows = mysqli_fetch_assoc($quipment)) {?>
                            <tr>                          
                                <td><?=$rows['name_item'] ?> </td>
                                <td><?=$rows['quantity'] ?> </td>
                                <td><?=$rows['function'] ?> </td>
                            </tr>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">BACK</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    </div> 
    </div>
    <!--Container Main end-->
    <script type="text/javascript" src="admin.js"></script>
    <!-- Data table -->
  </body>
</html>
<?php }else{
  header("Location: index.php");
} ?>





