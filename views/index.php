<!-- // listagem de registros -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clients</title>
  <link rel="stylesheet" href="views/style.css">
</head>

<body>
  <!-- ao clicar no link, eu já passo o parâmetro get['a'] 
  que será: RegisterNewClient, onde no index é executado -->
  <a href="./index.php?a=RegisterNewClient">Register New Client</a>

  <h1>Clients List</h1>

  <div class="content">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($resultData as $data) {

        ?>
          <tr>
            <td> <?php echo $data['id']; ?> </td>
            <td> <?php echo $data['name']; ?> </td>
            <td> <?php echo $data['email']; ?> </td>
            <td> <?php echo $data['phone']; ?> </td>
            <td>
              <a href="./index.php?a=searchClient&id=<?php echo ($data['id']); ?>">Edit</a>
              <button onclick="deleteWarning(<?= $data['id'] ?>)">Delete</button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
    <div class="warning" id="warning">
      <h1>Do you want to delete user?</h1>
      <button id="confirmDeleteBtn">Yes</button>
      <button id="cancelDeleteBtn">No</button>
    </div>

  </div>

</body>
<script>
  function deleteWarning(id) {
    document.getElementById("warning").classList.add('warningToggle');
    let cancelDelete = document.getElementById("cancelDeleteBtn");
    let confirmDelete = document.getElementById("confirmDeleteBtn");
    cancelDelete.addEventListener("click", function() {
      closeWarning();
    })

    confirmDelete.addEventListener("click", function() {
      closeWarning()
      window.location.replace('./index.php?a=delete&id=' + id);
      alert("User Deleted Successfully")
    })
  }

  function closeWarning() {
    document.getElementById("warning").classList.remove("warningToggle")
  }

  function closeDeleteMessage() {
    document.getElementById("deleteMessage").classList.remove("deleteMessageToggle")
  }
</script>

</html>