<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('action', function ($row) {
    //             return '<div style="display: flex; justify-content: space-between;">
    //             <button type="button" class="btn btn-info DetailButton me-2"
    //             data-id="' . $row->id_user . '"
    //             data-nama="' . $row->nama . '">
    //             <i class="fa fa-eye" aria-hidden="true"></i>
    //             </button>
    //             <a href="' . route('warga.edit', $row->id_user)  . '"class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    //         </div>';
    //         })
    //         ->addColumn('No', function () {
    //             static $index = 1;
    //             return $index++;
    //         })
    //         ->setRowId('id');
    // }

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($row) {
                $currentUser = auth()->user();
                $buttons = '<div style="display: flex; justify-content: space-between;">';

                $buttons .= '<button type="button" class="btn btn-info DetailButton me-2"
                data-id="' . $row->id_user . '"
                data-nama="' . $row->nama . '">
                <i class="fa fa-eye" aria-hidden="true"></i>
                </button>';

                if ($currentUser->role == 'rt') {
                    $buttons .= '<a href="' . route('warga.edit', $row->id_user)  . '"class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                }

                $buttons .= '</div>';
                return $buttons;
            })
            ->addColumn('No', function () {
                static $index = 1;
                return $index++;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        if (session('role') == 'rw') {
            return $model->newQuery();
        } else if (session('role') == 'rt') {
            return $model->newQuery()->where('rt_id', session('no_role'));
            // return $model->newQuery()->whereHas('keluarga', function ($query) {
            // });
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->orderBy(0)
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
            Column::make('nik'),
            Column::make('jenis_kelamin'),
            Column::make('tempat_lahir'),
            Column::make('tgl_lahir'),
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
