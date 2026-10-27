<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Portfolio CV (1019)</title>
    <!-- Bootstrap 5 & FontAwesome Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f2f4f6;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #2e384d;
        }
        .card-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.04);
            background: #ffffff;
        }
        .table-custom thead {
            background-color: #1f2937;
            color: #ffffff;
        }
        .table-custom th {
            font-weight: 600;
            padding: 14px 16px;
            border: none;
        }
        .table-custom td {
            padding: 14px 16px;
            vertical-align: middle;
        }
        .avatar-circle {
            width: 40px;
            height: 40px;
            background: #e2e8f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #1f2937;
        }
        .badge-profesi {
            background-color: #e0f2fe;
            color: #0369a1;
            font-size: 0.82rem;
            padding: 5px 10px;
            border-radius: 6px;
            font-weight: 500;
        }
        .btn-action {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            transition: all 0.2s;
        }
        .btn-action:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="py-4 py-lg-5">

    <div class="container-fluid px-4" style="max-width: 1200px;">

        <!-- Header & Top Stats Bar -->
        <div class="row align-items-center mb-4">
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                        <i class="fa-solid fa-address-card fs-5"></i>
                    </div>
                    <div>
                        <h2 class="h4 fw-bold mb-0">Daftar Portfolio CV</h2>
                        <p class="text-muted small mb-0">Kelola dan kelola seluruh data CV kandidat (1019)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="{{ route('cv.create') }}" class="btn btn-primary px-3 py-2 rounded-3 shadow-sm fw-medium">
                    <i class="fa-solid fa-plus me-1"></i> Tambah CV Baru
                </a>
            </div>
        </div>

        <!-- Alert Notifikasi -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3 mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Card & Table Data -->
        <div class="card card-custom overflow-hidden">
            <div class="card-header bg-white py-3 px-4 border-bottom d-flex justify-content-between align-items-center">
                <span class="fw-bold text-dark">Total Data: <span class="badge bg-secondary">{{ count($cvs) }}</span></span>
            </div>

            <div class="table-responsive">
                <table class="table table-custom table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Kandidat</th>
                            <th>Profesi</th>
                            <th>Kontak</th>
                            <th>Lokasi</th>
                            <th class="text-center" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cvs as $index => $item)
                        <tr>
                            <td class="text-muted fw-bold">{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-circle">
                                        {{ strtoupper(substr($item->nama, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $item->nama }}</div>
                                        <span class="text-muted fs-7">ID: #CV-{{ $item->id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge-profesi">
                                    <i class="fa-solid fa-briefcase me-1"></i> {{ $item->profesi }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex flex-column fs-7">
                                    <span class="text-dark"><i class="fa-solid fa-envelope me-1 text-muted"></i> {{ $item->email }}</span>
                                    <span class="text-muted"><i class="fa-solid fa-phone me-1"></i> {{ $item->telepon }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="text-secondary fs-7">
                                    <i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $item->lokasi }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('cv.show', $item->id) }}" class="btn btn-action btn-info text-white" title="Lihat CV">
                                        <i class="fa-solid fa-eye fs-7"></i>
                                    </a>
                                    <a href="{{ route('cv.edit', $item->id) }}" class="btn btn-action btn-warning text-white" title="Edit CV">
                                        <i class="fa-solid fa-pen-to-square fs-7"></i>
                                    </a>
                                    <form action="{{ route('cv.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus CV ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-action btn-danger" title="Hapus CV">
                                            <i class="fa-solid fa-trash fs-7"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-folder-open fs-1 d-block mb-3 opacity-25"></i>
                                Belum ada data CV yang ditambahkan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
