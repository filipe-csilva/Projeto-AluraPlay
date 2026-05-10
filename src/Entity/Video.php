<?php

    class Video{
        private ?int $id;
        public readonly string $url; //readonly -> Pode instanciar um valor apenas uma vez
        private string $title;

        public function __construct(?int $id, string $url, string $title){
            $this->id = $id;
            $this->url = $url;
            $this->title = $title;
        }

        //Sets
        public function setUrl(string $url): ?int{
            if(filter_var($url, FILTER_VALIDATE_URL) === false){
                
            };
        }

        public function setId(){

        }


        //Gets
        public function getId(): ?int{
            return $this->id;
        }

        public function getUrl(): string{
            return $this->url;
        }

        public function getTitle(): string{
            return $this->title;
        }
    }