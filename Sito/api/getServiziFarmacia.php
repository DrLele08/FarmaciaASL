<?php
    require_once '../script/funzioni.php';
    $idFarma=$_POST["idFarma"];
    $Data=$_POST["Data"];
    $Query="SELECT Servizi.Tipo,Prenotazioni.Orario,Servizi.idServizio ,Prenotazioni.idPreno
            FROM Servizi,Prenotazioni,SediFarmacie
                WHERE Servizi.idServizio=Prenotazioni.ksServizio
                AND Prenotazioni.ksFarmacia=SediFarmacie.idSede
                AND Prenotazioni.ksPersona IS NULL
                AND Prenotazioni.ksFarmacia={$idFarma}
                AND Prenotazioni.Data='{$Data}'
                ORDER BY Prenotazioni.Orario";
    $Ris=doQuery($Query);
    $Vett=array();
    if($Ris)
    {
        if(mysqli_num_rows($Ris)>0)
        {
            while($row=mysqli_fetch_array($Ris))
            {
                $obj=(object)[];
                $obj->Ris=1;
                $obj->Tipo=$row["Tipo"];
                $obj->idTipo=$row["idServizio"];
                $obj->Orario=$row["Orario"];
                $obj->idPreno=$row["idPreno"];
                array_push($Vett,$obj);
            }
        }
        else
        {
            $obj=(object)[];
            $obj->Ris=0;
            array_push($Vett,$obj);
        }
    }
    else
    {
        $obj=(object)[];
        $obj->Ris=-1;
        array_push($Vett,$obj);
    }
    echo json_encode($Vett);