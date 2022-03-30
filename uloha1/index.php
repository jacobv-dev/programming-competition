<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Generování provočísel</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <form method="post">
      <input type="number" name="cislo" value="1">
      <br>
      <input type="submit">
    </form>

    <?php

    $n = 32767; // Největší číslo 32767

    function cisla($n) {
      $primeNumbers = [1];
      for ($i = 1; $i <= $n; $i++) {
        $counter = 0; // Počítadlo
        for ($j = 1; $j <= $i; $j++) {
          if ($i % $j == 0) {
            $counter++;
          }
      }

      if ($counter == 2) {
        $primeNumbers[] = $i;
      }
    }

return json_encode($primeNumbers);
}

     if(isset($_POST["cislo"])) {

       $input = $_POST["cislo"];

       $c = cisla($n);
       $g = json_decode($c, true);

       if($input >= 1 && $input <= count($g)) {
         echo "<p class=\"odpoved\">Odpovídající prvočíslo je " . $g[$input - 1] . "</p>";
       } else {
         echo "<p class=\"odpoved\">Zadejte číslo od 1 do " . count($g) . "</p>";
       }
     }
    ?>
  </body>
</html>
