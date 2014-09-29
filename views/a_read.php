<?php
    $id = $_GET['id'];

    $q = mysql_fetch_array(mysql_query("SELECT * FROM testimoni WHERE id=$id"));
    if($q['status'] == 'Belum Dibaca'){
        mysql_query("UPDATE testimoni SET status = 'Sudah Dibaca' WHERE id=$id");
    }
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Testimoni
            <small>Testimoni Pelanggan</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> <a href='mint'> Beranda</a></li>
            <li><a href="mint-testi-1">Testimoni</a></li>
            <li class="active"> Baca Testimoni</li>
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
                            <?php 
                                $id = $_GET['id'];

                                $q = mysql_fetch_array(mysql_query("SELECT * FROM testimoni WHERE id=$id"));
                            ?>
                                <div class="row pad">
                                    <div class="col-sm-6">  
                                        <a class='btn btn-primary' href="mint-testi-1"><span class='glyphicon glyphicon-chevron-up'></span> Kembali Ke testimoni</a>                                                  
                                        <a class='btn btn-primary' href="deleteTesti-<?php echo $q['id']; ?>"><span class='glyphicon glyphicon-trash'></span> Hapus Testimoni</a>  
                                        <?php 
                                        	if($q['status']=='Nonaktif'){
                                        		echo"<a title data-toggle='tooltip' data-original-title='Perbolehkan untuk tampil di halaman testimoni' class='btn btn-primary' href='ubahstatustesti-$q[id]'><span class='glyphicon glyphicon-edit'></span> Aktifkan</a>";
                                        	}else{
                                        		echo"<a title data-toggle='tooltip' data-original-title='Berhenti tampilkan di halaman testimoni' class='btn btn-primary' href='ubahstatustesti-$q[id]'><span class='glyphicon glyphicon-edit'></span> Nonaktifkan</a>";
                                        	}
                                        ?>
                                    </div>
                                </div><!-- /.row -->
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <dl class='bigpadding col-sm-12'>
                                            <dt>DARI : </dt>
                                            <dd><?php echo $q['pengirim']; ?> (<?php echo $q['url']; ?>)</dd>
                                            <dt>ASAL NEGARA : </dt>
                                            <dd style='border-bottom:1px solid #aaa'><?php echo $q['asal']; ?></dd>
                                            <dd><small>Dikirimkan pada : <?php echo $q['tanggal']; ?></small></dd><br>
                                            <dd><?php echo $q['isi']; ?></dd>
                                        </dl>
                                    </div>
                                </div>                                            
                            </div><!-- /.col (RIGHT) -->
                        </div><!-- /.row -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (MAIN) -->
        </div>
        <!-- MAILBOX END -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->