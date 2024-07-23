@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Site</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Create Topo Trouble Ticket</h4>
                            </div>
                        </div>
                        <div>
                            <form action="{{ route('topotroubleticket.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="site_id">Nama Site</label>
                                    <select name="site_id" id="site_id" class="form-control">
                                        <option value="" disabled selected>Pilih Site</option>
                                        @foreach ($dataSites as $dataSite)
                                            <option value="{{ $dataSite->id }}">{{ $dataSite->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" name="provinsi" id="provinsi" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" name="kabupaten" id="kabupaten" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" name="kecamatan" id="kecamatan" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="problem">Problem</label>
                                    <select name="problem" id="problem" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="priority">Priority</label>
                                    <select name="priority" id="priority" class="form-control">
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Open">Open</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="assigned_by">Assigned By</label>
                                    <select name="assigned_by" id="assigned_by" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group text-start">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('topotroubleticket.index') }}" class="btn btn-secondary ms-3">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('site_id').addEventListener('change', function() {
        var siteId = this.value;

        fetch(`/get-site-details/${siteId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('provinsi').value = data.provinsi;
                document.getElementById('kabupaten').value = data.kabupaten;
                document.getElementById('kecamatan').value = data.kecamatan;
            });
    });

        document.getElementById('submit-btn').addEventListener('click', function() {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menyimpan data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('topotroubleticket-form').submit();
                }
            })
        });
    </script>
@endsection



{{-- <div>
    <form id="topotroubleticket-form" action="{{ route('topotroubleticket.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="site_id">Nama Site</label>
            <select name="site_id" id="site_id" class="form-control">
                @foreach ($dataSites as $dataSite)
                    <option value="{{ $dataSite->id }}">{{ $dataSite->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Kolom yang akan terisi otomatis berdasarkan pilihan Nama Site -->

        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" id="provinsi" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="kabupaten">Kabupaten</label>
            <input type="text" name="kabupaten" id="kabupaten" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" id="kecamatan" class="form-control" readonly>
        </div>

        <!-- Input lain -->
        <div class="form-group">
            <label for="problem">Problem</label>
            <select name="problem" id="problem" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Closed">Closed</option>
            </select>
        </div>

        <div class="form-group mt-4">
            <button type="button" id="submit-btn" class="btn btn-primary">Submit</button>
            <a href="{{ route('topotroubleticket.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div> --}}
