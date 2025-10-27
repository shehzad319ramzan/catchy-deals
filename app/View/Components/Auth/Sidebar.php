<?php

namespace App\View\Components\Auth;

use App\Models\Role;
use App\Repositories\RoleRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role as ModelsRole;

class Sidebar extends Component
{
    public $roles = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $roleRepo = new RoleRepository(new ModelsRole());
        $this->roles = $roleRepo->get_all_roles();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.auth.sidebar');
    }
}
