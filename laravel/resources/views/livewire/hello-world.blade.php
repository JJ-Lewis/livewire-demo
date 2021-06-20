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
                                   <span>Nonce: {{ $txn['nonce'] }}</span>
                                   <span>Timestamp: {{ Carbon\Carbon::createFromTimestamp($txn['timeStamp'])->toDateTimeString() }}</span>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <span>Value: {{ floatval($txn['value'])/pow(10, 18) }} BNB</span>
                                 </div>
                                 <div class="d-flex w-100 justify-content-between">
                                     @php
                                         $from = ($txn['from'] === strtolower($address)) ? 'me' : $txn['from'];
                                         $to = ($txn['to'] === strtolower($address)) ? 'me' : $txn['to'];
                                     @endphp
                                    <span>From: {{ $from }}</span>
                                    <span>To: {{ $to }}</span>
                                 </div>
                            </div>
                        @endforeach
                    </div>
                   
                </div>
            </div>
            
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <h2>Calculator</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h4>Calculate LOSS/GAIN</h4>
                    <div class="form-group mb-4">
                        <label for="lossgainDateFrom">Date From</label>
                        <input wire:model.defer="lgDateFrom" type="date" class="form-control" name="lossgainDateFrom">
                        <span>{{ $lgDateFrom }}</span>
                        <label for="lossgainDateTo">Date To</label>
                        <input wire:model.defer="lgDateTo" type="date" class="form-control" name="lossgainDateTo">
                        <span>{{ $lgDateTo }}</span>
                    </div>
                    <button class="btn btn-xl btn-primary" wire:click="calculateLossGain">LOSS/GAIN ME</button>
                </div>
                <div class="col-6">
                    <h4>Calculate Taxable Income</h4>
                    <div class="form-group mb-4">
                        <label for="taxDateFrom">Date From</label>
                        <input wire:model.defer="taxDateFrom" type="date" class="form-control" name="taxDateFrom">
                        <label for="taxDateTo">Date To</label>
                        <input wire:model.defer="taxDateTo" type="date" class="form-control" name="taxDateTo">
                    </div>
                    <button class="btn btn-xl btn-primary">TAX ME</button>
                </div>
            </div>
        </div>
    </div>
</div>
