<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPermissions extends Component
{
    use WithPagination;

    public $search;
    public $sortColumn = '';
    public $sortDirection = '';

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

        $permissionsQuery = Permission::search($this->search);

        if (!empty($this->sortColumn)) {
            $permissionsQuery->orderBy($this->sortColumn, $this->sortDirection);
        }

        $permissions = $permissionsQuery->paginate(10);
        return view('livewire.show-permissions', [
            'permissions' => $permissions,
        ]);

    }


}
