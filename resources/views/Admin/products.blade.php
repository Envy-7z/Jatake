@extends('layout.dashboard_v2')
@php
    // dd($page)
@endphp
@section('content')
<style>

/* modal */
.modal-md {
    width: 52em !important;
    max-width: 52em;
}

</style>
<div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title py-3 clearfix">
          {{-- <h4>Table <span class="semi-bold">Styles</span></h4> --}}
          <div class="tools">
            <button class="btn btn-sm btn-success m-0 product-create">Add Product</button>
            <a href="javascript:;" class="collapse"></a>
            <a href="javascript:;" class="reload"></a>
          </div>
        </div>
        <div class="grid-body ">
          <table class="table table-hover table-condensed" id="products-datatable">
            <thead>
              <tr>
                <th style=""></th>
                <th style="">ID</th>
                <th style="">Name</th>
                <th style="">Description</th>
                <th style="">Brand</th>
                <th style="">QTY</th>
                <th style="">Type</th>
                <th class="text-center" style="">Images</th>
                <th style="">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

  <!-- Modal: modalPoll -->
  <div class="modal fade right" id="product-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-success modal-md" role="document">
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
          <p class="heading lead">Update Product
          </p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">×</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          <!-- BEGIN BASIC FORM ELEMENTS-->
          <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4 class="font-weight-bold">Update <span class="semi-bold">Product Form</span></h4>
                </div>
                <div class="grid-body no-border">
                    <form action="#">
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Name</label>
                                <span class="help">e.g. "Aki XXA1"</span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="name" placeholder="Fill here...">
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label class="form-label">Brand</label>
                                <span class="help">e.g. "Honda"</span>
                                <div class="controls">
                                    <select name="brand_id" style="width: 100%" class="brand-list"></select>
                                    {{-- <input type="text" class="form-control" name="brand"> --}}
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label class="form-label">Shortname</label>
                                <span class="help">e.g. "aki-xxa1"</span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="short" placeholder="Fill here...">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Type</label>
                                <div class="controls">
                                    <select name="type" class="type-list">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label class="form-label">QTY</label>
                                <span class="help">e.g. "1,2,3,etc"</span>
                                <div class="controls">
                                    <input type="number" class="form-control" name="qty" placeholder="Fill here...">
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label class="form-label">Price</label>
                                <span class="help">e.g. "100000"</span>
                                <div class="controls">
                                {{-- <input type="text" class="form-control auto" > --}}
                                    <input type="text" class="form-control auto-price" name="price" placeholder="Fill here...">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Product Links (Opt)</label>
                                <span class="help">Setup product links here</span>
                                <div class="form-array">
                                    <div class="controls">
                                        <input type="text" name="link.wa" class="form-control form-array-input" placeholder="Nomor WA" />
                                        <input type="text" name="link.tp" class="form-control form-array-input" placeholder="Tokopedia" />
                                        <input type="text" name="link.bl" class="form-control form-array-input" placeholder="Bukalapak" />
                                        <input type="text" name="link.sp" class="form-control form-array-input" placeholder="Shoope" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Product Images</label>
                                <span class="help">Put product link images here</span>
                                <div class="form-array" data-name="img">
                                    <div class="controls">
                                        <input type="text" class="form-control form-array-input" placeholder="Gambar 1" />
                                        <input type="text" class="form-control form-array-input" placeholder="Gambar 2" />
                                        <input type="text" class="form-control form-array-input" placeholder="Gambar 3" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Description</label>
                                <span class="help">Explain about this product</span>
                                <div class="controls">
                                    <textarea class="form-control" rows="4" name="desc"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <button class="btn btn-primary submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END BASIC FORM ELEMENTS-->
        </div>
      </div>
    </div>
  </div>
  <!-- Modal: modalPoll -->

  <!-- Modal: modalPoll -->
  <div class="modal fade right" id="product-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-success modal-md" role="document">
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
          <p class="heading lead">Create Product
          </p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">×</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          <!-- BEGIN BASIC FORM ELEMENTS-->
          <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4 class="font-weight-bold">Create <span class="semi-bold">Product Form</span></h4>
                </div>
                <div class="grid-body no-border">
                    <form action="#">
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Name</label>
                                <span class="help">e.g. "Aki XXA1"</span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="name" placeholder="Fill here...">
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label class="form-label">Brand</label>
                                <span class="help">e.g. "Honda"</span>
                                <div class="controls">
                                    <select name="brand_id" style="width: 100%" class="brand-list"></select>
                                    {{-- <input type="text" class="form-control" name="brand"> --}}
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label class="form-label">Shortname</label>
                                <span class="help">e.g. "aki-xxa1"</span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="short" placeholder="Fill here...">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Type</label>
                                <div class="controls">
                                    <select name="type" class="type-list">

                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label class="form-label">QTY</label>
                                <span class="help">e.g. "1,2,3,etc"</span>
                                <div class="controls">
                                    <input type="number" class="form-control" name="qty" placeholder="Fill here...">
                                </div>
                            </div>
                            <div class="form-group col-md">
                                <label class="form-label">Price</label>
                                <span class="help">e.g. "100000"</span>
                                <div class="controls">
                                {{-- <input type="text" class="form-control auto" > --}}
                                    <input type="text" class="form-control auto-price" name="price" placeholder="Fill here...">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Product Links (Opt)</label>
                                <span class="help">Setup product links here</span>
                                <div class="form-array">
                                    <div class="controls">
                                        <input type="text" name="link.wa" class="form-control form-array-input" placeholder="Nomor WA" />
                                        <input type="text" name="link.tp" class="form-control form-array-input" placeholder="Tokopedia" />
                                        <input type="text" name="link.bl" class="form-control form-array-input" placeholder="Bukalapak" />
                                        <input type="text" name="link.sp" class="form-control form-array-input" placeholder="Shoope" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Product Images</label>
                                <span class="help">Put product link images here</span>
                                <div class="form-array" data-name="img">
                                    <div class="controls">
                                        <input type="text" class="form-control form-array-input" placeholder="Gambar 1" />
                                        <input type="text" class="form-control form-array-input" placeholder="Gambar 2" />
                                        <input type="text" class="form-control form-array-input" placeholder="Gambar 3" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Description</label>
                                <span class="help">Explain about this product</span>
                                <div class="controls">
                                    <textarea class="form-control" rows="4" name="desc"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <button class="btn btn-primary submit">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END BASIC FORM ELEMENTS-->
        </div>
      </div>
    </div>
  </div>
  <!-- Modal: modalPoll -->
@endsection

@section('script')
    <script src="{{ asset('/js/admin/products/products-index.js') }}" type="text/javascript" defer></script>
@show
