    @if (session('notify'))
        <script>
            $(document).ready(function() {
                $("#success-modal").modal("show");
            })
        </script>
    @elseif (session('notifyerror'))
        <script>
            $(document).ready(function() {
                $("#error-modal").modal("show");
            })
        </script>
    @endif

    <!-- BEGIN: Success Modal -->
    <div id="success-modal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-success rounded">
                <div class="modal-body text-center text-white p-3 text-bolder">
                    {{ session('notify') ?? '-' }}
                </div>
            </div>
        </div>
    </div>
    <!-- END:  Success Modal -->

    <!-- BEGIN: Error Modal -->
    <div id="success-modal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content bg-danger rounded">
                <div class="modal-body text-center p-3 text-white text-bolder">
                    {{ session('notifyerror') ?? '-' }}
                </div>
            </div>
        </div>
    </div>
    <!-- END:  Error Modal -->
