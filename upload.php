<?php

if(!is_dir(date("Y") . '/' . date("m"))) {
    mkdir(date("Y") . '/' . date("m"), 0777, true);
}
if(!is_dir(date("Y") . '/' . date("m"). '/'. date("d"))) {
    mkdir(date("Y") . '/' . date("m"). '/'. date("d"), 0777, true);
}

$date = date("Y") . '/' . date("m") . '/'. date("d") . '/';

$filename = date("H-i-s") . '_' . rand(0000000000,9999999999) . '.jpg';
$uploadfile = $date . $filename;
$url = "https://gcphoneuploader.vercel.app/" . $date;


if (move_uploaded_file($_FILES['files']['tmp_name'][0], $uploadfile))
{
    $result = [
        "success" => true,
        "files" => [
                [
                    "hash" => $filename,
                    "name" => $filename,
                    "url" => $url . $filename,
                    "size" => $_FILES['files']['size'][0]
                ]
        ],

    ];
    print_r(json_encode($result));
} else {
    echo "Le fichier n'a pas pu être téléchargé !\n";
}
?>
