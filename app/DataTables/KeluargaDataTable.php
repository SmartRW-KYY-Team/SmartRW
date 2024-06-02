<?php

namespace App\DataTables;

use App\Models\Keluarga;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KeluargaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '<div style="display: flex; justify-content: space-beetween; ">
            <button type="button" class="btn btn-info me-2 showButtonDetail" data-bs-toggle="tooltip" data-id="' . $row->id_keluarga . '" data-bs-placement="top" title="Detail"><i class="fa fa-info-circle"></i></button>
            <a href="/keluarga/' . $row->id_keluarga . '/edit" class="btn btn-warning me-2 editButton" data-bs-toggle="tooltip" data-id="' . $row->id_keluarga . '"
            data-bs-placement="top" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                ';
            })
            ->addColumn('No', function () {
                static $index = 1;
                return $index++;
            })
            ->addColumn('rt_id', function ($row) {
                return $row->rt->nama;
            })
            ->addColumn('rw_id', function ($row) {
                return $row->rw->nama;
            })
            ->addColumn('kepala_keluarga_id', function ($row) {
                return $row->kepala_keluarga->nama;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Keluarga $model): QueryBuilder
    {
        return $model->newQuery()->with('kepala_keluarga', 'rt', 'rw');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('keluarga-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])->parameters([
                'responsive' => true,
                'autoWidth' => true,
                'scroller' => true,
                'scrollX' => true,
                'fixedColumns' => true,
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('No'),
            Column::make('nokk')->title('No Kartu Keluarga'),
            Column::make('kepala_keluarga_id')->title('Kepala Keluarga'),
            Column::make('rt_id')->title('RT'),
            Column::make('rw_id')->title('RW'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Keluarga_' . date('YmdHis');
    }
}
