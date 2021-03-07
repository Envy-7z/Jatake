@extends('layout.blank')
@section('title',"Login Admin")
@section('bodyClass','bg-blue-dark')
@section('content')
<div class="container-fluid ">
    <div class="row">
        <div class="col-5 mx-auto text-center py-5">
            <div class="logo">
                <img width="250px" src="{{ asset('img/logo_white.png') }}" alt="" srcset="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card bg-light border-rad-05 border-0 pb-3">
                <div class="card-header border-bottom bg-light text-center py-4">
                    <h4 class="font-light">Login Halaman Admin</h4>
                </div>
                <div class="card-body py-3">
                    <div class="text-center">
                        <div class="col-md-10 mx-auto">
                            <small>Masuk ke halaman Admin dengan user dan password yang anda terima dari
                                developer</small>
                            <form class="form-cool mt-3" id="signin-form" method="POST" action="{{route("admin.authenticate")}}" >
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div> <input type="text" name="email" id="signin-email" class="form-control"
                                            placeholder="Username/Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-key"></i>
                                            </span>
                                        </div> <input type="password" name="password" id="signin-pass"
                                            class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <div class="input-group">
                                        <input type="checkbox" name="" id="">
                                        <div class="input-group-apppend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                    </div>
                                </div> --}}
                                <button class="btn btn-outline-primary mt-2" type="submit">Login</button>
                                <div class="my-3">
                                    <a href="http://" class="text-muted">Kembali ke Halaman Depan</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript" defer>
    $(window).ready(()=>{
    $('#signin-form').validate({
        errorPlacement: function(err, el) {
            err.appendTo( el.parents(".form-group") );
        },
        rules:{
            email: {
            required: true,
            email: true
            },
            password: {
            required: true,
            }
        },
        submitHandler: function(form) {
            
            let data = $(form).serializeArray();
            data = objectifyForm(data);
            console.log(data, 'data')
            $.post({
                url: '{{ route("admin.req_login") }}',
                dataType: 'json',
                data: data
            })
            .done(res=>{
                console.log(res, 'done');
                window.location.href = '/admin'
            })
            .fail(err=>{
                console.log(err);
                if(err.responseJSON.message)
                    swal.fire('Gagal Login!',err.responseJSON.message,'error')
                    else
                swal.fire('Gagal Login!',"Error tidak diketahui",'error')
            })
        }
    })
})
</script> --}}
@endsection
