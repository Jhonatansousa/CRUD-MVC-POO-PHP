<?php
//  consultas ao banco de dados/Regras de negócios 

require_once("./configuration/connect.php");
// Client model é uma classe herdeira de Connect
class ClientModel extends Connect
{
  // atributo table so poderá ser utilizada nessa classe (private)
  private $table;

  function __construct()
  {
    /* o parent:: é a classe Connect, e estou invocando o método construtor da classe pai
     esse método que chama a função connectDatabase() que é responsável por abrir uma conexão com o BD
    */
    parent::__construct();
    $this->table = 'clients';
  }

  // função que seleciona todos os itens do banco de dados
  function getAll()
  {
    $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
    // convertemos a resposta que é array para array associativo("fetchAll()")
    $resultQuery = $sqlSelect->fetchAll();
    // retorno como um valor para o método que está chamando essa função
    return $resultQuery;
  }

  // função para inserir dados no banco de dados
  function create($data)
  /**Serão passados pelo formulário 3 valores referentes aos inputs do form->name, email e phone
   * esses valores entrarão no parâmetro 'data'
   * sqlCreate é uma variável que recebe o comando SQL;
   * fazemos a preparação e a execução e retornamos um valor booleano se foi executado ou não */
  {
    $sqlCreate = "INSERT INTO $this->table (name, email, phone) VALUES(:name, :email, :phone)";
    $resultQuery = $this->connection->prepare($sqlCreate);
    $resultQuery->execute([':name' => $data['name'], ':email' => $data['email'], ':phone' => $data['phone']]);
    header("Location: index.php?a=getAll");
  }

  function delete($data)
  {
    $id = $data['id'];
    $sqlDelete = "DELETE FROM {$this->table} WHERE id = $id";
    $resultQuery = $this->connection->prepare($sqlDelete);
    $resultQuery->execute();
    header("Location: index.php?a=getAll");
  }
  function search($data)
  {
    $sqlSelect = $this->connection->query("SELECT * FROM $this->table WHERE id = '$data'");
    $resultQuery = $sqlSelect->fetchAll();
    // var_dump($resultQuery);
    return $resultQuery;
  }
  function edit($data)
  {
    $sqlUpdate = "UPDATE $this->table SET name = :name, email = :email, phone = :phone WHERE id = :id";
    $this->connection->prepare($sqlUpdate)->execute([
      'id' => $data['id'],
      'name' => $data['name'],
      'email' => $data['email'],
      'phone' => $data['phone']
    ]);

    header("Location: index.php?a=getAll");
  }
}
