<!DOCTYPE html>
<html>
<head>
    <title>401 Unauthorized</title>
    <link rel="shortcut icon" href="{{asset('assets/images/DepEd-Logo.png')}}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fe516ea130.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .error-container {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }
        .logo-container {
            color: #333;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        h1  {
            color: #333;
            font-size: 3em;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 1.2em;
        }

        .home-link {
            text-decoration: none;
            color: #fff;
           /* background-color: #3498db;*/
           background-color: #1b651b;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }
        
    </style></head>
<body>
    <div class="error-container">
        <div class="logo-container">
        <img style="width: 80px; height:85px; " src="{{asset('assets/images/DepEd-Logo.png')}}" alt="logo">
        <h5 class="mb-4">HRMO Offline System</h5>
        </div>
        
        <h1>401 - Unauthorized</h1>
        <p>Sorry, you are not authorized to access this page.</p>
        <a href="/" class="home-link">Go to Homepage</a>
    </div>
    <br>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
