<div class="modal fade" data-backdrop="static" id="modal-user" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-primary">UPDATE USER PASSWORD</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form id="updatepass-form">
        <div class="modal-body">
            <div class="row">
                <input type="hidden" id="user-id" value="<?php echo $userid; ?>">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="oldpass-input">Current Password</label>
                        <input type="password" name="oldpass-input" class="form-control" id="oldpass-input" placeholder="Input Existing Password" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="newpass-input">New Password</label>
                        <input type="password" name="newpass-input" class="form-control" id="newpass-input" placeholder="Input New Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmpass-input">Confirm New Password</label>
                        <input type="password" name="confirmpass-input" class="form-control" id="confirmpass-input" placeholder="Confirm New Password" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary btn-block" id="button-reset">SAVE CHANGES</button>
        </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>