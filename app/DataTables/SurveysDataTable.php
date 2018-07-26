<?php
namespace App\DataTables;

use App\Survey;
use Yajra\DataTables\Services\DataTable;

class SurveysDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)->setRowId('id');
    /**
     * Get query source of dataTable.
     *
     * @param \App\Survey $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Survey $model)
    {
        return $model->newQuery()->select('id', 'name');
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
                        'dom' => 'Bfrtip',
                        'order' => [1, 'asc'],
                        'select' => [
                            'style' => 'os',
                            'selector' => 'td:first-child',
                        ],
                        'buttons' => [
                            ['extend' => 'create', 'editor' => 'editor'],
                            ['extend' => 'edit', 'editor' => 'editor'],
                            ['extend' => 'remove', 'editor' => 'editor'],
                            'custom',
                        ]
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
            [
                'data' => null,
                'defaultContent' => '',
                'className' => 'select-checkbox',
                'title' => '',
                'orderable' => false,
                'searchable' => false
            ],
            'id',
            'name',
            'add'
        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'surveys_' . time();
    }
}