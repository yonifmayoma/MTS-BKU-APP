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
            <h1>Data Table</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('data.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="file" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Upload</button>
            </form>

            <div class="table-responsive mt-4">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Provinsi</th>
                            <th>Kabupaten/Kota</th>
                            <th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Site ID</th>
                            <th>Nama Site</th>
                            <th>Site ID Bakti</th>
                            <th>Terminal ID</th>
                            <th>Keterangan 3T</th>
                            <th>Tahun Pembangunan</th>
                            <th>Tower Owner</th>
                            <th>Tanggal OnAir</th>
                            <th>Project Phase</th>
                            <th>Site Penyiaran</th>
                            <th>Status</th>
                            <th>Tanggal Integrasi</th>
                            <th>Spotbeam</th>
                            <th>Mitra LC</th>
                            <th>Opsel</th>
                            <th>Vendor Opsel</th>
                            <th>Teknologi</th>
                            <th>Bandwidth Total (kbps)</th>
                            <th>Capacity Uplink (kbps)</th>
                            <th>Capacity Downlink (kbps)</th>
                            <th>Center Point GS</th>
                            <th>Center Point Topo</th>
                            <th>Longitude</th>
                            <th>Latitude</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- DataTables akan mengisi ini melalui AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('data.index') }}",
                    columns: [
                        {
                            data: 'Provinsi',
                            name: 'Provinsi'
                        },
                        {
                            data: 'Kabupaten_Kota',
                            name: 'Kabupaten_Kota'
                        },
                        {
                            data: 'Kecamatan',
                            name: 'Kecamatan'
                        },
                        {
                            data: 'Desa',
                            name: 'Desa'
                        },
                        {
                            data: 'Site_ID',
                            name: 'Site_ID'
                        },
                        {
                            data: 'Nama_Site',
                            name: 'Nama_Site'
                        },
                        {
                            data: 'Site_ID_Bakti',
                            name: 'Site_ID_Bakti'
                        },
                        {
                            data: 'Terminal_ID',
                            name: 'Terminal_ID'
                        },
                        {
                            data: 'Keterangan_3T',
                            name: 'Keterangan_3T'
                        },
                        {
                            data: 'Tahun_Pembangunan',
                            name: 'Tahun_Pembangunan'
                        },
                        {
                            data: 'Tower_Owner',
                            name: 'Tower_Owner'
                        },
                        {
                            data: 'Tanggal_OnAir',
                            name: 'Tanggal_OnAir'
                        },
                        {
                            data: 'Project_Phase',
                            name: 'Project_Phase'
                        },
                        {
                            data: 'Site_Penyiaran',
                            name: 'Site_Penyiaran'
                        },
                        {
                            data: 'Status',
                            name: 'Status'
                        },
                        {
                            data: 'Tanggal_Integrasi',
                            name: 'Tanggal_Integrasi'
                        },
                        {
                            data: 'Spotbeam',
                            name: 'Spotbeam'
                        },
                        {
                            data: 'Mitra_LC',
                            name: 'Mitra_LC'
                        },
                        {
                            data: 'Opsel',
                            name: 'Opsel'
                        },
                        {
                            data: 'Vendor_Opsel',
                            name: 'Vendor_Opsel'
                        },
                        {
                            data: 'Teknologi',
                            name: 'Teknologi'
                        },
                        {
                            data: 'Bandwidth_Total',
                            name: 'Bandwidth_Total'
                        },
                        {
                            data: 'Capacity_Uplink',
                            name: 'Capacity_Uplink'
                        },
                        {
                            data: 'Capacity_Downlink',
                            name: 'Capacity_Downlink'
                        },
                        {
                            data: 'Center_Point_GS',
                            name: 'Center_Point_GS'
                        },
                        {
                            data: 'Center_Point_Topo',
                            name: 'Center_Point_Topo'
                        },
                        {
                            data: 'Longitude',
                            name: 'Longitude'
                        },
                        {
                            data: 'Latitude',
                            name: 'Latitude'
                        }
                    ]
                });
            });
        </script>
    @endsection

  
