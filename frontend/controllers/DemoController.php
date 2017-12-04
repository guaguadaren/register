<?php
namespace frontend\controllers;

use frontend\models\Register;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class DemoController extends Controller
{
    public  function  actionIndex(){
         return $this->render('register');

    }
    public  function actionAdd(){

        $post = Yii::$app->request->post();
        $arr = new Register();
            $arr->add($post);
          $id = Yii::$app->db->getLastInsertID();

        return $this->render('register1',['id'=>$id]);
    }
    public  function actionAdds(){
        return $this->render('register2');
    }
    public  function actionShang(){
        $id = Yii::$app->request->get();
        $arr = new Register();
        $date=  $arr->show($id);

        return   $this->render('shang',['date'=>$date]);
    }
    public  function actionAdd2(){
        $post = Yii::$app->request->post();
          $data['register_name']=$post['register_name'];
          $data['register_sr']=$post['register_sr'];
          $data['register_city']=$post['register_city'];
      $a =    Yii::$app->db->createCommand()->insert('register1',$data)->execute();
       $this->redirect('?r=demo/adds');
    }

}
