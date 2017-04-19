<?php
session_start();

include 'config.php';

$con = new Connect();
if (isset($_SESSION['hak']) == "petugas") {
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
     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/bs_leftnavi.js" type="text/javascript"></script>
   <!--  <link rel="icon" href="../../favicon.ico"> -->

    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="css/petugas.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bs_leftnavi.css">
	<script type="text/javascript" charset="utf-8">

		$(document).ready(function(){
			$('#datatable').dataTable();
		});
	</script>
    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
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
            <li><a href="?view=tampil_dosen" class="line-hover" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-user fa-lg"></i>&nbsp; Dosen &nbsp; <span class="label label-success" style="border-radius: 50px;">
                <?php
$hitung_pasien = $con->getSQL("select * from dosen");
	echo mysql_num_rows($hitung_pasien);
	?>
            </span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><img src="images/avatar_icon.png" style="width:25px; height:25px;"> &nbsp;<?php echo $_SESSION['user']; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="dosen/index.php?tampil=<?php echo $tampil; ?>">Profil</a></li>
                <li class="divider"></li>
                <li><a href="?logout=log">Logout</a></li>
                <?php
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['hak']);
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

    <div class="container">
      <div class="row">
        <div class="col-md-2">

        </div>

        <div class="col-md-10">
          <?php
if (isset($_GET['view'])) {
		include 'petugas/' . $_GET['view'] . '.php';
	}
	?>
        </div>
      </div>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
    <script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
  })();

</script>
  </body>
</html>
<?php
} else {
	?>
		<script type="text/javascript">
			window.location.href = "index.php";
		</script>
	<?php
}
?>