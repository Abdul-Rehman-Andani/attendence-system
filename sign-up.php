<?php require "header.php"; ?>

<section>

    <div class="row sign-container d-flex justify-content-center align-items-center">

        <div class="col-5 p-4 bg-white sign">

        <h3 class="mb-4">Sign up</h3>

        <form action="">

           <div class="input-group mb-4 d-flex align-items-center">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" name="name">
           </div>

           <div class="input-group mb-4 align-items-center">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="email">
           </div>

           <div class="input-group mb-4 align-items-center">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="password">
           </div>

           <button class="bg-primary text-white mb-4">Sign up</button>


        </form>

        <p class="text-center">
            <a href="sign-in.php">Already have an account ? sign in </a>
        </p>

        </div>

    </div>

</section>

<?php require "footer.php"; ?>