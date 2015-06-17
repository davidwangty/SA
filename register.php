<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <title>Event Management</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

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
