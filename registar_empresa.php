<?php
session_start();
// Include config file
require_once("config.php");


// Define variables and initialize with empty values
$Email =  $Password  = $Nome = $Morada = $Nif = $Codigo_postal= $Localidade= $confirm_password = "";
$Email_err = $Password_err = $Nome_err  =  $Morada_err = $Nif_err = $Codigo_postal_err= $Localidade_err = $confirm_password_err = "";



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["Email"]))){
        $Email_err = "Por favor coloque um nome de utilizador.";
    } else {
        // Prepare a select statement
        $sql = "SELECT ID_empresa FROM empresa WHERE Email= ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Email );

            // Set parameters
            $param_Email  = trim($_POST["Email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store resultado */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $Email_err = "Este nome de utilizador já está em uso.";
                } else {
                    $Email  = trim($_POST["Email"]);
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
        $Nome_err = "Por favor coloque um nome de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_empresa FROM empresa WHERE Nome = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Email);

            // Set parameters
            $param_Nome = trim($_POST["Nome"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $Nome = trim($_POST["Nome"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["Morada"]))){
        $Morada_err = "Por favor insira um nome.";

    } else {
        $sql = "SELECT ID_empresa FROM empresa WHERE Morada= ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_Name);
            //set parameters
            $param_Morada = trim($_POST["Morada"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store resultado */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $Morada_err = "This login is already taken.";
                } else {
                    $Morada = trim($_POST["Morada"]);
                }
            } else {
                echo "3";
            }

        }
        mysqli_stmt_close($stmt);
    }

    // Validate name
    if(empty(trim($_POST["Nif"]))){
        $Nif_err = "Por favor coloque um nome de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_empresa FROM empresa WHERE Nif = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Morada);

            // Set parameters
            $param_Nif = trim($_POST["Nif"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $Nome = trim($_POST["Nif"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate name
    if(empty(trim($_POST["Codigo_Postal"]))){
        $Codigo_postal_err = "Por favor coloque um nome de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_empresa FROM empresa WHERE Codigo_postal = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Nif);

            // Set parameters
            $param_Codigo_postal = trim($_POST["Codigo_Postal"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $Codigo_postal = trim($_POST["Codigo_Postal"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


    // Validate name
    if(empty(trim($_POST["Localidade"]))){
        $Localidade_err = "Por favor coloque um nome de utilizador.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_empresa FROM empresa WHERE Localidade = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Codigo_postal);

            // Set parameters
            $param_Localidade = trim($_POST["Localidade"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store resultado */
                mysqli_stmt_store_result($stmt);


                $Localidade = trim($_POST["Localidade"]);
            } else{
                //log error
                //echo mysqli_errno($this->con);
                echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }





    //validar password

    if(empty(trim($_POST["Password"]))){
        $Password_err = "Por favor insira uma senha.";
    } elseif(strlen(trim($_POST["Password"])) < 6){
        $Password_err = "A senha deve ter pelo menos 6 caracteres.";
    } else{
        $Password = trim($_POST["Password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($Password_err) && ($Password != $confirm_password)){
            $confirm_password_err = "A senha não corresponde.";
        }
    }

    // Check input errors before inserting in database
    if(empty($Email_err) && empty($Password_err) && empty($confirm_password_err) && empty($Name_err) && empty($Morada_err)  && empty($Nif_err)  && empty($Codigo_postal_err)  && empty($Localidade_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO empresa (Email, Password, Nome, Morada, Nif, Codigo_Postal, Localidade ) VALUES (?, ?, ?,?,?,?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_Password, $param_Nome, $param_Email);

            // Set parameters

            $param_Email = $Email;
            $param_Nome = $Nome;
            $param_Morada = $Morada;
            $param_Nif = $Nif;
            $param_Codigo_postal=$Codigo_postal;
            $param_Localidade=$Localidade;
            $param_Password = password_hash($Password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
<html lang="pt">


<!-- register24:03-->
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
<div class="main-wrapper  account-wrapper">
    <a class="navbar-brand js-scroll-trigger" href="#page-top"><a href="index.php">AJUDA.IPB</a>
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-signin">
                        <div class="account-logo">
                            <a href="../Empresa/login_e.html"><img src="assets/img/ipb.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control <?php echo (!empty($param_Email)) ? 'is-invalid' : ''; ?>" id="<?php echo $Email; ?>">

                        </div>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="Nome" class="form-control  <?php echo (!empty($Nome_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Nome; ?>">
                        </div>
                        <div class="form-group">
                            <label>Morada</label>
                            <input type="text" name="Morada" class="form-control <?php echo (!empty($Morada_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Morada; ?>">
                        </div>
                        <div class="form-group">
                            <label>Código Postal</label>
                            <input type="text" name="Codigo_Postal" class="form-control <?php echo (!empty($Codigo_postal_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Codigo_postal; ?>">
                        </div>
                        <div class="form-group">
                            <label>Localidade</label>
                            <input type="text" name="Localidade" class="form-control <?php echo (!empty($Localidade_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Localidade; ?>">
                        </div>
                        <div class="form-group">
                            <label>NIF</label>
                            <input type="text" name="Nif" class="form-control <?php echo (!empty($Nif_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Nif; ?>">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="Password" class="form-control<?php echo (!empty($Password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Password; ?>">
                        </div>
                        <div class="form-group">
                            <label>Confirmar password</label>
                            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                        </div>

                        <div class="form-group text-center">
                            <button style="background-color: #820053; color: #fff;"  class="btn account-btn" type="submit">Submeter</button>
                        </div>
                        <div class="text-center login-link">
                          Já tens a conta? <a href="../loginEmpresa.html">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
</body>


<!-- register24:03-->
</html>