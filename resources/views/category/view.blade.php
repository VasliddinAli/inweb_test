    @extends('main')
    @section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Categories count: <b>{{ count($items) }}</b></h3>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end"><a href="{{ route('add.category') }}" class="btn btn-primary">Add category</a></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Short content</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><img src="{{ asset($item->image) }}" width="50px"></td>
                                        <td>{{ $item->short_content }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('edit.category', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger ml-2" onclick="return confirm('Are you delete? {{ $item->name }}')"><i class="fa-solid fa-trash"></i></a>
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
    </section>
    @endsection