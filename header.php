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
                        echo '<li><a href="register.php">註冊</a></li><li><a href="login.php">登入</a></li>';
                        echo '<li><a data-toggle="modal" href="#myModal">登入(跳出視窗)</a></li>';
                    }
                ?>
            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
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
                                <label><input type="radio" name="select" value="1" checked>主辦者</label>
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
                        <button type="submit" class="btn btn-primary">送出</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div id="check" class="modal fade" role="dialog">
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
                                <label><input type="radio" name="select" value="1" checked>主辦者</label>
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
                        <button type="submit" class="btn btn-primary">送出</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>