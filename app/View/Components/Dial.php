<?php

namespace App\View\Components;

use App\AppLpse;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dial extends Component
{
    public $type;
    public $message;
    public $personal;
    public $corporate;
    public $special;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $message)
    {
        //
        $this->type = $type;
        $this->message = $message;
        $this->personal = AppLpse::setting('harga_personal');
        $this->corporate = AppLpse::setting('harga_corporate');
        $this->special = AppLpse::setting('harga_special');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dial');
    }
}
