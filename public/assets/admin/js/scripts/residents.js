$(document).ready(function(){
    $('#anchorResidents').addClass('active')
    var currentlySelected
    var table = $('#tableResidents').DataTable({
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
            { data: 'gender'},
            { data: 'civilstatus'},
            { data: 'birthday'},
            { data: 'address'},
            { data: 'contactnumber'}, 
            { data: 'email'}
        ],
        select: 'single'
    });
    table.on('select', function(e, dt, type, indexes){
        currentlySelected = table.rows(indexes).data().pluck('residentid')[0]
        $('.selectButtons').removeAttr('disabled')
    })

    table.on('deselect', function(e, dt, type, indexes){
        currentlySelected = null
        $('.selectButtons').attr('disabled', '')
    })

    $('#showEditModal').on('click', function(){
        $('#editResidentModal').modal({
            backdrop: 'static', 
            keyboard: false
        })
    })

    $('#editResidentModal').on('shown.bs.modal', function(){
        $.ajax({
            url: '/admin/getresident/' + currentlySelected,
            type: 'GET',
            headers: {'X-Requested-With' : 'XMLHttpRequest'},
            success: function(response){
                $('#editResidentId').val(response['residentid'])
                $('#editLastname').val(response['lastname'])
                $('#editFirstname').val(response['firstname'])
                $('#editMiddlename').val(response['middlename'])
                $('#editGender').val(response['gender'])
                $('#editCS').val(response['civilstatus'])
                $('#editBirthday').val(response['birthday'])
                $('#editAddress').val(response['address'])
                $('#editContactnumber').val(response['contactnumber'])
                $('#editEmail').val(response['email'])
            },
            error: function(err){
                $.notify(err['message'], 'error')
            }
        })
    })

    $('#editResidentForm').on('submit', function(e){
        e.preventDefault()
        if($('#editPasswordTrigger').prop('checked') && ($('#editPassword').val() != $('#editConfirmPassword').val())){
            $('#editPassword').notify('Passwords do not match!', 'error')
        }
        else{
            $.confirm({
                title: 'Confirm saving of changes?',
                content: 'You are about to save all changes you\'ve made on this user. Proceed?',
                buttons: {
                    confirm: function(){
                        var Data = {
                            residentid: $('#editResidentId').val(),
                            lastname: $('#editLastname').val(),
                            firstname: $('#editFirstname').val(),
                            middlename: $('#editMiddlename').val(),
                            gender: $('#editGender').val(),
                            civilstatus: $('#editCS').val(),
                            birthday: $('#editBirthday').val(),
                            address: $('#editAddress').val(),
                            contactnumber: $('#editContactnumber').val(),
                            email: $('#editEmail').val()
                        }
                        $.ajax({
                            url: '/admin/updateResident',
                            type: 'POST',
                            headers : {'X-Requested-With' : 'XMLHttpRequest'},
                            data: Data,
                            success: function(response){
                                var bar = new $.peekABar({
                                    onShow: function(){
                                        table.ajax.reload()
                                    },
                                    autohide: true
                                })
                                $('#editResidentModal').modal('hide')
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
        }
    })

    $('#addResidentForm').on('submit', function(e){
        e.preventDefault()
        if(($('#addPassword').val() != $('#addPasswordConfirm').val())){
            $('#addPassword').notify('Passwords do not match!', 'error')
        }
        else{
            $.confirm({
                title: 'Confirm saving of changes?',
                content: 'You are about to save all changes you\'ve made on this user. Proceed?',
                buttons: {
                    confirm: function(){
                        var Data = {
                            lastname: $('#addLastname').val(),
                            firstname: $('#addFirstname').val(),
                            middlename: $('#addMiddlename').val(),
                            gender: $('#addGender').val(),
                            civilstatus: $('#addCS').val(),
                            birthday: $('#addBirthday').val(),
                            address: $('#addAddress').val(),
                            contactnumber: $('#addContactnumber').val(),
                            email: $('#addEmail').val(),
                            password: $('#addPassword').val()
                        }
                        $.ajax({
                            url: '/admin/updateResident',
                            type: 'POST',
                            headers : {'X-Requested-With' : 'XMLHttpRequest'},
                            data: Data,
                            success: function(response){
                                var bar = new $.peekABar({
                                    onShow: function(){
                                        table.ajax.reload()
                                    },
                                    autohide: true
                                })
                                $('#addResidentModal').modal('hide')
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
        }
    })

    $('#editResidentModal').on('hidden.bs.modal', function(){
        $('.editControl').val('')
    })

    $('#showAddResident').on('click', function(){
        $('#addResidentModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#addResidentModal').on('hidden.bs.modal', function(){
        $('.addControl').val('')
    })

    $('#removeResidentButton').on('click', function(){
        $.confirm({
            title: 'Confirm deletion',
            content: 'Do you really want to remove the selected resident from the system?',
            buttons : {
                confirm: function(){
                    $.ajax({
                        url: '/admin/removeresident',
                        type: 'POST',
                        headers: {'X-Requested-With' : 'XMLHttpRequest'},
                        data: {
                            residentid: currentlySelected
                        },
                        success: function(response){
                            var bar = new $.peekABar({
                                onShow: function(){
                                    table.ajax.reload()
                                },
                                autohide: true
                            })
                            bar.show({
                                html: response['message']
                            })
                        },
                        error: function(err){
                            $.notify(err['message'], 'error')
                        }
                    })
                },
                cancel: function(){

                }
            }
        })
    })
})