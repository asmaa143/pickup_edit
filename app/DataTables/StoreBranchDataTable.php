<?php

namespace App\DataTables;

use App\Models\StoreBranch;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StoreBranchDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'storedashboard.branches.action')
            ->rawColumns([
                'action',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StoreBranch $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StoreBranch $model)
    {
        return $model->newQuery()->whereStoreId(auth()->user()->store_id)->orderBy("id","desc");
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->parameters([
            'dom' => 'Blfrtip',
            'order' => [0, 'desc'],
            'lengthMenu' => [
                [10,25,50,100,-1],[10,25,50,'all record']
            ],
       'buttons'      => ['export'],
   ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data'=>'name','title'=>__("messages.name"),],
            ['data'=>'phone','title'=>__("messages.phone")],
            ['data'=>'whats_up','title'=>__("messages.whats_up")],  
           // ['data'=>'address','title'=>__("messages.phone")],
            ['data'=>'action','title'=>__("messages.actions"),'printable'=>false,'exportable'=>false
            ,'orderable'=>false,'searchable'=>false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'StoreBranch_' . date('YmdHis');
    }
}
