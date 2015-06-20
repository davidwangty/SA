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
                    $sql = "insert into 追蹤 (username, 活動ID) values ('".@$_SESSION['username2']."',". @$_GET['id'] . ")";  
                    if(mysql_query($sql)){
                        echo '<h3>追蹤成功!!</h3>';
                    }
                    else
                    {
                        echo '<h3>你已經追蹤過此活動了哦...</h3><br>';
                    }
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=show.php?id='.@$_GET['id'].'>'; 
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
