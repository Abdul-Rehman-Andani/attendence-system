<?php

    require "config.php";

    $sql = $conn->query("SELECT student.id,student.sname, student.email,student.course, teacher.name FROM student INNER JOIN teacher ON student.teacher_id = teacher.id");
    $sql->execute();

    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);

?>

