<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Inscrição de Time</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            color: #28a745;
            margin-bottom: 20px;
        }

        input {
            padding: 5px;
            border-radius: 5px;
        }

        label {
            font-size: 1rem;
        }

        .form-label {
            color: #343a40;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .collapse-header {
            cursor: pointer;
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .collapse-header:hover {
            background-color: #218838;
        }

        .jogador-label {
            display: flex;
            align-items: center;
        }

        .jogador-label i {
            margin-right: 10px;
            color: #28a745;
        }

        .declaracao,
        .dadosCamp,
        .dadosTime,
        .dadosResp {
            padding: 20px;
            gap: 5px;
            margin-top: 10px;
        }

        .botao {
            display: block; /* Torna o botão um bloco */
            margin: 20px auto; /* Centraliza com margens automáticas */
            font-size: 1rem;
            text-transform: capitalize;
            font-weight: bold;
        }

        .declaracao h5
        .dadosTime h5,
        .dadosResp h5,
        .jogadores h5 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-transform: capitalize;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 style="text-align: center;" class="text-center"><i class="fas fa-futbol"></i> Inscrição para o Campeonato Amador</h2>
        <form action="{{ route('timeCadastrar') }}" method="POST">
            @csrf
            <div class="dadosCamp">
                <div class="form-group">
                    <label for="campeonato" class="form-label">Nome do Campeonato:</label>
                    <input type="text" class="form-control" id="campeonato" name="campeonato" value="Soccer TM" disabled>
                </div>

                <div class="form-group">
                    <label for="data_inscricao" class="form-label">Data da Inscrição:</label>
                    <input type="date" class="form-control" id="data_inscricao" name="data_inscricao" required>
                </div>
            </div>

            <div class="dadosTime">
                <h5>Dados do Time</h5>
                <div class="form-group">
                    <label for="nome_time" class="form-label">Nome do Time:</label>
                    <input type="text" class="form-control" id="nome_time" name="nome_time" required>
                </div>

                <div class="form-group">
                    <label for="cores_time" class="form-label">Cores do Uniforme:</label>
                    <input type="text" class="form-control" id="cores_time" name="cores_time" required>
                </div>

                <div class="form-group">
                    <label for="categoria_time" class="form-label">Categoria:</label>
                    <select class="form-select" id="categoria_time" name="categoria_time" required>
                        <option value="adulto">Adulto</option>
                        <option value="sub20">Sub-20</option>
                        <option value="sub17">Sub-17</option>
                        <option value="outros">Outros</option>
                    </select>
                </div>
            </div>

            <div class="dadosResp">
                <h5>Dados do Responsável</h5>
                <div class="form-group">
                    <label for="nome_responsavel" class="form-label">Nome Completo:</label>
                    <input type="text" class="form-control" id="nome_responsavel" name="nome_responsavel" required>
                </div>

                <div class="form-group">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>


            <div class="jogadores">
                <h5>Lista de Jogadores</h5>
                <div class="accordion" id="accordionExample">
                    @for ($i = 1; $i <= 7; $i++)
                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button @if($i > 1) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="{{ $i == 1 ? 'true' : 'false' }}" aria-controls="collapse{{ $i }}">
                                Jogador {{ $i }}
                            </button>
                        </h2>
                        <div id="collapse{{ $i }}" class="accordion-collapse collapse @if($i == 1) show @endif" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="form-group">
                                    <label for="jogador_nome{{ $i }}" class="form-label">Nome do Jogador:</label>
                                    <input type="text" class="form-control" id="jogador_nome{{ $i }}" name="jogador_nome[]" required>
                                </div>
                                <div class="form-group">
                                    <label for="jogador_nascimento{{ $i }}" class="form-label">Data de Nascimento:</label>
                                    <input type="date" class="form-control" id="jogador_nascimento{{ $i }}" name="jogador_nascimento[]" required>
                                </div>
                                <div class="form-group">
                                    <label for="jogador_posicao{{ $i }}" class="form-label">Posição:</label>
                                    <input type="text" class="form-control" id="jogador_posicao{{ $i }}" name="jogador_posicao[]" required>
                                </div>
                            </div>
                        </div>
                </div>
                @endfor
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTecnicos" aria-expanded="false" aria-controls="collapseTecnicos">
                            Comissão Técnica
                        </button>
                    </h2>
                    <div id="collapseTecnicos" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="form-group">
                                <label for="nome_tecnico" class="form-label">Técnico:</label>
                                <input type="text" class="form-control" id="nome_tecnico" name="nome_tecnico" required>
                            </div>
                            <div class="form-group">
                                <label for="aux_tecnico" class="form-label">Auxiliar Técnico:</label>
                                <input type="text" class="form-control" id="aux_tecnico" name="aux_tecnico" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="declaracao">
                <h5>Termo de Compromisso</h5>
                <div class="form-group">
                    <label for="declaracao" class="form-label">Declaração:</label>
                    <input type="text" class="form-control" id="declaracao" name="declaracao" required placeholder="Digite seu nome para declarar.">
                </div>
            </div>

            <button type="submit" class="botao btn btn-success btn-block">Enviar Inscrição</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


</body>

</html>