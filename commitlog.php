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
                include("mysql_connect.php");
                $id = $_POST['id'];
                $id = eregi_replace("[\']+<>" , '' ,$id);
                $pw = $_POST['pw'];
                $pw = eregi_replace("[\']+<>" , '' ,$pw);
                $select = $_POST['select'];
                if(!get_magic_quotes_gpc()){
                    $id=mysql_real_escape_string($id);
                    $pw=mysql_real_escape_string($pw);
                }
                if($select == 1){
                    $sql = "SELECT * FROM account_man where username = '$id'";
                    $result = mysql_query($sql);
                    $row = mysql_fetch_row($result);
                    if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw){
                        //將帳號寫入session，方便驗證使用者身份
                        $_SESSION['username1'] = $id;
                        echo '<h3>登入成功!</h3>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';   
                    }
                    else
                    {
                        echo '<h3>登入失敗!</h3>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';      
                    } 
                }elseif($select == 2){
                    $sql = "SELECT * FROM account where username = '$id'";
                    $result = mysql_query($sql);
                    $row = mysql_fetch_row($result);
                    if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw){
                        //將帳號寫入session，方便驗證使用者身份
                        $_SESSION['username2'] = $id;
                        echo '<h3>登入成功!</h3>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';   
                    }
                    else
                    {
                        echo '<h3>登入失敗!</h3>';
                        echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';      
                    } 
                }else{
                    echo "<h3>你沒有選你要哪種帳號!!!</h3>";
                   echo '<meta http-equiv=REFRESH CONTENT=1;url='.$_SESSION['back'].'>';    
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
