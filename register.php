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


    <script type="text/javascript">
        function check()
        {
            if(reg.username.value == "") 
            {
                    alert("請輸入帳號");
            }
            else if(reg.pw.value == "")
            {
                    alert("請輸入密碼");
            }
            else if(reg.pw.value != reg.pw2.value)
            {
                    alert("密碼不一致");
            }
            else if(reg.nickname.value == "")
            {
                     alert("請輸入暱稱");
            }
            else if(reg.email.value == "")
            {
                     alert("請輸入E-mail");
            }
            else reg.submit();
         }
    </script>

    <!-- Insert into database -->
     <div class="container">
        <div class="col-md-6 column">
            <form role="form" method="POST" action="commitreg.php" name = "reg">
                <h3>
                註冊
                </h3>
                <div class="form-group">
                    <label for="exampleInputlength">帳號種類</label><br>
                    <label class="radio-inline"><input type="radio" name="select" value = "1">主辦者</label>
                    <label class="radio-inline"><input type="radio" name="select" value = "2">參加者</label>
                </div>
                <div class="form-group">
                    <label for="exampleInputlength">帳號</label><input type="text" class="form-control" name="id">
                </div>
                <div class="form-group">
                    <label for="exampleInputlength">密碼</label><input type="password" class="form-control" name="pw">
                </div>
                <div class="form-group">
                    <label for="exampleInputlength">請再輸入一次密碼</label><input type="password" class="form-control" name="pw2">
                </div>
                <div class="form-group">
                    <label for="exampleInputlength">名稱</label><input type="text" class="form-control" name="nickname">
                </div>
                <div class="form-group">
                    <label for="exampleInputlength">E-mail</label><input type="text" class="form-control" name="email">
                </div>
                <button type="submit" class="btn btn-default">送出</button>
                <!-- <input type="button"  value = "送出" onClick="check()"> -->
            </form>
        </div>
    </div>


    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
