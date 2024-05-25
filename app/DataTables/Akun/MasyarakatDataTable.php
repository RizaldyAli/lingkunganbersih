<?php

namespace App\DataTables\Akun;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MasyarakatDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('email_verified_at', function ($data) {
                return $data->email_verified_at
                    ? '<span class="text-primary"><i class="ti ti-check"></i></span>'
                    : '<span class="text-danger"><i class="ti ti-x"></i></span>';
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->locale('id')->diffForHumans();
            })
            ->rawColumns(['email_verified_at'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->role('masyarakat');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('masyarakat-table')
            ->responsive(true)
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                                data._token = '" . csrf_token() . "';
                                data._p = 'POST';
                            ")
            ->setTableHeadClass('text-uppercase')
            ->select(false)
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No.')
                ->addClass('w-10 text-center'),
            Column::make('email_verified_at')
                ->title('Verifikasi')
                ->addClass('w-10 text-center'),
            Column::make('email')
                ->title('Email')
                ->addClass('w-30'),
            Column::make('name')
                ->title('Nama')
                ->addClass('w-30'),
            Column::make('created_at')
                ->title('Dibuat Pada')
                ->addClass('w-20'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Masyarakat_' . date('YmdHis');
    }
}
