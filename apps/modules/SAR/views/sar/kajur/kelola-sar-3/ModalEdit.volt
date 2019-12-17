<div class="modal inmodal fade" id="modal-edit" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 class="modal-title">Edit SAR</h3>
            </div>
            <form id="edit-sopir" method="post" action="/kelolasar-3/set" class="form-horizontal" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="alert alert-danger hidden" id="alertformE"></div>
                <div class="form-group row">
                    <label for="jenjang" class="col-sm-3 control-label required">Jenjang</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" required name="jenjang" id="edt_jenjang" disabled>
                      <input type="hidden" class="form-control" required name="id" id="id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sasaran" class="col-sm-3 control-label required">Sasaran</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" required name="sasaran"  id="edt_sasaran">
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" id="button_edit"  style="margin-bottom:0px" class="btn btn-warning">Ubah</button>
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
              </div>
            </form>
  
        </div>
    </div>
  </div>