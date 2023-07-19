<?php

namespace modules\HumanResource\App\Http\Livewire;

use Livewire\Component;

class MultiSectionForm extends Component
{
    public $showSection2 = false;

    public function render()
    {
        return view('LeaveRequest.fields');
    }
    public function toggleSection2()
    {
        $this->showSection2 = !$this->showSection2;
    }
}
