<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculator</title>
</head>

<body>
    <div class="wrap flexBox">
        <form action ="total.php" method="post">
            <input type="number" name="firstNum"></input>
            <select name="cal">
              <?php
              $tools =  ["+","-","*","/"];
              foreach ($tools as $value){
                echo "<option value=".$value.">".$value."</option>";
              };
              ?>$
            </select>
            <input type="number" name="secondNum"></input>
            <input type="submit" value="submit">
        </form>
    </div>
</body>
</html>