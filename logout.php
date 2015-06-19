<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php
    include 'headlink.php';
?>

<body id="page-top" class="index">

    <!-- Navigation -->
    <?php
        include 'header.php';
    ?>


    <!-- Insert into database -->
     <div class="container">
        <div class="col-md-6 column">
            <?php
                //將session清空
                unset($_SESSION['username1']);
                unset($_SESSION['username2']);
                echo '<h3>登出中......<h3>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
            ?>
        </div>
    </div>


    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
