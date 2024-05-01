<?php
// conexão com Banco de Dados

define("HOST", "localhost");
define("PORT", 3306);
define("DATABASE_NAME", "mvc_crud_poo");
define("USER", 'root');
define("PASSWORD", '');

class Connect
{
  //esse atributo poderá ser usado tanto por essa classe quanto as classes que serão herdadas 
  protected $connection;
  // classe construtor, quando eu instânciar, esse construct será executado por default, que irá chamar a função connectDatabase()
  function __construct()
  {
    $this->connectDatabase();
  }

  function connectDatabase()
  {
    try {
      $this->connection = new PDO('mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DATABASE_NAME, USER, PASSWORD);
    } catch (PDOException $e) {
      echo "error!" . $e->getMessage();
      die();
    }
  }
}

/**AGORA TODA VEZ QUE EU INSTANCIAR ESSA CLASSE, POR CONTA DO CONSTRUCT, ELE VAI CHAMAR A FUNÇÃO QUE CONECTA COM O BANCO DE DADOS
 * ex: $conexao = new Connect();
 * assim é feita a conexão com o banco de dados usando classe
 */
