<?php 
    $nav = mysql_fetch_array(mysql_query("SELECT * FROM cms_nav"));
    $sh = mysql_fetch_array(mysql_query("SELECT * FROM cms_subheading"));
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-sm-12">
<<<<<<< HEAD
            <h1 class="page-header"><i class="fa fa-globe"></i> Testimoni Pelanggan
                <small>Silahkan Beri Pendapat Anda Tentang DwiBandara Tours And Travel</small>
=======
            <h1 class="page-header"><i class="fa fa-globe"></i> <?php echo $sh['head_testi'] ?>
                <small><?php echo $sh['sub_testi'] ?></small>
>>>>>>> 55f30f8689c7669ff7964c1934c244be346c0fde
            </h1>
            <ol class="breadcrumb">
                <li><a href="beranda"><i class="fa fa-home"></i> Beranda</a>
                </li>
                <li class="active"><?php echo $nav['testi'] ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Add testi -->
    <div class="row">
        <div class="col-sm-12">
            <h3><i class="fa fa-comment"></i> Berikan Testimoni Anda</h3><hr>
            <form action="addTesti" method="post" role="form">
                <table class="table" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="col-sm-4">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input class="form-control" type="text" name="nama" placeholder="Nama Anda">
                            </div>
                        </td>
                        <td rowspan="3" class="col-sm-8">
                            <textarea class="form-control" name="isi" id="" cols="30" rows="7" placeholder="Testimoni Anda"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-link"></i></div>
                                <input class="form-control" type="text" name="url" placeholder="Facebook / Email">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-flag"></i></div>
                                <input class="form-control" type="text" name="asal" placeholder="Asal Negara">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary col-sm-12 col-xs-12"><i class="fa fa-success"></i> Selesai</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- End add testi -->
    <hr>
    <!-- Projects Row -->
    <div class="row">
        <div class="col-sm-12 ">
        <h3><i class="fa fa-comment"></i> Testimoni Dari Pelanggan</h3><hr>
            <div class="col-sm-12">
                <?php 
                    $data   = (mysql_query("SELECT * FROM testimoni"));
                    $p      = new pagingTestiShow;
                    $batas  = 10;
                    $posisi = $p->cariPosisi($batas);
                    $q      = mysql_query("SELECT * FROM testimoni WHERE status='Aktif' ORDER BY tanggal ASC LIMIT $posisi, $batas");
                    if(mysql_num_rows($q)==0){
                        echo"Tidak ada testimoni.";
                    }else{
                    while($odd=mysql_fetch_array($q)){
                 ?>
                    <blockquote class="col-sm-6">
                        <p><?php echo $odd['isi']; ?>
                        </p>
                        <small><?php echo "$odd[pengirim] ($odd[url]), $odd[asal]"; ?></small>
                    </blockquote>
                <?php 
                    }
                    $jmldata    =   mysql_num_rows(mysql_query("SELECT * FROM testimoni WHERE status='Aktif'"));
                    $jmlhalaman =   $p->jumlahHalaman($jmldata, $batas);
                    $linkHalaman=   $p->navHalaman($_GET['hal'],$jmlhalaman);
                } 
                echo"
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class='row text-center'>
        <div class='col-lg-12'>
            <ul class='pagination'>
                $linkHalaman
            </ul>";
            ?>
        </div>
    </div>
    <!-- /.row -->

    <hr>
</div>