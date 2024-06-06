<?php
session_start();
?>
<?php
$error='';
if (isset($_POST['submit'])) {
if (empty($_POST['disease'])) {
$error = "Username or Password is invalid";
}
else
{
    if(isset($_SESSION["name"])){
        $name=$_SESSION["name"];
        $age=$_SESSION["age"];
        $phoneno=$_SESSION["phone"];
    }
    else{
        echo"hello";
    }
$disease=$_POST['disease'];
$department=$_POST['department'];
$doctor=$_POST['doctor'];
$host="localhost";
$user="root";
$password="";
$db="sai";
$_SESSION["department"]=$department;
$data=mysqli_connect($host,$user,$password,$db);
if ($data->connect_error) {
  die("Connection failed: " . $data->connect_error);
}
$sql = "insert into appointment values('$name','$age','$phoneno','$disease','$department','$doctor',now())";
 $result = $data->query($sql);
 echo $result;
 header("Location: thankyou.php"); 
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<body class="bg-light">
<div class="full-height">
        <center>
        <table border="0">
            <tr>
                <td width="80%">
                    <font class="edoc-logo">Apollo Hospitals </font>
                    <font class="edoc-logo-sub">| Saving lifes</font>
                </td>
                <td width="10%">
                   <p class="nav-item"><?php echo$_SESSION['name']?></p></a>
                </td>
                <td  width="10%">
                    <a href="home.php" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">LOG OUT</p></a>
                </td>
            </tr>
</table>
</div>
    <div class="container mt-5">
        <div class="card w-75 mx-auto">
            <div class="card-header">
                <h2 class="text-center">book appointment</h2>
            </div>
            <div class="card-body">
                <form id="registrationForm" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                                    <label for="disease">Disease:</label>
                                    <input name="disease" type="text" id="disease" class="form-control" required>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="doctor">Department:
                            </label>
                                <select id="department" name="department" class="form-control" onmouseout="outer()" required>
                                <option value="" selected disabled>Select Department</option>
                                    <option value="Allergy and immunology">Allergy and immunology</option>
                                    <option value="Anesthesiology">Anesthesiology</option>
                                    <option value="Diagnostic radiology">Diagnostic radiology</option>
                                    <option value="Cardiovascular disease">Cardiovascular disease</option>
                                    <option value="Neurology">Neurology</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Urology">Urology</option>
                                    <option value="Ophthalmology">Ophthalmology</option>
                                    <option value="Gynaecology & Obstetrics">Gynaecology & Obstetrics</option>
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                                <label for="disease">Doctor:</label>
                                <input name="doctor" type="text" id="doctor" class="form-control" required>
                        
                        </div>
                        <input name="submit" type="submit" value="submit"class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="registration.js">
    </script>
    <script>
        function outer(){
            var doctors={"Allergy and immunology":"rahul","Anesthesiology":"sumanth","Diagnostic radiology":"uday","Cardiovascular disease":"komal","Neurology":"tarun","Pediatrics":"karthik","Urology":"nithin","Ophthalmology":"bobby","Gynaecology & Obstetrics":"shyam"};
            var a=document.getElementById("department");
            var v=a.value;
            var p=doctors[v];
            document.getElementById("doctor").value=p;
        }
    </script>
</body>
</html>
