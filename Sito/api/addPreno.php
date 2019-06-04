<?php
    require_once '../script/funzioni.php';
    $idPreno=$_POST["idPreno"];
    $idUt=$_POST["idUt"];
    $Email=$_POST["Email"];
    $Query="UPDATE Prenotazioni SET ksPersona='{$idUt}' WHERE idPreno={$idPreno}";
    $Ris=doQuery($Query);
    $json=(object)[];
    if($Ris)
    {
        $json->Ris=1;
        $Query="SELECT * FROM Prenotazioni WHERE idPreno={$idPreno} LIMIT 1";
        $Ris2=doQuery($Query);
        if($Ris)
        {
            while($row=mysqli_fetch_array($Ris2))
            {
                $Mess="La tua prenotazione è stata effettuata il {$row['Data']} alle {$row['Orario']}";
                mail($Email,"Prenotazione Farmacia",$Mess);
            }
        }
    }
    else
    {
        $json->Ris=0;
    }
    echo json_encode($json);