<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 21.11.2018
 * Time: 21:37
 */

namespace app\services;



use app\models\Comment;
use yii\base\Component;
use yii\web\IdentityInterface;

class CommentService extends Component
{

    public function canDelete(IdentityInterface $user, Comment $comment)
    {
        return $user->getId() == $comment->author_id;
    }
}