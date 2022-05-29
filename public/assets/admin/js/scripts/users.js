$(document).ready(function(){
    var currentlySelected

    $('#anchorUser').addClass('active')

    var table = $('#tableUsers').DataTable({
        ajax: {
            url: '/admin/getusers',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            { data: 'userid'},
            { data: 'lastname'},
            { data: 'firstname'},
            { data: 'middlename'},
            { data: 'address'},
            { data: 'contactnumber'}, 
            { data: 'email'}
        ],
        select: 'single'
    });

    table.on('select', function(e, dt, type, indexes){
        currentlySelected = table.rows(indexes).data().pluck('userid')[0]
        $('.selectButtons').removeAttr('disabled')
    })

    table.on('deselect', function(e, dt, type, indexes){
        currentlySelected = null
        $('.selectButtons').attr('disabled', '')
    })

    $('#showEditModal').on('click', function(){
        $('#editUserModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#editUserModal').on('shown.bs.modal', function(){
        $.ajax({
            url: '/admin/getuser/' + currentlySelected,
            type: 'GET',
            headers: {'X-Requested-With' : 'XMLHttpRequest'},
            success: function(response){
                if(response != null){
                    response = JSON.parse(response)
                    $('#editUserId').val(response['userid'])
                    $('#editLastname').val(response['lastname'])
                    $('#editFirstname').val(response['firstname'])
                    $('#editMiddlename').val(response['middlename'])
                    $('#editAddress').val(response['address'])
                    $('#editContactnumber').val(response['contactnumber'])
                    $('#editEmail').val(response['email'])
                    $('#editUserType').val(response['roletype'])
                }
            },
            error: function(err){
                $.notify(err['message'], 'error')
            }
        })
    })

    $('#editUserForm').on('submit', function(e){
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
                            userid: $('#editUserId').val(),
                            lastname: $('#editLastname').val(),
                            firstname: $('#editFirstname').val(),
                            middlename: $('#editMiddlename').val(),
                            address: $('#editAddress').val(),
                            contactnumber: $('#editContactnumber').val(),
                            email: $('#editEmail').val(),
                            password: $('#editPassword').val(),
                            roletype: $('#editUserType').val()
                        }
                        $.ajax({
                            url: '/admin/updateUser',
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
                                $('#editUserModal').modal('hide')
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

    $('#editUserModal').on('hidden.bs.modal', function(){
        $('.editControl').val('')
    })

    $('#addUserForm').on('submit', function(e){
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
                            address: $('#addAddress').val(),
                            contactnumber: $('#addContactnumber').val(),
                            email: $('#addEmail').val(),
                            password: $('#addPassword').val(),
                            roletype: $('#addUserType').val()
                        }
                        $.ajax({
                            url: '/admin/updateUser',
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
                                $('#addUserModal').modal('hide')
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

    $('#showAddUser').on('click', function(){
        $('#addUserModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#addUserModal').on('hidden.bs.modal', function(){
        $('.addControl').val('')
    })

    $('#editPasswordTrigger').on('click', function(){
        if($(this).prop('checked')){
            $('.editPassword').removeAttr('disabled')
            $('.editPassword').attr('required' , '')
        }
        else{
            $('.editPassword').attr('disabled', '')
            $('.editPassword').removeAttr('required')
            $('.editPassword').val('')
        }
    })

    $('#removeUserButton').on('click', function(){
        $.confirm({
            title: 'Confirm deletion',
            content: 'Do you really want to remove the selected user from the system?',
            buttons : {
                confirm: function(){
                    $.ajax({
                        url: '/admin/removeuser',
                        type: 'POST',
                        headers: {'X-Requested-With' : 'XMLHttpRequest'},
                        data: {
                            userid: currentlySelected
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