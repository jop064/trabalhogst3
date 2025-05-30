<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // redireciona para login se não estiver logado
    exit();
}

include('conexao.php');

// Buscar dados do usuário no banco para mostrar
$id = $_SESSION['id'];
$sql = "SELECT * FROM aluno WHERE id = '$id'";
$result = $conexao->query($sql);

if ($result->num_rows == 1) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Usuário não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Área do Usuário</title>
  <style> 
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #e0f2f1, #a5d6a7);
      color: #2e7d32;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    /* Cartão central */
    .container {
      background-color: #ffffff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 420px;
      text-align: center;
      border-left: 10px solid #66bb6a;
    }

    h1 {
      font-size: 1.8em;
      margin-bottom: 15px;
      color: #388e3c;
    }

    p {
      font-size: 1em;
      margin: 12px 0;
      color: #4e944f;
    }

    strong {
      color: #2e7d32;
    }

    a {
      display: inline-block;
      margin-top: 25px;
      padding: 12px 24px;
      background-color: #43a047;
      color: white;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s, transform 0.2s;
    }

    a:hover {
      background-color: #2e7d32;
      transform: scale(1.05);
    }

    @media (max-width: 500px) {
      .container {
        padding: 30px 20px;
      }

      h1 {
        font-size: 1.5em;
      }

      p {
        font-size: 0.95em;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bem-vindo, <?= htmlspecialchars($usuario['nome']); ?>!</h1>
    <p><strong>Email:</strong> <?= htmlspecialchars($usuario['email']); ?></p>
    <p><strong>Senha:</strong> <?= htmlspecialchars($usuario['senha']); ?></p>
    <a href="logout.php">Sair</a>
  </div>
</body>
</html>
