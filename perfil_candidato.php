<?php
require_once ("config.php");
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}

if(isset($_SESSION["loggedin"])){
    if($_SESSION["loggedin"] == true && $_SESSION["tipo_utilizador"]=="candidato"){
        header("location: perfil_candidato.php");
    }
}

require_once ("operacao.php");
$op=require_once ( "config.php");




?>

<!DOCTYPE html>
<html lang="en">
<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/ipb.png">
    <title>AJUDA.IPB</title>t
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<?php
//$cand = "SELECT *FROM utilizador WHERE Tipo_utilizador_ID_tipo = 2" ;

$id=$_SESSION["ID_utilizador"];
/* definir o charset utilizado na ligação */



$sql = "SELECT * FROM utilizador WHERE ID_utilizador = '$id'";
$result = $link->query($sql);


$bus= $result->fetch_assoc();
$Nome  = $bus['Nome'];
$username  = $bus['username'];
$Telefone = ( $bus['Telefone']);
$Email  = $bus['Email'];
$Morada  = $bus['Morada'];
$Localidade  = $bus['Localidade'];
$cp = $bus['Codigo_Postal'];
$Nif = $bus['Nif'];



?>
<body>
<div class="main-wrapper">
    <div class="header">
        <div class="header-left">
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
                    <span><?php echo"$username" ?> </span>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="perfil_candidato.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                    <a class="dropdown-item" href="Utilizador/Candidato/change-password.html">Alterar Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_candidato.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil.php">Editar Perfil</a>
                <a class="dropdown-item" href="Utilizador/Candidato/change-password.html">Alterar Password</a>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Principal</li>
                    <li>
                        <a href="Utilizador/Candidato/profile.html"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="assets/Instruction Manual for Safety and Comfort.pdf"><i class="fa fa-book"></i> <span>CV</span></a>
                    </li>
                    <li>
                        <a href="Utilizador/Candidato/Orfertas_emprego.html"> <span>Ofertas Emprego/Estagio </span></a>
                    </li>
                    <li>
                        <a href="Utilizador/Candidato/CandidaturaAluno.html"> <span>Candidaturas</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Identificação</h4>
                </div>

            </div>
            <div class="card-box profile-header">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#"><img class="avatar" src="imagem/yuri.png" alt=""></a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0"><?php echo"$Nome" ?> </h3>
                                        </div>
                                        <a href="tml">Editar Foto
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <span class="title">Telemóvel:</span>
                                                <span class="text"> <?php echo"$Telefone" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">Email:</span>
                                                <span class="text"> <?php echo"$Email" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">Morada:</span>
                                                <span class="text"> <?php echo"$Morada" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">Codigo postal:</span>
                                                <span class="text"><?php echo"$cp" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">Localidade:</span>
                                                <span class="text"><?php echo"$Localidade" ?> </span>
                                            </li>
                                            <li>
                                                <span class="title">NIF:</span>
                                                <span class="text"><?php echo"$Nif" ?> </span>
                                            <li/>




                                                <!---- Buscar todas as abilitações do utilizador -->
                                                <span class="title">Habilitações:</span>


                                                <?php
                                                
                                                $Hab=getReceitasByIds($op,$id);

                                                foreach ($Hab as $hab ):
                                                ?>


                                            <span class="text">  <?php echo $hab['Habilitacoes'] ?> </span>
                                            <?php
                                            endforeach;
                                            ?>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-tabs">
                <ul class="nav nav-tabs nav-tabs-bottom">
                    <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Línguas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Aptidões e Competências</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="about-cont">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <a href="html" class="card-title" >Educação e Formação</a>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a>Ainda não foi introduzida qualquer Educação e Formação</a>

                                                    </div>
                                                </div>
                                            </li>
                                            <li>

                                                <div class="experience-content">
                                                    <div class="timeline-content">

                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-box mb-0">

                                    <a href="rof.html" class="card-title" >Experiência Profissionais</a>
                                    <div class="experience-box">
                                        <ul class="experience-list">
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">

                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">
                                                    <div class="before-circle"></div>
                                                </div>
                                                <div class="experience-content">
                                                    <div class="timeline-content">
                                                        <a>Ainda não foi introduzida qualquer Experiência Profissional</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="experience-user">

                                                </div>
                                                <div class="experience-content">

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="bottom-tab2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <a href=">Línguas</a>
                                        <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>
                                            <div class="experience-user">
                                                <div class="before-circle"></div>
                                            </div>
                                            <div class="experience-content">
                                                <div class="timeline-content">
                                                    <a>Ainda não foi introduzida qualquer Língua</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="experience-user">

                                            </div>
                                            <div class="experience-content">

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="bottom-tab3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <a href="tml">Aptidões e Competências</a>

                                <div class="experience-box">
                                    <ul class="experience-list">
                                        <li>

                                            <div class="experience-content">

                                        </li>
                                    </ul>
                                </div>
                            </div>



                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>