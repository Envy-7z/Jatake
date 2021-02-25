@extends('layout.main')
@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('contentId',"result")
@section('content')

{{-- section content: products list --}}
<div id="sc-products" class="container-fluid">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light px-0">
                <li class="breadcrumb-item">
                    <b><a class="text-primary" href="{{ url('') }}"><i class="fas fa-home"></i>&nbsp;Home</a></b></li>
                <li class="breadcrumb-item">Brand</li>
                <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($page) }}</li>
            </ol>
        </nav>
        <div class="card-wrapper container">
            <h3>Merk Kendaraan {{ ucfirst($page) }}</h3>
            <div class="row justify-content-md-start justify-content-around products-card-wrapper">
                @php
                if(empty($brands))
                {
                echo '
                <div class="col text-center">
                    <h4>Produk tidak ditemukan</h4>
                </div>';
                }

                foreach ($brands as $k => $d) {
                    // dd($d);
                if($k > 4)
                break;
                @endphp
                <a class="card brand-card mx-1 col-md-3 col-sm-4"
                    href="{{ route('home.products.brand.type',['brand_id'=>$d->id,'type'=>$page]) }}/">
                    <div class="card-img">
                        <img src="{{ @$d->img[0] }}">
                    </div>
                    <div class="card-header text-left">
                        <h5 class="product-name font-light mb-1">{{ @$d->brand->name }}</h5>
                        <h5 class="product-author">{{ $d->name }}</h5>
                    </div>
                </a>
                @php
                }
                @endphp
            </div>
        </div>
    </div>
</div>
@endsection
