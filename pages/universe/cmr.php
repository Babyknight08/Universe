                    
                    

                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-secondary">CMR Submission</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="card-body">
                        <div class="form-group col-sm-4">
                            <div class="icheck-danger d-inline">
                                <input type="checkbox" id="cmr-req-check">
                                <label for="cmr-req-check">CMR Required</label>
                            </div>                              
                        </div>
                    </div>
                </div>
                <div class="row" id="cmr-div">
                    <div class="col-md-4" <?php if($usertype != 'a' && $section != '3') { echo 'hidden'; } ?>>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <form id="cmr-form">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="cmr-select-year">Submission for Year</label>
                                        <select id="cmr-select-year" class="form-select select2 select2-primary" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                            <option value="2023">2023</option>
                                            <option selected="selected" value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2019">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="cmr-select-semerter">Semester</label>
                                        <select id="cmr-select-semester" class="form-select select2 select2-success" data-dropdown-css-class="select2-success" style="width: 100%;">
                                            <option selected="selected" value="First Semester">First Semester</option>
                                            <option value="Second Semester">Second Semester</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="cmr-date-submission">Date Submitted</label>
                                        <input type="date" id="cmr-date-submission" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-12 btn-group">
                                    <button type="reset" class="btn btn-secondary" id="button-reset-cmr"><i class="fas fa-undo"></i> Reset</button>
                                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>
                                </div>        
                                </form>
                            </div>
                        </div>                     
                    </div>
                    <div <?php if($usertype != 'a' && $section != '3') { echo 'class="col-md-12"'; } else { echo 'class="col-md-8"'; } ?>>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="cmr-table" class="table table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>For Year</th>
                                            <th>Date Submission</th>
                                            <th>Semester</th>
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
  <div class="modal fade" data-backdrop="static" id="modal-delete-cmr" style="display: none;" aria-hidden="true">
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
            <button type="button" class="btn btn-default" id="button-dismiss-cmr" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="button-delete-cmr">Confirm Delete</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
