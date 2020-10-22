<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Provide Help Summary</h4>
                <hr>
                <p class="card-title-desc">
                    Amount you requested to PH (Total amount) =
                    &#8358;{{number_format($ph_pending_amount)}}
                </p>
                <hr>
                <p class="card-title-desc">
                    Amount paid (Completed Transaction) =
                    &#8358;{{number_format($ph_pending_amount_paid)}}
                </p>
                <hr>
                <p class="card-title-desc">
                    Amount on processing (Merged but not completed) =
                    &#8358;{{number_format($ph_pending_amount_on_processing)}}
                </p>
                <hr>
                <p class="card-title-desc">
                    Amount left to be paid (Not merged yet) =
                    &#8358;{{number_format($ph_pending_amount_left_to_balance)}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Provide Help Important Notice</h4>
                <hr>
                <div class="card-title-desc">
                    <b class="text-warning">NOTICE: </b>Your Account will be
                    <b class="text-danger">suspended</b> if you do
                    not make payment
                    before merge <b class="text-danger">duration expires</b>
                    and reactivation of suspended account costs
                    <b class="text-danger">&#8358;{{number_format(3000)}}</b>.
                    Pay only to the account details that is shown on the website.
                </div>
                <hr>
                <b class="text-primary">If you have paid a user and you have also uploaded your payment receipt
                    but the user do not confirm you after 12hours. Please contact the support.</b>
                <hr>
                <b>Tip: You could call who you were merged with to notify
                    him/her before proceeding with payment</b>
            </div>
        </div>
    </div>
</div>
