<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fatec Marília</title>

    <!-- Bootstrap -->
    <link href="/assets/template-restrict/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/template-restrict/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/assets/template-restrict/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">                
          
        <div class="animate form login_form">
          <section class="login_content">
              @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            {!! Form::open(['url' => '/login', 'method' => 'post', 'role' => 'form']) !!}
                <h1>Área restrita</h1>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div>
                        {!! Form::email('email', $value = old('email') , ['class' => 'form-control', 'placeholder' => 'E-mail', 'required' => 'true']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha', 'required' => 'true']) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
              <div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-sign-in"></i> Entrar</button>
                <a href="#signup" class="to_register"> Esqueci minha senha </a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-graduation-cap"></i> Fatec Marília</h1>
                  <p>©2016 Todos os direitos reservados.</p>
                  <h6>Gentelella Alela! is a Bootstrap 3 template.</h6>
                </div>  
              </div>
            {!! Form::close() !!}
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
              @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
             @endif
                
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}               
              <h1>Redefinir senha</h1>              
              
              <div>
                  <strong>Informe o endereço de e-mail cadastrado no sistema para que um link de redefinição de senha seja enviado à você.</strong>
                </div>
              <br/>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail</label>

                    <div class="col-md-8">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-envelope"></i> Enviar link
                        </button>
                    </div>
                </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Já possui um usuário ?
                  <a href="#signin" class="to_register"> Entrar </a>
                </p>
                
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i> Fatec Marília</h1>
                  <p>©2016 Todos os direitos reservados.</p>
                  <h6>Gentelella Alela! is a Bootstrap 3 template.</h6>
                </div>  
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>