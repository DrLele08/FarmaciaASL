<?php
    session_start();
    require_once 'funzioni.php';
    if(isset($_POST["submit"]))
    {
        $Email=$_POST["Email"];
        $Pass=$_POST["Pass"];
        $Query="SELECT * FROM UtentiF WHERE Email='{$Email}' LIMIT 1";
        $Ris=doQuery($Query);
        if($Ris)
        {
            if(mysqli_num_rows($Ris)==0)
            {
                header("Location: ../ListaFarmacie.php?Err=1");
            }
            while($row=mysqli_fetch_array($Ris))
            {
                $PassDb=$row["Password"];
                if(password_verify($Pass,$PassDb))
                {
                    $idFarma=$row["ksFarmaciaPreferita"];
                    $_SESSION["idUt"]=$row["CF"];
                    header("Location: ../index.php?idFarmacia=".$idFarma);
                }
            }
        }
    }
    else
    {
        header("Location: ../404.html");
    }