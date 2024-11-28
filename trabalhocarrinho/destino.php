<?php
$connect = mysqli_connect("127.0.0.1", "root", "", "mercadophp");
if (!$connect) {
    die("Falha na conexão: " . mysqli_connect_error());
}
mysqli_set_charset($connect, "UTF8");

if (isset($_POST['adicionar_carrinho'])) {
    $id_produto = $_POST['id_produto'];

    $query = "SELECT * FROM produtos WHERE id = $id_produto";
    $resultado = mysqli_query($connect, $query);
    
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $produto = mysqli_fetch_assoc($resultado);

        $carrinho = isset($_COOKIE['carrinho']) ? unserialize($_COOKIE['carrinho']) : [];
     
        $carrinho[] = $produto;
        

        setcookie('carrinho', serialize($carrinho), time() + (86400 * 30), "/");

        header('Location: destino.php?mensagem=Produto adicionado com sucesso!');
        exit;
    }
}


$mensagem_sucesso = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';


$query = mysqli_query($connect, "SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teimo Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Mercado Virtual</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="destino.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="carrinho.php">Carrinho</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
    <?php if ($mensagem_sucesso): ?>
        <div class="alert alert-success text-center"><?= $mensagem_sucesso ?></div>
    <?php endif; ?>

    <div class="row">
        <?php
        while ($produto = mysqli_fetch_array($query)) {
           
            echo "
                <div class='col-md-4'>
                    <div class='card mb-4'>
                        <img src='img/{$produto['imagem']}' class='card-img-top' alt='{$produto['nome']}'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$produto['nome']}</h5>
                            <p class='card-text'>{$produto['descricao']}</p>
                            <p><strong>R$ {$produto['preco']}</strong></p>
                            <form method='POST'>
                                <input type='hidden' name='id_produto' value='{$produto['id']}'>
                                <button type='submit' name='adicionar_carrinho' class='btn btn-primary'>Adicionar ao Carrinho</button>
                            </form>
                        </div>
                    </div>
                </div>
            ";
        }
        ?>
    </div>
</div>
</body>
</html>
