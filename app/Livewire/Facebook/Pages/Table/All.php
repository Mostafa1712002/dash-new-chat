<?php

namespace App\Livewire\Facebook\Pages\Table;

use App\Models\User;
use Livewire\Component;
use App\Models\FacebookPage;
use App\Traits\TableConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Traits\WithPagination;

class All extends DataTableComponent
{
    use TableConfiguration, WithPagination;
    protected $model = FacebookPage::class;

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
            $this->column::make(__('trans.page_id'), 'page_id')
                ->sortable()
                ->searchable(),
                $this->column::make(__('trans.name'), 'type')
              
                ->sortable()
                ->searchable(),
            // actions
            $this->column::make(__('trans.actions'), 'id')
                ->format(function ($value, $row) {
                    return view('livewire.facebook.pages.table.action', compact('row'));
                }),
            $this->column::make(__('trans.created_at'), 'created_at')
                ->sortable(),
        ];
    }
}
