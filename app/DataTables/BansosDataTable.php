<?php

namespace App\DataTables;

use App\Models\Bansos;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BansosDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '<div style="display: flex; justify-content: space-between;">
                    <button type="button" class="btn btn-light me-2 ShowModalBansos"
                        data-id="' . $row->id_bansos . '"
                        data-nama="' . $row->alternative . '">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                    <button type="button" class="btn btn-success me-2 AcceptModalBansos"
                        data-id="' . $row->id_bansos . '"
                        data-nama="' . $row->alternative . '">
                        <i class="bi bi-check-square-fill"></i> 
                    </button>
                </div>';
            })
            ->addColumn('No', function ($row) {
                static $index = 1;
                return $index++;
            })
            ->addColumn('keluarga.nama', function ($row) {
                return $row->keluarga->nama;
            })
            ->setRowId('id');
    }

    public function query(Bansos $model): QueryBuilder
    {
        return $model->newQuery()->with('keluarga'); 
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('bansos-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])
            ->parameters([
                'responsive' => true,
                'autoWidth' => true,
                'scroller' => true,
                'scrollX' => true,
                'fixedColumns' => true,
                'dom' => 'Bfrtip',
                'initComplete' => 'function(settings, json) {
                    $(this.api().table().container()).css("width", "100%");
                }'
            ]);
    }

    protected function getColumns(): array
    {
        return [
            Column::make('No'),
            Column::make('alternative')->title('Alternative'),
            Column::make('keluarga.nama')->title('Nama'), // Menggunakan relasi 'keluarga'
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Bansos_' . date('YmdHis');
    }
}
