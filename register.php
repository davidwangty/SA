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

    <script>
        function validateForm(form){
            if(form.id.value == "") 
            {
                alert("請輸入帳號！");
            }
            else if(form.pw.value == "")
            {
                alert("請輸入密碼！");
            }
            else if(form.pw.value != form.pw2.value)
            {
                alert("密碼不一致！");
            }
            else if(form.nickname.value == ""){
                alert("請輸入暱稱！");
            }
            else{
                index = form.email.value.indexOf ('@', 0);     // 找出 @ 的位置
                if (form.email.length==0) {
                    alert("請輸入E-mail！");
                } else if (index==-1) {
                    alert("錯誤：E-mail必須包含「@」。");
                } else if (index==0) {
                    alert("錯誤：E-mail「@」之前不可為空字串。");
                } else if (index==form.email.value.length-1) {
                    alert("錯誤：E-mail「@」之後不可為空字串。");
                } else{
                    form.submit();
                    return(true);
                }
            }
            return(false);
        }
        function login(form){

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
                    <div class="radio">
                        <label class="radio-inline"><input type="radio" name="select" value = "1">主辦者</label>
                        <label class="radio-inline"><input type="radio" name="select" value = "2" checked>參加者</label>
                    </div>
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
                <button type="button" class="btn btn-default" onClick="validateForm(this.form)">送出</button>
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
