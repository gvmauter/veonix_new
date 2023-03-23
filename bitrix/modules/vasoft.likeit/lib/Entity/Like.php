<?php

namespace Vasoft\LikeIt\Entity;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Vasoft\LikeIt\Data\EO_Like;
use Vasoft\LikeIt\Data\EO_Like_Collection;
use Vasoft\LikeIt\Helpers\Cached;
use Vasoft\LikeIt\Helpers\LikeResult;
use Vasoft\LikeIt\Services\Statistic;

/**
 * ��������� ������ ������� �������������
 * ���� ������ �� ���� - ��������� ����, ���� ������ ���� - ������� ����.
 * ���� ��������� �� ������ ������������ ���� ���������
 * ��� (�� IP � UserAgent) ��� ������������� ������������ �������
 */
final class Like
{
    private int $elementId;

    public function __construct(int $elementId)
    {
        echo class_exists(\Vasoft\Likeit\Controllers\Likes::class);
        $e = new \Vasoft\LikeIt\Controllers\Likes(null);
        $this->elementId = $elementId;
    }

    /**
     * ��������� ����� ������������� ��������
     * @return int
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function process(): int
    {
        $collection = (new Statistic())->getListUserLikesForElement($this->elementId);
        $result = LikeResult::ERROR;
        if ($collection) {
            $result = $collection->count() === 0 ? $this->set() : $this->delete($collection);
            if ($result !== LikeResult::ERROR) {
                Cached::clearCacheTagged();
            }
        }
        return $result;
    }

    /**
     * ��������� ����� ������ �������������
     * @return int
     */
    private function set(): int
    {
        $user = User::getInstance();
        $like = new EO_Like();
        $like
            ->setElementid($this->elementId)
            ->setHash($user->getHash())
            ->setUseragent($user->getUserAgent())
            ->setIp($user->getIP());
        if ($user->getId() > 0) {
            $like->setUserid($user->getId());
        }
        $result = $like->save();
        return $result->isSuccess() ? LikeResult::ADDED : LikeResult::ERROR;
    }

    /**
     * �������� ������ �������� �������������
     * �� ������ ������� ������ (�������� �� ������ ��������� ��������� �������) ������� ��� ��������� �����.
     * @param EO_Like_Collection $collection
     * @return int
     */
    private function delete(EO_Like_Collection $collection): int
    {
        $result = true;
        foreach ($collection as $row) {
            $res = $row->delete();
            $result &= $res->isSuccess();
        }
        return $result ? LikeResult::REMOVED : LikeResult::ERROR;
    }
}