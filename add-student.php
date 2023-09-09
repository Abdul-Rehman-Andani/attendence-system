<?php include "header.php"; ?>


<div class="row">

<?php include "side-bar.php";  ?>

<div class="col-9 mx-auto">


<div class="row sign-container d-flex justify-content-center align-items-center">


<div class="col-6 sign p-4">

<h4 class="mb-4">Add student</h4>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

<div class="input-group mb-4 d-flex align-items-center">
     <i class="fa-solid fa-user"></i>
     <input type="text" placeholder="Name" name="name" >
</div>

<div class="input-group mb-4 align-items-center">
     <i class="fa-solid fa-envelope"></i>
     <input type="email" placeholder="Email" name="email" >
     
</div>

<div class="input-group mb-4 align-items-center">
    <i class="fa-solid fa-book-bookmark"></i>
     <input type="text" placeholder="Program" name="progarm" >
</div>


<button name="submit" type="submit" class="bg-primary text-white mb-4">Add student</button>


</form>

</div>

</div>

</div>

</div>


<?php include "footer.php"; ?>