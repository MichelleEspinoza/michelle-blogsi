<div class="modal fade" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" tabindex="-1"
 id="modal-delete-{{$usu->id}}">
	<div class="modal-dialog" role="document">
        
<form action="{{ route('usuario.destroy',$usu->id) }}" method="POST" type="hidden">
    @csrf
    @method('DELETE')
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Eliminar Usuario</h4>
			</div>
			<div class="modal-body">
				<p class="fs-5">Confirme si desea Eliminar el Usuario</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Confirmar</button>
			</div>
		</div>
	</div>
</form>
        </div>
</div>
