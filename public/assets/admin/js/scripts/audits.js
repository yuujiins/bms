$(document).ready(function(){
    $('#auditLink').addClass('active')

    var systemActivitiesTable = $('#systemActionsTable').DataTable({
        ajax: {
            url: '/admin/getsystemactivities',
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            { data: 'created_at.date'},
            { data: 'performedby'},
            { data: 'actionperformed'}
        ],
        select: 'single',
        columnDefs: [
            {
                target: 0,
                render: DataTable.render.datetime()
            }
        ]
    });
})