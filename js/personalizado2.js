$(document).ready(function(){
	$('a[data-confirm]').click(function(ev){
		var href = $(this).attr('href');
		if(!$('#confirm-delete').length){
			$('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-success text-white">CONFIRMAR VOTO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Deseja confirmar seu voto?</div><div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button><a class="btn btn-success text-white" id="dataComfirmOK">Votar</a></div></div></div></div>');
		}
		$('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
		return false;
		
	});

});


$(document).ready(function() {
	$('.thumbnail').hover(
		function() {
			$(this).find('.caption').fadeIn(250);
		},
		function() {
			$(this).find('.caption').fadeOut(250);
		}
	);
});