<!------------------------------------------------- Adicionar Video ------------------------->
<div class="modal fade" id="addVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #343A40;">
                                <h5 class="modal-title" id="exampleModalLongTitle" style="color: white;">Add video</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #FFFFFF;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('add.videoV', $vendedor->id)}}" class="" enctype="multipart/form-data" id="formEliminar">
                                    @csrf
                                      <!-- <input type="hidden" name="id" id="id" value="{{}}"> -->
                                      <div class="modal-form-group">
                                        <input class="modal-form-controll" type="text" name="video" placeholder="cole aqui o link do video" required>
                                      </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Adicionar</button>
                                        </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Fim doAdicionar Video -->
