$(document).ready(function(){

    var modal = $('.modal');
    var modal_content = modal.find('.modal-content');
    var formLoginUser = modal_content.find("#formLoginUser");
    var btn_login_user = modal_content.find("#btn-login-user");
    var status_login = modal_content.find("#status-login");
    var modal_dialog = modal.find(".modal-dialog");


    btn_login_user.on('click', function(){
        var email = formLoginUser.find("#emailTxt").val();
        var senha = formLoginUser.find("#senhaTxt").val();

        var dataString = 'email='+email+'&senha='+senha;
        var token = modal_dialog.find("input[name='_token']").val();

        $.ajax({
            url:'/userLogin',
            type: 'POST',
            data: { _token: token, email: email, senha:senha },
            beforeSend: function(){
                $(status_login).html( 'Logando no sistema' );
            },
            success: function( data ){
                if( data == 'logado' ){
                    $(status_login).html( 'Logado com sucesso, essa janela se fechará em 3 segundos' );
                    setTimeout( function(){
                        $("#modalLogin").modal('hide');
                        location.reload();    
                    },3000 )
                }else{
                   $(status_login).html( 'Erro ao logar' ); 
                }
            },
            error: function(){
                $(status_login).html( 'Ocorreu um erro ao logar, e essa janela se fechará em 3 segundos' );
                    setTimeout( function(){
                        $("#modalLogin").modal('hide');
                        location.reload();    
                    },3000 )
            }

        });

    });
});