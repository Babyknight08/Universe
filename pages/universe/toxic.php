            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-secondary">Republic Act 6969</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-secondary">(Permits and Clearances)</h6>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4" <?php if($usertype != 'a' && $section != '2') { echo 'hidden'; } ?>>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="width:100%;">
                            <form id="tchw-form">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="tchw-select">Permit Type</label>
                                        <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="tchw-select" required>
                                            <option selected="selected" value="HWG-ID">Hazardous Waste Generator ID (HWG-ID)</option>
                                            <option value="PTT">Permit to Transport (PTT)</option>
                                            <option value="SQI">Small Quantity Importation (SQI)</option>
                                            <option value="CCO-RC">Chemical Control Order - Registration Certificate (CCO-RC)</option>
                                            <option value="CCO-IC">Chemical Control Order - Importation Clearance (CCO-IC)</option>
                                            <option value="TSD">Treatment Storage and Disposal (TSD)</option>
                                            <option value="TRC">Transporter Certificate (TRC)</option>
                                            <option value="ODS">Ozone Depleting Substances Clearance (ODS)</option>
                                            <option value="PCB">PCB Management Plan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="tchwcode-input">Permit Number</label>
                                        <input type="text" name="tchwcode-input" class="form-control" id="tchwcode-input" placeholder="Permit Number" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="tchwissue-date">Issuance Date</label>
                                        <input type="date" name="tchwissue-date" class="form-control" id="tchwissue-date" placeholder="Issuance Date" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="tchwexpire-date">Expiration Date</label>
                                        <input type="date" name="tchwexpire-date" class="form-control" id="tchwexpire-date" placeholder="Expiration Date" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="tchw-file">Attachment</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="tchw-file" accept="application/pdf" required>
                                            <label class="custom-file-label" for="tchw-file" id="tchw-file-label">Choose file</label>
                                        </div>
                                        <div class="row col-md-12">
                                        <div class="form-group col-md-8">
                                            <span id="tchwattachment-name">No File Selected</span>
                                        </div>
                                        <div class="col-md-1 text-muted"> | </div>
                                        <div class="form-group col-md-3">
                                            <span id="tchwattachment-size">0MB</span>
                                        </div>
                                        </div>
                                    </div>                                
                                </div>
                            
                        </div>
                        <div class="card-footer">
                            <div class="col-12 btn-group">
                                <button type="reset" class="btn btn-secondary" id="button-reset-tchw"><i class="fas fa-undo"></i> Reset</button>
                                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div <?php if($usertype != 'a' && $section != '2') { echo 'class="col-md-12"'; } else { echo 'class="col-md-8"'; } ?>>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="tchw-table" class="table table-hover" style="width:100%;">
                                <thead>
                                    <th>Permit</th>
                                    <th>Permit Number</th>
                                    <th>Issuance Date</th>
                                    <th>Expiration Date</th>
                                    <th>Attachment</th>
                                    <th>Actions</th>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
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
                <div class="col-md-4" <?php if($usertype != 'a' && ($section != '6' && $section != '9')) { echo 'hidden'; } ?>>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display: block;">
                            <form id="haz-form">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="haz-monitoring-select">Monitoring For</label>
                                    <select class="form-control select2 select2-purple" data-dropdown-css-class="select2-purple" style="width: 100%;" id="haz-monitoring-select" required>
                                        <option selected="selected" value="toxic">Toxic Chemicals</option>
                                        <option value="hazwaste">Hazardous Waste</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="monitored-date-haz">Date Monitored</label>
                                    <input type="date" id="monitored-date-haz" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="haz-file">Monitoring Report</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="haz-file" accept="application/pdf" required>
                                        <label class="custom-file-label" for="haz-file">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <span id="attachment-name-haz">No File Selected</span>
                                </div>
                                <div class="col-md-1 text-muted"> | </div>
                                <div class="form-group col-md-3">
                                    <span id="attachment-size-haz">0MB</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-12 btn-group">
                                <button type="reset" class="btn btn-secondary" id="button-reset-haz"><i class="fas fa-undo"></i> Reset</button>
                                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Submit</button>
                            </div>        
                            </form>
                        </div>
                    </div>
                </div>
                <div <?php if($usertype != 'a' && ($section != '6' && $section != '9')) { echo 'class="col-md-12"'; } else { echo 'class="col-md-8"'; } ?>>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <button class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-tox-tab" data-toggle="tab" href="#custom-tabs-one-tox" role="tab" aria-controls="custom-tabs-one-tox" aria-selected="true">Toxic Chemicals</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-haz-tab" data-toggle="tab" href="#custom-tabs-one-haz" role="tab" aria-controls="custom-tabs-one-haz" aria-selected="false">Hazardous Waste</a>                                    
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="custom-tabs-one-tox" role="tabpanel" aria-labelledby="custom-tabs-one-tox-tab">
                                    <div class="card">
                                        <div class="card-body table-responsive">
                                            <table id="toxic-table" class="table table-hover" style="width: 100%;">
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
                                <div class="tab-pane fade" id="custom-tabs-one-haz" role="tabpanel" aria-labelledby="custom-tabs-one-haz-tab">
                                    <div class="card">
                                        <div class="card-body table-responsive">
                                            <table id="hazwaste-table" class="table table-hover" style="width: 100%;">
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
                    </div>
                </div>
            </div>