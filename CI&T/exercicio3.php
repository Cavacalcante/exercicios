<?php
  /**
   * Váriavel para salvar diretório do arquivo 
   * @name $folder
   */
  $folder = "./exercicio3";
  
  /**
   * Váriavel para salvar os arquivos encontrados no diretório
   * @name $files
   */
  $files = scandir($folder, 1);
  $files = array_diff($files, array("..","."));
  
  /**
   * Array para salvar as extensões dos arquivos
   * @name $extension
   */
  $extension = array();

  /**
    * Função para salvar todos os arquivos em um array
  */
  foreach($files as $key => $value){
    array_push($extension, getExtension($value));
  }

  /**
   * Função nativa do PHP para ordenar o array por valor
   * @return bool 
   */
  asort($extension);
  
  /**
    * Função para retornar a extesão de um arquivo
    * @return string
  */
  function getExtension($fileName){
    $retorno = array();
    $position = strrpos($fileName, ".");

    return substr($fileName, $position);
  }
?>

<html>
  <head>
    <title>Exercício 3</title>
  </head>
  <body>
    <?php foreach($extension as $key => $value) : ?>
      
      <p> <?= $value ?></p>
      
    <?php endforeach ?>
  </body>
</html>