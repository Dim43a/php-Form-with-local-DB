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

function normalize_word($string): string
{
    return ucfirst(strtolower($string));
}

function control_letter_length($string):bool {
    if(strlen($string) != 11) {
        echo ("<h2>Wrong personal ID.<br> It must contain 11 symbols. <br> You have entered $string(".strlen($string))." symbols).<br> Please, Try Again</h2>";
        return false;
    } else {
        return true;
    }
}

function control_email($string):bool {
    if(!filter_var($string, FILTER_VALIDATE_EMAIL)) {
        echo ("<h2>Wrong email.<br>You have entered $string.<br> Please, Try Again</h2>");
        return false;
    } else {
        return true;
    }
}

if(!control_letter_length(mysqli_real_escape_string($link, $_REQUEST['personal_id']))
|| !control_email(mysqli_real_escape_string($link, $_REQUEST['email']))){
    die($link);
}

// Escape user inputs for security
$first_name = normalize_word(mysqli_real_escape_string($link, $_REQUEST['first_name']));
$last_name = normalize_word(mysqli_real_escape_string($link, $_REQUEST['last_name']));
$personal_id = mysqli_real_escape_string($link, $_REQUEST['personal_id']);
$grade = mysqli_real_escape_string($link, $_REQUEST['grade']);
$email = strtolower(mysqli_real_escape_string($link, $_REQUEST['email']));
$message = mysqli_real_escape_string($link, $_REQUEST['message']);

$sql = "INSERT INTO students (first_name, last_name, personal_id, grade, email, message) VALUES ('$first_name', '$last_name', '$personal_id', '$grade', '$email', '$message')";
try {
    mysqli_query($link, $sql);
    echo "<h2>$first_name $last_name was successful added to Data Base!</h2>";
} catch (Exception $e) {
    echo "<h2>ERROR: Could not able to execute $sql<br>" . mysqli_error($link)."</h2>";
}
echo "</div>";

// close connection
mysqli_close($link);