$(document).ready(function(){
    var selectedUser
    var selectedClearance

    var clearanceTable = $('#tableClearance').DataTable({
        ajax: {
            url: '/admin/getclearancerequests',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'GET',
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
        let clearacedata = clearanceTable.rows(indexes).data()[0]
        if(clearacedata['status'] == ('Pending')){
            $('#generateClearance').attr('disabled', '')
        }
        else{
            $('#generateClearance').removeAttr('disabled')
        }
    })

    clearanceTable.on('deselect', function(e, dt, type, indexes){
        selectedClearance = null
        $('#generateClearance').attr('disabled', '')
    })

    var selectUsersTable = $('#selectResidentsTable').DataTable({
        ajax: {
            url: '/admin/getresidents',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            { data: 'residentid'},
            { data: 'lastname'},
            { data: 'firstname'},
            { data: 'middlename'},
            { data: 'address'}
        ],
        select: 'single'
    });

    $('#generateClearance').on('click', function(){
        $.confirm({
            title : 'Confirm changes',
            content: 'Do you want to complete the status of this transaction?',
            buttons: {
                confirm: function(){
                    $.ajax({
                        url: '/admin/completeclearance',
                        type: 'POST',
                        headers : {'X-Requested-With' : 'XMLHttpRequest'},
                        data: {
                            id:  selectedClearance
                        },
                        success: function(response){
                            var bar = new $.peekABar({
                                onShow: function(){
                                    clearanceTable.ajax.reload()
                                },
                                autohide: true
                            })
                            selectedUser = null
                            selectedClearance = null
                            $('#generateClearance').attr('disabled', '')
                            bar.show({
                                html: response['message']
                            })
                        },
                        error: function(err){
                            $.notify(err['message'])
                        }
                    })
                },
                cancel: function(){}
            }
        })
    })

    selectUsersTable.on('select', function(e, dt, type, indexes){
        selectedUser = selectUsersTable.rows(indexes).data().pluck('residentid')[0]
        let userdata = selectUsersTable.rows(indexes).data()[0]
        $('#addResidentId').val(userdata['residentid'])
        $('#addLastname').val(userdata['lastname'])
        $('#addFirstname').val(userdata['firstname'])
        $('#addMiddlename').val(userdata['middlename'])
        $('#addGender').val(userdata['gender'])
        $('#addCS').val(userdata['civilstatus'])
        $('#addBirthday').val(userdata['birthday'])
        $('#addAddress').val(userdata['address'])
        $('#selectResident').removeAttr('disabled')
    })

    selectUsersTable.on('deselect', function(e, dt, type, indexes){
        selectedUser = null
        $('#selectResident').attr('disabled', '')
        $('.addControl').val('')
    })

    $('#showAddClearanceModal').on('click', function(){
        $('#addRequestModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#anchorClearance').addClass('active')

    $('#addClearanceForm').on('submit', function(e){
        e.preventDefault()
        $.confirm({
            title: 'Confirm saving of changes?',
            content: 'You are about to save all changes you\'ve made on this request. Proceed?',
            buttons: {
                confirm: function(){
                    var Data = {
                        residentid: $('#addResidentId').val(),
                        purpose: $('#purpose').val(),
                    }
                    $.ajax({
                        url: '/admin/addclearancerequest',
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
                            $('#addRequestModal').modal('hide')
                            selectedUser = null
                            selectedClearance = null
                            $('#generateClearance').attr('disabled', '')
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