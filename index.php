        <?php
        include("model/donhang.php");
        include("model/pdo.php");
        include("model/sanpham.php");
        include("model/binhluan.php");
        include("model/danhgia.php");
        include("model/taikhoan.php");
        include("model/varians.php");
        include("model/danhmuc.php");
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
                
                case "login":
                    include "view/menu.php";
                    include('view/login.php');
                    break;
                    case "signup":
                        include "view/menu.php";
                        include('view/signup.php');
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
