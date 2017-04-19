<?php
session_start();
include 'config.php';
$con = new Connect();
error_reporting(~E_NOTICE);

if (isset($_GET['tampil'])) {
	$query = mysql_query("SELECT * FROM login WHERE nip = '" . $_GET['tampil'] . "'");

	$tampil = $_GET['tampil'];

	$row = mysql_fetch_array($query);

	$username = $row['username'];
}

$query = $con->getSQL("SELECT * FROM dosen WHERE nip = '" . $_SESSION['nip'] . "'");

$row = mysql_fetch_array($query);
$nama = $row['nama'];
$gol = $row['golongan'];
$pangkat = $row['pangkat'];
$jk = $row['jabatanFungsional'];

if ($_SESSION['hak'] == "dosen") {
	?>
<!DOCTYPE html>
<html lang="id">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" media="screen">
    .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus{
        background:#5694CA;
      }
      .nav-hover i:hover{
        color:#5CACF1;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
      }

      .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 1000;
      display: none;
      float: left;
      min-width: 160px;
      padding: 5px 0;
      margin: 2px 0 0;
      font-size: 14px;
      text-align: left;
      list-style: none;
      background-color: #fff;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      border: 1px solid #ccc;
      border: 1px solid rgba(0,0,0,.15);
      border-radius: 5px;
      -webkit-box-shadow:none;
      box-shadow:none;
      }
      .navbar-default .navbar-toggle .icon-bar {
    background-color: #FFF;
    }

    .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
    background-color:#4797DC;
    }

    @media (max-width: 767px){
    .navbar-default .navbar-nav .open .dropdown-menu>li>a {
    color: #FFF;
    }
    @media (max-width: 767px) {.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover, .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #FFF;
        background-color: transparent;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 14px;
        text-align: left;
        list-style: none;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0,0,0,.15);
        /*border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px orange;
        box-shadow: 0 6px 12px rgba(0,0,0,.175);*/
    }

    .navbar-default .navbar-toggle {
         border-color: #428BCA;
    }

    .navbar-default {
        background-color: #f8f8f8;
        border-color:#428BCA;
    }

/* make sidebar nav vertical */
  .sidebar-nav .navbar .navbar-collapse {
    padding: 0;
    max-height: none;
  }
  .sidebar-nav .navbar ul {
    float: none;
    display: block;
  }
  .sidebar-nav .navbar li {
    float: none;
    display: block;
  }
  .sidebar-nav .navbar li a {
    padding-top: 12px;
    padding-bottom: 12px;
  }

  </style>
  </head>
  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" style="background:#428BCA;border-bottom:1px solid #428BCA;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:#FFF;font-family:'Segoe UI';" href="#">S.I.A</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav nav-hover">
            <li><a href="#" class="line-hover" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-home fa-lg" style="color:#fff;"></i>&nbsp; Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-th-large fa-lg"></i>&nbsp; Menu &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Semester Ganjil 2015 - 2016</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><img src="images/avatar_icon.png" style="width:25px; height:25px;"> &nbsp;<?php if (isset($_SESSION['hak']) == "dosen") {echo $_SESSION['user'];}
	?> &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
              	<li><a href="dosen/">Profil</a></li>
                <li class="divider"></li>
                <li><a href="?logout=log">Logout</a></li>
                <?php
if (isset($_GET['logout'])) {
		session_destroy();
		// unset($_SESSION['hak']);
		?>
                      <script type="text/javascript">
                        window.location.href = "index.php";
                      </script>
                    <?php
}
	?>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

   <div class="container-fluid">
<div class="row">
  <div class="col-sm-2">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Sidebar menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Menu Item 1</a></li>
            <li><a href="#">Menu Item 2</a></li>
            <li><a href="#">Menu Item 3</a></li>
            <li><a href="#">Menu Item 4</a></li>
            <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    Main content goes here
  </div>
</div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
<?php
} else if ($_SESSION['hak'] == "petugas") {
	?>
			<!DOCTYPE html>
<html lang="id">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" media="screen">
       .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus{
        background:#5694CA;
      }
      .nav-hover i:hover{
        color:#5CACF1;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
      }

      .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 1000;
      display: none;
      float: left;
      min-width: 160px;
      padding: 5px 0;
      margin: 2px 0 0;
      font-size: 14px;
      text-align: left;
      list-style: none;
      background-color: #fff;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
      border: 1px solid #ccc;
      border: 1px solid rgba(0,0,0,.15);
      border-radius: 5px;
      -webkit-box-shadow:none;
      box-shadow:none;
      }
      .navbar-default .navbar-toggle .icon-bar {
    background-color: #FFF;
    }

    .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
    background-color:#4797DC;
    }

    @media (max-width: 767px){
    .navbar-default .navbar-nav .open .dropdown-menu>li>a {
    color: #FFF;
    }
    @media (max-width: 767px) {.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover, .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus {
        color: #FFF;
        background-color: transparent;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        float: left;
        min-width: 160px;
        padding: 5px 0;
        margin: 2px 0 0;
        font-size: 14px;
        text-align: left;
        list-style: none;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0,0,0,.15);
        /*border-radius: 4px;
        -webkit-box-shadow: 0 6px 12px orange;
        box-shadow: 0 6px 12px rgba(0,0,0,.175);*/
    }

    .navbar-default .navbar-toggle {
         border-color: #428BCA;
    }

    .navbar-default {
        background-color: #f8f8f8;
        border-color:#428BCA;
    }
    </style>
  </head>
  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" style="background:#428BCA;" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:#FFF;font-family:'Segoe UI';" href="#">S.I.A</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="petugas.php" class="line-hover" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-home fa-lg"></i>&nbsp; Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-th-large fa-lg"></i>&nbsp; Menu &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Semester Ganjil 2015 - 2016</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><img src="images/avatar_icon.png" style="width:25px; height:25px;"> &nbsp;<?php if (isset($_SESSION['hak']) == "petugas") {
		echo $username;
	}
	?> &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
              	<li><a href="dosen/index.php?tampil=<?php echo $tampil; ?>">Profil</a></li>
                <li class="divider"></li>
                <li><a href="?logout=log">Logout</a></li>
                <?php
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['hak']);
		header("location:index.php");
	}
	?>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/index.html#navbar" role="button">View navbar docs &raquo;</a>
        </p>
      </div>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
		<?php
}
?>