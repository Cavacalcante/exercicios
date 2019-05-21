<?php
  /**
   * Váriavel para salvar País e capital
   * @name $location
   */

   
  $location = array(
    "Brasil"      => "Brasília",
    "EUA"         => "Washington",
    "Espanha"     => "Madrid",
    "Alemanha"    => "Berlim",
    "Cuba"        => "Havana",
    "México"      => "Cidade do México",
    "Portugal"    => "Lisboa",
    "Peru"        => "Lima",
    "Reino Unido" => "Londres",
    "Rússia"      => "Moscovo"
  );
  
  /**
   * Função nativa do PHP para ordenar o array por valor
   * @return bool 
   */
  asort($location);
  
?>
<html>
  <head>
    <title>Exercício 1</title>
  </head>
  <body>
    <?php foreach($location as $key => $value): ?>
      <p>A capital do <strong><?= $key ?> </strong> é <strong><?= $value ?></strong>
    <?php endforeach?> 
  </body>
</html>