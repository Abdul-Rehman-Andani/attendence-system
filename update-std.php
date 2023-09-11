<?php

    try {
        require "config.php";

        $data = json_decode(file_get_contents("php://input"), true);

        $id = $data['id'];
        $name = $data['name'];
        $email = $data['email'];
        $program = $data['program'];

        $sql = $conn->prepare("UPDATE student SET sname = :name, email = :email , course = :course WHERE id = :id");
        $sql->bindParam(":name", $name);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":course", $program);
        $sql->bindParam(":id", $id);
        $sql->execute();

    } catch (\Throwable $th) {
        $th->getMessage();
    }

?>