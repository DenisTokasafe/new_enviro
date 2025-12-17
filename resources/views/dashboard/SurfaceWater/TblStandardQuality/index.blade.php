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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Standard Quality</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible form-inline m-2">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5 class="mr-2"><i class="icon fas fa-check"></i> Success</h5>
                                {{ session('success') }}
                            </div>
                        @endif

                        <h3 class="card-title">
                            <a href="{{ route('standard-quality.create') }}" class="btn bg-gradient-secondary btn-xs">
                                <i class="fas fa-plus mr-1"></i>Add Data
                            </a>
                           
                        </h3>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs mb-2" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-physical-tab" data-toggle="pill" href="#tab-physical"
                                    role="tab text-dark"> Standard Quality</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade show active" id="tab-physical" role="tabpanel">
                                @if ($data->count())
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-sm text-center">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle">No</th>
                                                    <th class="align-middle">TSS Standard</th>
                                                    <th class="align-middle">DO Standard</th>
                                                    <th class="align-middle">Redox Standard</th>
                                                    <th class="align-middle">Conductivity Standard</th>
                                                    <th class="align-middle">Temperature Standard</th>
                                                    <th class="align-middle">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1 + ($data->currentPage() - 1) * $data->perPage();
                                                @endphp
                                                @foreach ($data as $item)
                                                    <tr>
                                                         <td>{{ $no++ }}</td>
                                                        <td>{{ $item->tss_standard }}</td>
                                                        <td>{{ $item->do_standard }}</td>
                                                        <td>{{ $item->redox_standard }}</td>
                                                        <td>{{ $item->conductivity_standard }}</td>
                                                        <td>{{ $item->temperatur_standard }}°C</td>
                                                        <td>
                                                            <a href="{{ route('standard-quality.edit', $item->id) }}"
                                                                class="btn btn-outline-warning btn-xs">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('standard-quality.destroy', $item->id) }}"
                                                                method="POST" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-outline-danger btn-xs"
                                                                    onclick="return confirm('Are you sure?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="text-center mt-4">No Data Found</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if ($data->count())
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    Showing {{ $data->firstItem() }} to {{ $data->lastItem() }} of {{ $data->total() }}
                                    entries
                                </div>
                                <div class="col-sm-6">
                                    <div class="float-right">
                                        {{ $data->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

    {{-- Modal Import Excel --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Import Data Standard</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/import/standard-quality" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputFile">File input (Excel)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile"
                                        required>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
