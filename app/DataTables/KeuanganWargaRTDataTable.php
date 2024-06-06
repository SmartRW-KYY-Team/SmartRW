<?php

namespace App\DataTables;

use App\Models\KeuanganRT;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KeuanganWargaRTDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('No', function () {
                static $index = 1;
                return $index++;
            })
            ->editColumn('tipe', function ($row) {
                return $row->tipe == 'Masuk'
                    ? '<span class="text-success">' . $row->tipe . '</span>'
                    : '<span class="text-danger">' . $row->tipe . '</span>';
            })
            ->rawColumns(['tipe'])
            ->setRowId('id_keuanganRT');
    }

    public function query(KeuanganRT $model): QueryBuilder
    {
        $rt_id = request('rt_id') ?? session('no_role');
        $query = $model->newQuery()->where('rt_id', $rt_id);

        if (request()->has('filter_month') && request('filter_month')) {
            $query->whereMonth('tanggal', request('filter_month'));
        } else {
            $query->whereMonth('tanggal', date('m'));
        }

        if (request()->has('filter_year') && request('filter_year')) {
            $query->whereYear('tanggal', request('filter_year'));
        } else {
            $query->whereYear('tanggal', date('Y'));
        }

        return $query;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('keuanganRT-table')
            ->columns($this->getColumns())
            ->orderBy(1, 'desc')
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'scroller' => true,
                'scrollX' => true,
                'ajax' => [
                    'url' => route('keuanganWarga.rt.index'),
                    'data' => 'function(d) { 
                        d.filter_month = $("#filter-month").val() || ' . date('m') . '; 
                        d.filter_year = $("#filter-year").val() || ' . date('Y') . ';
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
        ];
    }

    protected function filename(): string
    {
        return 'KeuanganWargaRT_' . date('YmdHis');
    }
}

