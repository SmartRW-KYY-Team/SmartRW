<?php

namespace App\DataTables;

use App\Models\SuratSKTM;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SKTMDataTable extends DataTable
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
                return '<div style="display: flex; justify-content: space-between;">
                <button type="button" class="btn btn-light me-2 ShowModalSKTM"
                    data-id="' . $row->id_suratSKTM . '"
                    data-nama="' . $row->nama . '">
                    <i class="bi bi-eye-fill"></i>
                </button>
                <button type="button" class="btn btn-success me-2 AcceptModalSKTM"
                    data-id="' . $row->id_suratSKTM . '">
                    <i class="bi bi-check-square-fill"></i>
                </button>
            </div>';
            })
            ->addColumn('No', function () {
                static $index = 1;
                return $index++;
            })
            ->addColumn('pemohon_id', function ($row) {
                return $row->pemohon->nama;
            })
            ->setRowId('id');
    }

    public function query(SuratSKTM $model): QueryBuilder
    {
        return $model->newQuery()->with('pemohon');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sktm-table')
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

    public function getColumns(): array
    {
        return [
            Column::make('No'),
            Column::make('pemohon_id')->title('Pemohon'),
            Column::make('status'),
            Column::make('keterangan'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
