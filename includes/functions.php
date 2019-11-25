<?php
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

function isSecurity($img) {
    $name = $img["name"];
    $type = $img["type"];
    $size = $img["size"];
    $blacklist = array(".php",".phtml",".php3",".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $name)) return false;
    }
    if (($type != "image/gif") && ($type != "image/png") && ($type != "image/jpg") && ($type != "image/jpeg")) return false;
    if ($size > 5 * 1024 * 1024) return false;

    return true;
}

function loadAvatar($img) {
    $type = $img["type"];
    $dir = "public\images\avatar/";
    $name = md5(microtime()).".".substr($type,strlen("image/"));
    $upload = $dir . $name;

    if (move_uploaded_file($img["tmp_name"],$upload)) {
        return $name;
    }
    else return '';
}

function SetLanguage($lg) {
    if (!in_array($lg, array('ru'.'en'))) $lg = 'en';
    $_SESSION['USER_LANGUAGE'] = $lg;
}

function request_url()
{
    $result = '';
    $default_port = 80; // Порт по-умолчанию

    // защищенном соединении?
    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=='on')) {
        // В защищенном. Добавить протокол.
        $result .= 'https://';
        // переназначим значение порта по-умолчанию
        $default_port = 443;
    } else {
        // Обычное соединение, обычный протокол
        $result .= 'http://';
    }

    $result .= $_SERVER['SERVER_NAME'];

    // Порт по-умолчанию?
    if ($_SERVER['SERVER_PORT'] != $default_port) {
        $result .= ':'.$_SERVER['SERVER_PORT'];
    }
    // Путь и GET-параметры.
    $result .= $_SERVER['REQUEST_URI'];
    return $result;
}

function remove_get($key) {
    parse_str($_SERVER['QUERY_STRING'], $vars);
    $url = strtok($_SERVER['REQUEST_URI'], '?') . http_build_query(array_diff_key($vars,array($key=>"")));
    return $url;
}