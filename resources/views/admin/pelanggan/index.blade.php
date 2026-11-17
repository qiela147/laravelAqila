
@extends('layouts.admin.app')

@section('content')

<div class="py-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <div>
            <h1 class="h4 mb-1 fw-bold">Data Pelanggan</h1>
            <p class="text-muted mb-0">
                Kelola seluruh data pelanggan dengan mudah.
            </p>
        </div>

        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Tambah Pelanggan
        </a>
    </div>

    <!-- Card Statistik -->
    <div class="row mb-4">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-shape icon-shape-primary rounded me-3">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h6 class="text-gray-500 mb-1">Total Pelanggan</h6>
                        <h3 class="fw-bold mb-0">
                            {{ $dataPelanggan->total() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pelanggan -->
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header bg-white border-0 py-3">
            <h5 class="mb-0 fw-bold">
                <i class="fas fa-list me-2 text-primary"></i>
                Daftar Pelanggan
            </h5>
        </div>

        <div class="card-body">

<div class="table-responsive">
      <form method="GET" action="{{ route('pelanggan.index') }}" 
          <div class="row">
              <div class="col-md-2">
                  <select name="gender" class="form-select" onchange="this.form.submit()" class="mb-3">
                      <option value="">All</option>
                      <option value="Male" {{ request('gender')=='Male' ? 'selected' : '' }}>Male</option>
                      <option value="Female" {{ request('gender')=='Female' ? 'selected' : '' }}>Female</option>
                  </select>
              </div>

                <div class="col-md-3">
                <div class="input-group">
                <input type="text" name="search" class="form-control" id="exampleInputIconRight" value="{{request('search')}}" placeholder="Search" aria-label="Search">
                <button type="submit" class="input-group-text" id="basic-addon2">
                <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>

          </div>
      </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="bg-light">
                        <tr>
                            <th class="text-center">No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($dataPelanggan as $item)
                            <tr>
                                <td class="text-center">
                                    {{ $dataPelanggan->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-bold">
                                    {{ $item->first_name }}
                                </td>

                                <td>{{ $item->last_name }}</td>

                                <td>{{ $item->birthday }}</td>

                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $item->gender }}
                                    </span>
                                </td>

                                <td>{{ $item->email }}</td>

                                <td>{{ $item->phone }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}"
                                            class="btn btn-sm btn-warning text-white"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data pelanggan ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">
                                    <i class="fas fa-users fa-2x mb-2 d-block"></i>
                                    Belum ada data pelanggan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-between align-items-center flex-wrap mt-4">

                <small class="text-muted mb-2">
                    Menampilkan {{ $dataPelanggan->firstItem() ?? 0 }}
                    - {{ $dataPelanggan->lastItem() ?? 0 }}
                    dari {{ $dataPelanggan->total() }} data
                </small>

                <div>
                    {{ $dataPelanggan->links('pagination::bootstrap-5') }}
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
