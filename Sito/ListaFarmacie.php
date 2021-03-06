<?php
    session_start();
    require_once 'script/funzioni.php';
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <title>Lista Farmacie</title>
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
  </head>
  <body>
  <?php
      if(isset($_GET["Esci"]))
      {
          $Esci=$_GET["Esci"];
          if($Esci==1)
          {
              $_SESSION["idUt"]=null;
              echo "<div class=\"alert alert-success\">
                     <strong>Fatto!</strong> Sei uscito correttamente!
                     </div>";
          }
      }
      if(isset($_GET["Err"]))
      {
          $Err=$_GET["Err"];
          switch($Err)
          {
              case '1':
                  {
                      echo "<div class=\"alert alert-danger\">
                     <strong>Errore!</strong> Dati errati!
                     </div>";
                      break;
                  }
              case '2':
                  {
                      echo "<div class=\"alert alert-danger\">
                     <strong>Errore!</strong> Non hai i permessi, Effettua il login!
                     </div>";
                      break;
                  }
          }
      }
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="flaticon-pharmacy"></i><span>Inco</span>Farma</a>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Lista Farmacie</span></p>
            <h1 class="mb-3 bread">Farmacie</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row d-flex">
                <?php
                    $VettFarmacie=getInfoFarmacie();
                    foreach($VettFarmacie as $Tmp)
                    {
                        $idSede=$Tmp["idSede"];
                        $Nome=$Tmp["Nome"];
                        $Indirizzo=$Tmp["Indirizzo"];
                        $Citta=$Tmp["Citta"];
                        $Foto=$Tmp["FotoPrincipale"];
                        $Html=<<<String
                        <div class="col-lg-6 d-flex ftco-animate">
    				        <div class="dept d-md-flex">
    					        <a href="index.php?idFarmacia={$idSede}" class="img" style="background-image: url({$Foto});"></a>
    					            <div class="text p-4">
                                        <h3><a href="index.php?idFarmacia={$idSede}">{$Nome}</a></h3>
                                        <p><span class="loc">{$Indirizzo}</span></p>
                                        <p><span class="doc">{$Citta}</span></p>
                                        <p>L’ Inco.Farma, si muove nel campo dei servizi qualificati alla persona attraverso una rete di multiservizi per bisogni sanitari, assistenziali e di sicurezza, in modo da garantire la presa in carico del cittadino e della famiglia.</p>
                                        <ul>
                                            <li><span class="ion-ios-checkmark"></span>Prenota Visite</li>
                                            <li><span class="ion-ios-checkmark"></span>Acquista Prodotti</li>
                                            <li><span class="ion-ios-checkmark"></span>Misura Il Tuo Peso</li>
                                        </ul>
    					            </div>
    				        </div>
    			        </div>
String;
                        echo $Html;
                    }
                ?>
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
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tutti i diritti sono riservati | Template fatto con il <i class="icon-heart" aria-hidden="true"></i> da <a href="https://saisraffaele.net" target="_blank">Sais Raffaele</a></p>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </form>
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
  <script src="js/main.js"></script>
    
  </body>
</html>