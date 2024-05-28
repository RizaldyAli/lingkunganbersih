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
                                <h5 class="mb-0">Buat Laporan Sampah</h5>
                            </div>
                            <p class="card-subtitle text-end">
                                Menampilkan form untuk membuat laporan sampah di <code>lingkunganbersih.id</code>
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
                            <img id="foto_preview" width="100%" height="500" src="{{ Storage::url('placeholder/placeholder.png') }}"
                                style="object-fit: cover; object-position: center;" class="rounded" alt="Preview">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Lokasi</h5>
                            </div>
                            <iframe class="rounded" width="100%" height="500" frameborder="0" scrolling="no"
                                marginheight="0" marginwidth="0" id="lokasi_preview">
                            </iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Form</h5>
                            </div>
                            <form action="{{ route('sampah.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2">
                                    <input type="hidden" name="lokasi" value="{{ old('lokasi') }}">
                                    @error('lokasi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="judul" class="form-control" placeholder="Judul"
                                        value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <input type="file" name="foto" id="foto" class="form-control">
                                    @error('foto')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Kirim</button>
                            </form>
                        </div>
                    </div>
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
    @can('masyarakat-create')
        <script>
            $(document).ready(function() {
                const error = function(error) {
                    console.error(error);
                };

                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    $('input[name="lokasi"]').val(JSON.stringify([latitude, longitude]));
                    const url =
                        `https://maps.google.com/maps?q=${latitude},${longitude}&hl=id&z=14&output=embed`;
                    $('#lokasi_preview').attr('src', url);
                }, error, {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                });

                $('#foto').change(function() {
                    const file = $(this)[0].files[0];
                    const fileReader = new FileReader();
                    fileReader.onload = function(e) {
                        $('#foto_preview').attr('src', e.target.result);
                    }
                    fileReader.readAsDataURL(file);
                });
            });
        </script>
    @endcan
@endpush
