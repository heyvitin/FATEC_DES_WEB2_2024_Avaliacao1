<?php
session_start();


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: cadastro.php');
    exit;
}


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['login'] == 'portaria' && $_POST['senha'] == 'FatecAraras') {
        $_SESSION['loggedin'] = true;
        header('Location: cadastro.php');
        exit;
    } else {
        $error = "Login ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Área do Aluno</title>
</head>
<body>
    <h2>Área de login</h2>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Login: <input type="text" name="login"><br></br>
        Senha: <input type="password" name="senha"><br></br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
