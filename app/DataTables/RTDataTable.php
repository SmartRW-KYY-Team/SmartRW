<?php

namespace App\DataTables;

use App\Models\Rt;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RTDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '<div style="display: flex; justify-content: space-between;">
                <button type="button" class="btn btn-info DetailButton me-2"
                data-id="' . $row->id_rt . '"
                data-nama="' . $row->nama . '">
                <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
                <a href="' . route('rt.edit', $row->id_rt)  . '" class="btn btn-warning">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            </div>';
            })
            ->addColumn('No', function () {
                static $index = 1;
                return $index++;
            })
            ->addColumn('ketua_id', function ($row) {
                return $row->ketuaRT->nama;
            })
            ->addColumn('sekretaris_id', function ($row) {
                return $row->sekretarisRT->nama;
            })
            ->addColumn('bendahara_id', function ($row) {
                return $row->bendaharaRT->nama;
            })
            ->setRowId('id');
    }

    public function query(Rt $model): QueryBuilder
    {
        return $model->newQuery()->with('ketuaRT', 'sekretarisRT', 'bendaharaRT');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('rt-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
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
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('No'),
            Column::make('nama')->title('RT'),
            Column::make('ketua_id')->title('Ketua'),
            Column::make('sekretaris_id')->title('Sekretaris'),
            Column::make('bendahara_id')->title('Bendahara'),
            Column::make('saldo')->title('Saldo'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'RT_' . date('YmdHis');
    }
}
