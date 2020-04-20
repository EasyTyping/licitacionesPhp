<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
<style>

body{
    background: black;
    font-weight: bold;
    font: 10px, Arial, Helvetica, sans-serif;
    color: #CCC;
}    
form {
    /* Sólo para centrar el formulario a la página */
    margin: 0 auto;
    width: 400px;
    /* Para ver el borde del formulario */
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
}
form div + div {
    margin-top: 1em;
}
label {
    /* Para asegurarse que todos los labels tienen el mismo tamaño y están alineados correctamente */
    display: inline-block;
    width: 90px;
    text-align: right;
}
.button {
    /* Para posicionar los botones a la misma posición que los campos de texto */
    padding-left: 120px; /* mismo tamaño a todos los elementos label */  
}
img {
    display: block;
    margin: 20px auto 40px;
}
</style>
</head>
<body>

<div id="apDiv1"><img src="aplication/img/logo.png" alt="" longdesc="https://enlace"></div>
<form action="./aplication/test_login.php" method="post">
  <div>
    <label for="name">User:</label>
    <input type="text" name="user"/>
  </div>
  <div>
    <label for="mail">Pass:</label>
    <input type="password" name="pass" />
  </div>
  <div>
  <div class="button">
     <button type="submit" name="boton">LOGIN</button>
  </div>
</form>

</body>
</html>

