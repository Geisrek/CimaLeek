<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="styles/signin-styles.css">
</head>
<body>
<header>
      <h1>CimaLeek</h1>
    </header>
    <section class="si-b">
       <form action="actions/signinAct.php" method="post" class="si-f"  >
       
        <div class="si-i">
            <lab>Email</lab>
            <input type="text" name="email">
        </div>
        <div class="si-i">
            <lab>Password</lab>
            <input type="text" name="password">
        </div>
       
        <div class="si-i">
           <button type="submit">Sign in</button>
        </div>
       </form>
    </section>
</body>
</html>