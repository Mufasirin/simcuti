<div class="row">

    @if (Auth::user()->bagian == '-' ||
            Auth::user()->jabatan == '-' ||
            Auth::user()->nip == '-')
        <div class="col-xl-12 col-md-6">
            <div class="card bg-danger text-white mb-4 d-flex justify-content-center align-items-center"
                style="min-height: 200px;">
                <div class="card-body text-center">
                    <i class="fas fa-lock fa-2x mb-3"></i> <!-- Icon -->
                    <div>
                        <div class="text-white lead">Konten ini terkunci</div>
                        <div class="text-white lead">Perbarui profil terlebih dahulu</div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <a class="small text-white stretched-link btn btn-dark" href="{{ route('profile.index') }}">Perbarui
                        Profil</a>
                </div>
            </div>

        </div>
    @else
        <div class="col-xl-6 col-md-6">

            <div class="card bg-primary text-white mb-4">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-calendar-alt fa-2x mr-3"></i> <!-- Icon -->
                    <div>
                        <div class="text-white lead">Sisa Cuti</div>
                        <div class="text-white lead">{{ 12 - $totalHari }} Hari</div> <!-- Numeric value -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cuti.index') }}">Lihat Detail</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-calendar-alt fa-2x mr-3"></i> <!-- Icon -->
                    <div>
                        <div class="text-white lead">Pengajuan Cuti</div>
                        <div class="text-white lead">{{ $totalHari }} Hari</div> <!-- Numeric value -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cuti.index') }}">Lihat Detail</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-check fa-2x mr-3"></i> <!-- Icon -->
                    <div>
                        <div class="text-white lead">Disetujui</div>
                        <div class="text-white lead">{{ $disetujuiCount }} Permintaan</div> <!-- Numeric value -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cuti.index') }}">Lihat Detail</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-sync-alt fa-2x mr-3"></i> <!-- Icon -->
                    <div>
                        <div class="text-white lead">Ditunda</div>
                        <div class="text-white lead">{{ $pendingCount }} Permintaan</div> <!-- Numeric value -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cuti.index') }}">Lihat Detail</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-sync-alt fa-2x mr-3"></i> <!-- Icon -->
                    <div>
                        <div class="text-white lead">Dibatalkan</div>
                        <div class="text-white lead">{{ $batalCount }} Permintaan</div> <!-- Numeric value -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cuti.index') }}">Lihat Detail</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-times-circle fa-2x mr-3"></i> <!-- Icon -->
                    <div>
                        <div class="text-white lead">Ditolak</div>
                        <div class="text-white lead">{{ $ditolakCount }} Permintaan</div> <!-- Numeric value -->
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('cuti.index') }}">Lihat Detail</a>
                    <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
