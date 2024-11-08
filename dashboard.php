<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/dashboard.css">
    <?php session_start(); ?>
</head>
<body>
    <header class="top-bar">
        <h1>Cimaleek</h1>
        <div class="top-list">
            <a href="">
                <h4>Home</h4>
            </a>
            <a href="./moviesEdit.php">
                <h4>Movies</h4>
            </a>
            <a href="">
                <h4>Categories</h4>
            </a>
            <a href="">
                <h4>Admins</h4>
            </a>
        </div>
    </header>
    <section class="main">
        <div class="container">
            <a href="./addMovies.php" class="d-it">
                <div><h4>Add Movies</h4></div>
            </a><div class="d-ic">
            <a href="./addAdmins.php"> <h4>Add Admin</h4></a><a href="./addCategories.php">
                    <h4>Add Cat</h4></a><a href="./addDirectors.php">
                    <h4>Add directors</h4></a><a href="./addActors.php">
                    <h4>Add actors</h4></a>
            </div><a href="" class="d-ib">
                <div><h4>Control Users</h4></div>
            </a>
        </div>
     <?php   if(isset($_SESSION["delete_error"])){
        ?>
        <h5><?php echo $_SESSION["delete_error"]; ?></h5>
        <?php
        }?>
    </section>
</body>
</html>