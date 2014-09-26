<?php
	include("../lib/conn.php");
	//Mint Controller
	switch($_GET['process']){
		case "tambahLokasi":
				  $nama	      =	$_POST['nama'];
				$deskripsi	=	$_POST['deskripsi'];
					$gambar     = $_FILES['gambar']['name'];
				$status     = 'Aktif';
												  
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
							  window.location.href='mint-lokasi-1'
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

					$query = mysql_query("UPDATE lokasi SET nama='$nama', deskripsi='$deskripsi' WHERE id=$id");
												  
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
								  window.location.href='mint-edit-lokasi-1'
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

			case"tambahUser":

					$username  = $_POST['username'];
					$password  = $_POST['password'];
					$nama      = $_POST['name'];
					$status    = "Aktif";

               $query = mysql_query("INSERT INTO user(username,password,name,status)
												 VALUES('$username','$password','$nama','$status')"); 

					echo"$query";
					if($query){ 
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								  window.alert('user berhasil ditambahkan.')
								  window.location.href='mint-user'
								  </SCRIPT>");
					}else{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								  window.alert('User gagal ditambahkan.')
								  window.location.href='$_SERVER[HTTP_REFERER]'                               
								  </SCRIPT>");
					}
							 
					break;

			case "editUser":
					$id        = $_POST['id'];
					$username  = $_POST['username'];
					$password  = $_POST['password'];

				   $query = mysql_query("UPDATE user SET username='$username', password='$password' WHERE id=$id");

					if($query){ 
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								  window.alert('user berhasil diperbarui.')
								  window.location.href='mint-edit-user-1'
								  </SCRIPT>");
					}else{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								  window.alert('Kontak gagal diperbarui.')
								  window.location.href='$_SERVER[HTTP_REFERER]'
								  </SCRIPT>");
					} 
							 
					break;


			case "changeStatUser":

					$id = $_GET['id'];
					echo $id;

					$q = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id=$id")); 
					if($q['status'] == "Aktif"){
						mysql_query("UPDATE user SET status='Tidak Aktif' WHERE id=$id");
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								  window.alert('User telah dinonaktifkan.')
								  window.location.href='$_SERVER[HTTP_REFERER]'
								  </SCRIPT>");
					}else{
						mysql_query("UPDATE user SET status='Aktif' WHERE id=$id");
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								  window.alert('User telah diaktifkan.')
								  window.location.href='$_SERVER[HTTP_REFERER]'
								  </SCRIPT>");
					}
					break;

			 case "deleteUser":
					$id = $_GET['id'];
					$del = mysql_fetch_array(mysql_query("SELECT * FROM user WHERE id=$id"));
							  
					mysql_query("DELETE FROM user WHERE id=$id");
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								  window.alert('User dihapus.')
								  window.location.href='$_SERVER[HTTP_REFERER]'
								  </SCRIPT>");

					break;


			case "ubahKontak":

					$alamat   = $_POST['alamat'];
					$email    = $_POST['email'];
					$blog     = $_POST['blog'];
					$telpon_1  = $_POST['telepon_1'];                        
					$telpon_2  = $_POST['telepon_2'];

					$query = mysql_query("UPDATE kontak SET alamat='$alamat',email='$email',blog='$blog',telpon_1='$telpon_1',telpon_2='$telpon_2'");

					if($query){ 
					   echo ("<SCRIPT LANGUAGE='JavaScript'>
								 window.alert('Kontak berhasil diperbarui.')
								 window.location.href='mint-edit-deskripsi'
								 </SCRIPT>");
					}else{
					   echo ("<SCRIPT LANGUAGE='JavaScript'>
								 window.alert('Kontak gagal diperbarui.')
								 window.location.href='mint-edit-deskripsi'
								 </SCRIPT>");
					} 
								
					break;

			case"ubahDeskripsi":

					$layanan = $_POST['layanan'];
					$keunggulan = $_POST['keunggulan'];
					$tentang_kami = $_POST['tentang_kami'];

					$query = mysql_query("UPDATE deskripsi SET layanan='$layanan',keunggulan='$keunggulan',tentang_kami='$tentang_kami'");

					if($query){ 
					   echo ("<SCRIPT LANGUAGE='JavaScript'>
								 window.alert('Deskripsi DwiBandara berhasil diperbarui.')
								 window.location.href='mint-edit-deskripsi'
								 </SCRIPT>");
					}else{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								 window.alert('Deskripsi DwiBandara gagal diperbarui.')
								 window.location.href='mint-edit-deskripsi'
								 </SCRIPT>");
					} 

					break;

			case "tambahGaleri":
					
					$nama_foto  = $_POST['nama_foto'];
					$deskripsi  = $_POST['deskripsi'];
					$tanggal    = date('Y-m-d H:i:s');
					$status     = 'Aktif';
					$foto       = $_FILES['foto']['name'];
							  
					if(empty($foto)){

					   $query = mysql_query("INSERT INTO galeri(id,nama_foto,deskripsi,foto,tanggal,status)
													 VALUES('','$nama_foto','$deskripsi','$tanggal','$status')");
					}else{

						$errors     = array();
						$maxsize    = 2097152;
						$acceptable = array(
												'image/jpeg',
												'image/jpg',
												'image/gif',
												'image/png'
										  );

						if(($_FILES['foto']['size'] >= $maxsize) || ($_FILES["foto"]["size"] == 0)) {
							$errors[] = 'Ukuran gambar terlalu besar, gambar tidak boleh lebih dari 2MB.';
						}

						if(!in_array($_FILES['foto']['type'], $acceptable) && (!empty($_FILES["foto"]["type"]))) {
							$errors[] = 'Jenis file tidak diperbolehkan, hanya bisa upload gambar berekstensi jpg/png/gif.';
						}

						if(count($errors) === 0) {
							$lokasi_file = $_FILES['foto']['tmp_name'];
							$dir = "../assets/img/galeri/";
							$ukuran = $_FILES['foto']['size'];
							move_uploaded_file($lokasi_file,$dir.$foto);
							$query = mysql_query("INSERT INTO galeri(id,nama_foto,foto,deskripsi,tanggal,status)
								  						 VALUES('','$nama_foto','$foto','$deskripsi','$tanggal','$status')");
						} else {
							foreach($errors as $error) {
								echo '<script>alert("'.$error.'");</script>';
								$query = mysql_query("DELETE FROM galeri WHERE id=none");
							}
						}             
					}
										  
					if($query){ 
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Galeri $nama_foto berhasil ditambahkan.')
								window.location.href='$_SERVER[HTTP_REFERER]'
								</SCRIPT>");
					}else{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
								window.alert('Terjadi kesalahan pada penambahan galeri, silakan ulangi.')
								window.location.href='$_SERVER[HTTP_REFERER]'
								</SCRIPT>");
					}

					break;



          case "ubahGaleri":


          $id         = $_POST['id'];
          $nama_foto  = $_POST['nama_foto'];
          $deskripsi  = $_POST['deskripsi'];
          $tanggal    = date('Y-m-d H:i:s');
          $status     = 'Aktif';
          $foto       = $_FILES['foto']['name'];
                
          if(empty($foto)){

            $query = mysql_query("UPDATE galeri SET nama='$nama', deskripsi='$deskripsi' WHERE id=$id");

            
          }else{

            $errors     = array();
            $maxsize    = 2097152;
            $acceptable = array(
                        'image/jpeg',
                        'image/jpg',
                        'image/gif',
                        'image/png'
                      );

            if(($_FILES['foto']['size'] >= $maxsize) || ($_FILES["foto"]["size"] == 0)) {
              $errors[] = 'Ukuran gambar terlalu besar, gambar tidak boleh lebih dari 2MB.';
            }

            if(!in_array($_FILES['foto']['type'], $acceptable) && (!empty($_FILES["foto"]["type"]))) {
              $errors[] = 'Jenis file tidak diperbolehkan, hanya bisa upload gambar berekstensi jpg/png/gif.';
            }

            if(count($errors) === 0) {
              $lokasi_file = $_FILES['foto']['tmp_name'];
              $dir = "../assets/img/galeri/";
              $ukuran = $_FILES['foto']['size'];
              move_uploaded_file($lokasi_file,$dir.$foto);
            
              $query = mysql_query("UPDATE galeri SET nama_foto='$nama_foto', deskripsi='$deskripsi' WHERE id=$id");

            } else {
              foreach($errors as $error) {
                echo '<script>alert("'.$error.'");</script>';
                $query = mysql_query("DELETE FROM galeri WHERE id=none");
              }
            }             
          }
                      
         if($query){ 
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Galeri $nama_foto berhasil ditambahkan.')
                window.location.href='$_SERVER[HTTP_REFERER]'
                </SCRIPT>");
          }else{
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Terjadi kesalahan pada penambahan galeri, silakan ulangi.')
                window.location.href='$_SERVER[HTTP_REFERER]'
                </SCRIPT>");
          }

          break;


          case "deleteGaleri":

              $id = $_GET['id'];

              $del = mysql_fetch_array(mysql_query("SELECT * FROM galeri WHERE id=$id"));
                  
              if(!empty($del['foto'])){ unlink("../assets/img/galeri/$del[foto]"); }

                mysql_query("DELETE FROM galeri WHERE id=$id");
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Galeri dihapus.')
                      window.location.href='$_SERVER[HTTP_REFERER]'
                      </SCRIPT>");
              break;

          case "changeStatGaleri":

               $id = $_GET['id'];
               echo $id;

                 $q = mysql_fetch_array(mysql_query("SELECT * FROM galeri WHERE id=$id")); 
                  if($q['status'] == "Aktif"){
                    mysql_query("UPDATE galeri SET status='Tidak Aktif' WHERE id=$id");
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.alert('Galeri telah dinonaktifkan.')
                          window.location.href='$_SERVER[HTTP_REFERER]'
                          </SCRIPT>");
                  }else{
                    mysql_query("UPDATE galeri SET status='Aktif' WHERE id=$id");
                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                          window.alert('Galeri telah diaktifkan.')
                          window.location.href='$_SERVER[HTTP_REFERER]'
                          </SCRIPT>");
                  }
                  break;
		
    }
?>