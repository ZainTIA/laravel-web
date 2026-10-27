<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $cv->nama }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: #f4f6f9;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #334155;
        }
        .cv-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05), 0 8px 10px -6px rgba(0,0,0,0.01);
            background: #ffffff;
            overflow: hidden;
        }
        .cv-sidebar {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            color: #f8fafc;
        }
        .avatar-box img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 4px solid rgba(255, 255, 255, 0.2);
        }
        .info-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            font-size: 0.9rem;
            color: #cbd5e1;
        }
        .info-item i {
            width: 20px;
            color: #38bdf8;
        }
        .section-title {
            position: relative;
            font-size: 1.1rem;
            font-weight: 700;
            color: #0f172a;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background: #0284c7;
            border-radius: 2px;
        }
        .timeline-item {
            position: relative;
            padding-left: 24px;
            border-left: 2px solid #e2e8f0;
            padding-bottom: 24px;
        }
        .timeline-item:last-child {
            border-left: 2px solid transparent;
            padding-bottom: 0;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -7px;
            top: 2px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #0284c7;
            border: 2px solid #fff;
        }
        @media print {
            .no-print { display: none !important; }
            body { background: #fff; padding: 0 !important; }
            .cv-card { box-shadow: none; border: 1px solid #ddd; }
        }
    </style>
</head>
<body class="py-4 py-md-5">

    <div class="container" style="max-width: 960px;">
        <!-- Navigasi & Tombol Aksi -->
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">
            <a href="{{ route('cv.index') }}" class="btn btn-outline-secondary rounded-pill px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Kembali
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-warning text-white rounded-pill px-3">
                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit CV
                </a>
                <button onclick="window.print()" class="btn btn-primary rounded-pill px-3">
                    <i class="fa-solid fa-print me-1"></i> Cetak / Download PDF
                </button>
            </div>
        </div>

        <!-- Card Utama CV -->
        <div class="cv-card">
            <div class="row g-0">
                <!-- Sidebar Profil (Kiri) -->
                <div class="col-12 col-md-4 cv-sidebar p-4 p-lg-5">
                    <div class="text-center mb-4">
                        <div class="avatar-box mb-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($cv->nama) }}&background=0284c7&color=fff&size=256"
                                 class="rounded-circle shadow-sm" alt="{{ $cv->nama }}">
                        </div>
                        <h3 class="h4 fw-bold text-white mb-1">{{ $cv->nama }}</h3>
                        <p class="text-info fw-medium mb-0">{{ $cv->profesi }}</p>
                    </div>

                    <hr class="border-secondary my-4">

                    <h6 class="text-uppercase fw-bold text-white-50 fs-7 mb-3" style="letter-spacing: 1px;">Kontak</h6>
                    <div class="info-item">
                        <i class="fa-solid fa-envelope"></i>
                        <span class="text-break">{{ $cv->email }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-phone"></i>
                        <span>{{ $cv->telepon }}</span>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>{{ $cv->lokasi }}</span>
                    </div>

                    <hr class="border-secondary my-4">

                    <h6 class="text-uppercase fw-bold text-white-50 fs-7 mb-3" style="letter-spacing: 1px;">Keahlian</h6>
                    <div class="d-flex flex-wrap gap-1">
                        @foreach(explode(',', $cv->keahlian) as $skill)
                            <span class="badge bg-secondary bg-opacity-25 text-light border border-secondary border-opacity-25 px-2 py-1 fs-7">
                                {{ trim($skill) }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <!-- Detail Utama (Kanan) -->
                <div class="col-12 col-md-8 p-4 p-lg-5">
                    <!-- Ringkasan Profil -->
                    <div class="mb-5">
                        <h5 class="section-title">Profil Ringkas</h5>
                        <p class="text-muted leading-relaxed mb-0" style="white-space: pre-line;">{{ $cv->tentang_saya }}</p>
                    </div>

                    <!-- Pengalaman Kerja -->
                    <div class="mb-5">
                        <h5 class="section-title">Pengalaman Kerja</h5>
                        <div class="timeline-item">
                            <p class="text-muted mb-0" style="white-space: pre-line;">{{ $cv->pengalaman_kerja }}</p>
                        </div>
                    </div>

                    <!-- Pendidikan -->
                    <div>
                        <h5 class="section-title">Pendidikan</h5>
                        <div class="timeline-item">
                            <p class="text-muted mb-0" style="white-space: pre-line;">{{ $cv->pendidikan }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
