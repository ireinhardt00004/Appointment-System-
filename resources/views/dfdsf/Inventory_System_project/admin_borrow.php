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
<style type="text/css">
  @media print {
            header  {
                display: none
            }
            .print-content {
                display: block;
            }
        }
</style>
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
                  <a href="admin_add_items.php" class="nav_link" style="text-decoration: none;"> 
                    <i class='bx bx-add-to-queue nav_icon'></i>
                    <span class="nav_name">ADD ITEMS</span> 
                  </a> 
                  <a href="admin_edit_items.php" class="nav_link" style="text-decoration: none;"> 
                    <i class='bx bx-edit-alt nav_icon' ></i>
                    <span class="nav_name">EDIT ITEM'S DATA</span> 
                  </a> 
                  <a href="admin_materials.php" class="nav_link" style="text-decoration: none;"> 
                    <i class='bx bx-book-content nav_icon'></i>
                    <span class="nav_name">MATERIALS</span> 
                  </a> 
                  <a href="admin_borrow.php" class="nav_link active" style="text-decoration: none;"> 
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
    <div class="Container-fluid ml-4"><br><br><br><br>

      <!-- Load Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"crossorigin="anonymous">
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
      </script>

      <div class="container mt-3">
        <!-- Button trigger modal -->
        <div class="container ml-5">
          <button type="button" class="btn btn-success float-right font-weight-bold text-center text-dark"
            data-toggle="modal" data-target="#exampleModal" >
            <i class='bx bx-add-to-queue'></i>
          </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-primary">
                   INFORMATION ABOUT ISSUE ITEM
                </h5>
                <button type="button" class="close"
                  data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">
                    ×
                  </span>
                </button>
              </div>
              <div class="container">
                <table class="table table-bordered" >
                  <thead>
                      <tr class="text-center" style="font-size: 12px">
                          <th>Stock Id</th>
                          <th>Name</th>
                          <th>Current Quantity</th>
                          <th>Total Quantity</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php include 'configuration.php';         
                        $sql = "SELECT * FROM items;";
                        $materials = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($materials) > 0) {?>
                          <?php 
                          while ($rows = mysqli_fetch_assoc($materials)) {
                            $id = $rows['stock_id'];
                            ?>
                          <tr class="text-center" style="font-size: 12px">                          
                              <td><?=$rows['stock_id'] ?> </td>
                              <td><?=$rows['name_item'] ?> </td>
                              <td><?=$rows['quantity'] ?> </td>
                              <td><?=$rows['t_quantity'] ?> </td>
                          </tr> 
                          <?php }?>
                        <?php }?>               
                  </tbody>
              </table> 
              </div>
              <div class="modal-body" >

                <div class="container ">
                  <form method="POST" action="admin_borrow_insert.php">
                    <div class="row">
                      <div class="col">
                        <label class="mb-2">Student Number: </label>
                        <input type="number" class="form-control" placeholder="Student Number" name="std_num" required>
                      </div>
                      <div class="col">
                        <label class="mb-2">Section:</label>
                        <input type="text" class="form-control" placeholder="Section" name="section" required>
                      </div>                       
                    </div>

                    <div class="row mt-3">
                      <div class="col">
                        <label class="mb-2">Name:</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                      </div>
                      <div class="col">
                        <label class="mb-2">Contact Number:</label>
                        <input type="tel" class="form-control" placeholder="Contact Number" name="c_num" required>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col">
                        <label class="mb-2">Stock Name:</label>
                        <select class="form-select" name="stock_name" required>
                    <?php
                      include 'configuration.php';
                      $sql = "SELECT stock_id, name_item FROM items;";
                      $stocks = mysqli_query($conn, $sql);
                      if (mysqli_num_rows($stocks) > 0) {
                      while ($rows = mysqli_fetch_assoc($stocks)) {
                      echo '<option value="' . $rows['stock_id'] . '">' . $rows['name_item'] . '</option>';
                }
            }
            ?>
                </select>
                      </div>
                      <div class="col">
                      <label class="mb-2">Stock Id:</label>
                      <select class="form-select" name="stock_id" required>
                    <?php
                    // Reset the query pointer to the beginning
                    mysqli_data_seek($stocks, 0);
                    while ($rows = mysqli_fetch_assoc($stocks)) {
                        echo '<option value="' . $rows['stock_id'] . '">' . $rows['stock_id'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>

                       
                    </div>
                    <div class="row mt-3">
                      <div class="col">
                          <label class="mb-2"> Quantity</label>
                        <input type="number" class="form-control" placeholder="Quantity" name="quantity" required>
                      </div>
                      <div class="col">
                        <label class="mb-2">Lab In-charge:</label>
                        <input type="text" class="form-control" placeholder="Laboratory In-charge" name="lab_incharge" required>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col">
                        <label class="mb-2">Date Issue:</label>
                        <input type="date" class="form-control" placeholder="Date Issue" name="date_issue" required>
                      </div>
                      <div class="col">
                        <label class="mb-2">Due Date</label>
                        <input type="date" class="form-control" placeholder="Due Date" name="due_date" required>
                      </div>
                    </div>
                      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                      data-dismiss="modal">
                      Close
                    </button>
                
                    <input type="submit"class="btn btn-primary" placeholder="Save changes" name="issue">
                  </div>
                  </form>
                 
                </div>
              </div>           
            </div>
          </div>
        </div>
      </div>


    <div>
      <p class=" text-center mt-4 h2" style="color: #004500; font-weight: bolder;"> BORROW TRANSACTION</p>
    </div>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr class="">
                <th>Student Number</th>
                <th>Name</th>
                <th>Section</th>
                <th>Contact Number</th>
                <th>Stock ID</th>
                <th>Stock Name</th>
                <th>Total Quantity</th>
                <th>Lab In-Charge</th>
                <th>Date Issue</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'configuration.php';         
              $sql = "SELECT * FROM borrow_transaction;";
              $borrow_transaction = mysqli_query($conn, $sql);
              if (mysqli_num_rows($borrow_transaction) > 0) {?>
                <?php 
                while ($rows = mysqli_fetch_assoc($borrow_transaction)) {?>
                <tr>                          
                    <td><?=$rows['std_num'] ?> </td>
                    <td><?=$rows['name'] ?> </td>
                    <td><?=$rows['section'] ?> </td>
                    <td><?=$rows['c_num'] ?> </td>
                    <td><?=$rows['stock_id'] ?> </td>
                    <td><?=$rows['stock_name'] ?> </td>
                    <td><?=$rows['t_quantity'] ?> </td>
                    <td><?=$rows['lab_incharge'] ?> </td>
                    <td><?=$rows['date_issue'] ?> </td>
                    <td><?=$rows['due_date'] ?> </td>
                    <td><a href="admin_print.php?cid=<?php echo $rows['std_num']; ?>"><i class='bx bx-printer'></i></a>
                      <!-- Button trigger modal -->
                    
                    </td>
                </tr>
                <?php }?>
            <?php }?>
        </tbody>
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