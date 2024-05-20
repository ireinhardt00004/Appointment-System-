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
              <a href="admin.php" class="nav_logo"> 
                <i class='bx bxs-hdd nav_logo-icon'></i>
                <span class="nav_logo-name">CON INVENTORY</span> </a>
                <div class="nav_list"> 
                  <a href="admin.php" class="nav_link active"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Inventory Management</span> 
                  </a> 
                  <a href="admin_add_items.php" class="nav_link"> 
                    <i class='bx bx-add-to-queue nav_icon'></i>
                    <span class="nav_name">ADD ITEMS</span> 
                  </a> 
                  <a href="admin_edit_items.php" class="nav_link"> 
                    <i class='bx bx-edit-alt nav_icon' ></i>
                    <span class="nav_name">EDIT ITEM'S DATA</span> 
                  </a> 
                  <a href="admin_materials.php" class="nav_link"> 
                    <i class='bx bx-book-content nav_icon'></i>
                    <span class="nav_name">MATERIALS</span> 
                  </a> 
                  <a href="admin_borrow.php" class="nav_link"> 
                    <i class='bx bx-list-ul nav-icon' ></i> 
                    <span class="nav_name">BORROW TRANSACTION</span> 
                  </a> 
                  <a href="admin_return.php" class="nav_link"> 
                    <i class='bx bx-minus-back nav_icon' ></i>
                    <span class="nav_name">RETURN TRANSACTION</span> 
                  </a> 
                </div>
            </div> 
            <a href="logout.php" class="nav_link"> 
              <i class='bx bx-log-out nav_icon'></i> 
              <span class="nav_name">SignOut</span> 
            </a>
        </nav>
    </div>
    <!--Container Main start--><br>

    <div class="height-100 bg-light">

    <div class="Container-fluid ml-4"><br>
    <?php
    include "configuration.php";

    $query = "SELECT quantity, name_item FROM items";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {


            while ($row = mysqli_fetch_assoc($result)) {

                if ($row['quantity'] <= 2) {
                    echo '<div class=" container alert alert-warning  alert-dismissible fade show" role="alert" style=
                   " padding: 5px 10px;
                    border: 1px solid #dc3545;
                    background-color: #f8d7da;
                    color: #721c24;
                    font-size: 14px;"> 
                    <i class="bx bx-alarm-exclamation ml-2"> </i>' . $row['name_item'] . ' - Quantity: ' . $row['quantity'] . '</div>';
                }
            }

            echo "</table>";
        } else {
            echo "No data found.";
        }
    } else {
        echo "Error fetching data.";
    }
    ?>      
    <div>
      <p class=" text-center mt-4 h2" style="color: #004500; font-weight: bolder;"> INVENTORY MANAGEMENT</p>
    </div>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>NO</th>
                <th>Name of Intrument</th>
                <th>Total Quantity</th>
                <th>Current Quantity</th>
                <th>Serviceable</th>
                <th>Condemned</th>
                <th>Storage</th>
                <th>Supplier</th>
                <th>Expiration Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
                <td>$320,800</td>
                <td>$320,800</td>
                <td>$320,800</td>
            </tr>
            <?php include 'configuration.php';         
              $sql = "SELECT * FROM items;";
              $materials = mysqli_query($conn, $sql);
              if (mysqli_num_rows($materials) > 0) {?>
                <?php 
                while ($rows = mysqli_fetch_assoc($materials)) {?>
                <tr>                          
                    <td><?=$rows['stock_id'] ?> </td>
                    <td><?=$rows['name_item'] ?> </td>
                    <td><?=$rows['t_quantity'] ?> </td>
                    <td><?=$rows['quantity'] ?> </td>
                    <td><?=$rows['function'] ?> </td>
                    <td><?=$rows['condemn'] ?> </td>
                    <td><?=$rows['storage'] ?> </td>
                    <td><?=$rows['supplier'] ?> </td>
                    <td><?=$rows['Expiration date'] ?> </td>
                </tr>
                <?php }?>
            <?php }?>
        </tbody>
        <tfoot>
            <tr>
                <th>NO</th>
                <th>Name of Intrument</th>
                <th>Total Quantity</th>
                <th>Current Quantity</th>
                <th>Serviceable</th>
                <th>Condemned</th>
                <th>Storage</th>
                <th>Supplier</th>
                <th>Expiration Date</th>
            </tr>
        </tfoot>
    </table> 
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