<?php
header('Content-Type: application/json');

$folder = 'uploads';
$files = [];

if (is_dir($folder)) {
    if ($dh = opendir($folder)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..') {
                $filePath = $folder . '/' . $file;
                $files[] = [
                    'name' => $file,
                    'size' => filesize($filePath),
                    'modified' => filemtime($filePath)
                ];
            }
        }
        closedir($dh);
    }
}

echo json_encode($files);
?>
