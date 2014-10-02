<?php 
    $nav = mysql_fetch_array(mysql_query("SELECT * FROM cms_nav"));
    $sh = mysql_fetch_array(mysql_query("SELECT * FROM cms_subheading"));
    $con = mysql_fetch_array(mysql_query("SELECT * FROM kontak"));

    $sepdr = explode(",",$con['alamat']);
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
<<<<<<< HEAD
            <h1 class="page-header"><i class="fa fa-phone-square"></i> Kontak
                <small>Silahkan Hubungi Customer Service Kami untuk Informasi Lebih Lengkap</small>
=======
            <h1 class="page-header"><i class="fa fa-phone-square"></i> <?php echo $sh['head_kontak'] ?>
                <small><?php echo $sh['sub_kontak'] ?></small>
>>>>>>> 55f30f8689c7669ff7964c1934c244be346c0fde
            </h1>
            <ol class="breadcrumb">
                <li><a href="beranda"><i class="fa fa-home"></i> Beranda</a>
                </li>
                <li class="active"><?php echo $nav['kontak'] ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <div class="googlemap-wrapper">
                 <div id="map_canvas" class="map-canvas"></div>
             </div> <!-- /.googlemap-wrapper -->
        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3>Informasi DWIbandara</h3>
            <p>
                <?php echo $sepdr[0] ?><br><?php echo $sepdr[1] ?><br>
            </p>
            <p><i class="fa fa-phone"></i> 
                <abbr title="Telfon">Tel</abbr>: <?php echo $con['telpon_1'] ?> / <?php echo $con['telpon_2'] ?></p>
            <p><i class="fa fa-envelope-o"></i> 
                <abbr title="Email">Email</abbr>: <a href="mailto:<?php echo $con['email'] ?>"><?php echo $con['email'] ?></a>
            </p>
            <p><i class="fa fa-clock-o"></i> 
                <abbr title="Jam Kerja">Jam Kerja</abbr>: Senin - Jumat : 08.00 - 18.00</p>
        </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
        

    </div>
    <!-- /.row -->

    <hr>
</div>