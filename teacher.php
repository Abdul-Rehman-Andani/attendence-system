<?php require "header.php"; ?>

<div class="model" id="tmodel">
    <i class="fa-solid fa-xmark"></i>

    <div class="row sign-container d-flex justify-content-center align-items-center">



        <div class="col-4 bg-white sign p-4">

            <h4 class="mb-4">Edit teacher</h4>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" id="update-form">

                <div class="input-group mb-4 d-flex align-items-center">
                    <i class="fa-solid fa-id-card-clip"></i>
                    <input type="text" placeholder="ID" name="id" id="id">
                </div>


                <div class="input-group mb-4 d-flex align-items-center">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" placeholder="Name" name="name" id="name">
                </div>

                <div class="input-group mb-4 align-items-center">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" id="email">

                </div>

                <div class="input-group mb-4 align-items-center">
                    <i class="fa-solid fa-house"></i>
                    <input type="text" placeholder="Class" name="class" id="class">
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

                <a href="add-teacher.php" class="add-btn btn btn-primary shadow-none">Add teacher</a>

                <div class="search-bar">
                    <input type="text" placeholder="Search..." id="seacrh-teacher">
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
                        <tbody id='t-table'></tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>

</div>



<?php require "footer.php"; ?>