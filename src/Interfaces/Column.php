<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/3/29
 * Time: 23:30
 */

namespace Kyanag\Form\Interfaces;


interface Column
{

    const SCENARIO_CREATE = 1;

    const SCENARIO_UPDATE = 2;

    const SCENARIO_SHOW = 3;

    const SCENARIO_LIST = 4;

    /**
     * @return string|null
     */
    public function label();

    /**
     * @return string|null
     */
    public function name();

    /**
     * @return string|null;
     */
    public function help();

    /**
     * @return []
     */
    public function rules();

    public function on_list($scenario = null);

    public function on_edit($scenario = null);

    /**
     * @return mixed|null
     */
    public function showFormatter($scenario = null);


    public function editFormatter($scenario = null);

    /**
     * @return mixed|null
     */
    public function searcher();

}