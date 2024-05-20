<?php
include('configuration.php');

if (isset($_POST['issue'])) {
    
    $std_num = mysqli_real_escape_string($conn, $_POST['std_num']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $c_num = mysqli_real_escape_string($conn, $_POST['c_num']);
    $lab_incharge = mysqli_real_escape_string($conn, $_POST['lab_incharge']);
    $stock_name = mysqli_real_escape_string($conn, $_POST['stock_name']);
    $stock_id = mysqli_real_escape_string($conn, $_POST['stock_id']);
    $quantity = intval($_POST['quantity']);
    $date_issue = mysqli_real_escape_string($conn, $_POST['date_issue']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);

    // Check if the item exists in the items table
    $checkItemQuery = "SELECT * FROM items WHERE stock_id = '$stock_id' AND name_item = '$stock_name'";
    $itemResult = mysqli_query($conn, $checkItemQuery);

    if (mysqli_num_rows($itemResult) > 0) {
        // Item exists, proceed with the borrowing

        // Update item quantity in the database
        $updateQuery = "UPDATE items SET quantity = quantity - $quantity WHERE stock_id = '$stock_id' AND name_item = '$stock_name'";
        mysqli_query($conn, $updateQuery);

        // Insert data into borrow_transaction table
        $sql = "INSERT INTO borrow_transaction (stock_id, stock_name, t_quantity, std_num, name, section, c_num, lab_incharge, date_issue, due_date)
                VALUES ('$stock_id', '$stock_name', $quantity, '$std_num', '$name', '$section', '$c_num', '$lab_incharge', '$date_issue', '$due_date')";

        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript"> alert("Transaction successfully!"); 
                window.location = "admin_borrow.php"; </script>';
        } else {
            echo "ERROR: " . mysqli_error($conn);
        }
    } else {
        // Item does not exist, handle this case (e.g., display an error message)
        echo '<script type="text/javascript"> alert("Error: Item does not exist!"); </script>';
    }
}

// ... (the rest of your code)

mysqli_close($conn);
?>
