<?php

namespace common\models;

use yii\db\ActiveQuery;

/**
 * @see Lists
 */
class ListsQuery extends  ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['status' => 1]);
    }

    /**
     * {@inheritdoc}
     * @return Lists[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Lists|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
