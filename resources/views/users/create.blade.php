@extends("layouts.lte")

@section("title") Create New User @endsection

@section("content")
<div class="col-md-12">
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title text-center">General Elements</h3>
  </div>
    <div class="card-body">

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 

    <form enctype="multipart/form-data" action="{{route('users.store')}}" method="POST">
      @csrf
      <div class="row">
      <div class="col-md-5">
      <div class="form-group">
      <label for="name">Name</label>
      <input value="{{old('name')}}" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" type="text" name="name" id="name"/>
      <div class="invalid-feedback">
        {{$errors->first('name')}}
      </div>
      </div>
      <label for="email">Email</label>
      <input value="{{old('email')}}" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" placeholder="user@mail.com" type="text" name="email" id="email"/>
      <div class="invalid-feedback">
        {{$errors->first('email')}}
      </div>
      <br>

      <label for="password">Password</label>
      <input class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" placeholder="password" type="password" name="password" id="password"/>
      <div class="invalid-feedback">
        {{$errors->first('password')}}
      </div>
      <br>

      <label for="password_confirmation">Password Confirmation</label>
      <input class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" placeholder="password confirmation" type="password" name="password_confirmation" id="password_confirmation"/>
      <div class="invalid-feedback">
        {{$errors->first('password_confirmation')}}
      </div>
      <br>

      <input class="btn btn-primary" type="submit" value="Save"/>
      </div>

      <hr class="my-4">
      <div class="col-md-5 offset-md-1">
      <div class="form-group">
      <label for="">Roles</label><br>
        <input class="{{$errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="ADMIN" value="ADMIN"> <label for="ADMIN">Administrator</label>
      
      <input class="{{$errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="STAFF" value="STAFF"> <label for="STAFF">Staff</label>
      <input class="{{$errors->first('roles') ? "is-invalid" : "" }}" type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER"> <label for="CUSTOMER">Customer</label>
      <div class="invalid-feedback">
        {{$errors->first('roles')}}
      </div>
    </div>
    <div class="form-group">
      <label for="phone">Phone number</label> 
      
      <input value="{{old('phone')}}" type="text" name="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}} ">
      <div class="invalid-feedback">
        {{$errors->first('phone')}}
      </div>
      </div>
      <div class="form-group">
      <label for="address">Address</label>
      <textarea name="address" id="address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">{{old('address')}}</textarea>
      <div class="invalid-feedback">
        {{$errors->first('address')}}
      </div>
      </div>

      <div class="form-group">
      <label for="avatar">Avatar image</label>
      
      <input id="avatar" name="avatar" type="file" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}">
      <div class="invalid-feedback">
        {{$errors->first('avatar')}}
      </div>
      </div>
      
      </div>
      </div>
    </form>
  </div>
</div>
</div>
@endsection