<?php

namespace App\Http\services\Profile;

use App\Http\services\BaseService;
use App\Models\Profile;

class ProfileService extends BaseService
{
    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }
}
