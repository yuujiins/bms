<div class="modal fade" id="editUserModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="editUserForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Edit User Information</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">User ID (System Generated)</label>
                    <input type="text" class="form-control editControl" id="editUserId" disabled/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editLastname">Last Name</label>
                    <input type="text" class="form-control editControl" id="editLastname" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editFirstname">First Name</label>
                    <input type="text" class="form-control editControl" id="editFirstname" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editMiddlename">Middle Name</label>
                    <input type="text" class="form-control editControl" id="editMiddlename"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editAddress">Address</label>
                    <input type="text" class="form-control editControl" id="editAddress" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editContactnumber">Contact Number</label>
                    <input type="text" class="form-control editControl" id="editContactnumber"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editEmail">Email</label>
                    <input type="text" class="form-control editControl" id="editEmail" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editUserType">User Type</label>
                    <select class="form-control addControl" id="editUserType">
                        <option value="0">User</option>
                        <option value="1">Administrator</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label" for="#editPassword" id="cpLabel">Change Password <input type="checkbox" id="editPasswordTrigger"></label>
                    <input type="password" class="form-control editControl editPassword" id="editPassword" disabled/>
                    <small id="passwordHelp" class="form-text text-muted">Only change the password if requested. Leaving it blank will not change the current password of the user</small>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editConfirmPassword">Confirm Password</label>
                    <input type="password" class="form-control editControl editPassword" id="editConfirmPassword" disabled/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#editUserModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addUserModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="addUserForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add User Information</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="#addLastname">Last Name</label>
                    <input type="text" class="form-control addControl" id="addLastname" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addFirstname">First Name</label>
                    <input type="text" class="form-control addControl" id="addFirstname" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addMiddlename">Middle Name</label>
                    <input type="text" class="form-control addControl" id="addMiddlename"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addAddress">Address</label>
                    <input type="text" class="form-control addControl" id="addAddress" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addContactnumber">Contact Number</label>
                    <input type="text" class="form-control addControl" id="addContactnumber"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addEmail">Email</label>
                    <input type="text" class="form-control addControl" id="addEmail" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addUserType">User Type</label>
                    <select class="form-control addControl" id="addUserType">
                        <option value="0">User</option>
                        <option value="1">Administrator</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label class="control-label" for="#addPassword" id="cpLabel">Create Password</label>
                    <input type="password" class="form-control addControl addPassword" id="addPassword" required/>
                    <small id="passwordHelp" class="form-text text-muted">Only change the password if requested. Leaving it blank will not change the current password of the user</small>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addConfirmPassword">Confirm Password</label>
                    <input type="password" class="form-control addControl addPassword" id="addPasswordConfirm" required title="Passwords must match"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#addUserModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>