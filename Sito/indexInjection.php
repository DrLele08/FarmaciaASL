<?php
    session_start();
    require_once 'script/funzioni.php';
    $Farmacia=null;
    $isLoggato=false;
    $Utente=null;
    if(isset($_GET["idFarmacia"]))
    {
        $id=$_GET["idFarmacia"];
        $_SESSION["idFarmacia"]=$id;
        $Farmacia=getInfoFarmaciabyId($id);
    }
    else
    {
        $id=1;
        $_SESSION["idFarmacia"]=$id;
        $Farmacia=getInfoFarmaciabyId($id);
    }
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title><?php echo $Farmacia->Nome ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stile.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="flaticon-pharmacy"></i><span>Inco</span>Farma</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php?idFarmacia=<?php echo $_GET["idFarmacia"] ?>" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="ListaFarmacie.php" class="nav-link">Lista Farmacie</a></li>
          <li class="nav-item"><a href="Contattaci.php" class="nav-link">Contattaci</a></li>
          <li class="nav-item cta"><a href="#contact" class="nav-link" data-toggle="modal" data-target="#login-modal"><span>Accedi</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <h1 class="mb-6">Benvenuto Nella Farmacia Di <?php echo $Farmacia->Citta ?></h1>
            <p>Perché la salute è innanzitutto una questione di attenzione!</p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-services">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link px-4 active" id="v-pills-master-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-master" aria-selected="true"><span class="mr-3 flaticon-cardiogram"></span> Misurazione Pressione</a>

              <a class="nav-link px-4" id="v-pills-buffet-tab" data-toggle="pill" href="#v-pills-buffet" role="tab" aria-controls="v-pills-buffet" aria-selected="false"><span class="mr-3 flaticon-neurology"></span> Controllo Dell’Udito</a>

              <a class="nav-link px-4" id="v-pills-fitness-tab" data-toggle="pill" href="#v-pills-fitness" role="tab" aria-controls="v-pills-fitness" aria-selected="false"><span class="mr-3 flaticon-stethoscope"></span> Intolleranza Alimentare</a>

              <a class="nav-link px-4" id="v-pills-sea-tab" data-toggle="pill" href="#v-pills-sea" role="tab" aria-controls="v-pills-sea" aria-selected="false"><span class="mr-3 flaticon-vision"></span> Misurazione Del Peso</a>

              <a class="nav-link px-4" id="v-pills-spa-tab" data-toggle="pill" href="#v-pills-spa" role="tab" aria-controls="v-pills-spa" aria-selected="false"><span class="mr-3 flaticon-ambulance"></span> Tanto Altro...</a>
            </div>
          </div>
          <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">
            
            <div class="tab-content pl-md-5" id="v-pills-tabContent">

              <div class="tab-pane fade show active py-5" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-master-tab">
                <span class="icon mb-3 d-block flaticon-cardiogram"></span>
                <br>
                <h2 class="mb-4" style="color: black">Misurazione Gratuita Della Pressione</h2>
                <p style="color: black">La misurazione della pressione arteriosa è un servizio diagnostico fondamentale che viene prestato da ogni farmacia sul territorio:
                    monitorando questo parametro si ha un quadro della salute del sistema cardiovascolare dell’individuo e si attua un’importante attività di prevenzione nei
                    confronti di pericolose patologie causate dall’ipertensione.</p>
                  <p><a href="Dashboard/AreaUtente.php" class="btn btn-primary">Prenota</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-buffet" role="tabpanel" aria-labelledby="v-pills-buffet-tab">
                <span class="icon mb-3 d-block flaticon-neurology"></span>
                <br>
                <h2 class="mb-4" style="color: black">Controllo Gratuito Dell'Udito</h2>
                <p style="color: black;">E’ una sana abitudine effettuare periodicamente il controllo dell’udito, seguendone nel tempo l’evoluzione.
                    L’indebolimento dell’udito può avere cause legate al tipo di lavoro che si svolge, all’età o all’inquinamento acustico del posto in cui si vive.</p>
                <p><a href="Dashboard/AreaUtente.php" class="btn btn-primary">Prenota</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-fitness" role="tabpanel" aria-labelledby="v-pills-fitness-tab">
                <span class="icon mb-3 d-block flaticon-stethoscope"></span>
                <br>
                <h2 class="mb-4" style="color: black">Test Gratuito Per L’Intolleranza Alimentare</h2>
                <p style="color:black;">Il test delle intolleranze alimentari in farmacia è utile per evidenziare gli alimenti incriminati e garantire una migliore qualità di vita per il paziente.
                    <br>Tra le intolleranze più comuni ci sono quelle ai latticini (come formaggi freschi o stagionati), pasta e pomodori.</p>
                <p><a href="Dashboard/AreaUtente.php" class="btn btn-primary">Prenota</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-sea" role="tabpanel" aria-labelledby="v-pills-sea-tab">
                <span class="icon mb-3 d-block flaticon-vision"></span>
                <br>
                <h2 class="mb-4" style="color: black">Misurazione Gratuita Del Peso</h2>
                <p style="color: black">Alla base di una buona salute, oltre a corrette abitudini di vita vi è sicuramente un controllo scrupoloso del peso corporeo,
                    in quanto l’obesità incide pesantemente su molte delle patologie più gravi.</p>
                <p><a href="Dashboard/AreaUtente.php" class="btn btn-primary">Prenota</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-spa" role="tabpanel" aria-labelledby="v-pills-spa-tab">
                <span class="icon mb-3 d-block flaticon-ambulance"></span>
                <br>
                <h2 class="mb-4" style="color: black">Tanto Altro...</h2>
                <p style="color: black">Questi sono solo alcuni dei tanti servizi che offriamo GRATUITAMENTE!</p>
                <p><a href="Dashboard/AreaUtente.php" class="btn btn-primary">Prenota</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_4.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Statistiche</h2>
            <span class="subheading">Ecco alcuni dettagli interessanti sulla nostra società</span>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="24">0</strong>
		                <span>Farmacie</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="20">0</strong>
		                <span>Comuni Coinvolti</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Medici</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="10">0</strong>
		                <span>Anni Esperienza</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section img" style="background-image: url(images/bg_5.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">IncoPharma</h2>
              <p>L’ Inco.Farma, si muove nel campo dei servizi qualificati alla persona attraverso una rete di multiservizi per bisogni sanitari, assistenziali e di sicurezza, in modo da garantire la presa in carico del cittadino e della famiglia.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                  <li class="ftco-animate"><a href="https://twitter.com/DrLele08"><span class="icon-twitter"></span></a></li>
                  <li class="ftco-animate"><a href="https://www.facebook.com/raffaele.sais.3"><span class="icon-facebook"></span></a></li>
                  <li class="ftco-animate"><a href="https://www.instagram.com/drlele08/"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Contatti</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $Farmacia->Indirizzo ?></span></li>
                      <li><span class="icon icon-map-marker"></span><span class="text"><?php echo $Farmacia->Citta ?></span></li>
	                <li><span class="icon icon-phone"></span><span class="text"><?php echo $Farmacia->Telefono ?></span></li>
	                <li><span class="icon icon-envelope"></span><span class="text"><?php echo $Farmacia->Email ?></span></li>
                      <li><span class="icon icon-envelope"></span><span class="text"><?php echo $Farmacia->Pec ?></span></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
             Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tutti i diritti sono riservati | Template fatto con il <i class="icon-heart" aria-hidden="true"></i> da <a href="https://saisraffaele.net" target="_blank">Sais Raffaele</a></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="wrapper fadeInDown">
            <div id="formContent">
                <!-- Tabs Titles -->

                <!-- Icon -->
                <div class="fadeIn first">
                    <h1>IncoPharma</h1>
                </div>

                <!-- Login Form -->
                <form action="script/LoginInjection.php" method="POST">
                    <input type="text" id="text_login" class="fadeIn second" name="Email" placeholder="Email">
                    <input type="password" id="text_password" class="fadeIn third" name="Pass" placeholder="Password">
                    <br>
                    <input type="submit" name="submit" class="fadeIn fourth" value="Accedi">
                </form>

                <!-- Remind Passowrd -->
                <div id="formFooter">
                    <a class="underlineHover" href="Registrazione.php">Registrati</a><br> oppure<br> <a class="underlineHover" href="PasswordDimenticata.php">Password Dimenticata?</a>
                </div>

            </div>
        </div>
    </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>