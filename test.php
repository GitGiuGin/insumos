<!DOCTYPE html>
<html>
<head>
    <title>CRUD PHP</title>
</head>
<body>
    <h2>Create / Update User</h2>
    <form action="create.php" method="post">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <label for="name">Name:</label>
        <input type="text" name="nombre" id="name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
        <br><br>
        <label for="email">Email:</label>
        <input type="email" name="correo" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
        <br><br>
        <input type="submit" value="Save">
    </form>
    <br>
    <a href="index.php">Back to List</a>
</body>
</html>