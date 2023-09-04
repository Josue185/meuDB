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
    $time = $_POST['time'];

    // Conexão com o MySQL
    $servername = "Local";
    $username = "root";
    $password = "04101991";
    $dbname = "controle";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Prepara a consulta SQL para inserção no MySQL
    $sql = "INSERT INTO sua_tabela (LDAP, dataAtendimento, numeroCaso, statusAtendimento, novoStatus, tarefas, print, hora, tempoGasto)
            VALUES ('$ldap', '$dataAtendimento', '$numeroCaso', '$statusAtendimento', '$novoStatus', '$tarefas', '$print', '$hora', '$tempoGasto')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro na inserção de dados no MySQL: " . $conn->error;
    }

    // Fecha a conexão com o MySQL
    $conn->close();

    // A partir daqui, você pode adicionar código adicional para enviar dados para a API da Sheetmonkey
    // ...

} else {
    echo "Requisição inválida.";
}
?>
