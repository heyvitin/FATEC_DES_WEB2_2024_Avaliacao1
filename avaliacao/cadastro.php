<?php
session_start();


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $placa = $_POST['placa'];


    if(isset($_POST['tipo_veiculo'])) {
        $tipo_veiculo = $_POST['tipo_veiculo'];
        
    
        $arquivo = ($tipo_veiculo == 'carro') ? 'carros.txt' : 'motos.txt';
        

        $registro = "$nome|$ra|$placa\n";
        
      
        file_put_contents($arquivo, $registro, FILE_APPEND);
        
      
        header('Location: sucesso.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h2>Registre seu Veículos</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nome Completo: <input type="text" name="nome"><br></br>
        Registro Acadêmico (R.A.): <input type="text" name="ra"><br></br>
        Placa do Veículo: <input type="text" name="placa"><br></br>
        Tipo de Veículo:
        <select name="tipo_veiculo">
            <option value="carro">Carro</option>
            <option value="moto">Moto</option>
        </select><br></br>
        <input type="submit" value="Cadastrar">
        <p><a href="logout.php">Logout</a></p>

    </form>
</body>
</html>
