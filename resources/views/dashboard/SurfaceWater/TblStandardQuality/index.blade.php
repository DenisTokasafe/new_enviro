@extends('dashboard.layouts.main')
@section('container')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Standard Quality Periode</h2>
        <a href="{{ route('standard-quality.create') }}" class="btn btn-primary">Tambah Data Baru</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>TSS</th>
                        <th>DO</th>
                        <th>Redox</th>
                        <th>Conductivity</th>
                        <th>Temperature</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->tss_standard }}</td>
                        <td>{{ $item->do_standard }}</td>
                        <td>{{ $item->redox_standard }}</td>
                        <td>{{ $item->conductivity_standard }}</td>
                        <td>{{ $item->temperatur_standard }}°C</td>
                        <td>
                            <form action="{{ route('standard-quality.destroy', $item->id) }}" method="POST">
                                <a href="{{ route('standard-quality.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection