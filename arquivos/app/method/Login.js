import Global from "../global.js"


/***
 * Ação responsável por receber os dados do formulário
 * e realizar o login do usuário.
 */
$("#formLogin").on("submit", function(){

    // Não carrega
    event.preventDefault();

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Bloqueia o Botão
    $("#btnLogin").attr("disabled",true);

    // Url
    var url = Global.config.url + "login";

    // Faz o login
    Global.enviaApi("POST", url, form).then(function (data) {

        // Sucesso
        Global.setSuccess(data.mensagem);

        // Espera passar
        setTimeout(() => {

            // Redireciona
            location.href = Global.config.url + "painel";

        }, 1500);

    });

    // Desbloqueia o Botão
    $("#btnLogin").attr("disabled",false);

    // Não carrega mesmo
    return false;
});



// Retorno para os demais arquivos
export default (() => {

    return null;

})();