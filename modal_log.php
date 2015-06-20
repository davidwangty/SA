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
                <form class="form-horizontal" data-toggle="validator" method="POST" action="commitlog.php">
                    <div class="form-group">
                        <label for="inputtype" class="col-sm-2 control-label">帳號種類</label>
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
                            <input type="text" class="form-control" id="inputName" name = "id" placeholder="Name" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">密碼</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name = "pw" placeholder="Password" required>
                            <div class="help-block with-errors"></div>
                       </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >送出</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">關閉視窗</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
