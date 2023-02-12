    @if (session('notify'))
        <script>
            $(document).ready(function() {
                $("#success-modal").modal("show");
            })
        </script>
    @endif

    <!-- BEGIN: Success Modal -->
    <div id="success-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-2">
                    <div class="p-2 text-center">
                        <div class="text-3xl mt-2 fw-bolder">Yeheey!</div>
                        <h1 class="text-center align-middle text-success mt-2" style="font-size: 100px">
                            <i class="mdi mdi-comment-check-outline mx-auto"></i>
                        </h1>
                        <div class="text-slate-500 mt-2">{{ session('notify') ?? '-' }}</div>
                    </div>
                    <div class="px-5 pb-8 text-center mt-3">
                        <button type="button" data-bs-dismiss="modal"
                            class="btn btn-outline-warning w-24 mr-1 me-2">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END:  Success Modal -->
