            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Galeri
                        <small>Panel Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="mint"><i class="fa fa-dashboard"></i> Beranda</a></li>
                        <li class="active">Galeri</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                    <div class="col-sm-12">
                        <div class='col-sm-4'>
                            <?php

                            $id = $_GET['id'];
                            $q = mysql_query("SELECT * FROM paket WHERE id = $id");
                            $fetch = mysql_fetch_array($q);

                            ?>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"><i class="fa fa-plus-square-o"></i> Tambah Paket</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>                                        
                                    </div>
                                </div>
                                <form role="form" action="ubahpaket" method="post">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="nama">Paket</label>
                                        <input type='hidden' name='id' value='<?php echo $id; ?>'>
                                        <input value="<?php echo $fetch['paket']; ?>" type="text" name="paket" class="form-control" id="exampleInputEmail1" placeholder="Silahkan Ganti Nama Paket">
                                    </div>
                                    <div class="box-body">
                                    <div class="form-group">
                                        <label for="nama">Durasi</label><br>
                                        <input type="radio" name="durasi" class="form-control" id="exampleInputEmail1" value="3 Hari 2 Malam"> 3 Hari 2 Malam<br>
                                        <input type="radio" name="durasi" class="form-control" id="exampleInputEmail1" value="4 Hari 3 Malam"> 4 Hari 3 Malam<br>
                                        <input type="radio" name="durasi" class="form-control" id="exampleInputEmail1" value="5 Hari 4 Malam"> 5 Hari 4 Malam<br>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="nama">Ongkos dari Bandung (Harga per seorang)</label>
                                        <input type="text" name="ongkos_bandung" class="form-control" id="wa" placeholder="Silahkan Ganti Harga Ongkos Dari Bandung" value='<?php echo $q['ongkos_bandung']; ?>'>
                                    </div>
                                     <div class="form-group">
                                        <label for="nama">Ongkos dari Jakarta (Harga per seorang)</label>
                                       <input type="text" name="ongkos_jakarta" class="form-control" id="wa" placeholder="Silahkan Ganti Harga Ongkos Dari Jakarta" value='<?php echo $q['ongkos_jakarta']; ?>'>
                                    </div>                                    
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary"><i class='fa fa-check'></i> Simpan</button>
                                                   
                                    <input type="reset" class="btn btn-default" value="Ulangi">
                                </div>
                                </form>
                            </div><!-- /.box -->
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <!-- Primary box -->
                        <div class="box box-primary">
                            <div class="box-header">
                                 <h3 class="box-title"><i class="fa fa-picture-o"></i>List Paket Wisata DwiBandara</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>                                        
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <!-- THE MESSAGES -->
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Paket</th>                                   
                                            <th>Durasi</th> 
                                            <th>Harga Ongkos Dari Bandung</th>
                                            <th>Harga Ongkos Dari Jakarta</th>
                                            <th colspan=3>Tindakan</th>
                                        </tr>
                                        </thead>
                                            <?php

                                            $data   = (mysql_query("SELECT * FROM paket"));
                                            $p      = new pagingPaket;
                                            $batas  = 10;
                                            $posisi = $p->cariPosisi($batas);
                                            $a      = mysql_query("SELECT * FROM paket ORDER BY paket ASC LIMIT $posisi, $batas");
                                            if(mysql_num_rows($a)==0){
                                                echo"<tr><td>Paket tidak ditemukan.</td></tr></tbody></table>";
                                            }else{
                                            while($b=mysql_fetch_array($a)){
                                            echo"
                                            <tr>                                                
                                                <td>$b[paket]</td>   
                                                <td>$b[durasi]</td>                                                                
                                                <td>$b[ongkos_bandung]</td>
                                                <td>$b[ongkos_jakarta]</td>                                              
                                                <td><a href='mint-edit-paket-$b[id]'><i class='glyphicon glyphicon-edit'></i> Ubah</a></td>
                                                <td><a href='deletepaket-$b[id]'><i class='glyphicon glyphicon-remove'></i> Hapus</a></td>";
                                                if($b['status']=='Aktif'){
                                                    echo"<td><a href='ubahstatuspaket-$b[id]'><i class='glyphicon glyphicon-ban-circle'></i> Nonaktifkan</a></td>";
                                                }else{
                                                    echo"<td><a href='ubahstatuspaket-$b[id]'><i class='glyphicon glyphicon-ok'></i> Aktifkan</a></td>";
                                                }
                                                echo"
                                            </tr>";
                                            }
                                            $jmldata    =   mysql_num_rows(mysql_query("SELECT * FROM paket"));
                                            $jmlhalaman =   $p->jumlahHalaman($jmldata, $batas);
                                            $linkHalaman=   $p->navHalaman($_GET['hal'],$jmlhalaman);                              
                                             
                                            }
                                    echo"     
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.box-body -->                                                      
                            <div class='box-footer clearfix'>";
                            
                            // displaying paginaiton.
                                echo "<ul class='pagination pagination-sm no-margin pull-right'>$linkHalaman</ul>";
                            ?>
                            </div><!-- /.box-footer-->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
