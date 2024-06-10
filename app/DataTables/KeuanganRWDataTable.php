<?php

namespace App\DataTables;

use App\Models\KeuanganRW;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KeuanganRWDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '<div style="display: flex; justify-content: space-between;">
                <button type="button" class="btn btn-warning me-2 editKeuanganButton"
                data-id="' . $row->id_keuanganRW . '"
                    data-nama="' . $row->nama . '">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-danger deleteButton"
                    data-id="' . $row->id_keuanganRW . '"
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
            ->setRowId('id_keuanganRW');
    }

    public function query(KeuanganRW $model): QueryBuilder
    {
        $rw_id = session('no_role');

        $query = $model->newQuery()->where('rw_id', $rw_id);

        if (request()->has('filter_month') && request('filter_month')) {
            $query->whereMonth('tanggal', request('filter_month'));
        }

        if (request()->has('filter_year') && request('filter_year')) {
            $query->whereYear('tanggal', request('filter_year'));
        }
        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('keuanganRW-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1, 'desc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('reload')
            ])
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'scroller' => true,
                'scrollX' => true,
                'ajax' => [
                    'url' => route('keuanganrt.index'),
                    'data' => 'function(d) { 
                        d.filter_month = $("#filter-month").val(); 
                        d.filter_year = $("#filter-year").val();
                    }',
                ],
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
        return 'KeuanganRW_' . date('YmdHis');
    }
}
