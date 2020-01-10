import Global from "../global.js"

/**
 * Método responsável por limpar o input nome e
 * adicionar ao input slug, para criação da
 * url amigavel.
 */
$('#campoNome').on('keyup', function() {

    // Pega o conteudo do campo nome
    var string = document.getElementById("campoNome").value;

    // Limpa a string
    Global.limparString(string).then((result) => {

        // Adiciona ao campo slug
        document.getElementById("slug").value = result;
    });
});



/**
 * Método responsável por enviar uma solicitação de
 * exclusão de uma determinada categoria.
 * Em caso de sucesso a linha será deletada da tabela
 * na view.
 */
$(".deletar").on("click", function () {

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
            var url = Global.config.url + "produto/delete/" + id;

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
 * Método responsável por enviar uma solicitação
 * de adição de um nova categoria.
 */
$("#formInsert").on("submit", function(){

    // Não atualiza
    event.preventDefault();

    // Bloqueia o botão
    $("#btnSalva").prop("disabled", true);

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Pega o slug
    var slug = form.get("slug");

    // Para garantir que não vai ter problema, limpa
    Global.limparString(slug).then((result) => {

        // Add o slug
        form.set("slug", result);

        // Url
        var url = Global.config.url + "produto/insert";

        // Faz a requisição
        Global.enviaApi("POST", url, form).then((data) => {

            // Avisa que deu certo
            Global.setSuccess(data.mensagem);

            // Redireciona o usuário para a página do produto
            setTimeout(() => {
                location.href = Global.config.url + "painel/produtos/" + data.objeto.id_produto;
            }, 1500);
        });

        // Desbloqueia o botão
        $("#btnSalva").prop("disabled", false);

    });

    // Não carrega mesmo
    return false;
});



/**
 * Método responsável por enviar uma solicitação
 * de alteração de um categoria existente.
 */
$("#formAltera").on("submit", function(){

    // Não atualiza
    event.preventDefault();

    // Bloqueia o botão
    $("#btnAltera").prop("disabled", true);

    // Recupera os dados do formulário
    var form = new FormData(this);

    // Pega o slug
    var slug = form.get("slug");

    // Para garantir que não vai ter problema, limpa
    Global.limparString(slug).then((result) => {

        // Add o slug
        form.set("slug", result);

        // Url
        var url = Global.config.url + "produto/update/" + $(this).data("id");

        // Faz a requisição
        Global.enviaApi("POST", url, form).then((data) => {

            // Avisa que deu certo
            Global.setSuccess(data.mensagem);
        });

        // Desbloqueia o botão
        $("#btnAltera").prop("disabled", false);

    });

    // Não carrega mesmo
    return false;
});


// Retorno para os demais arquivos
export default (() => {

    return null;

})();