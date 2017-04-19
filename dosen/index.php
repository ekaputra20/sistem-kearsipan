<?php
session_start();

include '../config.php';
$con = new Connect();
error_reporting(~E_NOTICE);

if (isset($_GET['tampil'])) {
	$query = $con->getSQL("SELECT * FROM login WHERE nip = '" . $_GET['tampil'] . "'");
	$row = mysql_fetch_array($query);

	$u = $row['username'];
	$p = $row['password'];
	$n = $row['nip'];
	$em = $row['email'];
	$ha = $row['hak_akses'];

	$query2 = $con->getSQL("SELECT * FROM dosen WHERE nip = '" . $_GET['tampil'] . "'");

	$row2 = mysql_fetch_array($query2);
	$nm = $row2['nama'];
	$g = $row2['golongan'];
	$p = $row2['pangkat'];
	$jF = $row2['jabatanFungsional'];
}

$query = $con->getSQL("SELECT * FROM dosen WHERE nip = '" . $_SESSION['nip'] . "'");

$row = mysql_fetch_array($query);
$nama = $row['nama'];
$gol = $row['golongan'];
$pangkat = $row['pangkat'];
$jk = $row['jabatanFungsional'];

$query2 = $con->getSQL("SELECT * FROM login WHERE nip = '" . $_SESSION['nip'] . "'");

