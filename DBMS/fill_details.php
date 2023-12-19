<?php
$insert = false;
$error = false;
$server = "localhost";
$user = "root";
$password = "";
$con = mysqli_connect($server,$user,$password);

if(!$con){
    die("connection failed due to ".mysqli_connect_error());
}
if(isset($_POST['doctor_id'])){
    $doctor_id = $_POST['doctor_id'];
    $name = $_POST['name'];
    $salary = $_POST['salary'];
    $specialization = $_POST['specialization'];
    $sql = "INSERT INTO `hospital`.`doctors` (`doctor_id`, `name`, `specialization`,`salary`) VALUES ('$doctor_id', '$name', '$specialization','$salary')";

    $result = $con->query($sql);
    if ($result === TRUE) {
        $insert = true;
      } else {
        $error = true;
      }
      $con->close();
}
    
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fill Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://img.freepik.com/free-vector/green-curve-abstract-background_53876-99569.jpg?w=1060&t=st=1697368037~exp=1697368637~hmac=4794a30ea187e1d4f89c3b49b469c2999eded4a8efeebcdaca6210cbb651b762');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .navbar {
            overflow: hidden;
            background-color: #333;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: #4CAF50;
        }
        .navbar a.active {
            background-color: #4CAF50;
            color: white;
        }
        form {
            max-width: 300px;
            margin: 0 auto;
        }
        input[type=text], input[type=email], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        h2{
            text-align: center;
        }
        .selector{
            text-align: center;
        }
        button{
            display: inline-block;
            padding: 14px 20px;
            margin: 18px 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
        }
        button:hover{
            background-color: #45a049;
            cursor: pointer;
        }
        #genDiv{
            text-align: center;
            display: none;
        }
        #okmessage{
            color: rgb(0, 102, 0);
            text-align: center;
            font-weight: bold;
        }
        #errormessage{
            color: rgb(160, 7, 7);
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.html">Home</a>
        <a href="#">About Us</a>
        <a class="active" href="#">Fill Details</a>
        <a href="show_details.php">Show Details</a>
        <a href="inventory.html">Inventory Details</a>
        <a href="hguide.html">Hospital Guidlines</a>
    </nav>
    <h2>Welcome</h2>
    <div class="selector">
        <button id="Doctor" onclick="showDoctor()">Doctor</button>
        <button id="Patient" onclick="showPatient()">Patient</button>
        <button id="Nurse" onclick="showNurse()">Nurse</button>

    </div>
    <div id="genDiv"><button id="generateid" onclick="generateId()">Generate  Patient Id</button></div>
    <div id="formContent">
        <form method="post" action="fill_details.php">
            <label for="doctor_id">Doctor Id</label>
            <input type="text" id="doctor_id" name="doctor_id" placeholder="Your Doctor Id..">
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name..">
            
            <label for="specialization">Specialization</label>
            <input type="text" id="specialization" name="specialization" placeholder="Your specialization..">
        
            <label for="salary">Salary</label>
            <input type="text" id="salary" name="salary" placeholder="Your salary..">
            
            <input type="submit" value="Submit">
        </form>
    </div>
        <div class="message">
            <?php
            if($insert)
                echo "<p id='okmessage'>The data has been saved successfully in the database.</p>";
            if($error)
                echo "<p id='errormessage'>Invalid entry</p>";
            ?>
        </div>
    <script>
        let formContent = document.getElementById('formContent');
        let generateid = document.getElementById('generateid');
        let genDiv = document.getElementById('genDiv');

        function showDoctor(){
            genDiv.style.display = "none";
            formContent.innerHTML=`
            <form method="post" action="fill_details.php">
            <label for="doctor_id">Doctor Id</label>
            <input type="text" id="doctor_id" name="doctor_id" placeholder="Your Doctor Id..">
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name..">
            
            <label for="specialization">Specialization</label>
            <input type="text" id="specialization" name="specialization" placeholder="Your specialization..">
        
            <label for="salary">Salary</label>
            <input type="text" id="salary" name="salary" placeholder="Your salary..">
            
            <input type="submit" value="Submit">
            </form>`
        }
        function showPatient(){
            genDiv.style.display = "block";
            formContent.innerHTML=`
            <form method="post" action="patient.php">
            <label for="pid">Patient Id</label>
            <input type="text" id="pid" name="pid" placeholder="Your Patient Id..">
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name..">
            
            <label for="age">Age</label>
            <input type="text" id="age" name="age" placeholder="Your age..">
            
            <label for="gender">Gender</label>
            <input type="text" id="gender" name="gender" placeholder="Your gender..">
            
            <label for="addres">Address</label>
            <input type="text" id="addres" name="addres" placeholder="Your address..">
            
            <label for="disease">Disease</label>
            <input type="text" id="disease" name=disease" placeholder="Your problem..">

            <input type="submit" value="Submit">
            </form>
            `;
        }
        function showNurse(){
            genDiv.style.display = "none";
            formContent.innerHTML=`
            <form method="post" action="nurse.php">
            <label for="nid">Nurse Id</label>
            <input type="text" id="nid" name="nid" placeholder="Your Nurse Id..">
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name..">
            
            <label for="age">Age</label>
            <input type="text" id="age" name="age" placeholder="Your age..">

            <input type="submit" value="Submit">
            </form>`;
        }
        function generateId(){
            let id = 104;
            generateid.innerText="Your Id : "+id;
        }
    </script>
</body>
</html>