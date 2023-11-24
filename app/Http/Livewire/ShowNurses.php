<?php

namespace App\Http\Livewire;

use App\Models\Guide;
use App\Models\Nurse;
use Livewire\Component;
use Livewire\WithPagination;

class ShowNurses extends Component
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

    public function deleteNurse($id)
    {
        sleep(0.5);

        Nurse::destroy($id);

        session()->flash('nurse-deleted', 'The nurse application has been successfully deleted.');

        return redirect()->to('/admin/nurses');
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

        $nursesQuery = Nurse::search($this->search)
            ->query(function ($builder) {
                $builder
                    ->join('users', 'nurses.user_id', '=', 'users.id')
                    ->join('registration_classes', 'nurses.registration_class_id', '=', 'registration_classes.id')
                    ->select([
                        'nurses.*',
                        'users.name as name',
                        'registration_classes.name as registration_class_name',
                        'registration_classes.abbreviation as registration_class_abbreviation',
                    ]);

            });

        if (!empty($this->sortColumn)) {
            $nursesQuery->orderBy($this->sortColumn, $this->sortDirection);
        }

        $nurses = $nursesQuery->paginate(10);

        return view('livewire.show-nurses', [
            'nurses' => $nurses,
        ]);

    }


}
