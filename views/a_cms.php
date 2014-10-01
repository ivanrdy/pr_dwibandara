    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                CMS
                <small>Panel admin - ubah data tampilan di website</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="mint"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active">CMS</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class='col-md-12'>
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-info"></i> Navigasi
                                <small>Ubah judul untuk setiap navigasi halaman</small></h3>
                                <div class="box-tools pull-right">
                                <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>                                        
                                </div>
                        </div>
                        <form role="form" action="ubahnav" method="post">
                        <div class="box-body">
                        <table class='table'>
                        <?php

                        $q = mysql_fetch_array(mysql_query("SELECT * FROM cms_nav"));

                        ?>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="telepon"><i class='fa fa-list-ul'></i> Paket</label>
                                        <input type="text" name="paket" class="form-control" placeholder="Paket" value='<?php echo $q['paket']; ?>'>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="telepon2"><i class='fa fa-globe'></i> Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" placeholder="Lokasi" value='<?php echo $q['lokasi']; ?>'>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="galeri"><i class='fa fa-picture-o'></i> Galeri</label>
                                        <input type="text" name="galeri" class="form-control" placeholder="Galeri" value='<?php echo $q['galeri']; ?>'>
                                    </div>                                     
                                </td>     
                                <td>
                                    <div class="form-group">
                                        <label for="testi"><i class='fa fa-comment'></i> Testimoni</label>
                                        <input type="text" name="testi" class="form-control" placeholder="Testimoni" value='<?php echo $q['testi']; ?>'>
                                    </div>                                     
                                </td>  
                                <td>
                                    <div class="form-group">
                                        <label for="kontak"><i class='fa fa-envelope'></i> Kontak</label>
                                        <input type="text" name="kontak" class="form-control" placeholder="Kontak" value='<?php echo $q['kontak']; ?>'>
                                    </div>                                     
                                </td>                                     
                            </tr>
                            <tr>
                                <td colspan=5>                                            
                                    <div class="form-group">
                                        <label for="alamat"><i class='fa fa-home'></i> Judul</label>
                                        <textarea name='banner' class='form-control full-width' placeholder="Alamat"><?php echo $q['banner']; ?></textarea>
                                    </div>                                            
                                </td>     
                            </tr>
                        </table>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class='fa fa-check'></i> Simpan</button>
                            <button type="reset" class="btn btn-warning">Ulangi</button>
                        </div>
                        </form>
                    </div>

                    <div class="box box-primary">
                         <?php 
                         $q = mysql_fetch_array(mysql_query("SELECT * FROM cms_subheading"));
                         ?>
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-info"></i> Heading & Subheading
                            <small>Ubah deskripsi heading dan subheading tiap halaman</small></h3>
                                <div class="box-tools pull-right">
                                <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>                                        
                                </div>
                        </div>
                        <form role="form" action="ubahheading" enctype="multipart/form-data" method="post">
                        <div class="box-body">
                            <table class='table'>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="kontak"><i class='fa fa-plane'></i> Pilihan Paket Wisata</label>
                                            <input type="text" name="pakethome" class="form-control" placeholder="Heading" value='<?php echo $q['paket_home']; ?>'>
                                            <input type="text" name="paketsubhome" class="form-control" placeholder="Subheading" value='<?php echo $q['paketsub_home']; ?>'>
                                        </div>                                         
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="kontak"><i class='fa fa-globe'></i> Keunggulan</label>
                                            <input type="text" name="unggulhome" class="form-control" placeholder="Heading" value='<?php echo $q['unggul_home']; ?>'>
                                            <input type="text" name="unggulsubhome" class="form-control" placeholder="Subheading" value='<?php echo $q['unggulsub_home']; ?>'>
                                        </div>  
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="kontak"><i class='fa fa-list-ul'></i> Halaman Paket</label>
                                            <input type="text" name="pakethead" class="form-control" placeholder="Heading" value='<?php echo $q['head_paket']; ?>'>
                                            <input type="text" name="paketsub" class="form-control" placeholder="Subheading" value='<?php echo $q['sub_paket']; ?>'>
                                        </div>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="kontak"><i class='fa fa-globe'></i> Halaman Lokasi</label>
                                            <input type="text" name="lokasihead" class="form-control" placeholder="Heading" value='<?php echo $q['head_lokasi']; ?>'>
                                            <input type="text" name="lokasisub" class="form-control" placeholder="Subheading" value='<?php echo $q['sub_lokasi']; ?>'>
                                        </div>                                         
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="kontak"><i class='fa fa-picture-o'></i> Halaman Galeri</label>
                                            <input type="text" name="galerihead" class="form-control" placeholder="Heading" value='<?php echo $q['head_galeri']; ?>'>
                                            <input type="text" name="galerisub" class="form-control" placeholder="Subheading" value='<?php echo $q['sub_galeri']; ?>'>
                                        </div>  
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="kontak"><i class='fa fa-envelope-o'></i> Halaman Kontak</label>
                                            <input type="text" name="kontakhead" class="form-control" placeholder="Heading" value='<?php echo $q['head_kontak']; ?>'>
                                            <input type="text" name="kontaksub" class="form-control" placeholder="Subheading" value='<?php echo $q['sub_kontak']; ?>'>
                                        </div>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="kontak"><i class='fa fa-comment'></i> Halaman Testimoni</label>
                                            <input type="text" name="testihead" class="form-control" placeholder="Heading" value='<?php echo $q['head_testi']; ?>'>
                                            <input type="text" name="testisub" class="form-control" placeholder="Subheading" value='<?php echo $q['sub_testi']; ?>'>
                                        </div>                                         
                                    </td>
                                    <td>
                                        
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                            </table>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class='fa fa-check'></i> Simpan</button> 
                            <button type="reset" class="btn btn-warning">Ulangi</button>                    
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->    