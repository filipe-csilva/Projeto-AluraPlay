<?php

    declare(strict_types=1);

    namespace Alura\Mvc\Controller;

    class LoginController implements Controller{
        private $pdo;
    
        public function __construct(){
            require (__DIR__ . "/../conexao-bd.php");
            $this->pdo = $pdo;
        }

        public function processaRequisicao(): void
        {

            ///Buscar usuário no banco usando email
            $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST,"password");

            $sql = 'SELECT * FROM users WHERE email = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->execute();

            $userDate = $stmt->fetch(\PDO::FETCH_ASSOC);
            $correctPassword = password_verify($password, $userDate['password'] ?? '');

            if ($correctPassword) {
                $_SESSION['logado'] = true;
                header('Location: /');
            }else{
                header('Location: /login');
            }
        }
    }