        <?php
        include("model/donhang.php");
        session_start();
        include("model/pdo.php");
        include("model/sanpham.php");
        include("model/binhluan.php");
        include("model/danhgia.php");
        include("model/taikhoan.php");
        include("model/varians.php");
        include("model/danhmuc.php");
        include("model/cart.php");
        include "view/header.php";
        if (isset($_GET['act']) && $_GET['act'] != "") {
            $act = $_GET['act'];
            switch ($act) {
                case "allsanpham":
                    include "view/menu.php";
                    if(isset($_POST['kyw']) && $_POST['kyw']!=""){
                        $kyw = $_POST['kyw'];
                     }else{
                         $kyw="";
                     }
                    include "view/allsanpham.php";
                    break;
                case "contact":
                    include "view/menu.php";
                    include "view/contact.php";
                    break;
                case "spdanhmuc":
                    if (isset($_GET["iddm"]) && $_GET['iddm'] != 0) {
                        include "view/menu.php";
                        $tendm=load_ten_dm($_GET['iddm']);
                        include "view/sanphamdm.php";
                    }
                    break;
                case "sanphamct":
                    if (isset($_GET['id']) && $_GET['id'] != 0) {
                        $id = $_GET['id'];
                        update_luotxem($id);
                        include "view/menu.php";
                        include "view/sanphamct.php";
                    }
                    break;

                case "dangxuat":
                    unset($_SESSION['user']);
                    header('Location: index.php');
                    break;
                case "infouser":
                    include("view/menu.php");
                    include "view/inforuser.php";
                    break;
                case 'updateinfor':
                    if (isset($_POST['submit'])) {
                        $id = $_SESSION['user']['id'];
                        $avatar = imageuploadtk();
                        $name = $_POST['hoten'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        suainforuser($id, $email, $name, $phone, $avatar);
                        header("Location: index.php?act=infouser");
                    }
                    break;
                case 'cart':
                    include("view/menu.php");
                    include("view/cart.php");
                    break;
                case "addsptocart":
                    $id = $_GET["id"];
                    $id_user = $_SESSION['user']['id'];
                    addsptocart($id, $id_user);
                    header('Location:index.php?act=cart');
                    break;
                case 'xoaspincart':
                    $id = $_GET['id'];
                    xoaspincart($id);
                    include("view/menu.php");
                    include("view/cart.php");
                    break;
                case 'quantityspincart':
                    $id = $_POST['id'];
                    $quantity = $_POST['quantity'];
                    quantityspincart($id, $quantity);
                    include("view/menu.php");
                    include("view/cart.php");
                    break;
                case 'formcheckout':
                    include("view/menu.php");
                    include("view/checkout.php");
                    break;
                case 'checkout':
                    $id_user = $_SESSION['user']['id'];
                    $hoten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $diachi = $_POST['sonha'] . ' ' . $_POST['huyen'] . ' ' . $_POST['thanhpho'];
                    $pay = $_POST['payment'];
                    $ngaydathang = date('Y-m-d H:i:s');
                    $ngaygiaohang = date('Y-m-d H:i:s', strtotime($ngaydathang . ' +3 days'));
                    $trangthai = 'Chờ xác nhận đơn hàng';
                    $total = $_POST['total'];
                    adddh($id_user, $ngaydathang, $ngaygiaohang, $hoten, $diachi, $phone, $email, $pay, $total);
                    $cart = showcart($_SESSION["user"]["id"]);
                    // print_r($cart);
                    $sp = showalldhbyid($_SESSION["user"]["id"]);
                    $last_row = end($sp);
                    $id_dh = reset($last_row);
                    foreach ($cart as $key) {
                        $id= $key["id"];
                        $id_product = $key['id_product'];
                        $soluong = $key['quantity'];
                        $total = $key['quantity'] * $key['price'];
                        addctdh($id_dh, $id_product, $soluong, $total);
                        truslsp($id_product,$soluong);
                        xoaspincart($id);
                    }
                    include("view/menu.php");
                    include('view/donhangdadat.php');
                    break;
                case 'dhdadat':
                    include("view/menu.php");
                    include('view/donhangdadat.php');
                    break;
                case 'ctdonhang':

                    break;
                case 'test':
                    include("view/menu.php");
                    include 'view/test.php';
                    break;
                default:
                    include "view/menuslide.php";
                    include "view/home.php";
            }
        } else {
            include "view/menuslide.php";
            include "view/home.php";
        }
        include "view/footer.php";
        ?>
