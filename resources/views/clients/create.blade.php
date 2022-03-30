@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <span class="fw-bold"><i class="fas fa-map-marked"></i> {{ __('Agregar Cliente') }}</span>
          </div>
          <div class="card-body">
            <form action="{{ route('clients.store') }}" method="post">
              @csrf

              <div class="form-group row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}<span class="text-danger">*</span></label>
                <div class="col-md-6">
                  <input type="text"
                    name="name"
                    id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    placeholder="Nombre del cliente"
                    required
                    autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row mb-3">
                <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>
                <div class="col-md-6">
                  <input type="text"
                    name="phone_number"
                    id="phone_number"
                    class="form-control @error('phone_number') is-invalid @enderror"
                    value="{{ old('phone_number') }}"
                    placeholder="Número de teléfono"
                    autofocus>

                  @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>              

              <div class="row">
                <div class="col-md-10 text-end">
                  <a href="{{ route('clients.index') }}" class="btn btn-secondary me-1">Cancelar</a>
                  <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection