<?php
require 'bc-diapi.php';

// sample data

// json
$video_metadata   = '{"name":"Great Blue Heron - DI Wrapper test","description": "An original nature video","custom_fields": {"subject": "Birds"},"tags": ["nature","bird"]}';
$ingest_data = '{
    "profile": "BoltIngestProfile",
    "capture-images": false,
    "poster": {
        "url": "http://solutions.brightcove.com/bcls/images/Great-Blue-Heron.png",
        "height": 360,
        "width": 640
    },
    "thumbnail": {
        "url": "http://solutions.brightcove.com/bcls/images/great-blue-heron-thumbnail.png",
        "height": 90,
        "width": 160
    },
    "text_tracks": [
        {
            "url": "http://solutions.brightcove.com/bcls/assets/vtt/sample.vtt",
            "srclang": "en",
            "kind": "captions",
            "label": "EN",
            "default": true
        }
    ],
    "master": {
        "url": "http://solutions.brightcove.com/bcls/assets/videos/Great_Blue_Heron.mp4"
    },
    "callbacks": ["http://solutions.brightcove.com/bcls/di-api/di-callbacks.php"]
}';
$account_data = '{
    "client_secret": "h1dbPZCMFsloMCiXprlGDvdDR7QXtcw9alyocJ1ShDfLZ5QxqBqb9u_5gGcU6mlyA1PbbG6ABYS1FMDVE4JNDQ",
    "client_id": "b10631d3-7597-4be8-b8b5-dce142f81006",
    "account_id": "57838016001"
}';
// pull request options
$pull_options = new stdClass();
$pull_options->video_url      = 'http://solutions.brightcove.com/bcls/assets/videos/Great_Blue_Heron.mp4';
$pull_options->video_name     = 'Great Blue Heron';
$pull_options->profile        = 'BoltIngestProfile';
$pull_options->{'capture-images'} = false;
$pull_options->video_metadata = json_decode($video_metadata);
$pull_options->poster         = json_decode($poster_data);
$pull_options->thumbnail      = json_decode($thumbnail_data);
$pull_options->text_tracks    = json_decode($text_tracks_data);
$pull_options->callbacks      = json_decode($callbacks_data);
// push request options
$push_options = new stdClass();

$push_video_path              = '../assets/videos/Great_Blue_Heron.mp4';
$push_options->video_name     = 'Great Blue Heron';
$push_options->profile        = 'screencast-1280';
$push_options->{'capture-images'}  = false;
$push_options->metadata       = json_decode($video_metadata);
$push_options->poster         = json_decode($poster_data);
$push_options->thumbnail      = json_decode($thumbnail_data);
$push_options->text_tracks    = json_decode($text_tracks_data);
$push_options->callbacks      = json_decode($callbacks_data);

$BCDI = new BCDIAPI($account_id, $client_id, $client_secret);

// add video via pull request

$responses = $BCDI->add_video($pull_options);
var_dump($responses);
?>
