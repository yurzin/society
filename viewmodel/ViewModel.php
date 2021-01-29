<?php

namespace app\viewModel;

use app\models\Users;

/**
 * This is the model class for table "users".
 *
 * @property Users $users
 */
class ViewModel
{

    public $users;

    public function __construct($users)
    {
        $this->users = $users;

    }

    /**
     * @return int
     */
    public function getAge()
    {
        $birthday_timestamp = strtotime($this->users->birth_date);
        $age = date('Y') - date('Y', $birthday_timestamp);
        if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
        }
        return $age;
    }
}