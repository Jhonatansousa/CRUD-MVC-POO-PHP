<?php
// rotas/chamada de métodos 

require_once("./controllers/clientsController.php");

// pego primeiramente a ação do usuário, por default será getAll
// $action = !empty($_GET['a']) ? $_GET['a'] : 'getAll';
// $action = (isset($_GET['a']) || isset($_POST['a'])) ? (isset($_POST['a']) ? $_POST['a'] : $_GET['a']) : 'getAll';
if (isset($_GET['a'])) {
  $action = $_GET['a'];

  // quando adicionar dados no form registerNewClient, definirei $action = create, que é a função para adicionar dados
} elseif (isset($_POST['name'])) {
  $actionForm = $_POST['actionForm'];
  // aqui possuo um input hidden com o valor create ou edit, para diferenciar de qual formulário que está sendo enviado os dados(create ou edit)
  if ($actionForm == 'create') {
    $action = 'create';
  } else {
    $action = 'edit';
  }
} else {
  $action = 'getAll';
}


// aqui vou estar instanciando o controller
$controller = new ClientsController();
// e chamará a ação getAll por default ou A ação do usuário
if ($action == 'create') {
  // aqui chamamos a função do controller com o respectivo nome da variável $action
  $controller->{$action}($_POST);
} elseif ($action == 'delete') {
  $controller->{$action}($_GET);
} elseif ($action == 'searchClient') {
  $controller->{$action}($_GET['id']);
} elseif ($action == 'edit') {
  $controller->{$action}($_POST);
} else {
  $controller->{$action}();
}


// resumindo: vou chamar uma função do controller, que irá chamar outra função no model
