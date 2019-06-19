@extends('master.master')
@section('content')
<div class="container" style="padding:20px">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <div class="invalid-feedback">{{$error}}</div>
                @endforeach
            @endif
            <form method="post">
                @csrf
                <div class="form-group">
                    <h4>Login form</h4>
                </div>
                <div class="form-group">
                    <label for="uname">Email:</label>
                    <input type="text" class="form-control" value="{{ old('mail') }}" name="mail" placeholder="Enter your email">
                    @if($errors->has('mail'))
                        <div style="color:red"><i>{{$errors->first('mail')}}</i></div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" value="{{ old('pwd') }}" name="pwd" placeholder="Enter password">
                    @if($errors->has('pwd'))
                        <div style="color:red"><i>{{$errors->first('pwd')}}</i></div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                @if($errors->has('errorlogin'))
                        <div style="color:red"><i>{{$errors->first('errorlogin')}}</i></div>
                @endif
            </form>

</div>
@stop