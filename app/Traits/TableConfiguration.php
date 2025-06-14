<?php

namespace App\Traits;

use App\Exports\DataExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Maatwebsite\Excel\Facades\Excel;

trait TableConfiguration
{
    // use LivewireAlert;
    public int $index = 0;

    public function bootWithSorting(): void
    {
        $this->setSearchDebounce(800);
        $this->defaultSortColumn = 'id';
        $this->defaultSortDirection = 'desc';
    }

    public function initializeTableConfiguration(): void
    {
        $this->listeners = array_merge($this->listeners, [
            'refreshDatatable' => 'resetIndex',
        ]);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setTableWrapperAttributes([
            'class' => 'table text-nowrap',
        ]);

        $this->setTrAttributes(function ($row) {
            return [
                'class' => '',
            ];
        });

        $this->setThAttributes(function ($row) {
            return [
                'class' => '',
            ];
        });

        $this->setTbodyAttributes([
            'class' => '',
        ]);
        $this->setFilterLayoutSlideDown();
    }

    public function resetIndex()
    {
        $this->index = 0;
    }
    public function bulkActions(): array
    {
        return [
            // 'export' => __('trans.export_excel'),
            // 'pdf' => __('trans.export_pdf'),
        ];
    }

    // public function export()
    // {
    //     $models = $this->baseQuery()->pluck('id')->toArray();
    //     $this->clearSelected();
    //     $table = $this->modelRepository->getTable();
    //     $models = $this->modelRepository->instance()->whereIn('id', $models)->orderBy('id', 'desc')->get();
    //     $columns = $this->modelRepository->getColumns();
    //     $translated = $this->modelRepository->getTranslatedColumns();
    //     $this->alert('success', __('trans.export_excel_start'));

    //     return Excel::download(
    //         new DataExport($models, $columns, $translated),
    //         "$table-" . Carbon::now()->format('Y-m-d') . '.xlsx'
    //     );
    // }

    // public function pdf()
    // {
    //     $this->alert('success', __('trans.export_pdf_start'));

    //     $models = $this->baseQuery()->pluck('id')->toArray();
    //     $this->clearSelected();
    //     $table = $this->modelRepository->getTable();
    //     $models = $this->modelRepository->instance()->whereIn('id', $models)->pluck('id')
    //         ->toArray();
    //     $columns = $this->modelRepository->getColumns();
    //     $translated = $this->modelRepository->getTranslatedColumns();
    //     $class_name = get_class($this->modelRepository->getModel());
    //     return redirect()
    //         ->route('admin:reports.pdf', [
    //             'models' => $models,
    //             'table' => $table,
    //             'class_name' => $class_name,
    //             'columns' => $columns,
    //             'translated' => $translated,
    //         ]);
    // }
}
