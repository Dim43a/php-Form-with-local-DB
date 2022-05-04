<?php
$link = mysqli_connect("localhost", "root", "");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create database query execution
$sql = "CREATE DATABASE examDB";
if (mysqli_query($link, $sql)) {
    echo "Database created successfully"."<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);

$link = mysqli_connect("localhost", "root", "", "examDB");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

mysqli_connect("localhost","root", "", "examDB");

// Attempt create table query execution
$sql = file_get_contents("table.sql");
if (mysqli_query($link, $sql)) {
    echo "Table created successfully."."<br>";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);













