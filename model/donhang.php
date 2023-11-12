<?php 
function showalldh(){
    $sql="SELECT * FROM `donhang` WHERE 1";
    return pdo_query($sql);
}
function showalldhbyid($id){
    $sql="SELECT * FROM `donhang` WHERE id_user=$id";
    return pdo_query($sql);
}
function addctdh($id_dh,$id_product,$soluong,$total){
    $sql= "INSERT INTO `chitietdonhang`(`id_donhang`, `id_product`, `id_variants`, `soluong`, `total`) VALUES ('$id_dh','$id_product',1,'$soluong','$total')";
    pdo_execute($sql);
}
function showonedh($id){
    $sql="SELECT * FROM `donhang` WHERE id=".$id;
    return pdo_query($sql);
}
function adddh($id_user,$ngaydathang,$ngaygiaohang,$hoten,$address,$phone,$email,$pay,$tong){
    $sql= "INSERT INTO `donhang`( `id_user`, `ngaydathang`, `ngaygiaohang`, `address`, `phone`, `hoten`, `pay`, `tong`, `trangthai`) 
    VALUES ('$id_user','$ngaydathang','$ngaygiaohang','$address','$phone','$hoten','$pay','$tong','Đang chờ xác nhận')";
    pdo_execute($sql);
}
function xoadh($id){
    $sql = "DELETE FROM `donhang` WHERE id=".$id;
     pdo_execute($sql);
  }
function suadh($hoten,$phone,$address,$ngaydathang,$ngaygiaohang,$pay,$trangthai,$id){
    $sql="UPDATE donhang SET hoten = '$hoten', phone = '$phone', address = '$address', ngaydathang = '$ngaydathang', ngaygiaohang = '$ngaygiaohang', pay = '$pay', trangthai = '$trangthai' WHERE id = $id";
    pdo_execute($sql);
}
function trangthaidh($id,$trangthai){
    
}
?>