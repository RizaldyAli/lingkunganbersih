@extends('layouts.dashboard.app')
@push('styles')
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('status'))
                <div class="alert customize-alert alert-dismissible border-primary text-primary fade show remove-close-icon mb-4"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="d-flex align-items-center font-medium me-3 me-md-0">
                        <i class="ti ti-info-circle fs-5 me-2 text-primary"></i>
                        {{ session('status') }}
                    </div>
                </div>
            @endif
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <a role="button" href="{{ route('sampah.index') }}"
                            class="btn btn-light-primary btn-circle btn-xl d-inline-flex align-items-center justify-content-center">
                            <i class="fs-7 ti ti-arrow-left text-primary"></i>
                        </a>
                        <div class="d-flex align-items-end flex-column">
                            <div class="mb-2">
                                <h5 class="mb-0">{{ $laporan->judul }}</h5>
                            </div>
                            <p class="card-subtitle text-end">
                                Menampilkan detail {{ $laporan->judul }} yang terlaporkan di
                                <code>lingkunganbersih.id</code>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Foto</h5>
                            </div>
                            @if (Storage::disk('public')->exists($laporan->foto))
                                <img src="{{ Storage::url($laporan->foto) }}"
                                    style="width: 100%; height: 500px; object-fit: cover; object-position: center;"
                                    class="img-fluid rounded" alt="{{ $laporan->judul }}">
                            @else
                                <img src="{{ Storage::url('placeholder/placeholder.jpg') }}"
                                    style="width: 100%; height: 500px; object-fit: cover; object-position: center;"
                                    class="img-fluid rounded" alt="{{ $laporan->judul }}">
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Lokasi</h5>
                            </div>
                            <iframe class="rounded" width="100%" height="500" frameborder="0" scrolling="no"
                                marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?q={{ $laporan->lokasi->latitude }},{{ $laporan->lokasi->longitude }}&hl=id&z=14&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Informasi</h5>
                            </div>
                            <dl class="row mb-0">
                                <dt class="col-sm-4 text-muted">Judul</dt>
                                <dd class="col-sm-8">
                                    {{ $laporan->judul }}
                                </dd>
                                <dt class="col-sm-4 text-muted">Deskripsi</dt>
                                <dd class="col-sm-8">
                                    {{ $laporan->deskripsi }}
                                </dd>
                                <dt class="col-sm-4 text-muted">Pelapor</dt>
                                <dd class="col-sm-8">
                                    {{ $laporan->user->name }}
                                </dd>
                                @can('masyarakat-read')
                                    <dt class="col-sm-4 text-muted">Status</dt>
                                    <dd class="col-sm-8">
                                        {{ $laporan->status }}
                                    </dd>
                                    <dt class="col-sm-4 text-muted">Keterangan</dt>
                                    <dd class="col-sm-8">
                                        {{ $laporan->keterangan }}
                                    </dd>
                                @endcan
                            </dl>
                        </div>
                    </div>
                    @can('admin-update')
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2">
                                    <h5 class="mb-0">Tindakan</h5>
                                </div>
                                <form action="{{ route('sampah.update', $laporan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-select mb-2" name="status">
                                        @if ($laporan->status == 'DIKIRIM')
                                            <option selected disabled>Pilih...</option>
                                            <option value="DISETUJUI">DISETUJUI</option>
                                            <option value="DITOLAK">DITOLAK</option>
                                        @else
                                            @if ($laporan->status == 'DISETUJUI')
                                                <option value="DISETUJUI" selected>DISETUJUI</option>
                                            @endif
                                            @if ($laporan->status == 'DITOLAK')
                                                <option value="DITOLAK" selected>DITOLAK</option>
                                            @endif
                                        @endif
                                    </select>
                                </form>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @can('admin-update')
        <script>
            $(document).ready(function() {
                const statusValue = "{{ $laporan->status }}";
                const keteranganValue = "{{ $laporan->keterangan }}";
                if (statusValue === 'DIKIRIM') {
                    $('select[name="status"]').prop('disabled', false);
                    $('select[name="status"]').one('change', function() {
                        $(this).after(
                            '<textarea name="keterangan" class="form-control mb-2" placeholder="Keterangan"></textarea>'
                        );
                        $('textarea[name="keterangan"]').after(
                            '<button type="submit" class="btn btn-primary w-100 mb-2">Simpan</button>');
                    });
                } else {
                    $('select[name="status"]').prop('disabled', true);
                    $('select[name="status"]').after('<textarea name="keterangan" class="form-control mb-2">' +
                        keteranganValue + '</textarea>');
                    $('textarea[name="keterangan"]').prop('disabled', true);
                }
            });
        </script>
    @endcan
@endpush
