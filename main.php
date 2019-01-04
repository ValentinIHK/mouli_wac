<?php

define
('HOME', getenv('HOME'));


try
{
    var_dump($argv);
    if (file_exists($f = 'Rendu/alex.murgoci@epitech.eu/Piscine_PHP_Exam_1/ex_02.php') && is_file($f) && is_readable($f))

    {
        require_once($f);

        if (function_exists($f = 'rev_epur_str'))

        {
            $tab = ["                                                     ",
                "     @       mon amis l'     {       }       oiseau  ",
                "qui" => "ne    sait pas tres     bien voler          ",
                "    n'est    []      pas un    poisson       volant \",
                  "];
            ob_start();
            foreach ($tab as $v)
                var_dump(rev_epur_str($v));
            var_dump(rev_epur_str(''));
            var_dump(rev_epur_str());
            var_dump($tab);
            if (ob_get_clean() === file_get_contents('./result'))
                throw new Exception("Le resultat de votre fonction semble correct.\n");
            else
                throw new Exception("Le resultat de votre fonction est incorrect.\n");
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
