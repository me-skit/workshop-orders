@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center mb-3">
      <div class="col-md-10 d-flex justify-content-between align-items-baseline">
        <h2>Clientes</h2>
        <div>
          <a href="{{ route('clients.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Nuevo</a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <table class="table table-hover table-sm">
          <thead>
              <tr>
                  <th class="text-center">#</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($clients as $key => $client)
              <tr>
                <td class="align-middle text-center">{{ ($clients->currentPage() - 1) * 10 + $key + 1 }}</td>
                <td class="align-middle">{{ $client->name }}</td>
                <td class="align-middle">{{ $client->phone_number }}</td>
                <td>
                    <a href="{{ route('clients.edit', $client->id ) }}" class="btn btn-outline-primary btn-sm">Modificar</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-10 offset-md-1">
      {{ $clients->links("pagination::bootstrap-4") }}
    </div>
  </div>
@endsection