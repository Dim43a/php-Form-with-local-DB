<?php
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

mysqli_connect("localhost","root", "", "examDB");

// Attempt create table query execution
$sql = "DELETE FROM students";
if (mysqli_query($link, $sql)) {
    echo "<h2>Data from the table was successful deleted.</h2>";
} else {
    echo "<h2>ERROR: Could not able to execute $sql. </h2>" . mysqli_error($link);
}
echo "</div>";
// Close connection
mysqli_close($link);