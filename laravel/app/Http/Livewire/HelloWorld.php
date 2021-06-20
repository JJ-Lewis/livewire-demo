<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use App\Api\Account;

class HelloWorld extends Component
{
    public $address = '0x14B1B9A7cdaA2A917e19449FeBe6462602864226';
    // get bsc client
    private $account;
    // calculator
    private $formattedTxns;
    public $currencyList = [];
    public $lgDateFrom = '';
    public $lgDateTo = '';
    public $taxDateFrom = '';
    public $taxDateTo = '';


    public function mount(Account $account)
    {
        $this->account = $account;
        // format transactions into array of arrays
        foreach ($this->account->getBscTxnList() as $key => $txn) {
            $newTxn = [];
            foreach ($txn as $key => $field) {
                $newTxn[$key] = $field;
            }
            $this->formattedTxns[] = $newTxn;
        }
    }

    public function render()
    {
        return view('livewire.hello-world', ['txns' => $this->getTxns()]);
    }

    private function getTxns()
    {
        return collect($this->formattedTxns);
    }

    public function calculateLossGain()
    {
        // get the to and from dates, and filter the transactions by it

        // if there are transactions in that time period, calculate

        // otherwise return with error
        return;
    }
}
