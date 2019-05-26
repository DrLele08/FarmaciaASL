<?php
    session_start();
    require_once 'funzioni.php';
    if(isset($_POST["submit"]))
    {
        $Email=$_POST["Email"];
        $Pass=$_POST["Pass"];
        $Query="SELECT * FROM Utenti WHERE Email='{$Email}' LIMIT 1";
        $Ris=doQuery($Query);
        if($Ris)
        {
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