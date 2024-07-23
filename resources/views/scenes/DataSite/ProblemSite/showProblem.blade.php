<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h4 class="card-title">Riwayat Problem</h4>
                <button type="button" class="btn btn-primary btn-round ms-auto" data-toggle="modal"
                    data-target="#addProblemModal">
                    <i class="fa fa-plus"></i> Add Problem
                </button>
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
                            <th>Riwayat Problem</th>
                            <th>Description</th>
                            <th>Petugas</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datasite->problemSites ?? [] as $problem)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $problem->riwayat_problem }}</td>
                                <td>{{ $problem->description }}</td>
                                <td>{{ $problem->petugas }}</td>
                                <td>{{ $problem->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#editProblemModal{{ $problem->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('problems.destroy', [$datasite->id, $problem->id]) }}"
                                        method="POST" style="display:inline-block;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-button">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal for edit problem -->
                            <div class="modal fade" id="editProblemModal{{ $problem->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="editProblemModalLabel{{ $problem->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProblemModalLabel{{ $problem->id }}">Edit
                                                Problem</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="{{ route('problems.update', [$datasite->id, $problem->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="riwayat_problem{{ $problem->id }}">Riwayat
                                                        Problem</label>
                                                    <input type="text" class="form-control"
                                                        id="riwayat_problem{{ $problem->id }}" name="riwayat_problem"
                                                        value="{{ $problem->riwayat_problem }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description{{ $problem->id }}">Description</label>
                                                    <textarea class="form-control" id="description{{ $problem->id }}" name="description">{{ $problem->description }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="petugas{{ $problem->id }}">Petugas</label>
                                                    <input type="text" class="form-control"
                                                        id="petugas{{ $problem->id }}" name="petugas"
                                                        value="{{ $problem->petugas }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status{{ $problem->id }}">Status</label>
                                                    <input type="text" class="form-control"
                                                        id="status{{ $problem->id }}" name="status"
                                                        value="{{ $problem->status }}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal for add problem -->
                <div class="modal fade" id="addProblemModal" tabindex="-1" role="dialog"
                    aria-labelledby="addProblemModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addProblemModalLabel">Add Problem</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('problems.store', $datasite->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="riwayat_problem">Riwayat Problem</label>
                                        <input type="text" class="form-control" id="riwayat_problem"
                                            name="riwayat_problem" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="petugas">Petugas</label>
                                        <input type="text" class="form-control" id="petugas" name="petugas"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" class="form-control" id="status" name="status"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Problem</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.delete-button').on('click', function(e) {
        e.preventDefault(); // Prevent form submission

        var form = $(this).closest('form'); // Get the form to submit

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // If confirmed, submit the form
            }
        });
    });
</script>
