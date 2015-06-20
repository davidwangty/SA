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

            $id = @$_POST['id'];
            $id = eregi_replace("[\']+<>" , '' ,$id);
            $pw = @$_POST['pw'];  
            $pw = eregi_replace("[\']+<>" , '' ,$pw);
            $pw2 = @$_POST['pw2'];
            $pw2 = eregi_replace("[\']+<>" , '' ,$pw2);
            $nickname = @$_POST['nickname'];
            $nickname = eregi_replace("[\']+<>" , '' ,$nickname);
            $email = @$_POST['email'];
            $email = eregi_replace("[\']+<>" , '' ,$email);
            $select = @$_POST['select'];

            if($id != null && $pw != null && $pw == $pw2)
            {
                if($_SESSION['back'] == null){
                  $_SESSION['back'] = "index.php";
                }
                if($select == 1){
                    //新增主辦者帳號
                    $sql = "insert into account_man (username, password, nickname, email) values ('$id', '$pw', '$nickname', '$email')";
                    if(mysql_query($sql))
                    {
                        echo '<h3>帳號創建成功!!...等待跳轉</h3>';
                        $_SESSION['username1'] = $id;
                        echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';   
                    }
                    else
                    {
                        echo '<h3>帳號創建失敗!...等待跳轉</h3><br>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';   
                    }
                }elseif($select == 2){
                    //新增參加者帳號
                    $sql = "insert into account (username, password, nickname, email) values ('$id', '$pw', '$nickname', 'email')";
                    if(mysql_query($sql))
                    {
                        echo '<h3>帳號創建成功!!...等待跳轉</h3>';
                        $_SESSION['username2'] = $id;
                        echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';   
                    }
                    else
                    {
                        echo '<h3>帳號創建失敗!...等待跳轉</h3>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';   
                    }
                }
                
            }
            elseif($pw != $pw2){
                echo '<h3>密碼不一致...等待跳轉<h3>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';   
            }
            else
            {
                echo '<h3>帳號密碼不可為空...等待跳轉<h3>';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';   
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
