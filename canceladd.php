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
                $id = @$_GET['id'];
                $str = "SELECT * FROM 活動 WHERE 活動ID = $id";
                $list = mysql_query($sql);
                $nums = $nums=mysql_num_rows($list);
                if($nums == 0){
                    echo '<h3>s您是想參加這個嗎?!!</h3>';
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=show.php?id=0>'; 
                }
                if(@$_SESSION['username2'] != null){
                    $sql = 'DELETE FROM 參加 WHERE username = '.@$_SESSION['username2'].' AND 活動ID = '.$id;  
                    if(mysql_query($sql)){
                        echo '<h3>取消參加!!</h3>';
                    }
                    else
                    {
                        echo '<h3>取消失敗...</h3><br>';
                    }
                    echo '<meta http-equiv=REFRESH CONTENT=1;url=show.php?id='.@$_GET['id'].'>'; 
                }else{
                    echo '<h3>s你還沒登入呢?!!</h3>';
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
