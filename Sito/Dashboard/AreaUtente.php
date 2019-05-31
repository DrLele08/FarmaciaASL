<?php
    session_start();
    require_once "../script/funzioni.php";
    $Ut=null;
    if($_SESSION["idUt"]==null)
    {
        header("Location: ../ListaFarmacie.php?Err=2");
    }
    else
    {
        $Ut=getInfoUtentebyId($_SESSION["idUt"]);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Area Di <?php echo $Ut["Cognome"]." ".$Ut["Nome"] ?></title>
  <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link type="text/css" href="../css/stile.css" rel="stylesheet">
</head>
<body>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="AreaUtente.php">
        <img src="../img/Logo.gif" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../<?php echo $Ut["FotoProfilo"] ?>">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Benvenuto!</h6>
            </div>
            <a href="#" onclick="CambiaDiv('DivImpostazioni')" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Impostazioni</span>
            </a>
            <a href="#" onclick="CambiaDiv('DivPrenotaVis')" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Prenotazioni</span>
            </a>
            <a href="../Contattaci.php" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Contattaci</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="../ListaFarmacie.php?Esci=1" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="AreaUtente.php">
                <img src="./assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="AreaUtente.php">
              <i class="ni ni-tv-2 text-primary"></i> Area Utente
            </a>
          </li>
            <?php
                if($Ut["isAdmin"])
                {
                    echo "<li class=\"nav-item\">
                        <a href=\"AreaAdmin.php\" class=\"nav-link\">
                          <i class=\"ni ni-app text-red\"></i> Area Admin
                        </a>
                      </li>";
                }
            ?>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="CambiaDiv('DivPrenotaVis');">
              <i class="ni ni-planet text-blue"></i> Prenota Visita
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="CambiaDiv('DivGestPrenotazioni');">
              <i class="ni ni-pin-3 text-orange"></i> Gestisci Prenotazioni
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" onclick="CambiaDiv('DivImpostazioni');">
              <i class="ni ni-single-02 text-yellow"></i> Impostazioni
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="AreaUtente.php">Area Utente</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="<?php echo "../".$Ut['FotoProfilo']; ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo $Ut["Cognome"]." ".$Ut["Nome"] ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Benvenuto!</h6>
              </div>
              <a href="#" onclick="CambiaDiv('DivImpostazioni')" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Impostazioni</span>
              </a>
              <a href="#" onclick="CambiaDiv('DivPrenotaVis')" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Prenotazioni</span>
              </a>
              <a href="../Contattaci.php" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Contattaci</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="../ListaFarmacie.php?Esci=1" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-1">
    </div>
    <!-- Page content -->
      <div class="container-fluid" id="DivHome" align="center">
          <h1 class="display-2">Benvenuto <?php echo $Ut["Cognome"]." ".$Ut["Nome"]; ?></h1>
      </div>
      <div class="container-fluid Invisibile" id="DivImpostazioni" align="center">
          <h1 class="display-2">Impostazioni Utente</h1>
      </div>
      <div class="container-fluid Invisibile" id="DivGestPrenotazioni" align="center">
          <h1 class="display-2">Gestione Delle Tue Visite</h1>
      </div>
      <div class="container-fluid Invisibile" id="DivPrenotaVis" align="center">
          <h1 class="display-2">Prenota Una Visita</h1>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019 <a href="https://twitter.com/DrLele08" class="font-weight-bold ml-1" target="_blank">Raffaele Sais</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.saisraffaele.net" class="nav-link" target="_blank">Sito Web</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    <script>
        var DivAttivo="DivHome";
        function CambiaDiv(NewDiv)
        {
            $("#"+DivAttivo).addClass("Invisibile");
            DivAttivo=NewDiv;
            $('#'+NewDiv).removeClass("Invisibile");
        }
    </script>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
</body>

</html>