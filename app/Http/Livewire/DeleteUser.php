<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class DeleteUser extends Component
{
    public $user;

    public function deleteUser()
    {
        User::find($this->user->id)->delete();

        session()->flash('user-deleted', 'The user has been successfully deleted.');

        return redirect()->to('/admin/users');
    }

    public function render()
    {
        return view('livewire.delete-user');
    }
}
