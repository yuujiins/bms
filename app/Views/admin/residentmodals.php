<div class="modal fade" id="editResidentModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="editResidentForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Edit Resident Information</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Resident ID (System Generated)</label>
                    <input type="text" class="form-control editControl" id="editResidentId" disabled/>
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
                    <label class="control-label" for="#editGender">Gender</label>
                    <select class="form-control editControl" id="editGender">
                        <option value=""></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editGender">Civil Status</label>
                    <select class="form-control editControl" id="editCS">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Widower">Widower</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#editBirthday">Birthday</label>
                    <input type="date" class="form-control editControl" id="editBirthday">
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
                    <input type="text" class="form-control editControl" id="editEmail"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#editResidentModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addResidentModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="addResidentForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Resident Information</h5>
                
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
                    <label class="control-label" for="#addGender">Gender</label>
                    <select class="form-control addControl" id="addGender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addCS">Civil Status</label>
                    <select class="form-control editControl" id="addCS">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                        <option value="Widower">Widower</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="#addBirthday">Birthday</label>
                    <input type="date" class="form-control addControl" id="addBirthday">
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
                    <input type="text" class="form-control addControl" id="addEmail"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#addResidentModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>