$row2 = mysql_fetch_array($query2);
$uname = $row2['username'];
$pwd = $row2['password'];
$email = $row2['email'];

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
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>Home</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/dosen.index.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">
    <style type="text/css">
      .bann-rit a{
          color:white;
          text-decoration:none;
        }

        .btn-hover {
          background:#428BCA;color:white;text-align:center;padding:20px 10px 20px 10px;
          border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
      }

      .btn-hover:hover{
        background:#f47264;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
      }

      .btn-hover2 {
        background:#38B5B7;
        color:white;
        text-align:center;
        padding:20px 10px 20px 10px;
        border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
      }

      .btn-hover a:hover{
        color:white;
      }

      .btn-hover2:hover{
        background:#f47264;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
      }
      .pnl-hover:hover {
        background:#428BCA;
      }

      .nav-hover i:hover,a:hover{
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
      .navbar-default {
        background-color: #f8f8f8;
        border-color:#428BCA;
      }

      .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
      }

      .panel-footer {
          padding: 10px 15px;
          border-bottom: 1px solid transparent;
          border-top-left-radius: 2px;
          border-top-right-radius: 2px;
      }

      .user-prof h6{
        text-align:center;
        font-family:'Ubuntu';
        color:white;
        font-size:1em;
        word-spacing:30px;
      }

      .user-prof h6:hover{
        cursor:pointer;
      }

      .l{
        background:#38B5B7;padding:10px;
      }
      .l:hover{
        background:#34ADAF;
        transition:0.5s all;
        -webkit-transition:0.5s all;
        -moz-transition:0.5s all;
        -o-transition:0.5s all;
      }

      .r{
        background:#f47264;
        border-left:1px solid #f47264;
        padding:10px;
      }

      .r:hover{
        background:#E86759;
        border-left:1px solid #E86759;
        transition:0.5s all;
        -webkit-transition:0.5s all;
        -moz-transition:0.5s all;
        -o-transition:0.5s all;
      }

      /*.user-img img{
        width:150px;
        height:150px;
        margin-left:75px;
      }*/
      .big-profile-picture{
        margin:0 auto;
        width:150px;
        height:150px;
      }

      .profile-picture{
        border-radius:100%;
        /*overflow:hidden;*/
      }

      .clear{
        clear:both;
      }
      .user-img h3{
        text-align:center;
        font-family:'Ubuntu';
        font-weight:300;
        color:white;
      }

      .dosen-description{
        width:200px;
        text-align:center;
        margin:0 auto;
      }

      .dosen-description p{
        color:white;
        font-family:'Ubuntu-R';
        margin-top:50px;
      }

      .pnl-style{
        border-radius:10px;
      }
    </style>

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
          <ul class="nav navbar-nav nav-hover">
            <li><a href="../" class="line" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-home fa-lg"></i> &nbsp;Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-th-large fa-lg"></i>&nbsp; Menu &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Semester Ganjil 2015 - 2016</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><img src="../images/avatar_icon.png" style="width:25px; height:25px;"> &nbsp;<?php if (isset($_SESSION['hak']) == "dosen") {echo $uname;}
	?> &nbsp;<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                            	<li><a href="">Profil</a></li>
                              <li class="divider"></li>
                              <li><a href="?logout=log">Logout</a></li>
                              <?php
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['hak']);
		?>
                                    <script type="text/javascript">
                                      window.location.href = "../index.php";
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
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-family:'Ubuntu';font-size:18px;text-align:center;word-spacing:0;padding:17px 10px 17px 10px;color:white;background:#428BCA;border:none
            ";>PROFIL DOSEN</div>
              <ul class="list-group">
                  <li class="list-group-item border" style="font-family:'Ubuntu-R';font-size:15px; background:#438FD2;color:white;padding:15px 10px 15px 10px;border-bottom:1px solid #aaa;"><font style="margin-left:27px"></font><i class="fa fa-trophy"></i>&nbsp;&nbsp;&nbsp;NIP : <?php echo $_SESSION['nip']; ?></li>
                  <li class="list-group-item" style="font-family:'Ubuntu-R';font-size:15px; background:#438FD2;color:white;padding:15px 10px 15px 10px;border-bottom:1px solid #aaa;"><font style="margin-left:27px"></font><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Nama : <?php echo $nama; ?></li>
                  <li class="list-group-item" style="font-family:'Ubuntu-R';font-size:15px; background:#438FD2;color:white;padding:15px 10px 15px 10px;border-bottom:1px solid #aaa;"><font style="margin-left:27px"></font><i class="fa fa-cogs"></i>&nbsp;&nbsp;&nbsp;Golongan : <?php echo $gol; ?></li>
                  <li class="list-group-item"style="font-family:'Ubuntu-R';font-size:15px; background:#438FD2;color:white;padding:15px 10px 15px 10px;border-bottom:1px solid #aaa;"><font style="margin-left:27px"></font><i class="fa fa-star-o"></i>&nbsp;&nbsp;&nbsp;Pangkat : <?php echo $pangkat; ?></li>
                  <li class="list-group-item" style="font-family:'Ubuntu-R';font-size:15px; background:#438FD2;color:white;padding:15px 10px 15px 10px;border-bottom:1px solid #aaa;border-bottom:1px solid rgba(255,255,255,0.1);"><font style="margin-left:27px"></font><i class="fa fa-wrench"></i>&nbsp;&nbsp;&nbsp;Jabatan Fungsional : <?php echo $jk; ?></li>
               </ul>
               <div class="panel-body btn-hover">
                  <div class="button_hover" style="" >
                    <!-- <a href="" data-target="#myModal" style="color:white;text-decoration:none;font-size:15px;" data-toggle="modal"> &nbsp;EDIT</a> -->
                    <div class="bann-rit">
                      <a href="#" data-target="#myModal" style="font-family:'Segoe UI';text-align:center;
                        font-family:'Ubuntu';
                        color:white;
                        font-size:1em;outline:none;font-weight:500;"data-toggle="modal">EDIT</a>
                    </div>
                </div>
                <!-- <div class="button">
                  <a href="../dosen.php" style="color:white;text-decoration:none;background:#62A8C7;padding:10px 20px 10px 20px;font-weight:bold;float:none;font-family:'Segoe UI';border-radius:2px;">CANCEL</a>
                </div> -->
                </div>
            </div>
        </div>

        <div class="col-md-4">
          <div class="panel panel-default pnl-style">
            <div class="user-body">
              <div class="panel-body bd" style="background:#428BCA;">
                <div class="col-md-12 user-img">
                <div class="profile-picture big-profile-picture clear">
                  <img width="150px" src="../images/avatar_icon.png"><br>
                </div>
                  <h3><?php echo $nama; ?></h3>
                </div>
                <div class="dosen-description">
                  <p>Lorem ipsum dolor sit amet consectetuer adipiscing</p>
                </div>
              </div>
            </div>
              <div class="user-footer user-prof">
                  <div class="col-md-12 l">
                    <span></span>
                    <h6>DOSEN</h6>
                  </div>
                  <!-- <div class="col-md-6 r">
                    <h6>Dosen</h6>
                  </div> -->
              </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-family:'Ubuntu';padding:17px 10px 17px 10px;font-size:18px;text-align:center;word-spacing:0;color:white;background:#38B5B7;border:none
            " >PROFIL USER</div>
                <ul class="list-group">
                  <li class="list-group-item" style="font-family:'Ubuntu-R';font-size:15px; background:#38B9BB;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Username : <?php echo $uname; ?></li>
                  <li class="list-group-item" style="font-family:'Ubuntu-R';font-size:15px; background:#38B9BB;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font><i class="fa fa-key"></i>&nbsp;&nbsp;&nbsp;Password : <?php echo $pwd; ?></li>
                  <li class="list-group-item" style="font-family:'Ubuntu-R';font-size:15px; background:#38B9BB;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font><i class="fa fa-trophy"></i>&nbsp;&nbsp;&nbsp;NIP  : <?php echo $_SESSION['nip']; ?></li>
                  <li class="list-group-item" style="font-family:'Ubuntu-R';font-size:15px; background:#38B9BB;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font><i class="fa fa-envelope"></i>&nbsp;&nbsp;&nbsp;Email : <?php echo $email; ?></li>
                  <li class="list-group-item" style="font-family:'Ubuntu-R';font-size:15px; background:#38B9BB;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;Sebagai : <?php echo strtoupper($_SESSION['hak']); ?></li>
               </ul>
               <div class="panel-body btn-hover2">
                <div class="">
                 <!--  <a href="" data-target="#myModal2" data-toggle="modal" style="color:white;text-decoration:none;font-weight:bold;background:#3498db;padding:10px 25px 10px 25px;font-family:'Segoe UI';border-radius:2px;"> &nbsp;EDIT</a> -->
                  <!-- <a href="" data-target="#myModal2" data-toggle="modal" style="text-align:center;color:white;text-decoration:none;background:#38B5B7;padding:10px 25px 10px 25px;font-family:'Segoe UI';border-radius:2px;"> &nbsp;Edit</a> -->
                  <div class="">
                      <a href="#" data-target="#myModal2" style="text-align:center;
        font-family:'Ubuntu';
        color:white;
        font-size:1em;outline:none;color:white;text-decoration:none;font-weight:500;"data-toggle="modal">EDIT</a>
                  </div>
                </div>
                <!-- <div class="button">
                  <a href="../dosen.php" style="color:white;text-decoration:none;background:#11a8ab;padding:10px 20px 10px 20px;font-family:'OpenSans';font-weight:bold;border-radius:2px;">CANCEL</a>
                </div> -->
                </div>
            </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="">
        <div class="modal-header" style="background:#428BCA;border-top-left-radius:5px;border-top-right-radius:5px;">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <p class="modal-title" style="font-family:'Segoe UI';font-weight:300;color:white;font-size:19px;"><i class="fa fa-cogs"></i> Edit Dosen</p>
        </div>
        <div class="modal-body">
          <div class="">
      <!-- <div class="header">Daftar</div> -->

        <form class="form-signin" action="" method="post" role="form">
