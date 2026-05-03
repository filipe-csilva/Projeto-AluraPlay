<?php

    require_once __DIR__ . "/../Model/Video.php";
    
    class VideoRepository{
        private PDO $pdo;

        public function __construct(PDO $pdo){
            $this->pdo = $pdo;
        }

        private function formarObjeto($dados){
            return new Video(
                $dados['id'],
                $dados['url'],
                $dados['title'],
            );
        }

        public function buscarTodos(){
            $sql = "SELECT * FROM videos";
            $stmt = $this->pdo->query($sql);
            $videosArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $dados = array_map(function ($videos) {
                return $this->formarObjeto($videos);
            }, $videosArray);

            return $dados;
        }

        public function videoById(int $id) {
            $sql = 'SELECT * FROM videos WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);

            return $this->formarObjeto($dados);
        }

        public function adicionaVideo(Video $video){
            $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $video->getUrl(), PDO::PARAM_STR_CHAR);
            $stmt->bindValue(2, $video->getTitle(), PDO::PARAM_STR_CHAR);
            $stmt->execute();
        }

        public function editaVideo(Video $video){
            $sql = "UPDATE videos SET url = ?, title = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $video->getUrl(), PDO::PARAM_STR_CHAR);
            $stmt->bindValue(2, $video->getTitle(), PDO::PARAM_STR_CHAR);
            $stmt->bindValue(3, $video->getId(), PDO::PARAM_INT);
            $stmt->execute();
        }

        public function removeVideo(int $id){
            $sql = 'DELETE FROM videos WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }