<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="stylec.css">
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
<div class="wrapper">
    <form class="form-signin" action="controller/login.php" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="email" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="pass" placeholder="Password" required=""/>      
      <label class="checkbox">
         Don't have Account <a href="reg.php"> Register </a>
      </label>
      <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>   
    </form>
  </div>
</body>
</html>