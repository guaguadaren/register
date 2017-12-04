<?php
namespace frontend\models;
use yii;
use yii\base\Model;
use common\models\User;


/**
 * Signup form
 */
class Register extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['register_tell', 'register_password', 'register_name', 'register_birdy', 'register_city'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'register_tell' => 'Register Tell',
            'register_password' => 'Register Password',
            'register_name' => 'Register Name',
            'register_birdy' => 'Register Birdy',
            'register_city' => 'Register City',
        ];
    }
    public  function add($input){
               $data['register_tell']=$input['register_num'];
               $data['register_password']=$input['register_pwd'];

         return  Yii::$app->db->createCommand()->insert(self::tableName(),$data)->execute();
    }
    public  function show($id){
        $a = $id['id'];
        $sql = "select * from register where id=".$a;
        return  Yii::$app->db->createCommand($sql)->queryAll();
    }
}
