<?php
require_once 'ConexaoBanco.php';

class ListarRamais {
    public function listar() {
        $conexaoBanco = new ConexaoBanco();
        $conn = $conexaoBanco->conectar();

        $sql = "SELECT * FROM ramais";
        $result = $conn->query($sql);

        $ramais = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ramais[] = $row;
            }
        }

        $conexaoBanco->fecharConexao();
        return $ramais;
    }
}
?>
