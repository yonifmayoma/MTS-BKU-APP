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
                        <h4 class="card-title">New Ticket Detail</h4>
                    </div>
                    <div class="card-body">
                        <form id="siartrouble-form" action="{{ route('siartroubleticket.details.store', $ticket->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="tanggal">Date</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tindakan">Action</label>
                                <input type="text" name="tindakan" id="tindakan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Description</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="Sukses">Sukses</option>
                                    <option value="Gagal">Gagal</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="button" id="submit-btn" class="btn btn-primary">Submit</button>
                                <a href="{{ route('siartroubleticket.show', $ticket->id) }}" class="btn btn-secondary ml-2">Back to Ticket</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
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
                document.getElementById('siartrouble-form').submit();
            }
        });
    });
</script>
@endsection
