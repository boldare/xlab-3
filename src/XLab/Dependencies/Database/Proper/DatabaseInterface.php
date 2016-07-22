<?php

namespace XLab\Dependencies\Database\Proper;

interface DatabaseInterface
{
    /**
     * @param string $tableName
     * @param int $id
     *
     * @return array
     */
    public function find(string $tableName, int $id);

    /**
     * @param string $tableName
     * @param int $id
     * @param array $values
     */
    public function update(string $tableName, int $id, array $values);
}
