
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-secondary">Republic Act 8749 & Republic Act 9275</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h6 class="text-secondary">(Permits and Clearances)</h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4" <?php if($usertype != 'a' && $section != '0') { echo 'hidden'; } ?>>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-ptoform-tab" data-toggle="tab" href="#custom-tabs-one-ptoform" role="tab" aria-controls="custom-tabs-one-ptoform" aria-selected="true">PTO Form</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-dpform-tab" data-toggle="tab" href="#custom-tabs-one-dpform" role="tab" aria-controls="custom-tabs-one-dpform" aria-selected="false">WWDP Form</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-pcoform-tab" data-toggle="tab" href="#custom-tabs-one-pcoform" role="tab" aria-controls="custom-tabs-one-pcoform" aria-selected="false">PCO Form</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="custom-tabs-one-ptoform" role="tabpanel" aria-labelledby="custom-tabs-one-ptoform-tab">
                                            <div class="card">
                                                <div class="card-body" style="display: block;">
                                                    <form id="pto-form">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="ptocode-input">PTO Code</label>
                                                                <input type="text" class="form-control" name="ptocode-input" id="ptocode-input" placeholder="PTO Code" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="ptoissue-date">Issuance Date</label>
                                                                <input type="date" class="form-control" name="ptoissue-date" id="ptoissue-date" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="ptoexpire-date">Expiration Date</label>
                                                                <input type="date" class="form-control" name="ptoexpire-date" id="ptoexpire-date" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="pto-file">Attachment</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="pto-file" accept="application/pdf" required>
                                                                    <label class="custom-file-label" for="pto-file" id="pto-file-label">Choose file</label>
                                                                </div>
                                                                <div class="row col-md-12">
                                                                <div class="form-group col-md-8">
                                                                    <span id="ptoattachment-name">No File Selected</span>
                                                                </div>
                                                                <div class="col-md-1 text-muted"> | </div>
                                                                <div class="form-group col-md-3">
                                                                    <span id="ptoattachment-size">0MB</span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="col-12 btn-group">
                                                        <button type="reset" class="btn btn-secondary" id="button-reset-pto"><i class="fas fa-undo"></i> Reset</button>
                                                        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>
                                                    </div>        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-dpform" role="tabpanel" aria-labelledby="custom-tabs-one-dpform-tab">
                                            <div class="card">
                                                <div class="card-body" style="display: block;">
                                                    <form id="dp-form">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="dpcode-input">WWDP Code</label>
                                                                <input type="text" class="form-control" name="dpcode-input" id="dpcode-input" placeholder="WWDP Code" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="dpissue-date">Issuance Date</label>
                                                                <input type="date" class="form-control" name="dpissue-date" id="dpissue-date" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="dpexpire-date">Expiration Date</label>
                                                                <input type="date" class="form-control" name="dpexpire-date" id="dpexpire-date" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="dp-file">Attachment</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="dp-file" accept="application/pdf" required>
                                                                    <label class="custom-file-label" for="dp-file" id="dp-file-label">Choose file</label>
                                                                </div>
                                                                <div class="row col-md-12">
                                                                <div class="form-group col-md-8">
                                                                    <span id="dpattachment-name">No File Selected</span>
                                                                </div>
                                                                <div class="col-md-1 text-muted"> | </div>
                                                                <div class="form-group col-md-3">
                                                                    <span id="dpattachment-size">0MB</span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="col-12 btn-group">
                                                        <button type="reset" class="btn btn-secondary" id="button-reset-dp"><i class="fas fa-undo"></i> Reset</button>
                                                        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>
                                                    </div>        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-pcoform" role="tabpanel" aria-labelledby="custom-tabs-one-pcoform-tab">
                                            <div class="card">
                                                <div class="card-body" style="display: block;">
                                                    <form id="pco-form">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="pcocode-input">PCO Code</label>
                                                                <input type="text" class="form-control" name="pcocode-input" id="pcocode-input" placeholder="PCO Code" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="category-select">Category (A/B)</label>
                                                                    <select class="form-control select2" style="width: 100%;" id="category-select" required>
                                                                    <option selected="selected" value="A">A</option>
                                                                    <option value="B">B</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="pconame-input">PCO Name</label>
                                                                <input type="text" class="form-control" name="pconame-input" id="pconame-input" placeholder="PCO Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="contactno-input">Contact Number</label>
                                                                <input type="text" class="form-control" name="contactno-input" id="contactno-input" placeholder="Contact No" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="pcoissue-date">Issuance Date</label>
                                                                <input type="date" class="form-control" name="pcoissue-date" id="pcoissue-date" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="pcoexpire-date">Expiration Date</label>
                                                                <input type="date" class="form-control" name="pcoexpire-date" id="pcoexpire-date" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <label for="pco-file">Attachment</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="pco-file" accept="application/pdf" required>
                                                                    <label class="custom-file-label" for="pco-file" id="pco-file-label">Choose file</label>
                                                                </div>
                                                                <div class="row col-md-12">
                                                                <div class="form-group col-md-8">
                                                                    <span id="pcoattachment-name">No File Selected</span>
                                                                </div>
                                                                <div class="col-md-1 text-muted"> | </div>
                                                                <div class="form-group col-md-3">
                                                                    <span id="pcoattachment-size">0MB</span>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="col-12 btn-group">
                                                        <button type="reset" class="btn btn-secondary" id="button-reset-pco"><i class="fas fa-undo"></i> Reset</button>
                                                        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>
                                                    </div>        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div <?php if($usertype != 'a' && $section != '0') { echo 'class="col-md-12"'; } else { echo 'class="col-md-8"'; } ?>>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-pto-tab" data-toggle="tab" href="#custom-tabs-one-pto" role="tab" aria-controls="custom-tabs-one-pto" aria-selected="true">Permit to Operate</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-dp-tab" data-toggle="tab" href="#custom-tabs-one-dp" role="tab" aria-controls="custom-tabs-one-dp" aria-selected="false">Wastewater Discharge Permit</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-pco-tab" data-toggle="tab" href="#custom-tabs-one-pco" role="tab" aria-controls="custom-tabs-one-pco" aria-selected="false">Pollution Control Officer</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="custom-tabs-one-pto" role="tabpanel" aria-labelledby="custom-tabs-one-pto-tab">
                                            <div class="card">
                                                <div class="card-body table-responsive">
                                                    <table id="pto-table" class="table table-hover" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>PTO Code</th>
                                                                <th>Issuance Date</th>
                                                                <th>Expiration Date</th>
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
                                        <div class="tab-pane fade" id="custom-tabs-one-dp" role="tabpanel" aria-labelledby="custom-tabs-one-dp-tab">
                                            <div class="card">
                                                <div class="card-body table-responsive">
                                                    <table id="dp-table" class="table table-hover" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>WWDP Code</th>
                                                                <th>Issuance Date</th>
                                                                <th>Expiration Date</th>
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
                                        <div class="tab-pane fade" id="custom-tabs-one-pco" role="tabpanel" aria-labelledby="custom-tabs-one-pco-tab">
                                            <div class="card">
                                                <div class="card-body table-responsive">
                                                    <table id="pco-table" class="table table-hover" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>PCO Code</th>
                                                                <th>Category</th>
                                                                <th>PCO Name</th>
                                                                <th>Contact No.</th>
                                                                <th>Issuance Date</th>
                                                                <th>Expiration Date</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <h6 class="text-secondary">(Monitoring)</h6>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4" <?php if($usertype != 'a' && ($section != '3' && $section != '9')) { echo 'hidden'; } ?>>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                    <div class="card-body" style="display: block;">
                                        <form id="aws-form">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="aws-monitoring-select">Monitoring For</label>
                                                    <select class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;" id="aws-monitoring-select" required>
                                                        <option selected="selected" value="air">AIR</option>
                                                        <option value="water">WATER</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="monitored-date-aws">Date Monitored</label>
                                                    <input type="date" id="monitored-date-aws" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="aws-file">Monitoring Report</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="aws-file" accept="application/pdf" required>
                                                        <label class="custom-file-label" for="aws-file">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-8">
                                                    <span id="attachment-name-aws">No File Selected</span>
                                                </div>
                                                <div class="col-md-1 text-muted"> | </div>
                                                <div class="form-group col-md-3">
                                                    <span id="attachment-size-aws">0MB</span>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-12 btn-group">
                                            <button type="reset" class="btn btn-secondary" id="button-reset-aws"><i class="fas fa-undo"></i> Reset</button>
                                            <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>
                                        </div>        
                                        </form>
                                    </div>
                            </div>                     
                        </div>
                        <div <?php if($usertype != 'a' && ($section != '3' && $section != '9')) { echo 'class="col-md-12"'; } else { echo 'class="col-md-8"'; } ?>>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-air-tab" data-toggle="tab" href="#custom-tabs-one-air" role="tab" aria-controls="custom-tabs-one-air" aria-selected="true">AIR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-water-tab" data-toggle="tab" href="#custom-tabs-one-water" role="tab" aria-controls="custom-tabs-one-water" aria-selected="false">WATER</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                    <div class="tab-pane fade active show" id="custom-tabs-one-air" role="tabpanel" aria-labelledby="custom-tabs-one-air-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table id="air-table" class="table table-hover" style="width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th>Date Monitored</th>
                                                        <th>Monitoring Report</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>                                 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-water" role="tabpanel" aria-labelledby="custom-tabs-one-water-tab">
                                        <div class="card">
                                            <div class="card-body table-responsive">
                                                <table id="water-table" class="table table-hover" style="width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th>Date Monitored</th>
                                                        <th>Monitoring Report</th>
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
                                </div>
                                <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>




