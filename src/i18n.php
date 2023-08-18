<?php
function read_i18_file($i18n_file) {
    if (!file_exists($i18n_file)){
        throw new Exception("File not found: " . $i18n_file);
    }
    $file = fopen($i18n_file, "r");
    $i18n = array();
    while(!feof($file)) {
        $line = fgets($file);
        $line = trim($line);
        if ($line != "" && !str_starts_with($line, "#")) {
            $line = explode("=", $line);
            $key = trim($line[0]);
            $value = trim($line[1]);
            $i18n[$key] = $value;
        }
    }
    fclose($file);
    return $i18n;
}

function get_i18n($i18n, $key) {
    return $i18n[$key];
}

?>