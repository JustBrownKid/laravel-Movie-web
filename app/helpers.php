<?php

if (!function_exists('apiSuccess')) {
    function apiSuccess($data = [], $message = 'Success', $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }
}

if (!function_exists('apiError')) {
    function apiError($message = 'Error', $code = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data'    => null,
        ], $code);
    }
}
