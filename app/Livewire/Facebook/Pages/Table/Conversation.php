<?php

namespace App\Livewire\Facebook\Pages\Table;

use App\Models\User;
use Livewire\Component;
use App\Models\FacebookPage;
use App\Traits\TableConfiguration;
use App\Models\FacebookConversation;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Traits\WithPagination;

class Conversation extends DataTableComponent
{
    use TableConfiguration, WithPagination;
    protected $model = FacebookConversation::class;
    public $page_id;
    protected $column = Column::class;
    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->model::where('page_id', $this->page_id)->with('messages');
    }

    public function columns(): array
    {
        return [
            $this->column::make('#', 'id')
                ->sortable()
                ->searchable(),
            $this->column::make('#', 'conversation_id')
                ->hideIf(true)
                ->sortable()
                ->searchable(),
                $this->column::make('#', 'page_id')
                ->hideIf(true)
                ->sortable()
                ->searchable(),
            $this->column::make(__('trans.message_count'), 'message_count')
                ->sortable()
                ->searchable(),
            $this->column::make(__('trans.from'), 'participants')
                ->format(function ($value, $row) {
                    if (empty($row->participants)) {
                        return '';
                    }
                    $participants = $row->participants;
                    $participants = json_decode($participants, true)['data'];
                    return $participants[0]['name'] ?? '';

                })
                ->searchable(function ($query, $search) {
                    return $query->whereJsonContains('participants', $search);
                }),

            $this->column::make(__('trans.link'), 'link')
                ->format(function ($value, $row) {
                    echo '<a href="https://www.facebook.com/' . $row->link . '" target="_blank" class="text-blue-500 hover:underline">' . $row->link . '</a>';
                })
                ->sortable()
                ->searchable(),
            $this->column::make(__('trans.actions'), 'id')
                ->format(function ($value, $row) {
                    return view('livewire.facebook.pages.table.action-conversation', compact('row'));
                }),

        ];
    }
}