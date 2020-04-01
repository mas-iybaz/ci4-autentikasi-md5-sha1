<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType = 'object';

    protected $allowedFields = ['fullname', 'nim', 'email', 'password', 'password_sha1', 'password_md5', 'address', 'phone'];
}
