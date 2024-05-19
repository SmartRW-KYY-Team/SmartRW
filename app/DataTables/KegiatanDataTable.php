<?php

namespace App\DataTables;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KegiatanDataTable extends DataTable
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
                <a href="#" class="btn btn-info me-2"><i class="fa fa-info-circle"></i>Detail</a>
                <a href="#" class="btn btn-warning me-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Ubah</a>
                    <a href="#" class="btn btn-danger "><i class="fa fa-trash" aria-hidden="true"></i>Hapus</a></div>';
            })
            ->addColumn('No', function () {
                static $index = 1;
                return $index++;
            })
            // ->addColumn('rt_nama', function ($row) {
            //     return $row->rt_relation->nama;
            // })
            // ->addColumn('rw_nama', function ($row) {
            //     return $row->rw_relation->nama;
            // })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Kegiatan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kegiatan-table')
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
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('No'),
            Column::make('nama'),
            Column::make('tanggal_kegiatan'),
            Column::make('deskripsi'),
            Column::make('rt_id'),
            Column::make('rw_id'),
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
        return 'Kegiatan_' . date('YmdHis');
    }
}
