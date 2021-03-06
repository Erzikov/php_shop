<!DOCTYPE html>
<html lang="en">
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>E-Shop</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        <link href="/template/css/price-range.css" rel="stylesheet">
        <link href="/template/css/animate.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="template/js/html5shiv.js"></script>
        <script src="template/js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/template/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +12 345 666 78 90</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i>lesha-erzikov@mail.ru</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header_top-->

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="/"><img src="/template/images/home/logo.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">                               
                                    <?php if (!models\User::isGuest()&&(models\User::isAdmin())): ?>
                                        <li><a href="/admin/users"><i class="fa fa-diamond"></i>Админка</a></li>
                                    <?php endif; ?>    
                                    <li>
                                        <a href="/cart"><i class="fa fa-shopping-cart"></i>
                                         Корзина <span id="countProducts" class="badge"><?= models\Cart::countItems() ?></span>
                                        </a>
                                    </li>
                                    <?php if (!models\User::isGuest()): ?>
                                        <div class="dropdown nav navbar-nav">
                                            <li class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <a href="#">
                                                    <i class="fa fa-user"></i>Личный кабинет<span class="caret"></span>
                                                </a>
                                            </li>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">  
                                              <li><a href="/profile">Профиль</a></li>
                                              <li><a href="/profile/edit">Редактирование</a></li>
                                              <li><a href="/orders">Заказы</a></li>
                                              <li role="separator" class="divider"></li>
                                              <li><a href="/signout">Выход</a></li>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <li><a href="/signin"><i class="fa fa-sign-in"></i> Вход</a></li>
                                        <li><a href="/signup"><i class="fa fa-pencil"></i> Регистрация</a>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="/">Главная</a></li>
                                    <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            <li><a href="/catalog">Каталог товаров</a></li>
                                            <li><a href="/cart">Корзина</a></li> 
                                        </ul>
                                    </li>  
                                    <li><a href="/about">О магазине</a></li>
                                    <li><a href="/about">Контакты</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-bottom-->
        </header><!--/header-->      
        <div id="main">
            <?= $content ?>
        </div>
        <footer id="footer"><!--Footer-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2018</p>
                        <p class="pull-right">Курс PHP Start</p>
                    </div>
                </div>
            </div>
        </footer><!--/Footer-->

        <script src="/template/js/jquery.js"></script>
        <script src="/template/js/jquery.cycle2.min.js"></script>
        <script src="/template/js/jquery.cycle2.carousel.min.js"></script>
        <script src="/template/js/bootstrap.min.js"></script>
        <script src="/template/js/jquery.scrollUp.min.js"></script>
        <script src="/template/js/price-range.js"></script>
        <script src="/template/js/jquery.prettyPhoto.js"></script>
        <script src="/template/js/main.js"></script>
    </body>
</html>
