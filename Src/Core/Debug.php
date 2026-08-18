<?php
class Debug
{
    public static function VD(mixed $data): void
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }
    public static function DD(mixed $data): void
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die;
    }
}