<?php
    require ("../src/conexao-bd.php");
    require ("../src/Model/Video.php");
    require ("../src/Repository/VideoRepository.php");

    $videoRepository = new VideoRepository($pdo);

    if (isset($_POST["enviar"])) {

        $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
        $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);
        $title = filter_input(INPUT_POST, "title");
    
    
        $video = new Video($id, $url, $title);
        $videoRepository->editaVideo($video);        
        header('Location: /');
    }else{
        $id = filter_input(INPUT_GET,"id", FILTER_SANITIZE_NUMBER_INT);

        if ($id !== false) {
            $video = $videoRepository->videoById($id);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-form.css">
    <link rel="stylesheet" href="../css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

    <!-- Cabecalho -->
    <header>

        <nav class="cabecalho">
            <a class="logo" href="/"></a>

            <div class="cabecalho__icones">
                <a href="./enviar-video" class="cabecalho__videos"></a>
                <a href="../pages/login" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>

    <main class="container">

        <form class="container__formulario" method="post" action="#">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" value="<?= $video->getUrl() ?>" required
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="title" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo" value="<?= $video->getTitle() ?>"
                        id='title' />
                </div>

                <input name="id" id='id' type="hidden" value="<?= $video->getId() ?>"/>

                <input class="formulario__botao" name="enviar" type="submit" value="Enviar" />
        </form>

    </main>

</body>

</html>