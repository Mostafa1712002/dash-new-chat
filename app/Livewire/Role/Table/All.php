<?php

namespace App\Livewire\Role\Table;

use App\Models\Role;
use Livewire\Component;
use App\Traits\TableConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Traits\WithPagination;

class All extends DataTableComponent
{
    use TableConfiguration, WithPagination;
    protected $model = Role::class;

    protected $column = Column::class;
    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->model::query();
    }

    public function columns(): array
    {
        return [
            $this->column::make('#', 'id')
                ->sortable()
                ->searchable(),
            $this->column::make(__('trans.display_name'), 'display_name')
                ->sortable()
                ->searchable(),
            // actions
            $this->column::make(__('trans.actions'), 'id')
                ->format(function ($value, $row) {
                    return view('livewire.role.table.action', compact('row'));
                }),
            $this->column::make(__('trans.created_at'), 'created_at')
            ->sortable()
            ,
        ];
    }
}
