@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center mb-3">
      <div class="col-md-10 d-flex justify-content-between align-items-baseline">
        <h2>Repuestos & Servicios</h2>
        <div>
          <a href="{{ route('items.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 table-responsive">
        <table class="table table-hover table-sm">
          <thead>
              <tr>
                  <th class="text-center">#</th>
                  <th>Descripción</th>
                  <th class="text-center">Costo</th>
                  <th class="text-center">Precio</th>
                  <th class="text-center">Acciones</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($items as $key => $item)
              <tr>
                <td class="align-middle text-center">{{ ($items->currentPage() - 1) * 10 + $key + 1 }}</td>
                <td class="align-middle">{{ $item->description }}</td>
                <td class="align-middle text-end">{{ $item->latestPrice->cost_currency_format  }}</td>
                <td class="align-middle text-end">{{ $item->latestPrice->price_currency_format }}</td>
                <td class="align-middle text-center">
                  <a href="{{ route('items.edit', $item->id ) }}" class="btn btn-primary btn-sm">Modificar</a>
                  <a href="{{ route('items.edit', $item->id ) . '?action=update' }}" class="btn btn-danger btn-sm">Nuevo Precio</a>
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
      {{ $items->links("pagination::bootstrap-4") }}
    </div>
  </div>  
@endsection
