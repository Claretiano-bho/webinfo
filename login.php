    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300&display=swap" rel="stylesheet"> 
    <link href="css/css_login.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Controle de Banner</title>
    </head>
    <body>
       
     <div id="caixa">
          <h1>AUTENTICAÇÃO</h1>
    <form action="valida_ad.php" method="post" name="formAD">
        <label for="usuario">MATRÍCULA:   </label></br>
    <input name="usuario" type="text" size="20" maxlength="30" placeholder="Matrícula Portal" class="entrada_dados"/>
        </br></br>
    <label for="senha">SENHA: </label></br>
    <input name="senha" type="password" size="20" maxlength="30" class="entrada_dados" placeholder="Senha Portal"/>
        </br></br>
    <input name="Enviar" type="submit" value="ENVIAR" class="botoes" />
    </form>
     </div>
    </body>
    </html>
