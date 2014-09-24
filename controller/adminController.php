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
            	    $dir = "../assets/img/lokasi/";
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
				        window.location.href='mint-lokasi'
				        </SCRIPT>");
			}else{
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				        window.alert('Terjadi kesalahan pada penambahan lokasi, silakan ulangi.')
			
				        </SCRIPT>");
			}

			break;

 
            case"ubahLokasi":
                  
                  $id         =     $_POST['id'];
                  $nama       =     $_POST['nama'];
                  $deskripsi  =     $_POST['deskripsi'];                  
                  $gambar     =     $_FILES['gambar']['name'];
                                      
            if(empty($gambar)){

                  $query = mysql_query("UPDATE lokasi SET nama='$nama', deskripsi='$detail' WHERE id=$id");
                                      
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
                      $dir = "../assets/img/lokasi/";
                      $ukuran = $_FILES['gambar']['size'];
                      move_uploaded_file($lokasi_file,$dir.$gambar);
                      $query = mysql_query("INSERT INTO lokasi(id,nama,deskripsi,gambar,status)
                        VALUES('','$nama','$detail','$gambar','$tgl','$status')"); 
                  } else {
                      foreach($errors as $error) {
                          echo '<script>alert("'.$error.'");</script>';
                          $query = mysql_query("DELETE FROM lokasi WHERE id=none");
                      }
                  }   

                  }
                  
                  if($query){ 
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Lokasi $nama berhasil diperbarui.')
                                window.location.href='mint-edit-lokasi'
                                </SCRIPT>");
                  }else{
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Terjadi kesalahan pada perbaruan produk, silakan ulangi.')
                                window.location.href='$_SERVER[HTTP_REFERER]'
                                </SCRIPT>");
                  }
            
                  break;

            
                  case "deleteLokasi":

                        $id = $_GET['id'];

                        $del = mysql_fetch_array(mysql_query("SELECT * FROM lokasi WHERE id=$id"));
                        
                        if(!empty($del['foto'])){ unlink("../assets/img/lokasi/$del[gambar]"); }

                        mysql_query("DELETE FROM lokasi WHERE id=$id");
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Lokasi dihapus.')
                                window.location.href='$_SERVER[HTTP_REFERER]'
                                </SCRIPT>");

                        break;

                  case "changeStat":

                        $id = $_GET['id'];
                        echo $id;

                        $q = mysql_fetch_array(mysql_query("SELECT * FROM lokasi WHERE id=$id")); 
                        if($q['status'] == "Aktif"){
                              mysql_query("UPDATE lokasi SET status='Tidak Aktif' WHERE id=$id");
                              echo ("<SCRIPT LANGUAGE='JavaScript'>
                                      window.alert('Lokasi telah dinonaktifkan.')
                                      window.location.href='$_SERVER[HTTP_REFERER]'
                                      </SCRIPT>");
                        }else{
                              mysql_query("UPDATE lokasi SET status='Aktif' WHERE id=$id");
                              echo ("<SCRIPT LANGUAGE='JavaScript'>
                                      window.alert('Lokasi telah diaktifkan.')
                                      window.location.href='$_SERVER[HTTP_REFERER]'
                                      </SCRIPT>");
                        }


                        break;
           
                  case "editUser":
                  $id        = $_POST['id'];
                  $username  = $_POST['username'];
                  $password  = $_POST['password'];

                      $query = mysql_query("UPDATE user SET username='$user', password='$password' WHERE id=$id");

                      if($query){ 
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('user berhasil diperbarui.')
                                
                                </SCRIPT>");
                      }else{
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                window.alert('Kontak gagal diperbarui.')
                              
                                </SCRIPT>");
                      } 
                      
                      break;
      }
?>