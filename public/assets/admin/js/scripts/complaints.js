$(document).ready(function(){
    $('#anchorActive').addClass('active')
    var activeSelected
    var resolvedSelected
    var selectedNote
    var notesPane, infoPane
    var active = $('#tableActiveComplaints').DataTable({
        ajax: {
            url: '/admin/getcomplaints/Open',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            { data: 'id'},
            { data: 'complainant'},
            { data: 'complainee'},
            { data: 'created_at.date'}
        ],
        select: 'single',
        columnDefs: [
            {
                targets: 3,
                render: DataTable.render.datetime()
            }
        ]
    });

    active.on('select', function(e, dt, type, indexes){
        activeSelected = active.rows(indexes).data().pluck('id')[0]
        $('.selectButtons').removeAttr('disabled')
    })

    active.on('deselect', function(e, dt, type, indexes){
        activeSelected = null
        $('.selectButtons').attr('disabled', '')
    })

    var resolved = $('#tableResolvedComplaints').DataTable({
        ajax: {
            url: '/admin/getcomplaints/Resolved',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            { data: 'id'},
            { data: 'complainant'},
            { data: 'complainee'},
            { data: 'created_at.date'},
            { data: 'updated_at.date'}
        ],
        select: 'single',
        columnDefs: [
            {
                targets: 3,
                render: DataTable.render.datetime()
            },
            {
                targets: 4,
                render: DataTable.render.datetime()
            }
        ]
    })

    resolved.on('select', function(e, dt, type, indexes){
        resolvedSelected = resolved.rows(indexes).data().pluck('id')[0]
        $('#viewResolvedInfo').removeAttr('disabled')
    })

    resolved.on('deselect', function(e, dt, type, indexes){
        resolvedSelected = null
        $('#viewResolvedInfo').attr('disabled', '')
    })

    $('#showAddComplaint').on('click', function(){
        $('#addComplaintModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#showEditActiveModal').on('click', function(){
        $('#editComplaintModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#editComplaintModal').on('shown.bs.modal', function(){
        $.ajax({
            url: '/admin/getcomplaint/Open/' + activeSelected,
            type: 'GET',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function(response){
                response = JSON.parse(response)
                $('#complaintId').val(response['id'])
                $('#editComplainant').val(response['complainant'])
                $('#editComplainee').val(response['complainee'])
                $('#editComplaint').val(response['complaint'])
                notesPane = $('#complaintNotesTable').DataTable({
                    ajax: {
                        url: '/admin/getnotes/',
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        type: 'GET',
                        data: {
                            complaintid: activeSelected
                        },
                        dataSrc: ''
                    },
                    columns: [
                        { data: 'noteid'},
                        { data: 'created_at.date'},
                        { data: 'notes'},
                        { data: 'enteredby'}
                    ],
                    select: 'single',
                    columnDefs: [
                        {
                            targets: 1,
                            render: DataTable.render.datetime()
                        }
                    ]
                })
                notesPane.on('select', function(e, dt, type, indexes){
                    selectedNote = notesPane.rows(indexes).data().pluck('noteid')[0]
                    $('#deleteNoteButton').removeAttr('disabled')
                })
            
                notesPane.on('deselect', function(e, dt, type, indexes){
                    selectedNote = null
                    $('#deleteNoteButton').attr('disabled', '')
                })
            },
            error: function(err){
                $.notify('Failed to connect to the database', 'error')
            }
        })
    })

    $('#viewComplaintInfoModal').on('shown.bs.modal', function(){
        $.ajax({
            url: '/admin/getcomplaint/Resolved/' + resolvedSelected,
            type: 'GET',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            success: function(response){
                response = JSON.parse(response)
                $('#infoComplaintId').val(response['id'])
                $('#infoComplainant').val(response['complainant'])
                $('#infoComplainee').val(response['complainee'])
                $('#infoComplaint').val(response['complaint'])
                $('#infoResolution').val(response['resolution'])
                infoPane = $('#complaintNotesTable2').DataTable({
                    ajax: {
                        url: '/admin/getnotes/',
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        type: 'GET',
                        data: {
                            complaintid: resolvedSelected
                        },
                        dataSrc: ''
                    },
                    columns: [
                        { data: 'noteid'},
                        { data: 'created_at.date'},
                        { data: 'notes'},
                        { data: 'enteredby'}
                    ],
                    columnDefs: [
                        {
                            targets: 1,
                            render: DataTable.render.datetime()
                        }
                    ]
                })
            },
            error: function(err){
                $.notify('Failed to connect to the database', 'error')
            }
        })
    })

    $('#editComplaintModal').on('hidden.bs.modal', function(){
        $('.forEdit').val('')
        notesPane.destroy()
    })
    $('#viewComplaintInfoModal').on('hidden.bs.modal', function(){
        $('.forInfo').val('')
        infoPane.destroy()
    })

    $('#addComplaintForm').on('submit', function(e){
        e.preventDefault()
        $.confirm({
            title: 'Confirm saving of changes?',
            content: 'You are about to save this complaint. Proceed?',
            buttons: {
                confirm: function(){
                    var Data = {
                        complainant: $('#complainant').val(),
                        complainee: $('#complainee').val(),
                        complaint: $('#complaint').val()

                    }
                    $.ajax({
                        url: '/admin/updatecomplaints',
                        type: 'POST',
                        headers : {'X-Requested-With' : 'XMLHttpRequest'},
                        data: Data,
                        success: function(response){
                            var bar = new $.peekABar({
                                onShow: function(){
                                    active.ajax.reload()
                                },
                                autohide: true
                            })
                            $('#addComplaintModal').modal('hide')
                            $('.selectButtons').attr('disabled', '')
                            activeSelected = null
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
    $('#editComplaintForm').on('submit', function(e){
        e.preventDefault()
        $.confirm({
            title: 'Confirm saving of changes?',
            content: 'You are about to save this complaint. Proceed?',
            buttons: {
                confirm: function(){
                    var Data = {
                        complainant: $('#editComplainant').val(),
                        complainee: $('#editComplainee').val(),
                        complaint: $('#editComplaint').val(),
                        id: $('#complaintId').val()

                    }
                    $.ajax({
                        url: '/admin/updatecomplaints',
                        type: 'POST',
                        headers : {'X-Requested-With' : 'XMLHttpRequest'},
                        data: Data,
                        success: function(response){
                            var bar = new $.peekABar({
                                onShow: function(){
                                    active.ajax.reload()
                                },
                                autohide: true
                            })
                            $('#editComplaintModal').modal('hide')
                            $('.selectButtons').attr('disabled', '')
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

    $('#addNotesForm').on('submit', function(e){
        e.preventDefault()
        $.confirm({
            title: 'Confirm saving of changes?',
            content: 'You are about to save a note for this complaint. Proceed?',
            buttons: {
                confirm: function(){
                    var Data = {
                        complaintid: activeSelected,
                        notes: $('#complaintNotes').val(),
                    }
                    $.ajax({
                        url: '/admin/addnotes',
                        type: 'POST',
                        headers : {'X-Requested-With' : 'XMLHttpRequest'},
                        data: Data,
                        success: function(response){
                            var bar = new $.peekABar({
                                onShow: function(){
                                    active.ajax.reload()
                                    $('.selectButtons').attr('disabled', '')
                                    activeSelected = null
                                },
                                autohide: true
                            })
                            $('#addNotesModal').modal('hide')
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

    $('#showAddNoteModal').on('click', function(){
        $('#addNotesModal').modal({
            backdrop: 'static', 
            keyboard: false
        })
    })

    $('#showResolveModal').on('click', function(){
        $('#resolveModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#resolveForm').on('submit', function(e){
        e.preventDefault()
        $.confirm({
            title: 'Confirm saving of changes?',
            content: 'You are about to resolve this complaint. Proceed?',
            buttons: {
                confirm: function(){
                    var Data = {
                        id: activeSelected,
                        resolution: $('#resolution').val(),
                    }
                    $.ajax({
                        url: '/admin/resolve',
                        type: 'POST',
                        headers : {'X-Requested-With' : 'XMLHttpRequest'},
                        data: Data,
                        success: function(response){
                            var bar = new $.peekABar({
                                onShow: function(){
                                    active.ajax.reload()
                                },
                                autohide: true
                            })
                            $('#resolveModal').modal('hide')
                            $('.selectButtons').attr('disabled', '')
                            $('.form-control').val('')
                            activeSelected = null
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

    $('#viewResolvedInfo').on('click', function(){
        $('#viewComplaintInfoModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    })

    $('#deleteNoteButton').on('click', function(){
        $.confirm({
            title: 'Confirm changes?',
            content: 'You are about to remote this complaint note. Proceed?',
            buttons: {
                confirm: function(){
                    var Data = {
                        noteid: selectedNote,

                    }
                    $.ajax({
                        url: '/admin/removenotes',
                        type: 'POST',
                        headers : {'X-Requested-With' : 'XMLHttpRequest'},
                        data: Data,
                        success: function(response){
                            var bar = new $.peekABar({
                                onShow: function(){
                                    notesPane.ajax.reload()
                                },
                                autohide: true
                            })
                            $('#deleteNoteButton').attr('disabled', '')
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