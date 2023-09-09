<?php

    include "config.php";

    $sql = $conn->query("SELECT * FROM teacher");

    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);



?>