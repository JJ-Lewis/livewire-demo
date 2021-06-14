<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Api\Account;

class HelloWorld extends Component
{
    private $account;
    public $response;

    public function mount(Account $account)
    {
        $this->account = $account;
        $this->response = $this->account->getBNBBalance();
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
