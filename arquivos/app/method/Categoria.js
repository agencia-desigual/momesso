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
    string = Global.limparString(string);

    // Adiciona ao campo slug
    document.getElementById("slug").value = string;

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
            var url = Global.config.url + "categoria/delete/" + id;

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


// Retorno para os demais arquivos
export default (() => {

    return null;

})();