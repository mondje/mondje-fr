<?php

/**
 * @return is_file():bool;
 */
function php_is_this_a_file():bool
{
    try {
        [$filename] = func_get_args();
        return is_file($filename);
    } catch (\Throwable $th) {
        IphpThrowError(
            "errcd21234", __FUNCTION__, $th->getMessage()
          );
    }
}

/**
 * @return end():mixed;
 */
function php_array_last_element():mixed
{
    try {
        [$filename] = func_get_args();
        return end($filename);
    } catch (\Throwable $th) {
        IphpThrowError(
            "errcd21234", __FUNCTION__, $th->getMessage()
          );
    }
}

/**
 * @return dirname():string;
 */
function php_name_of_dirrectory():string
{
    try {
        [$filename] = func_get_args();
        return dirname($filename);
    } catch (\Throwable $th) {
        IphpThrowError(
            "errcd21234", __FUNCTION__, $th->getMessage()
          );
    }
}

/**
 * @return explode():array;
 */
function php_array(): bool
{
    try {
        [$var] = func_get_args();
        return is_array($var);
    } catch (\Throwable $th) {
        IphpThrowError(
            "errcd21234", __FUNCTION__, $th->getMessage()
          );
    }
    
}

/**
 * @return explode():array;
 */
function php_create_array(string $delimiter, string $string, ?int $limit = PHP_INT_MAX):array
{
    return explode($delimiter, $string, $limit);
}

/**
 * @return array_key_exists():bool;
 */
function php_find_key():bool
{
    try {
        [$mixedkey, $array] = func_get_args();
        return array_key_exists($mixedkey, $array);
    } catch (\Throwable $th) {
        IphpThrowError(
            "errcd21234", __FUNCTION__, $th->getMessage()
          );
    }
}

// to delete files from directory based on creation date
function remove_files_based_on_timeStamp($path){
    // $path = '/path/to/files/';
    if ($handle = opendir($path)) {

        while (false !== ($file = readdir($handle))) {
            
            /* filemtime returns the time of last modification
               of the file, instead of creation date. */
            $filelastmodified = filemtime($path . $file);

            /* will select files older than 24 hours
               in a day * 3600 seconds per hour */
            if((time() - $filelastmodified) > 24*3600)
            {
                unlink($path . $file);
            }

        }

        closedir($handle); 
    }
}

/**
 * @return array_key_exists():bool;
 */
function php_find_element():bool
{
    try {        
        [$mixedneedle, $array] = func_get_args();
        return in_array($mixedneedle, $array);
        } catch (\Throwable $th) {
            IphpThrowError(
                "errcd21234", __FUNCTION__, $th->getMessage()
              );
        }
}

function in():array
{
    try {        
        [$array] = func_get_args();
        return (array) $array;
        } catch (\Throwable $th) {
            IphpThrowError(
                "errcd21234", __FUNCTION__, $th->getMessage()
              );
        }
}

function using()
{
    try {
    [$string] = func_get_args();
    return $string;
    } catch (\Throwable $th) {
        IphpThrowError(
            "errcd21234", __FUNCTION__, $th->getMessage()
          );
    }
}

function with():string
{
    try {
    [$string] = func_get_args();
    return (string) $string;
    } catch (\Throwable $th) {
        IphpThrowError(
            "errcd21234", __FUNCTION__, $th->getMessage()
          );
    }
}

/**
 * @return empty():bool;
 */
function mdj_is_empty():bool
{
    try {
        [$arg] = func_get_args();
        return empty($arg);
        
        } catch (\Throwable $th) {
            IphpThrowError(
                "errcd21234", __FUNCTION__, $th->getMessage()
              );
        }
}

//Random data function
function random()
{
    
    try {
        [$length] = func_get_args();
        $carat = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        return @substr(
        str_shuffle(str_repeat($carat, $length)), 0, $length
        );

        } catch (\Throwable $th) {
            IphpThrowError(
                "errcd21234", __FUNCTION__, $th->getMessage()
              );
        }    
}

/**
 * @return @sting '.route' - Nom de l'extension de vos fichier routes;
 */
function doteRoute(): string{
    return '.route';
}

/**
 * @return @sting '*.{route,php}' - Élément de filtrage pour la fontion glob()
 * utilisée par la méthode pagination() afin de récuperer vos fichier routes.
 */
function machingPattern(): string{
    return '*.{route,php}';
}

/**
 * @return @sting 'themes' - Nom du dossier prévu pour héberger vos thème;
 */
function theme_dirname(): string{
    return 'themes';
}

function rtf_ext():string{
    return doteRoute();
}

/**
 * @return bool ph is_null function;
 */
function php_null_data(): bool{
    [$data] = func_get_args();
    return is_null($data);
}

/**
 * @return bool php is_bool function;
 */
function php_bool_data(): bool{
    [$data] = func_get_args();
    return is_bool($data);
}

function debug($var){
    echo '<pre style="background:black; color:white; padding:0; width: 100%">';
        print_r($var);
    echo '</pre>';
    
    exit;
}