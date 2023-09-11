<?php

require "header.php";
?>


<div class="row ">

    <?php include "side-bar.php"; ?>

    <div class="col-9 mx-auto mt-4">
        

            <div class="row">

                <?php

                include "config.php";

                $sql = $conn->query("SELECT COUNT(id) AS 'teacher'  FROM teacher");

                $result = $sql->fetch(PDO::FETCH_ASSOC);
                $teacher = $result['teacher'];

                $sql1 =  $conn->query("SELECT COUNT(id) AS 'std'  FROM student");
                $result1 = $sql1->fetch(PDO::FETCH_ASSOC);
                $std = $result1['std'];

                ?>

                <div class="col-4">
                    <div class="sec bg-white p-3" id="sec-1">
                        <div class="header d-flex justify-content-between">
                            <h5>Teachers</h5>
                            <h4><i class="fa-solid fa-chalkboard-user"></i></h4>
                        </div>
                        <h4 class="text-center"><?php echo $teacher; ?></h4>
                    </div>
                </div>

                <div class="col-4">
                    <div class="sec bg-white p-3" id="sec-2">
                        <div class="header d-flex justify-content-between">
                            <h5>Students</h5>
                            <h4><i class="fa-solid fa-graduation-cap"></i></h4>
                        </div>
                        <h4 class="text-center"><?php echo $std; ?></h4>
                    </div>
                </div>

                <div class="col-4">
                    <div class="sec bg-white p-3" id="sec-3">
                        <div class="header d-flex justify-content-between">
                            <h5>Staff</h5>
                            <h4><i class="fa-solid fa-users"></i></h4>
                        </div>
                        <h4 class="text-center">0</h4>
                    </div>
                </div>

                

            </div>
    </div>

</div>

<?php require "footer.php"; ?>