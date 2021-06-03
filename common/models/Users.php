<?php

namespace common\models;

use Yii;
use yii\base\BaseObject;
use common\rbac\models\Role;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $full_name
 * @property string|null $image
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string|null $email
 * @property string|null $rule
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class Users extends User
{

    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public $password;
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['status'], 'integer'],
            [['username', 'password', 'full_name', 'image', 'rule'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'full_name' => 'Full Name',
            'image' => 'Image',
            'rule' => 'Rule',
            'status' => 'Status',
        ];
    }


    public function create()
    {
        if (!$this->validate()) {
            return false;
        }

        $user = new User();
        $role = new Role();
        $user->username = $this->username;
        $user->full_name = $this->full_name;
        $user->status=!empty($this->status) ? $this->status : 10;
        $user->rule = !empty($this->rule) ? $this->rule : 'User';
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        if ($user->save()){
            $role->user_id = $user->getId();
            $role->item_name = !empty($this->rule) ? $this->rule : 'User';
            if ($role->save()){
                return $user;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }

    public function getPost(){
        return $this->hasMany(Post::class, ['user_id' => 'id']);
    }
}
