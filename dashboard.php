<?php
include('partials/header.php');
?>

    <div class="dashboard">
        <span>
        <?php
        if(isset($_SESSION['loginMessage'])){
            echo $_SESSION['loginMessage'];
            unset($_SESSION['loginMessage']);
        }
        ?>

        </span>
        <h1>Welcome to the Dashboard!!</h1>
        <div class="LogOutBtn">
            <a href="index.php">Log Out</a>
        </div>
    </div>
<?php
include('partials/footer.php');
?>