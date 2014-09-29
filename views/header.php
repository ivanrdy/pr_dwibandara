<nav id="top" class="navbar navbar-inverse navbar-static-top" role="navigation" style="font-size:120%">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="beranda" class="navbar-brand lobster" style="font-size: 30px">DWIbandara</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if($_GET['page']=='pakej'){ ?>
                <li class='active'>
                <?php }else{ echo "<li>"; } ?>
                    <a href="pakej"><i class="fa fa-list-ul"></i> Pakej</a>
                </li>
                <?php if($_GET['page']=='lokasi'){ ?>
                <li class='active' style="color:#FFF">
                <?php }else{ echo "<li>"; } ?>
                    <a href="lokasi"><i class="fa fa-globe"></i> Lokasi</a>
                </li>
                <?php if($_GET['page']=='galeri'){ ?>
                <li class="active" style="color:#FFF">
                <?php }else{ echo "<li>"; } ?>
                    <a href="galeri"><i class="fa fa-picture-o"></i> Galeri</a>
                </li>
                <?php if($_GET['page']=='testi'){ ?>
                <li class="active" style="color:#FFF">
                <?php }else{ echo "<li>"; } ?>
                    <a href="testi-1"><i class="fa fa-comment"></i> Testimoni</a>
                </li>
                <?php if($_GET['page']=='kontak'){ ?>
                <li class='active' style="color:#FFF">
                <?php }else{ echo "<li>"; } ?>
                    <a href="kontak"><i class="fa fa-envelope-square"></i> Kontak</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>