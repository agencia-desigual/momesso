import Global from "../global.js"


/**
 * Método responsável por enviar uma solicitação de
 * exclusão de uma determinada categoria.
 * Em caso de sucesso a linha será deletada da tabela
 * na view.
 */
$(".deletarImagem").on("click", function () {

    // Não carrega a página
    event.preventDefault();

    // Recupera o id
    var id = $(this).data("id");

    // Verifica se deseja realmente deletar
    Swal.fire({
        title: 'Deseja Deletar?',
        text: "Caso esse item seja deletado não terá como desfazer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sim, delete!'
    }).then((result) => {
        if (result.value)
        {
            // Monta a url
            var url = Global.config.url + "imagem/delete/" + id;

            // Envia a requisição
            Global.enviaApi("DELETE", url, null).then((data) => {

                // Avisa que deu certo
                Global.setSuccess(data.mensagem);

                // Remove o registro da tabela
                Global.config.table.row("#tb_" + id).remove().draw(false);
            });
        }
    });

    // Não carrega mesmo
    return false;
});



/**
 * Método responsável por enviar uma solicitação de
 * alteração de capa.
 */
$(".addCapa").on("click", function () {

    // Não carrega a página
    event.preventDefault();

    // Recupera o id
    var id = $(this).data("id");

    // Verifica se deseja realmente deletar
    Swal.fire({
        title: 'Alterar Capa.',
        text: "Realmente deseja que essa imagem seja a capa?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sim, Altere!'
    }).then((result) => {
        if (result.value)
        {
            // Monta a url
            var url = Global.config.url + "imagem/update/" + id;

            // Envia a requisição
            Global.enviaApi("POST", url, null).then((data) => {

                // Avisa que deu certo
                Global.setSuccess(data.mensagem);

                // Atualiza a pagina
                setTimeout(() => {
                    location.reload();
                }, 1500);
            });
        }
    });

    // Não carrega mesmo
    return false;
});



/**
 * Método responsável por enviar uma solicitação
 * de adição de um nova categoria.
 */
$("#formInsertImagem").on("submit", function(){

    // Não atualiza
    event.preventDefault();

    // Bloqueia o botão
    $("#btnSalva").prop("disabled", true);

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Url
    var url = Global.config.url + "imagem/insert/" + $("#formInsertImagem").data("id");

    // Faz a requisição
    Global.enviaApi("POST", url, form).then((data) => {

        // Avisa que deu certo
        Global.setSuccess(data.mensagem);

        // Redireciona o usuário para a página do produto
        setTimeout(() => {
            location.reload();
        }, 1500);
    });

    // Desbloqueia o botão
    $("#btnSalva").prop("disabled", false);

    // Não carrega mesmo
    return false;
});




// Retorno para os demais arquivos
export default (() => {

    return null;

})();