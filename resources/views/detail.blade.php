@extends('layout.main')
@section('head')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection
@section('title',"Detail Product")
@section('contentId',"product-detail")
@section('content')
@php
$product->label = !empty($product->label) ? $product->label : [];
$product->img = !empty($product->img) ? $product->img : [];
@endphp
<div class="col p-3 main-section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb shadow-sm border mx-5 bg-white px-3">
            <li class="breadcrumb-item">
                <b><a class="text-primary" href="{{ url('') }}"><i class="fas fa-home"></i>&nbsp;Home</a></b></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($product->short) ? $product->short : $product->id }}</li>
        </ol>
    </nav>
    <!--Detail Product-->
    <div class="row mx-5 mt-2 mb-4">
        <div class="col-md-5 border bg-white shadow-sm py-3 my-2">
            <div class="container">
                <div class="product-img">
                    @php
                    if(empty($product->img))
                    {
                    @endphp
                    <img src="no-souce" class="col-md-12">
                    @php
                    }
                    foreach ($product->img as $k => $v) {
                    @endphp
                    <img src="{{ $v }}" class="col-md-12">
                    @php
                    } @endphp
                </div>
                <div class="product-img-nav">
                    @php
                    if(empty($product->img))
                    {
                    @endphp
                    <img src="no-souce" class="col-md-12">
                    @php
                    }
                    foreach ($product->img as $k => $v) {
                    @endphp
                    <img height="50px" src="{{ $v }}" class="col-md-12">
                    @php
                    } @endphp
                </div>
            </div>
        </div>
        <div class="col-md-6 offset-md-1 my-2">

            <div class="row" id="product-header">
                <div class="card shadow-sm" style="width: 150rem;">
                    <div class="card-body">
                        <div class="float-right">
                            <small><i class="fas fa-eye"></i> Telah dilihat {{ $product->views }} kali</small>
                        </div>
                        <p class="card-title text-muted" style="font-display: montserrat">{{ $product->brand->name }}
                        </p>
                        <h4 class="card-text pb-3 text-muted">
                            {{ $product->name }}</h4>
                    </div>
                </div>
            </div>

            <div class="row my-4" id="product-label">
                <div class="card shadow-sm" style="width: 150rem;">
                    <div class="card-body">
                        <div class="row justify-content-md-around text-center">
                            <div class="col">
                                <img src="{{ asset('img/install.png') }}" alt="" srcset="" class="d-block mx-auto">
                                <b>GRATIS PASANG</b>
                            </div>
                            <div class="col">
                                <img src="{{ asset('img/battery.png') }}" alt="" srcset="" class="d-block mx-auto">
                                <b>BISA TUKAR TAMBAH</b>
                            </div>
                            <div class="col">
                                <img src="{{ asset('img/original.png') }}" alt="" srcset="" class="d-block mx-auto">
                                <b>PRODUK ASLI</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4" id="product-links">
                <div class="card shadow-sm" style="width: 150rem">
                    <div class="card-body">
                        <div class="card-text">
                            <h5>{{ formating($product->price,'price') }}</h5>
                        </div>
                        <p class="card-text">Pilih salah satu metode pembelian</p>
                        @if(empty($product->link))
                        <b>Tidak ada link ke product</b>
                        @endif
                        <button data-link="{{ !empty($product->link->tp) ? $product->link->tp : null}}"
                            class="btn-shop btn text-success btn-lg btn-circle {{ empty($product->link->tp) ? 'd-none' : null}}">
                            <span>
                                Tokopedia
                            </span>
                            <img src="{{ asset('img/tp.jpg') }}">
                        </button>
                        <button data-link="{{ !empty($product->link->bl) ? $product->link->bl : null}}"
                            class="btn-shop btn text-danger btn-lg btn-circle {{ empty($product->link->bl) ? 'd-none' : null}}">
                            <span>Bukalapak</span>
                            <img src="{{ asset('img/bl.jpg') }}">
                        </button>
                        <button
                            data-link="{{ !empty($product->link->wa) ? 'https://api.whatsapp.com/send?phone='.$product->link->wa.'&text='.rawurlencode('Halo, Saya ingin membeli '.$product->name.'.') : null}}"
                            class="btn-shop btn text-success btn-lg btn-circle {{ empty($product->link->wa) ? 'd-none' : null}}">
                            <span>Whatsapp</span>
                            <img src="{{ asset('img/wa.png') }}">
                        </button>
                        <button data-link="{{ !empty($product->link->sp) ? $product->link->sp : null}}"
                            class="btn-shop btn text-warning btn-lg btn-circle {{ empty($product->link->sp) ? 'd-none' : null}}">
                            <span>Shoopie</span>
                            <img src="{{ asset('img/sp.jpg') }}">
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mt-4" id="product-shortlink">
                <label for=""><span>
                        <h5>Share produk ini ke temanmu!</h5>
                    </span></label>
                <div class="input-group">
                    <input id="product-link" type="text" class="form-control" placeholder="Link"
                        value="{{ !empty($product->short) ? url('products/'.$product->short) : url('products/'.$product->id) }}">
                    <div class="input-group-append">
                        <button class="copylink btn btn-outline-primary" data-input="#product-link" type="button">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Review --}}
    <div class="row my-5">
        <div class="col-11 m-auto">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle='tab' role="tab" href="#detail-desc"
                                aria-expanded="false" aria-controls="product-description">Informasi Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle='tab' role='tab' href="#detail-review" aria-expanded="false"
                                aria-controls="detail-review">Ulasan</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="ulasan">
                    <div class="tab-pane fade show active" id="detail-desc">
                        <div class="p-4">
                            <h4>{{ $product->name }}</h4>
                            <div> {{ !empty($product->desc)?$product->desc : "Belum ada desc" }}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="detail-review">
                        <div class="p-4 ">
                            <div id="write-review" class="mt-2">
                                <h5>Tulis ulasan Anda sekarang!</h5>
                                <span>Anda akan menuliskan ulasan ke produk {{ $product->name }}. Bagaimana menurut Anda
                                    produk ini?</span>
                                <div class="mt-3">
                                    <button class="btn btn-primary review-modal ">Tulis Ulasan</button>
                                </div>
                            </div>
                        </div>

                        <div class="reviews-wrapper container">         
                            <div class="row mt-4 mb-4">
                                <div class="container">
                                    <h4 class="font-weight-bold">Ulasan Pembeli:</h4>
                                </div>
                            </div>
                            @foreach ($reviews as $review)
                            <div class="row my-4 reviews mx-3 ">
                                <div class="col-1 pb-3">
                                    <img src="{{asset('img/user-icon.png')}}" alt="" srcset="">
                                </div>
                                <div class="col-11">
                                    <span class="text-secondary text-muted font-weight-bold">
                                       {{ $review->email }}, {{ $review->created_at->format('H:i j M, Y') }}
                                    </span>
                                    <p>
                                        {{ $review->reviews }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recomended --}}
    <div class="row my-5">
        <div class="col-11 m-auto">
            <h4>Produk Rekomendasi</h4>
            <div class="mt-3 mx-1 row justify-content-md-start justify-content-around products-card-wrapper">
                @php
                foreach ($recomends as $k => $d) {

                @endphp
                <a class="card products-card mx-1 col-md-3 col-sm-4"
                    href="{{ url('products/') }}/{{ $d->short?$d->short:$d->id }}" data-type="{{ $d->type }}">
                    <div class="card-img">
                        <img src="{{ !empty($d->img[0]) ? $d->img[0] : '' }}">
                    </div>
                    <div class="card-header text-left">
                        <h5 class="product-name font-light mb-1">{{ @$d->brand->name }}</h5>
                        <h5 class="product-author">{{ $d->name }}</h5>
                        <h5 class="products-type mb-2">
                            @php
                            if($d->type == "motor"){
                            @endphp
                            <i class="fas fa-motorcycle"></i>
                            @php
                            }
                            else{
                            @endphp
                            <i class="fas fa-car"></i>
                            @php
                            }
                            @endphp
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

    {{-- Reviews Modal --}}
    <div class="modal fade" id="reviewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tulis Ulasan anda</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
                <input type="hidden" name="product_id" value="{{ $product-> id}}">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Email:</label>
                <input type="text" type="email" class="form-control" name="email" id="recipient-name" required>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Ulasan:</label>
                <textarea class="form-control" name="reviews" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary submit">Kirim Ulasan</button>
          </div>
        </div>
      </div>
    </div>

</div>
<script type="text/javascript" async>
    // $(window).on("load", () => {
    //     $("#ulasan").fadeOut("slow");
    // });
    function loadMenu(){
        $(window).on('load',()=>{
        $(".product-img").slick({
            // adaptiveHeight: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            respondTo: $('.product-img').parent(),
            accessibility: true,
            fade: false,
            asNavFor: ".product-img-nav",
            infinite: false,
            useTransform: true,
            cssEase: "cubic-bezier(0.77, 0, 0.18, 1)"
        });
        $(".product-img-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: false,
            asNavFor: ".product-img",
            dots: false,
            arrows: false,
            focusOnSelect: true
        });
    })
    }
    

    $(".review-modal").unbind().click((e) => {
        e.preventDefault();

        // console.log("execute brand-create")
        $this = $(e.currentTarget)
        $modal = ".modal#reviewsModal";
        $($modal).modal()
        $($modal).find(".submit").unbind().click((e) => {
            e.preventDefault();
           
            sendDataPost();
            window.location.reload(true);
        })
    })

    function sendDataPost(){
        var link = base_url + 'products/store_reviews';
        let $data = formHelper.getData($modal)

        $.ajax(link, {
            type: 'POST',
            dataType: "json",
			data: $data,
        })
        .done((res) => {
            show_alert('Brand Created!', null, null, null, null, () => {
               
            });
        })
        .fail((err) => {
            $($this).prop('disabled', false)
            show_alert('Create Brand Error!', '', err)
        })
    }
    loadMenu();
</script>

@endsection
