<?php
/*
    addUser 
*/
include_once('../includes/connection.php');
$sql = "INSERT INTO users (first_name, last_name, email_address, password) VALUES (?, ?, ?, ?)";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt, "ssss", $fName, $lName, $email, $password);
        $fName = $_REQUEST["fname"];
        $lName = $_REQUEST["lname"];
        $email = $_REQUEST["eaddr"];
        $password = password_hash($_REQUEST["password"], PASSWORD_DEFAULT);
        if(mysqli_stmt_execute($stmt))
        {
            echo "Account added succesfully";
        }
        else
        {
            echo "ERROR: Could not execute query: $sql. ";
        }
    }
    else
    {
        echo "could not make account\n";
        echo mysqli_error($conn);
    }
}

mysqli_stmt_close($stmt);

header("Location: ../welcome.php")
?>