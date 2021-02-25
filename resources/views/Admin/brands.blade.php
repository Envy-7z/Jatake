@extends('layout.dashboard_v2')
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
            <button class="btn btn-sm btn-success m-0 brand-create">Add Brand</button>
            <a href="javascript:;" class="collapse"></a>
            <a href="javascript:;" class="reload"></a>
          </div>
        </div>
        <div class="grid-body ">
          <table class="table table-hover table-condensed" id="brands-datatable">
            <thead>
              <tr>
                <th style=""></th>
                <th style="">ID</th>
                <th style="">Brand Name</th>
                <th style="">Description</th>
                <th class="text-center" style="">Logo</th>
                <th style="">Action</th>
                {{-- <th style=""></th> --}}
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
  <div class="modal fade right" id="brand-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-warning modal-md" role="document">
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
          <p class="heading lead">Edit Brand
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
                  <h4 class="font-weight-bold">Update <span class="semi-bold">Brand Form</span></h4>
                </div>
                <div class="grid-body no-border">
                    <form action="#">

                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Brand Name</label>
                                <span class="help">e.g. "Honda"</span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Description</label>
                                <span class="help">Explain about this brand</span>
                                <div class="controls">
                                    <textarea class="form-control" rows="3" name="desc"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Brand Link (Opt)</label>
                                <span class="help"></span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="link">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Brand Image</label>
                                <span class="help">Put brand link image here</span>
                                <div class="form-array" data-name="img">
                                    <div class="controls">
                                        <input type="text" class="form-control form-array-input" />
                                    </div>
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
  <div class="modal fade right" id="brand-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-notify modal-success modal-md" role="document">
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
          <p class="heading lead">Create Brand
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
                  <h4 class="font-weight-bold">Create <span class="semi-bold">Brand Form</span></h4>
                </div>
                <div class="grid-body no-border">
                    <form action="#">
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Brand Name</label>
                                <span class="help">e.g. "Honda"</span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label class="form-label">Description</label>
                                <span class="help">Explain about this brand</span>
                                <div class="controls">
                                    <textarea class="form-control" rows="3" name="desc"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label">Brand Link (Opt)</label>
                                <span class="help"></span>
                                <div class="controls">
                                    <input type="text" class="form-control" name="link">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Brand Image</label>
                                <span class="help">Put brand link image here</span>
                                <div class="form-array" data-name="img">
                                    <div class="controls">
                                        <input type="text" class="form-control form-array-input" />
                                    </div>
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
    <script src="{{ asset('/js/admin/brands/brands-index.js') }}" type="text/javascript" defer></script>
@show
