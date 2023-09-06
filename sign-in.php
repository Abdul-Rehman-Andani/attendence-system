<?php require "header.php"; ?>

<section>

    <div class="row sign-container d-flex justify-content-center align-items-center">

        <div class="col-5 p-4 bg-white sign">

        <h3 class="mb-4">Sign in</h3>

        <form action="">

           <div class="input-group mb-4 align-items-center">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="email">
           </div>

           <div class="input-group mb-4 align-items-center">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="password">
           </div>

           <button class="bg-primary text-white mb-4">Sign in</button>


        </form>

        <p class="text-center">
            <a href="">Forgot password ? </a>
        </p>

        <p class="text-center">
            <a href="sign-up.php" >Don't have an account ? sign up </a>
        </p>

        </div>

    </div>

</section>

<?php require "footer.php"; ?>