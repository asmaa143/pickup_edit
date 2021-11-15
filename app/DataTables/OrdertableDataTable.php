<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;
class OrdertableDataTable extends DataTable
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
            ->addColumn('date',function($query){
                return Carbon::parse($query->date)->format('Y-m-d');
            })  ->addColumn('time',function($query){
                return Carbon::parse($query->date)->format(' h:i:s');
            })
            ->addColumn('action', 'storedashboard.orders.action')
            ->rawColumns([
                'action',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery()->orderBy("id","desc")->whereStoreId(auth()->user()->store_id)->where('type','table');
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

   
    protected function getColumns()
    {
        return [
            ['data'=>'customer_name','title'=>__("messages.customer_name")],
            ['data'=>'customer_phone','title'=>__("messages.customer_phone")],
            ['data'=>'payment_method','title'=>__("messages.payment_method"),"width" => "20px"],
            ['data'=>'date','title'=>__("messages.date")],
            ['data'=>'time','title'=>__("messages.time")],
           ['data'=>'table_number','title'=>__("messages.tablenumber "),'exportable'=>false,'orderable'=>false,'searchable'=>false],
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
        return 'Product_' . date('YmdHis');
    }
}
