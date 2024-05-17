@extends('main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-6">
            <div class="col-sm-6">
                <h1>Edit category</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                    <li class="breadcrumb-item active">Edit category</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <!-- <div class="card-header">
                    <h3 class="card-title">Edit category</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div> -->
                <div class="card-body">
                    <form method="POST" action="{{ route('update.category', $item->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ $item->title }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="short_content">Short content</label>
                            <input type="text" name="short_content" id="short_content" value="{{ $item->short_content }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" name="content" id="content" value="{{ $item->content }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('categories') }}" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Update" class="btn btn-success float-right">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <img src="{{ asset($item->image) }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection