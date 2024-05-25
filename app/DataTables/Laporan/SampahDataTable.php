<?php

namespace App\DataTables\Laporan;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SampahDataTable extends DataTable
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
            ->editColumn('action', function ($data) {
                return view('pages.laporan.sampah.partials.actions', compact('data'));
            })
            ->editColumn('is_read', function ($data) {
                return $data->is_read == '0'
                    ? '<span class="text-muted"><i class="ti ti-checks"></i></span>'
                    : '<span class="text-primary"><i class="ti ti-checks"></i></span>';
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->locale('id')->diffForHumans();
            })
            ->rawColumns(['is_read'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Laporan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sampah-table')
            ->responsive(true)
            ->columns($this->getColumns())
            ->minifiedAjax(script: "
                                data._token = '" . csrf_token() . "';
                                data._p = 'POST';
                            ")
            ->setTableHeadClass('text-uppercase')
            ->select(false)
            ->drawCallbackWithLivewire(file_get_contents(public_path('assets/custom/js/drawCallback.js')))
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
            Column::computed('action')
                ->title('Aksi')
                ->addClass('w-10 text-center'),
            Column::make('is_read')
                ->title('DiBaca')
                ->addClass('w-10 text-center'),
            Column::make('status')
                ->title('Status')
                ->addClass('w-10 text-center'),
            Column::make('judul')
                ->title('Judul')
                ->addClass('w-40'),
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
        return 'Sampah_' . date('YmdHis');
    }
}
