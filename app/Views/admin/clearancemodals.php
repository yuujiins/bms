<div class="modal fade" id="addRequestModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <form class="form modal-content" id="addClearanceForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add Clearance Request</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label" for="#addResidentId">System ID (System Generated)</label>
                        <input type="text" class="form-control addControl" id="addResidentId" disabled/>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label class="form-control-label" for="#addLastname">Last Name</label>
                            <input type="text" class="form-control addControl" id="addLastname" disabled/>
                        </div>
                        <div class="col">
                            <label class="form-control-label" for="#addFirstname">First Name</label>
                            <input type="text" class="form-control addControl" id="addFirstname" disabled/>
                        </div>
                        <div class="col">
                            <label class="form-control-label" for="#addMiddlename">Middle Name</label>
                            <input type="text" class="form-control addControl" id="addMiddlename" disabled/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label class="form-control-label" for="#addGender">Gender</label>
                            <select class="form-control addControl" id="addGender" disabled>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-control-label" for="#addCS">Civil Status</label>
                            <select class="form-control addControl" id="addCS" disabled>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Widower">Widower</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-control-label" for="#addBirthday">Birthday</label>
                            <input type="date" class="form-control addControl" id="addBirthday" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="#addAddress">Address</label>
                        <input type="text" class="form-control addControl" id="addAddress" disabled/>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Select from resident directory</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" style="width: 100%" id="selectResidentsTable">
                                    <thead>
                                        <tr>
                                            <th>System ID</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="purpose">Purpose of clearance</label>
                        <textarea class="form-control addControl" id="purpose" placeholder="This is required" required></textarea>
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