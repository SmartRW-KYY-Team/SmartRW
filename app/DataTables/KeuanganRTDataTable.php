<?php

namespace App\DataTables;

use App\Models\KeuanganRT;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KeuanganRTDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '<div style="display: flex; justify-content: space-between;">
                <button type="button" class="btn btn-warning me-2 editKeuanganButton"
                data-id="' . $row->id_keuanganRT . '"
                    data-nama="' . $row->nama . '">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-danger deleteButton"
                    data-id="' . $row->id_keuanganRT . '"
                    data-nama="' . $row->nama . '">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
            </div>';
            })
            ->addColumn('No', function () {
                static $index = 1;
                return $index++;
            })
            ->editColumn('tipe', function ($row) {
                if ($row->tipe == 'Masuk') {
                    return '<span class="text-success">' . $row->tipe . '</span>';
                } else {
                    return '<span class="text-danger">' . $row->tipe . '</span>';
                }
            })
            ->rawColumns(['action', 'tipe'])
            ->setRowId('id_keuanganRT');
    }

    public function query(KeuanganRT $model): QueryBuilder
    {
        $rt_id = session('no_role');
        
        if ($rt_id) {
            return $model->newQuery()->where('rt_id', $rt_id);
        } else {
            return $model->newQuery()->where('rt_id', null);
        }
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('keuanganRT-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1, 'desc') 
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
                'autoWidth' => false,
                'scroller' => true,
                'scrollX' => true
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('No'),
            Column::make('tanggal'),
            Column::make('jumlah'),
            Column::make('tipe'),
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
        return 'KeuanganRT_' . date('YmdHis');
    }
}
