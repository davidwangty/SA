<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php
    include 'headlink.php';
?>

<body id="page-top" class="index">

    <!-- Navigation -->
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="index.php">
                        <!-- <img alt="Brand" src="..."> -->
                        Group 6
                      </a>
                    </div>
                </div>
            </div>

            <form class="navbar-form navbar-left" role="search" method="POST" action="search.php">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="找活動囉~" name = "search">
                </div>
                <button type="submit" class="btn btn-default">搜尋</button>
            </form>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php 
                        if(@$_SESSION['username1'] != null){
                            echo '<li>
                                     <a href="create.php">辦活動</a>
                                  </li>';
                            echo '<li><a href = "manage.php">'.@$_SESSION['username1'].'</a><li><a href = "logout.php">登出</a>';
                        }elseif(@$_SESSION['username2'] != null){
                            echo '<li><a href = "manage.php">'.@$_SESSION['username2'].'</a><li><a href = "logout.php">登出</a>';
                        }
                        else{
                            echo '<li><a href="register.php">註冊</a></li><li><a href="#myModal">登入</a></li>';
                        }
                    ?>
                </ul>
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
        <div class="container-fluid" style="background:#eeeeee">
        <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#top" style="color:darkblue">TOP</a></li>
                    <li><a href="#info" style="color:darkblue">活動資訊</a></li>
                    <li><a href="#QA" style="color:darkblue">Q&A </a></li>
                </ul>


                <?php
                    include("mysql_connect.php");
                    $id = @$_GET['id'];
                    include("mysql_connect.php");
                    $str = "SELECT * FROM 活動 WHERE 活動ID = $id";
                    $list = mysql_query($str);
                    $nums=mysql_num_rows($list);
                    if($nums == 0){
                        $id = 0;
                    }
                    if(@$_SESSION['username2'] != null){
                        echo '<ul class="nav navbar-nav navbar-right">';
                        $str = 'SELECT * FROM 追蹤 WHERE 活動ID = '.$id.' AND username = '.@$_SESSION['username2'];
                        $list = mysql_query($str);
                        $nums=mysql_num_rows($list);
                        if($nums > 0){
                            echo '<li><a href = "cancelfollow.php?id='.$id.'" style="color:red">取消追蹤</a></li>';
                        }else{
                            echo '<li><a href = "follow.php?id='.$id.'" style="color:darkblue">追蹤</a></li>';
                        }
                        $str = 'SELECT * FROM 參加 WHERE 活動ID = '.$id.' AND username = '.@$_SESSION['username2'];
                        $list = mysql_query($str);
                        
                        $nums=mysql_num_rows($list);
                        if($nums > 0){
                            echo '<li><a href = "canceladd.php?id='.$id.'" style="color:red">取消參加</a></li></ul>';
                        }else{
                            echo '<li><a href = "add.php?id='.$id.'" style="color:darkblue">參加</a></li>';
                            echo '</ul>';
                        }
                    }elseif(@$_SESSION['username1'] != null){

                    }else{
                        echo '<ul class="nav navbar-nav navbar-right">';
                        
                        echo '<li><a href = "#myModal" style="color:darkblue">追蹤</a></li>';
                        echo '<li><a href = "#myModal" style="color:darkblue">參加</a></li>';
                        echo '</ul>';
                    }
                ?>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        <!-- /.container-fluid -->
    </nav>
    <script>
        function validateFormlog(form){
            if(form.id.value == "") 
            {
                alert("請輸入帳號！");
            }
            else if(form.pw.value == "")
            {
                alert("請輸入密碼！");
            }
            else{
                form.submit();
                return(true);
            }
            return(false);
        }
    </script>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">請登入</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="commitlog.php">
                        <div class="form-group">
                            <label for="inputtype" class="col-sm-2 control-label">帳號總類</label>
                            <div class="col-sm-10">
                                <div class="radio">  
                                    <label><input type="radio" name="select" value="1">主辦者</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label><input type="radio" name="select" value="2" checked>參加者</label>
                                </div>  
                            </div> 
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">帳號</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" name = "id" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">密碼</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword" name = "pw" placeholder="Password">
                           </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onClick="validateFormlog(this.form)">送出</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid" id="top">
            <?php
                include("mysql_connect.php");
                $str = "SELECT * FROM 活動 WHERE 活動ID = $id";
                $str2 = "SELECT 瀏覽數 FROM 活動 WHERE 活動ID = $id";
                $list = mysql_query($str);
                $va = mysql_fetch_row($list);
                $list2 = mysql_query($str2);
                $va2 = mysql_fetch_row($list2);
                $va2[0] = $va2[0] + 1;
                $str2 = "UPDATE 活動 SET 瀏覽數= $va2[0] WHERE 活動ID = $id";
                $list = mysql_query($str2);
                if($va[7] == ""){
                    $va[7] = "未命名.png";
                }
                echo '<div id="sidebar2"><br><br><br><br><br><br><br><p align="center"><img src="img/upload/'.$va[7].'" width="300"></p><br><br>
                      </div>';
                echo '<div id="content2">';
                echo '<article class="container"><br><br><br><br><br><br><br><h1>';
                echo htmlspecialchars($va[2], ENT_QUOTES, 'UTF-8');
                echo '</h1></article>';
                echo '<p> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$va[3].'</p>';
                echo '<p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$va[4].'</p>';
                echo '<p> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> ';
                echo htmlspecialchars($va[5], ENT_QUOTES, 'UTF-8');
                echo '</p>';
                echo '<p> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 瀏覽人次: '.$va[8].'</p>';
                $sql2 = "SELECT COUNT(*) FROM 追蹤 WHERE 活動ID = $va[0]";
                $list2 = mysql_query($sql2);
                $va2 = mysql_fetch_row($list2);
                $nums2 = mysql_num_rows($list2);
                if($nums2 == 0){
                    $va2[0] = 0;
                }
                echo '<p> <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span> 追蹤人次: '.$va2[0].'</p>';
                echo '</div>';
            ?>
                    
    </div>

    <div class="container-fluid" style="background:#ecf0f1">
        <div id="content3">
            <article class="container" id="info">
                <h1>活動資訊</h1>
                <?php
                    echo '<p>';
                    echo htmlspecialchars($va[6], ENT_QUOTES, 'UTF-8');
                    echo '</p>';
                ?>
            </article>
        </div>
    </div>

    <div class="container-fluid">
        <div id="content3">
            <article class="container" id="QA">
                <h1>Q&A</h1>
                <p>...</p>
            </article>
        </div>
    </div>

    

    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
</body>

</html>
