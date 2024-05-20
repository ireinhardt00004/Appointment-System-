<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artistic Registration Form with Green Background</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #82C91E;
            font-family: Arial, sans-serif;
        }
        
        .registration-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .registration-card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 400px;
            position: relative;
            overflow: hidden;
        }
        
        .registration-card-header {
            background-color: #65A72E;
            border-radius: 20px 20px 0 0;
            padding: 20px;
            text-align: center;
            color: white;
        }
        
        .registration-form-label {
            font-weight: bold;
        }
        
        .btn-primary {
            background-color: #65A72E;
            border: none;
            width: 100%;
        }
        
        .btn-primary:hover {
            background-color: #568E2A;
        }
        
  
    </style>
</head>
<body>
    <div class="registration-container">
        <div class="registration-card">
            <div class="registration-card-header">
                <h2>Register an Account</h2>
            </div>
            <form method="POST">
                <div class="mb-1">
                    <input type="hidden" name="role" value="student">
                    <label  class="form-label registration-form-label">Student Number</label>
                    <input type="number" class="form-control" placeholder="Student Number" name="std_num" required>
                </div>
                <div class="mb-1">
                    <label  class="form-label registration-form-label">Name:</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                </div>
                <div class="mb-1">
                    <label  class="form-label registration-form-label">Section:</label>
                    <input type="section" class="form-control" placeholder="Section" name="section" required>
                </div>
                <div class="mb-1">
                    <label  class="form-label registration-form-label">Contact Number:</label>
                    <input type="tel" class="form-control" placeholder="Contact Number" name="c_num" required>
                </div>
                <div class="mb-1">
                    <label  class="form-label registration-form-label">Username:</label>
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
                <div class="mb-1">
                    <label  class="form-label registration-form-label">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                </div>
                <div class="mb-1">
                    <label class="form-label registration-form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" name="con_pass" required>
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
            </form>
        </div>
    </div>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password !== confirmPassword) {
                alert("Passwords do not match. Please make sure your passwords match.");
                return false;
            }

            return true;
        }
    </script>
    <!-- Bootstrap JS, Popper.js, and jQuery (required for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Optional: Add your custom scripts for additional functionality -->
<?php

include('configuration.php');

if(isset($_POST['register'])){
    $role = mysqli_real_escape_string($conn, $_REQUEST['role']);
    $std_num = mysqli_real_escape_string($conn, $_REQUEST['std_num']);
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $section = mysqli_real_escape_string($conn, $_REQUEST['section']);
    $c_num = mysqli_real_escape_string($conn, $_REQUEST['c_num']);
    $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $username =sha1($username);
    $password =sha1($password);

    $sql = "INSERT INTO users VALUES ('', '$role', '$std_num', '$name', '$section', '$c_num', '$username', '$password',now())";

    if(mysqli_query($conn, $sql)){
        echo '<script type="text/javascript"> alert("You have successfully created your account for scholar!"); 
            window.location = "admin_borrow.php"; </script>';
    } else{
        echo "ERROR: " . mysqli_error($conn);
    }
}
?>
</body>
</html>
