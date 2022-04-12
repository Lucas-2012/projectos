 <!------------------------------------------------- MODAL ELIMINAR ------------------------->
 <div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #343A40;">
                                <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Eliminar Feirante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #FFFFFF;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('feirante.eliminar')}}" class="" enctype="multipart/form-data" id="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                        
                                      <input type="hidden" name="id" id="id" value="">
                                        <p>Tens a certeza?</p>
                                        
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secundary" data-dismiss="modal">Não!</button>
                                            <button type="submit" class="btn btn-primary">Sim, Eliminar!</button>
                                        </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Fim do modal eliminar -->