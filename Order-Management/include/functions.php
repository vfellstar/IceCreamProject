<?php
/**
 * Function library
 */
/**
 * json return method
 * @param int $code
 * @param string $message
 * @param array $data
 */
function response($code = 0,$message = "success",$data = [], $count = 0)
{
    $result = [
        'code' => $code,
        'message' => $message,
        'data' => $data,
        'count' => $count
    ];

    echo json_encode($result);
    exit;
}