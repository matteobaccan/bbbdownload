#!/usr/bin/env php
<?php
if (!isset($argv[1])) {
    echo("Site URL missing. EX: https://bigblue.foo-bar.com/");
    die();
}

if (!isset($argv[2])) {
    echo("Webinar ID missing. EX: 5abb43d27af53d4f3268874a3a4f22a497bdefa1-1615020094109");
    die();
}

$presentation = $argv[1];
$presentationroot = 'presentation\\' . $argv[2] . '\\';
$presentationplayer = 'playback\\presentation\\2.0\\';

put_file($presentation, $presentationplayer, 'acornmediaplayer/acornmediaplayer.base.css');
put_file($presentation, $presentationplayer, 'acornmediaplayer/jquery.acornmediaplayer.js');
put_file($presentation, $presentationplayer, 'acornmediaplayer/themes/access/acorn.access.css');
put_file($presentation, $presentationplayer, 'acornmediaplayer/themes/bigbluebutton/acorn.bigbluebutton.css');
put_file($presentation, $presentationplayer, 'acornmediaplayer/themes/bigbluebutton/bigbluebutton-fullscreen.png');
put_file($presentation, $presentationplayer, 'acornmediaplayer/themes/bigbluebutton/bigbluebutton-fullscreen.png');
put_file($presentation, $presentationplayer, 'acornmediaplayer/themes/bigbluebutton/bigbluebutton-pause.png');
put_file($presentation, $presentationplayer, 'acornmediaplayer/themes/bigbluebutton/bigbluebutton-play.png');
put_file($presentation, $presentationplayer, 'acornmediaplayer/themes/bigbluebutton/bigbluebutton-swap.png');
put_file($presentation, $presentationplayer, 'acornmediaplayer/themes/bigbluebutton/bigbluebutton-volume-full.png');
put_file($presentation, $presentationplayer, 'css/foundation-icons.css');
put_file($presentation, $presentationplayer, 'css/foundation-icons.ttf');
put_file($presentation, $presentationplayer, 'css/foundation-icons.woff');
put_file($presentation, $presentationplayer, 'css/foundation.css');
put_file($presentation, $presentationplayer, 'css/normalize.css');
put_file($presentation, $presentationplayer, 'lib/bbblogger.js');
put_file($presentation, $presentationplayer, 'lib/foundation.min.js');
put_file($presentation, $presentationplayer, 'lib/jquery-ui.min.js');
put_file($presentation, $presentationplayer, 'lib/jquery.min.js');
put_file($presentation, $presentationplayer, 'lib/pace.min.js');
put_file($presentation, $presentationplayer, 'lib/popcorn-complete.min.js');
put_file($presentation, $presentationplayer, 'lib/popcorn.chattimeline.js');
put_file($presentation, $presentationplayer, 'lib/writing.js');
put_file($presentation, $presentationplayer, 'logo.png');
put_file($presentation, $presentationplayer, 'playback.css');
put_file($presentation, $presentationplayer, 'playback.html');
put_file($presentation, $presentationplayer, 'playback.js');
put_file($presentation, $presentationroot, 'audio/audio.mp4');
put_file($presentation, $presentationroot, 'audio/audio.ogg');
put_file($presentation, $presentationroot, 'audio/audio.webm');
put_file($presentation, $presentationroot, 'captions.json');
put_file($presentation, $presentationroot, 'cursor.xml');
put_file($presentation, $presentationroot, 'deskshare.png');
put_file($presentation, $presentationroot, 'deskshare.xml');
put_file($presentation, $presentationroot, 'deskshare/deskshare.mp4');
put_file($presentation, $presentationroot, 'deskshare/deskshare.webm');
put_file($presentation, $presentationroot, 'metadata.xml');
put_file($presentation, $presentationroot, 'panzooms.xml');
put_file($presentation, $presentationroot, 'presentation_text.json');
put_file($presentation, $presentationroot, 'shapes.svg');
put_file($presentation, $presentationroot, 'slides_new.xml');
put_file($presentation, $presentationroot, 'video/webcams.mp4');
put_file($presentation, $presentationroot, 'video/webcams.webm');
put_file($presentation, '', 'favicon.ico');

$lines = file($presentationroot . 'shapes.svg');
$img = 0;
foreach ($lines as $line) {
    if (preg_match('/xlink:href=".*\\.png"/', $line, $regs)) {
        put_file($presentation, $presentationroot, substr($regs[0], 12, -1));
    }
    if (preg_match('/text=".*\\.txt"/', $line, $regs)) {
        put_file($presentation, $presentationroot, substr($regs[0], 6, -1));
    }
}

function put_file($presentation, $presentationroot, $type) {
    $from = $presentation . str_replace('\\', '/', $presentationroot) . $type;
    $to = str_replace('/', '\\', $presentationroot . $type);
    if (!file_exists($to)) {

        // Creo percorso
        $dir = substr($to, 0, strrpos($to, '\\'));
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        // Metto contenuto
        if (!@copy($from, $to)) {
            $errors = error_get_last();
            echo "ERROR: " . $errors['type'] . " - " . $errors['message'] . "\r\n";
        } else {
            echo "$from size[" . filesize($to) . "]\r\n";
        }
    }
}
