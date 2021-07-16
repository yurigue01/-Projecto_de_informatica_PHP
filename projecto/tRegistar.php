<?php
//session_start();
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$Nome = $Password = $Morada = $Nif = $Codigo_Postal = $Telefone =  $Email = $Localidade =  $confirm_password = "";
$Nome_err = $Password_err = $Morada_err = $Nif_err = $Codigo_Postal_err = $Telefone_err =  $Email_err = $Localidade_err = $confirm_password_err = "";






// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validar nome
if(empty(trim($_POST["Nome"]))){
    $Nome_err = " Por favor introduza um nome.";
//} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Nome"]))){
    //$Nome_err = "Username can only contain letters, numbers, and underscores.";
} else{
    // Prepare a select statement
    $sql = "SELECT ID_candidato FROM candidato WHERE Nome = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_Nome);

        // Set parameters
        $param_Nome = trim($_POST["Nome"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $Nome_err = "Este nome ja esta em uso.";
            } else{
                $Nome = trim($_POST["Nome"]);
            }
        } else{
            echo "Oops! Algo deu errado. por favor, tente mais tarde.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}





// Validate password
if(empty(trim($_POST["Password"]))){
    $password_err = "Please enter a password.";
} elseif(strlen(trim($_POST["Password"])) < 15){
    $password_err = "Password tem mais que  15 characters.";
} else{
    $password = trim($_POST["Password"]);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Por favor confirm password.";
} else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($Password_err) && ($Password != $confirm_password)){
        $confirm_password_err = "Password did not match.";
    }
}







// Validar Morada
if(empty(trim($_POST["Morada"]))){
    $Morada_err = "Please enter a username.";
}// elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Morada"]))){
    //$Morada_err = "Username can only contain letters, numbers, and underscores.";
