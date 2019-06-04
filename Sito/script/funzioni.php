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
                $obj->FotoPrincipale=$row["FotoPrincipale"];
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
        $Query="SELECT * FROM SediFarmacie ORDER BY SediFarmacie.Nome";
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
        $Query="SELECT * FROM UtentiF WHERE CF='{$idUt}'";
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
    //Funzione Che Restituisce Vettore Prenotazione Persone
    function getPrenotazioneUtbyId($idUt)
    {
        $Query="SELECT * FROM Prenotazioni WHERE ksPersona='{$idUt}'";
        $Ris=doQuery($Query);
        if($Ris)
        {
            $Vett=array();
            while($row=mysqli_fetch_row($Ris))
            {
                array_push($Vett,$row);
            }
            return $Vett;
        }
        return null;
    }
    //Funzione che ritorna il nome del servizio
    function getServiziobyId($id)
    {
        $Query="SELECT * FROM Servizi WHERE idServizio={$id}";
        $Ris=doQuery($Query);
        if($Ris)
        {
            while($row=mysqli_fetch_array($Ris))
            {
                return $row["Tipo"];
            }
        }
        return "N/D";
    }