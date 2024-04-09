$(document).ready(function() {
    function enviarRequisicao() {
        $.ajax({
            url: "http://localhost:444/lib/chamada.php",
            type: "GET",
            success: function(data) {
                console.log(data);       
                
                // Limpar o conteúdo antes de adicionar os novos elementos
                $('#cartoes').empty();
                
                // Contadores para cada status
                let disponivel = 0;
                let ocupado = 0;
                let indisponivel = 0;
                let chamando = 0;

                for (let i in data) {
                    // Incrementar os contadores com base no status de cada ramal
                    switch(data[i].status) {
                        case 'disponivel':
                            disponivel++;
                            break;
                        case 'ocupado':
                            ocupado++;
                            break;
                        case 'indisponivel':
                            indisponivel++;
                            break;
                        case 'chamando':
                            chamando++;
                            break;
                    }

                    // Adicionar cartões de ramal conforme o status
                    if(data[i].status == 'indisponivel') {
                        $('#cartoes').append(`<div class="carta0_off">
                                                <div>${data[i].nome}</div>
                                                <span class="${data[i].status} icone-posicao"></span>
                                            </div>`);
                    } else {
                        $('#cartoes').append(`<div class="cartao">
                                                <div>${data[i].nome}</div>
                                                <span class="${data[i].status} icone-posicao"></span>
                                            </div>`);
                    }
                }

                
                const dataHora = new Date().toLocaleString();
                $('#horario').text(`Última requisição: ${dataHora}`);
                
                
                $('#cardTotais').html(`<div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Informações sobre Status</h5>
                                                <p class="card-text">Disponível: ${disponivel}</p>
                                                <p class="card-text">Ocupado: ${ocupado}</p>
                                                <p class="card-text">Indisponível: ${indisponivel}</p>
                                                <p class="card-text">Chamando: ${chamando}</p>
                                            </div>
                                        </div>`);

                
                const cardMensagem = $('#cardMensagem');
                cardMensagem.html(`<div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Mensagem da Requisição</h5>
                                            <p class="card-text">Requisição feita com sucesso!</p>
                                            <p class="card-text">Horário da última requisição: ${dataHora}</p>
                                        </div>
                                    </div>`);
                cardMensagem.fadeIn(500).fadeOut(500).fadeIn(500).fadeOut(500).fadeIn(500);
            },
            error: function(xhr, status, error) {
                console.error(status, error);
            }
        });
    }

    // Enviar a primeira requisição assim que a página carregar
    enviarRequisicao();

    // Configurar intervalo para enviar a requisição a cada 10 segundos
    setInterval(enviarRequisicao, 10000);
});
