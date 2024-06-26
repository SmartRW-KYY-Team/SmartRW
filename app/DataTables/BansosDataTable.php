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
                <a href="/bansos/' . $row->id_bansos . '/edit" class="btn btn-warning me-2 editButton" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
                static $index = 0;
                $pageStart = request()->input('start', 1);
                return $pageStart + (++$index);
            })
            ->addColumn('keluarga.nama', function ($row) {
                return $row->keluarga->kepala_keluarga->nama;
            })
            ->setRowId('id');
    }

    public function query(Bansos $model): QueryBuilder
    {
        $noId = session('no_role');
        if (session('role') == 'rw') {
            return $model->newQuery()->with('keluarga');
        } else if (session('role') == 'rt') {
            return $model->newQuery()
                ->whereHas('keluarga', function ($query) use ($noId) {
                    $query->where('rt_id', $noId);
                })
                ->with('keluarga');
        }
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
