<?php
namespace Kyanag\Form;


/**
 * @param $array
 * @param $key
 * @return bool
 */
function array_has($array, $key)
{
    return isset($array[$key]) or array_key_exists($key, $array);
}

/**
 * 获取第一个符合条件的项
 * @param $items
 * @param $callable
 * @return mixed|null
 */
function array_first($items, $callable)
{
    foreach ($items as $index => $item) {
        if (call_user_func_array($callable, [$item, $index])) {
            return $item;
        }
    }
    return null;
}

/**
 * 数组降维
 * @param $array
 * @return array
 */
function array_collapse($array)
{
    $results = [];

    foreach ($array as $values) {
        if (! is_array($values)) {
            continue;
        }
        $results = array_merge($results, $values);
    }
    return $results;
}

/**
 * 带下标的array_map
 * @param $items
 * @param $callable
 * @return mixed
 */
function array_map($items, $callable)
{
    foreach ($items as $index => $item) {
        $items[$index] = call_user_func_array($callable, [$item, $index]);
    }
    return $items;
}

/**
 * 数组点式取值, copy from laravel
 * @param $target
 * @param $key
 * @param null $default
 * @return array|mixed|null
 */
function data_get($target, $key, $default = null)
{
    if (is_null($key)) {
        return $target;
    }
    $key = is_array($key) ? $key : explode('.', $key);

    while (! is_null($segment = array_shift($key))) {
        if ($segment === '*') {
            if (!is_array($target)) {
                return $default;
            }

            $result = array_column($target, $key);

            return in_array('*', $key) ? array_collapse($result) : $result;
        }
        if ((is_array($target) or $target instanceof \ArrayAccess)

            and array_has($target, $segment)
        ) {
            $target = $target[$segment];
        } elseif (is_object($target) && isset($target->{$segment})) {
            $target = $target->{$segment};
        } else {
            return $default;
        }
    }
    return $target;
}

/**
 * 驼峰转中线蛇形
 * @param $words
 * @return string
 */
function camelToSnake($words){
    $words = preg_replace_callback("/([A-Z]{1})/",function ($matches) {
        return '-' . strtolower($matches[0]);
    }, $words);
    return ltrim($words, "-");
}

/**
 * 随机字符串
 * @param string|null $prefix
 * @return string
 */
function randomString($prefix = null)
{
    return uniqid($prefix);
}
