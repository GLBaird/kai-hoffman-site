<?php
date_default_timezone_set('Europe/London');

$dataFileURL = $_SERVER["DOCUMENT_ROOT"]."/page_data/gigs.json";

function packData() {
    $correctKeys = "date time venue mapRef link icon color";
    $data = array();

    foreach($_POST as $key => $value) {
        if(strpos($correctKeys, $key) !== false) {
            $data[$key] = $value;
        }
    }

    return $data;
}

function loadData() {
    global $dataFileURL;
    return json_decode(file_get_contents($dataFileURL), true);
}

function saveData($data) {
    global $dataFileURL;
    $json = json_encode($data);
    file_put_contents($dataFileURL, $json);
}

function addDataToStore() {
    $data = packData();
    $file = loadData();
    $gigs = $file['list'];
    $gigs[] = $data;
    $file['list'] = $gigs;
    saveData($file);
}

function updateDataInStore($index) {
    $data = packData();
    $file = loadData();
    $gigs = $file['list'];
    $gigs[$index] = $data;
    $file['list'] = $gigs;
    saveData($file);
}

function getRecord($index) {
    $file = loadData();
    $gigs = $file['list'];
    return $gigs[$index];
}

function deleteRecord($index) {
    $file = loadData();
    $gigs = $file['list'];
    unset($gigs[$index]);
    $file['list'] = array_values($gigs);
    saveData($file);
}

function cleanOldRecords() {
    $file = loadData();
    $gigs = $file['list'];
    $today = strtotime('now');
    foreach($gigs as $index => $gig) {
        $gigDate = strtotime($gig['date']);
        if ($gigDate < $today) {
            unset($gigs[$index]);
        }
    }
    $file['list'] = array_values($gigs);
    saveData($file);
}