<?php
session_start();
// Include config file
require_once("config.php");


// Define variables and initialize with empty values
$username =  $password  = $nome = $email = $morada = $localidade = $telefone =$Nif =$Codigo_Postal  = $confirm_password = "";
$username_err = $password_err = $nome_err = $morada_err   = $localidade_err = $telefone_err =$Nif_err =$Codigo_Postal_err = $email_err = $confirm_password_err = "";



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor coloque um nome de utilizador.";
    } else {
        // Prepare a select statement
        $sql = "SELECT ID_utilizador FROM utilizador WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store resultado */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este nome de utilizador já está em uso.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

    }

    // Validate name
    if(empty(trim($_POST["Nome"]))){
        $nome_err = "Por favor coloque um nome de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_utilizador FROM utilizador WHERE   Nome = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_nome = trim($_POST["Nome"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $nome = trim($_POST["Nome"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Validate morada
    if(empty(trim($_POST["Morada"]))){
        $morada_err = "Por favor coloque morada de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_utilizador FROM utilizador WHERE   Morada = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_morada = trim($_POST["Morada"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $morada = trim($_POST["Morada"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate localidade
    if(empty(trim($_POST["Localidade"]))){
        $localidade_err = "Por favor coloque localidade de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_utilizador FROM utilizador WHERE   Localidade = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_localidade = trim($_POST["Localidade"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $localidade = trim($_POST["Localidade"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate telefone
    if(empty(trim($_POST["Telefone"]))){
        $telefone_err = "Por favor coloque um telefone de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_utilizador FROM utilizador WHERE   Telefone = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_telefone = trim($_POST["Telefone"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $telefone = trim($_POST["Telefone"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Validate telefone
    if(empty(trim($_POST["Nif"]))){
        $Nif_err = "Por favor coloque um Nif .";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_utilizador FROM utilizador WHERE   Nif = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_Nif = trim($_POST["Nif"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $Nif = trim($_POST["Nif"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Validate telefone
    if(empty(trim($_POST["Codigo_Postal"]))){
        $Codigo_Postal_err = "Por favor coloque um codigo postal.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_utilizador FROM utilizador WHERE   Codigo_Postal = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_Codigo_Postal = trim($_POST["Codigo_Postal"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $Codigo_Postal = trim($_POST["Codigo_Postal"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    if(empty(trim($_POST["Email"]))){
        $email_err = "Por favor insira um nome.";

    } else {
        $sql = "SELECT ID_utilizador FROM utilizador Where Email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            //set parameters
            $param_email = trim($_POST["Email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store resultado */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This login is already taken.";
                } else {
                    $email = trim($_POST["Email"]);
                }
            } else {
                echo "3";
            }
        }
        mysqli_stmt_close($stmt);
    }

    //validar password

    if(empty(trim($_POST["Password"]))){
        $password_err = "Por favor insira uma senha.";
    } elseif(strlen(trim($_POST["Password"])) < 6){
        $password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["Password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A senha não corresponde.";
        }
    }
//

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err)
        && empty($morada_err) && empty($localidade_err) && empty($telefone_err) && empty($Nif_err) && empty($Codigo_Postal_err)&& empty($email_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO utilizador (username, Password, Nome, Morada, Localidade, Telefone, Nif, Codigo_Postal, Email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_username, $param_password, $param_nome, $param_morada, $param_localidade, $param_telefone, $param_Nif, $param_Codigo_Postal, $param_email);

            // Set parameters

            $param_username = $username;
            $param_nome = $nome;
            $param_morada =$morada;
            $param_localidade = $localidade;
            $param_telefone = $telefone;
            $param_Nif = $Nif;
            $param_Codigo_Postal = $Codigo_Postal;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: gerir_utilizador.php");
            } else{
                //echo mysqli_errno($this->link);
                echo "Algo deu errado. Por favor, tente novamente mais tarde.";
                printf("Error: %s.\n", mysqli_stmt_error($stmt));
                echo"6";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/ipb.png">
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
                    <a class="dropdown-item" href="perfil_adm.php">Meu Perfil</a>
                    <a class="dropdown-item" href="editar_perfil_adm.php">Editar Perfil</a>
                    <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="perfil_adm.php">Meu Perfil</a>
                <a class="dropdown-item" href="editar_perfil_adm.php">Editar Perfil</a>
                <a class="dropdown-item" href="alterar_password.php">Alterar Password</a>
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
                        <a href="perfil_adm.php"><i class="fa fa-user"></i> <span>Perfil</span></a>
                    </li>
                    <li>
                        <a href="gerir_utilizador.php"> <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>
                            Gerir Utilizador</span></a>
                    </li>

                    <li>
                        <a href="Utilizador/Adm/GerirOfert.html"> <span>Gerir Oferta</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-7 col-6">
                    <h4 class="page-title">Inserir Utilizador</h4>
                </div>

            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="row">

                <div class="col-md-12">
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
                                    <label>Username </label>
                                    <input  id="<?php echo $username; ?>" type="text" name="username" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($nome_err)) ? 'has-error' : ''; ?>">
                                    <label>Nome </label>
                                    <input  id="<?php echo $nome; ?>" type="text" name="Nome" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                    <label>Email</label>
                                    <input id="<?php echo $email; ?>" type="email" name="Email" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($Nif_err)) ? 'has-error' : ''; ?>">
                                    <label>Nif</label>
                                    <input id="<?php echo $Nif; ?>" type="text" name="Nif" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($telefone_err)) ? 'has-error' : ''; ?>">
                                    <label>Telefone</label>
                                    <input id="<?php echo $telefone; ?>" type="text" name="Telefone" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($morada_err)) ? 'has-error' : ''; ?>">
                                    <label>Morada</label>
                                    <input id="<?php echo $morada; ?>" type="text" name="Morada" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($Codigo_Postal_err)) ? 'has-error' : ''; ?>">
                                    <label>Codigo Postal</label>
                                    <input id="<?php echo $Codigo_Postal; ?>" type="text" name="Codigo_Postal" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($localidade_err)) ? 'has-error' : ''; ?>">
                                    <label>Localidade</label>
                                    <input id="<?php echo $localidade; ?>" type="text" name="Localidade" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <label>Password</label>
                                    <input id="<?php echo $password; ?>" type="password" name="Password" class="form-control">
                                </div>
                                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                    <label>Confirmar Password</label>
                                    <input id="<?php echo $confirm_password; ?>" type="password" name="confirm_password" class="form-control">
                                </div>

                                <a href="gerir_utilizador.php"> <button style="background-color: #229bc6; color: #fff;" class="btn account-btn">Cancelar</button></a>
                                <a> <button style="background-color: #229bc6; color: #fff;" class="btn account-btn" type="submit">Adicionar</button></a>



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
