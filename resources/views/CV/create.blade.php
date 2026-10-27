<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah CV Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container" style="max-width: 700px;">
        <div class="card border-0 shadow-sm p-4">
            <h4 class="fw-bold mb-4">Tambah Data CV</h4>
            <form action="{{ route('cv.store') }}" method="POST">
                @csrf
                <div class="mb-3"><label class="form-label">Nama</label><input type="text" name="nama" class="form-control" required></div>
                <div class="mb-3"><label class="form-label">Profesi</label><input type="text" name="profesi" class="form-control" required></div>
                <div class="row">
                    <div class="col-md-6 mb-3"><label class="form-label">Email</label><input type="email" name="email" class="form-control" required></div>
                    <div class="col-md-6 mb-3"><label class="form-label">Telepon</label><input type="text" name="telepon" class="form-control" required></div>
                </div>
                <div class="mb-3"><label class="form-label">Lokasi</label><input type="text" name="lokasi" class="form-control" required></div>
                <div class="mb-3"><label class="form-label">Tentang Saya</label><textarea name="tentang_saya" class="form-control" rows="3" required></textarea></div>
                <div class="mb-3"><label class="form-label">Keahlian</label><input type="text" name="keahlian" class="form-control" placeholder="Contoh: Laravel, Vue, Bootstrap" required></div>
                <div class="mb-3"><label class="form-label">Pengalaman Kerja</label><textarea name="pengalaman_kerja" class="form-control" rows="3" required></textarea></div>
                <div class="mb-3"><label class="form-label">Pendidikan</label><textarea name="pendidikan" class="form-control" rows="2" required></textarea></div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cv.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan CV</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
