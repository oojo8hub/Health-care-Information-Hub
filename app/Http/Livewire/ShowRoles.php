<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRoles extends Component
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

    public function deleteRole($id)
    {
        sleep(0.5);

        Role::destroy($id);

        session()->flash('role-deleted', 'The role has been successfully deleted.');

        return redirect()->to('admin/roles');
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
        $rolesQuery = Role::search($this->search);

        if (!empty($this->sortColumn)) {
            $rolesQuery->orderBy($this->sortColumn, $this->sortDirection);
        }

        $roles = $rolesQuery->paginate(10);
        return view('livewire.show-roles', [
            'roles' => $roles,
        ]);
    }

}
