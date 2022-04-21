<!-- Modal -->
<div class="modal fade logout-modal" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-body justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h5 class="text-center mt-3">Apakah anda yakin untuk keluar ?</h5>
            <div class="container-fluid mt-4">
                <div class="row justify-content-center ps-4 pe-4 ">
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <button type="button" class="btn btn-danger">
                                
                                    Oke
                                                        
                            </button>
                        </a>   
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
</div>