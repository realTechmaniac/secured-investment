<div class="row">
    <div class="col-lg-12 pt-5 pb-5">
        <div class="card card-body pb-5">
            <h1 class="card-title mt-0 text-center text-danger">Subscription Expired!</h1>
            <p class="card-text text-center">Your subscription has expired. Reactivation is
                only 5% of the profit on your total Get Help (including Referral Bonus) in
                the past 30days.<br>
                Total profit on GH (including Referral Bonus) in 30days:
                <b class="text-danger">&#8358;{{number_format($user_profit_for_the_month)}}</b>
                <br>Reactivation Fee:
                <strong class="text-primary">&#8358;{{number_format($user_reactivation_fee)}}</strong>.
            </p>

            <div class="text-center">
                <button type="button" class="btn btn-primary waves-effect waves-light"
                        data-toggle="modal" data-target=".reactivation-confirmation-modal"
                        aria-pressed="false">
                    Reactivate
                </button>
            </div>
        </div>
    </div>
</div>
