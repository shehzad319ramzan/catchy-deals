<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    public $list = null;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->list = Role::where('name', '!=', 'admin')->select('name', 'id')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.role-list');
    }
}
