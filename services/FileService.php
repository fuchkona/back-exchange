<?php
/**
 * Created by PhpStorm.
 * User: nikita
 * Date: 09.12.18
 * Time: 22:02
 */

namespace app\services;


use app\models\File;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use yii\base\Component;
use yii\web\IdentityInterface;

class FileService extends Component
{

    /**
     * @param IdentityInterface $user
     * @param File $file
     * @return bool
     */
    public function areYouOwner (IdentityInterface $user, File $file)
    {
        if ($user->getId() === $file->user_id) {
            return true;
        } else {
            throw new AccessDeniedException("Вы не являетесь владельцем данного файла!");
        }

    }

}