<!--        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
        <input type="text" class="input-form"  name="nip" style="margin-bottom:20px;margin-top:20px;" disabled placeholder="NIP" value="<?php echo $_SESSION['nip']; ?>" required>

        <input type="text" class="input-form"  name="nama" style="margin-bottom:20px;" placeholder="Nama" value="<?php echo $nama; ?>" required>

        <select name="golongan" style="margin-bottom:20px;margin-left:55px;width:70%;" class="golongan" required>
          <option value="">Golongan</option>
          <option value="I A" <?php if ($gol == "I A") {echo 'selected';} else {echo '';}
	?>>I A</option>
          <option value="I B" <?php if ($gol == "I B") {echo 'selected';} else {echo '';}
	?>>I B</option>
          <option value="I C" <?php if ($gol == "I C") {echo 'selected';} else {echo '';}
	?>>I C</option>
          <option value="I D" <?php if ($gol == "I D") {echo 'selected';} else {echo '';}
	?>>I D</option>
          <option value="II A" <?php if ($gol == "II A") {echo 'selected';} else {echo '';}
	?>>II A</option>
          <option value="II B" <?php if ($gol == "II B") {echo 'selected';} else {echo '';}
	?>>II B</option>
          <option value="II C" <?php if ($gol == "II C") {echo 'selected';} else {echo '';}
	?>>II C</option>
          <option value="II D" <?php if ($gol == "II D") {echo 'selected';} else {echo '';}
	?>>II D</option>
          <option value="III A" <?php if ($gol == "III A") {echo 'selected';} else {echo '';}
	?>>III A</option>
          <option value="III B" <?php if ($gol == "III B") {echo 'selected';} else {echo '';}
	?>>III B</option>
          <option value="III C" <?php if ($gol == "III C") {echo 'selected';} else {echo '';}
	?>>III C</option>
          <option value="III D" <?php if ($gol == "III D") {echo 'selected';} else {echo '';}
	?>>III D</option>
          <option value="IV A" <?php if ($gol == "IV A") {echo 'selected';} else {echo '';}
	?>>IV A</option>
          <option value="IV B" <?php if ($gol == "IV B") {echo 'selected';} else {echo '';}
	?>>IV B</option>
          <option value="IV C" <?php if ($gol == "IV C") {echo 'selected';} else {echo '';}
	?>>IV C</option>
          <option value="IV D" <?php if ($gol == "IV D") {echo 'selected';} else {echo '';}
	?>>IV D</option>
          <option value="IV E" <?php if ($gol == "IV E") {echo 'selected';} else {echo '';}
	?>>IV E</option>
        </select>

        <select name="pangkat" style="margin-bottom:20px;width:70%;margin-left:55px;" class="golongan" required>
          <option value="">Pangkat</option>
          <option value="Juru Muda" <?php if ($pangkat == "Juru Muda") {echo 'selected';} else {echo '';}
	?>>Juru Muda</option>
          <option value="Juru Muda Tingkat I" <?php if ($pangkat == "Juru Muda Tingkat I") {echo 'selected';} else {echo '';}
	?>>Juru Muda Tingkat I</option>
          <option value="Juru"<?php if ($pangkat == "Juru") {echo 'selected';} else {echo '';}
	?>>Juru</option>
          <option value="Juru Tingkat I"<?php if ($pangkat == "Juru Tingkat I") {echo 'selected';} else {echo '';}
	?>>Juru Tingkat I</option>
          <option value="Pengatur Muda"<?php if ($pangkat == "Pengatur Muda") {echo 'selected';} else {echo '';}
	?>>Pengantur Muda</option>
          <option value="Pengatur Muda Tingkat I"<?php if ($pangkat == "Pengatur Muda Tingkat I") {echo 'selected';} else {echo '';}
	?>>Pengantur Muda Tingkat I</option>
          <option value="Pengatur"<?php if ($pangkat == "Pengatur") {echo 'selected';} else {echo '';}
	?>>Pengatur</option>
          <option value="Pengatur Tingkat I"<?php if ($pangkat == "Pengatur Tingkat I") {echo 'selected';} else {echo '';}
	?>>Pengatur Tingkat I</option>
          <option value="Penata Muda"<?php if ($pangkat == "Penata Muda") {echo 'selected';} else {echo '';}
	?>>Penata Muda</option>
          <option value="Penata Muda Tingkat I"<?php if ($pangkat == "Penata Muda Tingkat I") {echo 'selected';} else {echo '';}
	?>>Penata Muda Tingkat I</option>
          <option value="Penata"<?php if ($pangkat == "Penata") {echo 'selected';} else {echo '';}
	?>>Penata</option>
          <option value="Penata Tingkat I"<?php if ($pangkat == "Penata Tingkat I") {echo 'selected';} else {echo '';}
	?>>Penata Tingkat I</option>
          <option value="Pembina"<?php if ($pangkat == "Pembina") {echo 'selected';} else {echo '';}
	?>>Pembina</option>
          <option value="Pembina Tingkat I"<?php if ($pangkat == "Pembina Tingkat I") {echo 'selected';} else {echo '';}
	?>>Pembina Tingkat I</option>
          <option value="Pembina Utama Muda"<?php if ($pangkat == "Pembina Utama Muda") {echo 'selected';} else {echo '';}
	?>>Pembina Utama Muda</option>
          <option value="Pembina Utama Madya"<?php if ($pangkat == "Pembina Utama Madya") {echo 'selected';} else {echo '';}
	?>>Pembina Utama Madya</option>
          <option value="Pembina Utama"<?php if ($pangkat == "Pembina Utama") {echo 'selected';} else {echo '';}
	?>>Pembina Utama</option>
        </select>

        <input type="text" class="input-form"  value="<?php echo $jk; ?>" name="jabatanFungsional" style="margin-bottom:20px;" placeholder="Jabatan Fungsional" required>

          <input class="btn buttonsize btn-block" type="submit" style="width:70%;" name="edit_dosen" value="Edit">

          <?php
