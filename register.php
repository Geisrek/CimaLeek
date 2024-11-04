<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="styles/register-styles.css">
</head>
<body>

    <header>
      <h1>CimaLeek</h1>
    </header>
    <section class="re-b">
       <form action="actions/registerAct.php" method="post" class="re-f"  enctype="multipart/form-data">
        <div class="re-i">
            <lab>Name</lab>
            <input type="text" name="name">
        </div>
        <div class="re-i">
            <lab>Email</lab>
            <input type="text" name="email">
        </div>
        <div class="re-i">
            <lab>Password</lab>
            <input type="text" name="password">
        </div>
        <div class="re-i">
            <lab>Profile image</lab>
            <input type="file" name="image">
        </div>
        <div class="re-i">
           <button type="submit">Sign up</button>
        </div>
       </form>
    </section>
</body>
</html>