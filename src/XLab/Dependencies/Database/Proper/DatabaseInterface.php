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
    public function find($tableName, $id);

    /**
     * @param string $tableName
     * @param int $id
     * @param array $values
     */
    public function update($tableName, $id, array $values);
}
