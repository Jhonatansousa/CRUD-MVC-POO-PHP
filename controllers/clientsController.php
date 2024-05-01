<?php

require_once("./models/Client.php");


class ClientsController
{
  // os atributos dessa classe só podem se acessadas dentro dessa classe
  private $model;

  // construtor que instancia a classe models
  function __construct()
  {
    $this->model = new ClientModel();
  }

  // aqui é a função que foi chamada no index.php
  function getAll()
  {
    // aqui eu recebo todos os dados do getAll do models
    //getAll retorna um valor que é os dados da tabela do banco de dados
    //pego esses dados e o coloco em uma variável
    $resultData = $this->model->getAll();

    require_once("./views/index.php");
  }

  function registerNewClient()
  {
    require_once("./views/registerClient.php");
  }

  function create($data)
  {
    $this->model->create($data);
  }
  function delete($data)
  {
    $this->model->delete($data);
  }
  function searchClient($data)
  {
    // quando clicar em edit, essa função é chamada, para fazer a busca e retornar os dados redirecionando para a página de editClient, que por fim, quando executado a alteração, é executada a função edit que executa o código SQL.
    $resultSearch = $this->model->search($data);
    require_once("./views/editClient.php");
  }

  function edit($data)
  {
    $this->model->edit($data);
  }
}
