<?php
	include("../lib/conn.php");
	include("../lib/noinjek.php");
	session_start();
	//Index Controller
	switch($_GET['process']){
		case "login":
			$u = noinjek($_POST['u']);
			$p = noinjek($_POST['p']);

			if(!ctype_alnum($u) OR !ctype_alnum($p)){
				echo ("<SCRIPT LANGUAGE='JavaScript'>
				        window.alert('Injeksi terdeteksi.')
				        window.location.href='in'
				        </SCRIPT>");
			}else{
				$check = mysql_query("SELECT * FROM user WHERE username='$u' AND password='$p'");
				$count = mysql_num_rows($check);
				if($count == 1){
					
					$_SESSION['name'] = $u;
					$_SESSION['auth'] = "Superuser";
					echo ("<SCRIPT LANGUAGE='JavaScript'>
				        	window.alert('Selamat datang, $u.')
				        	window.location.href='mint'
				        	</SCRIPT>");
				}else{
					echo ("<SCRIPT LANGUAGE='JavaScript'>
				        	window.alert('Username / Password salah.')
				        	window.location.href='in'
				        	</SCRIPT>");
				}
			}

			break;

		case "logout":

			$_SESSION['name'] = "";
			$_SESSION['auth'] = "";

			session_destroy();

			header("location:beranda");

			break;
	}
?>