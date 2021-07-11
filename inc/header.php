<?php
include_once 'lib/session.php';
session::init();
include_once 'lib/database.php';
include_once 'helpers/format.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});

$db = new Database();
$format = new Format();
$pd = new Product();
$user = new User();
$cart = new Cart();

?>

<?php
//set headers to NOT cache a page
header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
header("Pragma: no-cache"); //HTTP 1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
// Date in the past
//or, if you DO want a file to cache, use:
header("Cache-Control: max-age=2592000");
//30days (60sec * 60min * 24hours * 30days)

?>

<?php
$path = $_SERVER["PHP_SELF"];
$parts = explode('/', $path);
$file_ext = end($parts);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <!-- Site title -->
    <title>Ecommerce</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- Font-Awesome CSS -->
    <link href="assets/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <!-- helper class css -->
    <link href="assets/css/helper.min.css" type="text/css" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="assets/css/plugins.css" type="text/css" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="assets/css/style.css?v=<?php echo time(); ?> " type="text/css" rel="stylesheet">

</head>

<body>

    <!-- color switcher start -->
    <div class="color-switcher">
        <div class="color-switcher-inner">
            <div class="switcher-icon">
                <i class="fa fa-cog fa-spin"></i>
            </div>

            <div class="switcher-panel-item">
                <h3>Color Schemes</h3>
                <ul class="nav flex-wrap colors">
                    <li class="default active" data-color="default" data-toggle="tooltip" data-placement="top" title="Red"></li>
                    <li class="green" data-color="green" data-toggle="tooltip" data-placement="top" title="Green"></li>
                    <li class="soft-green" data-color="soft-green" data-toggle="tooltip" data-placement="top" title="Soft-Green"></li>
                    <li class="sky-blue" data-color="sky-blue" data-toggle="tooltip" data-placement="top" title="Sky-Blue"></li>
                    <li class="orange" data-color="orange" data-toggle="tooltip" data-placement="top" title="Orange"></li>
                    <li class="violet" data-color="violet" data-toggle="tooltip" data-placement="top" title="Violet"></li>
                </ul>
            </div>

            <div class="switcher-panel-item">
                <h3>Layout Style</h3>
                <ul class="nav layout-changer">
                    <li><button class="btn-layout-changer active" data-layout="wide">Wide</button></li>
                    <li><button class="btn-layout-changer" data-layout="boxed">Boxed</button></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Background Pattern</h3>
                <ul class="nav flex-wrap bgbody-style bg-pattern">
                    <li><img src="assets/img/bg-panel/bg-pettern/1.png" alt="Pettern"></li>
                    <li><img src="assets/img/bg-panel/bg-pettern/2.png" alt="Pettern"></li>
                    <li><img src="assets/img/bg-panel/bg-pettern/3.png" alt="Pettern"></li>
                    <li><img src="assets/img/bg-panel/bg-pettern/4.png" alt="Pettern"></li>
                    <li><img src="assets/img/bg-panel/bg-pettern/5.png" alt="Pettern"></li>
                    <li><img src="assets/img/bg-panel/bg-pettern/6.png" alt="Pettern"></li>
                </ul>
            </div>

            <div class="switcher-panel-item bg">
                <h3>Background Image</h3>
                <ul class="nav flex-wrap bgbody-style bg-img">
                    <li><img src="assets/img/bg-panel/bg-img/01.jpg" alt="Images"></li>
                    <li><img src="assets/img/bg-panel/bg-img/02.jpg" alt="Images"></li>
                    <li><img src="assets/img/bg-panel/bg-img/03.jpg" alt="Images"></li>
                    <li><img src="assets/img/bg-panel/bg-img/04.jpg" alt="Images"></li>
                    <li><img src="assets/img/bg-panel/bg-img/05.jpg" alt="Images"></li>
                    <li><img src="assets/img/bg-panel/bg-img/06.jpg" alt="Images"></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- color switcher end -->

    <div class="wrapper">
        <!-- header area start -->
        <header>
            <!-- header top start -->
            <div class="header-top-area bg-gray text-center text-md-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            <div class="header-call-action">
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    info@website.com
                                </a>
                                <a href="#">
                                    <i class="fa fa-phone"></i>
                                    0123456789
                                </a>
                            </div>
                        </div>
                        <?php if(isset($_GET['cusId'])){
                            $delcartId = $_GET['cusId'];
                            $delData = $cart->delCustomerCart($delcartId);
                            Session::destroy();
                            echo "<script>window.location = 'index.php'</script>;";
                        }
                        ?>

                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-right float-md-right float-none">
                                <nav>
                                    <ul>
                                        <li>
                                            <div class="dropdown header-top-dropdown">
                                                <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    my account
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="myaccount">
                                                    <?php $login = Session::get("cuslogin");
                                                        if($login == true){?>
                                                        <a class="dropdown-item" href="myaccount.php">my account</a>
                                                        <a class='dropdown-item' href="?cusId=<?php Session::get("cusId");?>"> logout</a>
                                                        <?php }
                                                        else{?>
                                                        <a class='dropdown-item' href='login.php'> login</a>
                                                        <a class='dropdown-item' href='register.php'> Register</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">my wishlist</a>
                                        </li>
                                        <li>
                                            <a href="cart.php">my cart</a>
                                        </li>
                                        <li>
                                            <a href="checkout.php">checkout</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header top end -->

            <!-- header middle start -->
            <div class="header-middle-area pt-20 pb-20">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand-logo">
                                <a href="index.php">
                                    <img src="assets/img/logo/logo.png" alt="brand logo">
                                </a>
                            </div>
                        </div> <!-- end logo area -->
                        <div class="col-lg-9">
                            <div class="header-middle-right">
                                <div class="header-middle-shipping mb-20">
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>Working time</h5>
                                            <span>Mon- Sun: 8.00 - 18.00</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>free shipping</h5>
                                            <span>On order over $199</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                    <div class="single-block-shipping">
                                        <div class="shipping-icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h5>money back 100%</h5>
                                            <span>Within 30 Days after delivery</span>
                                        </div>
                                    </div> <!-- end single shipping -->
                                </div>
                                <div class="header-middle-block">
                                    <div class="header-middle-searchbox">
                                        <input type="text" placeholder="Search...">
                                        <button class="search-btn"><i class="fa fa-search"></i></button>
                                    </div>
                                    <div class="header-mini-cart">
                                        <div class="mini-cart-btn">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="cart-notification">
                                                <?php $totalNum = $cart->totalCartNum();
                                                if(!empty($totalNum)){
                                                    $result = $totalNum->num_rows;
                                                    echo $result;
                                                }
                                                else{
                                                    echo "0";
                                                }
                                                ?>
                                            </span>
                                        </div>
                                        <div class="cart-total-price">
                                            <span>total</span>
                                            <?php
                                                $total = Session::get("total");
                                                if(!empty($total)){
                                                echo "$".$total;}
                                                else{
                                                    echo "$0";
                                                }
                                            ?>
                                        </div>
                                        <ul class="cart-list">
                                            <?php if (isset($_GET['delCartPro'])) {
                                                $delId = $_GET['delCartPro'];
                                                $delProduct = $cart->delCatById($delId);
                                            }
                                            ?>
                                            <?php $cartOption = $cart->cartOption();
                                            if ($cartOption) {
                                                $i = 0;
                                                while ($CartOpRt = $cartOption->fetch_assoc()) {
                                                    $i++; ?>
                                                    <li>
                                                        <div class="cart-img">
                                                            <a href="product_details.php?productId=<?= $CartOpRt['productId']; ?>"><img src="assets/img/product/<?= $CartOpRt['image']; ?>" alt=""></a>
                                                        </div>
                                                        <div class="cart-info">
                                                            <h4><a href="product_details.php?productId=<?= $CartOpRt['productId']; ?>"><?= $CartOpRt['productName']; ?></a></h4>
                                                            <span><?= $CartOpRt['price']; ?></span>
                                                        </div>
                                                        <a class="del-icon" href="?delCartPro=<?= $CartOpRt['cartId'] ?>">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </li>
                                            <?php }
                                            } ?>
                                            <li class="checkout-btn">
                                                <a href="cart.php">checkout</a>
                                            </li class="checkout-btn">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->

            <!-- main menu area start -->
            <div class="main-header-wrapper bdr-bottom1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-header-inner">
                                <div class="category-toggle-wrap">
                                    <div class="category-toggle">
                                        category
                                        <div class="cat-icon">
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </div>

                                    <nav class="category-menu 
                                            <?php
                                            if ($file_ext == "index.php") {
                                                echo "hm-1";
                                            } else {
                                                echo "category-style-2";
                                            }
                                            ?>">
                                        <ul>
                                            <?php 
                                            $category = $pd->getcatName();
                                            if ($category) {
                                                while ($catResult = $category->fetch_assoc()) {
                                            ?>
                                            <li><a href="shopbycategory.php?catId=<?= $catResult['catId']?>"><i class="fa fa-star"></i>
                                                    <?= $catResult['catName']?></a></li>
                                        <?php }} ?>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="main-menu">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li class="active"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                                            <li class="static"><a href="#">pages <i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="shop.php">shop</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="contact-us.php">Contact us</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-block d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main menu area end -->

        </header>
        <!-- header area end -->