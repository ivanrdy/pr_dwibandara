<?php 
    $nav = mysql_fetch_array(mysql_query("SELECT * FROM cms_nav"));
    $sh = mysql_fetch_array(mysql_query("SELECT * FROM cms_subheading"));
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header"><i class="fa fa-globe"></i> <?php echo $sh['head_lokasi'] ?>
                <small><?php echo $sh['sub_lokasi'] ?></small>

            </h1>
            <ol class="breadcrumb">
                <li><a href="beranda"><i class="fa fa-home"></i> Beranda</a>
                </li>
                <li class="active"><?php echo $nav['lokasi'] ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        <div class="col-sm-12">
            <?php 
                $data   = (mysql_query("SELECT * FROM lokasi"));
                $p      = new pagingShowLokasi;
                $batas  = 8;
                $posisi = $p->cariPosisi($batas);
                $a      = mysql_query("SELECT * FROM lokasi WHERE status='Aktif' ORDER BY id ASC LIMIT $posisi, $batas");
                if(mysql_num_rows($a)==0){
                    echo"<i>Tidak dapat menemukan lokasi wisata.</i>";
                }else{
                while($b=mysql_fetch_array($a)){
            ?>
            <div class="col-sm-6">
                <div class="img-portfolio">
                    <img class="img-responsive" src="assets/img/lokasi/<?php echo $b['gambar'] ?>" alt="">
                </div>                    
                <h3>
                    <a><?php echo $b['nama'] ?></a>
                </h3>
                <p><?php echo $b['deskripsi'] ?></p>
            </div>  
            <?php }
                $jmldata    =   mysql_num_rows(mysql_query("SELECT * FROM lokasi WHERE status='Aktif'"));
                $jmlhalaman =   $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman=   $p->navHalaman($_GET['hal'],$jmlhalaman); 
            }
            ?>
        </div>              
    </div>
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <?php echo "<ul class='pagination'>$linkHalaman</ul>"; ?>
        </div>
    </div>
    <!-- /.row -->

    <hr>
</div>