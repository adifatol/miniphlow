<?php

namespace dataset;

class Load {

    const HOUSING_DATA = 'housing.data';

    public static function boston(){

        $filepath = realpath(__DIR__) . '/' . self::HOUSING_DATA;

        if (($handle = fopen($filepath, "r")) === false) {
            throw new \Exception('Could not open ' . self::HOUSING_DATA);
        }

        $data = [];
        $target = [];

        while (($line = fgets($handle)) !== false) {
            $parsed = preg_split('/\s+/', trim($line));

            $target[] = array_pop($parsed); /* Remove last value from data */
            $data[] = $parsed;
        }

        fclose($handle);

        return array($data, $target);
    }
}

