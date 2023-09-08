<?php 
session_start();
require "header.php"; ?>

<div class="row">

    <div class="col-md-12 col-11 mx-auto bg-white table-data">

        <div class="table-responsive">

        <table class="table">
            <tr>
                <td>Roll no</td>
                <td>Name</td>
                <td>Class</td>
                <td>Program</td>
                <td><?php echo $_SESSION['name']; ?></td>
            </tr>
            <tr>
                <td>Roll no</td>
                <td>Name</td>
                <td>Class</td>
                <td>Program</td>
                <td><input type="radio" name="absent"></td>
                <td><input type="radio" name="absent"></td>

            </tr>
        </table>

        </div>

    </div>

</div>


<?php require "footer.php"; ?>