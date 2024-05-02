<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Client</title>

  <link rel="stylesheet" href="views/style.css">
</head>

<body>
  <main>
    <h1>Edit</h1>
    <form action="./index.php" method="post">
      <label for="name">Name: </label>
      <input type="text" value="<?= isset($resultSearch[0]['name']) ? $resultSearch[0]['name'] : '' ?>" name="name" required>

      <label for="email">Email: </label>
      <input type="email" value="<?= isset($resultSearch[0]['email']) ? $resultSearch[0]['email'] : '' ?>" name="email" required>

      <label for="phone">Phone: </label>
      <input type="tel" value="<?= isset($resultSearch[0]['phone']) ? $resultSearch[0]['phone'] : '' ?>" name="phone" minlength="11" maxlength="11" required>

      <!-- verifica se tenho um id e passo ele junto com os dados via superglobal $_POST -->
      <input type="hidden" name="id" value="<?= isset($resultSearch[0]['id']) ? $resultSearch[0]['id'] : '' ?>">
      <input type="hidden" name="actionForm" value="edit">


      <button class="btnEdit" type="submit">Edit</button>
    </form>
    <a class="goHome" href="./index.php">Back to homepage</a>
  </main>

</body>

</html>