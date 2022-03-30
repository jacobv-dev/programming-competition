<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Statistika zaměstnanců</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  </head>
  <body>
    <table style="margin: auto; width: 50%; border: none;">
        <tr style="background: rgba(220,220,220, .75)"><th>ID</th><th>Místo</th><th>Rok založení</th><th>Ulice</th></tr>

      <?php
        $i = 1;
        $x = file("zamestnanci.csv");
        $csv2 = file("pobocka.csv");
        $sum = 0;

        foreach($csv2 as $b){ // POBOČKA

        $a = explode(",",$b);

        echo "<tr><td>".$a[0]. "</td><td class=\"$a[0]b\">" .$a[1]. "</td><td>" .$a[2]  . "</td><td class=\"$a[0]a\">" .$a[3] . "</td></tr>";

        $i++;
      } ?>
    </table>
      <table style="margin: auto; width: 70%; border: none;">
          <tr style="background: rgba(220,220,220, .75)"><th>ID</th><th>Jméno</th><th>Příjmení</th><th>Pozice</th><th>Plat</th><th>Pracoviště</th></tr>

          <?php
        foreach($x as $y){ // ZAMĚSTNANCI

        $z = explode(",",$y);

        // $sum = $z[2] + $sum; // Počítá výslednou sumu sloupečku s platy

        $tr_style = ($i%2 == 0)? 'background: rgba(240,128,128, .5)': 'background: rgba(144,238,144, .5)'; // Obarvuje řádky z CSV (na přidané html header a footer nemá vliv!)

        echo "<tr style='$tr_style'><td>".$z[0]. "</td><td>" .$z[1]. "</td><td>" .$z[2]  . "</td><td>" .$z[3]  . "</td><td>" . number_format(rand(25000, 50000), 0, ',', ' ') . " Kč</td><td class=\"$z[4]\">" .
$z[4]
        . "</td></tr>";

        $i++;

        }

        $prumer = $sum / count($x);
      ?>
      </table>
      <script src="app.js" charset="utf-8"></script>
  </body>
</html>
