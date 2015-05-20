
{{Form::open(['role'=>'form', 'route' => 'adminLogar.store'])}}
    <fieldset>
        <div class="form-group">
            <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{Input::old('email')}}" autofocus>
            {{ $errors->first('email') }}
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Password" name="password" type="password" value="{{Input::old('password')}}">
            {{ $errors->first('password') }}
        </div>
        <!-- Change this to a button or input when using this as a form -->
        {{Form::submit('Login',['class'=>'btn btn-lg btn-success btn-block'])}}
    </fieldset>
{{Form::close()}}