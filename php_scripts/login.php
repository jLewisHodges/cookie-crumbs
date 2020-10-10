<?php
/*
    addUser 
*/
include_once('../includes/connection.php');
$sql = "SELECT email_address, password FROM users Where email_address='?'";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if($stmt = $conn->prepare($sql))
    {
        $stmt->bind_param("s", $email);
        $email = $_REQUEST["eaddr"];
        $password = $_REQUEST["password"];
        if($stmt->execute())
        {
            echo "Account found succesfully";
            $result = $stmt->get_result();

                while($accountInfo = $result->fetch_assoc()){
                    $server_email = $accountInfo["email_address"];
                    echo $server_email;
                    $server_password = $accountInfo["password"];
                    echo $server_password;
                }
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
}

function createSession($email)
{
    
}

mysqli_stmt_close($stmt);
echo "DONE";
?>