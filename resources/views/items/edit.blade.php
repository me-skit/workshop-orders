@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="card">
          <div class="card-header">
            <span class="fw-bold"><i class="fas fa-map-marked"></i>{{ $action ? 'Actualizar Item y Precio' : 'Modificar Artículo o Servicio' }} </span>
          </div>
          <div class="card-body">
            <form action="{{ route('items.update', $item->id) . ($action ? "?action=$action" : '') }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="form-group row mb-3">
                <label for="description" class="col-md-3 col-form-label text-md-end">{{ __('Descripción') }}<span class="text-danger">*</span></label>
                <div class="col-md-7">
                  <input type="text"
                    name="description"
                    id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description') ?? $item->description }}"
                    placeholder="Descripción del artículo o servicio"
                    required
                    autofocus>

                  @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row mb-3">
                <label for="cost" class="col-md-3 col-form-label text-md-end">{{ __('Costo') }}</label>
                <div class="col-md-7">
                  <input type="text"
                    name="cost"
                    id="cost"
                    class="form-control @error('cost') is-invalid @enderror"
                    value="{{ old('cost') ?? $current_price->cost }}"
                    placeholder="Costo">

                  @error('cost')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row mb-3">
                <label for="price" class="col-md-3 col-form-label text-md-end">{{ __('Precio') }}<span class="text-danger">*</span></label>
                <div class="col-md-7">
                  <input type="text"
                    name="price"
                    id="price"
                    class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price') ?? $current_price->price }}"
                    placeholder="Precio"
                    required>

                  @error('price')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-10 text-end">
                  <a href="{{ route('items.index') }}" class="btn btn-secondary me-1">{{  __('Cancelar') }}</a>
                  <button type="submit" class="btn btn-primary">{{ $action ? 'Actualizar' : 'Guardar' }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection