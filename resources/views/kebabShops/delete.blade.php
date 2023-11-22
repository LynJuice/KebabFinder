<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="text-center modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Ar tikrai norite ištrinti?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne</button>
                <form id='confirmDelete' method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"" type=" submit"> <i class="bx bx-trash me-1"></i> Taip</button>
                </form>
            </div>
        </div>
    </div>
</div>