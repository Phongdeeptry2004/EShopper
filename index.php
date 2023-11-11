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
                    include "view/allsanpham.php";
                    break;
                case "contact":
                    include "view/menu.php";
                    include "view/contact.php";
                    break;
                case "spdanhmuc":
                    if (isset($_GET["iddm"]) && $_GET['iddm'] != 0) {
                        include "view/menu.php";
                        include "view/sanphamdm.php";
                    }
                    break;
                case "sanphamct":
                    if (isset($_GET['id']) && $_GET['id'] != 0) {
                        $id = $_GET['id'];
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
                    if(isset($_POST['submit'])){
                        $id=$_SESSION['user']['id'];
                        $avatar=imageuploadtk();
                        $name=$_POST['hoten'];
                        $email=$_POST['email'];
                        $phone=$_POST['phone'];
                        suainforuser($id,$email,$name,$phone,$avatar);
                        header("Location: index.php?act=infouser") ;
                    }
                    break;
                case 'cart':
                    include("view/menu.php");
                    include("view/cart.php");
                    break;
                case "addsptocart":
                    $id=$_GET["id"];
                    $id_user=$_SESSION['user']['id']; 
                    addsptocart($id,$id_user);
                    header('Location:index.php?act=cart') ;
                    break;
                case 'xoaspincart':
                    $id=$_GET['id'];
                    xoaspincart($id);
                    include("view/menu.php");
                    include("view/cart.php");
                    break;
                case 'quantityspincart':
                    $id=$_POST['id'];
                    $quantity=$_POST['quantity'];
                    quantityspincart($id,$quantity);
                    include("view/menu.php");
                    include("view/cart.php");
                    break;
                case 'formcheckout':
                    include("view/menu.php");
                    include("view/checkout.php");
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
