@extends('layout.layout')
@vite('resources/css/app.css')
@section('content')
<div class="container mx-auto">
  <div>
    <h3><a href="/form"><< Regresar</a></h3>
  </div>
  @if ($usuarios == null)
    <h2>No hay datos que mostrar</h2>
  @else
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Libro</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($usuariosEncriptados as $key => $usuarioEncriptado)
          <tr>
            <td>{{ $usuarioEncriptado['name'] }}</td>
            <td>{{ $usuarioEncriptado['lastName'] }}</td>
            <td>{{ $usuarioEncriptado['libro'] }}</td>
            <td>
              <a href="/form/edit/{{ $key }}">
                <img src="/icons/editar.png" alt="editar">
              </a>
            </td>
            <td>
              <a href="/form/delete/{{ $key }}">
                <img src="/icons/eliminar.png" alt="eliminar">
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

      <table class="crypt hidden table-striped table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Libro</th>
            <th>Editar</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usuarios as $key => $usuario)
            <tr>
              <td>{{ $usuario['name'] }}</td>
              <td>{{ $usuario['lastName'] }}</td>
              <td>{{ $usuario['libro'] }}</td>
              <td>
                <a href="/form/edit/{{ $key }}">
                  <img src="/icons/editar.png" alt="editar">
                </a>
              </td>
              <td>
                <a href="/form/delete/{{ $key }}">
                  <img src="/icons/eliminar.png" alt="eliminar">
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    <div class="flex flex-col">
      <h3 class="boton"><a href="#">Encriptar/Mostrar</a></h3>
      <h3><a href="/form/destroy">Eliminar tabla</a></h3>
      <h3><a href="/form">Agregar un nuevo libro</a></h3>
    </div>
  @endif

  <script>
    const table = document.querySelector('.table');
    const crypt = document.querySelector('.crypt');
    
    document.querySelector('.boton').addEventListener('click', (event) => {
      event.preventDefault();
      table.classList.toggle('hidden');
      crypt.classList.toggle('hidden');
    });
  </script>
</div>
@endsection
