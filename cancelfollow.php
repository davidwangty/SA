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
    
    <div class="container">
        <div class="col-md-6 column">
            <?php 
                include("mysql_connect.php");
                if(@$_SESSION['username2'] != null){
                    $sql = 'DELETE FROM 追蹤 WHERE username = '.@$_SESSION['username2'].' AND 活動ID = '.@$_GET['id'];  
                    if(mysql_query($sql)){
                        echo '<h3>取消追蹤!!</h3>';
                    }
                    else
                    {
                        echo '<h3>取消追蹤...</h3><br>';
                    }
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=show.php?id='.@$_GET['id'].'>'; 
                }else{
                    echo '<h3>請先登入</h3>';
                    $_SESSION['back'] = 'show.php?id='.@$_GET['id'];
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';   
                }
            ?>
        </div>
    </div>


    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
