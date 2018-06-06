<?php /** * Retorna o diretório das views */
function viewsPath()
{
    return BASE_PATH . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR;
}

function frontendPath()
{
    return DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'Frontend' . DIRECTORY_SEPARATOR;
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

function listLogos($array)
{
    $html = "";

    foreach ($array as $logo) {

        $html .= '<div class="col-sm-6 col-md-3">
                     <div class="thumbnail"> 
                         <a class="lightbox" href="http://' . $_SERVER[HTTP_HOST] . '/' . strstr($logo['filCaminho'], 'app') . '" title="' . $logo['filDescricao'] . '">
                             <img src="http://' . $_SERVER[HTTP_HOST] . '/' . strstr($logo['filCaminho'], 'app') . '" alt="' . $logo['filDescricao'] . '" style="padding: 10px; height: 170px; ">
                         </a>
                         <div class="caption">
                             <!--<div id="con_text_' . $logo['filId'] . '" style="height: 150px">
                                 <h5 name="hidden_' . $logo['filId'] . '" style="margin-top: -20px"><br>' . ((strlen($logo['filDescricao']) > 250) ? (substr($logo['filDescricao'], 0, 247)) . "... <br><a style='cursor:pointer;' onclick='$(\"[name=\\\"hidden_" . $logo['filId'] . "\\\"]\").toggle(); $(\"#con_text_" . $logo['filId'] . "\").css(\"height\", \"auto\")'>Ver mais</a>" : $logo['filDescricao']) . '</h5>
                                 <h5 name="hidden_' . $logo['filId'] . '" style="display: none; margin-top: -20px"><br>' . $logo['filDescricao'] . '<br><a  style="cursor:pointer;" onclick="$(\'[name=\\\'hidden_' . $logo['filId'] . '\\\']\').toggle(); $(\'#con_text_' . $logo['filId'] . '\').css(\'height\', \'150px\')">Mostrar Menos</a></h5>
                             </div>-->
                             <hr>
                             <div style="text-align: center;">
                               <h4>Votos Obtidos: ' . $logo['filVotacao'] . '</h4>
                             </div>
                         </div>
                      </div>
                   </div>';
    }

    return $html;
}