<?php

namespace mn;

class DataHelper {

    public static function filesize_formatted($path) {
        $size = filesize($path);
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }

    public static function dirsize_formatted($path) {
        $size = 0;
        foreach (glob(rtrim($path, '/') . '/*', GLOB_NOSORT) as $each) {
            $size += is_file($each) ? filesize($each) : folderSize($each);
        }
        $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $power = $size > 0 ? floor(log($size, 1024)) : 0;
        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
    }

    public static function countFiles($path) {
        return iterator_count(new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS));
    }

    public static function clearDir($path) {
        foreach (glob(rtrim($path, '/') . '/*', GLOB_NOSORT) as $each) {
            unlink($each);
        }
    }

}
