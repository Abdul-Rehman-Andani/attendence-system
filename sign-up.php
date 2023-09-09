<?php

include "config.php";

$name_error = "";
$email_error = "";
$password_error = "";
$error = "";
$name = "";
$email = "";
$password = "";
$success = "";

function validate($val){

  $result = trim(htmlspecialchars(strip_tags(addslashes(($val)))));
  return $result;

}

  if(isset($_POST['submit'])){

    $name =trim( $_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];


    // validation for name
    if(empty($name)){
      $name_error = "<span>Required</span>";
    }
    else if(strlen($name) < 3){
      $name_error = "<span>Name must be equal or greater than 3 characters</span>";
    }
    else{
      $name =  validate($name);
      
    }

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
      $password = password_hash($password, PASSWORD_DEFAULT);
      $password = validate($password);
    }

    if(empty($name_error) && empty($email_error) && empty($password_error)){


        $sql = $conn->prepare("SELECT * FROM user WHERE email = :email ");
        $sql->bindParam(":email",$email , PDO::PARAM_STR);
        $sql->execute();

        $result = $sql->rowCount();

        if($result > 0){
            echo "Email is already taken";
        }
        else{
            $sql1 = $conn->prepare("INSERT INTO user (name, email ,password) VALUES (:name, :email, :password)");
            $sql1->bindParam(":name",$name , PDO::PARAM_STR);
            $sql1->bindParam(":email",$email , PDO::PARAM_STR);            
            $sql1->bindParam(":password",$password , PDO::PARAM_STR);

            $result1=  $sql1->execute();

            if($result1){
                header("Location:sign-in.php");
            }
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
            <h3 class="mt-1">Sign up</h3>
        </header>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

           <div class="input-group mb-4 d-flex align-items-center">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Username" name="name" value="<?php echo $name ?>">
                <span class="text-danger"><?php echo $name_error ?></span>
           </div>

           <div class="input-group mb-4 align-items-center">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="email" value="<?php echo $email ?>">
                <span class="text-danger"><?php echo $email_error ?></span>
           </div>

           <div class="input-group mb-4 align-items-center">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Password" name="password" value="<?php echo $password ?>">
                <span class="text-danger"><?php echo $password_error ?></span>
           </div>

           <button name="submit" type="submit" class="bg-primary text-white mb-4">Sign up</button>


        </form>

        <p class="text-center">
            <a href="sign-in.php">Already have an account ? sign in </a>
        </p>

        </div>

    </div>

</section>

<?php require "footer.php"; ?>