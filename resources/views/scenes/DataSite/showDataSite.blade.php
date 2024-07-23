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
            @include('scenes.DataSite.ImageSite.showImageSite')
        </div>
        
        <div class="card mb-3 mt-0 custom-card">
            <h4 class="card-title">Site {{ $datasite->name }}</h4>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card custom-inner-card">
                            <div class="card-body custom-card-body">
                                <p class="card-text"><strong>Site ID:</strong> {{ $datasite->siteId }}</p>
                                <p class="card-text"><strong>Longitude:</strong> {{ $datasite->longitude }}</p>
                                <p class="card-text"><strong>Latitude:</strong> {{ $datasite->latitude }}</p>
                                <p class="card-text"><strong>Provinsi:</strong> {{ $datasite->provinsi }}</p>
                                <p class="card-text"><strong>Kabupaten:</strong> {{ $datasite->kabupaten }}</p>
                                <p class="card-text"><strong>Kecamatan:</strong> {{ $datasite->kecamatan }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card custom-inner-card">
                            <div class="card-body custom-card-body">
                                <p class="card-text"><strong>Terminal ID:</strong> {{ $datasite->terminalId }}</p>
                                <p class="card-text"><strong>Spotbeam:</strong> {{ $datasite->spotbeam }}</p>
                                <p class="card-text"><strong>LC:</strong> {{ $datasite->lc }}</p>
                                <p class="card-text"><strong>VSAT:</strong> {{ $datasite->vsat }}</p>
                                <p class="card-text"><strong>Tahun Pembangunan:</strong> {{ $datasite->tahun }}</p>
                                <p class="card-text"><strong>Tanggal OA:</strong> {{ $datasite->oa }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('scenes.DataSite.ProblemSite.showProblem')
        </div>
        <a href="{{ route('datasites.index') }}" class="btn btn-secondary">Back to Data Sites</a>
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
