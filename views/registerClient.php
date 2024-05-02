<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register New Client</title>
  <link rel="stylesheet" href="views/style.css">
</head>

<body>
  <main>
    <h1>Register</h1>
    <form action="./index.php" method="post">
      <label for="name">Name: </label>
      <input type="text" name="name" required>

      <label for="email">Email: </label>
      <input type="email" name="email" required>

      <label for="phone">Phone: </label>
      <input type="tel" name="phone" minlength="11" maxlength="11" required>

      <input type="hidden" name="actionForm" value="create">

      <button class="btnSubmit" type="submit">Submit</button>
    </form>
    <a class="goHome" href="./index.php">Back to homepage</a>
  </main>

</body>

</html>