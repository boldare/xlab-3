<?php

namespace XLab\Dependencies\Database\Proper;

class SQLiteDatabase implements DatabaseInterface
{
    /**
     * @var string
     */
    private $databasePath;

    /**
     * @param string $databasePath
     */
    public function __construct($databasePath)
    {
        $this->databasePath = $databasePath;
    }

    /**
     * {@inheritdoc}
     */
    public function find($tableName, $id)
    {
        $db = $this->openConnection();
        $stmt = $db->prepare(sprintf('SELECT * FROM %s WHERE id = :id', $tableName));
        $stmt->bindValue('id', $id);

        return $stmt->execute()->fetchArray(SQLITE3_ASSOC);
    }

    /**
     * {@inheritdoc}
     */
    public function update($tableName, $id, array $values)
    {
        $db = $this->openConnection();
        $updates = [];

        foreach (array_keys($values) as $columnName) {
            $updates[] = sprintf('%s = :%s', $columnName, $columnName);
        }

        $stmt = $db->prepare(sprintf('UPDATE %s SET %s WHERE id = :id', $tableName, implode(', ', $updates)));

        foreach ($values as $columnName => $value) {
            $stmt->bindValue($columnName, $value);
        }

        $stmt->bindValue('id', $id);
        $stmt->execute();
    }

    /**
     * @return \SQLite3
     */
    private function openConnection()
    {
        return new \SQLite3($this->databasePath);
    }
}
