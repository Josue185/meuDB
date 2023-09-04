import mysql.connector

# Configuração da conexão com o banco de dados
conexao = mysql.connector.connect(
    host="127.0.0.1",
    user="root",
    password="04101991",
    database="controle"
)

# Verifica se a conexão foi bem-sucedida
if conexao.is_connected():
    print("Conexão com o MySQL estabelecida")

    # Coleta os dados do formulário
    ldap = input("LDAP: ")
    dataAtendimento = input("Data do Atendimento/Follow Up (YYYY-MM-DD): ")
    numeroCaso = input("Número do Caso: ")
    statusAtendimento = input("Status Atual: ")
    novoStatus = input("Novo Status: ")
    tarefas = input("Tarefas: ")
    print_qplus = input("Print do Q+: ")
    hora = input("Hora da Call (HH:MM:SS): ")
    tempoGasto = input("Tempo Gasto no Caso (minutos): ")

    # Prepara a consulta SQL para inserção no MySQL
    cursor = conexao.cursor()
    sql = "INSERT INTO casos (ldap, dataAtendimento, numeroCaso, statusAtendimento, novoStatus, tarefas, print, hora, tempoGasto) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)"
    valores = (ldap, dataAtendimento, numeroCaso, statusAtendimento, novoStatus, tarefas, print_qplus, hora, tempoGasto)

    # Executa a consulta
    cursor.execute(sql, valores)

    # Confirma a inserção dos dados
    conexao.commit()

    print("Dados inseridos com sucesso!")

    # Fecha a conexão
    cursor.close()
    conexao.close()
else:
    print("Erro na conexão com o MySQL")
