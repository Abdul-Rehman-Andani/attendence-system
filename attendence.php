<?php

require "header.php";
require "config.php";

?>


<div class="row">

    <?php require "side-bar.php"; ?>

    <div class="col-9 mx-auto mt-4">

    <table class="table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Program</th>
        <th class="text-center">Present</th>
        <th class="text-center">Absent</th>
      </tr>

      <?php 

      $id = $_SESSION['tid'];
      
      $sql = $conn->query("SELECT * FROM student WHERE teacher_id = $id ");
      $result = $sql->fetchAll(PDO::FETCH_ASSOC);

      foreach($result as $data){
      
      ?>

        <tr>
            <td><?php echo $data['id'] ?></td>
            <td><?php echo $data['sname'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['course'] ?></td>
            <td class="text-center"><input type="checkbox" value="<?php echo $data['id'] ?>" onclick="present(<?php echo $data['id'] ?>)"></td>
            <td class="text-center"><input type="checkbox" value="<?php echo $data['id'] ?>" onclick="absent(<?php echo $data['id'] ?>)"></td>
        </tr>

    <?php }?>

    </table>

    </div>

</div>


<?php require "footer.php" ?>