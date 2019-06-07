var VettVisite=[];
function recoveryPass(Email)
{
    alert('Ancora in corso');
}
function getServiziByFarmaciaAndData(idFarma,Data)
{
    let request=$.ajax({
        url:'../api/getServiziFarmacia.php',
        type:'POST',
        data:
            {
                idFarma:idFarma,
                Data:Data
            }
    });
    request.done(function (data)
    {
        let json=$.parseJSON(data);
        var esistono=true;
        let selectServizio=$("#select_ServizioFarmacia");
        var isFirst=true;
        var Inseriti=[];
        selectServizio.empty();
        VettVisite=[];
        $.each(json,function (key,value)
        {
            if(value.Ris==0)
            {
                alert("Nessun servizio disponibile nel giorno: "+Data);
                esistono=false;
                if(!$("#DivUtenteSceglieServizio").hasClass("Invisibile"))
                {
                    $("#DivUtenteSceglieServizio").addClass("Invisibile");
                }
            }
            else
            {
                let Tipo=value.Tipo;
                let idTipo=value.idTipo;
                let Ora=value.Orario;
                let obj={'Tipo':Tipo,'Ora':Ora,'id':idTipo,'idPreno':value.idPreno};
                VettVisite.push(obj);
                if(isFirst)
                {
                    isFirst=false;
                    selectServizio.append($('<option>', {
                        value: -1,
                        text: 'Selezionare un servizio'
                    }));
                }
                if(!Inseriti.includes(Tipo))
                {
                    Inseriti.push(Tipo);
                    selectServizio.append($('<option>', {
                        value: idTipo,
                        text: Tipo
                    }));
                }
            }
        });
        if(esistono)
        {
            $("#DivUtenteSceglieServizio").removeClass("Invisibile");
        }
    });
}
function getInfoOrari(selectOra,idServ)
{
    $("#select_OrarioServizioFarmacia").empty();
    selectOra.append($('<option>', {
        value: '-1',
        text: 'Scegli un orario...'
    }));
    for(i=0;i<VettVisite.length;i++)
    {
        if(VettVisite[i].id==idServ)
        {
            selectOra.append($('<option>', {
                value: ''+VettVisite[i].idPreno,
                text: ''+VettVisite[i].Ora
            }));
        }
    }
    $("#DivUtenteSceglieOrario").removeClass("Invisibile");
}
function EffettuaPreno(idPreno,idPersona,Email)
{
    let req=$.ajax({
        url:'../api/addPreno.php',
        type:'POST',
        data:
            {
                idUt:idPersona,
                idPreno:idPreno,
                Email:Email
            }
    });
    req.done(function (data)
    {
       let json=JSON.parse(data);
       if(json.Ris==1)
       {
           $('#modal-prenodone').modal('show');
       }
       else
       {
           alert("Errore, prova più tardi!");
       }
    });
}
function getInfoPreno(idMed,Data)
{
    let req=$.ajax({
        url:'../api/getPrenoMedicobyData.php',
        type:'POST',
        data:
            {
                idMed:idMed,
                Data:Data
            }
    });
    req.done(function (data)
    {
        let json=JSON.parse(data);
        let tabella=$("#table_Admin");
        var Fatto=false;
        var htmlFin="";
        $.each(json,function (key,value)
        {
            if(value.Ris==-1)
            {
                alert("Errore, prova più tardi");
            }
            else if(value.Ris==0)
            {
                alert("Nessuna prenotazione in quel giorno")
            }
            else
            {
                Fatto=true;
                let Cognome=value.Cognome;
                let Nome=value.NomeUt;
                let NomeFarmacia=value.Farmacia;
                let Foto=value.Foto;
                let DataOra=Data+"/"+value.Orario;
                let Generalita=Cognome+" "+Nome;
                let Esito=value.Esito;
                var bg="bg-success";
                var Testo="Finita";
                if(Esito=="N/D")
                {
                    bg="bg-danger";
                    Testo="In corso...";
                }
                htmlFin+="                                            <tr>\n" +
                    "                                                <th scope=\"row\">\n" +
                    "                                                    <div class=\"media align-items-center\">\n" +
                    "                                                        <a href=\"#\" class=\"avatar rounded-circle mr-3\">\n" +
                    "                                                            <img alt=\"Image placeholder\" src=\"../"+Foto+"\">\n" +
                    "                                                        </a>\n" +
                    "                                                        <div class=\"media-body\">\n" +
                    "                                                            <span class=\"mb-0 text-sm\">"+NomeFarmacia+"</span>\n" +
                    "                                                        </div>\n" +
                    "                                                    </div>\n" +
                    "                                                </th>\n" +
                    "                                                <td>\n" +
                    "                                                   "+DataOra+"\n" +
                    "                                                </td>\n" +
                    "                                                <td>\n" +
                    "                                                    <span class=\"badge badge-dot mr-4\">\n" +
                    "                                                      <i class=\""+bg+"\"></i> "+Testo+"\n" +
                    "                                                    </span>\n" +
                    "                                                </td>\n" +
                    "                                                <td>\n" +
                    "                                                    <div class=\"avatar-group\">\n" +Generalita+
                    "                                                    </div>\n" +
                    "\n" +
                    "                                                </td>\n" +
                    "                                                <td>\n" +
                    "                                                    <div class=\"d-flex align-items-center\">\n" +
                    "                                                        <span class=\"mr-2\">"+Esito+"</span>\n" +
                    "                                                    </div>\n" +
                    "                                                </td>\n" +
                    "                                                <td class=\"text-right\">\n" +
                    "                                                    <div class=\"dropdown\">\n" +
                    "                                                        <a class=\"btn btn-sm btn-icon-only text-light\" href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n" +
                    "                                                            <i class=\"fas fa-ellipsis-v\"></i>\n" +
                    "                                                        </a>\n" +
                    "                                                        <div class=\"dropdown-menu dropdown-menu-right dropdown-menu-arrow\">\n" +
                    "                                                            <a class=\"dropdown-item\" href=\"#\">Visita Effettuata</a>\n" +
                    "                                                            <a class=\"dropdown-item\" href=\"#\">Paziente Assente</a>\n" +
                    "                                                            <a class=\"dropdown-item\" href=\"#\">Elimina Visita</a>\n" +
                    "                                                        </div>\n" +
                    "                                                    </div>\n" +
                    "                                                </td>\n" +
                    "                                            </tr>";
            }
        });
        if(Fatto)
        {
            tabella.html(htmlFin);
        }
    })
}
function AddDispPreno(idServ,idFarm,idMed,Data,Ora)
{
    let req=$.ajax({
        url:'../api/AddDispPreno.php',
        type:'POST',
        data:
            {
                idServ:idServ,
                idMed:idMed,
                idFarm:idFarm,
                Data:Data,
                Ora:Ora
            }
    });
    req.done(function (data)
    {
        let json=JSON.parse(data);
        let Mess=json.Mess;
        alert(Mess);
    });
}