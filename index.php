<?php
include('partials/header.php');
?>

<?php
if(isset($_SESSION['accountCreated'])){
    echo $_SESSION['accountCreated'];
    unset($_SESSION['accountCreated']);
}
?>

<div class="form_container">
    <div class="overlay"></div>
    <div class="titleDiv">
        <h1 style=" font-family: Arial, Helvetica, sans-serif;"class="title">Login</h1><br>
        <span class="subTitle"><u><h3 style="font-family:cursive;">Hi welcome back!!</h3></u></span>
    </div>
    <?php
    if(isset($_SESSION['noAdmin'])){
        echo $_SESSION['noAdmin'];
        unset($_SESSION['noAdmin']);
    }
    ?>
    <form action="" method="POST">
        <div class="rows grid">
            <div class="row">
                <label for="username"><h3 style=" font-family: Arial, Helvetica, sans-serif;">User Name</h3></label>
                <input type="text" id="username" name="username" placeholder="Enter User Name.." required>
            </div>
            <div class="row">
                <label for="password"><h3 style=" font-family: Arial, Helvetica, sans-serif;">Password</h3></label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password.." required>
                <span id="togglePassword" class="eye-icon">&#128065;</span> 
            </div>
            <div class="row">
                <input type="submit" id="submitBtn" name="submit" value="Login" required>
                <span class="registerLink"><h3 style="font-family:cursive;">Don't have an account?</h3><a href="register.php"><u><h3 style="font-family:cursive;">SignUp</h3></u></a></span>
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

    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $passWord = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM admin WHERE usernames='$userName' AND passwords='$passWord'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        $_SESSION['loginMessage'] = '<span class="success">Hello '.$userName.'</span>';
        header('location:' .SITEURL. 'dashboard.php');
        exit();
    } else {
        $_SESSION['noAdmin'] = '<span class="fail">'.$userName.' is not registered!</span>';
        header('location:' .SITEURL. 'index.php');
        exit();
    }
}
?>
