Zepto(function($){    
    var formulario = $('#form-trocar-senha');

    function validaFormulario(){
        var senha            = formulario.find('[name=senha]');
        var senhaConfirmacao = formulario.find('[name=senhaConfirmacao]');
        var alertArea        = $(document).find('.alert-area');
        var msg              = '';
        var errorCount       = 0;
        
        // remove a classe de alerta
        alertArea.removeClass('alert-danger');

        // Valida se as senhas são iguais
        if(senha.val() !== senhaConfirmacao.val()){
            msg = 'Desculpe, as senhas não conferem';
            alertArea.addClass('alert-danger');
            errorCount++;
        }
        
        // Valida se as senhas possuem ao menos 6 caracteres
        if(senha.val().length < 6 || senhaConfirmacao.val().length < 6){
            msg = 'A senha deve ter no mínimo 6 caracteres.';
            alertArea.addClass('alert-danger');
            errorCount++;
        }

        // Valida se os campos foram preenchidos
        if(senha.val().length == 0 || senhaConfirmacao.val().length == 0){
            msg = 'Os seguintes campos devem ser preenchidos: <br> - <b>Nova Senha</b>; <br> - <b>Repetir Nova Senha</b>';
            alertArea.addClass('alert-danger');   
            errorCount++;
        }

        if(errorCount >= 1){
            alertArea.removeClass('hidden');
            alertArea.html(msg);
            return false;
        }else{
            alertArea.addClass('hidden');
            return true;
        }
    }

    $(document).on('submit', formulario, function(e){ 
        validaFormulario();
        return false;
    });
});