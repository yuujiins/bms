$(document).ready(function(){

    var userActivityTable = $('#accountActivitiesTable').DataTable({
        ajax: {
            url: '/admin/getuseractivities',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            { data: 'created_at.date'},
            { data: 'activity'}
        ],
        select: 'single',
        columnDefs: [
            {
                target: 0,
                render: DataTable.render.datetime()
            }
        ]
    });


    $('#updateProfileButton').on('click', function(){
        $('#editProfileModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#changePasswordButton').on('click', function(){
        $('#changePasswordModal').modal({
            keyboard: false,
            backdrop: 'static'
        })
    })

    $('#accountActivityButton').on('click', function(){
        $('#viewAccountActivityModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#viewAccountActivityModal').on('shown.bs.modal', function(){
        userActivityTable.ajax.reload()
    })

    $('#editProfileModal').on('shown.bs.modal', function(){
        $.ajax({
            url: '/admin/getprofile/',
            type: 'GET',
            headers: {'X-Requested-With' : 'XMLHttpRequest'},
            success: function(response){
                if(response != null){
                    response = JSON.parse(response)
                    $('#profileLastname').val(response['lastname'])
                    $('#profileFirstname').val(response['firstname'])
                    $('#profileMiddlename').val(response['middlename'])
                    $('#profileAddress').val(response['address'])
                    $('#profileContactnumber').val(response['contactnumber'])
                    $('#profileEmail').val(response['email'])
                }
            },
            error: function(err){
                $.notify(err['message'], 'error')
            }
        })
    })

    $('#editProfileModal').on('hidden.bs.modal', function(){
        $('.editControl').val('')
    })

    $('#changePasswordModal').on('hidden.bs.modal', function(){
        $('.editControl').val('')
    })

    $('#changePasswordForm').on('submit', function(e){
        e.preventDefault()
        if($('#newPassword').val() != $('#retypeNewPassword').val()){
            $('#newPassword').notify('Passwords do not match!', 'error')
        }
        else{
            $.confirm({
                title: 'Confirm changes?',
                content: 'Do you want to save the changes you made on your password?',
                buttons: {
                    confirm: function(){
                        $.ajax({
                            url: '/admin/updatepassword/',
                            type: 'POST',
                            data: {
                                password: $('#newPassword').val(),
                                oldpassword: $('#oldPassword').val()
                            },
                            headers: {'X-Requested-With' : 'XMLHttpRequest'},
                            success: function(response){
                                if(response != null){
                                    if(response['status'] == -1){
                                        $('#oldPassword').notify(response['message'], 'error')
                                    }
                                    else{
                                        var bar = new $.peekABar({
                                            onShow: function(){
                                                $('#changePasswordModal').modal('hide')
                                            },
                                            autohide: true
                                        })
                                        bar.show({
                                            html: response['message']
                                        })
                                    }
                                }
                            },
                            error: function(err){
                                $.notify(err['message'], 'error')
                            }
                        })
                    }
                }
            })
        }
    })

    $('#editProfileForm').on('submit', function(e){
        e.preventDefault()
        $.confirm({
            title: 'Confirm changes?',
            content: 'Do you want to save the changes you made on your profile?',
            buttons: {
                confirm: function(){
                    $.ajax({
                        url: '/admin/updateprofile/',
                        type: 'POST',
                        headers: {'X-Requested-With' : 'XMLHttpRequest'},
                        data:{
                            lastname: $('#profileLastname').val(),
                            firstname: $('#profileFirstname').val(),
                            middlename: $('#profileMiddlename').val(),
                            address: $('#profileAddress').val(),
                            contactnumber: $('#profileContactnumber').val(),
                            email: $('#profileEmail').val()
                        },
                        success: function(response){
                            if(response != null){
                                var bar = new $.peekABar({
                                    onShow: function(){
                                        $('#editProfileModal').modal('hide')
                                    },
                                    autohide: true
                                })
                                bar.show({
                                    html: response['message']
                                })
                            }
                        },
                        error: function(err){
                            $.notify(err['message'], 'error')
                        }
                    })
                },
                cancel: function(){}
            }
        })
    })
})