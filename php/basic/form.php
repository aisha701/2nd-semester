<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SUPERGLOBAL IN PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <style>
    .container{
        margin-top: 5rem;
    }
    h1{
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-style: italic;
        text-align: center;
        color: cornflowerblue;
        text-decoration: underline navy 3px;
    }
    input{
        width: 40rem;
       margin-left: 15rem;
       border: 1px solid cornflowerblue;
       border-radius: 2px;
    }
    input::placeholder{
        color: navy;
    }
    .submit{
        background-color:cornflowerblue;  
        border: 1px solid navy;
        color: white;
      }
  </style>
  <body>
<div class="container">
<h1>SUPERGLOBAL IN PHP</h1>
<form action="sumbit.php" method="post">
<input type="email" name="email" id="email" placeholder="Enter Your Email" required><br><br>
<input type="password" name="password" id="password" placeholder="Enter Password" required><br><br>
<input type="text" name="city" id="city" placeholder="Enter Your City" required><br><br>
<input type="number" name="number" id="number" placeholder="Enter Your Number" required><br><br>
<input type="text" name="username" id="username" placeholder="Enter Your Name" required><br><br>
<input type="number" name="age" id="age" placeholder="Enter Your Age" required><br><br>
<input type="submit" name="submit" value="submit" class="submit">


</form>
</div>







































    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>