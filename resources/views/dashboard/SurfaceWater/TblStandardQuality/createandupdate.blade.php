@extends('dashboard.layouts.main')
@section('container')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $tittle }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('standard-quality.index') }}">{{ $tittle }}</a></li>
                        <li class="breadcrumb-item active">{{ $data->exists ? 'Edit' : 'Input' }} Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card {{ $data->exists ? 'card-warning' : 'card-primary' }} card-outline">
                <div class="card-header">
                    <h3 class="card-title">Form {{ $data->exists ? 'Edit' : 'Create' }}</h3>
                </div>
                <div class="card-body">
                    {{-- Action berubah otomatis berdasarkan apakah model sudah ada di DB atau belum --}}
                    <form action="{{ $data->exists ? route('standard-quality.update', $data->id) : route('standard-quality.store') }}" 
                          method="post" enctype="multipart/form-data" autocomplete="off">
                        
                        @csrf
                        {{-- Method PUT hanya muncul saat Edit --}}
                        @if($data->exists)
                            @method('PUT')
                        @endif

                        <div class="row">
                            {{-- Field TSS --}}
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">TSS Standard</label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="tss_standard" 
                                               value="{{ old('tss_standard', $data->tss_standard) }}" 
                                               class="form-control form-control-sm @error('tss_standard') is-invalid @enderror">
                                        @error('tss_standard') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Field PH Min --}}
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">PH Min Standard</label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="ph_min_standard" 
                                               value="{{ old('ph_min_standard', $data->ph_min_standard) }}" 
                                               class="form-control form-control-sm @error('ph_min_standard') is-invalid @enderror">
                                        @error('ph_min_standard') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- Field PH Max --}}
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">PH Max Standard</label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="ph_max_standard" 
                                               value="{{ old('ph_max_standard', $data->ph_max_standard) }}" 
                                               class="form-control form-control-sm @error('ph_max_standard') is-invalid @enderror">
                                        @error('ph_max_standard') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Field DO --}}
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">DO Standard</label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="do_standard" 
                                               value="{{ old('do_standard', $data->do_standard) }}" 
                                               class="form-control form-control-sm @error('do_standard') is-invalid @enderror">
                                        @error('do_standard') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Field Redox --}}
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Redox Standard</label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="redox_standard" 
                                               value="{{ old('redox_standard', $data->redox_standard) }}" 
                                               class="form-control form-control-sm @error('redox_standard') is-invalid @enderror">
                                        @error('redox_standard') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Field Conductivity --}}
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Conductivity Standard</label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="conductivity_standard" 
                                               value="{{ old('conductivity_standard', $data->conductivity_standard) }}" 
                                               class="form-control form-control-sm @error('conductivity_standard') is-invalid @enderror">
                                        @error('conductivity_standard') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Field Temperatur --}}
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">Temperatur Standard</label>
                                    <div class="col-sm-8">
                                        <input type="text"  name="temperatur_standard" 
                                               value="{{ old('temperatur_standard', $data->temperatur_standard) }}" 
                                               class="form-control form-control-sm @error('temperatur_standard') is-invalid @enderror">
                                        @error('temperatur_standard') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('standard-quality.index') }}" class="btn btn-secondary btn-xs mr-2">Back</a>
                            <button type="submit" class="btn {{ $data->exists ? 'btn-warning' : 'btn-primary' }} btn-xs">
                                {{ $data->exists ? 'Update' : 'Create' }}
                                <i class="fas {{ $data->exists ? 'fa-save' : 'fa-folder-plus' }} ml-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection