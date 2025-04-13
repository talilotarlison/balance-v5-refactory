<?php
    # sesao usuario
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
    <title>Balance - Login</title>
    <link rel="stylesheet" href="./assets/styles.css">
</head>

<body>
    <section>
        <!-- Modal Structure editar item -->
        <div style='margin-top: 10vh; display: flex; justify-content: center; align-items: center;'>
            <form action='loginValidar.php' method="post" class="container z-depth-3" style='border-radius: 10px; padding: 50px; max-width: 500px; background-color: #ffffff;'>
                <h4 style="text-align: center; color: #26a69a; font-weight: bold; margin-bottom: 30px;">Login Balance</h4>
                <div class="row" style="max-width: 400px; margin: 0 auto;">
                    <div class="input-field">
                        <i class="material-icons prefix teal-text">email</i>
                        <input id="email" type="email" name="email" class="validate" placeholder="Email:" required>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix teal-text">lock</i>
                        <input id="password" type="password" name="senha" class="validate" placeholder="Senha" required>
                    </div>
                    <?php
                        // sessao do usuario
                        if (!empty($_SESSION['erroLogin'])) {
                            echo "<p style='color: red; text-align: center;'>" . $_SESSION['erroLogin'] . "</p>";
                        }
                    ?>
                    <div class="center-align" style="margin-top: 20px;">
                        <button class="btn waves-effect waves-light teal darken-2" type="submit" style="width: 100%; margin-bottom: 10px;">Entrar</button>
                        <a href='cadastroUser.php' class="btn-flat teal-text" style="font-weight: bold;">Cadastre-se</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>