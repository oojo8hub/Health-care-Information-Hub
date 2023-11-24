<?php

namespace App\Http\Livewire;

use App\Enums\Entity;
use App\Models\User;
use Livewire\Component;

class SelectUsers extends Component
{
    public $users;
    public $originalUsersBelongToEntity;
    public $values;

    public $role;
    public $permission;
    public $entityName;


    public function mount()
    {
        $this->users = User::pluck('name', 'id');

        if ($this->entityName === Entity::ROLE) {
            $this->values = User::role($this->role->name)->get()->pluck('id');
        }

        // Get a copy of the original options
        $this->originalUsersBelongToEntity = $this->values;
    }

    public function syncUsers()
    {
        $removedUsers = User::whereIn('id', $this->originalUsersBelongToEntity->diff($this->values))->get();
        $addedUsers = User::whereIn('id', collect($this->values)->diff($this->originalUsersBelongToEntity))->get();

        // Remove role from these users
        if (!empty($removedUsers)) {
            foreach ($removedUsers as $user) {
                $user->removeRole($this->role->name);
            }
        }

        // Add role to these users
        if (!empty($addedUsers)) {
            foreach ($addedUsers as $user) {
                $user->assignRole($this->role->name);
            }
        }

        session()->flash('message');

        // updated original users
        $this->originalUsersBelongToEntity = collect($this->values);
    }

    public function render()
    {
        return view('livewire.select-users');
    }
}
