<?php


$name_error = "";
$email_error = "";
$password_error = "";
$error = "";
$name = "";
$email = "";
$password = "";
$class = "";
$class_error = "";

function validate($val){

  $result = trim(htmlspecialchars(strip_tags(addslashes(($val)))));
  return $result;

}

  if(isset($_POST['submit'])){

    $name =trim( $_POST['name']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $course = $_POST['class'];


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

    if(empty($course)){
     $class_error = "<span>Required</span>";
   }
   else{
     $class =  validate($course);
   }

    //  validation for password
    if(empty($password)){
      $password_error = "<span>Required</span>";
    }
    else{
      $password = password_hash($password, PASSWORD_DEFAULT);
      $password = validate($password);
    }

    if(empty($name_error) && empty($email_error) && empty($password_error) && empty($class_error)){

          include "config.php";

          $sql = $conn->prepare("INSERT INTO teacher (name, email ,password, class) VALUES (:name, :email, :password, :class)");
          $sql->bindParam(":name",$name , PDO::PARAM_STR);
          $sql->bindParam(":email",$email , PDO::PARAM_STR);            
          $sql->bindParam(":password",$password , PDO::PARAM_STR);
          $sql->bindParam(":class",$class , PDO::PARAM_STR);


           $result = $sql->execute();


          if($result){
               header("Location:teacher.php");
          }
    } 
}

?>


<?php include "header.php"; ?>

<div class="row">

     <?php include "side-bar.php";  ?>

     <div class="col-9 mx-auto">


          <div class="row sign-container d-flex justify-content-center align-items-center">


               <div class="col-6 sign p-4">

                    <h4 class="mb-4">Add teacher</h4>

                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

                         <div class="input-group mb-4 d-flex align-items-center">
                              <i class="fa-solid fa-user"></i>
                              <input type="text" placeholder="Name" name="name">
                         </div>

                         <div class="input-group mb-4 align-items-center">
                              <i class="fa-solid fa-envelope"></i>
                              <input type="email" placeholder="Email" name="email">

                         </div>

                         <div class="input-group mb-4 align-items-center">
                              <i class="fa-solid fa-lock"></i>
                              <input type="password" placeholder="Password" name="password">
                         </div>


                         <div class="input-group mb-4 align-items-center">
                              <i class="fa-solid fa-house"></i>
                              <input type="text" placeholder="Class" name="class">
                         </div>

                         <button name="submit" type="submit" class="bg-primary text-white mb-4">Add teacher</button>


                    </form>

               </div>

          </div>

     </div>

</div>


<?php include "footer.php"; ?>