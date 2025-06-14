<?php

namespace App\Livewire\Teams\Table;

use App\Models\Team;
use App\Traits\TableConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

class All extends DataTableComponent
{
    use TableConfiguration;
    protected $model = Team::class;

    public function columns(): array
    {
        return [
            Column::make('#', 'id')->sortable()->searchable(),
            Column::make(__('trans.name'), 'name')->sortable()->searchable(),
            Column::make(__('trans.team_leader'), 'user.first_name')->sortable(),
            Column::make(__('trans.count_newmuslims'), 'count_newmuslims'),
            Column::make(__('trans.actions'))
                ->format(fn($value, $row) => view('livewire.teams.table.action', compact('row')))
        ];
    }
}
