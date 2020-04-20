<?php

try{
    $conexion=new PDO("mysql:host=localhost; dbname=miDB", "root","");
    echo "<strong><font color='green'> Conexion OK</font><br>";
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="SELECT * FROM personal WHERE SUJETO= :user AND PASS= :password";
    //Preparamo la sentencia sql, prepare devuelve un Obj PDOStatement
    $result=$conexion->prepare($sql);
    //htmlentities — Convierto todos los caracteres aplicables a entidades HTML
    $usuario=htmlentities(addslashes($_POST["user"]));//se usa el "name" del formulario, no sirve el id
    $pass=htmlentities(addslashes($_POST["pass"]));// addslashes se encarga de escapar caracteres
    //Enlazo los valores de las variables con los valores de la consulta
    $result->bindValue(":user", $usuario); 
    $result->bindValue(":password", $pass);  
    //Ejecuto la consulta 
    $result->execute();
    //Si se ha encontrado el usuario la consulta nos devolvio 1 registro, en caso contrario 0
    if($result->rowCount()!=0){
        //Creamos una sesion para el usuario logueado
        session_start();
        $_SESSION["loqquiera"]=$usuario;
        header("location:/aplication/form_register.php");  
    }else
        //echo "<font color= red><br> ERROR";
        header("location:/login_office.php");       
    }catch(Exception $e){
    die("Error: ". $e->getMessage());
}finally{
    $base=null;
}




?>