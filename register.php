<?php 

include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/validation/uservalidation.php"; // to use uservalidation in this page
include_once "app/models/User.php";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


// check if the form have been submitted or not
if(isset($_POST['submit'])){
    $errors=[];

 $validation = new userValidation;
 $validation->setPassword($_POST['password']);
 $validation->setConfirm($_POST['confrimPassword']);
 $passwordValidation = $validation->passwordValidation();

 $validation->setEmail($_POST['email']);
 $emailValidation = $validation->emailValidation();
//  print_r($emailValidation);die;

 if( empty($emailValidation) AND empty($paswordValidation) ){
     $user = new user;
     $user->setName($_POST['name']);
     $user->setPassword($_POST['password']);
     $user->setEmail($_POST['email']);
     $user->setPhone($_POST['phone']);
     $user->setGender($_POST['gender']);
     $ranCode = rand(10000,99999);
     $user->setCode($ranCode);
     $emailExists =  $user->emailCheck($_POST['email']);
     if(empty($emailExists)){
     $result = $user->insertData();
     if($result){
                    // send code via mail

 

              //Instantiation and passing `true` enables exceptions
              $mail = new PHPMailer(true);

              try {
                  //Server settings
                  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                  $mail->isSMTP();                                            //Send using SMTP
                  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                  $mail->Username   = 'ntiecommece@gmail.com';                     //SMTP username
                  $mail->Password   = 'NTI@123456';                               //SMTP password
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                  $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                  //Recipients
                  $mail->setFrom('ntiecommece@gmail.com', 'Ecommerce');
                  $mail->addAddress($_POST['email']);               //Name is optional

                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = 'Verification Code';
                  $mail->Body    = '  <p> Dear ' . $_POST['name'] . ',</p>
                                      <p> Your Verification Code :<b>' . $code . '</b></p>
                                      <p><b>Thank You</b></p>';

                  $mail->send();
                  header('Location:check-code.php?email='.$_POST['email'].'&forget=0');
              } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }

     }else{
             $errors['somthing'] = "<div class='alert alert-danger'>something error</div>";
     }
    }else{
        $errors['email'] = "<div class='alert alert-danger'>email already exist</div>";
    }
 }

}

// validation stage (password == confirmed password , password has specific pattern , email has specific pattern g@S.C )


// send mail with verification code

?>
<!-- header end -->
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>Register</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">

                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> Register </h4>
                            <?php
                            if(isset($errors) && $errors){
                                foreach($errors AS $k=>$value){
                                   echo $value;
                                }
                            }
                            
                            
                            ?>
                        </a>

                    </div>
                    <div class="tab-content">

                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form  method="post">
                                        <input type="text" name="name" placeholder="Username" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>">
                                        <input name="email" placeholder="Email" type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                                        <?php
                                          if(isset($emailValidation) && !empty( $emailValidation )){
                                              foreach($emailValidation AS $key=>$value){
                                                  echo $value;
                                              }
                                          }
                                        ?>
                                        <input name="phone" placeholder="Phone" type="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>">
                                        <input type="password" name="password" placeholder="Password">
                                        <?php
                                          if(isset($passwordValidation) && $passwordValidation ){
                                              foreach($passwordValidation AS $key=>$value){
                                                  echo $value;
                                              }
                                          }
                                        ?>
                                        <input type="password" name="confrimPassword" placeholder="Confirm Password">
                                        <select name="gender" class="form-control mb-4" id="">
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                        </select>
                                        <div class="button-box">
                                            <button type="submit" name="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "layouts/footer.php"; ?>