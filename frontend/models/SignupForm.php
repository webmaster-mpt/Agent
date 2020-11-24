<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{   
    /**
     * @var UploadedFile file attribute
     */
    public $username;
    public $email;
    public $password;
    public $photo;
    public $role_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            [['role_id'], 'integer'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            [['photo'], 'file', 'extensions' => 'jpg, jpeg, png, svg', 'skipOnEmpty' => true],
            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'Email' => 'Почта',
            'password' => 'Пароль',
            'photo' => 'Вашего фото профиля'
        ];
    }
    public static function hasRole($role_id){
        if(!is_array($role_id)) $role_id = [$role_id];
        return in_array(SignupForm::findCurrent()->role_id, $role_id);
    }
    public static function findCurrent() {
        if(Yii::$app->user->isGuest)
            return null;
        return User::findOne([
            'id' => Yii::$app->user->identity->getId(),
        ]);
    }
    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup($file=null)
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->role_id = '1';
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;
        // $user->generateEmailVerificationToken();
        if ($file) {
            $photoname= uniqid($this->username) . $file->baseName . '.' . $file->extension;
            $file->saveAs(Yii::getAlias('@frontend/web') . '/uploads/' . $photoname);
            $user->photo = $photoname;
        }
        return $user->save() && $this->sendEmail($user);

    }
    public function actionActivate()
    {
        $username = $this->prompt('Username:', ['required' => true]);
        $model = $this->findModel($username);
        $model->status = User::STATUS_ACTIVE;
        $model->removeEmailConfirmToken();
        $this->log($model->save());
    }
    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
