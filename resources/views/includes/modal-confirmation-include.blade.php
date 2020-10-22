<div class="modal fade confirmation-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"></div>
                    <div class="swal2-header">
                        <h5><strong>{{$body}}</strong></h5>
                    </div>
                    <div class = "swal2-content" style="display: block;">{{$warning}}</div>
                    <div class="swal2-actions">
                        <button type="button" class="swal2-cancel swal2-styled btn-danger" style="display: inline-block;" aria-label="">Cancel</button>
                        <button type="button " class="swal2-confirm swal2-styled btn-success" style="display: inline-block;" aria-label="">Proceed</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>
