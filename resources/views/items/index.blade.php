@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center mb-3">
      <div class="col-md-10 d-flex justify-content-between align-items-baseline">
        <h2>Repuestos & Servicios</h2>
        <div>
          <a href="{{ route('items.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Nuevo</a>
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
                  <th>Costo</th>
                  <th>Precio</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($items as $key => $item)
              <tr>
                <td class="align-middle text-center">{{ ($items->currentPage() - 1) * 10 + $key + 1 }}</td>
                <td class="align-middle">{{ $item->description }}</td>
                <td class="align-middle">{{ $item->current_price->cost_currency_format  }}</td>
                <td class="align-middle">{{ $item->current_price->price_currency_format }}</td>
                <td class="align-middle">
                  <a href="{{ route('items.edit', $item->id ) }}" class="btn btn-outline-primary btn-sm">Modificar</a>
                  <a href="{{ route('items.edit', $item->id ) . '?action=update' }}" class="btn btn-outline-dark btn-sm">Actualizar Precio</a>
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
