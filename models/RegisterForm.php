<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * RegisterForm is the model behind the register form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public string $name = '';
    public string $surname = '';
    public string $patronymic = '';
    public string $login = '';
    public string $password = '';
    public string $email = '';
    public string $phone = '';
    public string $password_repeat = '';
    public bool $rule = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'login', 'email', 'phone', 'password', 'password_repeat'], 'required'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'phone', 'password', 'password_repeat'], 'string', 'max' => 255],
            [['name', 'surname', 'patronymic'], 'match', 'pattern' => '/^[А-Яа-яёЁ\s\-]+$/u', 'message' => 'Только кириллица, пробел, тире.'],
            [['login'], 'match', 'pattern' => '/^[A-Za-z0-9\-]+$/', 'message' => 'Только латиница, цифры, тире.'],
            [['password'], 'string', 'max' => 255, 'min' => 6],
            [['password'], 'match', 'pattern' => '/^[A-Za-z0-9]+$/', 'message' => 'Только латиница, цифры, тире.'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^\+7\([\d]{3}\)\-[\d]{3}(\-[\d]{2}){2}$/', 'message' => 'Телефон должен быть формата: +7(XXX)-XXX-XX-XX'],
            [['login', 'email'], 'unique', 'targetClass' => User::class],
            [['name', 'surname', 'patronymic', 'login', 'email', 'phone', 'password', 'password_repeat'], 'trim'],
            ['rule', 'required', 'requiredValue' => true, 'message' => 'Нужно подтверждение согласия на обработку персональных данных.'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'password_repeat' => 'Повтор пароля',
            'rule' => 'Согласие с правилами регистрации',
        ];
    }

    public function userRegister()
    {
        if ($this->validate()) {
            $user = new User();

            
            $user->attributes = $this->attributes;
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->password = Yii::$app->security->generatePasswordHash($user->password);
            $user->role_id = Role::getRoleId('user');

            if ($user->save()) {
                return Yii::$app->user->login($user);
            }

            $this->addErrors($user->errors);
        }

        return false;
    }
}
