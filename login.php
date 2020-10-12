<?php
/*
    addUser 
*/
include_once('../includes/connection.php');
$sql = "SELECT * FROM users WHERE email_address='?'";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    /*if($stmt = $conn->prepare($sql))
    {
        $stmt->bind_param("s", $email);
        $email = $_REQUEST["eaddr"];
        echo $email;
        $password = $_REQUEST["password"];
        echo $password;
        if($stmt->execute())
        {
            if(!$result = $stmt->get_result())
            {
                echo "fail";
            }
            if(!$accountInfo = $result->fetch_all(MYSQLI_ASSOC))
            {
                echo "could not make associative array";
            }
            echo $accountInfo['email_address'];
            echo $accountInfo['password'];
            echo "Account found succesfully";
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
    }*/

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_REQUEST["eaddr"];
        $email = htmlspecialchars($email);
        $password = $_REQUEST["password"];
        $password = htmlspecialchars($password);
    }

    $sql = "SELECT email_address, password FROM users WHERE email_address= '". $email. "'";
    $result = $conn -> query($sql);

    // Associative array
    $accountInfo = $result -> fetch_assoc();
    $hashed_password = $accountInfo['password'];

    validateAccount($conn, $email, $password, $hashed_password);
}

mysqli_stmt_close($stmt);

function validateAccount($conn, $email, $password, $hashed_password){
    $sql2 = "SELECT * FROM users Where email_address='?'";
    if(password_verify( $password, $hashed_password))
    {
            if($stmt = mysqli_prepare($conn, $sql2))
        {
            mysqli_stmt_bind_param($stmt, "s", $email);
            if($result = mysqli_stmt_execute($stmt))
            {
                echo "Account found succesfully";
            }
            else
            {
                echo "ERROR: Could not execute query: $sql2. ";
            }
        }
        else
        {
            echo "could not make account\n";
            echo mysqli_error($conn);
        }
        createSession($email);
    }
    else
    {
        echo "Could not find account";
    }
}

function createSession($email)
{
    echo "Session Created";
}

mysqli_stmt_close($stmt);
echo "DONE";
?>