if (isset($_POST['edit_dosen'])) {
		$query = $con->setSQL("UPDATE dosen SET nama = '" . $_POST['nama'] . "',golongan = '" . $_POST['golongan'] . "',pangkat = '" . $_POST['pangkat'] . "',jabatanFungsional = '" . $_POST['jabatanFungsional'] . "' WHERE nip = '" . $_SESSION['nip'] . "'");
	}
	?>
        <div class="modal-footer">
          <button type="button" class="" style="border:0px;background:#428BCA;padding:10px 10px 10px 10px;color:white;border-radius:2px;" data-dismiss="modal">Close</button>
        </div>
        </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Trigger the modal with a button -->

     <!-- Trigger the modal with a button -->

  </div>
    </div><!-- /container -->

   <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"  style="background:#38B5B7;border-top-left-radius:5px;border-top-right-radius:5px;">
          <button type="button" class="close" data-dismiss="modal">x</button>
          <h4 class="modal-title" style="font-family:'Segoe UI';font-weight:300;color:white;font-size:19px;"><i class="fa fa-cogs"></i> Edit User</h4>
        </div>
        <div class="modal-body">
          <form class="form-signin" action="" method="post" role="form">
<!--        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
        <input type="email" class="input-form"  name="email" value="<?php echo $email; ?>" style="margin-bottom:20px;" placeholder="Email" required>
           <input type="text" class="input-form"  name="username" value="<?php echo $uname; ?>" style="margin-bottom:20px;" placeholder="Username" required>
        <!--   </div> -->
          <input type="password" class="input-form" name="password"  value= "<?php echo $pwd; ?>" placeholder="Password" required>
          <!-- <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
          </label> -->
          <input class="btn button-size btn-block"  type="submit" style="width:70%;" name="edit_user" value="Edit">
          <?php
