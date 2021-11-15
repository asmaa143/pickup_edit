<?php

namespace App\DataTables;

use App\Models\Adds;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class AddsDataTable extends DataTable
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
            ->eloquent($query)
            ->editColumn('image',function(Adds $adds){
                $image1='';
                   if($adds->image){
                $image1 = asset($adds->image);
                $image1 = '<img  src="' . $image1 . '" style ="width:80px;height:80px">'; 
                    }
                    return $image1;
                  })
            ->addColumn('action', 'storedashboard.adds.action')
            ->rawColumns([
                'action',
                "image"
            ])->orderColumn('title', function ($query, $order) {
                $query->orderByTranslation('title', $order);
            })
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && isset($request->input('search')['value']) && 
                !empty($request->input('search')['value'])) {
                    $searchValue = $request->input('search')['value'];
                      $query->whereTranslationLike("title", "%" . $searchValue . "%");
                }
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Add $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Adds $model)
    {
        return $model->newQuery()->orderBy("id",'desc');
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
            ['data'=>'image','title'=>__("messages.image")],
            ['data'=>'title','title'=>__("messages.title")],
            ['data'=>'default_price','title'=>__("messages.default_price")],
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
        return 'Adds_' . date('YmdHis');
    }
}
