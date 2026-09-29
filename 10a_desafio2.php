<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "exercicio";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $preco = $_POST["preco"] ?? "";

    if (empty($nome)) {
        $mensagem = "Erro: O nome do produto não pode estar vazio.";
    } elseif (!is_numeric($preco) || $preco <= 0) {
        $mensagem = "Erro: O preço deve ser um número positivo.";
    } else {
        $sql = "INSERT INTO produtos (nome, preco) VALUES (?, ?)";
        $stmt = $conexao->prepare($sql);

        if (!$stmt) {
            $mensagem = "Erro ao preparar o cadastro.";
        } else {
            $preco = (float)$preco;
            $stmt->bind_param("sd", $nome, $preco);

            if ($stmt->execute()) {
                $mensagem = "Produto cadastrado com sucesso!";
            } else {
                $mensagem = "Erro ao cadastrar produto.";
            }

            $stmt->close();
        }
    }
}

$conexao->close();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>

    <h1>Cadastro de Produtos</h1>

    <form method="POST">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome">

        <br><br>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" step="0.01">

        <br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($mensagem != ""): ?>
        <p><?php echo htmlspecialchars($mensagem); ?></p>
    <?php endif; ?>

</body>
</html>
