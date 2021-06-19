<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <h2>Transaction List</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="list-group">
                        @foreach ($txns as $key => $txn)
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                   <span>Transaction Number: {{ $key }}</span>
                                   <span>{{ Carbon\Carbon::createFromTimestamp($txn->{'timeStamp'})->toDateTimeString() }}</span>
                                </div>
                                <p></p>
                            </div>
                        @endforeach
                    </div>
                   
                </div>
            </div>
            
        </div>
        <div class="col-6">
            <h2>Calculator</h2>
        </div>
    </div>
</div>
