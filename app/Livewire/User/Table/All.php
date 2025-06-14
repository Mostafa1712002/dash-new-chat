<?php

namespace App\Livewire\User\Table;

use App\Models\User;
use Livewire\Component;
use App\Traits\TableConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Traits\WithPagination;

class All extends DataTableComponent
{
    use TableConfiguration, WithPagination;
    protected $model = User::class;

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
            $this->column::make(__('trans.name'), 'first_name')
                ->format(function ($value, $row) {
                    return $row->full_name;
                })
                ->sortable()
                ->searchable(),
                $this->column::make(__('trans.email'), 'email')
              
                ->sortable()
                ->searchable(),
            // actions
            $this->column::make(__('trans.actions'), 'id')
                ->format(function ($value, $row) {
                    return view('livewire.user.table.action', compact('row'));
                }),
            $this->column::make(__('trans.created_at'), 'created_at')
                ->sortable(),
        ];
    }
}
