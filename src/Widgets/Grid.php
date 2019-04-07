<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/6
 * Time: 17:43
 */

namespace Kyanag\Form\Widgets;


use Kyanag\Form\Interfaces\Column;
use Kyanag\Form\Interfaces\Inspector;
use Kyanag\Form\Interfaces\Renderable;

abstract class Grid implements Renderable
{

    protected $inspector;

    public function __construct(Inspector $inspector)
    {
        $this->inspector = $inspector;
    }

    /**
     * @return Column[]
     */
    protected function getColumns(){
        $columns = $this->inspector->columns();
        return $columns;
    }

    /**
     * @return array[]
     */
    abstract function getData();


    public function render()
    {
        $eles = [
            $this->renderHeader(),
            $this->renderBody(),
            $this->renderFooter()
        ];
        return implode("", $eles);
    }

    public function renderFilters(){

    }

    public function renderToolBar(){
        $tpl = <<<EOF
<div class="panel-body">
    <div class="panel panel-default">
        <div class="panel-heading">查询条件</div>
        <div class="panel-body">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-1" for="txt_search_departmentname">部门名称</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="txt_search_departmentname">
                    </div>
                    <label class="control-label col-sm-1" for="txt_search_statu">状态</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="txt_search_statu">
                    </div>
                    <div class="col-sm-4" style="text-align:left;">
                        <button type="button" style="margin-left:50px" id="btn_query" class="btn btn-primary">查询</button>
                    </div>
                </div>
            </form>
        </div>
    </div>       
    <div id="toolbar" class="btn-group">
        <button id="btn_add" type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
        </button>
    </div>
    <table id="tb_departments"></table>
</div>
EOF;

    }

    public function renderHeader(){
        $ths = [
            "<thead><tr>"
        ];
        foreach ($this->getColumns() as $column){
            $ths[] = "<th scope=\"col\">{$column->label()}</th>";
        }
        $ths[] = "</tr></thead>";
        return implode("", $ths);
    }

    public function renderBody(){
        $elements = [
            "<tbody>"
        ];
        foreach ($this->getData() as $datum){
            $elements[] = $this->renderItem($datum);
        }
        $elements[] = "</tody>";
        return implode("", $elements);
    }

    protected function renderItem($value){
        $elements = [
            "<tr>"
        ];
        foreach ($this->getColumns() as $column){
            $func = $column->showFormatter();
            $name = $column->name();
            $elements[] = "<td>{$func($value[$name], $value, $name)}</td>";
        }
        $elements[] = "</tr>";
        return implode("", $elements);
    }

    public function renderFooter(){
        return "";
    }

}