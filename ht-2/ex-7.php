<?php
define(S1, "Карл у Клары украл Кораллы");
define(S2, "Две бутылки лимонада");

echo S1 . " -> " . str_replace("К", "", S1);
echo "<br>" . S2 . " -> " . str_replace("Две", "Три", S2);
