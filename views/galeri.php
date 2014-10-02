<?php 
    $nav = mysql_fetch_array(mysql_query("SELECT * FROM cms_nav"));
    $sh = mysql_fetch_array(mysql_query("SELECT * FROM cms_subheading"));
    $gal = mysql_query("SELECT * FROM galeri");
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"><i class="fa fa-picture-o"></i> <?php echo $sh['head_galeri'] ?>
            <small><?php echo $sh['sub_galeri'] ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="beranda"><i class="fa fa-home"></i> Beranda</a>
                </li>
                <li class="active"><?php echo $nav['galeri'] ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        <div class="col-sm-12">
            <?php 
                $data   = (mysql_query("SELECT * FROM galeri"));
                $p      = new pagingShowGaleri;
                $batas  = 16;
                $posisi = $p->cariPosisi($batas);
                $a      = mysql_query("SELECT * FROM galeri WHERE status='Aktif' ORDER BY tanggal DESC LIMIT $posisi, $batas");
                if(mysql_num_rows($a)==0){
                    echo"<i>Tidak ada foto untuk ditampilkan.</i>";
                }else{
                while($r=mysql_fetch_array($a)){
            ?>
            <div class="col-sm-3 img-portfolio">
                <img title data-toggle='tooltip' data-original-title='<?php echo $r['nama_foto'] ?>' class="img-responsive img-rounded" src="assets/img/galeri/<?php echo $r['foto'] ?>" alt="<?php echo $r['deskripsi'] ?> ">
            </div>
            <?php }
                $jmldata    =   mysql_num_rows(mysql_query("SELECT * FROM galeri WHERE status='Aktif' "));
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
        <div class="col-sm-12">
            <?php echo "<ul class='pagination'>$linkHalaman</ul>"; ?>
        </div>
    </div>
    <!-- /.row -->

    <hr>
</div>