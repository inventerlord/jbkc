<?php

namespace App\Contracts;

class ErrorCodesContract
{
    public const PERMISSION_DENIED = 403;
    public const PAGE_NOT_FOUND = 404;
    public const SOMETHING_WENT_WRONG = 250;
    public const INVALID_CRIDENTIALS = 251;
    public const VALIDATION_ERROR = 252;
}
