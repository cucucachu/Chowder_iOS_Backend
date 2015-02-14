
{{ Form::open(array('action' => 'AccountsController@new')) }}
{{ Form::text('username', 'username') }}
{{ Form::password('password', 'password') }}
{{ Form::text('password_again', 'retype password') }}
{{ Form::close() }}