<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        body {
    font-family: Arial, sans-serif;
    background-image: url('https://img.freepik.com/free-vector/green-curve-abstract-background_53876-99569.jpg?w=1060&t=st=1697368037~exp=1697368637~hmac=4794a30ea187e1d4f89c3b49b469c2999eded4a8efeebcdaca6210cbb651b762');
    background-size: cover;
    background-repeat: no-repeat;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin: 30px auto;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

caption {
    text-align: left;
    margin-bottom: 10px;
}


    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.html">Home</a>
        <a href="#">About Us</a>
        <a href="fill_details.php">Fill Details</a>
        <a href="show_details.php">Show Details</a>
        <a href="inventory.html">Inventory Details</a>
        <a href="hguide.html">Hospital Guidlines</a>
    </nav>
    <?php
    // Step 1: Establish a connection to the MySQL database
    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your username
    $password = ""; // Replace with your password
    $database = "hospital"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 2: Fetch data from the database
    $sql = "SELECT * FROM doctors"; // Replace with your table name
    $result = $conn->query($sql);

    // Step 3: Display the data as a table
    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        <th>Doctor ID</th>
        <th>Name</th>
        <th>Specialization</th>
        <th>Salary</th>
        </tr>";
        // Step 4: Iterate through the fetched data
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["doctor_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["specialization"] . "</td>";
            echo "<td>" . $row["salary"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $sql = "SELECT * FROM patients"; // Replace with your table name
    $result = $conn->query($sql);

    // Step 3: Display the data as a table
    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        <th>Patient Id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Disease</th>

        </tr>";
        // Step 4: Iterate through the fetched data
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["patient_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["adress"] . "</td>";
            echo "<td>" . $row["disease"] . "</td>";
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $sql = "SELECT * FROM nurse"; // Replace with your table name
    $result = $conn->query($sql);

    // Step 3: Display the data as a table
    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        <th>Nurse ID</th>
        <th>Name</th>
        <th>Age</th>
       
        </tr>";
        // Step 4: Iterate through the fetched data
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nurse_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
          
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }



    // Close the connection
    $conn->close();
    ?>

</body>
</html>