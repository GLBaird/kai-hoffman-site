<?php

$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

switch ($method) {
    case 'PUT':
        update($request);
        break;
    case 'POST':
        add($request);
        break;
    case 'GET':
        get($request);
        break;
    case 'DELETE':
        delete($request);
        break;

    default:
        handle_error($request);
        break;
}

function update($request) {

}

function add($request) {

}

function get($request) {

}

function delete($request) {

}

function handle_error($request) {

}
