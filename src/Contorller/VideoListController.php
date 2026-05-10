<?php

    declare(strict_types= 1);

    namespace Alura\src\Controller;

    use Src\Repository\VideoRepository;


    class VideoListController
    {

        public function __construct(private VideoRepository $videoRepository)
        {
        }

        public function processRequired() : void{
            $videoList = $this->videoRepository->buscarTodos();
            require_once __DIR__ ."/../../inicio-html.php";
            ?>
            <ul class="videos__container" alt="videos alura">
                <?php foreach($videoList as $video):?>
                    <?php if(str_starts_with($video->getUrl(), 'http')):?>
                        <li class="videos__item">
                            <iframe width="100%" height="72%" src="<?= $video->getUrl() ?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                            <div class="descricao-video">
                                <img src="./img/logo.png" alt="logo canal alura">
                                <h3><?= $video->getTitle() ?></h3>
                                <div class="acoes-video">
                                    <a href="/editar-video?id=<?= $video->getId() ?>">Editar</a>
                                    <a href="./pages/remove-video.php?id=<?= $video->getId() ?>">Excluir</a>
                                </div>
                            </div>
                        </li>
                    <?php endif;?>
                <?php endforeach; ?>
            </ul>
            <?php require_once 'fim-html.php';

        }
    }