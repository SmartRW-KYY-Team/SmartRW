<?php

namespace App\DataTables;

use App\Models\Kegiatan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class KegiatanWargaDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                return '<div style="display: flex; justify-content: space-between;">
                    <button type="button" class="btn btn-info me-2 showButtonDetail" data-bs-toggle="tooltip" data-id="' . $row->id_kegiatan . '" data-rw="' . $row->rw->nama . '"  data-rt="' . $row->rt->nama . '" data-bs-placement="top" title="Detail"><i class="fa fa-info-circle"></i></button>
                </div>';
            })
            ->addColumn('No', function () {
                static $index = 1;
                return $index++;
            })
            ->setRowId('id_kegiatan');
    }

    public function query(Kegiatan $model): QueryBuilder
    {
        $query = $model->newQuery()->with('rt', 'rw');
        $month = $this->request()->get('filter_month', date('m'));
        $year = $this->request()->get('filter_year', date('Y'));


        return $query->whereMonth('tanggal_kegiatan', $month)
            ->whereYear('tanggal_kegiatan', $year);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kegiatanwarga-table')
            ->columns($this->getColumns())
            ->orderBy(1, 'desc')
            ->selectStyleSingle()
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'scroller' => true,
                'scrollX' => true,
                'ajax' => [
                    'url' => route('kegiatan_page'),
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
            Column::make('nama'),
            Column::make('tanggal_kegiatan'),
            Column::make('deskripsi'),
            Column::make('rt.nama')->title('RT'),
            Column::make('rw.nama')->title('RW'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'KegiatanWarga_' . date('YmdHis');
    }
}
