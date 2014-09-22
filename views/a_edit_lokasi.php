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
                    <div class="col-sm-12">
                    <div class='col-md-4'>
                        <div class="box box-pinky">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-plus-square-o"></i> Tambah Lokasi Wisata</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-pinky btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>                                        
                                </div>
                            </div>
                            <form role="form" action="../controller/adminController.php?process=tambahLokasi" enctype="multipart/form-data" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama">Nama Lokasi</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Lokasi Wisata">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi</label>
                                    <textarea name='deskripsi' class='form-control full-width' placeholder="Deskripsi Lokasi Wisata"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <input type="file" id="gambar" name="gambar" accept='image/*' required>
                                    <p class="help-block">Masukkan file gambar.</p>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-tosca"><i class='fa fa-check'></i> Simpan</button>
                                               
                                <input type="reset" class="btn btn-default" value="Ulangi">
                            </div>
                            </form>
                        </div><!-- /.box -->
                    </div>
                    <div class="col-md-8">
                        <!-- Primary box -->
                        <div class="box box-pinky">
                            <div class="box-header">
                                 <h3 class="box-title"><i class="fa fa-picture-o"></i>List Lokasi Wisata</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-pinky btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>                                        
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <!-- THE MESSAGES -->
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Nama Lokasi</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Upload</th>
                                            <th colspan=8>Tindakan</th>
                                        </tr>
                                        </thead>
                                           
                                            <tr>
                                                <td class='name'>Contoh<a href='' data-rel='lightbox' class='expand'></a></td>
                                                <td class='kode'></td>
                                                <td class='date'></td>
                                                <td><a href='#'><i class='glyphicon glyphicon-edit'></i> Ubah</a></td>
                                                <td><a href='#'><i class='glyphicon glyphicon-remove'></i> Hapus</a></td>
                                               
                                                    <td><a href='#'><i class='glyphicon glyphicon-ban-circle'></i> Nonaktifkan</a></td>
                                                <td><a href='#'><i class='glyphicon glyphicon-ok'></i> Aktifkan</a></td>
                                                
                                            </tr>
                                    </table>
                                </div><!-- /.table-responsive -->
                            </div><!-- /.box-body -->                                                      
                            <div class='box-footer clearfix'>
                                <ul class='pagination pagination-sm no-margin pull-right'></ul>
                            
                            </div><!-- /.box-footer-->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
