@extends('layout.layout')

@section('content')
<br><br>
<div class="container">
  <form action="/form/update/{{$pos}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="exampleInputEmail1">Nombre:</label>
      <input type="text" class="form-control" name="name" value="{{ $usuarios['name']}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Apellido:</label>
      <input type="text" class="form-control" name="lastName" value="{{ $usuarios['lastName']}}" id="exampleInputPassword1" placeholder="apellido">
    </div>
    <div class="form-group">
      <label for="exampleCheck1">Libro favorito:</label>
      <input type="text" class="form-control" value="{{ $usuarios['libro']}}" name="libro" id="exampleCheck1">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</div>
@endsection