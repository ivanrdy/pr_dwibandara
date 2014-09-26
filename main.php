<!DOCTYPE html>
<html>
<?php    
    //Include
    include("lib/conn.php");
    include("views/head.php");    
    session_start();
?>
    <body>
<?php
        include("views/header.php");
        	
        	switch($_GET['page']){

        		case 'home'		:	include("views/home.php");
        							break;
        		case 'pakej'	:	include("views/pakej.php");
        			       			break;
        		case 'kontak'	:	include("views/kontak.php");
        							break;
        		case 'lokasi'	:	include("views/lokasi.php");
        							break;
                case 'galeri'   :   include("views/galeri.php");
                                    break;
                case 'testi'    :   include("views/testi.php");
                                    break;
                case 'login'    :   include("views/login.php");
                                    break;
        		default 		:	include("views/home.php");

        	}	

        include("views/footer.php");
?>
    </body>
</html>