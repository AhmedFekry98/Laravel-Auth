<?php

namespace Modules\Auth\Enums;

enum ErrorCode: int
{
    case UNSPCIFIED_ERROR       = 0;
    case NOT_FOUND              = 1;
    case ALREADY_EXISTS         = 3;
    case INVALID_CREDENTIAL     = 4;
    case UNVERIFIED             = 5;
}