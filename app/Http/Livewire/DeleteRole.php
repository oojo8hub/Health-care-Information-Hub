<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class DeleteRole extends Component
{
    public $role;

    public function deleteRole()
    {
        Role::find($this->role->id)->delete();

        session()->flash('role-deleted', 'The role has been successfully deleted.');

        return redirect()->to('/admin/roles');

    }

    public function render()
    {
        return view('livewire.delete-role');
    }
}
