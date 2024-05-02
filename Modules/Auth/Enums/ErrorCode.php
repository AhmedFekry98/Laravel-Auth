<?php

namespace Modules\Auth\Enums;

enum ErrorCode
{
    case UNSPCIFIED_ERROR;
    case NOT_FOUND;
    case ALREADY_EXISTS;
    case INVALID_CREDENTIAL;
    case UNVERIFIED;
}