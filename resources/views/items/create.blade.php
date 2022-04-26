@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="card">
          <div class="card-header">
            <span class="fw-bold"><i class="fas fa-map-marked"></i> Agregar Nuevo Artículo o Servicio</span>
          </div>
          <div class="card-body">
            <form action="{{ route('items.store') }}" method="POST">
              @csrf

              <div class="form-group row mb-3">
                <label for="description" class="col-md-3 col-form-label text-md-end">{{ __('Descripción') }}<span class="text-danger">*</span></label>
                <div class="col-md-7">
                  <input type="text"
                    name="description"
                    id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description') }}"
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
                    value="{{ old('cost') }}"
                    placeholder="Costo">

                  @error('cost')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row mb-3">
                <label for="sell_price" class="col-md-3 col-form-label text-md-end">{{ __('Precio') }}<span class="text-danger">*</span></label>
                <div class="col-md-7">
                  <input type="text"
                    name="sell_price"
                    id="sell_price"
                    class="form-control @error('sell_price') is-invalid @enderror"
                    value="{{ old('sell_price') }}"
                    placeholder="Precio"
                    required>

                  @error('sell_price')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="col-md-10 text-end">
                  <a href="{{ route('items.index') }}" class="btn btn-secondary me-1">{{  __('Cancelar') }}</a>
                  <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection