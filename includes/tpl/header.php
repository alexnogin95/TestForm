<!DOCTYPE html>
<html>
<head>
    <title>Test task</title>
    <link href="../../public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

    <script src="../../public/js/jquery-1.11.0.min.js"></script>
    <!--Custom Theme files-->
    <!--theme-style-->
    <link href="../../public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../../public/css/my_style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Регистрация" />

    <!--start-menu-->

    <link href="../../public/css/memenu.css" rel="stylesheet" type="text/css" media="all" />


    <!--dropdown-->
    <script src="../../public/js/jquery.easydropdown.js"></script>
</head>
<div class="top-header">

    <div class="container">
        <div class="top-header-main">
            <div class="col-md-6 top-header-left">

                <div class="drop">



                    <div class="box">
                        <select id="currency" tabindex="4" class="dropdown drop" onchange="location = this.value;">
                            <?php if(!empty($_SESSION['USER_LANGUAGE'])): ?>
                            <option value='<?php echo remove_get('lang').'?lang=en';?>' <?php echo ($_SESSION['USER_LANGUAGE'] == 'en') ? 'selected' : '' ?>>Eng</option>
                            <option value='<?php echo remove_get('lang').'?lang=ru';?>' <?php echo ($_SESSION['USER_LANGUAGE'] == 'ru') ? 'selected' : '' ?>>Rus</option>
                            <?php else: ?>
                            <option value=''>Eng</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="btn-group">
                        <a class="dropdown-toggle" data-toggle="dropdown"><?php echo lang_Account ?><span class="caret" style="margin-left: 25px;"></span></a>
                        <ul class="dropdown-menu">
                            <?php if(!empty($_SESSION['logged_user'])): ?>
                                <li><a href="#"><?php echo lang_Welcome ?>, <?= htmlspecialchars($_SESSION['logged_user']['name']);?></a></li>
                                <li><a href="../../logout.php"><?php echo lang_Exit ?></a></li>
                            <?php else: ?>
                                <li><a href="../../login.php"><?php echo lang_login ?></a></li>
                                <li><a href="../../signup.php"><?php echo lang_Signup ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->
<div class="logo">
    <a href="../../index.php"><h1>Test Task</h1></a>
</div>
<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue"><li class="active"><a href="../../index.php"><?php echo lang_Home ?></a></li>
                        <li class="grid"><a href="#"><?php echo lang_Articles ?></a>
                        </li>
                        <li class="grid"><a href="#"><?php echo lang_Portfolio ?></a>
                        </li>
                        <li class="grid"><a href="#"><?php echo lang_Blog ?></a>
                        </li>
                        <li class="grid"><a href="#"><?php echo lang_Contact ?></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
