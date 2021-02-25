@extends('layout.dashboard')
@section('content')
<div class="row">
    <h3 class="mt-5 mb-2">Product Manager</h3>
</div>
<div class="row">
    <div class="col p-3 main">
        <div class="d-block text-right">
            <button class="btn btn-success my-2" onclick="$('#add-product-modal').modal()">Add Product</button>
        </div>
        <div class="card">
            <div class="container px-2 py-4">
                <table class="align-middle mb-0 table table-bordered display" id="products-table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID/Short</th>
                            <th scope="col">Nama</th>
                            <th scope="col">brand</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('products-table',['data'=>$products])
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal modalbox" id="add-product-modal">
    <div class="modal-lg mx-auto mt-5">
        <div class="shadow-lv2 overflow-hidden rounded modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Product</h4>
            </div>
            <div class="modal-body">
                <form action="" class="" id="form-product">
                    <div class="form-row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Nama Product</label>
                                <input type="text" id="name-product" class="form-control" name='name'
                                    placeholder="(Wajib)" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">brand Product</label>
                                <input type="text" id="brand-product" class="form-control" name='brand'>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Shortener Product</label>
                                <input type="text" id="short-product" class="form-control" name='short'
                                    placeholder="(Optional)">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="type" id="type-product" class="form-control">
                                    <option value="motor" selected>Motor</option>
                                    <option value="mobil">Mobil</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input type="number" class="form-control" name="qty" id="qty-product">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" name="price" id="price-product">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group" id="img-product">
                                <label for="">Gambar</label>
                                <input type="text" class="mb-1 form-control" placeholder="Link Gambar 1">
                                <input type="text" class="mb-1 form-control" placeholder="Link Gambar 2">
                                <input type="text" class="mb-1 form-control" placeholder="Link Gambar 3">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" id="link-product">
                                <label for="">Link Toko</label>
                                <input type="text" class="mb-1 form-control" data-name="wa" id="wa-product"
                                    placeholder="Nomor WA (cnth: 628123456789)">
                                <input type="text" class="mb-1 form-control" data-name="tp" id="tp-product"
                                    placeholder="Link ke Tokopedia">
                                <input type="text" class="mb-1 form-control" data-name="bl" id="bl-product"
                                    placeholder="Link ke Bukalapak">
                                <input type="text" class="mb-1 form-control" data-name="sp" id="sp-product"
                                    placeholder="Link ke Shoppe">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">desc</label>
                        <textarea class='form-control' name="desc" id="desc-product" cols="30"
                            rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col text-left">
                                <button class="btn btn-secondary help-product">Bingung <i
                                        class="fas fa-question-circle"></i></button>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-warning reset-product">Reset</button>
                                <button class="btn btn-success save-product">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modalbox" id="edit-product-modal">
    <div class="modal-lg mx-auto mt-5">
        <div class="shadow-lv2 overflow-hidden rounded modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Product</h4>
            </div>
            <div class="modal-body">
                <form action="" class="" id="form-product">
                    @method('PUT')
                    <input type="hidden" name="id-product" id='id-product'>
                    <div class="form-row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Nama Product</label>
                                <input type="text" id="name-product" class="form-control" name='name'
                                    placeholder="(Wajib)" required>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">brand Product</label>
                                <input type="text" id="brand-product" class="form-control" name='brand'>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Shortener Product</label>
                                <input type="text" id="short-product" class="form-control" name='short'
                                    placeholder="(Optional)">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="type" id="type-product" class="form-control">
                                    <option value="motor" selected>Motor</option>
                                    <option value="mobil">Mobil</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input type="number" class="form-control" name="qty" id="qty-product">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" name="price" id="price-product">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group" id="img-product">
                                <label for="">Gambar</label>
                                <input type="text" class="mb-1 form-control" placeholder="Link Gambar 1">
                                <input type="text" class="mb-1 form-control" placeholder="Link Gambar 2">
                                <input type="text" class="mb-1 form-control" placeholder="Link Gambar 3">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" id="link-product">
                                <label for="">Link Toko</label>
                                <input type="text" class="mb-1 form-control" data-name="wa" id="wa-product"
                                    placeholder="Nomor WA (cnth: 628123456789)">
                                <input type="text" class="mb-1 form-control" data-name="tp" id="tp-product"
                                    placeholder="Link ke Tokopedia">
                                <input type="text" class="mb-1 form-control" data-name="bl" id="bl-product"
                                    placeholder="Link ke Bukalapak">
                                <input type="text" class="mb-1 form-control" data-name="sp" id="sp-product"
                                    placeholder="Link ke Shoppe">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">desc</label>
                        <textarea class='form-control' name="desc" id="desc-product" cols="30"
                            rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col text-left">
                                <button class="btn btn-secondary help-product">Bingung <i
                                        class="fas fa-question-circle"></i></button>
                            </div>
                            <div class="col text-right">
                                <button class="btn btn-warning reset-product">Reset</button>
                                <button class="btn btn-success save-product">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal modalbox" id="help-product-modal">
    <div class="modal-lg mx-auto mt-5">
        <div class="shadow-lv2 overflow-hidden rounded modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Bantuan Product</h4>
            </div>
            <div class="modal-body">
                <img src="{{ asset('img/help-01.PNG') }}">
            </div>
        </div>
    </div>
