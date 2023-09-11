<?php

session_start();

$name_error = "";
$email_error = "";
$error = "";
$name = "";
$email = "";
$program = "";
$program_error = "";
$tid = "" ;


function validate($val){

  $result = trim(htmlspecialchars(strip_tags(addslashes(($val)))));
  return $result;

}

  if(isset($_POST['submit'])){

    $name =trim( $_POST['name']);
    $email = $_POST['email'];
    $program = $_POST['program'];
    $tid = $_SESSION['tid'];



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

    if(empty($program)){
     $program_error = "<span>Required</span>";
   }
   else{
     $program =  validate($program);
   }


    if(empty($name_error) && empty($email_error) && empty($program_error) ){

          include "config.php";

          $sql = $conn->prepare("INSERT INTO student (sname, email ,course, teacher_id) VALUES (:name, :email, :program, :tid)");
          $sql->bindParam(":name",$name , PDO::PARAM_STR);
          $sql->bindParam(":email",$email , PDO::PARAM_STR);            
          $sql->bindParam(":program",$program , PDO::PARAM_STR);
          $sql->bindParam(":tid",$tid , PDO::PARAM_INT);

           $result = $sql->execute();


          if($result){
               header("Location:student.php");
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

                    <h4 class="mb-4">Add student</h4>

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
                              <i class="fa-solid fa-book-bookmark"></i>
                              <input type="text" placeholder="Program" name="program">
                         </div>


                         <button name="submit" type="submit" class="bg-primary text-white mb-4">Add student</button>


                    </form>

               </div>

          </div>

     </div>

</div>


<?php include "footer.php"; ?>