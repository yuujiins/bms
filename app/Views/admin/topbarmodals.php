<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <form class="form modal-content" id="editProfileForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Edit Profile</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="#editLastname">Last Name</label>
                        <input type="text" class="form-control editControl" id="profileLastname" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="#editFirstname">First Name</label>
                        <input type="text" class="form-control editControl" id="profileFirstname" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="#editMiddlename">Middle Name</label>
                        <input type="text" class="form-control editControl" id="profileMiddlename"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="#editAddress">Address</label>
                        <input type="text" class="form-control editControl" id="profileAddress" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="#editContactnumber">Contact Number</label>
                        <input type="text" class="form-control editControl" id="profileContactnumber"/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="#editEmail">Email</label>
                        <input type="text" class="form-control editControl" id="profileEmail" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-target="#editProfileModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="changePasswordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <form class="form modal-content" id="changePasswordForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Change Password</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="#editLastname">Old Password</label>
                        <input type="text" class="form-control editControl" id="oldPassword" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="#editLastname">New Password</label>
                        <input type="text" class="form-control editControl" id="newPassword" required/>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="#editFirstname">Retype New Password</label>
                        <input type="text" class="form-control editControl" id="retypeNewPassword" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-target="#editProfileModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewAccountActivityModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <form class="form modal-content" id="viewAccountModalForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Your account activities</h5>

                </div>
                <div class="modal-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped" id="accountActivitiesTable" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Activity</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-target="#" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>