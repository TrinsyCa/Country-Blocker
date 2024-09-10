<?php
    // Get the user's IP address
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Retrieve country information based on IP address using GeoPlugin API
    $geoData = file_get_contents("http://www.geoplugin.net/json.gp?ip={$userIP}");
    $geoData = json_decode($geoData);

    // List of restricted countries (use ISO country codes)
    $restrictedCountries = ['US', 'RU', 'CN'];

    // Check if the user's country is in the restricted list
    if (in_array($geoData->geoplugin_countryCode, $restrictedCountries)) {
        // Redirect to the 404 page if the country is restricted
        header("HTTP/1.0 404 Not Found");
        exit();
    }