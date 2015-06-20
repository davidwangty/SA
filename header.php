<?php
    $page = $_SERVER['PHP_SELF'];
    if($page != "/SA/commitlog.php" && $page != "/SA/commitact.php" && $page != "/SA/commitreg.php" && $page != "/SA/register.php"){
        $_SESSION['back'] = $page;
    }
?>
<nav class="navbar navbar-default navbar-fixed-top">
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
                        echo '<li><a href="announce.php">註冊</a></li><li><a data-toggle="modal" href="#myModal">登入</a></li>';
                    }
                ?>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php include 'modal_log.php'; ?>