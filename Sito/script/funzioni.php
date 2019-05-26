<?php
    require_once 'config.php';
    function doQuery($Query)
    {
        global $Db;
        $Ris=mysqli_query($Db,$Query);
        return $Ris;
    }
    function noInjection($Stringa)
    {
        global $Db;
        return mysqli_real_escape_string($Db,$Stringa);
    }
    //Funzione Che Restituisce Informazione Di Una Farmacia Dato Un Id
    function getInfoFarmaciabyId($id)
    {
        $Query="SELECT * FROM SediFarmacie WHERE idSede={$id}";
        $Ris=doQuery($Query);
        if($Ris)
        {
            $obj=(object)[];
            while($row=mysqli_fetch_array($Ris))
            {
                $obj->Nome=$row["Nome"];
                $obj->Indirizzo=$row["Indirizzo"];
                $obj->Telefono=$row["Telefono"];
                $obj->Email=$row["Email"];
                $obj->Pec=$row["PEC"];
                $obj->Citta=$row["Citta"];
            }
            return $obj;
        }
        else
        {
            global $Db;
            echo "Errore: ".mysqli_error($Db);
        }
        return null;
    }
    //Funzione Che Restituisce Lista Farmacie
    function getInfoFarmacie()
    {
        $Query="SELECT * FROM SediFarmacie";
        $Ris=doQuery($Query);
        $Vett=array();
        if($Ris)
        {
            while($row=mysqli_fetch_array($Ris))
            {
                array_push($Vett,$row);
            }
            return $Ris;
        }
        return null;
    }
    //Funzione Che Restituisce Vettore Utente
    function getInfoUtentebyId($idUt)
    {
        $Query="SELECT * FROM Utenti WHERE CF='{$idUt}'";
        $Ris=doQuery($Query);
        if($Ris)
        {
            while($row=mysqli_fetch_array($Ris))
            {
                return $row;
            }
        }
        return null;
    }