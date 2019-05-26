<?php
?>
<html>
    <head>
        <title>Recupero Password</title>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="javascript/funzioni.js"></script>
        <link rel="stylesheet" href="css/stile.css">
    </head>
    <body>
    <div class="alert alert-success Invisibile" id="div_AlertSuccessPassDimenticata">
        <strong>Fatto!</strong> Email inviata! Controlla la tua posta elettronica.
    </div>
    <div class="alert alert-danger Invisibile" id="div_AlertErrorPassDimenticata">
        <strong>Attenzione!</strong> <a style="pointer-events: none;color: #0b0b0b;cursor: default;" id="text_DivErrorePassDim">Test</a>.
    </div>
    <div style="padding-top: 70px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div style="padding-top: 70px;">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Password Dimenticata?</h2>
                            <p>Inserisci la tua email per recuperare la tua password.</p>
                            <div class="panel-body">

                                <form id="register-form" role="form" autocomplete="off" class="form" method="POST">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="text_Email" name="Email" placeholder="Email" class="form-control"  type="email">
                                        </div>
                                    </div>
                                    <div class="form-group" style="padding-right: 40px">
                                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Resetta Password" type="button" onclick="recupera()">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function recupera()
        {
            let Email=$("#text_Email").val().trim();
            if(Email=="" || !Email.includes("@"))
            {
                $("#text_DivErrorePassDim").html("Inserisci una email valida!");
                $("#div_AlertErrorPassDimenticata").removeClass("Invisibile");
            }
            else
            {
                recoveryPass(Email);
            }
        }
    </script>
    </body>
</html>
