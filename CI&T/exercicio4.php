<?php
  /**
   * Váriaveis para salvar o erro do form
   */
  $errNome = $errSobrenome = $errEmail = $errTelefone = $errLogin = $errSenha = "";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $err = false;
    if(empty($_POST['nome'])){
      $errNome = "Campo é obrigatório";
      $err = true;
    }
    if(empty($_POST['sobrenome'])){
      $errSobrenome = "Campo é obrigatório";
      $err = true;
    }
    if(empty($_POST['email'])){
      $errEmail = "Campo é obrigatório";
      $err = true;
    }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
      $errEmail = "E-mail inválido";
      $err = true;
    }
    if(empty($_POST['telefone'])){
      $errTelefone = "Campo é obrigatório";
      $err = true;
    }else if(!preg_match('^\(+[0-9]{2,3}\) [0-9]{4}-[0-9]{4}$^', $_POST['telefone'])){
      $errTelefone = "Telefone inváildo.";
      $err = true;
    }
    if(empty($_POST['login'])){
      $errLogin = "Campo é obrigatório";
      $err = true;
    }
    if(empty($_POST['senha'])){
      $errSenha = "Campo é obrigatório";
      $err = true;
    }

    if(!$err){
      $informacoes = $_POST;
      $arquivo = "exercicio4.txt";
      $infoFinal = array();
      $informacoes["senha"] = md5($informacoes["senha"]);

      if(!file_exists($arquivo)){
        fopen($arquivo, "w");
      }
      
      $infoArquivo = json_decode(file_get_contents($arquivo), true);
      if(!$infoArquivo){
        array_push($infoFinal, $informacoes);
        file_put_contents($arquivo, json_encode($infoFinal));
      }else{
        foreach($infoArquivo as $key => $value){
          if($value["email"] == $informacoes["email"]){
            $errEmail = "Email já cadastrado";
          }else if($value["login"] == $informacoes["login"]){
            $errLogin = "Login já cadastrado";
          }
        }
        if($errEmail == '' && $errLogin == ''){
          array_push($infoArquivo, $informacoes);
          file_put_contents($arquivo, json_encode($infoArquivo));
        }
      }
    }
  }
?>

<html>
  <head>
    <title>Exercício 4</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <style>
      .error {color: #FF0000;}
    </style>
    <script>
      $(document).ready(function(){
        $("#telefone").mask("(00) 0000-0000");
      });
    </script>
  </head>
  <body>
    <fieldset>
      <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST" id="form">
        <div class="row">
          <div class="col-4">
              <label for="nome">Nome:</label><br>
              <input type="text" name="nome" id="nome">
              <span class="error">* <?= $errNome ?></span>
          </div>
          <div class="col-4">
            <label for="sobrenome">Sobrenome:</label><br>
            <input type="text" name="sobrenome" id="sobrenome">
            <span class="error">* <?= $errSobrenome ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
              <label for="email">E-mail:</label><br>
              <input type="text" name="email" id="email" data-validation="email">
              <span class="error">* <?= $errEmail ?></span>
          </div>
          <div class="col-4">
            <label for="telefone">Telefone:</label><br>
            <input type="text" name="telefone" id="telefone" placeholder="(00) 0000-0000">
            <span class="error">* <?= $errTelefone ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
              <label for="login">Login:</label><br>
              <input type="text" name="login" id="login">
              <span class="error">* <?= $errLogin ?></span>
          </div>
          <div class="col-4">
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="senha">
            <span class="error">* <?= $errSenha ?></span>
          </div>
        </div>
        <br>
        <div class ="row">
          <div class="col-12">
            <input type="submit" value="Enviar" class="btn btn-primary">
          </div>
        </div>
      </form>
    </fieldset>
  </body>
</html>