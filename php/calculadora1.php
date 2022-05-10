<?php 
      if(isset($_GET["numero1"]) and isset($_GET["numero2"]) and is_numeric($_GET["numero1"]) and is_numeric($_GET["numero2"])){
        if(isset($_GET["suma"])){
          $res = $_GET["numero1"] + $_GET["numero2"]; 
        } else if(isset($_GET["resta"])){
          $res = $_GET["numero1"] - $_GET["numero2"];
        } else if(isset($_GET["producto"])){
          $res = $_GET["numero1"] * $_GET["numero2"];
        } else if(isset($_GET["division"])){
          $res = $_GET["numero1"] / $_GET["numero2"];
        }else
          $res = "No se puede hacer la operación.";
      }else
        $res = "Faltan numeros";
     ?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Calculadora</title>
  <style>
    main {
      font-family: Arial;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    form {
      border: 2px solid lightgray;
      padding: 5px;
      display: inline-flex;
      align-items: center;
      background-color: lightblue;
    }
    fieldset {
      display: flex;
      flex-direction: column;
    }
    label {
      margin: 10px;
      display: flex;
      flex-direction: column;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <main>
    <?php echo $_GET["numero1"];
          echo "<br>";
          echo $_GET["numero2"]; ?>

    <h1>Calculadora</h1>
    <form action="" method="GET">
      <label><span>Dato 1</span><input type="text" name="numero1" placeholder="Introduce un número" value='<?php echo $_GET["numero1"]; ?>' /></label>
      <fieldset>
        <legend>Operación</legend>
        <input type="submit" name="suma" value="+">
        <input type="submit" name="resta" value="-">
        <input type="submit" name="producto" value="*">
        <input type="submit" name="division" value="/">
      </fieldset>
      <label><span>Dato 2</span><input type="text" name="numero2" placeholder="Introduce un número"/></label>
    </form>
    <section>
      <p>Resultado: <?php echo $res; ?></p>
    </section>
  </main>
</body>
</html>
