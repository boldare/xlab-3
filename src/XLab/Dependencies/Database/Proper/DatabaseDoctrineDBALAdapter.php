<?php

namespace XLab\Dependencies\Database\Proper;

use Doctrine\DBAL\Connection;

class DatabaseDoctrineDBALAdapter implements DatabaseInterface
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function select($tableName, array $criteria)
    {
        return $this->connection->fetchAssoc(
            $this->prepareSelectQuery($tableName, $criteria),
            $criteria
        );
    }

    /**
     * {@inheritdoc}
     */
    public function update($tableName, array $criteria, array $values)
    {
        $this->connection->update($tableName, $values, $criteria);
    }

    /**
     * @param string $tableName
     * @param array $criteria
     *
     * @return string
     */
    private function prepareSelectQuery($tableName, array $criteria)
    {
        $query = sprintf('SELECT * FROM %s', $tableName);

        if (empty($criteria)) {
            return;
        }

        $query .= ' WHERE ';

        foreach (array_keys($criteria) as $columnName) {
            $query .= sprintf('%s = :%s', $columnName, $columnName);
        }

        return $query;
    }
}
