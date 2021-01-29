<?php

namespace app\models;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $photo
 * @property string $date
 * @property string $path
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $city
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $about
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @var
     */
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'last_name',
                    'name',
                    'patronymic',
                    'gender',
                    'birth_date',
                    'city',
                    'phone',
                    'email'
                ],
                'required'
            ],
            [['date', 'birth_date'], 'safe'],
            ['photo', 'default', 'value' => '../images/photo_default.jpg'],
            [['name', 'last_name', 'patronymic', 'city', 'email', 'phone', 'gender', 'about'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Фото',
            'imageFile' => 'Ваша фотография',
            'date' => 'Дата',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'last_name' => 'Фамилия',
            'birth_date' => 'День рождения',
            'gender' => 'Пол',
            'city' => 'Город',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'about' => 'О себе',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('images/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
