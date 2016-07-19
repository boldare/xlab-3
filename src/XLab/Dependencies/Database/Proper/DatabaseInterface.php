<?php

namespace XLab\Dependencies\Database\Proper;

interface DatabaseInterface
{
    /**
     * @param string $tableName
     * @param array $criteria
     *
     * @return array
     */
    public function select($tableName, array $criteria);

    /**
     * @param string $tableName
     * @param array $criteria
     * @param array $values
     */
    public function update($tableName, array $criteria, array $values);
}
