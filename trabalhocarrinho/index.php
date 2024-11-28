<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/BackGroundLogin.png'); 
            background-size: cover;
            background-position: center;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            opacity: 1.9;
        }
        .login-title {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(to right, #ffa500, #800080);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }
        .form-control {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #ff3c00;
            border: none ;
        }
        .btn-primary:hover {
            background-color: rgb(255, 0, 0);
        }
    </style>
</head>
<body>
<?php
$credenciais = [

    //email e senha!!
    'email' => 'celu@gmail.com',
    'senha' => md5('ttt')
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    
    if ($email === $credenciais['email'] && $senha === $credenciais['senha']) {
        header('Location: destino.php');
        exit;
    } else {
        echo '<script>alert("Email ou senha incorretos!");</script>';
    }
}

?>
<div class="login-container">
    <h2 class="login-title">Login</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Endereço de Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>