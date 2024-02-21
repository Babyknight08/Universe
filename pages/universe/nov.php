                    
                    
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
                                        <form id="notice-form">

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="notice-select">Notice</label>
                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="notice-select" required>
                                                    <option selected="selected" value="NOTC">Notice of Technical Conference</option>
                                                    <option value="NOV">Notice of Violation</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="issuance-date">Issuance Date</label>
                                                <input type="date" class="form-control" id="issuance-date" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="nov-file">Attachment</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="nov-file" accept="application/pdf" required>
                                                    <label class="custom-file-label" for="nov-file" id="nov-file-label">Choose file</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <span id="attachment-name">No File Selected</span>
                                            </div>
                                            <div class="col-md-1 text-muted"> | </div>
                                            <div class="form-group col-md-3">
                                                <span id="attachment-size">0MB</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="eia-check">
                                                    <label for="eia-check">PD1586</label>
                                                </div>                              
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="eia-commitment-input">Commitment</label>
                                                <input type="number" id="eia-commitment-input" min="1" value="1" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="eia-compliance-input">Compliance</label>
                                                <input type="number" id="eia-compliance-input" min="0" value="0" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="water-check">
                                                    <label for="water-check">RA9275</label>
                                                </div>                              
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="water-commitment-input">Commitment</label>
                                                <input type="number" id="water-commitment-input" min="1" value="1" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="water-compliance-input">Compliance</label>
                                                <input type="number" id="water-compliance-input" min="0" value="0" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="air-check">
                                                    <label for="air-check">RA8749</label>
                                                </div>                              
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="air-commitment-input">Commitment</label>
                                                <input type="number" id="air-commitment-input" min="1" value="1" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="air-compliance-input">Compliance</label>
                                                <input type="number" id="air-compliance-input" min="0" value="0" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-sm-4">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="toxic-check">
                                                    <label for="toxic-check">RA6969</label>
                                                </div>                              
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="toxic-commitment-input">Commitment</label>
                                                <input type="number" id="toxic-commitment-input" min="1" value="1" class="form-control" disabled>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="toxic-compliance-input">Compliance</label>
                                                <input type="number" id="toxic-compliance-input" min="0" value="0" class="form-control" disabled>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                            <button type="submit" class="btn btn-info btn-block">
                                                <i class="fas fa-save"></i>
                                                 Submit
                                            </button>
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
                                <div class="card-body">
                                    <table id="notice-table" class="table table-hover" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>Notice</th>
                                            <th>Issuance Date</th>
                                            <th>Attachment</th>
                                            <th>Law</th>
                                            <th>Commitment</th>
                                            <th>Compliance</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>                                 
                                </div>
                                <div class="card-footer"></div>
                        
                            </div> 
                        </div>
                    </div>

    <!-- Modals -->
    <div class="modal fade" data-backdrop="static" id="modal-delete-nov" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-danger">Delete Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete record?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="button-dismiss-nov" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" id="button-delete-nov">Confirm Delete</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
        <!-- Modals -->
    <div class="modal fade" data-backdrop="static" id="modal-update-nov" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-primary">Update Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="form-group col-sm-4">
                    <span id="label-law">RA6969</span>
                </div>
                <div class="form-group col-sm-4">
                    <label for="commitment-input">Commitment</label>
                    <input type="number" id="commitment-input" min="1" value="1" class="form-control">
                </div>
                <div class="form-group col-sm-4">
                    <label for="compliance-input">Compliance</label>
                    <input type="number" id="compliance-input" min="0" value="1" class="form-control">
                    </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="button-dismiss-notice" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-warning" id="button-update-nov">Update Details</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
