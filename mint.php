<!DOCTYPE html>
<html>
<?php    
    //Include
    include("lib/conn.php");
    include("lib/paginator.php");
    include("views/a_head.php");    
    session_start();
?>
    <body class="skin-blue">
<?php
        if(empty($_SESSION['name'])){
            include("error.html");
        }else{

            include("views/a_header.php");
             	
            	switch($_GET['page']){

                    case 'home'                 :   include("views/a_beranda.php");
                                                    break;
                    case 'paket'                :   include("views/a_paket.php");
                                                    break;
            		case 'editdeskripsi'		:	include("views/a_edit_deskripsi.php");
            							            break;
            		case 'editlokasi'	        :	include("views/a_edit_lokasi.php");
            			       			            break;
                    case 'lokasi'               :   include ("views/a_lokasi.php");
                                                    break;
                    case 'user'                 :   include ("views/a_user.php");
                                                    break;
                    case 'edituser'             :   include ("views/a_edit_user.php");
                                                    break;             
                    case 'galeri'               :   include ("views/a_galeri.php");
                                                    break;
                    case 'editgaleri'           :   include ("views/a_edit_galeri.php");
                                                    break;                               
                    case 'testimoni'            :   include ("views/a_testimoni.php");                                                       
                                                    break;                                
                    case 'readMsg'              :   include ("views/a_read.php");                                                       
                                                    break;         
                    case 'paket'                :   include ("views/a_paket.php");                                                                              
                                                    break;                                                      
            	    case 'editpaket'            :   include ("views/a_edit_paket.php");
                                                    break;
                    case 'cms'                  :   include("views/a_cms.php");
                                                    break;
                }	

            include("views/a_footer.php");
        }
?>
    </body>
</html>