<?php require "header.php"; ?>

<div class="row ">

    <?php require "side-bar.php"; ?>

    <div class="col-9 mx-auto">

        <div class="row mt-4">

            <div class="col-12 d-flex justify-content-between">

                <a href="add-teacher.php" class="add-btn btn btn-primary shadow-none">Add teacher</a>

                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>

            </div>

        </div>

        <div class="row">

        <div class="col-12 mt-5">

        <div class="table-responsive">

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Class</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tbody id='table'></tbody>
        </table>

        </div>

        </div>

        </div>

    </div>

</div>


<?php require "footer.php"; ?>