<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $musica = htmlspecialchars($_POST['musica']);

    // Para quem você quer enviar o e-mail
    $para = "gutiamanda@icloud.com";
    $assunto = "Novo pedido de música - Gay FM Brasil";

    // Corpo do e-mail
    $mensagem = "Você recebeu um novo pedido de música:\n\n";
    $mensagem .= "Nome: $nome\n";
    $mensagem .= "E-mail: $email\n";
    $mensagem .= "Música: $musica\n";

    // Cabeçalhos
    $cabecalhos = "From: $email\r\n";
    $cabecalhos .= "Reply-To: $email\r\n";

    // Envia o e-mail
    if (mail($para, $assunto, $mensagem, $cabecalhos)) {
        echo "<script>alert('Pedido enviado com sucesso!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Erro ao enviar o pedido. Tente novamente.'); window.location.href='index.html';</script>";
    }
} else {
    // Redireciona caso tentem acessar direto
    header("Location: index.html");
    exit;
}
?>
