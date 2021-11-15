<?php

namespace App\DataTables;

use App\Models\Zone;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
class ZoneStoreDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query,Request $request)
    {
        return datatables()
            ->eloquent($query)->
            addColumn('state.title',function ( $query) {
               return $query->state->title;
            })->
             addColumn('city.title',function ( $query) {
                return $query->city->title;
             })
            ->addColumn('action', 'storedashboard.zonesstore.action')
            ->rawColumns([
                'action',
            ])->orderColumn('title', function ($query, $order) {
                $query->orderByTranslation('title', $order);
            })
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && isset($request->input('search')['value']) && !empty($request->input('search')['value'])) {
                    $searchValue = $request->input('search')['value'];
                      $query->whereTranslationLike("title", "%" . $searchValue . "%");
                    //   ->orWhereTranslationLike("state.title", "%" . $searchValue . "%");
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\City $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Zone $model)
    {
        return $model->newQuery()->with('state')->with('city')->whereStoreId(auth()->user()->store_id)->orderBy("id","desc")->select("zones.*");
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
            ['data'=>'state.title','title'=>__("messages.state"),'searchable'=>false],
            ['data'=>'city.title','title'=>__("messages.city"),'searchable'=>false],  
            ['data'=>'title','title'=>__("messages.title")],
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
        return 'City_' . date('YmdHis');
    }
}
