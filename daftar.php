<?php
	session_start();
	include 'config.php';

	$con = new Connect();

	error_reporting(0);
	
	if(isset($_POST['create'])){
		$nip = trim($_POST['nip']);
		$name = trim($_POST['nama']);
		$gol = trim($_POST['golongan']);
		$pang = trim($_POST['pangkat']);
		$jabFung = trim($_POST['jabatanFungsional']);
		$email = trim($_POST['email']);
		$user = trim($_POST['username']);
		$pass = trim($_POST['password']);

		if(empty($nip) || empty($name) || empty($gol) || empty($pang) || empty($jabFung) || empty($email) || empty($user) || empty($pass))
		{
			$error = "Harap isi";
		}else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$errro = "Masukan email yang benar";
		}else
		{
			$query = $con->setSQL("INSERT INTO dosen VALUES('$nip','$name','$gol','$pang','$jabFung')");
			$query2 = $con->setSQL("INSERT INTO login VALUES('$user','$pass','$nip','$email','dosen')");

			?>
				<script type="text/javascript" charset="utf-8">
					location.href = "daftar.php?berhasil=success";
				</script>
			<?php
		}
	}

	if(isset($_SESSION['hak']) == null){
	?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <!--   <link rel="icon" href="../../favicon.ico"> -->
    <title>Sign Up</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/arsip.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <link rel="stylesheet" type="text/css" href="css/the-big-picture.css">
   <!--  <link href="signin.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" type="text/css" href="css/daftar.css"> -->
	<style type="text/css" media="screen">
		body{
    		background:#FFF;
    	}	
    	.form-control:focus {
		    border-color:none; 
		    outline: 0;
		    -webkit-box-shadow:none; 
		    box-shadow:none; 
		}
		.form-control {
		    display: block;
		    width: 100%;
		    height: 34px;
		    padding: 6px 12px;
		    font-size: 14px;
		    line-height: 1.42857143;
		    color: #555;
		    background-color: #fff;
		    background-image: none;
		    border: 1px solid #ccc;
		    border-radius:0; 
		    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
		    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
		    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		}

		.navbar-default {
		    background-color: #f8f8f8;
		    border-color:#428BCA;
		}

		.full {
		    background: url('images/library-images.jpg') no-repeat center center fixed;
		    -webkit-background-size: cover;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    background-size: cover;
		}
	</style>
  </head>
<body class="full">
<div class="navbar navbar-default navbar-fixed-top full" style="background:#428BCA;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:#FFF;font-family:'Segoe UI';" href="#" >S.I.A</a>
        </div>
        <div style="margin-bottom:8px;"></div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right li-color">
            <li class="login"><a href="" style="color:white;font-family:'Segoe UI';font-weight:bold;line-height:0.4;">LOGIN</a></li>
            <li class="sign-up"><a href="" style="color:white;font-family:'Segoe UI';line-height:0.4;font-weight:bold;">SIGN UP</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
    <div class="row">
    		<!-- <div class="col-md-4">
    			<h1 style="text-align:center;font-family:'Segoe UI';font-weight:300;">Login To Web</h1>
    		</div> -->
    		<div class="col-md-12" style="margin-top:20px;">
    			<h1 style="text-align:center;font-family:'Segoe UI';font-weight:300;margin-bottom:70px;color:white;">Sistem Informasi Kearsipan Universitas Pendidikan Indonesia</h1>
    		</div>
    		<!-- <div class="col-md-4">
    			<h1 style="text-align:center;font-family:'Segoe UI';font-weight:300;">Login To Web</h1>
    		</div> -->
   		</div>
   	<div class="row">
   		    <div class="col-md-8">
    			<img src="images/01_iPhone6_Single_Classic_Hand_FrontView.png" class="img-responsive" alt="">
    		</div>
    	<div class="col-md-4">
     <div>
     	<div><h3 style="text-align:center;font-family:'Segoe UI';font-weight:400;color:white;">Sign Up</h3></div>
	      <form class="form-signin" action="" method="post" role="form">
<!-- 	      <div class="input-group">
	      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
	      <input type="text" class="form-control" name="nip" placeholder="NIP" required autofocus>
	      <br>
	      <input type="text" class="form-control"  name="nama" placeholder="Nama" required>
	      <br>
	      <select name="golongan" class="form-control" required>
	      	<option value="">Golongan</option>
	      	<option value="I A">I A</option>
	      	<option value="I B">I B</option>
	      	<option value="I C">I C</option>
	      	<option value="I D">I D</option>
	      	<option value="II A">II A</option>
	      	<option value="II B">II B</option>
	      	<option value="II C">II C</option>
	      	<option value="II D">II D</option>
	      	<option value="III A">III A</option>
	      	<option value="III B">III B</option>
	      	<option value="III C">III C</option>
	      	<option value="III D">III D</option>
	      	<option value="IV A">IV A</option>
	      	<option value="IV B">IV B</option>
	      	<option value="IV C">IV C</option>
	      	<option value="IV D">IV D</option>
	      	<option value="IV E">IV E</option>
	      </select>
	      <br>
	      <select name="pangkat" class="form-control" required>
	      	<option value="">Pangkat</option>
	      	<option value="Juru Muda">Juru Muda</option>
	      	<option value="Juru Muda Tingkat I">Juru Muda Tingkat I</option>
	      	<option value="Juru">Juru</option>
	      	<option value="Juru Tingkat I">Juru Tingkat I</option>
	      	<option value="Pengantur Muda">Pengantur Muda</option>
	      	<option value="Pengantur Muda Tingkat I">Pengantur Muda Tingkat I</option>
	      	<option value="Pengatur">Pengatur</option>
	      	<option value="Pengatur Tingkat I">Pengatur Tingkat I</option>
	      	<option value="Penata Muda">Penata Muda</option>
	      	<option value="Penata Muda Tingkat I">Penata Muda Tingkat I</option>
	      	<option value="Penata">Penata</option>
	      	<option value="Penata Tingkat I">Penata Tingkat I</option>
	      	<option value="Pembina">Pembina</option>
	      	<option value="Pembina Tingkat I">Pembina Tingkat I</option>
	      	<option value="Pembina Utama Muda">Pembina Utama Muda</option>
	      	<option value="Pembina Utama Madya">Pembina Utama Madya</option>
	      	<option value="Pembina Utama">Pembina Utama</option>
	      </select>
	      <br>
	      <input type="text" class="form-control"  name="jabatanFungsional" placeholder="Jabatan Fungsional" required>
	      <br>
	      <input type="email" class="form-control validation"  name="email" placeholder="Email" required>
	      <br>
	      <input type="text" class="form-control"  name="username" placeholder="Username" required>
	      <br>
	      <!--   </div> -->
	      <input type="password" class="form-control" name="password" placeholder="Password" required>
	        <!-- <label class="checkbox">
	          <input type="checkbox" value="remember-me"> Remember me
	        </label> -->
	        <input class="btn buttonsize btn-block" name="create" type="submit" value="Sign Up">
	      </form>

		  <div class="tinggal">
			  <div class="tinggalkan">
			  	<a href="">Lupa Password ?</a>
			   </div>
		  </div>

	      <div class="footer">
	      	<div class="need">
	      		<font color="white">Login ?</font> 
	      	</div>
	      	<div class="signup">
	      		<a href="index.php">Login</a>
	      	</div>
	      </div>
     </div>
    </div> 
    </div>
    </div>
    </div><!-- /container -->

    <div class="container-fluid">
     	<div class="row" style="background:#499CE4; padding-bottom:300px;">
     		<div class="col-md-12">
     			a
     		</div>
     	</div>
     	<div class="row" style="background:#428BCA; padding-bottom:100px;">
     		<div class="col-md-12">
     			a
     		</div>
     	</div>
    </div>
	
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
	</body>
</html>
<?php
	}else{
		if($_SESSION['hak'] == "dosen")
		{
			?>
				<script type="text/javascript">
					window.location.href = "dosen.php";
				</script>
			<?php
		}elseif($_SESSION['hak'] == "petugas")
		{
			?>
				<script type="text/javascript">
					alert("Petugas");
				</script>
			<?php	
		}else
		{
			// Mencabut session
			session_destroy();
		}
	}
?>
