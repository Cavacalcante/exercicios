<?php
  /**
    * Função para retornar randômico de true ou false
    * @return bool
  */
  function foiMordido(){
    return rand(0, 1);
  }

  /*
    * Nesse caso, utilizando a função rand igual vocês falaram que pode ser útil, eu não consigo afirmar que Joãzinho mordeu ou não seu dedo 50% das vezes
    * Pensei em fazer uma função para retonar com certeza 50% das vezes, mas como foi solicitado a função rand, deixei assim mesmo.
  */
?>

<html>
  <head>
    <title>Exercício 2</title>
  </head>
  <body>
    <?php for($indice=0; $indice<=10; $indice++): ?>
      <?php if(foiMordido()) : ?>
        <p> Joãozinho mordeu seu dedo. </p>
      <?php else : ?>
        <p> Joãozinho não mordeu seu dedo. </p>
      <?php endif ?>
    <?php endfor ?>
  </body>
</html>