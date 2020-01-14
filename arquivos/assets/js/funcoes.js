var Dados = {
    'url': "http://localhost/git/momesso/"
}


/*
==================================================
                FORMULARIO CONTATO
==================================================
*/
$("#formContato").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);

    document.getElementById("btnContato").disabled = true;
    document.getElementById("btnContato").innerHTML = "ENVIANDO, AGUARDE...";

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: Dados.url + 'ajax-contato',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {

            if(data.tipo == true){
                console.log(data);
                Swal.fire({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.mensagem,
                })
                document.getElementById("formContato").reset();
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Erro...',
                    text: data.mensagem,
                })
            }
            document.getElementById("btnContato").disabled = false;
            document.getElementById("btnContato").innerHTML = "ENVIAR";

        },
        error: function (data) {
            Swal.fire({
                type: 'error',
                title: 'Erro...',
                text: data.mensagem,
            })
            document.getElementById("btnContato").disabled = false;
            document.getElementById("btnContato").innerHTML = "ENVIAR";
        }

    });

    return false;
});


/*
==================================================
                FORMULARIO DOWNLOAD
==================================================
*/
$("#usuarioDownload").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);

    document.getElementById("btnEnviar").disabled = true;
    document.getElementById("btnEnviar").innerHTML = "ENVIANDO, AGUARDE...";

    $.ajax({
        type: "POST",
        dataType: 'json',
        url: Dados.url + 'ajax-download',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {

            if(data.tipo == true){
                console.log(data);
                Swal.fire({
                    type: 'success',
                    title: 'Sucesso',
                    text: data.mensagem,
                })
                document.getElementById("usuarioDownload").reset();


                setTimeout(() => {

                    window.open(
                        data.objeto.link,
                        '_blank' // <- This is what makes it open in a new window.
                    );

                }, 2000);

            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Erro...',
                    text: data.mensagem,
                })
            }
            document.getElementById("btnEnviar").disabled = false;
            document.getElementById("btnEnviar").innerHTML = "ENVIAR";

        },
        error: function (data) {
            Swal.fire({
                type: 'error',
                title: 'Erro...',
                text: data.mensagem,
            })
            document.getElementById("btnEnviar").disabled = false;
            document.getElementById("btnEnviar").innerHTML = "ENVIAR";
        }

    });

    return false;
});

function menu(tipo)
{
    if(tipo === "abre")
    {
        $(".sidebar-menu-mobile").css("left","0px");
        $(".fundo-menu").fadeIn();
    }
    else
    {
        $(".sidebar-menu-mobile").css("left","-250px");
        $(".fundo-menu").fadeOut();
    }
}

$('#abreEmpresa').click(function () {

    $('.submenu-empresa').css("display","block");
    $('.submenu-produtos').css("display","none");

});

$('#abreProduto').click(function () {

    $('.submenu-produtos').css("display","block");
    $('.submenu-empresa').css("display","none");

});

$('#tipoJuridico').click(function () {

    $('.cpf').val('');

    $('#tipoFisico').removeClass('tipo-form-ativo');
    $('#hrFisico').removeClass('hr-tipo-form-ativo');

    $('#tipoJuridico').addClass("tipo-form-ativo");
    $('#hrJurudico').addClass("hr-tipo-form-ativo");

    $('#tipoCNPJ').css('display','block');
    $('#tipoCPF').css('display','none');

});

$('#tipoFisico').click(function () {

    $('.cnpj').val('');

    $('#tipoJuridico').removeClass('tipo-form-ativo');
    $('#hrJurudico').removeClass('hr-tipo-form-ativo');

    $('#tipoFisico').addClass("tipo-form-ativo");
    $('#hrFisico').addClass("hr-tipo-form-ativo");

    $('#tipoCNPJ').css('display','none');
    $('#tipoCPF').css('display','block');

});

$("#menu-empresa").hover(function(){
    $('.sub-menu-empresa').css("display", "block");
}, function(){
   setTimeout(function () {
       $('.sub-menu-empresa').css("display", "none");
   },2000)
});

$(".sub-menu-empresa").hover(function(){
    $('.sub-menu-empresa').css("display", "block");
}, function(){
    setTimeout(function () {
        $('.sub-menu-empresa').css("display", "none");
    },2000)
});

var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

$('.mascara-tel-cel').mask(SPMaskBehavior, spOptions);

$('.cnpj').mask("00.000.000/0000-00");
$('.cpf').mask("000.000.000-00");