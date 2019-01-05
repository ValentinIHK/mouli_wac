<?php

define
('HOME', getenv('HOME'));


try
{
    if (file_exists($f = $argv[1]) && is_file($f) && is_readable($f)) {
        require_once($f);
        if (function_exists($f = 'colle')) {
            $tab = [[5,3], [5,1], [1,1], [1, 5], [4,4]];


            foreach ($tab as $v) {
                ob_start();
                colle($v[0], $v[1]);
                $obj = ob_get_clean();
                ob_end_clean();
                $result = explode("\n", $obj);
                $c = '';
                for ($i = 0; $i < sizeof($result) -1; $i++) {
                    $c .= $result[$i];
                }
                echo $c . "\n";
            }
        }
        else
            throw new Exception("La fonction $f n'existe pas !\n");
    }
    else if (!file_exists($f))
        throw new Exception("Le fichier $f n'existe pas !\n");
    else if (!is_file($f))
        throw new Exception("$f n'est pas un fichier regulier !\n");
    else
        throw new Exception("Le fichier $f n'a pas les droits de lecture !\n");

}

catch (Exception $e)

{
    die($e->getMessage());

}
