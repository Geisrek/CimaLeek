<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admins</title>
    <link rel="stylesheet" href="styles/comon.css">
    <link rel="stylesheet" href="styles/addAdmin-styles.css">
</head>
<body>
<header class="head">
     <div><h1>CimaLeek</h1></div>
     <div class=""> <h3>Add Admins</h3></div>
     <a href="./dashboard.php" class="back"><h3>Home</h3></a>
    </header>
    <section class="main">
      <form action="actions/addAddminAct.php" method="post" class="re-f"  enctype="multipart/form-data">
       <div class="re-i">
        <label >Name</label>
        <input type="text" name="name">
    </div>
       <div class="re-i">
        <label >Email</label>
        <input type="text" name="email">
    </div>
       <div class="re-i">
        <label >Password</label>
        <input type="text" name="password"></div>
       
       <div class="re-i"><input type="file" name="image"></div>
       <div class="re-i"><button type="submit">Add Admin</button></div>
       
    </form>
    </section>
</body>
</html>