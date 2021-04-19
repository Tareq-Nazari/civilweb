<?php

return [

    "MediaTypeServices" => [
        "image" => [
            "extensions" => [
                "jpg" , "jpeg" , "png"
            ],
            "handler" => \Tareghnazari\Media\Services\ImageFileService::class
        ],

        "video" => [
            "extensions" => [
                "avi" , "mp4" , "mkv"
            ],
            "handler" => \Tareghnazari\Media\Services\VideoFileService::class
        ]
    ]
];
