<?php

namespace Base;

use \ActionTracking as ChildActionTracking;
use \ActionTrackingQuery as ChildActionTrackingQuery;
use \Exception;
use \PDO;
use Map\ActionTrackingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'action_tracking' table.
 *
 *
 *
 * @method     ChildActionTrackingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildActionTrackingQuery orderByClientId($order = Criteria::ASC) Order by the client_id column
 * @method     ChildActionTrackingQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildActionTrackingQuery orderByTableModified($order = Criteria::ASC) Order by the table_modified column
 * @method     ChildActionTrackingQuery orderByRecordId($order = Criteria::ASC) Order by the record_id column
 * @method     ChildActionTrackingQuery orderByFieldLabel($order = Criteria::ASC) Order by the field_label column
 * @method     ChildActionTrackingQuery orderByOldValue($order = Criteria::ASC) Order by the old_value column
 * @method     ChildActionTrackingQuery orderByNewValue($order = Criteria::ASC) Order by the new_value column
 * @method     ChildActionTrackingQuery orderByCaption($order = Criteria::ASC) Order by the caption column
 * @method     ChildActionTrackingQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method     ChildActionTrackingQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildActionTrackingQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 *
 * @method     ChildActionTrackingQuery groupById() Group by the id column
 * @method     ChildActionTrackingQuery groupByClientId() Group by the client_id column
 * @method     ChildActionTrackingQuery groupByProjectId() Group by the project_id column
 * @method     ChildActionTrackingQuery groupByTableModified() Group by the table_modified column
 * @method     ChildActionTrackingQuery groupByRecordId() Group by the record_id column
 * @method     ChildActionTrackingQuery groupByFieldLabel() Group by the field_label column
 * @method     ChildActionTrackingQuery groupByOldValue() Group by the old_value column
 * @method     ChildActionTrackingQuery groupByNewValue() Group by the new_value column
 * @method     ChildActionTrackingQuery groupByCaption() Group by the caption column
 * @method     ChildActionTrackingQuery groupByIcon() Group by the icon column
 * @method     ChildActionTrackingQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildActionTrackingQuery groupByUserId() Group by the user_id column
 *
 * @method     ChildActionTrackingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildActionTrackingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildActionTrackingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildActionTrackingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildActionTrackingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildActionTrackingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildActionTrackingQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildActionTrackingQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildActionTrackingQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildActionTrackingQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildActionTrackingQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildActionTrackingQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildActionTrackingQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     ChildActionTrackingQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildActionTrackingQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildActionTrackingQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildActionTrackingQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildActionTrackingQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildActionTrackingQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildActionTrackingQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildActionTrackingQuery leftJoinClients($relationAlias = null) Adds a LEFT JOIN clause to the query using the Clients relation
 * @method     ChildActionTrackingQuery rightJoinClients($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Clients relation
 * @method     ChildActionTrackingQuery innerJoinClients($relationAlias = null) Adds a INNER JOIN clause to the query using the Clients relation
 *
 * @method     ChildActionTrackingQuery joinWithClients($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Clients relation
 *
 * @method     ChildActionTrackingQuery leftJoinWithClients() Adds a LEFT JOIN clause and with to the query using the Clients relation
 * @method     ChildActionTrackingQuery rightJoinWithClients() Adds a RIGHT JOIN clause and with to the query using the Clients relation
 * @method     ChildActionTrackingQuery innerJoinWithClients() Adds a INNER JOIN clause and with to the query using the Clients relation
 *
 * @method     \UsersQuery|\ProjectsQuery|\ClientsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildActionTracking findOne(ConnectionInterface $con = null) Return the first ChildActionTracking matching the query
 * @method     ChildActionTracking findOneOrCreate(ConnectionInterface $con = null) Return the first ChildActionTracking matching the query, or a new ChildActionTracking object populated from the query conditions when no match is found
 *
 * @method     ChildActionTracking findOneById(int $id) Return the first ChildActionTracking filtered by the id column
 * @method     ChildActionTracking findOneByClientId(int $client_id) Return the first ChildActionTracking filtered by the client_id column
 * @method     ChildActionTracking findOneByProjectId(int $project_id) Return the first ChildActionTracking filtered by the project_id column
 * @method     ChildActionTracking findOneByTableModified(string $table_modified) Return the first ChildActionTracking filtered by the table_modified column
 * @method     ChildActionTracking findOneByRecordId(int $record_id) Return the first ChildActionTracking filtered by the record_id column
 * @method     ChildActionTracking findOneByFieldLabel(string $field_label) Return the first ChildActionTracking filtered by the field_label column
 * @method     ChildActionTracking findOneByOldValue(string $old_value) Return the first ChildActionTracking filtered by the old_value column
 * @method     ChildActionTracking findOneByNewValue(string $new_value) Return the first ChildActionTracking filtered by the new_value column
 * @method     ChildActionTracking findOneByCaption(string $caption) Return the first ChildActionTracking filtered by the caption column
 * @method     ChildActionTracking findOneByIcon(string $icon) Return the first ChildActionTracking filtered by the icon column
 * @method     ChildActionTracking findOneByDateTimeCreated(string $date_time_created) Return the first ChildActionTracking filtered by the date_time_created column
 * @method     ChildActionTracking findOneByUserId(int $user_id) Return the first ChildActionTracking filtered by the user_id column *

 * @method     ChildActionTracking requirePk($key, ConnectionInterface $con = null) Return the ChildActionTracking by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOne(ConnectionInterface $con = null) Return the first ChildActionTracking matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActionTracking requireOneById(int $id) Return the first ChildActionTracking filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByClientId(int $client_id) Return the first ChildActionTracking filtered by the client_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByProjectId(int $project_id) Return the first ChildActionTracking filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByTableModified(string $table_modified) Return the first ChildActionTracking filtered by the table_modified column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByRecordId(int $record_id) Return the first ChildActionTracking filtered by the record_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByFieldLabel(string $field_label) Return the first ChildActionTracking filtered by the field_label column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByOldValue(string $old_value) Return the first ChildActionTracking filtered by the old_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByNewValue(string $new_value) Return the first ChildActionTracking filtered by the new_value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByCaption(string $caption) Return the first ChildActionTracking filtered by the caption column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByIcon(string $icon) Return the first ChildActionTracking filtered by the icon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByDateTimeCreated(string $date_time_created) Return the first ChildActionTracking filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildActionTracking requireOneByUserId(int $user_id) Return the first ChildActionTracking filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildActionTracking[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildActionTracking objects based on current ModelCriteria
 * @method     ChildActionTracking[]|ObjectCollection findById(int $id) Return ChildActionTracking objects filtered by the id column
 * @method     ChildActionTracking[]|ObjectCollection findByClientId(int $client_id) Return ChildActionTracking objects filtered by the client_id column
 * @method     ChildActionTracking[]|ObjectCollection findByProjectId(int $project_id) Return ChildActionTracking objects filtered by the project_id column
 * @method     ChildActionTracking[]|ObjectCollection findByTableModified(string $table_modified) Return ChildActionTracking objects filtered by the table_modified column
 * @method     ChildActionTracking[]|ObjectCollection findByRecordId(int $record_id) Return ChildActionTracking objects filtered by the record_id column
 * @method     ChildActionTracking[]|ObjectCollection findByFieldLabel(string $field_label) Return ChildActionTracking objects filtered by the field_label column
 * @method     ChildActionTracking[]|ObjectCollection findByOldValue(string $old_value) Return ChildActionTracking objects filtered by the old_value column
 * @method     ChildActionTracking[]|ObjectCollection findByNewValue(string $new_value) Return ChildActionTracking objects filtered by the new_value column
 * @method     ChildActionTracking[]|ObjectCollection findByCaption(string $caption) Return ChildActionTracking objects filtered by the caption column
 * @method     ChildActionTracking[]|ObjectCollection findByIcon(string $icon) Return ChildActionTracking objects filtered by the icon column
 * @method     ChildActionTracking[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildActionTracking objects filtered by the date_time_created column
 * @method     ChildActionTracking[]|ObjectCollection findByUserId(int $user_id) Return ChildActionTracking objects filtered by the user_id column
 * @method     ChildActionTracking[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ActionTrackingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ActionTrackingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ActionTracking', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildActionTrackingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildActionTrackingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildActionTrackingQuery) {
            return $criteria;
        }
        $query = new ChildActionTrackingQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildActionTracking|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ActionTrackingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ActionTrackingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActionTracking A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `client_id`, `project_id`, `table_modified`, `record_id`, `field_label`, `old_value`, `new_value`, `caption`, `icon`, `date_time_created`, `user_id` FROM `action_tracking` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildActionTracking $obj */
            $obj = new ChildActionTracking();
            $obj->hydrate($row);
            ActionTrackingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildActionTracking|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ActionTrackingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ActionTrackingTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the client_id column
     *
     * Example usage:
     * <code>
     * $query->filterByClientId(1234); // WHERE client_id = 1234
     * $query->filterByClientId(array(12, 34)); // WHERE client_id IN (12, 34)
     * $query->filterByClientId(array('min' => 12)); // WHERE client_id > 12
     * </code>
     *
     * @see       filterByClients()
     *
     * @param     mixed $clientId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByClientId($clientId = null, $comparison = null)
    {
        if (is_array($clientId)) {
            $useMinMax = false;
            if (isset($clientId['min'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_CLIENT_ID, $clientId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientId['max'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_CLIENT_ID, $clientId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_CLIENT_ID, $clientId, $comparison);
    }

    /**
     * Filter the query on the project_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProjectId(1234); // WHERE project_id = 1234
     * $query->filterByProjectId(array(12, 34)); // WHERE project_id IN (12, 34)
     * $query->filterByProjectId(array('min' => 12)); // WHERE project_id > 12
     * </code>
     *
     * @see       filterByProjects()
     *
     * @param     mixed $projectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_PROJECT_ID, $projectId, $comparison);
    }

    /**
     * Filter the query on the table_modified column
     *
     * Example usage:
     * <code>
     * $query->filterByTableModified('fooValue');   // WHERE table_modified = 'fooValue'
     * $query->filterByTableModified('%fooValue%', Criteria::LIKE); // WHERE table_modified LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tableModified The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByTableModified($tableModified = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tableModified)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_TABLE_MODIFIED, $tableModified, $comparison);
    }

    /**
     * Filter the query on the record_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRecordId(1234); // WHERE record_id = 1234
     * $query->filterByRecordId(array(12, 34)); // WHERE record_id IN (12, 34)
     * $query->filterByRecordId(array('min' => 12)); // WHERE record_id > 12
     * </code>
     *
     * @param     mixed $recordId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByRecordId($recordId = null, $comparison = null)
    {
        if (is_array($recordId)) {
            $useMinMax = false;
            if (isset($recordId['min'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_RECORD_ID, $recordId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recordId['max'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_RECORD_ID, $recordId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_RECORD_ID, $recordId, $comparison);
    }

    /**
     * Filter the query on the field_label column
     *
     * Example usage:
     * <code>
     * $query->filterByFieldLabel('fooValue');   // WHERE field_label = 'fooValue'
     * $query->filterByFieldLabel('%fooValue%', Criteria::LIKE); // WHERE field_label LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fieldLabel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByFieldLabel($fieldLabel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fieldLabel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_FIELD_LABEL, $fieldLabel, $comparison);
    }

    /**
     * Filter the query on the old_value column
     *
     * Example usage:
     * <code>
     * $query->filterByOldValue('fooValue');   // WHERE old_value = 'fooValue'
     * $query->filterByOldValue('%fooValue%', Criteria::LIKE); // WHERE old_value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $oldValue The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByOldValue($oldValue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($oldValue)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_OLD_VALUE, $oldValue, $comparison);
    }

    /**
     * Filter the query on the new_value column
     *
     * Example usage:
     * <code>
     * $query->filterByNewValue('fooValue');   // WHERE new_value = 'fooValue'
     * $query->filterByNewValue('%fooValue%', Criteria::LIKE); // WHERE new_value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $newValue The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByNewValue($newValue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($newValue)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_NEW_VALUE, $newValue, $comparison);
    }

    /**
     * Filter the query on the caption column
     *
     * Example usage:
     * <code>
     * $query->filterByCaption('fooValue');   // WHERE caption = 'fooValue'
     * $query->filterByCaption('%fooValue%', Criteria::LIKE); // WHERE caption LIKE '%fooValue%'
     * </code>
     *
     * @param     string $caption The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByCaption($caption = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($caption)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_CAPTION, $caption, $comparison);
    }

    /**
     * Filter the query on the icon column
     *
     * Example usage:
     * <code>
     * $query->filterByIcon('fooValue');   // WHERE icon = 'fooValue'
     * $query->filterByIcon('%fooValue%', Criteria::LIKE); // WHERE icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icon The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByIcon($icon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icon)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_ICON, $icon, $comparison);
    }

    /**
     * Filter the query on the date_time_created column
     *
     * Example usage:
     * <code>
     * $query->filterByDateTimeCreated('2011-03-14'); // WHERE date_time_created = '2011-03-14'
     * $query->filterByDateTimeCreated('now'); // WHERE date_time_created = '2011-03-14'
     * $query->filterByDateTimeCreated(array('max' => 'yesterday')); // WHERE date_time_created > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateTimeCreated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(ActionTrackingTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ActionTrackingTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(ActionTrackingTableMap::COL_USER_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionTrackingTableMap::COL_USER_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUsers() only accepts arguments of type \Users or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Users relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function joinUsers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Users');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Users');
        }

        return $this;
    }

    /**
     * Use the Users relation Users object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UsersQuery A secondary query class using the current class as primary query
     */
    public function useUsersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Users', '\UsersQuery');
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(ActionTrackingTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionTrackingTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProjects() only accepts arguments of type \Projects or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Projects relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function joinProjects($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Projects');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Projects');
        }

        return $this;
    }

    /**
     * Use the Projects relation Projects object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectsQuery A secondary query class using the current class as primary query
     */
    public function useProjectsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjects($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projects', '\ProjectsQuery');
    }

    /**
     * Filter the query by a related \Clients object
     *
     * @param \Clients|ObjectCollection $clients The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildActionTrackingQuery The current query, for fluid interface
     */
    public function filterByClients($clients, $comparison = null)
    {
        if ($clients instanceof \Clients) {
            return $this
                ->addUsingAlias(ActionTrackingTableMap::COL_CLIENT_ID, $clients->getId(), $comparison);
        } elseif ($clients instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ActionTrackingTableMap::COL_CLIENT_ID, $clients->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClients() only accepts arguments of type \Clients or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Clients relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function joinClients($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Clients');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Clients');
        }

        return $this;
    }

    /**
     * Use the Clients relation Clients object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClientsQuery A secondary query class using the current class as primary query
     */
    public function useClientsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinClients($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Clients', '\ClientsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildActionTracking $actionTracking Object to remove from the list of results
     *
     * @return $this|ChildActionTrackingQuery The current query, for fluid interface
     */
    public function prune($actionTracking = null)
    {
        if ($actionTracking) {
            $this->addUsingAlias(ActionTrackingTableMap::COL_ID, $actionTracking->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the action_tracking table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActionTrackingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ActionTrackingTableMap::clearInstancePool();
            ActionTrackingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActionTrackingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ActionTrackingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ActionTrackingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ActionTrackingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ActionTrackingQuery
