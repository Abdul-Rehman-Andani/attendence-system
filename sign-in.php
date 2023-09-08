<?php

session_start();
include "config.php";


$email_error = "";
$password_error = "";
$error = "";

$email = "";
$password = "";
$success = "";

function validate($val){

  $result = trim(htmlspecialchars(strip_tags(addslashes(($val)))));
  return $result;

}

  if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // validation for email
    if(empty($email)){
      $email_error = "<span>Required</span>";
    }
    else{
      $email =  validate($email);
    }


    //  validation for password
    if(empty($password)){
      $password_error = "<span>Required</span>";
    }
    else{
      $password = validate($password);
    }


    if(empty($email_error) && empty($password_error)){

        $sql = $conn->prepare("SELECT * FROM student WHERE std_email = :email ");
        $sql->bindParam(":email", $email);
        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $db_pass = $result['std_password'];
        
        if(password_verify($password, $db_pass)){
          $_SESSION['name'] = $result['std_name'];
          header("Location:index.php");
        }
        else{
          $error = "<div id='error' class='text-white text-center'>Account not found</div>";
        }

    }

}
?>


<?php require "header.php"; ?>

<section>

    <div class="row sign-container d-flex justify-content-center align-items-center">

        <div class="col-5 p-4 bg-white sign">

        <header class="d-flex align-items-center gap-3 mb-4">
            <h1><i class="fa-regular fa-user"></i></h1>
            <h3 class="mt-1">Sign in</h3>
        </header>

        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

           <div class="input-group mb-4 align-items-center">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="email" value="<?php echo $email ?>">
                <span class="text-danger"><?php echo $email_error ?></span>
           </div>

           <div class="input-group mb-4 align-items-center">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="password" >
                <span class="text-danger"><?php echo $password_error ?></span>
           </div>

           <button type="submit" name="submit" class="bg-primary text-white mb-4">Sign in</button>

        </form>

        <p class="text-center">
            <a href="">Forgot password ? </a>
        </p>

        <p class="text-center">
            <a href="sign-up.php" >Don't have an account ? sign up </a>
        </p>

        <?php echo $error;  ?>

        </div>

    </div>

</section>

<?php require "footer.php"; ?>