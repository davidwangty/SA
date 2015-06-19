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
                            echo '<li><a href="register.php">註冊</a></li><li><a href="login.php">登入</a></li>';
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
                    if(@$_SESSION['username1'] != null){
                        include("mysql_connect.php");
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
                        
                        echo '<li><a href = "follow.php?id='.$id.'" style="color:darkblue">追蹤</a></li>';
                        echo '<li><a href = "add.php?id='.$id.'" style="color:darkblue">參加</a></li>';
                        echo '</ul>';
                    }
                ?>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        <!-- /.container-fluid -->
    </nav>

    <div class="container-fluid" id="top">
            <?php
                include("mysql_connect.php");
                $id = @$_GET['id'];
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
                echo '<article class="container"><br><br><br><br><br><br><br><h1>'.$va[2].'</h1></article>';
                echo '<p> <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> '.$va[3].'</p>';
                echo '<p> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> '.$va[4].'</p>';
                echo '<p> <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> '.$va[5].'</p>';
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
                    echo '<p>'.$va[6].'</p>';
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
