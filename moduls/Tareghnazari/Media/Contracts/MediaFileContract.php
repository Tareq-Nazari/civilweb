<?php


namespace Tareghnazari\Media\Contracts;


interface MediaFileContract
{
    public static function upload($file);
    public static function delete();

}
