<?php

    require "config.php";

    $data = json_decode(file_get_contents("php://input"),true);

    $id = $data['id'];

    $sql = $conn->prepare("SELECT student.id,student.sname, student.email,student.course, teacher.name FROM student INNER JOIN teacher ON student.teacher_id = teacher.id WHERE student.id = :id");
    $sql->bindParam(":id", $id);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);

    echo json_encode($result);

?>