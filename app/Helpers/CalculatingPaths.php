<?php
/**
 * Created by PhpStorm.
 * User: Alain.PICHONNAT
 * Date: 10.01.2017
 * Time: 10:12
 */

namespace App\Helpers;


class CalculatingPaths
{
    public static function calculated($items, $perms = array())
    {
        if (empty($items))
        {
            $return = array($perms);
        }
        {
            $return = array();
            for ($i = count($items) - 1; $i >= 0; --$i)
            {
                $newItems = $items;
                $newPerms = $perms;
                list($foo) = array_splice($newItems, $i, 1);
                array_unshift($newPerms, $foo);
                $return = array_merge($return, CalculatingPaths::calculated($newItems, $newPerms));
            }
        }
        return $return;
    }
    public static function calculatedTrajects($chemins)
    {
        foreach ($chemins as $chemin)
        {

        }
    }
}