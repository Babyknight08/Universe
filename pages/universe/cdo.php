                    
                    
                    <div class="row">
                        <div class="col-md-4" <?php if($usertype != 'a' && $section != '8') { echo 'hidden'; } ?>>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                    <div class="card-body" style="display: block;">
                                        <form id="cdo-form">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="issuance-date-cdo">Issuance Date</label>
                                                <input type="date" id="issuance-date-cdo" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="cdo-file">Attachment</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="cdo-file" accept="application/pdf" required>
                                                    <label class="custom-file-label" for="nov-file">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <span id="attachment-name-cdo">No File Selected</span>
                                            </div>
                                            <div class="col-md-1 text-muted"> | </div>
                                            <div class="form-group col-md-3">
                                                <span id="attachment-size-cdo">0MB</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-12 btn-group">
                                            <button type="reset" class="btn btn-secondary" id="button-reset"><i class="fas fa-undo"></i> Reset</button>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>                                   
                                        </div>
                                        </form>
                                    </div>
                                
                            </div>                     
                        </div>
                        <div <?php if($usertype != 'a' && $section != '8') { echo 'class="col-md-12"'; } else { echo 'class="col-md-8"'; } ?>>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="cdo-table" class="table table-hover" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Issuance Date</th>
                                            <th>Attachment</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>                                 
                                </div>
                        
                            </div> 
                        </div>
                    </div>

    <!-- Modals -->
    <div class="modal fade" data-backdrop="static" id="modal-delete-cdo" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger">Delete Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">??</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete record?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="button-dismiss-cdo" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="button-delete-cdo">Confirm Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>