<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$hostname = "localhost";
$username = "root";
$password = "";
$database = "examDB";
$link = mysqli_connect($hostname, $username, $password, $database);
//Style sheet inject
echo '<link rel="stylesheet" type="text/css" href="styles/style.css"></head>';
//Back button
echo "<button class='join-btn' onclick='history.go(-1)'>BACK</button>"."<br>";
echo "<div class='main-component '>";
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql = "SELECT * FROM students";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        echo "<h2>Records In DB</h2>";
        echo "<table border='1' style='width:100%'>";
        echo "<tr>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Personal ID</th>";
        echo "<th>Grade</th>";
        echo "<th>Email</th>";
        echo "<th>Message</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['personal_id'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "<h2>No records matching your query were found.</h2>";
    }
} else{
    echo "<h2>ERROR: Could not able to execute $sql. </h2>" . mysqli_error($link);
}
echo "</div>";


// Close connection
mysqli_close($link);