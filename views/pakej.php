<?php 
    $nav = mysql_fetch_array(mysql_query("SELECT * FROM cms_nav"));
    $sh = mysql_fetch_array(mysql_query("SELECT * FROM cms_subheading"));
    $pak = mysql_query("SELECT * FROM paket WHERE status='Aktif' AND durasi='3 Hari 2 Malam'");
    $pak1 = mysql_query("SELECT * FROM paket WHERE status='Aktif' AND durasi='4 Hari 3 Malam'");
    $pak2 = mysql_query("SELECT * FROM paket WHERE status='Aktif' AND durasi='5 Hari 4 Malam'");
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><i class="fa fa-calendar-o"></i> <?php echo $sh['head_paket'] ?>
                <small><?php echo $sh['sub_paket'] ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="beranda"><i class="fa fa-home"></i> Beranda</a>
                </li>
                <li class="active"><?php echo $nav['paket'] ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <?php 
                    while($show=mysql_fetch_array($pak)){
                ?>                
                <div class="col-sm-12">
                    <?php if($show['starred']=='Yes'){
                        echo    "<div class='panel panel-primary text-center'>
                                    <div class='panel-heading'>
                                        <h3 class='panel-title'>$show[paket]
                                        <span class='label label-success'><i>Paket Pilihan !</i></span></h3>
                                    </div>
                                ";
                        }else{ ?>
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $show['paket'] ?></h3>
                        </div>
                        <?php } ?>
                        <div class="panel-body">
                            <span class="price"><sup>RM</sup><?php echo $show['ongkos_jakarta'] ?><sup>.00</sup> / <?php echo $show['ongkos_bandung'] ?><sup>.00</sup></span>
                            <span class="period">per 2 fax (Jakarta / Bandung)</span>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <b><?php echo $show['durasi'] ?></b></li>
                            <?php 
                                $fac = explode("\n", $show['fasilitas']);
                                foreach($fac as $lines){
                            ?>
                            <li class="list-group-item"><i class="fa fa-check"></i> <?php echo $lines ?></li>
                            <?php } ?>
                            <li class="list-group-item"><a href="kontak" class="btn btn-primary">Hubungi Kami !</a></li>
                        </ul>
                    </div>
                </div>                
                <?php } ?>
            </div>

            <div class="col-sm-4">                
                <?php 
                    while($show1=mysql_fetch_array($pak1)){
                ?>
                <div class="col-sm-12">
                    <?php if($show1['starred']=='Yes'){
                        echo    "<div class='panel panel-primary text-center'>
                                    <div class='panel-heading'>
                                        <h3 class='panel-title'>$show[paket]
                                        <span class='label label-success'><i>Paket Pilihan !</i></span></h3>
                                    </div>
                                ";
                        }else{ ?>
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $show1['paket'] ?></h3>
                        </div>
                        <?php } ?>
                        <div class="panel-body">
                            <span class="price"><sup>RM</sup><?php echo $show1['ongkos_jakarta'] ?><sup>.00</sup> / <?php echo $show1['ongkos_bandung'] ?><sup>.00</sup></span>
                            <span class="period">per 2 fax (Jakarta / Bandung)</span>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <b><?php echo $show1['durasi'] ?></b></li>
                            <?php 
                                $fac1 = explode("\n", $show1['fasilitas']);
                                foreach($fac1 as $lines1){
                            ?>
                            <li class="list-group-item"><i class="fa fa-check"></i> <?php echo $lines1 ?></li>
                            <?php } ?>
                            <li class="list-group-item"><a href="kontak" class="btn btn-primary">Hubungi Kami !</a></li>
                        </ul>
                    </div>
                </div>                
                <?php } ?>
            </div>
            <div class="col-sm-4">                
                <?php 
                    while($show2=mysql_fetch_array($pak2)){
                ?>
                <div class="col-sm-12">
                    <?php if($show2['starred']=='Yes'){
                        echo    "<div class='panel panel-primary text-center'>
                                    <div class='panel-heading'>
                                        <h3 class='panel-title'>$show[paket]
                                        <span class='label label-success'><i>Paket Pilihan !</i></span></h3>
                                    </div>
                                ";
                        }else{ ?>
                    <div class="panel panel-default text-center">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $show2['paket'] ?></h3>
                        </div>
                        <?php } ?>
                        <div class="panel-body">
                            <span class="price"><sup>RM</sup><?php echo $show2['ongkos_jakarta'] ?><sup>.00</sup> / <?php echo $show2['ongkos_bandung'] ?><sup>.00</sup></span>
                            <span class="period">per 2 fax (Jakarta / Bandung)</span>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item"><i class="fa fa-calendar"></i> <b><?php echo $show2['durasi'] ?></b></li>
                            <?php 
                                $fac2 = explode("\n", $show2['fasilitas']);
                                foreach($fac2 as $lines2){
                            ?>
                            <li class="list-group-item"><i class="fa fa-check"></i> <?php echo $lines2 ?></li>
                            <?php } ?>
                            <li class="list-group-item"><a href="kontak" class="btn btn-primary">Hubungi Kami !</a></li>
                        </ul>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>        
    </div>
    <!-- /.row -->

    <hr>
</div>