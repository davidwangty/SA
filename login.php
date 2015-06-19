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
            <form role="form" method="POST" action="commitlog.php" Enctype="multipart/form-data">
                <h3>
                登入
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
                <button type="submit" class="btn btn-default">送出</button>
            </form>
        </div>
    </div>


    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
