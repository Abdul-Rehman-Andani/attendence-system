<?php

    require "config.php";

    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['id'];

    $sql = $conn->prepare("SELECT * FROM teacher WHERE id = :id");
    $sql->bindParam(":id", $id);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);

?>