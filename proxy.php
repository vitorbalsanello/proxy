<?php
interface BancoDeDados {
    public function conectar();
    public function consultar($query);
}

class ConexaoReal implements BancoDeDados {
     private $host;
     private $usuario;
     private $senha;
     private $banco;

    public function __construct($host, $usuario, $senha, $banco) {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->banco = $banco;
    }

    public function conectar() {
        echo "Conectando ao banco de dados em {$this->host}\n";
    }

    public function consultar($query) {
        echo "Consultando o banco de dados\n";
    }
}

class ProxyBancoDeDados implements BancoDeDados {
    private $conexaoReal;
     private $host;
    private $usuario;
    private $senha;
    private $banco;

    public function __construct($host, $usuario, $senha, $banco) {
        $this->host = $host;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->banco = $banco;
    }

    public function conectar() {
        if ($this->conexaoReal == null) {
            $this->conexaoReal = new ConexaoReal($this->host, $this->usuario, $this->senha, $this->banco);
        }

        echo "Proxy para conectar ao banco\n";
        $this->conexaoReal->conectar();
    }

    public function consultar($query) {
        if ($this->conexaoReal == null) {
            $this->conexaoReal = new ConexaoReal($this->host, $this->usuario, $this->senha, $this->banco);
        }

        echo "Proxy para consultar o banco de dados\n";
        $this->conexaoReal->consultar($query);
    }
}

$proxy = new ProxyBancoDeDados('localhost', 'root', 'senha', 'minhadb');
$proxy->conectar(); 
$proxy->consultar('SELECT * FROM tabela'); 
?>