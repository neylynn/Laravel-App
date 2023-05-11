<div class="modal modal-danger fade" id="deleteFormModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Delete!</h4>
            </div>
            <form action="#" method="post" id="deleteFormAction">
                {{ method_field("delete") }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <p class="text-center">Are you sure ? You want to delete this data.!&hellip;</p>
                    <input type="hidden" name="id" id="delete_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modal-danger fade" id="deleteMediaModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Delete!</h4>
            </div>
            <form action="#" method="post" id="deleteMediaFormAction">
                {{ method_field("delete")}}
                {{ csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">Are you sure ? You want to delete this media data.!&hellip;</p>
                    <input type="hidden" name="id" id="delete_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>





