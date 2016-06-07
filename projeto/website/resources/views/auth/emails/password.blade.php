<p>Você solicitou que sua senha fosse redefinida no site da Fatec Marília</p>
Clique no link para redefinir sua senha: <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
