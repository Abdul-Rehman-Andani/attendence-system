<?php

    require "config.php";

    $data = json_decode(file_get_contents("php://input"), true );
    $value = $data['val'];

    $sql = $conn->query("SELECT * FROM teacher WHERE name LIKE ('%$value%')");
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    
?>