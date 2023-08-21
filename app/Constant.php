<?php

namespace App;

class Constant
{
    const DEFAULT_LIMIT = 10;

    const NORMAL_STATUS = 0;
    const DISABLED_STATUS = 1;
    const DELETED_STATUS = 2;

    // Status Codes
    const SUCCESS = 200;
    const RESOURCE_NOT_FOUND = 404;
    const FORBIDDEN = 403;
    const NOT_MODIFIED = 304;
    const MISSING_PARAMETERS = 488;
    const INVALID_PARAMETERS = 488;
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;

}
