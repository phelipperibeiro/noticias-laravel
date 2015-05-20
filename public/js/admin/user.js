$(document).ready(function() {
    var wrapper = $("#wrapper");
    var row = wrapper.find(".row");
    var tabela_administradores = row.find("#tabela-administradores");

    tabela_administradores.on('click', '.btn-deletar-administrador', function(event) {

        var id = $(this).attr('data-id');
        var linha = event.currentTarget;

        $.ajax({
            url: '/user/' + id,
            type: 'DELETE',
            beforeSend: function() {
                $(linha).closest('td').append('<br /> Excluindo...');
            },
            success: function(response) {

                var tr = $(linha).closest('tr');

                if (response == 'deletado') {
                    $(tr).attr('class', 'deletado');

                    setTimeout(function() {
                        $(tr).fadeOut('slow');
                    }, 1000);

//                    setTimeout(function() {
//                        window.location.href = '/logoutAdmin';
//                    }, 2000);
                } else {
                    alert('Erro ao tentar excluir adm')
                }
            }
        });


    });

//   $(".btn-deletar-administrador").click(function(){
//       //console.log($(this));
//      //alert('estou deletando '+ $(this).attr('data-id'));
//   });

});
