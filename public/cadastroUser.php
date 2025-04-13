<?php
    // sessao usuario
    session_start();
    
    if (isset($_SESSION['usuario'])) {
      header('Location: home.php');
    } 

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Balance - Cadastro</title>
    <link rel="stylesheet" href="./assets/styles.css">
</head>

<body>
    <section>
        <div style="margin-top: 5vh; display: flex; justify-content: center;">
            <form action="loginCadastrar.php" method="post" class="container z-depth-3" style="border-radius: 10px; padding: 40px; max-width: 600px; background-color: #ffffff;">
                <h4 style="text-align: center; color: #26a69a; font-weight: bold; margin-bottom: 30px;">Cadastro Balance</h4>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix" style="color: #26a69a;">account_circle</i>
                        <input id="nome" type="text" class="validate" placeholder="Nome" name="nome" required>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix" style="color: #26a69a;">email</i>
                        <input id="email" type="email" class="validate" placeholder="Email" name="email" required>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix" style="color: #26a69a;">lock</i>
                        <input id="senha" type="password" class="validate" placeholder="Senha" name="senha" required>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="input-field col s12">
                        <i class="material-icons prefix" style="color: #26a69a;">lock_outline</i>
                        <input id="senhaConfirme" type="password" class="validate" placeholder="Confirmar Senha" name="senhaConfirme" required>
                    </div>
                </div>
                <?php
                    if (!empty($_SESSION['senhaInvalida'])) {
                        echo "<p style='color: red; text-align: center;'>" . $_SESSION['senhaInvalida'] . "</p>";
                    } elseif (!empty($_SESSION['cadastro'])) {
                        echo "<p style='color: green; text-align: center;'>" . $_SESSION['cadastro'] . "</p>";
                    }
                ?>
                <div class="row" style="margin-top: 30px; text-align: center;">
                    <button class="btn waves-effect waves-light teal darken-2" type="submit" style="margin-right: 10px;">Cadastrar</button>
                    <a href="index.php" class="btn-flat waves-effect waves-teal" style="color: #26a69a;font-weight: bold;">Voltar</a>
                </div>
            </form>
        </div>
    </section>
</body>

</html>