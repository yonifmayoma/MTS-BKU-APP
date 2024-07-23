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
                                <h4 class="card-title">Data Sites</h4>
                                <a href="{{ route('datasites.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Site
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
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
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Site ID</th>
                                            <th>Nama Site</th>
                                            <th>Longitude</th>
                                            <th>Latitude</th>
                                            <th>Provinsi</th>
                                            <th>Kabupaten</th>
                                            <th>Kecamatan</th>
                                            <th>Terminal ID</th>
                                            <th>Spotbeam</th>
                                            <th>LC</th>
                                            <th>VSAT</th>
                                            <th>Tahun Pembangunan</th>
                                            <th>Tanggal OA</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datasites as $datasite)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $datasite->siteId }}</td>
                                                <td>{{ $datasite->name }}</td>
                                                <td>{{ $datasite->longitude }}</td>
                                                <td>{{ $datasite->latitude }}</td>
                                                <td>{{ $datasite->provinsi }}</td>
                                                <td>{{ $datasite->kabupaten }}</td>
                                                <td>{{ $datasite->kecamatan }}</td>
                                                <td>{{ $datasite->terminalId }}</td>
                                                <td>{{ $datasite->spotbeam }}</td>
                                                <td>{{ $datasite->lc }}</td>
                                                <td>{{ $datasite->vsat }}</td>
                                                <td>{{ $datasite->tahun }}</td>
                                                <td>{{ $datasite->oa }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ route('datasites.show', $datasite->id) }}"
                                                            class="btn btn-info">View</a>
                                                        <a href="{{ route('datasites.edit', $datasite->id) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <form action="{{ route('datasites.destroy', $datasite->id) }}"
                                                            method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                    
                                                </td>
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

    <script>
        $(document).ready(function() {


            // Add Row
            $("#add-row").DataTable({
                pageLength: 5,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $("#addRowButton").click(function() {
                $("#add-row")
                    .dataTable()
                    .fnAddData([
                        $("#addName").val(),
                        $("#addPosition").val(),
                        $("#addOffice").val(),
                        action,
                    ]);
                $("#addRowModal").modal("hide");
            });
        });
    </script>
@endsection
