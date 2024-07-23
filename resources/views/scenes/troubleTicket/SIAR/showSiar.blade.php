@extends('layouts.main')

@section('content')
    <div class="containe">
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
            @if (session('success'))
                <script>
                    Swal.fire({
                        title: 'Success',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
            @endif
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Ticket Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <p><strong>Nama Site:</strong> {{ $ticket->site->name }}</p>
                                    <p><strong>ID Site:</strong> {{ $ticket->site_id }}</p>
                                    <p><strong>Provinsi:</strong> {{ $ticket->provinsi }}</p>
                                    <p><strong>Kabupaten:</strong> {{ $ticket->kabupaten }}</p>
                                    <p><strong>Kecamatan:</strong> {{ $ticket->kecamatan }}</p>
                                    <p><strong>Problem:</strong> {{ $ticket->problem }}</p>
                                    <p><strong>Deskripsi:</strong> {{ $ticket->deskripsi }}</p>
                                    <p><strong>Priority:</strong> {{ $ticket->priority }}</p>
                                    <p><strong>Status:</strong> {{ $ticket->status }}</p>
                                    <p><strong>Assigned By:</strong> {{ $ticket->assigned_by }}</p>
                                    <p><strong>Created At:</strong> {{ $ticket->created_at }}</p>
                                    <p><strong>Created By:</strong> {{ $ticket->created_by }}</p>
                                    <p><strong>Updated At:</strong> {{ $ticket->updated_at }}</p>
                                    <p><strong>Updated By:</strong> {{ $ticket->updated_by }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Ticket Actions</h4>
                                        {{-- <a href="#" --}}
                                        <a href="{{ route('siartroubleticket.details.create', $ticket->id) }}"
                                            class="btn btn-primary btn-round ms-auto">
                                            <i class="fa fa-plus"></i>
                                            Add New Ticket
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>Tindakan</th>
                                                    <th>Deskripsi</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ticket->details as $detail)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $detail->tanggal }}</td>
                                                        <td>{{ $detail->tindakan }}</td>
                                                        <td>{{ $detail->deskripsi }}</td>
                                                        <td>{{ $detail->status }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
