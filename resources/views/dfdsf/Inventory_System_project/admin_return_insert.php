<?php
include('configuration.php');

if (isset($_POST['return'])) {
    $std_num = $_POST['std_num'];
    $name = $_POST['name'];
    $stock_name = $_POST['stock_name'];
    $stock_id = $_POST['stock_id'];
    $quantity = $_POST['quantity'];
    $date_issue = $_POST['date_issue'];
    $lab_incharge = $_POST['lab_incharge'];
    $condition = $_POST['condition'];
    $penalty = $_POST['penalty'];
    $serviceable_item = $_POST['serviceable_item'];
    $condemn_items = $_POST['condemn_items'];
    $missing_item = $_POST['missing_item'];
    $date_return = $_POST['date_return'];

    // Check if the corresponding borrow transaction exists
    $checkBorrowQuery = "SELECT * FROM borrow_transaction WHERE std_num = '$std_num' AND stock_id = '$stock_id' AND date_issue = '$date_issue'";
    $borrowResult = mysqli_query($conn, $checkBorrowQuery);

    if (mysqli_num_rows($borrowResult) > 0) {
        // Borrow transaction exists, proceed with the return

        // Update item quantity in the database
        $sql_update = "SELECT quantity FROM items WHERE stock_id = '$stock_id' AND name_item = '$stock_name'";
        $result = mysqli_query($conn, $sql_update);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $t_quantity = $row['quantity'];
            $update_quantity = $t_quantity + $quantity;

            $update = "UPDATE items SET quantity ='$update_quantity' WHERE stock_id = '$stock_id'";
            mysqli_query($conn, $update);
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Insert data into return_transaction table
        $sql = "INSERT INTO return_transaction VALUES ('', '$std_num', '$name', '$stock_id', '$stock_name', '$quantity', '$date_issue', '$date_return', '$lab_incharge', '$condition', '$penalty', '$serviceable_item', '$condemn_items', '$missing_item')";

        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript"> alert("Return Completed! "); 
                window.location = "admin_return.php"; </script>';
        } else {
            echo "ERROR: " . mysqli_error($conn);
        }
    } else {
        // Borrow transaction does not exist, handle this case (e.g., display an error message)
        echo '<script type="text/javascript"> alert("Error: Corresponding Borrow Transaction does not exist!"); </script>';
    }
}
?>
