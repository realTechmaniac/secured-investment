{{--Last Five Transactions Table--}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Latest Transactions</h4>
                <p class="card-title-desc">Below are your latest transactions. Check the
                    transactions page to see more.
                </p>
                <div class="table-rep-plugin">
                    <div class="mb-0" data-pattern="priority-columns">
                        <table id="latest-transactions"
                               class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Transaction Status</th>
                                <th>Transaction Type</th>
                                <th>Amount (&#8358;)</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--{{dd($all_five_latest_transactions_gh)}}--}}
                            @if($all_five_latest_transactions_ph->count() > 0)
                                @foreach($all_five_latest_transactions_ph as $row)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('d/m/y')}}</td>
                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('l\, g:i A')}}</td>
                                        <td>
                                            @if($row->status == 'completed')
                                                <span class="badge badge-success">Completed</span>
                                            @else
                                                <span class="badge badge-danger">Incomplete</span>
                                            @endif
                                        </td>

                                        <td>
                                            <b class="text-danger">Provide Help</b>
                                        </td>
                                        <td>{{number_format($row->amount)}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            @if($all_five_latest_transactions_gh->count() > 0)
                                @foreach($all_five_latest_transactions_gh as $row)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('d/m/y')}}</td>
                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('l\, g:i A')}}</td>
                                        <td>
                                            @if($row->status == 'completed')
                                                <span class="badge badge-success">Completed</span>
                                            @else
                                                <span class="badge badge-danger">Incomplete</span>
                                            @endif
                                        </td>

                                        <td>
                                            <b class="text-primary">Get Help</b>
                                        </td>
                                        <td>{{number_format($row->amount)}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
