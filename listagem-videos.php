<?php

require __DIR__ . "/src/conexao-bd.php";
require __DIR__ . "/src/Repository/VideoRepository.php";
$videoRepositorio = new VideoRepository($pdo);
$videoList = $videoRepositorio->buscarTodos();

require_once 'inicio-html.php'; ?>
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
<?php require_once 'fim-html.php'; ?>