<header>
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper" style="background-color:<?= $_SESSION['temaUser'] == false ? 'rgba(38, 166, 153, 0.69)' : '#303131';?>;">
          <a href="home.php" class="brand-logo">Balance</a>
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a href="home.php">Início</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="home.php">Lançamentos</a></li>
            <li ><a href="#modal-config" class="waves-effect waves-light modal-trigger"><?= ucwords($_SESSION['usuario']);?></a></li>
            <li><i class="material-icons">account_circle</i></li>
            <li><a href="busca.php"><i class="material-icons">search</i></a></li>
            <li><a href="#modal-config" class="waves-effect waves-light modal-trigger btn-modal"><i
            class="material-icons">view_module</i></a></li>
          </ul>
        </div>
      </nav>
    </div>
    <ul class="sidenav white lighten-2" id="slide-out">
      <li>
        <div class="user-view">
            <div class="background" style="background-color:<?= $_SESSION['temaUser'] == false ? 'rgba(38, 166, 153, 0.69)' : '#303131';?>; height: 100%; width: 100%;"></div>
          <a href="#user"><img class="circle"
              src="https://cmecourses.som.uab.edu/pluginfile.php/12916/mod_resource/content/10/PPC_Jan10_2018/_img/people-icon.png"></a>
          <a href="#name"><span class="white-text name"><?= ucwords($_SESSION['usuario']);?></span></a>
          <a href="#email"><span class="white-text email"><?= $_SESSION['email']; ?></span></a>
        </div>
      </li>
      <li><a href=""><i class="material-icons">dashboard</i>Dashboard</a></li>
      <li><a href=""><i class="material-icons">equalizer</i>Lançamentos</a></li>
      <li><a href="#modal-config" class="waves-effect waves-light modal-trigger btn-modal"><i class="material-icons">settings_applications</i>Configurações</a></li>
      <li><a href=""><i class="material-icons">backup</i>Backup</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li><a class="subheader">Usuario</a></li>
      <li><a class="waves-effect" href="">Dados</a></li>
      <li><a class="waves-effect" href="login/sair.php">Sair</a></li>
    </ul>
</header>
