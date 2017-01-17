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
        else
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
    public static function calculatedTrajects($trajects, $distances)
    {
        $min = 1000000000;
        foreach ($trajects as $traject)
        {
            $dist = 0;

            for ($i = 0; $i<count($traject)-1; $i++)
            {
                $j = $i+1;
                $key = $traject[$i].$traject[$j];
                $key2 = $traject[$j].$traject[$i];
                $dist += isset($distances[$key]) ? $distances[$key]["distance"] : $distances[$key2]["distance"];

            }
            if ($dist<$min)
            {
                $min = $dist;
                $chemin = $traject;
            }

            $return[] = ["distance" => $dist, "traject" => $traject];
//            print_r($return);
        }
        return ["distance" => $min, "traject" => $chemin];
    }
}