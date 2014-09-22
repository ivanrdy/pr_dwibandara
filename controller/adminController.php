<?php
	include("../lib/conn.php");
	//Mint Controller
	switch($_GET['process']){
		case "tambahLokasi":
			$nama	      =	$_POST['nama'];
			$deskripsi	=	$_POST['deskripsi'];
			$gambar     = 	$_FILES['gambar']['name'];
                  $status     =     'Aktif';
                                      
            if(empty($gambar)){

           		$query = mysql_query("INSERT INTO lokasi(id,nama,deskripsi,gambar,status)
				VALUES('','$nama','$deskripsi','$gambar','$status')");
                                      
            }else{

            	$errors     = array();
            	$maxsize    = 2097152;
            	$acceptable = array(
            	    'image/jpeg',
            	    'image/jpg',
            	    'image/gif',
            	    'image/png'
            	);

            	if(($_FILES['gambar']['size'] >= $maxsize) || ($_FILES["gambar"]["size"] == 0)) {
            	    $errors[] = 'Ukuran gambar terlalu besar, gambar tidak boleh lebih dari 2MB.';
            	}

            	if(!in_array($_FILES['gambar']['type'], $acceptable) && (!empty($_FILES["gambar"]["type"]))) {
            	    $errors[] = 'Jenis file tidak diperbolehkan, hanya bisa upload gambar berekstensi jpg/png/gif.';
            	}

            	if(count($errors) === 0) {
            	    $lokasi_file = $_FILES['gambar']['tmp_name'];
            	    $dir = "../images/lokasi/";
            	    $ukuran = $_FILES['gambar']['size'];
            	    move_uploaded_file($lokasi_file,$dir.$gambar);
            	    $query = mysql_query("INSERT INTO lokasi(id,nama,deskripsi,gambar,status)
    				VALUES('','$nama','$deskripsi','$gambar','$status')"); 
            	} else {
            	    foreach($errors as $error) {
            	        echo '<script>alert("'.$error.'");</script>';
            	        $query = mysql_query("DELETE FROM lokasi WHERE id=none");
            	    }
            	}            	

			}
			
			if($query){	
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				        window.alert('Lokasi $nama berhasil ditambahkan.')
				      
				        </SCRIPT>");
			}else{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				        window.alert('Terjadi kesalahan pada penambahan lokasi, silakan ulangi.')
			
				        </SCRIPT>");
			}

			break;


            

      }
?>