$(function(){
    $('.toggle-status').on('click', function(e){
        e.preventDefault();
        const id = $(this).data('id');
        const btn = $(this);
        $.post(`/camaro/${id}/toggle-status`, {_token: $('meta[name=csrf-token]').attr('content')}, function(res){
            btn.text(res.status ? 'Deactiveer' : 'Activeer');
        }).fail(function(){ alert('Fout bij status wijzigen'); });
    });
});
