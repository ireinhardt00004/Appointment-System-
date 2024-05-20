<?php 
   session_start();
   include "configuration.php";
   if (isset($_SESSION['username']) && isset($_SESSION['std_num'])) {   ?>
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="admin.css">

  <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script defer src="script.js"></script>
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
                  <a href="admin_edit_items.php" class="nav_link active" style="text-decoration: none;"> 
                    <i class='bx bx-edit-alt nav_icon' ></i>
                    <span class="nav_name">EDIT ITEM'S DATA</span> 
                  </a> 
                  <a href="admin_materials.php" class="nav_link" style="text-decoration: none;"> 
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
            <a href="logout.php" class="nav_link" style="text-decoration: none;"> 
              <i class='bx bx-log-out nav_icon'></i> 
              <span class="nav_name">SignOut</span> 
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
    <div class="Container-fluid ml-4"><br><br><br>

    <div>
      <p class=" text-center mt-4 h2" style="color: #004500; font-weight: bolder;"> EDIT ITEMS</p>
    </div>
    <?php
      include 'configuration.php';  
      $cid = $_GET['cid'];         
       $sql = "SELECT * FROM items WHERE stock_id = '$cid'";
        $edit = mysqli_query($conn, $sql);
          if (mysqli_num_rows($edit) > 0) {?>
            <?php 
              while ($rows = mysqli_fetch_assoc($edit)) {?>


                <div class="container mt-3">
                  <form method="POST" >
                    <div class="row">
                      <div class="col">
                        <label>Name of the Item:</label>
                        <input type="text" class="form-control" value="<?=$rows['name_item'] ?>" name="name_item" required>
                      </div>
                      <div class="col">
                        <label>Date Recieve:</label>
                        <input type="text" class="form-control" value="<?=$rows['date_recieve'] ?>" name="date_recieve" required>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col">
                        <label>Stock Id:</label>
                        <input type="number" class="form-control" value="<?=$rows['stock_id'] ?>" name="stock_id" readonly>
                      </div>
                      <div class="col">
                        <label>Type of the Item:</label>
                        <select id="item_type" name="item_type" class="form-control" required>
                          <option value="<?=$rows['item_type'] ?>"><?=$rows['item_type'] ?></option>
                          <option value="as">Equipment</option>
                          <option value="Glassware">Glassware</option>
                          <option value="Reagents">Reagents</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col">
                        <label>Quantity:</label>
                        <input type="number" class="form-control" value="<?=$rows['quantity'] ?>" name="quantity" required>
                      </div>
                      <div class="col">
                        <label>Function:</label>
                        <select id="function" name="function" class="form-control" required>
                          <option value="<?=$rows['function'] ?>"><?=$rows['function'] ?></option>
                          <option value="Functional">Functional</option>
                          <option value="Not Functional">Not Functional</option>
                          <option value="Adequate">Adequate</option>
                        </select>
                      </div>
                    </div>
        
                    <div class="modal-footer">
                      <br><br><br><br>
                
                    <input type="submit"class="btn btn-primary" placeholder="Save changes" name="edit">
                  </div>
                  </form>                 
              </div>
        <?php }?>
    <?php }?>
    <?php
    include('configuration.php');
    if(isset($_REQUEST['edit'])){
    $stock_id = $_POST['stock_id'];
    $name_item = $_POST['name_item'];
    $item_type  = $_POST['item_type'];
    $quantity  = $_POST['quantity'];
    $function  = $_POST['function'];
    $date_recieve  = $_POST['date_recieve'];

    $sql = "UPDATE items SET stock_id ='$stock_id', name_item = '$name_item', item_type = '$item_type', quantity ='$quantity', function = '$function', date_recieve ='$date_recieve' WHERE stock_id = '$stock_id'";

      if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript"> alert("You have Update Recods! "); 
            window.location = "admin_edit_items.php"; </script>';
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
    }?>

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