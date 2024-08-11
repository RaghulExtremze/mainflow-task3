<?php
include('partials/header.php');
?>
    <div class="register_container">
        <div class="overlay">

        </div>
        <div class="titleDiv">
            <h1 style=" font-family: Arial, Helvetica, sans-serif "class="title">Register</h1><br>
            <span class="subTitle"><u><h3 style="font-family:cursive;">Thanks for choosing us!!</h3></u></span>
        </div>
        <form action="" method="POST">
            <div class="rows grid">
                <div class="row">
                    <label for="username"><h3 style=" font-family: Arial, Helvetica, sans-serif;">User Name</h3></label>
                    <input type="text" id="username" name="username" placeholder="Enter User Name.." required>
                </div>
                <div class="row">
                    <label for="email"><h3 style=" font-family: Arial, Helvetica, sans-serif;">Email Address </h3></label>
                    <input type="email" id="email" name="email" placeholder="Enter Your Email.." required>
                </div>
                <div class="row">
                    <label for="phone"><h3 style=" font-family: Arial, Helvetica, sans-serif;">Phone Number</h3></label>
                    <input type="int" id="phone" name="phone" placeholder="Enter User Phone Number.." required>
                </div>
               
                <div class="row">
                <label for="password"><h3 style=" font-family: Arial, Helvetica, sans-serif;">Password</h3></label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password.." required>
                <span id="togglePassword" class="eye-icon">&#128065;</span> 
            </div>
                <div class="row">
                   
                    <input type="submit" id="submitBtn" name="submit" value="Submit" required>
                    <span class="registerLink"> <h3 style="font-family:cursive;">Have an account already?</h3><a href="index.php"><u><h3 style="font-family:cursive;">Signin</a></h3></u></span>
                </div>
            </div>
        </form>
    </div>
<?php
include('partials/footer.php');
?>
<script src="script.js"></script> 

<?php
if(isset($_POST['submit'])){
    $userName=$_POST['username'];
    $email=$_POST['email'];
    $passWord=$_POST['password'];
    $phone=$_POST['phone'];

    $sql="INSERT INTO admin SET
          usernames='$userName',
           email='$email',        
            passwords='$passWord',
             phone='$phone'
     ";

     $res=mysqli_query($conn,$sql);
     if($res==true){
        $_SESSION['accountCreated']='<span class="addedAccount">Account<br>'.$userName.'<br>Created Successfully!</span>';
        header('location:' .SITEURL.'index.php');
        exit();
     }
     else{
        $_SESSION['unSuccessful']='<span class="fail">Account '.$userName.' Failed!</span>';
        header('location:'.SITEURL.'register.php');
        exit();
     }

}


?>