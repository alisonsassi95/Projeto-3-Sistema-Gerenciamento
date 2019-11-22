<link rel="stylesheet" type="text/css" href="../css/auth.css" >

<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">
            <img src="{{ asset('img/logo/logo.svg') }}" alt="">
        </div>
        <!-- /.login-logo -->

        <form action="authentication" method="post">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('user') ? 'has-error' : '' }}">
            <p>LOGIN</p>
                <input type="user" name="user" class="form-control" value="{{ old('user') }}"
                        placeholder="SEUEMAIL@PROVEDOR.COM.BR">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('user'))
                    <span class="help-block">
                        <strong>{{ $errors->first('user') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
              <p>SENHA</p>
                <input type="password" name="password" class="form-control"
                        placeholder="******">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <p class="forget">esqueci minha senha</p>

            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit"
                            class="btn btn-primary btn-block btn-flat">LOGAR</button>
                </div>
                
                <p class="singin">cadastrar-se</p>
                <!-- /.col -->
            </div>
        </form>
    </div>        <!-- /.login-box-body -->
</div><!-- /.login-box -->
    
    
@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop
