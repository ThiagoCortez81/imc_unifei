<?php /** * Retorna o diretório das views */
function viewsPath()
{
    return BASE_PATH . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR;
}

function frontendPath()
{
    return DIRECTORY_SEPARATOR . 'unifei' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'Frontend' . DIRECTORY_SEPARATOR;
}

/** Converte datas entre os padrões ISO e brasileiro **/

function dateConvert($date)
{
    if (!strstr($date, '/')) {
        if (!strstr($date, '/')) {
            sscanf($date, '%d-%d-%d', $y, $m, $d);
            return sprintf('%02d/%02d/%04d', $d, $m, $y);
        } else {
            sscanf($date, '%d/%d/%d', $d, $m, $y);
            return sprintf('%04d-%02d-%02d', $y, $m, $d);
        }
    }
}

function arrayToUtf8($array)
{
    array_walk_recursive($array, function (&$item, $key) {
        if (!mb_detect_encoding($item, 'utf-8', true)) {
            $item = utf8_encode($item);
        }
    });

    return $array;
}