<?php

class pagingLokasi{
    function cariPosisi($batas){
       if(empty($_GET['hal'])){
            $posisi=0;
            $_GET['hal']=1;
       }else{
            $posisi=($_GET['hal']-1)*$batas;
       }
       return $posisi;
     }
     function jumlahHalaman($jmldata, $batas){
        $jmlhalaman = ceil($jmldata/$batas);
        return $jmlhalaman;
     }
     function navHalaman($halaman_aktif, $jmlhalaman){
        $link_halaman="";
    
        for($i=1; $i<=$jmlhalaman; $i++){
           if($i == $halaman_aktif){
                $link_halaman .= "<li class='active'><a disabled=disabled>$i</a></li>";
           }else{
                $link_halaman .= "<li><a href=mint-lokasi-$i>$i</a></li>";
           }
                $link_halaman .= "";
        }
            return $link_halaman;
    }
}

class pagingMsg{
    function cariPosisi($batas){
       if(empty($_GET['hal'])){
            $posisi=0;
            $_GET['hal']=1;
       }else{
            $posisi=($_GET['hal']-1)*$batas;
       }
       return $posisi;
     }
     function jumlahHalaman($jmldata, $batas){
        $jmlhalaman = ceil($jmldata/$batas);
        return $jmlhalaman;
     }
     function navHalaman($halaman_aktif, $jmlhalaman){
        $link_halaman="";
    
        for($i=1; $i<=$jmlhalaman; $i++){
           if($i == $halaman_aktif){
                $link_halaman .= "<li ><a class='btn btn-sm btn-tosca' disabled=disabled>$i</a></li>";
           }else{
                $link_halaman .= "<li ><a class='btn btn-sm btn-tosca' href=mint-mailbox-$i>$i</a></li>";
           }
                $link_halaman .= "";
        }
            return $link_halaman;
    }
}

class pagingProduk{
    function cariPosisi($batas){
       if(empty($_GET['hal'])){
            $posisi=0;
            $_GET['hal']=1;
       }else{
            $posisi=($_GET['hal']-1)*$batas;
       }
       return $posisi;
     }
     function jumlahHalaman($jmldata, $batas){
        $jmlhalaman = ceil($jmldata/$batas);
        return $jmlhalaman;
     }
     function navHalaman($halaman_aktif, $jmlhalaman){
        $link_halaman="";
    
        for($i=1; $i<=$jmlhalaman; $i++){
           if($i == $halaman_aktif){
                $link_halaman .= "<li class='active'><a disabled=disabled>$i</a></li>";
           }else{
                $link_halaman .= "<li><a href=katalog-$i>$i</a></li>";
           }
                $link_halaman .= "";
        }
            return $link_halaman;
    }
}

?>