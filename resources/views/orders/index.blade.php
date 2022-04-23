@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center mb-3">
      <div class="col-md-10 d-flex justify-content-between align-items-baseline">
        <h2><i class="fas fa-map-marked-alt"></i> Ordenes de Trabajo</h2>
        <div>
          <a href="{{ route('orders.create') }}" class="btn btn-outline-success"><i class="fas fa-plus"></i> Nueva</a>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 table-responsive">
        <table class="table table-hover table-sm">
          <thead>
              <tr>
                  <th class="text-center">No.</th>
                  <th>Cliente</th>
                  <th>Descripción</th>
                  <th>Fecha</th>
                  <th>Totales</th>
                  <th>Acciones</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($orders as $order)
              <tr>
                <td  class="align-middle text-center">{{ $order->id }}</td>
                <td class="align-middle">{{ $order->client->name }}</td>
                <td class="align-middle">{{ $order->car_description }}</td>
                <td class="align-middle">{{ date_format($order->created_at, 'd/m/Y') }}</td>
                <td class="align-middle">{{ $order->total_currency_format }}</td>
                <td class="align-middle">
                  <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm">Detalles</a>
                  <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-outline-danger btn-sm">Editar</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection