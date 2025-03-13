<?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=db11";
    $conn = new PDO($dsn, "admin", "1234");
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `tickets` (`firstname`, `lastname`, `phone`, `password`) 
            VALUES ('$firstname', '$lastname', '$phone', '$password')";
    
    $result = $conn->exec($sql);
    echo $result > 0 ? "成功" : "失敗";
?>
