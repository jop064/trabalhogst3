<?php
include('conexao.php');
session_start();

$mensagem = '';

if(isset($_POST['email']) || isset($_POST['senha'])) {
    if(strlen($_POST['email']) == 0) {
        $mensagem = "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        $mensagem = "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: cords.php");
            exit;
        } else {
            $mensagem = "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
   * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  background: #e9f2e7;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background-image: url('https://img.freepik.com/vetores-gratis/ilustracao-do-dia-do-meio-ambiente-no-mundo-plano_23-2148928197.jpg?t=st=1745606927~exp=1745610527~hmac=87544bca5b9e32c5d47d33b711c30ef81dfac9a1acae5f14b50335bdfd95a1eb&w=740');
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain; /* Essa é a chave para evitar imagem esticada */
}

.container {
  background-color: rgba(255, 255, 255, 0.95);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 400px;
  text-align: center;
}

.container h2 {
  margin-bottom: 20px;
  color: #333;
}

.container input,
.container select {
  width: 100%;
  padding: 12px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
}

.container button {
  width: 100%;
  padding: 12px;
  background-color: #3c803e;
  color: white;
  border: none;
  border-radius: 10px;
  margin-top: 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.container button:hover {
  background-color: #45a049;
}

.mensagem {
  color: red;
  margin-top: 10px;
  font-size: 14px;
}

.login-link {
  margin-top: 15px;
  font-size: 14px;
}

.login-link a {
  color: #4CAF50;
  text-decoration: none;
}

.login-link a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form method="POST" action="">
      <input type="email" name="email" placeholder="E-mail" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Entrar</button>
    </form>

    <?php if($mensagem): ?>
      <div class="mensagem"><?php echo $mensagem; ?></div>
    <?php endif; ?>

    <div class="login-link">
      Não tem conta? <a href="cadastro.php">Cadastre-se aqui</a>
    </div>
  </div>
</body>
</html>
