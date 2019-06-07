<?php
    require_once '../script/funzioni.php';
    $idMed=$_POST["idMed"];
    $Data=$_POST["Data"];
    $Query="SELECT Prenotazioni.idPreno,Prenotazioni.Data,Prenotazioni.Orario,IFNULL(Prenotazioni.Esito,'N/D') AS Esito,UtentiF.Cognome,UtentiF.Nome AS NomeUt,SediFarmacie.Nome AS NomeFarma,Servizi.Tipo,SediFarmacie.FotoPrincipale
		    FROM Prenotazioni,UtentiF,SediFarmacie,Servizi
        	WHERE Prenotazioni.ksServizio=Servizi.idServizio
            AND Prenotazioni.ksFarmacia=SediFarmacie.idSede
            AND Prenotazioni.ksPersona=UtentiF.CF
            AND Prenotazioni.ksMedico='{$idMed}'
            AND Prenotazioni.Data='{$Data}'";
    $Ris=doQuery($Query);
    $Vett=array();
    if($Ris)
    {
        if(mysqli_num_rows($Ris)>0)
        {
            while($row=mysqli_fetch_array($Ris))
            {
                $idPreno=$row["idPreno"];
                $Orario=$row["Orario"];
                $CognomeUt=$row["Cognome"];
                $NomeUt=$row["NomeUt"];
                $Farmacia=$row["NomeFarma"];
                $TipoServ=$row["Tipo"];
                $Foto=$row["FotoPrincipale"];
                $Esito=$row["Esito"];
                $Tmp=(object)[];
                $Tmp->Ris=1;
                $Tmp->idPreno=$idPreno;
                $Tmp->Data=$Data;
                $Tmp->Orario=$Orario;
                $Tmp->Esito=$Esito;
                $Tmp->NomeUt=$NomeUt;
                $Tmp->Cognome=$CognomeUt;
                $Tmp->Farmacia=$Farmacia;
                $Tmp->TipoServ=$TipoServ;
                $Tmp->Foto=$Foto;
                array_push($Vett,$Tmp);
            }
        }
        else
        {
            $tmp=(object)[];
            $tmp->Ris=0;
            array_push($Vett,$tmp);
        }
    }
    else
    {
        $tmp=(object)[];
        $tmp->Ris=-1;
        array_push($Vett,$tmp);
    }
    echo json_encode($Vett);