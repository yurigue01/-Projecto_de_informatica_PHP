<?php
session_start();
// Include config file
require_once("config.php");

    if(!empty($_POST['Titulo'])||!empty($_POST['Descricao'])||!empty($_POST['Vagas'])||!empty($_POST['Categoria_Salarial'])
        ||!empty($_POST['Regime'])||!empty($_POST['Estado'])||!empty($_POST['Data_Criacao'])||!empty($_POST['Empresa_ID_empresa']) ||!empty($_POST['Area_idArea']) ||!empty($_POST['Tipo_da_Oferta_ID_tipo'])) {
        $Titulo = $_POST['Titulo'];
        $Descricao = $_POST['Descricao'];
        $Vagas = $_POST['Vagas'];
        $Categoria_Salarial = $_POST['Categoria_Salarial'];
        $Regime = $_POST['Regime'];
        $Estado = $_POST['Estado'];
        $Data_Criacao = $_POST['Data_Criacao'];
        $Empresa_ID_empresa =$_POST["Empresa_ID_empresa"];
        $Area_idArea = $_POST['Area_idArea'];
        $Tipo_da_Oferta_ID_tipo = $_POST['Tipo_da_Oferta_ID_tipo'];


        $sql = "INSERT INTO oferta(Titulo, Descricao, Vagas, Categoria_Salarial, Regime, Estado, Data_Criacao,Empresa_ID_empresa , Area_idArea,Tipo_da_Oferta_ID_tipo ) VALUES ('$Titulo','$Descricao','$Vagas','$Categoria_Salarial','$Regime','$Estado','$Data_Criacao','$Empresa_ID_empresa','$Area_idArea','$Tipo_da_Oferta_ID_tipo')";
        if (!mysqli_query($link, $sql)) {
            print_r(mysqli_error($link));

            $result = mysqli_query($link, "SELECT * FROM oferta INNER JOIN empresa ON  oferta.Empresa_ID_empresa= empresa.ID_empresa INNER JOIN tipo_da_oferta ON oferta.Tipo_da_Oferta_ID_tipo=tipo_da_oferta.ID_tipo INNER JOIN area ON oferta.Area_idArea=area.idArea ");




        }

        header("Location:oferta_e.php");
        header("Location:");

    }

?>


?>

<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>AJUDA.IPB</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-signin">
                <a href="index.php" class="logo">
                    <img src="assets/img/ipb.png" width="120" height="60" alt=""> <span>AJUDA.IPB</span>
                </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img"><img class="rounded-circle" src="assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                    <span>Perfil</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="PerfillEmpresa.html">Meu Perfil</a>
                    <a class="dropdown-item" href="EditarPerfil_e.html">Editar Perfil</a>
                    <a class="dropdown-item" href="change-password.html">Alterar password</a>
                    <a class="dropdown-item" href="login_e.html">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="PerfillEmpresa.html">Meu Perfil</a>
                <a class="dropdown-item" href="EditarPerfil_e.html">Editar Perfil</a>
                <a class="dropdown-item" href="change-password.html">Alterar password</a>
                <a class="dropdown-item" href="login_e.html">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Principal</li>
                    <li>
                        <a href="PerfillEmpresa.html"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="../Empresa/AddOferta.html"> <span>Inserir Ofertas </span></a>
                    </li>
                    <li>
                        <a href="Candidaturas_e.html"> <span>Candidaturas </span></a>
                    </li>
                    <li>
                        <a href="Oferta_e.html"> <span>Ofertas</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Inserir Oferta</h4>
                </div>

            </div>
            <form action="InserirOfertas.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="Nome" class="form-control >
                                </div>
                                <div class="form-group">
                                    <label>Vagas</label>
                                    <input type="text" name="Vagas" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label>Tipo de Oferta</label>
                                    <input type="text" name="Tipo_da_Oferta_ID_tipo" class="form-control  >
                                </div>
                                <div class="form-group">
                                    <label>Descrição</label>
                                    <input type="text" name="Descricao" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label>Categoria Salarial</label>
                                    <input type="text" name="Categoria_Salarial" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label>Regime</label>
                                    <input type="text" name="Regime" class="form-control ">
                                </div>
                                <div class="form-group">
                                    <label>Empresa</label>
                                    <input name="Empresa_ID_empresa" type="text" class="form-control  ">
                                </div>
                                <div class="form-group">
                                    <label>Local de Trabalho</label>
                                    <input type="text" class="form-control  ">
                                </div>

                                <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" name="Estado" class="form-control  ">
                                </div>

                                <div class="form-group">
                                    <label>Data de Criação</label>
                                    <input id="date" name="Data_Criacao" type="date" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label>Área</label>
                                    <input type="email" name="Area_idArea" class="form-control">

                                </div>
                                <a href="AddOferta.html"> <button style="background-color: #229bc6; color: #fff;" class="btn account-btn">Cancelar</button></a>
                                <button style="background-color: #229bc6; color: #fff;" class="btn account-btn" type="submit">Submeter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>






                                <div class="sidebar-overlay" data-reff=""></div>
                                <script src="assets/js/jquery-3.2.1.min.js"></script>
                                <script src="assets/js/popper.min.js"></script>
                                <script src="assets/js/bootstrap.min.js"></script>
                                <script src="assets/js/jquery.slimscroll.js"></script>
                                <script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>