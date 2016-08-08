<html>
  <head>
    <meta charset ="utf-8">
    <style>
     td {
       text-align:center;
       padding: 10px;
     }
    </style>
  </head>
  <body>
    <table>
        <?php
        echo "<tr>";
        echo "<td> </td>";

        for ($row = 1; $row < 11; $row++)
            echo "<td> <b> $row </b> </td>";
        echo "</tr>";
        for ($row = 1; $row < 11; $row++) {
            echo "<tr>";
            echo "<td> <b> $row </b> </td>";
            for ($col = 1; $col < 11; $col++) {
                if ($row % 2 == 0 && $col % 2 == 0) {
                  $left_paren = "(";
                    $right_paren = ")";
                }
                elseif ($row % 2 != 0 && $col % 2 != 0) {
                    $left_paren = "[";
                    $right_paren = "]";
                }
                else {
                    $left_paren = "";
                    $right_paren = "";
                }
                echo "<td> $left_paren" . $row * $col . "$right_paren </td>";
            }
            echo "<tr>";
        }
        ?>
    </table>
  </body>
</html>
