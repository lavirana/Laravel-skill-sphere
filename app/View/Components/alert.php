<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alert extends Component
{

    //public $type;
    //public $message;
  

    protected $types = [
        'success',
        'danger',
        'info'
    ];
    /**
     * Create a new component instance.
     */
    public function __construct(public string $type = 'info', public string $message = 'No message', public string $title = 'Alert')
    {
        //$this->type = $type;
        //$this->message = $message;
    }

    public function validType(){
        return in_array($this->type,$this->types) ? $this->type : 'info';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
