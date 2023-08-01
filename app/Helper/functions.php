<?php

if (!function_exists('error_response')) {
    function error_response($message = 'Something went wrong', $data = [], $code = 400) {
        return response()->json([
            'code'    => $code,
            'success' => FALSE,
            'message' => $message,
            'data'    => $data
        ]);
    }
}

if (!function_exists('success_response')) {
    function success_response($message, $data = [], $code = 200) {
        return response()->json([
            'code'    => $code,
            'success' => TRUE,
            'message' => $message,
            'data'    => $data
        ]);
    }
}
