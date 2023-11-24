<?php

namespace App\Http\Livewire;

use App\Enums\Entity;
use App\Models\Permission;

use Livewire\Component;

class SelectPermissions extends Component
{
    public $user;

    public $role;
    public $entityName;

    public $values;

    public $permissions;

    public function mount()
    {
        $this->permissions = Permission::pluck('name', 'id');

        if ($this->entityName === Entity::USER) {
            $this->values = $this->user->getDirectPermissions()->pluck('id');;

        } elseif ($this->entityName === Entity::ROLE) {
            $this->values = $this->role->permissions->pluck('id');
        }

    }

    public function syncPermissions()
    {
        if (!empty($this->user)) {
            $this->syncPermissionsToUser();
        } elseif (!empty($this->role)) {
            $this->syncPermissionsToRole();
        }

    }

    public function syncPermissionsToUser()
    {
        $permissionsToSync = Permission::find($this->values)->pluck('name');

        $this->user->syncPermissions($permissionsToSync);

        session()->flash('message', 'Roles successfully updated.');
    }


    public function syncPermissionsToRole()
    {
        $permissionsToSync = Permission::find($this->values)->pluck('name');

        $this->role->syncPermissions($permissionsToSync);

        session()->flash('message', 'Roles successfully updated.');
    }

    public function render()
    {
        return view('livewire.select-permissions');
    }

}
