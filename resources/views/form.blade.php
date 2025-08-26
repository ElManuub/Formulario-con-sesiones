@extends('layout.layout')

@section('content')
  <div class="container">
  <div>
    <h3><a href="/view">Tabla</a></h3>
  </div>
  <br>
  <div>

    </div>
  <form action="/view_form" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Nombre:</label>
      <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Apellido</label>
      <input type="text" class="form-control" name="lastName" id="exampleInputPassword1" placeholder="apellido">
    </div>
    <div class="form-group">
    <label for="exampleCheck1">Libro Favorito:</label>
      <input type="text" class="form-control" name="libro" id="exampleCheck1">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
  </div>

@endsection