<?php

namespace App\Http\Libs;

/**
 * Ошибки приложения
 */
class AppError {

    public int    $code;
    public string $msg;
    public string $additional;

    public function __construct(int $code, ?string $additional = null)
    {
        $this->code = $code;
        $this->msg  = config('errors.' . $code, 'General error');
        $this->additional = is_string($additional) ? $additional : json_encode($additional);
    }

}
