<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monitoramento.css">
    <title>Monitoramento de Ramais</title>
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <h2 class="navbar-brand mb-0 mx-auto">Listagem de Ramais e Membros</h2>
        <button class="btn btn" type="button" onclick="window.location.href='../index.html';">Voltar</button>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-white-bg">
                <thead>
                    <tr>
                        <th>Name/Username</th>
                        <th>Host</th>
                        <th>Port</th>
                        <th>Status</th>
                        <th>GC Status</th>
                        <th>Calls Taken</th>
                        <th>Last Call Time</th>
                        <th>Member Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'ConexaoBanco.php';

                    // Criando uma instância da classe de conexão com o banco de dados
                    $conexao = new ConexaoBanco();
                    $conn = $conexao->conectar();

                    // Selecionar as informações correlacionadas das tabelas ramais e gcallcenter
                    $sql = "SELECT ramais.name_username,
                                   ramais.host,
                                   ramais.dyn,
                                   ramais.nat,
                                   ramais.acl,
                                   ramais.port,
                                   ramais.status,
                                   gcallcenter.penalty,
                                   gcallcenter.status AS gcallcenter_status,
                                   gcallcenter.calls_taken,
                                   gcallcenter.last_call_time,
                                   gcallcenter.member_description
                            FROM ramais
                            LEFT JOIN gcallcenter ON ramais.name_username = gcallcenter.member_name";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["name_username"] . "</td>";
                            echo "<td>" . $row["host"] . "</td>";
                            echo "<td>" . $row["port"] . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td>" . $row["gcallcenter_status"] . "</td>";
                            echo "<td>" . $row["calls_taken"] . "</td>";
                            echo "<td>" . $row["last_call_time"] . "</td>";
                            echo "<td>" . $row["member_description"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>Não foram encontrados registros.</td></tr>";
                    }

                    $conexao->fecharConexao();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
