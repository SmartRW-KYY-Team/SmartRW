<?php

namespace App\DataTables;

use App\Models\SuratDomisili;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DomisiliDatatable extends DataTable
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
                <button type="button" class="btn btn-light me-2 ShowModalDomisili"
                    data-id="' . $row->id_suratDomisili . '"
                    data-nama="' . $row->nama . '">
                    <i class="bi bi-eye-fill"></i>
                </button>
                ' . ($row->status != "Selesai" ? '
                <button type="button" class="btn btn-success me-2 AcceptModalDomisili"
                    data-id="' . $row->id_suratDomisili . '"
                    data-nama="' . $row->nama . '">
                    <i class="bi bi-check-square-fill"></i>
                </button>' : '<button type="button" class="btn btn-success disabled me-2 AcceptModalDomisili"
                data-id="' . $row->id_suratDomisili . '"
                data-nama="' . $row->nama . '">
                <i class="bi bi-check-square-fill"></i>
            </button>') . '
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

    /**
     * Get the query source of dataTable.
     */
    public function query(SuratDomisili $model): QueryBuilder
    {
        if (session('role') == 'rw') {
            return $model->newQuery()->with('pemohon');
        } else if (session('role') == 'rt') {
            return $model->newQuery()->with('pemohon')->where('rt_id', session('no_role'));
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('domisili-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
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

    /**
     * Get the dataTable columns definition.
     */
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

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
