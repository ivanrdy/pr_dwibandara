            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Blank page
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Blank page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class='col-md-12'>
                            <div class="box box-pinky">
                                <div class="box-header">
                                    <h3 class="box-title"><i class="fa fa-info"></i> Ubah Informasi Kontak dan Deskripsi DwiBandara Tour and Travel</h3>
                                        <div class="box-tools pull-right">
                                        <button class="btn btn-pinky btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>                                        
                                </div>
                            </div>
                            <form method='post' role='form' action='ubahInfo'>
                                <div class="box-body">
                                <table class='table'>
                                <?php

                                $q = mysql_fetch_array(mysql_query("SELECT * FROM kontak"));

                                ?>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label for="telepon"><i class='fa fa-phone'></i> Telepon 1</label>
                                                <input type="text" name="telepon1" class="form-control" id="telepon1" placeholder="Telepon" value='<?php echo $q['telpon_1']; ?>'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="telepon2"><i class='fa fa-phone'></i> Telepon 2 (Jika ada)</label>
                                                <input type="text" name="telepon2" class="form-control" id="telepon2" placeholder="Telepon 2" value='<?php echo $q['telpon_2']; ?>'>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label for="email"><i class='fa fa-envelope'></i> E-mail</label>
                                                <input type="text" name="email" class="form-control" id="wa" placeholder="E-mail" value='<?php echo $q['email']; ?>'>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                      
                                </table>
                                <div class="form-group">
                                    <label for="alamat"><i class='fa fa-home'></i> Alamat</label>
                                    <textarea name='alamat' class='form-control full-width' placeholder="Alamat Toko"><?php echo $q['alamat']; ?></textarea>
                                 </div>
                                 <?php 
                                 $q = mysql_fetch_array(mysql_query("SELECT * FROM deskripsi"));
                                 ?>
                                 
                                  <div class="form-group">
                                    <label for="deskripsi"><i class='fa fa-check'></i> Deskripsi DwiBandara</label>
                                    <textarea name='deskripsi' class='form-control full-width' placeholder="Deskripsi DwiBandara"><?php echo $q['layanan']; ?></textarea>
                                 </div>
                                      <div class="form-group">
                                    <label for="keunggulan"><i class='fa fa-plus'></i> Keunggulan DwiBandara</label>
                                    <textarea name='keunggulan' class='form-control full-width' placeholder="Keunggulan DwiBandara"><?php echo $q['keunggulan']; ?></textarea>
                                 </div>
                                      <div class="form-group">
                                    <label for="layanan"><i class='fa fa-about'></i> Layanan DwiBandara</label>
                                    <textarea name='layanan' class='form-control full-width' placeholder="Layanan DwiBandara"><?php echo $q['tentang_kami']; ?></textarea>
                                 </div>

                                </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-tosca"><i class='fa fa-check'></i> Simpan</button>
                                <input type="reset" class="btn btn-default" value="Ulangi">
                            </div>
                            </form>
                        </div><!-- /.box -->
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->    