
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

    $('#tipoFisico').removeClass('tipo-form-ativo');
    $('#hrFisico').removeClass('hr-tipo-form-ativo');

    $('#tipoJuridico').addClass("tipo-form-ativo");
    $('#hrJurudico').addClass("hr-tipo-form-ativo");

    $('#tipoCNPJ').css('display','block');
    $('#tipoCPF').css('display','none');

});

$('#tipoFisico').click(function () {

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