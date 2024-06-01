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
                    <form action="' . route('bansos.delete', $row->id_bansos) . '" method="POST" style="display: inline;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger me-2" onclick="return confirm(\'Apakah Anda Yakin?\')">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
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
            Column::make('keluarga.nama')->title('Nama'),
            Column::make('K1')->title('Pendapatan'),
            Column::make('K2')->title('Kendaraan'),
            Column::make('K3')->title('Jenis Lantai'),
            Column::make('K4')->title('Kondisi Dinding'),
            Column::make('K5')->title('Kondisi Atap'),
            Column::make('K6')->title('Tanggungan'),
            Column::make('K7')->title('Listrik'),
            Column::make('K8')->title('Luas Tanah'),
            Column::make('K9')->title('Luas Bangunan'),
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
