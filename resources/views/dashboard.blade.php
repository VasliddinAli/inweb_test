@extends('main')

@section('content')
<section class="content pt-1">
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$pages}}</h3>
                    <h6>Pages</h6>
                </div>
                <div class="icon">
                    <i class="fas fa-table-columns"></i>
                </div>
                <a href="{{ route('pages') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$categories}}</h3>
                    <h6>Categories</h6>
                </div>
                <div class="icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <a href="{{ route('categories') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$products}}</h3>
                    <h6>Products</h6>
                </div>
                <div class="icon">
                    <i class="fas fa-table"></i>
                </div>
                <a href="{{ route('products') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection