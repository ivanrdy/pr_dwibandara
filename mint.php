<!DOCTYPE html>
<html>
<?php    
    //Include
    include("lib/conn.php");
    include("views/a_head.php");    
    session_start();
?>
    <body class="skin-blue">
<?php
        include("views/a_header.php");
        	
        	switch($_GET['page']){

        		case 'editdeskripsi'		 :	include("views/a_edit_deskripsi.php");
        							            break;
        		case 'editlokasi'	         :	include("views/a_edit_lokasi.php");
        			       			            break;

        	}	

        include("views/a_footer.php");
?>
    </body>
</html>