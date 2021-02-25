@extends('layout.main')
@section('head')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('contentId',"home")
@section('contentWrapperCss',"p-0")
@section('content')
{{-- section content: banner --}}
<div id="sc-banner" class="container-fluid p-0">
    <div class="container p-0">
        <div class="row">
            <div class="col-12 p-0">
                <div class="slider-wrapper">
                    <div class="home-slider" id="home-banner">
                        <img src="{{ asset('img/BANNER.jpg') }}" class="col-12 p-0" alt="" srcset="">
                        <img src="{{ asset('img/BANNER.jpg') }}" class="col-12 p-0" alt="" srcset="">
                        <img src="{{ asset('img/BANNER.jpg') }}" class="col-12 p-0" alt="" srcset="">
                    </div>
                    <div class="home-banner-nav">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- section content: products list --}}
<div id="sc-products" class="container-fluid">
    <div class="container">
        <div class="card-wrapper container">
            <h3>Brand Kendaraan</h3>
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
                    href="{{ route('home.products.brand',['brand_id'=>$d->id]) }}/">
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
        <div class="space my-5"></div>
    </div>
</div>
<div id="sc-testimoni" class="container-fluid">
    <div class="container">
        <div class="text-center">
            <h4 class="font-light">Bagaimana pendapat mereka tentang <b>Jatake Battery</b>?</h4>
        </div>
        <div class="card-wrapper slider-wrapper container my-5">
            <div class="home-slider">
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>
                                Barang sampai sesuai perhitungan. ana puas. kurirnya juga baik. semoga berkah dan awet.
                                maju terus gan.</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Yuliyanto</h5>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>
                                Barang good. langsung tokcer. mobilnya trims.</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Royanih</h5>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>
                                Order pagi, siangnya diantar by grab, harga bersaing, bergaransi 3 bulan, rekomen
                                banget, buat sekitaran Tangerang.</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Achmadi Lubis</h5>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>
                                Produk bagus lampu indikatornya biru artinya akinya OK</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Budi Setiono</h5>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>
                                Pengiriman cepat produk mantap</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Abdillah Yusak</h5>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>
                                Pengirimannya extra cepat bos, sejam nyampe.</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Dedi kurniawan</h5>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>
                                Barang sampai sesuai perhitungan. ana puas. kurirnya juga baik. semoga berkah dan awet.
                                maju terus gan.</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Yuliyanto</h5>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>

                                Barang cepet sampe. penjual responsif</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Bhansu</h5>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="testimo-photo">
                            <div class="photo-border">
                                <img src="{{ asset('img/star.jpg') }}" alt="" srcset="">
                            </div>
                        </div>
                        <div class="testimo-words">
                            <p>
                                Barang sudah sampai terimakasih</p>
                        </div>
                        <div class="testimo-name">
                            <h5>- Teguh iman</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(window).on('load',()=>{
            $.each($(".slider-wrapper .home-slider"),(i,el)=>{
                $slider = $(el)
                $config = {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    accessibility: true,
                    infinite: true,
                    useTransform: true,
                    dots: true,
                    cssEase: "cubic-bezier(0.77, 0, 0.18, 1)",
                }
                if($slider.attr('id') == 'home-banner')
                {
                    $config.slidesToShow = 1
                    $config.appendArrows = $slider.parent().find(".home-banner-nav")
                }
                $slider.slick($config);
            })

        // $(".home-slider").each((i,el)=>{
        // })

    })
</script>
<script src="http://portofolio.local/assets/v2/js/modules/newsletter-bundle.js"></script>
@endsection
