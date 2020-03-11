<?php


namespace Kyanag\Form\Interfaces;


interface FormInterface
{
    /**
     * 普通输入框
     * @param $name
     * @param null $label
     * @return InputControlElement
     */
    public function text($name, $label = null);

    /**
     * 单选
     * @param $name
     * @param null $label
     * @param array $options
     * @return InputControlElement
     */
    public function radio($name, $label = null, $options = []);

    /**
     * 下拉选择
     * @param $name
     * @param null $label
     * @param array $options
     * @return InputControlElement
     */
    public function select($name, $label = null, $options = []);

    /**
     * 文本域
     * @param $name
     * @param null $label
     * @param array $options
     * @return mixed
     */
    public function textarea($name, $label = null);

    /**
     * 多选
     * @param $name
     * @param null $label
     * @param array $options
     * @return InputControlElement
     */
    public function checkbox($name, $label = null, $options = []);

    /**
     * @param $name
     * @param null $label
     * @return InputControlElement
     */
    public function file($name, $label = null);

}