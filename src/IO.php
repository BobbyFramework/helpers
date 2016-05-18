<?php

namespace BobbyFramework\Helpers;

class IO {

  public static function getPhpFiles($path, array $files = [], $recursiveFind = true) {
  		if (!is_dir($path)) {
  			return null;
  		}
  
  		$path    = rtrim($path, '/') . '/';
  		$scanDir = scandir($path, SCANDIR_SORT_ASCENDING);
  
  		foreach ($scanDir AS $item) {
  			if ($item === '.' OR $item === '..' OR preg_match('/^(\.)/', $item)) {
  				continue;
  			}
  
  			$myPath = $path . $item;
  
  			if (is_dir($myPath) && $recursiveFind) {
  				$files = array_merge($files, self::getPhpFiles($myPath));
  			}
  			elseif (is_file($myPath) and strtolower(pathinfo($myPath, PATHINFO_EXTENSION)) === 'php') {
  				$files[] = $myPath;
  			}
  		}
  
  		return (empty($files) === false ? $files : []);
  	}
}
