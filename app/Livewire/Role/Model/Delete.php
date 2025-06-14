<?php

namespace App\Livewire\Role\Model;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
class Delete extends Component
{

    public ?int $element_id = null;

    protected $listeners = ['delete'];

    public function delete($element_id): void
    {
        $this->element_id = $element_id;
        $this->dispatch('openModal', '#delete');
    }

    public function destroy(): void
    {
        $model = \App\Models\Role::findOrFail($this->element_id);
        $model->delete();
        $this->dispatch('closeModal', '#delete');
        // $this->alert('info', __('trans.data_deleted_successfully'));
        $this->dispatch('refreshDatatable');
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.role.model.delete');
    }
}