if (isset($_POST['edit_user'])) {
		$query = $con->setSQL("UPDATE login SET username = '" . trim($_POST['username']) . "',password = '" . $_POST['password'] . "',email = '" . $_POST['email'] . "' WHERE nip = '" . $_SESSION['nip'] . "'");
		if ($query) {
			?>
                      <script type="text/javascript">
                        window.location.href = "?success=1";
                      </script>
                  <?php
}
	}
	?>
          <div class="modal-footer">
          <button type="button" class="" style="border:0px;background:#38B5B7;padding:10px 10px 10px 10px;color:white;border-radius:2px;" data-dismiss="modal">Close</button>
        </div>
        </form>
        </div>

      </div>

    </div>
  </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>Home</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/dosen.index.css">

    <!-- Custom styles for this template -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <style type="text/css">
       .bann-rit a{
          color:white;
          text-decoration:none;
        }

        .btn-hover {
          background:#428BCA;color:white;text-align:center;padding:20px 10px 20px 10px;
          border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
      }

      .btn-hover:hover{
        background:#f47264;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
      }

      .btn-hover2 {
        background:#38B5B7;color:white;text-align:center;padding:20px 10px 20px 10px;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
      }

      .btn-hover a:hover{
        color:white;
      }

      .btn-hover2:hover{
        background:#f47264;
        transition: 0.5s all;
        -webkit-transition: 0.5s all;
        -moz-transition: 0.5s all;
        -o-transition: 0.5s all;
      }
      .pnl-hover:hover {
        background:#428BCA;
      }

      .nav-hover i:hover,a:hover{
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
    </style>

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

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" style="background:#428BCA;border-color:#428BCA;" role="navigation">
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
            <li><a href="../petugas.php" class="line-hover" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-home fa-lg"></i> &nbsp;Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><i class="fa fa-th-large fa-lg"></i> &nbsp;Menu &nbsp; <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Semester Ganjil 2015 - 2016</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#FFF;font-family:'Segoe UI';"><img src="../images/avatar_icon.png" style="width:25px; height:25px;"> &nbsp;<?php if (isset($_SESSION['hak']) == "dosen") {echo $u;}
	?> &nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="">Profil</a></li>
                <li class="divider"></li>
                <li><a href="?logout=log">Logout</a></li>
                <?php
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['hak']);
		header("location:../index.php");
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
        <div class="col-sm-4">
          <div class="panel panel-default size">
            <div class="panel-heading" style="font-family:'Segoe UI';font-size:18px;text-align:center;word-spacing:0;padding:17px 10px 17px 10px;text-transform:uppercase;color:white;background:#428BCA;border:none
            ";>Profil Dosen</div>
              <ul class="list-group" style="border:0 none;">
                  <li class="list-group-item border" style="font-family:'Segoe UI';font-size:15px; background:#4797DC;color:white;padding:15px 10px 15px 10px;border-bottom:1px solid #aaa;"><font style="margin-left:27px"></font>NIP : <?php echo $n; ?></li>
                  <li class="list-group-item" style="font-family:'Segoe UI';font-size:15px; background:#4797DC;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font>Nama : <?php echo $nm; ?></li>
                  <li class="list-group-item" style="font-family:'Segoe UI';font-size:15px; background:#4797DC;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font>Golongan : <?php echo $g; ?></li>
                  <li class="list-group-item"style="font-family:'Segoe UI';font-size:15px; background:#4797DC;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font>Pangkat : <?php echo $p; ?></li>
                  <li class="list-group-item" style="font-family:'Segoe UI';font-size:15px; background:#4797DC;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font>Jabatan Fungsional : <?php echo $jF; ?></li>
               </ul>
                <div class="panel-body btn-hover">
                  <div class="button_hover" style="" >
                    <!-- <a href="" data-target="#myModal" style="color:white;text-decoration:none;font-size:15px;" data-toggle="modal"> &nbsp;EDIT</a> -->
                    <div class="bann-rit">
                      <a href="#" data-target="#myModal" style="font-family:'OpenSans';outline:none;font-size:15px;"data-toggle="modal">EDIT</a>
                    </div>
                </div>
                <!-- <div class="button">
                  <a href="../dosen.php" style="color:white;text-decoration:none;background:#62A8C7;padding:10px 20px 10px 20px;font-weight:bold;float:none;font-family:'Segoe UI';border-radius:2px;">CANCEL</a>
                </div> -->
                </div>
                <!-- <div class="panel-body pnl-hover" style="padding:1px;background:#428BCA;color:white;">
               </div> -->
               </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-default size">
            <div class="panel-heading" style="font-family:'Segoe UI';padding:17px 10px 17px 10px;font-size:18px;text-align:center;word-spacing:0;text-transform:uppercase;color:white;background:#38B5B7;border:none
            ">Profil User</div>
            <ul class="list-group">
                  <li class="list-group-item" style="font-family:'Segoe UI';font-size:15px; background:#3BBEC0;color:white;padding:15px 10px 15px 10px;"><font style="margin-left:27px"></font>Username : <?php echo $u; ?></li>
                  <li class="list-group-item" style="font-family:'Segoe UI';font-size:15px; background:#3BBEC0;color:white;padding:15px 10px 15px 10px"><font style="margin-left:27px"></font>Password : <?php echo $p; ?></li>
                  <li class="list-group-item" style="font-family:'Segoe UI';font-size:15px; background:#3BBEC0;color:white;padding:15px 10px 15px 10px"><font style="margin-left:27px"></font>NIP  : <?php echo $n; ?></li>
                  <li class="list-group-item" style="font-family:'Segoe UI';font-size:15px; background:#3BBEC0;color:white;padding:15px 10px 15px 10px"><font style="margin-left:27px"></font>Email : <?php echo $em; ?></li>
                  <li class="list-group-item" style="font-family:'Segoe UI';font-size:15px; background:#3BBEC0;color:white;padding:15px 10px 15px 10px"><font style="margin-left:27px"></font>Sebagai : <?php echo strtoupper($ha); ?></li>
               </ul>
               <div class="panel-body btn-hover2">
                <div class="">
                 <!--  <a href="" data-target="#myModal2" data-toggle="modal" style="color:white;text-decoration:none;font-weight:bold;background:#3498db;padding:10px 25px 10px 25px;font-family:'Segoe UI';border-radius:2px;"> &nbsp;EDIT</a> -->
                  <!-- <a href="" data-target="#myModal2" data-toggle="modal" style="text-align:center;color:white;text-decoration:none;background:#38B5B7;padding:10px 25px 10px 25px;font-family:'Segoe UI';border-radius:2px;"> &nbsp;Edit</a> -->
                  <div class="">
                      <a href="#" data-target="#myModal2" style="font-family:'OpenSans';outline:none;font-size:15px;color:white;text-decoration:none;"data-toggle="modal">EDIT</a>
                  </div>
                </div>
                <!-- <div class="button">
                  <a href="../dosen.php" style="color:white;text-decoration:none;background:#11a8ab;padding:10px 20px 10px 20px;font-family:'OpenSans';font-weight:bold;border-radius:2px;">CANCEL</a>
                </div> -->
                </div>
                <!-- <div class="panel-body" style="padding:1px;font-family:'Segoe UI'; background:#14B6B9;color:white;">

                </div> -->
            </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <i class="fa fa-user"></i> <p class="modal-title" style="font-family:'Segoe UI';font-size:20px;">Edit Dosen</p>
        </div>
        <div class="modal-body">
          <div class="">
      <!-- <div class="header">Daftar</div> -->

        <form class="form-signin" action="" method="post" role="form">
