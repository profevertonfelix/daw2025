<?php
    include_once "usuario.class.php";
    class usuarioDAO{
        public function __construct(){
            $this->conexao = new PDO(
                "mysql:host=localhost; dbname=ecommerceeverton",
                "root", "");
        }
        public function listar(){
            $sql = $this->conexao->prepare(
                "SELECT * FROM usuario"
            );
            $sql->execute();
            return $sql->fetchAll();
        }
        public function inserir(usuario $obj){
            $sql = $this->conexao->prepare(
                "INSERT INTO usuario
                (nome, email, senha)
                VALUES
                (:nome, :email,:senha)"
            );
            $sql->bindValue(":nome", $obj->getNome());
            $sql->bindValue(":email", $obj->getEmail());
            $sql->bindValue(":senha", $obj->getSenha());
            return $sql->execute();
        }
        public function excluir($id){
			$sql = $this->conexao->prepare("
				DELETE FROM usuario WHERE 
                idusuario = :id
			");
			$sql->bindValue(":id", $id);
			return $sql->execute();
		}
        public function retornarUm($id){
            $sql = $this->conexao->prepare("
            SELECT * FROM usuario WHERE idusuario=:id
            ");
            $sql->bindValue(":id", $id);
            $sql->execute();
            return $sql->fetch();
        }
        public function login(usuario $usuario){
            $sql = $this->conexao->prepare("
                SELECT * FROM usuario WHERE email = :email
            ");
            $sql->bindValue(":email", $usuario->getEmail());
            $sql->execute();
            if($sql->rowCount()>0){
                while($retorno = $sql->fetch()){
                    if($retorno["senha"] == $usuario->getSenha())
                    {
                        return $retorno; //tudo Ok! Faça o login
                    }
                }
                return 1;// senha incorreta
            }
            else{
                return 2; //email n cadastrado
            }
        }
        public function editar(usuario $usuario){
            $sql= $this->conexao->prepare("
                UPDATE usuario SET 
                nome = :nome, email = :email, senha = :senha
                WHERE idusuario = :idusuario
            ");
            $sql->bindValue(":idusuario", $usuario->getIdusuario());
            $sql->bindValue(":email", $usuario->getEmail());
            $sql->bindValue(":senha", $usuario->getSenha());
            $sql->bindValue(":nome", $usuario->getNome());
            return $sql->execute();

        }
        

    }
?>