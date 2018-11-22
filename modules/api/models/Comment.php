<?php
/**
 * Created by PhpStorm.
 * User: igroc
 * Date: 21.11.2018
 * Time: 18:11
 */

namespace app\modules\api\models;


class Comment extends \app\models\Comment
{

    public function fields()
    {
        return [
            'id',
            'author' => function(){
                return User::findOne($this->author_id);
            },
            'text',
            'created_at',
            'updated_at'
        ];
    }
}

