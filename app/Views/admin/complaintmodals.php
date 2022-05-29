<div class="modal fade" id="addComplaintModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="addComplaintForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Complaint Information</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="complainant">Complainant</label>
                    <input type="text" class="form-control forAdding" id="complainant" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="complainee">Copmplainee</label>
                    <input type="text" class="form-control forAdding" id="complainee"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="complaint">Chief Complaint</label>
                    <textarea class="form-control forAdding" id="complaint" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#addComplaintModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editComplaintModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="editComplaintForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Complaint Information</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="#complaintId">System ID (System Generated)</label>
                    <input type="text" class="form-control forEdit" id="complaintId" disabled/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="complainant">Complainant</label>
                    <input type="text" class="form-control forEdit" id="editComplainant" required/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="complainee">Complainee</label>
                    <input type="text" class="form-control forEdit" id="editComplainee"/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="complaint">Chief Complaint</label>
                    <textarea class="form-control forEdit" id="editComplaint" required></textarea>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Notes</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="complaintNotesTable">
                                <thead>
                                    <tr>
                                        <th width="10%">ID (System Generated)</th>
                                        <th width="15%">Date</th>
                                        <th>Notes</th>
                                        <th>Entered by</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-danger btn-sm" id="deleteNoteButton" disabled><span class="ni ni-fat-delete"> </span> Delete Note</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#editComplaintModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="viewComplaintInfoModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="editComplaintForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Complaint Information</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="#complaintId">System ID (System Generated)</label>
                    <input type="text" class="form-control forInfo" id="infoComplaintId" disabled/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="complainant">Complainant</label>
                    <input type="text" class="form-control forInfo" id="infoComplainant" disabled/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="complainee">Complainee</label>
                    <input type="text" class="form-control forInfo" id="infoComplainee"disabled/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="complaint">Chief Complaint</label>
                    <textarea class="form-control forInfo" id="infoComplaint" disabled></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" for="infoResolution">Resolution</label>
                    <textarea class="form-control forInfo" id="infoResolution" disabled></textarea>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Notes</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="complaintNotesTable2">
                                <thead>
                                    <tr>
                                        <th width="10%">ID (System Generated)</th>
                                        <th width="15%">Date</th>
                                        <th>Notes</th>
                                        <th>Entered by</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#editComplaintModal" data-dismiss="modal">Close</button>
            </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="addNotesModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="addNotesForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Notes</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="#complaintNotes">Notes</label>
                    <textarea class="form-control forNotes" id="complaintNotes" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#addNotesModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="resolveModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <form class="form modal-content" id="resolveForm">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Close complaint</h5>
                
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="#resolution">Resolution</label>
                    <textarea class="form-control forNotes" id="resolution" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-target="#addNotesModal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
      </form>
    </div>
  </div>
</div>