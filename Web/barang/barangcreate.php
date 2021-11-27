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
    $id = $_POST['id_barang'];
    $varian = $_POST['varian'];
    $ukuran = $_POST['ukuran'];
    $id_detailukuran = $_POST['id_detailukuran'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO barang VALUES ('', '$varian', '$ukuran', '$id_detailukuran', '$stok')";
    $result = mysqli_query($koneksi, $query);
    header('Location: baranghome.php');
}
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Create Product's Data | SUGAR CANE</title>
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
                        <ul class="dropdown-menu">
                            <div class="dropdown-divider"></div>
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
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
                        <li>
                            <a href="../admin/adminhome.php">
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
                        <li class="active">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">library_books</i>
                                <span>Data Barang</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="active">
                                    <a href="baranghome.php">
                                        <span>Barang</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="detailbarang.php">
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
                                    <a href="../transaksi/transaksihome.php">
                                        <span>Transaksi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="../transaksi/detailtransaksi.php">
                                        <span>Detail Transaksi</span>
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
                            <form id="form_validation" action="barangcreate.php" method="POST">
                                <!-- 
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_barang">
                                        <label class="form-label">ID</label>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="form-label">Varian Rasa</label><br>

                                    <input type="radio" name="varian" value="Chocolate" id="chocolate" class="with-gap radio-col-light-green">
                                    <label for="chocolate" class="m-l-20">Chocolate</label><br>

                                    <input type="radio" name="varian" value="Strawberry" id="strawberry" class="with-gap radio-col-light-green">
                                    <label for="strawberry" class="m-l-20">Strawberry</label><br>

                                    <input type="radio" name="varian" value="VanillaOreo" id="vanillaoreo" class="with-gap radio-col-light-green">
                                    <label for="vanillaoreo" class="m-l-20">VanillaOreo</label>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ukuran</label><br>

                                    <input type="radio" name="ukuran" value="Mini" id="Mini" class="with-gap radio-col-light-green">
                                    <label for="Mini" class="m-l-20">Mini</label><br>

                                    <input type="radio" name="ukuran" value="Jumbo" id="Jumbo" class="with-gap radio-col-light-green">
                                    <label for="Jumbo" class="m-l-20">Jumbo</label>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">ID Detail Ukuran</label><br>

                                    <input type="radio" name="id_detailukuran" value="M1" id="M1" class="with-gap radio-col-light-green">
                                    <label for="M1" class="m-l-20">M1</label>

                                    <input type="radio" name="id_detailukuran" value="M2" id="M2" class="with-gap radio-col-light-green">
                                    <label for="M2" class="m-l-20">M2</label>

                                    <input type="radio" name="id_detailukuran" value="M3" id="M3" class="with-gap radio-col-light-green">
                                    <label for="M3" class="m-l-20">M3</label>

                                    <input type="radio" name="id_detailukuran" value="J1" id="J1" class="with-gap radio-col-light-green">
                                    <label for="J1" class="m-l-20">J1</label>

                                    <input type="radio" name="id_detailukuran" value="J2" id="J2" class="with-gap radio-col-light-green">
                                    <label for="J2" class="m-l-20">J2</label>

                                    <input type="radio" name="id_detailukuran" value="J3" id="J3" class="with-gap radio-col-light-green">
                                    <label for="J3" class="m-l-20">J3</label>

                                    <input type="radio" name="id_detailukuran" value="J4" id="J4" class="with-gap radio-col-light-green">
                                    <label for="J4" class="m-l-20">J4</label>

                                    <input type="radio" name="id_detailukuran" value="J5" id="J5" class="with-gap radio-col-light-green">
                                    <label for="J5" class="m-l-20">J5</label>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="stok" required>
                                        <label class="form-label">Stok</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="create">CREATE</button>
                                <a href="baranghome.php">
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