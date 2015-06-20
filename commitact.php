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
        <div class="col-md-12 column">
            <?php
            include("mysql_connect.php");

            $name1 = @$_SESSION['username1'];
            $name2 = @$_POST['name2'];
            $name2 = eregi_replace("[\']+<>/" , '' ,$name2);
            $date = @$_POST['date'];
            $date = eregi_replace("[\']+<>" , '' ,$date);
            $time = @$_POST['time'];
            $time = eregi_replace("[\']+<>" , '' ,$time);
            $site = @$_POST['site'];
            $site = eregi_replace("[\']+<>" , '' ,$site);
            $info = @$_POST['info'];
            $info = eregi_replace("[\']+<>" , '' ,$info);
            $fileContents = "";
            $filetype = "";
            if (@$_FILES['image']['size'] > 0){
                $filename = @$_FILES['image']['name'];
                $tmpname = @$_FILES['image']['tmp_name'];
                $filetype = @$_FILES['image']['type'];
                $filesize = @$_FILES['image']['size'];
                move_uploaded_file($_FILES["image"]["tmp_name"],"img/upload/".$_FILES["image"]["name"]);
            }
            
                    
            

            if($name1 != null && $name2 != null && $date != null)
            {
                    //新增資料進資料庫語法
                    $str="SELECT 活動ID FROM 活動";
                    $list = mysql_query($str);
                    $n = mysql_num_rows($list);
                    $n = $n + 1;
                    $sql = "insert into 活動 (活動ID, 使用者名稱, 活動名稱, 活動日期, 活動時間, 活動地點, 活動資訊, 圖片名稱) values ('$n', '$name1', '$name2', '$date', '$time', '$site', '$info', '".$filename. "')";
                    if(mysql_query($sql))
                    {
                            echo '<hr class="featurette-divider"><h3>活動創辦成功!!</h3><hr class="featurette-divider">';
                    }
                    else
                    {
                            echo '<hr class="featurette-divider">活動創辦失敗!<br><hr class="featurette-divider">';
                    }
            }
            else
            {
                    echo '<hr class="featurette-divider"><h3>活動名稱和日期不可為空<h3><hr class="featurette-divider">';
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
