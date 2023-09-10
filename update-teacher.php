<?php

    require "config.php";

    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['id'];
    $name = $data['name'];
    $email = $data['email'];
    $class= $data['room'];

    $sql = $conn->prepare("UPDATE teacher SET name = :name, email = :email, class= :class WHERE id = :id");
    $sql->bindParam(":name", $name);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":class", $class);
    $sql->bindParam("id", $id);
    $sql->execute();

?>