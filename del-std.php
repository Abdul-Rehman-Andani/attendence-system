<?php

    require "config.php";

    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['id'];

    $sql = $conn->prepare("DELETE FROM student WHERE id = :id");
    $sql->bindParam(":id", $id);
    $sql->execute();

?>