<!--        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
        <input type="text" class="input-form"  name="nip" style="margin-bottom:20px;margin-top:20px;" disabled placeholder="NIP" value="<?php echo $n; ?>" required>

        <input type="text" class="input-form"  name="nama" style="margin-bottom:20px;" placeholder="Nama" value="<?php echo $nm; ?>" required>

        <select name="golongan" style="margin-bottom:20px;margin-left:55px;width:70%;" class="golongan" required>
          <option value="">Golongan</option>
          <option value="I A" <?php if ($g == "I A") {echo 'selected';} else {echo '';}
	?>>I A</option>
          <option value="I B" <?php if ($g == "I B") {echo 'selected';} else {echo '';}
	?>>I B</option>
          <option value="I C" <?php if ($g == "I C") {echo 'selected';} else {echo '';}
	?>>I C</option>
          <option value="I D" <?php if ($g == "I D") {echo 'selected';} else {echo '';}
	?>>I D</option>
          <option value="II A" <?php if ($g == "II A") {echo 'selected';} else {echo '';}
	?>>II A</option>
          <option value="II B" <?php if ($g == "II B") {echo 'selected';} else {echo '';}
	?>>II B</option>
          <option value="II C" <?php if ($g == "II C") {echo 'selected';} else {echo '';}
	?>>II C</option>
          <option value="II D" <?php if ($g == "II D") {echo 'selected';} else {echo '';}
	?>>II D</option>
          <option value="III A" <?php if ($g == "III A") {echo 'selected';} else {echo '';}
	?>>III A</option>
          <option value="III B" <?php if ($g == "III B") {echo 'selected';} else {echo '';}
	?>>III B</option>
          <option value="III C" <?php if ($g == "III C") {echo 'selected';} else {echo '';}
	?>>III C</option>
          <option value="III D" <?php if ($g == "III D") {echo 'selected';} else {echo '';}
	?>>III D</option>
          <option value="IV A" <?php if ($g == "IV A") {echo 'selected';} else {echo '';}
	?>>IV A</option>
          <option value="IV B" <?php if ($g == "IV B") {echo 'selected';} else {echo '';}
	?>>IV B</option>
          <option value="IV C" <?php if ($g == "IV C") {echo 'selected';} else {echo '';}
	?>>IV C</option>
          <option value="IV D" <?php if ($g == "IV D") {echo 'selected';} else {echo '';}
	?>>IV D</option>
          <option value="IV E" <?php if ($g == "IV E") {echo 'selected';} else {echo '';}
	?>>IV E</option>
        </select>

        <select name="pangkat" style="margin-bottom:20px;width:70%;margin-left:55px;" class="golongan" required>
          <option value="">Pangkat</option>
          <option value="Juru Muda" <?php if ($p == "Juru Muda") {echo 'selected';} else {echo '';}
	?>>Juru Muda</option>
          <option value="Juru Muda Tingkat I" <?php if ($p == "Juru Muda Tingkat I") {echo 'selected';} else {echo '';}
	?>>Juru Muda Tingkat I</option>
          <option value="Juru"<?php if ($p == "Juru") {echo 'selected';} else {echo '';}
	?>>Juru</option>
          <option value="Juru Tingkat I"<?php if ($p == "Juru Tingkat I") {echo 'selected';} else {echo '';}
	?>>Juru Tingkat I</option>
          <option value="Pengatur Muda"<?php if ($p == "Pengatur Muda") {echo 'selected';} else {echo '';}
	?>>Pengantur Muda</option>
          <option value="Pengatur Muda Tingkat I"<?php if ($p == "Pengatur Muda Tingkat I") {echo 'selected';} else {echo '';}
	?>>Pengantur Muda Tingkat I</option>
          <option value="Pengatur"<?php if ($p == "Pengatur") {echo 'selected';} else {echo '';}
	?>>Pengatur</option>
          <option value="Pengatur Tingkat I"<?php if ($p == "Pengatur Tingkat I") {echo 'selected';} else {echo '';}
	?>>Pengatur Tingkat I</option>
          <option value="Penata Muda"<?php if ($p == "Penata Muda") {echo 'selected';} else {echo '';}
	?>>Penata Muda</option>
          <option value="Penata Muda Tingkat I"<?php if ($p == "Penata Muda Tingkat I") {echo 'selected';} else {echo '';}
	?>>Penata Muda Tingkat I</option>
          <option value="Penata"<?php if ($p == "Penata") {echo 'selected';} else {echo '';}
	?>>Penata</option>
          <option value="Penata Tingkat I"<?php if ($p == "Penata Tingkat I") {echo 'selected';} else {echo '';}
	?>>Penata Tingkat I</option>
          <option value="Pembina"<?php if ($p == "Pembina") {echo 'selected';} else {echo '';}
	?>>Pembina</option>
          <option value="Pembina Tingkat I"<?php if ($p == "Pembina Tingkat I") {echo 'selected';} else {echo '';}
	?>>Pembina Tingkat I</option>
          <option value="Pembina Utama Muda"<?php if ($p == "Pembina Utama Muda") {echo 'selected';} else {echo '';}
	?>>Pembina Utama Muda</option>
          <option value="Pembina Utama Madya"<?php if ($p == "Pembina Utama Madya") {echo 'selected';} else {echo '';}
	?>>Pembina Utama Madya</option>
          <option value="Pembina Utama"<?php if ($p == "Pembina Utama") {echo 'selected';} else {echo '';}
	?>>Pembina Utama</option>
        </select>

        <input type="text" class="input-form"  value="<?php echo $jF; ?>" name="jabatanFungsional" style="margin-bottom:20px;" placeholder="Jabatan Fungsional" required>

          <input class="btn buttonsize btn-block" type="submit" style="width:70%;" name="edit_dosen" value="Edit">

          <?php
