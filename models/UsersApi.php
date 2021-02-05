<?php


namespace app\models;


class UsersApi extends Users
{

    public function fields()
    {
        return [
            'id',
            'photo',
            'last_name',
            'name',
            'city',
            'phone',
            'email',
            'age',
            'about',
        ];
    }

    public function extraFields()
    {
        return [
            'posts'
        ];
    }

    public function getAge()
    {
        $birthday_timestamp = strtotime($this->birth_date);
        $age = date('Y') - date('Y', $birthday_timestamp);
        if (date('md', $birthday_timestamp) > date('md')) {
            $age--;
        }
        return $age;
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::class, ['user_id' => 'id']);
    }
}