<?php
session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}


function lerRegistrosMotos() {
    $arquivo = 'motos.txt';
    if(file_exists($arquivo)) {
        $linhas = file($arquivo);
        foreach($linhas as $linha) {
            echo $linha . "<br>";
        }
    } else {
        echo "Nenhum registro encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Motos</title>
</head>
<body>
    <h2> Motos Registradas</h2>
    <button onclick="window.location.href='sucesso.php'">Voltar</button>
    <br><br>
    <?php lerRegistrosMotos(); ?>
</body>
</html>
