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