@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Edit Data Site</h1>

    <form action="{{ route('datasites.update', $datasite->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="siteId">Site ID:</label>
            <input type="text" class="form-control" id="siteId" name="siteId" value="{{ $datasite->siteId }}" required>
        </div>
        <div class="form-group">
            <label for="name">Nama Site:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $datasite->name }}" required>
        </div>
        <div class="form-group">
            <label for="longitude">Longitude:</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $datasite->longitude }}" required>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude:</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $datasite->latitude }}" required>
        </div>
        <div class="form-group">
            <label for="provinsi">Provinsi:</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $datasite->provinsi }}" required>
        </div>
        <div class="form-group">
            <label for="kabupaten">Kabupaten:</label>
            <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{ $datasite->kabupaten }}" required>
        </div>
        <div class="form-group">
            <label for="kecamatan">Kecamatan:</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{ $datasite->kecamatan }}" required>
        </div>
        <div class="form-group">
            <label for="terminalId">Terminal ID:</label>
            <input type="text" class="form-control" id="terminalId" name="terminalId" value="{{ $datasite->terminalId }}" required>
        </div>
        <div class="form-group">
            <label for="spotbeam">Spotbeam:</label>
            <input type="text" class="form-control" id="spotbeam" name="spotbeam" value="{{ $datasite->spotbeam }}" required>
        </div>
        <div class="form-group">
            <label for="lc">LC:</label>
            <input type="text" class="form-control" id="lc" name="lc" value="{{ $datasite->lc }}" required>
        </div>
        <div class="form-group">
            <label for="vsat">VSAT:</label>
            <input type="text" class="form-control" id="vsat" name="vsat" value="{{ $datasite->vsat }}" required>
        </div>
        <div class="form-group">
            <label for="tahun">Tahun Pembangunan:</label>
            <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $datasite->tahun }}" required>
        </div>
        <div class="form-group">
            <label for="oa">Tanggal OA:</label>
            <input type="date" class="form-control" id="oa" name="oa" value="{{ $datasite->oa }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('datasites.index') }}" class="btn btn-secondary mt-3">Back to Data Sites</a>
</div>
@endsection
