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
            if(form.name2.value == "") 
            {
                alert("請輸入活動名稱！");
            }
            else if(form.date.value == "")
            {
                alert("請輸入活動日期！");
            }
            else if(form.time.value =="")
            {
                alert("請輸入活動時間！");
            }
            else if(form.site.value == ""){
                alert("請輸入活動地點！");
            }
            else if(form.info.value == ""){
                alert("請輸入活動資訊！");
            }
            else{
                if(form.image.value == ""){
                    alert("若沒有上傳圖片會顯示預設圖片哦!")
                }
                form.submit();
                return(true);
            }
            return(false);
        }
    </script>

    <?php 
        if(@$_SESSION['username1'] != null){
            echo '<div class="container">
                <div class="col-md-6 column">
                    <form role="form" method="POST" action="commitact.php" Enctype="multipart/form-data">
                        <h3>
                        辦活動
                        </h3>
                        <div class="form-group">
                            <label for="exampleInputlength">活動名稱</label><input type="text" class="form-control" name="name2">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputpublish">活動日期</label><input type="date" class="form-control" name="date">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlength">活動時間</label><input type="time" class="form-control" name="time">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlength">活動地點</label><input type="text" class="form-control" name="site">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlength">活動資訊</label><textarea nrow="5" class="form-control" name="info"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputlength">活動圖片</label><input type="file" name="image">
                        </div>
                        <button type="button" class="btn btn-default" onClick="validateForm(this.form)">送出</button>
                    </form>
                </div>
            </div>';
        }else{
            echo '<div class="container">
                    <div class="col-md-6 column">
                        <h3>
                        請先登入
                        </h3>
                    </div>
                  </div>';
        }
    ?>
    <div class="row"></div>
    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>

</body>

</html>
