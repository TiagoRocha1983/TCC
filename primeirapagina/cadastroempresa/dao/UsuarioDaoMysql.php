<?php
require_once 'models/Usuarios.php';

class UsuarioDaoMysql implements UsuarioDAO {

    private $pdo;

    public function __construct(PDO $driver){
        $this->pdo = $driver;
    }


    public function add(Usuario $u) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email, telefone) VALUES (:nome, :email, :telefone)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->execute();

        $u->setId( $this->pdo->lastInsertId() );
        return $u;
    }
    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();
           
            foreach($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);
                $u->setTelefone($item['telefone']);

                $array[] = $u;
            }
            
        }

        return $array;

    }
    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0 ) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            $u->setTelefone($data['telefone']);

            return $u;
        } else {
            return false;
        }
    }
    public function findByTelefone($telefone) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE telefone = :telefone");
        $sql->bindValue(':telefone', $telefone);
        $sql->execute();
        if($sql->rowCount() > 0 ) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            $u->setTelefone($data['telefone']);

            return $u;
        } else {
            return false;
        }
    }
    public function findById($id) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0 ) {
            $data = $sql->fetch();

            $u = new Usuario();
            $u->setId($data['id']);
            $u->setNome($data['nome']);
            $u->setEmail($data['email']);
            $u->setTelefone($data['telefone']);

            return $u;
        } else {
            return false;
        }

    }
    public function update(Usuario $u) {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome = :nome, email, telefone = :email WHERE id = :id"); 
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':telefone', $u->getTelefone());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }
    public function delete($id) {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}

?>