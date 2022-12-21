<?php

use yii\db\Migration;

/**
 * Class m221221_085020_create_permissions
 */
class m221221_085020_create_permissions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $viewLessonsList = $auth->createPermission('viewLessonsList');
        $viewLessonsList->description = 'Просмотр списка уроков';
        $auth->add($viewLessonsList);

        $viewLesson = $auth->createPermission('viewLesson');
        $viewLesson->description('Просмотр урока'),
        $auth->add($viewLesson);

        $addNewLesson = $auth->createPermission('addNewLesson');
        $addNewLesson->description('Добавить урок');
        $auth->add($addNewLesson);

        $updateLesson = $auth->createPermission('updateLesson');
        $updateLesson->description = 'Редактирование урока',
        $auth->add($updateLesson);

        $deleteLesson = $auth->createPermission('deleteLesson');
        $deleteLesson->description = 'Удаление урока';
        $auth->add($deleteLesson);

        $viewUsersList = $auth->createPermission('viewUsersList');
        $viewUsersList->description = 'Просмотр списка пользователей';
        $auth->add($viewUsersList);

        $viewUser = $auth->createPermission('viewUser');
        $viewUser->description = 'Просмотр пользователя';
        $auth->add($viewUser);

        $addNewUser = $auth->createPermission('addNewUser');
        $addNewUser->description('Добавление пользователя');
        $auth->add($addNewUser);

        $updateUsers = $auth->createPermission('updateUsers');
        $updateUsers->description = 'Редактирование пользователей';
        $auth->add($updateUsers);

        $deleteUsers = $auth->createPermission('deleteUsers');
        $deleteUsers->description = 'Удаление пользователей';
        $auth->add($deleteUsers);

        $useRBAC = $auth->createPermission('useRBAC');
        $useRBAC->description = 'Управление правами';
        $auth->add($useRBAC);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221221_085020_create_permissions cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221221_085020_create_permissions cannot be reverted.\n";

        return false;
    }
    */
}
