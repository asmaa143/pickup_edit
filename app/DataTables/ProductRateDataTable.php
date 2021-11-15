<?php

namespace App\DataTables;

use App\Models\ProductRate;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductRateDataTable extends DataTable
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
            ->editColumn('customer_id',function($query){
                if($query->customer){
                    return $query->customer->name;
                }
            })->editColumn('product_id',function($query){
                if($query->product){
                    return $query->product->title;
                }
            })
            ->addColumn('action', 'storedashboard.productrates.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductRate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductRate $model)
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
            ['data'=>'product_id','title'=>__("messages.product"),'orderable'=>false,'searchable'=>false],
            ['data'=>'customer_id','title'=>__("messages.customer"),'orderable'=>false,'searchable'=>false],
         
            ['data'=>'action','title'=>__("messages.actions"),'printable'=>false,'exportable'=>false,'orderable'=>false,'searchable'=>false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ProductRate_' . date('YmdHis');
    }
}
