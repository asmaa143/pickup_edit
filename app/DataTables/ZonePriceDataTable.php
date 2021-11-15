<?php

namespace App\DataTables;

use App\Models\ZonePrice;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ZonePriceDataTable extends DataTable
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
            
              ->addColumn('zone.title',function ( $query) {
                 return $query->zone->title;
              })
             ->addColumn('action', 'storedashboard.zonesprices.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ZonePrice $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ZonePrice $model)
    {
        return $model->newQuery()->whereStoreId(auth()->user()->store_id)->orderBy("id","desc")->with("zone")
        ->select("zones_prices.*");
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
            ['data'=>'zone.title','title'=>__("messages.zone"),'searchable'=>false],  
            ['data'=>'price','title'=>__("messages.price")],
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
        return 'ZonePrice_' . date('YmdHis');
    }
}
