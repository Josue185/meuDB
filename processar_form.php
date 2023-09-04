<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Coleta os dados do formulário
    $ldap = $_POST['LDAP'];
    $dataAtendimento = $_POST['dataAtendimento'];
    $numeroCaso = $_POST['numeroCaso'];
    $statusAtendimento = $_POST['statusAtual'];
    $novoStatus = $_POST['statusAtualizados'];
    $tarefas = $_POST['tarefas'];
    $print = $_POST['screenshot'];
    $hora = $_POST['horacaso'];
    $tempoGasto = $_POST['tempoGasto'];

    // Conexão com o MySQL
    $hostname = "localhost";
    $username = "root";
    $password = "04101991";
    $dbname = "controle";

    $conn = new mysqli($hostname, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o MySQL: " . $conn->connect_error);
    }

    // Prepara a consulta SQL para inserção no MySQL
    $sql = "INSERT INTO casos (ldap, dataAtendimento, numeroCaso, statusAtendimento, novoStatus, tarefas, print, hora, tempoGasto)
            VALUES ('$ldap', '$dataAtendimento', '$numeroCaso', '$statusAtendimento', '$novoStatus', '$tarefas', '$print', '$hora', '$tempoGasto')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro na inserção de dados no MySQL: " . $conn->error;
    }

    // Fecha a conexão com o MySQL
    $conn->close();
} else {
    echo "Requisição inválida.";
}
?>