//}
else{
    // Prepare a select statement
    $sql = "SELECT ID_candidato FROM candidato WHERE Morada = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_Morada);

        // Set parameters
        $param_Morada = trim($_POST["Morada"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $Morada_err = "This username is already taken.";
            } else{
                $Morada = trim($_POST["Morada"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}







// Validar Nif
if(empty(trim($_POST["Nif"]))){
    $Nif_err = "Please enter a username.";
} //elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Nif"]))){
   // $Nif_err = "Username can only contain letters, numbers, and underscores.";
//}
else{
    // Prepare a select statement
    $sql = "SELECT ID_candidato FROM candidato WHERE Nif = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_Nif);

        // Set parameters
        $param_Nif = trim($_POST["Nif"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $Nif_err = "This username is already taken.";
            } else{
                $Nif = trim($_POST["Nif"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}








// Validar codigo postal
if(empty(trim($_POST["Codigo_Postal"]))){
    $Codigo_Postal_err = "Please enter a username.";
} //elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Codigo_Postal"]))){
    //$Codigo_Postal_err = "Username can only contain letters, numbers, and underscores.";
//}
else{
    // Prepare a select statement
    $sql = "SELECT ID_candidato FROM candidato WHERE Codigo_Postal = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_Codigo_Postal);

        // Set parameters
        $param_Codigo_Postal = trim($_POST["Codigo_Postal"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $Codigo_Postal_err= "This username is already taken.";
            } else{
                $Codigo_Postal = trim($_POST["Codigo_Postal"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}







// Validar Telefone
    if (empty(trim($_POST["Telefone"]))) {
        $Telefone_err = "Please enter a username.";
    }// elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Telefone"]))) {
      //  $Telefone_err = "Username can only contain letters, numbers, and underscores.";
    } //
else {
        // Prepare a select statement
        $sql = "SELECT ID_candidato FROM candidato WHERE Telefone = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Telefone);

            // Set parameters
            $param_Telefone = trim($_POST["Telefone"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $Telefone_err = "This username is already taken.";
                } else {
                    $Telefone = trim($_POST["Telefone"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



        // Validar Email
        if (empty(trim($_POST["Email"]))) {
            $Email_err = "Please enter a username.";
        } //elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Email"]))) {
           // $Email_err = "Username can only contain letters, numbers, and underscores.";
       // }
        else {
            // Prepare a select statement
            $sql = "SELECT ID_candidato FROM candidato WHERE Email = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_Email);

                // Set parameters
                $param_Email = trim($_POST["Email"]);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $Email_err = "This username is already taken.";
                    } else {
                        $Email = trim($_POST["Email"]);
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

    // Localidade
if(empty(trim($_POST["Localidade"]))){
    $Localidade_err = "Please enter a username.";
} //elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Localidade"]))){
  //  $Localidade_err = "Username can only contain letters, numbers, and underscores.";
//}
else{
    // Prepare a select statement
    $sql = "SELECT ID_candidato FROM candidato WHERE Localidade= ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_Localidade);

        // Set parameters
        $param_Localidade = trim($_POST["Localidade"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) == 1){
                $Localidade_err = "This username is already taken.";
            } else{
                $Localidade = trim($_POST["Localidade"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}



        // Check input errors before inserting in database
        if (empty($Nome_err) && empty($Email_err) && empty($Telefone_err) && empty($Nif_err) && empty($Codigo_Postal_err)&& empty($Localidade_err)&& empty($password_err) && empty($confirm_password_err)) {

            // Prepare an insert statement
            $sql = "INSERT INTO candidato (Nome, password, Morada, Nif, Codigo Postal, Telefone, Email, Localidade) VALUES (?,?, ?, ?, ?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssssssss", $param_Nome, $param_Email, $param_Telefone, $param_Codigo_Postal, $param_Morada, $param_Nif, $param_Localidade, $param_Password);

                // Set parameters
                $param_Nome = $Nome;
                $param_Email = $Email;
                $param_Telefone = $Telefone;
                $param_Nif = $Nif;
                $param_Morada = $Morada;
                $param_Codigo_Postal = $Codigo_Postal;
                $param_Localidade=$Localidade;
                $param_Password = password_hash($Password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login pageS
                    header("location: tesLofin.php");
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($link);


?>

<!DOCTYPE html>
<html lang="pt" xmlns="http://www.w3.org/1999/html">


<!-- register24:03-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/ipb.png">
    <title>AJUDA.IPB</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<a>Registo de Candidato</a>
<body>
<div class="main-wrapper  account-wrapper">
    <div class="navbar-brand js-scroll-trigger" href="#page-top"><a href="../Index/index.html">AJUDA.IPB</a>
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <!--<form action="../Candidato/Login_c.php" class="form-signin" method="post"-->
                        <div class="account-logo">
                            <a href="../Candidato/Login_c.php"><img src="../assets/img/ipb.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="Nome" class="form-control" <?php echo (!empty($Nome_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Nome; ?>">
                            <span class="invalid-feedback"><?php echo $Nome_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>NIF</label>
                            <input type="text" name="Nif" class="form-control" <?php echo (!empty($Nif_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Nif; ?>">
                            <span class="invalid-feedback"><?php echo $Nif_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control" <?php echo (!empty($Email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Email; ?>">
                            <span class="invalid-feedback"><?php echo $Email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" name="Telefone" class="form-control"  <?php echo (!empty($Telefone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Telefone; ?>">
                            <span class="invalid-feedback"><?php echo $Telefone_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Morada</label>
                            <input type="text" name="Morada" class="form-control" <?php echo (!empty($Morada_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Morada; ?>">
                            <span class="invalid-feedback"><?php echo $Morada_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Codigo Postal</label>
                            <input type="text" name="Codigo_Postal" class="form-control" <?php echo (!empty($Codigo_Postal_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Codigo_Postal; ?>">
                            <span class="invalid-feedback"><?php echo $Codigo_Postal_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Localidade</label>
                            <input type="text" name="Localidade" class="form-control" <?php echo (!empty($Localidade_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Localidade; ?>">
                            <span class="invalid-feedback"><?php echo $Localidade_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password"  name="Password" class="form-control" <?php echo (!empty($Password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Password; ?>">
                            <span class="invalid-feedback"><?php echo $Password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Confirma Password</label>
                            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>

                        <div class="form-group checkbox">
                            <label>
                                <input type="checkbox"> I have read and agree the Terms & Conditions
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <button  style="background-color: #820053; color: #fff;"  class="btn account-btn" type="submit">"Submeter</button>
                        </div>
                        <div class="text-center login-link">
                            Já tens a conta? <a href="../Candidato/Login_c.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script src="../assets/js/jquery-3.2.1.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/app.js"></script>
</body>
<!-- register24:03-->
</html>



