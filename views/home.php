<?php 
    
    $banner = mysql_fetch_array(mysql_query("SELECT * FROM cms_nav"));
    $des = mysql_fetch_array(mysql_query("SELECT * FROM deskripsi"));
    $sh = mysql_fetch_array(mysql_query("SELECT * FROM cms_subheading"));
    $pic = mysql_query("SELECT * FROM lokasi ORDER BY id LIMIT 2");

 ?>

<div class="cumbotron masthead">
  <div class="container">
    <h1 style="font-size:70px"><?php echo $banner['banner']; ?></h1>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1><i class="fa fa-plane"></i> <?php echo $sh['paket_home'] ?> <small><?php echo $sh['paketsub_home'] ?></small></h1><hr>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>3 Hari 2 Malam</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>4 Hari 3 Malam</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-support fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>5 Hari 4 Malam</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <a href="#" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">
                <i class="fa fa-globe"></i> <?php echo $sh['unggul_home'] ?><small> <?php echo $sh['unggulsub_home'] ?></small>
            </h1>
            <div class="col-sm-8">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-check"></i> Layanan Kami</h4>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $des['layanan'] ?></p>
                            <a href="pakej" class="btn btn-default">Lihat Paket</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-gift"></i> Keunggulan</h4>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $des['keunggulan'] ?></p>
                            <a href="galeri" class="btn btn-default">Lihat Pelanggan Kami</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><i class="fa fa-fw fa-compass"></i> Siapa Kami?</h4>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $des['tentang_kami'] ?></p>
                            <a href="kontak" class="btn btn-default">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="col-sm-12">
                <?php while($showpic=mysql_fetch_array($pic)) { ?>
                    <a href="lokasi">
                        <img class="img-responsive img-portfolio img-hover" src="assets/img/lokasi/<?php echo $showpic['gambar'] ?>" alt="">
                    </a>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>