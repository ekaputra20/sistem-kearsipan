<?php
session_start();
include 'config.php';

$con = new Connect();

error_reporting(0);

if (isset($_POST['login'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];

	$query = $con->getSQL("SELECT * FROM login WHERE username = '$user' AND password = '$pass'") or die(mysql_error());

	if (mysql_num_rows($query) > 0) {
		while ($row = mysql_fetch_array($query)) {
			$_SESSION['user'] = $row['username'];
			$_SESSION['pass'] = $row['password'];
			$_SESSION['nip'] = $row['nip'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['hak'] = $row['hak_akses'];

			// $_SESSION['nama'] = $row['nama'];
			// $_SESSION['gol'] = $row['golongan'];
			//print_r($row);

			if ($row['hak_akses'] == "dosen") {
				?>
						<script type="text/javascript">
							window.location.href = "dosen.php";
						</script>
					<?php
} elseif ($row['hak_akses'] == "petugas") {
				?>
						<script type="text/javascript">
							window.location.href = "petugas.php";
						</script>
					<?php
} else {
				?>
					<script type="text/javascript" charset="utf-8">
						window.location.href  = "index.php?error=salah";
					</script>
					<?php
session_destroy();
			}
		}

	} else {
		?>
				<script type="text/javascript" charset="utf-8">
					window.location.href  = "index.php?error=salah";
				</script>
			<?php
}
}

if (isset($_SESSION['hak']) == null) {
	?>
<!DOCTYPE html>
<html lang="id" class="full">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <!--   <link rel="icon" href="../../favicon.ico"> -->
    <title>Sistem Informasi Kearsipan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/arsip.css">
    <link rel="stylesheet" type="text/css" href="css/navbar-fixed-top.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <link rel="stylesheet" type="text/css" href="css/the-big-picture.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!-- <link href="signin.css" rel="stylesheet"> -->

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

		.input-icon {
		    font-size: 22px;
		    position: absolute;
		    left: 31px;
		    top: 10px;
		}

    </style>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
  </head>
<body class="full">
<div class="navbar navbar-default navbar-fixed-top" style="background:#428BCA;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:#FFF;font-family:'OpenSans';" href="#" >S.I.A</a>
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
    		<div class="col-md-12" style="margin-top:10px;">
    			<h1 style="text-align:center;font-family:'OpenSans';margin-bottom:70px;color:white;font-weight:300;font-size:50px;">Sistem Informasi Kearsipan Universitas Pendidikan Indonesia</h1>
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
  <!--   			<div> -->
		     	<div><h3 style="text-align:center;font-family:'OpenSans';font-weight:400;color:white;">Login To Web</h3></div>
		     	<?php
if (isset($_GET['error'])) {
		echo '<div class="alert alert-warning alert-dismissible fade in peringatan" style="font-family:Segoe UI;" role="alert">
							    <button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
								    	Password atau username kurang tepat
							   </div>';
	}
	?>
			      <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" method="post">
			        <!-- <h2 class="form-signin-heading">Please sign in</h2> -->
			        	<span class="login-user"></span>
			        	<input type="text" class="form-control u-name" name="username" placeholder="Username" required autofocus>
			        	<br>


			        <input type="password" class="form-control" name="password" placeholder="Password" required>
			        <!-- <label class="checkbox">
			          <input type="checkbox" value="remember-me"> Remember me
			        </label> -->
			        <input class="btn buttonsize btn-block" name="login" type="submit" value="LOGIN">
			      </form>

				  <div class="tinggal">
					  <div class="tinggalkan">
					  	<a href="" class="btn">Lupa Password ?</a>
					   </div>
				  </div>

			      <div class="footer">
			      	<div class="need">
			      		<font color="white">Butuh Akun ?</font>
			      	</div>
			      	<div class="signup">
			      		<a href="daftar.php" style="font-weight:bold;">DAFTAR</a>
			      	</div>
			      </div>
		      <!-- </div> -->
    		</div>
     	</div>
     </div>
     <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
	</body>
</html>
<?php
} else {
	if ($_SESSION['hak'] == "dosen") {
		?>
				<script type="text/javascript">
					window.location.href = "dosen.php";
				</script>
			<?php
} elseif ($_SESSION['hak'] == "petugas") {
		?>
				<script type="text/javascript">
					window.location.href = "petugas.php";
				</script>
			<?php
} else {
		// Mencabut session
		session_destroy();
	}
}
?>
