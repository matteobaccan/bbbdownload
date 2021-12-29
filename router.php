<?php
// Use this file if you want display mirror from php
// php -S 127.0.0.1:8080 router.php

// BBB 2.3 use playback.html with a mod_rewrite rule. This rule is emulated with this router
if (preg_match('#^/playback/presentation/2.3/[a-z0-9]+-[0-9]+$#', $_SERVER["REQUEST_URI"])) {
    include_once 'playback/presentation/2.3/playback.html';
} else { 
    return false;    // serve the requested resource as-is.
}
