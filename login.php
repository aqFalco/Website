<?php
    $servername = "localhost";
    $database = "login_details";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    
    $user = $_POST["Name"];
    $pass = $_POST["Password"];
    $sql = "select * from users where username = '". $user."'";
    $select = mysqli_query($conn, $sql);
    include "main.html";
    if ($select->num_rows > 0)
    {
        $sqlpass = "select pass from users where username = '". $user."'";
        //$select = mysqli_query($conn, $sql);
        $row=$select->fetch_assoc();
        if ($row["pass"]==$pass)
        {
            echo "Login bem sucedido";
        }
        else
        {
            echo '<script>document.getElementById("wrong-pass-text").innerHTML = "Password errada!";</script>';
        }
    }
    else{

        echo "User nao encontrado";
    }

?>