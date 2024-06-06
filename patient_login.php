    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Login Page</title>
        <link rel="stylesheet" href="animations.css">  
        <link rel="stylesheet" href="main.css">  
        <link rel="stylesheet" href="index.css">

    </head>
    <body class="bg-light">
    <div class="full-height">
            <center>
            <table border="0">
                <tr>
                    <td width="80%">
                        <font class="edoc-logo">Apollo Hospitals </font>
                        <font class="edoc-logo-sub">| Saving lifes</font>
                    </td>
                    <td  width="10%">
                        <a href="home.php" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">HOME</p></a>
                    </td>
                </tr>
    </table>
        <div class="container mt-5" id="sai">
            <div class="card w-50 mx-auto">
                <div class="card-header">
                    <h2 class="text-center">Login</h2>
                </div>
                <div class="card-body">
                    <div style="margin-bottom:10px;margin-left:-5px;border:1px solid black;padding:10px;">
                    <a href="patient_login.php"style="margin-left:-50px;padding-left:100px;padding-right:50px;padding-top:12px;padding-bottom:12px;background-color:blue;color:black;list-style-type:none;text-decoration:none;">PATIENT LOGIN</a>
                    <a href="doctor_login.php"style="padding-left:50px;padding-right:50px;list-style-type:none;text-decoration:none;">DOCTOR LOGIN</a>
                    <br></div>
                    <form id="loginForm" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <input type="submit" name="submit" class="btn btn-primary btn-block"value="submit">
                    </form>
                    <p id="error-message" class="mt-3 text-danger text-center"></p>
                    <p class="mt-3 text-center">Don't have an account? <a href="patient_signup.php">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="login.js"></script>
    </body>
    </html>
    <?php 
    $error='';
    if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password is invalid";
    }
    else
    {
    $usernames=$_POST['username'];
    $passwords=$_POST['password'];
    $host="localhost";
    $user="root";
    $password="";
    $db="sai";
    $data=mysqli_connect($host,$user,$password,$db);
    if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
    }
    $sql = "SELECT * FROM registration WHERE username = '{$usernames }' AND passwords = '{$passwords}' LIMIT 1";
    $result = $data->query($sql);
    if ($result->num_rows >0) {
    $row = $result->fetch_assoc();
    $field1name = $row["name"];
    $field2name = $row["age"];
    $field3name = $row["phoneno"];
    session_start();
    $_SESSION["name"]=$field1name;
    $_SESSION["age"]=$field2name;
    $_SESSION["phone"]=$field3name;
    }
    if (isset($_POST['submit'])) {
        if ($result->num_rows > 0) {
            header("Location: bookappointment.php"); 
        }
        if ($result->num_rows<=0){
            echo"<script>document.getElementById('error-message').innerHTML='no user found';</script>";
        }
    }
    $data->close();
    }
    }
    ?>