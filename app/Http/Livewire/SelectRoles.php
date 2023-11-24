<?php

namespace App\Http\Livewire;

use App\Enums\Entity;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectRoles extends Component
{
    public $user;
    public $permission;
    public $entityName;

    public $values;
    public $roles;


    /**
     * mount() is only ever called when the component is first mounted
     */
    public function mount()
    {
        $this->roles = Role::pluck('name', 'id');
        if (!empty($this->permission)) {
            $this->values = $this->permission->roles->sortBy('name')->pluck('id');
        } elseif (!empty($this->user)) {
            $this->values = $this->user->roles->sortBy('name')->pluck('id');
        }

    }

    public function syncRoles()
    {
        if ($this->entityName === Entity::USER) {
            $this->syncRolesToUser();

        } elseif ($this->entityName === Entity::PERMISSION) {
            $this->syncRolesToPermission();
        }
    }

    public function syncRolesToUser()
    {
        $rolesToSync = Role::find($this->values)->pluck('name');

        if ($this->user->id === Auth::user()->id && Auth::user()->hasRole('super admin')
            && !in_array('super admin', $rolesToSync->toArray())) {

            // if current super admin tries to remove his super admin role, then sync super admin back to him
            $rolesToSync->push('super admin');

            session()->flash('superadmin', 'Super admin cannot remove the role itself.');
        }

        $this->user->syncRoles($rolesToSync);

        // update values
        $this->values = $this->user->roles->sortBy('name')->pluck('id');

        session()->flash('message');
    }

    public function syncRolesToPermission()
    {
        $rolesToSync = Role::find($this->values)->pluck('name');

        $this->permission->syncRoles($rolesToSync);

        session()->flash('message');
    }


    public function render()
    {
        return view('livewire.select-roles');
    }
}
