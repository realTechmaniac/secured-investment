<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="pt-4 pl-2">
                    {{--Pending First Activation Fee--}}
                    <h4 class="card-title pt-4">Pending Activation Fee Request</h4>
                    <p>
                        Your request to Provide Help of
                        <b class="text-primary">&#8358;{{number_format($ph_activation->amount)}}
                            (Activation Fee)</b> is
                        Pending. You will be merged very soon.
                        However, if you like to change your mind, you can cancel
                        your
                        request to provide
                        help. Please note that <b class="text-primary">Activation Fee</b> attracts
                        <b class="text-primary">no profit</b>.
                        <a style="color: #fff" class="btn btn-danger mt-2"
                           data-toggle="modal"
                           data-target=".first-activation-cancel-confirmation">Cancel
                            PH</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
