<?php
require "src/conexao-bd.php";
require "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtosRepositorio = new ProdutoRepositorio($pdo);
$dadosCafe = $produtosRepositorio->opcoesCafe();
$dadosAlmoco = $produtosRepositorio->opcoesAlmoco();
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <div class="header" id="myHeader">
        <a href="index.php"><img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto"></a>
        <div class="botoes-header">
            <a class="botao-login" href="login.php">Login ADM</a>
            <a class="botao-sobrenos" href="sobre-nos.php">Sobre nós</a>
        </div>
    </div>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Bem-vindo(a) ao Serenatto!</h2>

        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Fique à vontade para escolher no nosso cardápio digital.</h3>
                <br>
                <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
                <div class="container-cafe-manha-titulo">
                    <h3>Opções para o Café</h3><br>
                    <?php if (!empty($dadosCafe)): ?>
                    <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
                </div>
                <div class="container-cafe-manha-produtos"> 
                    <?php foreach ($dadosCafe as $cafe): ?>
                        <div class="container-produto">
                            <div class="container-foto">
                                <img src="<?= $cafe->getImagemDiretorio() ?>">
                            </div>
                            <p><?= $cafe->getNome() ?></p>
                            <p><?= $cafe->getDescricao() ?></p>
                            <p><?= $cafe->getPrecoFormatado() ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <h2>Nenhuma opção disponível para o café da manhã.</h2>
            <?php endif; ?>
        </section>

        <section class="container-almoco">
                <div class="container-almoco-titulo">
                    <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments">
                    <h3>Opções para o Almoço</h3><br>
                    <?php if (!empty($dadosAlmoco)): ?>
                    <img class="ornaments" src="img/ornaments-coffee.png" alt="ornaments"> 
                </div>
                <div class="container-almoco-produtos">
                    <?php foreach ($dadosAlmoco as $almoco): ?>
                        <div class="container-produto">
                            <div class="container-foto">
                                <img src="<?= $almoco->getImagemDiretorio() ?>">
                            </div>
                            <p><?= $almoco->getNome() ?></p>
                            <p><?= $almoco->getDescricao() ?></p>
                            <p><?= $almoco->getPrecoFormatado() ?></p>
                        </div>
                    <?php endforeach; ?> 
                </div>
            <?php else: ?>
                <p>Nenhuma opção disponível para o almoço.</p>
            <?php endif; ?>
        </section>

        <footer>
            <p>&copy; 2024 - Todos os direitos reservados</p>
            <p>Isabella Dutra de Souza Moreira</p>
        </footer>
    </main>
</body>
</html>
