<?php require "header.php"; ?>

<div class="model" id="smodel">
    <i class="fa-solid fa-xmark"></i>

    <div class="row sign-container d-flex justify-content-center align-items-center">



        <div class="col-4 bg-white sign p-4">

            <h4 class="mb-4">Edit teacher</h4>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="std-update-form">

                <div class="input-group mb-4 d-flex align-items-center">
                    <i class="fa-solid fa-id-card-clip"></i>
                    <input type="text" placeholder="ID" name="id" id="std-id">
                </div>


                <div class="input-group mb-4 d-flex align-items-center">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Name" name="name" id="std-name">
                </div>

                <div class="input-group mb-4 align-items-center">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" id="std-email">
                </div>

                <div class="input-group mb-4 align-items-center">
                    <i class="fa-solid fa-book"></i>
                    <input type="text" placeholder="Program" name="class" id="std-program">
                </div>

                <div class="input-group mb-4 align-items-center">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    <input type="text" placeholder="Teacher" name="class" id="std-teacher">
                </div>

                <button name="submit" type="submit" class="bg-primary text-white mb-4">Save changes</button>


            </form>

        </div>

    </div>
</div>

<div class="row ">

    <?php require "side-bar.php"; ?>

    <div class="col-9 mx-auto">

        <div class="row mt-4">

            <div class="col-12 d-flex justify-content-between">

                <div class="btns">
                    <a href="add-student.php" class="add-btn btn btn-primary shadow-none">Add student</a>
                </div>

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
                            <th>Progarm</th>
                            <th>Teacher</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <tbody id="std-table" ></tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>



</div>




<?php require "footer.php"; ?>