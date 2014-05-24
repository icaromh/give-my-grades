Zepto(function($){    
    /* Habilita, ao clicar no ícone do menu, o menu lateral em mobile */   
    $(document).on('click', '#toggle-menu', function(e){ 
        $('body').toggleClass('has-sidebar');
    });
    
    /* Se o menu estiver habilitado, então esconde ao clicar no conteudo geral */
    $(document).on('click', 'body.has-sidebar #content', function(e){ 
        $('body').toggleClass('has-sidebar');
    });
    
});