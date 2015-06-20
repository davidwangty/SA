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

    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <hr class="featurette-divider">
                    <h2>想要加入這裡...就要遵守我的規矩!!</h2>
                    <blockquote>
                        <p>
                            <ol>
                                <li>
                                我不會像家豪一樣半夜攻擊這個網站
                                </li>
                                <li>
                                我們尊重包容友善和平~
                                </li>
                                <li>
                                當個安分守己的好會員
                                </li>
                                <li>
                                剩下的我們給Nini和佩蓉來想!
                                </li>
                                <li>
                                Nulla volutpat aliquam velit
                                </li>
                                <li>
                                Faucibus porta lacus fringilla vel
                                </li>
                                <li>
                                Aenean sit amet erat nunc
                                </li>
                                <li>
                                Eget porttitor lorem
                                </li>
                            </ol>
                        </p>
                        <small>Group 6</small>
                    </blockquote>
            </div>
        </div>
        <form data-toggle="validator" role="form" action = "register.php">
            <div class="form-group">
                <div class="checkbox">
                    <label><!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                    <input type="checkbox" id="terms" data-error="快點說你愛我" required>
                    你愛天天嗎？
                    </label>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-default">我十分同意~</button>
            <hr class="featurette-divider">
        </form>
    </div>

    
    <!-- Footer -->
    <?php
        include 'footer.php';
    ?>
    <script src="validator.js"></script>

</body>

</html>
