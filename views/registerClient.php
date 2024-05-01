<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register New Client</title>
</head>

<body>
  <main>
    <h1>Register</h1>
  </main>
  <form action="./index.php" method="post">
    <label for="name">Name: </label>
    <input type="text" name="name" required>

    <label for="email">Email: </label>
    <input type="email" name="email" required>

    <label for="phone">Phone: </label>
    <input type="tel" name="phone" minlength="11" maxlength="11" required>

    <input type="hidden" name="actionForm" value="create">

    <button type="submit">Submit</button>
  </form>
</body>

</html>