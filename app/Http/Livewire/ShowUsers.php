<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    public $search;
    public $sortColumn = '';
    public $sortDirection = '';

    public $confirmingId;

    /**
     * mount() is only ever called when the component is first mounted
     */
    public function mount()
    {
        $this->search = request()->query('search', '');
    }

    /**
     * Resetting Pagination After Filtering Data
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function doSomething($id)
    {
        $this->confirmingId = $id;
    }

    public function cancelDelete()
    {
        $this->confirmingId = '';
    }

    public function deleteUser($id)
    {
        sleep(0.5);

        User::destroy($id);

        session()->flash('user-deleted', 'The user has been successfully deleted.');

        return redirect()->to('admin/users');
    }

    public function sortBy($column)
    {
        sleep(0.5);

        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumn = $column;
    }


    public function render()
    {
        $usersQuery = User::search($this->search);

        if (!empty($this->sortColumn)) {

            if ($this->sortColumn === 'first_name') {
                $usersQuery->orderBy($this->sortColumn, $this->sortDirection)->orderBy('last_name');
            } else {
                $usersQuery->orderBy($this->sortColumn, $this->sortDirection);
            }

        }

        $users = $usersQuery->paginate(10);

        $users->load('roles');

        return view('livewire.show-users', [
            'users' => $users,
        ]);
    }
}
