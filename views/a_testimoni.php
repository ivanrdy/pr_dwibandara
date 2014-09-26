<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mailbox
            <small>Pesan masuk</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> <a href='mint'> Home</a></li>
            <li class="active"> Mailbox</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- MAILBOX BEGIN -->
        <div class="mailbox row">
            <div class="col-xs-12">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="row">
                          
                            <div class="col-sm-12">

                                <div class="table-responsive">
                                    <!-- THE MESSAGES -->
                                    <table class="table table-mailbox">
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

                                            if($r['status']=='Sudah Dibaca'){
                                                echo "<tr class='unread' title='Tampilkan Testimoni'>
                                                     <td><a href='ubahstatusgaleri-$a[id]'><i class='glyphicon glyphicon-ban-circle'></i> Nonaktifkan</a></td>
                                                      <td><a href='deletePesan-$r[id]' title data-toggle='tooltip' data-original-title='Hapus Pesan'><span class='glyphicon glyphicon-trash'></span></a></td>";
                                            }else{ echo "<tr title='Sembunyikan Testimoni'>
                                                         <td><a href='ubahstatusgaleri-$a[id]'><i class='glyphicon glyphicon-ok'></i> Aktifkan</a></td>
                                                         <td><a href='deletePesan-$r[id]' title data-toggle='tooltip' data-original-title='Hapus Pesan'><span class='glyphicon glyphicon-trash'></span></a></td>";}
                                    ?>                                                    
                                            
                                            <td class="name"><?php echo $r['pengirim']; ?></td>
                                            <td class="subject"><a href="readMsg-<?php echo $r['id']; ?>"><?php echo $r['url']; ?></a></td>
                                            <td class="time"><?php echo $r['tanggal']; ?></td>
                                        </tr>
                                    <?php }
                                    $jmldata    =   mysql_num_rows(mysql_query("SELECT * FROM testimoni"));
                                    $jmlhalaman =   $p->jumlahHalaman($jmldata, $batas);
                                    $linkHalaman=   $p->navHalaman($_GET['hal'],$jmlhalaman); 

                                    }
                                     ?>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.col (RIGHT) -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="pull-right">
                            <?php echo "<ul class='pagination pagination-sm no-margin pull-right'>$linkHalaman</ul>"; ?>
                        </div>
                    </div><!-- box-footer -->
                </div><!-- /.box -->
            </div><!-- /.col (MAIN) -->
        </div>
        <!-- MAILBOX END -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->