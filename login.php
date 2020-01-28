<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
        $host = '127.0.0.1';
        $db   = 'pdosecurity';
        $user = 'root';
        $pass = 'ABC';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        $info = $pdo->query('SELECT * FROM gebruikers');
        ?>
        <h1>Admin panel</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Log in">
        </form>
        <?php
        foreach ($info as $key => $row) {
            if ($_POST['username'] == $row['username'] && $_POST['password'] == $row['password']){
                echo "logged in as ".$row['username']." with password ".$row['password'];
                setcookie("LoggedInUser", $row['id'], time() + (86400 * 30));
                header("Location: ./index.php");
            }
        }
        ?>
</body>
</html>