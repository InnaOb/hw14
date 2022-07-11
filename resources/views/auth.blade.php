<form method="post" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" value="" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" @if($errors->has('password')) is-ivalid @endif name="password"
               id="exampleInputPassword1" value="">
        <p>{{$errors->first('password')}}</p>
    </div>
    <button type="submit" class="btn btn-primary">Log in</button>
</form>

<p><a href="{{$oauth_dropbox_uri}}">Login with Dropbox</a></p>
