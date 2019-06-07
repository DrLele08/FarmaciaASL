<?php
    require_once '../script/funzioni.php';
    $idFarm=$_POST["idFarm"];
    $idMed=$_POST["idMed"];
    $idServ=$_POST["idServ"];
    $Data=$_POST["Data"];
    $Ora=$_POST["Ora"];
    $obg=(object)[];
    $Trovato=false;
    $Query="SELECT * FROM Prenotazioni WHERE ksFarmacia={$idFarm} AND Data='{$Data}' AND Orario='{$Ora}'";
    $Ris=doQuery($Query);
    if($Ris)
    {
        $n=mysqli_num_rows($Ris);
        if($n>0)
        {
            $Trovato=true;
            $obg->Ris=0;
            $obg->Mess="Orario occupato!";
        }
    }
    else
    {
        global $Db;
        $Err=mysqli_error($Db);
        $obg->Ris=0;
        $obg->Mess="Errore: ".$Err;
        echo json_encode($obg);
        return;
    }
    if(!$Trovato)
    {
        $Query="INSERT INTO Prenotazioni(ksServizio,ksFarmacia,ksMedico,Data,Orario) VALUES({$idServ},{$idFarm},'{$idMed}','{$Data}','{$Ora}')";
        $Ris=doQuery($Query);
        if($Ris)
        {
            $obg->Ris=1;
            $obg->Mess="Prenotazione aggiunta con successo!";
        }
        else
        {
            global $Db;
            $Err=mysqli_error($Db);
            $obg->Ris=0;
            $obg->Mess="Errore: ".$Err;
        }
    }
    echo json_encode($obg);