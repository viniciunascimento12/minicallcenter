<?php
class ConexaoBanco {
    private $servername = "db";
    private $username = "root";
    private $password = "12345678";
    private $dbname = "callcenter";
    private $conn;

    public function conectar() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function fecharConexao() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
?>
