<?php

$carrinho = isset($_COOKIE['carrinho']) ? unserialize($_COOKIE['carrinho']) : [];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
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
        <h1 class="text-center">Meu Carrinho</h1>

        <?php if (count($carrinho) > 0): ?>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($carrinho as $item) {
                        echo "<tr>
                                <td>{$item['nome']}</td>
                                <td>R$ " . number_format($item['preco'], 2, ',', '.') . "</td>
                              </tr>";
                        $total += $item['preco'];
                    }
                    ?>
                    <tr>
                        <td><strong>Total:</strong></td>
                        <td><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-info text-center">Seu carrinho está vazio.</p>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
