<?php

namespace App\DataTables;

use App\Models\StoreTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StoreTableDataTable extends DataTable
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
        ->editColumn("branch_id",function($query){
            if($query->branch){
                return $query->branch->name;
            }
        })
        ->addColumn('action', 'storedashboard.storetables.action')
        ->rawColumns([
            'action',
        ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StoreTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StoreTable $model)
    {
        return $model->newQuery()->whereStoreId(auth()->user()->store_id)->orderBy("id","desc");;
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
            ['data'=>'tablenumber','title'=>__("messages.tablenumber")],
            ['data'=>'branch_id','title'=>__("messages.branch"),'orderable'=>false,'searchable'=>false],  
           
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
        return 'StoreTable_' . date('YmdHis');
    }
}
