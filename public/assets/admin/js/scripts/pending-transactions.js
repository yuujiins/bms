$(document).ready(function(){
    var selectedClearance

    var clearanceTable = $('#tableClearance').DataTable({
        ajax: {
            url: '/admin/getclearancerequests',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'GET',
            data: {
              status: 'Pending'
            },
            dataSrc: ''
        },
        columns: [
            { data: 'id'},
            { data: 'fullname'},
            { data: 'created_at.date'},
            { data: 'purpose'},
            { data: 'status'}
        ],
        columnDefs: [
            {
                target: 2,
                render: DataTable.render.datetime()
            }
        ],
        select: 'single'
    });

    clearanceTable.on('select', function(e, dt, type, indexes){
        selectedClearance = clearanceTable.rows(indexes).data().pluck('id')[0]
        let clearancedata = clearanceTable.rows(indexes).data()[0]
        if(clearancedata['status'] == ('Paid')){
            $('#createPayment').attr('disabled', '')
        }
        else{
            $('#createPayment').removeAttr('disabled')
        }
        $('#requestId').val(selectedClearance)
    })

    clearanceTable.on('deselect', function(e, dt, type, indexes){
        selectedClearance = null
        $('#createPayment').attr('disabled', '')
    })

    $('#createPayment').on('click', function(){
        $('#completeTransactionModal').modal({
            backdrop : 'static',
            keyboard: false
        })
    })

    $('#completeTransactionModal').on('hidden.bs.modal', function (){
        $('.addControl').val('')
    })

    $('#addRequestModal').on('hidden.bs.modal', function (){
        $('.addControl').val('')
    })

    $('#completeTransactionForm').on('submit', function(e){
        e.preventDefault()
        $.confirm({
            title: 'Confirm saving of changes?',
            content: 'You are about to save all changes you\'ve made on this request. Proceed?',
            buttons: {
                confirm: function(){
                    var Data = {
                        requestid: $('#requestId').val(),
                        ornumber: $('#orNumber').val(),
                        amountpaid: $('#amountPaid').val()
                    }
                    $.ajax({
                        url: '/admin/createpayment',
                        type: 'POST',
                        headers : {'X-Requested-With' : 'XMLHttpRequest'},
                        data: Data,
                        success: function(response){
                            var bar = new $.peekABar({
                                onShow: function(){
                                    clearanceTable.ajax.reload()
                                },
                                autohide: true
                            })
                            $('#completeTransactionModal').modal('hide')
                            selectedClearance = null
                            $('#createPayment').attr('disabled', '')
                            bar.show({
                                html: response['message']
                            })
                        },
                        error: function(err){
                            $.notify(err['message'])
                        }
                    })
                },
                cancel: function(){

                }
            }
        })
    })
})