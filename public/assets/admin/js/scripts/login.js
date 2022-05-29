$(document).ready(function(){
    $(document).on('submit', '#loginForm', function(e){
        e.preventDefault();
        $.ajax({
            url : '/login',
            type: 'POST',
            data: {
                email : $('#email').val(),
                password: $('#password').val()
            },
            success: function(response){
                console.log(response)
                if(response['status'] != 1){
                    
                    $('#password').notify(response['message'], 'error')
                }
                else{
                    var bar = new $.peekABar({
                        onHide: function(){
                            window.location.href = '/admin'
                        },
                        autohide: true
                    })
                    bar.show({
                        html: 'Welcome! ' + response['message']
                    })
                }
            },
            error: function(error){
                $('#email').notify('Email address not found!', 'error')
            }
        })
    })
})