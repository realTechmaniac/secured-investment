<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Get Help Summary</h4>
                <hr>
                <p class="card-title-desc">
                    Amount you requested to GH (Total amount) =
                    &#8358;{{number_format($gh_pending_amount)}}
                </p>
                <hr>
                <p class="card-title-desc">
                    Amount paid (Completed Transaction) =
                    &#8358;{{number_format($gh_pending_amount_paid)}}
                </p>
                <hr>
                <p class="card-title-desc">
                    Amount on processing (Merged but not completed) =
                    &#8358;{{number_format($gh_pending_amount_on_processing)}}
                </p>
                <hr>
                <p class="card-title-desc">
                    Amount left to be paid (Not merged yet) =
                    &#8358;{{number_format($gh_pending_amount_left_to_balance)}}
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Get Help Important Notice</h4>
                <hr>
                <div class="card-title-desc">
                    <ol>
                        <li><b class="text-danger">Do not</b> <b class="text-primary">confirm</b> a user if he/she has not paid you.</li>
                        <li>You may <b class="text-primary">confirm</b> a user, without the user uploading receipt, <b class="text-danger">only if</b> you have seen his/her credit alert</li>
                        <li>If a user <b class="text-danger">uploads a fake receipt</b> and he/she has not paid you. You may <b class="text-danger">flag the receipt as fake</b> by clicking <b class="text-danger">report button</b>. <b class="text-primary">Admin will response</b> to the matter and <b class="text-danger">defaulter will be punished</b>. Note that report button is only available when receipt has been uploaded.</li>
                        <li>If a user <b class="text-danger">does not pay</b> you before merge expires, you be <b class="text-danger">automatically unmerged</b> from such user and you will be <b class="text-primary">re-merged</b> with another user</li>
                        <li>If multiple users were merged to pay you and one of them is <b class="text-danger">facing disciplinary actions</b>. You will be <b class="text-danger">unmerged</b> from such user and you will be <b class="text-primary">re-merged</b> with another user</li>
                    </ol>
                </div>
                <hr>
                <b>Tip: You could call who you were merged with to notify
                    him/her that they have been merged to pay you.</b>
            </div>
        </div>
    </div>
</div>
