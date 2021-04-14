<?php 
    session_start(); 
    if (!$_SESSION['user']) {
        header('Location: profile.php');
    };
    require_once 'include/connect.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <title>cards</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Зарегестрированные пользователи</h1>
            <hr>
        </div>
        <div class="card-wrapper">

        <?php 
        $query = "SELECT * FROM users WHERE id > 0"; 
        $result = mysqli_query($link, $query) or die( mysqli_error($link) );
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
            
        foreach ($data as $elem) : ?>

            <div class="user-card">
                <img src="<?= $elem['avatar'] ?>" class="avatar">
                <div class="card-text">
                    <h2> <?= $elem['full_name'] ?> </h2>
                    <p>PHP Разработчик</p>
                    <a href="vk.com/id"><?= $elem['email'] ?></a>
                </div>
            </div>

        <?php endforeach ?>        
        </div>
        <a href="profile.php">перейти в профиль</a>
    </div>
</body>
</html>