<?php


namespace Program;


use CommandLineInput\CommandLineInputInterface;
use Output\ProgramOutputInterface;

class ProgramHelper
{


    public static function indent($text)
    {
        $nbSpaces = 4;
        $p = explode(PHP_EOL, $text);
        $sp = str_repeat(" ", $nbSpaces);
        return $sp . implode(PHP_EOL . $sp, $p);
    }


    public static function getParameter($number, $name, CommandLineInputInterface $input, ProgramOutputInterface $output)
    {
        if (null !== ($param = $input->getParameter($number))) {
            return $param;
        }
        if (null !== $name) {
            $msg = "Param $number ($name) not found";
        }
        else{
            $msg = "Param $number not found";
        }
        $output->error($msg);
        return false;
    }

}