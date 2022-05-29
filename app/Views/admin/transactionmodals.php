<div class="modal fade" id="completeTransactionModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <form class="form modal-content" id="completeTransactionForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Clearance Payment</h5>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control-label" for="#addResidentId">System ID (System Generated)</label>
                        <input type="text" class="form-control addControl" id="requestId" disabled/>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label class="form-control-label" for="#orNumber">OR Number</label>
                            <input type="text" class="form-control" id="orNumber" required/>
                        </div>
                        <div class="col">
                            <label class="form-control-label" for="#amountPaid">Amount Paid</label>
                            <input type="number" step="any" class="form-control addControl" id="amountPaid" required>
                        </div>
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