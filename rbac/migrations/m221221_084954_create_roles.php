<?php

use yii\db\Migration;

/**
 * Class m221221_084954_create_roles
 */
class m221221_084954_create_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;
        $viewLessonsList = $auth->getPermission('viewLessonsList');
        $viewLesson = $auth->getPermission('viewLesson');
        $addNewLesson = $auth->getPermission('addNewLesson');
        $updateLesson = $auth->getPermission('updateLesson');
        $deleteLesson = $auth->getPermission('deleteLesson');
        $viewUsersList = $auth->getPermission('viewUsersList');
        $addNewUser = $auth->getPermission('addNewUser');
        $viewUser = $auth->getPermission('viewUser');
        $updateUsers = $auth->getPermission('updateUsers');
        $deleteUsers = $auth->getPermission('deleteUsers');
        $useRBAC = $auth->getPermission('useRBAC');

        $student = $auth->createRole('student');
        $auth->add($student);
        $auth->addChild($student, $viewLessonsList);
        $auth->addChild($student, $viewLesson);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $student);
        $auth->addChild($admin, $updateLesson);
        $auth->addChild($admin, $deleteLesson);
        $auth->addChild($admin, $viewUsersList);
        $auth->addChild($admin, $addNewLesson);
        $auth->addChild($admin, $viewUser);
        $auth->addChild($admin, $addNewUser);
        $auth->addChild($admin, $updateUsers);
        $auth->addChild($admin, $deleteUsers);
        $auth->addChild($admin, $useRBAC);

        $auth->assign($student, 2);
        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221221_084954_create_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221221_084954_create_roles cannot be reverted.\n";

        return false;
    }
    */
}