</div>

<script>
    $(window).on('load',() => {
        let dataTableSett = {
            language: {
                paginate: {
                previous: '<i class="fas fa-arrow-circle-left"></i>',
                next: '<i class="fas fa-arrow-circle-right"></i>'
                }
            }
        }
        $("#products-table").DataTable(dataTableSett)

        let serializeModal = function($modal,$filter=true)
        {
            let formData = $modal.find('#form-product').serializeArray();


            // push img to array
            let img = [];
            $modal.find("#img-product input").each((i,el)=>{
                $(el).val() ? img.push($(el).val()) : false
            })
            formData.push({name:'img',value:img})

            // push link to array
            let link = {};
            $modal.find("#link-product input").each((i,el)=>{
                $(el).val() ? link[$(el).data('name')] = $(el).val() : null
            })
            formData.push({name:'link',value:link})

            // filter null data
            if(!$filter)
                formData = formData.filter(arr=>{
                    return arr.value
                })
            else
            {
                formData = formData.map(arr=>{
                    (arr.value == null ) ? null
                    :(arr.value.length == 0) ? arr.value = "" : null
                    return arr
                })
            }

            return objectifyForm(formData)
        }
        let editModal = function($data)
        {
            if(!$data)
                return false
            let $modal = $("#edit-product-modal")

            $modal.find('#id-product').val($data.id);
            $modal.find('#name-product').val($data.name);
            $modal.find('#brand-product').val($data.brand)
            $modal.find('#short-product').val($data.short)
            $modal.find('#type-product').val($data.type)
            $modal.find('#qty-product').val($data.qty)
            $modal.find('#price-product').val($data.price)

            if($data.img)
                $modal.find('#img-product input').each((i,el)=>{
                    $(el).val($data.img[i])
                })
            if($data.link){
                $modal.find('#wa-product').val($data.link.wa)
                $modal.find('#tp-product').val($data.link.tp)
                $modal.find('#bl-product').val($data.link.bl)
            }
            $modal.find('#desc-product').val($data.desc)
            $modal.find('.save-product').click(function(e){
                e.preventDefault()
                let json = serializeModal($modal)
                // console.log(json);

                $.ajax({
                    method: "PUT",
                    url: "{{ url('/products/') }}/"+$data.id,
                    dataType: 'json',
                    data: json
                })
                .done((res)=>{
                    console.log(res);

                    if(!res.data)
                        swal.fire('Gagal Menyimpan','Coba lagi','error')
                    else
                        swal.fire('Berhasil Menyimpan!','Data telah tersimpan','success')
                        .then(()=>{
                            window.location.reload()
                        })
                })
                .fail((res)=>{
                    console.log(res)
                    swal.fire('Gagal Menyimpan',res.responseJSON.message,'error')
                })
            })
            $modal.modal()
        }
        $(".edit-product").click(function(e)
        {
            e.preventDefault();
            let $btn = $(this)
            $.get('{{ url("/products") }}/'+$btn.data('id'))
            .done((res)=>{
                editModal(res.data)
            })
            .fail((err)=>{
                console.log(err)
                swal.fire('Gagal Memuat data',err.responseJSON.message,'error')
            })
        })
        $(".delete-product").click(function(e)
        {
            e.preventDefault();
            let $btn = $(this)
            swal.fire({
                title: 'Hapus data?',
                text: "Data akan dihapus dari database!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                if (result.value) {
                    $.ajax({
                        method: 'DELETE',
                        url: '{{ url("/products") }}/'+$btn.data('id')
                    })
                    .done((res)=>{
                        swal.fire('Berhasil Menghapus data','','success')
                        .then(()=>{
                            window.location.reload()
                        })
                    })
                    .fail((err)=>{
                        console.log(err)
                        swal.fire('Gagal Menghapus data',err.responseJSON.message,'error')
                    })
                }
                })
        })

        $('.reset-product').click((e)=>{
            e.preventDefault();
            window.location.reload();
        })

        $('.help-product').click((e)=>{
            e.preventDefault();
            $('#help-product-modal').modal();
        })

        $('#add-product-modal .save-product').click(function(e){
            e.preventDefault();
            let json = serializeModal($('#add-product-modal'),false)
            $.post({
                url: "{{ url('/products') }}",
                dataType: 'json',
                data: json
            })
            .done((res)=>{
                console.log(res);

                if(!res.data)
                    swal.fire('Gagal Menyimpan','Coba lagi','error')
                else
                    swal.fire('Berhasil Menyimpan!','Data telah tersimpan','success')
                    .then(()=>{
                        window.location.reload()
                    })
            })
            .fail((res)=>{
                console.log(res)
                swal.fire('Gagal Menyimpan',res.responseJSON.message,'error')
            })
        })
    })
</script>
</div>
@endsection
