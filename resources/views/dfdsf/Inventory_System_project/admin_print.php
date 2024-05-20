<!DOCTYPE html>
<html>
<head>
    <title>Print Part of the Screen</title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
       
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    background: #006200;
    min-height: 100vh;
}

.wrapper{
    max-width: 850px;
    background-color: #fff;
    border-radius: 10px;
    position: relative;
    display: flex;
    margin: 50px auto;
    box-shadow: 0 8px 20px 0px #1f1f1f1a;
    overflow: hidden;
}

.wrapper .form-left{
    background: #005400;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    padding: 20px 40px;
    position: relative;
    width: 100%;
    color: #fff;
}

.wrapper h2{
    font-weight: 700;
    font-size: 25px;
    padding: 5px 0 0;
    margin-bottom: 34px;
    pointer-events: none;
}

.wrapper .form-left p{
    font-size: 0.9rem;
    font-weight: 300;
    line-height: 1.5;
    pointer-events: none;
}

.wrapper .form-left .text{
    margin: 20px 0 25px;
}

.wrapper .form-left p span{
    font-weight: 700;
}

.wrapper .form-left input{
    padding: 15px;
    background: #fff;
    border-top-left-radius: 5px;
    border-bottom-right-radius: 5px;
    width: 180px;
    border: none;
    margin: 15px 0 50px 0px;
    cursor: pointer;
    color: #333;
    font-weight: 700;
    font-size: 0.9rem;
    appearance: unset;
    outline: none;
}

.wrapper .form-left input:hover{
    background-color: #f2f2f2;
}

.wrapper .form-right{
    padding: 20px 40px;
    position: relative;
    width: 100%;
}

.wrapper .form-right h2{
    color: #3786bd;
}

.wrapper .form-right label{
    font-weight: 600;
    font-size: 15px;
    color: #666;
    display: block;
    margin-bottom: 8px;
}

.wrapper .form-right .input-field{
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #e5e5e5;
    border-top-left-radius: 5px;
    border-bottom-right-radius: 5px;
    outline: none;
    color: #333;
}

.wrapper .form-right .input-field:focus{
    border: 1px solid #31a031;
}


.wrapper .option {
    display: block;
    position: relative;
    padding-left: 30px;
    margin-bottom: 12px;
    font-size: 0.95rem;
    font-weight: 900;
    cursor: pointer;
    user-select: none
}

.wrapper .option input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0
}

.wrapper .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #fff;
    border: 2px solid #ddd;
    border-radius: 2px
}

.wrapper .option:hover input~.checkmark {
    background-color: #f1f1f1
}

.wrapper .option input:checked~.checkmark {
    border: 2px solid #e5e5e5;
    background-color: #fff;
    transition: 300ms ease-in-out all
}

.wrapper .checkmark:after {
    content: "\2713";
    position: absolute;
    display: none;
    color: #3786bd;
    font-size: 1rem;
}

.wrapper .option input:checked~.checkmark:after {
    display: block
}

.wrapper .option .checkmark:after {
    left: 2px;
    top: -4px;
    width: 5px;
    height: 10px
}

.wrapper .register{
    padding: 12px;
    background: #3786bd;
    border-top-left-radius: 5px;
    border-bottom-right-radius: 5px;
    width: 130px;
    border: none;
    margin: 6px 0 50px 0px;
    cursor: pointer;
    color: #fff;
    font-weight: 700;
    font-size: 15px;
}

.wrapper .register:hover{
    background-color: #3785bde0;
}

.wrapper a{
    text-decoration: none;
}

@media (max-width: 860.5px) {
    .wrapper{
        margin: 50px 5px;
    }
}


@media (max-width: 767.5px){
    .wrapper{
        flex-direction: column;
        margin: 30px 20px;
    }

    .wrapper .form-left{
        border-bottom-left-radius: 0px;
    }

    
}

@media (max-width: 575px) {

    .wrapper{
        margin: 30px 15px;
    }

    .wrapper .form-left{
        padding: 25px;
    }
    .wrapper .form-right{
        padding: 25px;
    }
} /* Styles for the print-friendly version */
        @media print {
            body * {
                display: ;
            }
            .print-content {
                display: block;
            }
            .button{
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="form-left">
    <?php
        include 'configuration.php';  
          $cid = $_GET['cid'];         
           $sql = "SELECT * FROM borrow_transaction WHERE std_num = '$cid'";
            $borrow_transaction = mysqli_query($conn, $sql);
              if (mysqli_num_rows($borrow_transaction) > 0) {?>
                <?php 
                  while ($rows = mysqli_fetch_assoc($borrow_transaction)) {?>
        <h2 class="text-uppercase">RECEIT</h2>
            <p class="text-center">
               <span>Cavite State University Main Campus</span>

            </p>
            <p class="text-center">
                <span>College of Nursing</span>
            </p>
            <p class="text-center">Borrow Transaction
            </p>
         
        </div>
        <form class="form-right">
                <h2 class="text-uppercase"></h2>
                <div class="row">
                    <div class="col">
                        <label>Student Number:</label>
                        <input type="number" class="form-control" value="<?=$rows['std_num'] ?>" name="std_num"  required>
                      </div>
                      <div class="col">
                        <label>Secton:</label>
                        <input type="text" class="form-control"value="<?=$rows['section'] ?>" name="section" required>
                      </div>                      
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>Name:</label>
                            <input type="text" class="form-control" value="<?=$rows['name'] ?>" name="name" required>
                        </div>
                    </div>
                    <div class="row mt-3">                      
                      <div class="col">
                        <label>Contact Number:</label>
                        <input type="text" class="form-control" value="<?=$rows['c_num'] ?>" name="c_num" required>
                      </div>
                      <div class="col">
                        <label>Quantity:</label>
                        <input type="text" class="form-control" value="<?=$rows['t_quantity'] ?>" name="quantity" required>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col">
                        <label>Stock Name:</label>
                        <input type="text" class="form-control" value="<?=$rows['stock_name'] ?>" name="stock_name" required>
                      </div>
                      <div class="col">
                        <label>Stock Id</label>
                        <input type="text" class="form-control" value="<?=$rows['stock_id'] ?>" name="stock_id" required>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col">
                        <label>Date Issue:</label>
                        <input type="text" class="form-control " value="<?=$rows['date_issue'] ?>" name="due_date" required>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <div class="col">
                        <label>Due Date</label>
                        <input type="text" class="form-control" value="<?=$rows['due_date'] ?>" name="due_date" required>
                      </div>
                    </div>

                    <div class="modal-footer">                                   
                        <button class="btn btn-primary button" onclick="window.print()">Print</button>
                  </div>
            <?php }?>
        <?php }?>
        </form>
    </div>
<script>
        // Function to handle the redirection
        function redirectToAnotherPage() {
            window.location.href = "admin_borrow.php";
        }

        // Attach an event listener to the beforeprint event
        window.onbeforeprint = function() {
            // Print the current page
            window.print();

            // Redirect to another page after a short delay
            setTimeout(redirectToAnotherPage, 2000); // 2000 milliseconds (2 seconds) delay
        };
    </script>
</body>
</html>
