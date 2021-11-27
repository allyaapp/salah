<?php

require ("../koneksi.php");

session_start();

if(!isset($_SESSION['id'])){
    $_SESSION['msg'] = 'Anda harus login untuk mengakses halaman ini!';
    header('Location: login.php');
}
$sesID = $_SESSION['id'];
$sesName = $_SESSION['username'];
$sesLvl = $_SESSION['role'];

if(isset ($_POST['create']) ){
    $id = $_POST['id_admin'];
    $nama = $_POST['fullname'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "INSERT INTO admindetail VALUES ('', '$nama', '$no_hp', '$alamat', '$username', '$password', '$role')";
    $result = mysqli_query($koneksi, $query);
    header('Location: adminhome.php');
}
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Create Admin's Data | SUGAR CANE</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-green">
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
   
    <!-- Top Bar -->
    <nav class="navbar" style="background-color: #1FA444;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <p class="navbar-brand" style="size: 25px;"><b>SUGAR CANE</a></b></p>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    
                <!-- Name -->
                <li class="dropdown">
                    <a class="dropdown-toggle font-15">
                        <?php echo $sesName; ?>
                    </a>
                </li>
                <!-- #END# Name -->

                   <!-- User Info -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                            <img class="img-profile rounded-circle" src="../images/user.png" width="70%" style="border-radius: 50px;">
                        </a>
                        <!-- Dropdown - User Information -->
                        <ul class="dropdown-menu" style="border-radius: 5px;">
                            <div class="dropdown-divider"></div>
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <div class="dropdown-divider"></div>
                        </ul>
                    </li>
                    <!-- #User Info -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <div class="hover-expand-effect">
                        <li>
                            <a href="../index.php">
                                <i class="material-icons">home</i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="adminhome.php">
                                <i class="material-icons">account_box</i>
                                <span>Admins</span>
                            </a>
                        </li>
                        <li>
                            <a href="../user/userhome.php">
                                <i class="material-icons">person</i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">library_books</i>
                                <span>Data Barang</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="../barang/baranghome.php">
                                        <span>Barang</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../barang/detailbarang.php">
                                        <span>Detail Ukuran</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">assessment</i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Transaksi Selesai</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span>Transaksi Lain</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </div>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <a href="../logout.php">
                    <button type="button" class="btn bg-red btn-block waves-effect">LOGOUT</button>
                </a>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        </section>

        <!-- Content -->
            <section class="content">
            <!--  Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>CREATE DATA</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST"><!-- 
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_admin">
                                        <label class="form-label">ID</label>
                                    </div>
                                </div> -->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="fullname" required>
                                        <label class="form-label">Nama Lengkap</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="no_hp" required>
                                        <label class="form-label">No. HP</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="alamat" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="username" required>
                                        <label class="form-label">Username</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" required>
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="role" required>
                                        <label class="form-label">Role</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="create">CREATE</button>
                                <a href="adminhome.php">
                                    <button class="btn btn-danger waves-effect" type="button">CANCEL</button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Validation -->
            </section>
        <!-- #Content -->

    <!-- Jquery Core Js -->
    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>
</html>