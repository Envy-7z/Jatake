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
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item">{{ $brand->name }}</li>
                @if (!empty($page))
                <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($page) }}</li>
                @endif
            </ol>
        </nav>
        <div class="card-wrapper container">
            <h3>Produk Aki {{ ucfirst($page) }} {{ $brand->name }}</h3>
            <div class="row justify-content-md-start justify-content-around products-card-wrapper">
                @php
                if(empty($products))
                {
                echo '
                <div class="col text-center">
                    <h4>Produk tidak ditemukan</h4>
                </div>';
                }

                foreach ($products as $k => $d) {
                    // dd($d);
                if($k > 4)
                break;
                @endphp
                <a class="card brand-card mx-1 col-md-3 col-sm-4"
                    href="{{ route('home.products.show',['products'=>$d->id]) }}/">
                    <div class="card-img">
                        <img src="{{ @$d->img[0] }}">
                    </div>
                    <div class="card-header text-left">
                        <h5 class="product-name font-light mb-1">{{ @$d->brand->name }}</h5>
                        <h5 class="product-author">{{ $d->name }}</h5>
                        <h5 class="products-type mb-2">
                            <i class='{{ stripos($d->type,'mobil') !== false ? "fas fa-car":"fas fa-motorcycle" }}'></i>
                        </h5>
                        <h6 class="product-price font-bold text-blue">{{ formating($d->price,'price') }}</h5>
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
