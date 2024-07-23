<!-- resources/views/imageSite.blade.php -->
<h4 class="card-title mt-3">Image Site</h4>
<div class="container mt-5 mb-0">
    <div class="row">
        @foreach ($datasite->images->take(3) as $image)
            <div class="col-md-4">
                <div class="card card-post card-round">
                    <img class="card-img-top" src="{{ asset('storage/' . $image->image_path) }}"
                        alt="Card image cap" data-toggle="modal" data-target="#imageModal{{ $image->id }}" />
                    <div class="card-body">
                        <div>
                            <h3 class="card-title">
                                {{ $image->description }}
                            </h3>
                            <p>{{ $image->upload_date }}</p>
                        </div>
                        <button type="button" class="btn btn-icon edit-btn" data-toggle="modal"
                            data-target="#editImageModal{{ $image->id }}">
                            <i class="far fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal for image preview -->
            <div class="modal fade" id="imageModal{{ $image->id }}" tabindex="-1" role="dialog"
                aria-labelledby="imageModalLabel{{ $image->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel{{ $image->id }}">
                                {{ $image->description }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid"
                                alt="Full Image">
                        </div>
                        <div class="modal-footer">
                            <p>{{ $image->upload_date }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for edit image -->
            <div class="modal fade" id="editImageModal{{ $image->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editImageModalLabel{{ $image->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editImageModalLabel{{ $image->id }}">Edit Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('images.update', [$datasite->id, $image->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="description{{ $image->id }}">Description</label>
                                    <input type="text" class="form-control" id="description{{ $image->id }}" name="description" value="{{ $image->description }}">
                                </div>
                                <div class="form-group">
                                    <label for="image_path{{ $image->id }}">Image</label>
                                    <input type="file" class="form-control" id="image_path{{ $image->id }}" name="image_path">
                                </div>
                                <div class="form-group">
                                    <label for="upload_date{{ $image->id }}">Upload Date</label>
                                    <input type="date" class="form-control" id="upload_date{{ $image->id }}" name="upload_date" value="{{ $image->upload_date }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
