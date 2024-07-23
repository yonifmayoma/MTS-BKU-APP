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
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Trouble Ticket List</h4>
                        <a href="{{ route('topotroubleticket.create') }}" class="btn btn-primary btn-round ms-auto">
                            <i class="fa fa-plus"></i>
                            Add New Ticket
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tickets-table" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Site</th>
                                    <th>ID Site</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Problem</th>
                                    <th>Durasi</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ticket->site->name }}</td>
                                        <td>{{ $ticket->siteId }}</td>
                                        <td>{{ $ticket->provinsi }}</td>
                                        <td>{{ $ticket->kabupaten }}</td>
                                        <td>{{ $ticket->kecamatan }}</td>
                                        <td>{{ $ticket->problem }}</td>
                                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                        <td>{{ $ticket->priority }}</td>
                                        <td>{{ $ticket->status }}</td>
                                        <td>
                                            <a href="{{ route('topotroubleticket.show', $ticket->id) }}"
                                                class="btn btn-info btn-sm">View Details</a>
                                            <a href="{{ route('topotroubleticket.edit', $ticket->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('topotroubleticket.destroy', $ticket->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#tickets-table').DataTable({
                    pageLength: 10,
                });
            });
        </script>
    @endsection
