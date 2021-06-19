<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;
use App\Api\Account;

class HelloWorld extends Component
{
    private $account;

    public function mount(Account $account)
    {
        $this->account = $account;
    }

    public function render()
    {
        return view('livewire.hello-world', ['txns' => $this->getTxns()]);
    }

    private function getTxns()
    {
        return $this->account->getBscTxnList();
    }
}
