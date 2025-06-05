<?php
require_once 'conexao.php';

// Define a função primeiro
function salvarPagamento($conexao) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cnpj = mysqli_real_escape_string($conexao, $_POST['cnpj']);
        $nomeinst = mysqli_real_escape_string($conexao, $_POST['nome_instituicao']);
        $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
        $responsavel = mysqli_real_escape_string($conexao, $_POST['responsavel']);
        $formpag = mysqli_real_escape_string($conexao, $_POST['pagamento']);

        $sql = "INSERT INTO pagamento (cnpj, nomeinst, endereço, nomeresp, formpag)
                VALUES ('$cnpj', '$nomeinst', '$endereco', '$responsavel', '$formpag')";

        if (mysqli_query($conexao, $sql)) {
            header("Location: cards.php");
            exit();
        } else {
            echo "<script>alert('Erro ao inserir: " . mysqli_error($conexao) . "');</script>";
        }
    }
}

// Agora sim: chama a função depois de defini-la
salvarPagamento($conexao);
?>
