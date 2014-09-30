            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Beranda
                        <small>Panel administrator</small>
                    </h1>
                    <section class="content">
                    
                    <div class='col-md-12' style='margin-bottom:10px'>                        
                        <a class="btn btn-app" href='mint-lokasi-1'>
                            <span class="badge bg-tosca"></span>
                            <i class="fa fa-location-arrow"></i> Lokasi
                        </a>                        
                        <a class="btn btn-app" href='mint-galeri'>
                            <span class="badge bg-pinky"></span>
                            <i class="fa fa-picture-o"></i> Galeri
                        </a>                        
                        <a class="btn btn-app" href='mint-user'>
                            <i class="fa fa-users"></i> User
                        </a>                        
                        <a class="btn btn-app" href='mint-edit-deskripsi'>
                            <i class="fa fa-phone-square"></i> Kontak dan Deskripsi
                        </a>
                    </div>                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="col-sm-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-picture-o"></i> List Testimoni</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-mailbox">
                                        <thead>
                                            <tr>
                                                <th colspan=3 width="30%">Aksi</th>
                                                <th>Pengirim</th>
                                                <th>Email</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                    <?php

                                    $data   = (mysql_query("SELECT * FROM testimoni"));
                                    $p      = new pagingTesti;
                                    $batas  = 10;
                                    $posisi = $p->cariPosisi($batas);
                                    $a      = mysql_query("SELECT * FROM testimoni ORDER BY tanggal DESC LIMIT $posisi, $batas");
                                    if(mysql_num_rows($a)==0){
                                        echo"<tr><td>Testimoni tidak ditemukan.</td></tr></tbody></table>";
                                    }else{
                                    while($r=mysql_fetch_array($a)){
                                            if($r['status']=='Aktif'){
                                                echo "<tr class='unread'>
                                                        <td><a href='ubahstatustesti-$r[id]'><i class='glyphicon glyphicon-ban-circle'></i> Nonaktifkan</a></td>
                                                        <td><a href='deleteTesti-$r[id]'><span class='glyphicon glyphicon-trash'></span> Hapus Testi</a></td>";
                                            }else{ echo "<tr>
                                                            <td><a href='ubahstatustesti-$r[id]'><i class='glyphicon glyphicon-ok'></i> Aktifkan</a></td>
                                                            <td><a href='deleteTesti-$r[id]'><span class='glyphicon glyphicon-trash'></span> Hapus Testi</a></td>";}
                                    ?>                                                    
                                            <td><a href="mint-readMsg-<?php echo $r['id']; ?>"><i class="fa fa-eye"></i> Baca</td>
                                            <td class="name"><?php echo $r['pengirim']; ?></td>
                                            <td class="subject"><?php echo $r['url']; ?></td>
                                            <td class="time"><?php echo $r['tanggal']; ?></td>
                                        </tr>
                                    <?php }
                                    $jmldata    =   mysql_num_rows(mysql_query("SELECT * FROM testimoni"));
                                    $jmlhalaman =   $p->jumlahHalaman($jmldata, $batas);
                                    $linkHalaman=   $p->navHalaman($_GET['hal'],$jmlhalaman); 

                                    }
                                        ?>
                                    </table>
                            </div><!-- /.box-body -->   
                            <div class="box-footer clearfix">
                                    <div class="pull-right">
                                        <?php echo "<ul class='pagination pagination-sm no-margin pull-right'>$linkHalaman</ul>"; ?>
                                    </div>
                            </div><!-- box-footer -->
                        </div><!-- /.box -->
                    </div><!-- /.col (MAIN) -->
                    <div class="col-sm-12">
                        <!-- Primary box -->
                        <div class="box box-primary">
                            <div class="box-header">
                                 <h3 class="box-title"><i class="fa fa-picture-o"></i> List Paket Wisata DwiBandara</h3>                                
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
                        </div><!-- /.box -->

                    </div>                 
                </section><!-- /.content -->
            </aside><!-- /.right-side -->  