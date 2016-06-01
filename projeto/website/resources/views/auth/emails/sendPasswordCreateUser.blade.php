
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
    <meta charset="utf-8">    
  </head>

  <body>
    <p>Olá <strong>{{ $user->name }}</strong>,</p> 
    <p>Foi criado no web site da Fatec Marília um usuário e senha para o seu acesso à área restrita do web site.</p>
    <p>Dados para efetuar o LOGIN:</p>
    <p>Usuário: <strong>{{$user->email}}</strong></p>
    <p>Senha: <strong>{{$user->plainPassword}}</strong></p>
    <p><strong>Por favor, não responda esse e-mail.</strong></p>
  </body>
</html>