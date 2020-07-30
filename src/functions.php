<?php
namespace Kyanag\Form;

function array_has($array, $key)
{
    return isset($array[$key]) or array_key_exists($key, $array);
}


function array_first($items, $callable)
{
    foreach ($items as $index => $item) {
        if (call_user_func_array($callable, [$item, $index])) {
            return $item;
        }
    }
    return null;
}


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

function array_map($items, $callable)
{
    foreach ($items as $index => $item) {
        $items[$index] = call_user_func_array($callable, [$item, $index]);
    }
    return $items;
}

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

            $result = Arr::pluck($target, $key);

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


function toUnderScore($str)
{
    $dstr = preg_replace_callback(
        '/([A-Z]+)/',
        function ($matchs) {
            return '_'.strtolower($matchs[0]);
        },
        $str
    );
    return trim(preg_replace('/_{2,}/', '_', $dstr), '_');
}

function randomString($prefix = null)
{
    return uniqid($prefix);
}
