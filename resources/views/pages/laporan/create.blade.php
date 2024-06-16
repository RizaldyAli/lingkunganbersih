@extends('layouts.dashboard.app')
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" crossorigin="" />
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
                        <a role="button" href="{{ route('laporan.index', ['kategori' => request()->segment(2)]) }}"
                            class="btn btn-light-primary btn-circle btn-xl d-inline-flex align-items-center justify-content-center">
                            <i class="fs-7 ti ti-arrow-left text-primary"></i>
                        </a>
                        <div class="d-flex align-items-end flex-column">
                            <div class="mb-2">
                                <h2 class="fw-bolder mb-0">Buat Laporan
                                    {{ ucwords(str_replace('-', ' ', request()->segment(2))) }}</h2>
                            </div>
                            <p class="card-subtitle text-end">
                                Menampilkan form untuk membuat laporan <span
                                    class="fw-bolder">{{ ucwords(str_replace('-', ' ', request()->segment(2))) }}</span> di
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
                            <img id="foto_preview" width="100%" height="500"
                                src="{{ asset('assets/dashboard/dist/images/placeholder/placeholder.jpg') }}"
                                style="object-fit: cover; object-position: center;" class="rounded" alt="Preview">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Lokasi</h5>
                            </div>
                            <div id="map" style="height: 500px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Form</h5>
                            </div>
                            <form action="{{ route('laporan.store', ['kategori' => request()->segment(2)]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
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
                                <label class="mb-2">Lokasi</label>
                                <div class="mb-2">
                                    <input type="hidden" name="lokasi" value="{{ old('lokasi') }}">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lokasi_type"
                                            id="lokasi_otomatis" value="otomatis" checked>
                                        <label class="form-check-label" for="lokasi_otomatis">Otomatis</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lokasi_type" id="lokasi_manual"
                                            value="manual">
                                        <label class="form-check-label" for="lokasi_manual">Manual</label>
                                    </div>
                                    @error('lokasi')
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
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" crossorigin=""></script>
    <script>
        $(document).ready(function() {
            const error = function(error) {
                console.error(error);
            };

            let map, marker;
            let savedLocation = null;

            function updateLocationPreview(latitude, longitude, draggable) {
                $('input[name="lokasi"]').val(JSON.stringify([latitude, longitude]));
                if (map) {
                    map.setView([latitude, longitude], 14);
                    if (marker) {
                        marker.setLatLng([latitude, longitude]);
                        marker.dragging[draggable ? 'enable' : 'disable']();
                    } else {
                        marker = L.marker([latitude, longitude], {
                            draggable: draggable
                        }).addTo(map);
                        marker.on('dragend', function(e) {
                            const latLng = marker.getLatLng();
                            $('input[name="lokasi"]').val(JSON.stringify([latLng.lat, latLng.lng]));
                        });
                    }
                } else {
                    map = L.map('map').setView([latitude, longitude], 14);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    marker = L.marker([latitude, longitude], {
                        draggable: draggable
                    }).addTo(map);
                    marker.on('dragend', function(e) {
                        const latLng = marker.getLatLng();
                        $('input[name="lokasi"]').val(JSON.stringify([latLng.lat, latLng.lng]));
                    });
                }
            }

            function enableManualLocation() {
                $('#map').show();
                if (savedLocation) {
                    updateLocationPreview(savedLocation[0], savedLocation[1], true);
                } else {
                    if (map) {
                        map.off();
                        map.remove();
                        map = null;
                    }
                    map = L.map('map').setView([-6.200000, 106.816666], 14); // Default location (Jakarta)
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);
                    map.on('click', function(e) {
                        if (marker) {
                            marker.setLatLng(e.latlng);
                        } else {
                            marker = L.marker(e.latlng, {
                                draggable: true
                            }).addTo(map);
                        }
                        $('input[name="lokasi"]').val(JSON.stringify([e.latlng.lat, e.latlng.lng]));
                    });
                }
            }

            function enableAutomaticLocation() {
                $('#map').show();
                navigator.geolocation.getCurrentPosition(function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    savedLocation = [latitude, longitude];
                    updateLocationPreview(latitude, longitude, false);
                }, error, {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                });
            }

            $('input[name="lokasi_type"]').change(function() {
                if ($(this).val() === 'manual') {
                    enableManualLocation();
                } else {
                    enableAutomaticLocation();
                }
            });

            // Default to automatic location on load
            enableAutomaticLocation();

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
@endpush
