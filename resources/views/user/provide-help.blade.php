@extends('layouts.userApp')

@section('page-title')Secured Investment -Dashboard @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Provide Help</h4>
                        </div>
                    </div>
                </div>

                <!-- start page title -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border ">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary">Enter the
                                    amount you want to invest</h5>
                                <div class="alert alert-info mt-3">
                                    Notice:
                                    <ol>
                                        <li>Provide Help yields 50% of your investment in 4days</li>
                                        <li>
                                            Minimum amount that can be invested is NGN <b class="text-primary">2,000</b>
                                        </li>
                                        <li>
                                            Maximum amount that can be invested is NGN <b class="text-primary">100,000</b>
                                        </li>
                                        <li>
                                            You can only invest an amount that is <b class="text-primary">greater than or equal to your previous investment</b>
                                        </li>
                                        <li>
                                            <b>INVEST ONLY WITH YOUR SPARE MONEY</b>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <span id="amount-phh"></span>
                                    <input type="number" class="form-control" id="ph-enter-amount"
                                           aria-describedby="emailHelp" placeholder="Enter Amount" required>
                                </div>
                                <div class="my-4 text-center">
                                    <!-- Small modal -->
                                    <button type="button"
                                            class="btn btn-primary waves-effect waves-light font-weight-bold " id="ph-button-save"
                                            data-toggle="modal" data-target=".provide-help-enter-amount-modal" disabled>Provide Help
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--MODAL--}}
    {{--MODAL--}}
    {{--MODAL--}}
    {{--MODAL--}}
    <div>
        <div class="modal fade provide-help-enter-amount-modal" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Provide Help Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <div
                                class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                style="display: flex;"></div>
                            <div class="swal2-header">
                                <h5>
                                    <strong>
                                        <span id="submit-ph-amount"></span>
                                    </strong>
                                </h5>
                            </div>
                            <div class="swal2-content" style="display: block;">You won't
                                be able to revert this!
                            </div>
                            <div class="swal2-actions">
                                <button type="button"
                                        class="swal2-cancel swal2-styled btn-danger"
                                        style="display: inline-block;" data-dismiss="modal">
                                    No, Close
                                </button>
                                <form action="{{route('save.provide.help')}}" method="POST">
                                    @csrf
                                    <input id="ph-amount-hidden" type="hidden" value="0" name="ph_amount">
                                    <button type="submit"
                                            class="swal2-confirm swal2-styled btn-success"
                                            style="display: inline-block;" aria-label="">
                                        Yes, Proceed
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
@endsection

@section('js')
    <script>
        $('input#ph-enter-amount').on('keyup', function () {
            let ph_amount = $('input#ph-enter-amount').val();
            let profit = parseInt(ph_amount) * 0.5;
            let total = parseInt(ph_amount) + parseInt(profit);
            let formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'NGN',
            });

            let finalTotal = (parseInt(ph_amount) > 0 ? formatter.format(total) : 'NGN 0.00')
            let inputAmount = (parseInt(ph_amount) > 0 ? ph_amount : 0)
            let finalAmount = (parseInt(ph_amount) > 0 ? formatter.format(ph_amount) : 'NGN 0.00')
            let _html = '(Provide Help of <b class="text-danger">'+finalAmount+'</b>  yields <b class="text-primary">'+finalTotal+'</b> in 4days)'
            let _html2 = 'Are you sure you want to Provide Help of\n' +
                '                                        <b class="text-danger">'+finalAmount+'</b> to get\n' +
                '                                        <b class="text-primary">'+finalTotal+'</b> after 4days? '
            $('#amount-phh').html(_html)
            $('#submit-ph-amount').html(_html2)
            $('input#ph-amount-hidden').val(inputAmount)
            $("#ph-button-save").prop("disabled",false);
        });
    </script>
@endsection

@section('css')

@endsection