if (isset($_POST['edit_dosen'])) {
		$query = $con->setSQL("UPDATE dosen SET nama = '" . $_POST['nama'] . "',golongan = '" . $_POST['golongan'] . "',pangkat = '" . $_POST['pangkat'] . "',jabatanFungsional = '" . $_POST['jabatanFungsional'] . "' WHERE nip = '" . $n . "'");
	}
	?>

        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="" style="border:0px;background:#3BBEC0;padding:10px 10px 10px 10px;color:white;border-radius:2px;" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Trigger the modal with a button -->

     <!-- Trigger the modal with a button -->

  </div>
    </div><!-- /container -->

   <!--  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit User</h4>
        </div>
        <div class="modal-body">
          <form class="form-signin" action="" method="post" role="form">
<!--        <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> -->
        <input type="email" class="input-form"  name="email" value="<?php echo $em; ?>" style="margin-bottom:20px;" placeholder="Email" required>
           <input type="text" class="input-form"  name="username" value="<?php echo $u; ?>" style="margin-bottom:20px;" placeholder="Username" required>
        <!--   </div> -->
          <input type="password" class="input-form" name="password"  value= "<?php echo $p; ?>" placeholder="Password" required>
          <!-- <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
          </label> -->
          <input class="btn buttonsize btn-block" type="submit" style="width:70%;" name="edit_user" value="Edit">
          <?php
if (isset($_POST['edit_user'])) {
		$query = $con->setSQL("UPDATE login SET username = '" . $_POST['username'] . "',password = '" . $_POST['password'] . "',email = '" . $_POST['email'] . "' WHERE nip = '" . $n . "'");
		if ($query) {
			?>
                      <script type="text/javascript">
                        window.location.href = "?success=1";
                      </script>
                  <?php
}
	}
	?>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" style="border:0px;background:#3BBEC0;padding:10px 10px 10px 10px;color:white;border-radius:3px" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>-->
  </body>
</html>
    <?php
}
?>