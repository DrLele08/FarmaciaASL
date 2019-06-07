<?php
session_start();
require_once "../script/funzioni.php";
$Ut=null;
$Farmacia=null;
if($_SESSION["idUt"]==null)
{
    header("Location: ../ListaFarmacie.php?Err=2");
}
else
{
    $Ut=getInfoUtentebyId($_SESSION["idUt"]);
    if(!$Ut["isAdmin"])
    {
        header("Location: AreaUtente.php");
    }
    $Farmacia=getInfoFarmaciabyId($Ut["ksFarmaciaPreferita"]);
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Area Di <?php echo $Ut["Cognome"]." ".$Ut["Nome"] ?></title>
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard" />
    <meta name="keywords" content="dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon dashboard">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta itemprop="name" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta itemprop="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
    <meta name="twitter:description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Farmacia ASL Sais Raffaele" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard/index.html" />
    <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a Dashboard for Bootstrap 4." />
    <meta property="og:site_name" content="Creative Tim" />
    <link href="./assets/img/brand/favicon.png" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link type="text/css" href="./assets/css/argon.min.css?v=1.0.0" rel="stylesheet">
    <link rel="stylesheet" href="../css/stile.css">
    <script src="../javascript/funzioni.js"></script>
</head>
<body>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <a class="navbar-brand pt-0" href="AreaAdmin.php">
            <img src="../img/Logo.gif" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../img/Utenti/default.png">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Benvenuto!</h6>
                    </div>
                    <a href="#" class="dropdown-item" onclick="CambiaDiv('DivAdminProfilo')">
                        <i class="ni ni-single-02"></i>
                        <span>Profilo</span>
                    </a>
                    <a href="#" class="dropdown-item" onclick="CambiaDiv('DivAdminDispPreno')">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Disponbilità Preno</span>
                    </a>
                    <a href="#" class="dropdown-item" onclick="CambiaDiv('DivAdminGest')">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Gestisci Preno</span>
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
                        <a href="AreaAdmin.php">
                            <img src="./assets/img/brand/blue.png" alt="..">
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
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="AreaAdmin.php">
                        <i class="ni ni-tv-2 text-primary"></i> Area Admin
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AreaUtente.php">
                        <i class="ni ni-tv-2 text-red"></i> Area Utente
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="CambiaDiv('DivAdminDispPreno')">
                        <i class="ni ni-planet text-blue"></i> Disponibilità Prenotazioni
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="CambiaDiv('DivAdminGest')">
                        <i class="ni ni-pin-3 text-orange"></i> Gestisci Prenotazioni
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="CambiaDiv('DivAdminProfilo')">
                        <i class="ni ni-single-02 text-yellow"></i> Profilo
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../indexInjection.php">
                        <i class="ni ni-world text-red"></i> Esempio SQL Injection
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="FacebookPishing/index.php">
                        <i class="ni ni-cloud-download-95 text-blue"></i> Esempio Phishing
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
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="AreaAdmin.php">Area Admin</a>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="../img/Utenti/default.png">
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
                        <a href="#" class="dropdown-item" onclick="CambiaDiv('DivAdminProfilo')">
                            <i class="ni ni-single-02"></i>
                            <span>Profilo</span>
                        </a>
                        <a href="#" class="dropdown-item" onclick="CambiaDiv('DivAdminDispPreno')">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Disponbilità Preno</span>
                        </a>
                        <a href="#" class="dropdown-item" onclick="CambiaDiv('DivAdminGest')">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Gestisci Preno</span>
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(./assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-10 col-md-15">
                    <h1 class="display-2 text-white">Ciao <?php echo $Ut["Cognome"]." ".$Ut["Nome"] ?></h1>
                    <p class="text-white mt-0 mb-9">Questa è l'area admin della IncoFarma SPA</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--9 Invisibile" id="DivAdminDispPreno">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Inserisci Disponibilità Prenotazioni</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Completa i campi</h6>
                            <div class="pl-lg-4">
                                <div align="center">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <select class="custom-select" id="select_FarmaciaAdmin" onchange="FarmaciaSelected()">
                                                <option value="-1">Scegliere una farmacia</option>
                                                <?php
                                                    $VettFarma=getInfoFarmacie();
                                                    foreach($VettFarma as $row)
                                                    {
                                                        $id=$row["idSede"];
                                                        $Nome=$row["Nome"];
                                                        echo "<option value='{$id}'>{$Nome}</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4 Invisibile" id="DivAdminData">
                                <div align="center">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" id="input_DataAdminDisp" placeholder="Seleziona una data" type="text" onchange="DataCambiataPreno()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4 Invisibile" id="DivAdminServizioSelect">
                                <div align="center">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <select class="custom-select" id="select_ServizioAdmin" onchange="ServizioSelezionatoAdmin()">
                                                <option value="-1">Seleziona un servizio</option>
                                                <?php
                                                    $VettServ=getVettServ();
                                                    foreach($VettServ as $row)
                                                    {
                                                        $id=$row["idServizio"];
                                                        $Nome=$row["Tipo"];
                                                        echo "<option value='{$id}'>{$Nome}</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4 Invisibile" id="DivAdminSlider">
                                <div align="center">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <select class="custom-select" id="select_OrarioPrenoAdm">
                                                <option value="10:00:00">10:00</option>
                                                <option value="10:30:00">10:30</option>
                                                <option value="11:00:00">11:00</option>
                                                <option value="11:30:00">11:30</option>
                                                <option value="12:00:00">12:00</option>
                                                <option value="12:30:00">12:30</option>
                                                <option value="15:00:00" selected>15:00</option>
                                                <option value="15:30:00">15:30</option>
                                                <option value="16:00:00">16:00</option>
                                                <option value="16:30:00">16:30</option>
                                                <option value="17:00:00">17:00</option>
                                                <option value="17:30:00">17:30</option>
                                                <option value="18:00:00">18:00</option>
                                                <option value="18:30:00">18:30</option>
                                                <option value="19:00:00">19:00</option>
                                                <option value="19:30:00">19:30</option>
                                                <option value="20:00:00">20:00</option>
                                            </select>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-success" onclick="AddVisita()">Aggiungi</button>
                                            <button type="button" class="btn btn-danger" onclick="Cancella()">Annulla</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--9 Invisibile" id="DivAdminGest">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Gestisci Le Tue Prenotazioni</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Scegli un criterio di ricerca</h6>
                            <div class="pl-lg-4">
                                <div align="center">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" id="input_DataAdmin" placeholder="Seleziona una data" type="text" onchange="DataSelezionata()">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Visite In Quel Giorno</h6>
                            <div class="pl-lg-4">
                                <div class="row" id="DivAdminTabella">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-dark">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Farmacia</th>
                                                <th scope="col">Data/Ora</th>
                                                <th scope="col">Stato</th>
                                                <th scope="col">Paziente</th>
                                                <th scope="col">Esito</th>
                                                <th scope="col">Altro</th>
                                            </tr>
                                            </thead>
                                            <tbody id="table_Admin">

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--9 Invisibile" id="DivAdminProfilo">
        <div class="row">
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Informazioni Account</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Informazioni Personali</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Email</label>
                                            <input disabled type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Ut["Email"] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Nome</label>
                                            <input disabled type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Ut["Nome"] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Cognome</label>
                                            <input disabled type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Ut["Cognome"] ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Codice Fiscale</label>
                                            <input disabled type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Ut["CF"]?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Farmacia Preferita</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Nome</label>
                                            <input disabled type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Farmacia->Nome ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-city">Indirizzo</label>
                                            <input disabled type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Farmacia->Indirizzo?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Citta</label>
                                            <input disabled type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Farmacia->Citta?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country">Numero</label>
                                            <input disabled type="email" id="input-email" class="form-control form-control-alternative" value="<?php echo $Farmacia->Telefono ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; 2019 <a href="https://www.saisraffaele.net" class="font-weight-bold ml-1" target="_blank">Sais Raffaele</a>
                </div>
            </div>
            <div class="col-xl-6">
                <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">Lincenza</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="./assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Argon JS -->
<script src="./assets/js/argon.min.js?v=1.0.0"></script>
<script>
    var DivAttivo="DivAdminDispPreno";
    function CambiaDiv(NewDiv)
    {
        $("#"+DivAttivo).addClass("Invisibile");
        DivAttivo=NewDiv;
        $('#'+NewDiv).removeClass("Invisibile");
    }
    function DataSelezionata()
    {
        let Data=$("#input_DataAdmin").val();
        let idMed="<?php echo $Ut['CF'] ?>";
        let NewData=Data[6]+Data[7]+Data[8]+Data[9]+"-"+Data[0]+Data[1]+"-"+Data[3]+Data[4];
        getInfoPreno(idMed,NewData);
    }
    function FarmaciaSelected()
    {
        let indexFarm=$("#select_FarmaciaAdmin").val();
        if(indexFarm!="-1")
        {
            $("#DivAdminData").removeClass("Invisibile")
        }
        else if(!$("#DivAdminData").hasClass("Invisibile"))
        {
            $("#DivAdminData").addClass("Invisibile")
        }
    }
    function DataCambiataPreno()
    {
        let DivData=$("#input_DataAdminDisp").val();
        if(DivData!="-1")
        {
            $("#DivAdminServizioSelect").removeClass("Invisibile");
        }
        else if(!$("#DivAdminServizioSelect").hasClass("Invisibile"))
        {
            $("#DivAdminServizioSelect").addClass("Invisibile");
        }
    }
    function ServizioSelezionatoAdmin()
    {
        let idServ=$("#select_ServizioAdmin").val();
        if(idServ!="-1")
        {
            $("#DivAdminSlider").removeClass("Invisibile");
        }
        else if(!$("#DivAdminSlider").hasClass("Invisibile"))
        {
            $("#DivAdminSlider").addClass("Invisibile");
        }
    }
    function Cancella()
    {
        if(confirm("Sicuro di voler annullare?"))
        {
            $("#DivAdminSlider").addClass("Invisibile");
            $("#DivAdminServizioSelect").addClass("Invisibile");
            $("#DivAdminData").addClass("Invisibile");
            $("#select_FarmaciaAdmin").val("-1");
            $("#input_DataAdminDisp").val("");
            $("#select_ServizioAdmin").val("-1");
        }
    }
    function AddVisita()
    {
        let idServ=$("#select_ServizioAdmin").val();
        let idFarm=$("#select_FarmaciaAdmin").val();
        let idMed="<?php echo $Ut['CF'] ?>";
        let Data=$("#input_DataAdminDisp").val();
        let Ora=$("#select_OrarioPrenoAdm").val();
        let NewData=Data[6]+Data[7]+Data[8]+Data[9]+"-"+Data[0]+Data[1]+"-"+Data[3]+Data[4];
        AddDispPreno(idServ,idFarm,idMed,NewData,Ora);
    }
</script>
</body>

</html>