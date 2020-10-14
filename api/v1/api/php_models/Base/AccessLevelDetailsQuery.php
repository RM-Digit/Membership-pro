<?php

namespace Base;

use \AccessLevelDetails as ChildAccessLevelDetails;
use \AccessLevelDetailsQuery as ChildAccessLevelDetailsQuery;
use \Exception;
use \PDO;
use Map\AccessLevelDetailsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'access_level_details' table.
 *
 *
 *
 * @method     ChildAccessLevelDetailsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAccessLevelDetailsQuery orderByAccessLevelId($order = Criteria::ASC) Order by the access_level_id column
 * @method     ChildAccessLevelDetailsQuery orderByAccessLevelOptionId($order = Criteria::ASC) Order by the access_level_option_id column
 * @method     ChildAccessLevelDetailsQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildAccessLevelDetailsQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildAccessLevelDetailsQuery groupById() Group by the id column
 * @method     ChildAccessLevelDetailsQuery groupByAccessLevelId() Group by the access_level_id column
 * @method     ChildAccessLevelDetailsQuery groupByAccessLevelOptionId() Group by the access_level_option_id column
 * @method     ChildAccessLevelDetailsQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildAccessLevelDetailsQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildAccessLevelDetailsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAccessLevelDetailsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAccessLevelDetailsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAccessLevelDetailsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAccessLevelDetailsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAccessLevelDetailsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAccessLevelDetailsQuery leftJoinAccessLevels($relationAlias = null) Adds a LEFT JOIN clause to the query using the AccessLevels relation
 * @method     ChildAccessLevelDetailsQuery rightJoinAccessLevels($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AccessLevels relation
 * @method     ChildAccessLevelDetailsQuery innerJoinAccessLevels($relationAlias = null) Adds a INNER JOIN clause to the query using the AccessLevels relation
 *
 * @method     ChildAccessLevelDetailsQuery joinWithAccessLevels($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AccessLevels relation
 *
 * @method     ChildAccessLevelDetailsQuery leftJoinWithAccessLevels() Adds a LEFT JOIN clause and with to the query using the AccessLevels relation
 * @method     ChildAccessLevelDetailsQuery rightJoinWithAccessLevels() Adds a RIGHT JOIN clause and with to the query using the AccessLevels relation
 * @method     ChildAccessLevelDetailsQuery innerJoinWithAccessLevels() Adds a INNER JOIN clause and with to the query using the AccessLevels relation
 *
 * @method     ChildAccessLevelDetailsQuery leftJoinAccessLevelOptions($relationAlias = null) Adds a LEFT JOIN clause to the query using the AccessLevelOptions relation
 * @method     ChildAccessLevelDetailsQuery rightJoinAccessLevelOptions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AccessLevelOptions relation
 * @method     ChildAccessLevelDetailsQuery innerJoinAccessLevelOptions($relationAlias = null) Adds a INNER JOIN clause to the query using the AccessLevelOptions relation
 *
 * @method     ChildAccessLevelDetailsQuery joinWithAccessLevelOptions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AccessLevelOptions relation
 *
 * @method     ChildAccessLevelDetailsQuery leftJoinWithAccessLevelOptions() Adds a LEFT JOIN clause and with to the query using the AccessLevelOptions relation
 * @method     ChildAccessLevelDetailsQuery rightJoinWithAccessLevelOptions() Adds a RIGHT JOIN clause and with to the query using the AccessLevelOptions relation
 * @method     ChildAccessLevelDetailsQuery innerJoinWithAccessLevelOptions() Adds a INNER JOIN clause and with to the query using the AccessLevelOptions relation
 *
 * @method     \AccessLevelsQuery|\AccessLevelOptionsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAccessLevelDetails findOne(ConnectionInterface $con = null) Return the first ChildAccessLevelDetails matching the query
 * @method     ChildAccessLevelDetails findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAccessLevelDetails matching the query, or a new ChildAccessLevelDetails object populated from the query conditions when no match is found
 *
 * @method     ChildAccessLevelDetails findOneById(int $id) Return the first ChildAccessLevelDetails filtered by the id column
 * @method     ChildAccessLevelDetails findOneByAccessLevelId(int $access_level_id) Return the first ChildAccessLevelDetails filtered by the access_level_id column
 * @method     ChildAccessLevelDetails findOneByAccessLevelOptionId(int $access_level_option_id) Return the first ChildAccessLevelDetails filtered by the access_level_option_id column
 * @method     ChildAccessLevelDetails findOneByDateTimeCreated(string $date_time_created) Return the first ChildAccessLevelDetails filtered by the date_time_created column
 * @method     ChildAccessLevelDetails findOneByLastUpdated(string $last_updated) Return the first ChildAccessLevelDetails filtered by the last_updated column *

 * @method     ChildAccessLevelDetails requirePk($key, ConnectionInterface $con = null) Return the ChildAccessLevelDetails by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccessLevelDetails requireOne(ConnectionInterface $con = null) Return the first ChildAccessLevelDetails matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAccessLevelDetails requireOneById(int $id) Return the first ChildAccessLevelDetails filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccessLevelDetails requireOneByAccessLevelId(int $access_level_id) Return the first ChildAccessLevelDetails filtered by the access_level_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccessLevelDetails requireOneByAccessLevelOptionId(int $access_level_option_id) Return the first ChildAccessLevelDetails filtered by the access_level_option_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccessLevelDetails requireOneByDateTimeCreated(string $date_time_created) Return the first ChildAccessLevelDetails filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAccessLevelDetails requireOneByLastUpdated(string $last_updated) Return the first ChildAccessLevelDetails filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAccessLevelDetails[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAccessLevelDetails objects based on current ModelCriteria
 * @method     ChildAccessLevelDetails[]|ObjectCollection findById(int $id) Return ChildAccessLevelDetails objects filtered by the id column
 * @method     ChildAccessLevelDetails[]|ObjectCollection findByAccessLevelId(int $access_level_id) Return ChildAccessLevelDetails objects filtered by the access_level_id column
 * @method     ChildAccessLevelDetails[]|ObjectCollection findByAccessLevelOptionId(int $access_level_option_id) Return ChildAccessLevelDetails objects filtered by the access_level_option_id column
 * @method     ChildAccessLevelDetails[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildAccessLevelDetails objects filtered by the date_time_created column
 * @method     ChildAccessLevelDetails[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildAccessLevelDetails objects filtered by the last_updated column
 * @method     ChildAccessLevelDetails[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AccessLevelDetailsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AccessLevelDetailsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AccessLevelDetails', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAccessLevelDetailsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAccessLevelDetailsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAccessLevelDetailsQuery) {
            return $criteria;
        }
        $query = new ChildAccessLevelDetailsQuery();
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
     * @return ChildAccessLevelDetails|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AccessLevelDetailsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AccessLevelDetailsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAccessLevelDetails A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `access_level_id`, `access_level_option_id`, `date_time_created`, `last_updated` FROM `access_level_details` WHERE `id` = :p0';
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
            /** @var ChildAccessLevelDetails $obj */
            $obj = new ChildAccessLevelDetails();
            $obj->hydrate($row);
            AccessLevelDetailsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAccessLevelDetails|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the access_level_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAccessLevelId(1234); // WHERE access_level_id = 1234
     * $query->filterByAccessLevelId(array(12, 34)); // WHERE access_level_id IN (12, 34)
     * $query->filterByAccessLevelId(array('min' => 12)); // WHERE access_level_id > 12
     * </code>
     *
     * @see       filterByAccessLevels()
     *
     * @param     mixed $accessLevelId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterByAccessLevelId($accessLevelId = null, $comparison = null)
    {
        if (is_array($accessLevelId)) {
            $useMinMax = false;
            if (isset($accessLevelId['min'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_ID, $accessLevelId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accessLevelId['max'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_ID, $accessLevelId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_ID, $accessLevelId, $comparison);
    }

    /**
     * Filter the query on the access_level_option_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAccessLevelOptionId(1234); // WHERE access_level_option_id = 1234
     * $query->filterByAccessLevelOptionId(array(12, 34)); // WHERE access_level_option_id IN (12, 34)
     * $query->filterByAccessLevelOptionId(array('min' => 12)); // WHERE access_level_option_id > 12
     * </code>
     *
     * @see       filterByAccessLevelOptions()
     *
     * @param     mixed $accessLevelOptionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterByAccessLevelOptionId($accessLevelOptionId = null, $comparison = null)
    {
        if (is_array($accessLevelOptionId)) {
            $useMinMax = false;
            if (isset($accessLevelOptionId['min'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_OPTION_ID, $accessLevelOptionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($accessLevelOptionId['max'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_OPTION_ID, $accessLevelOptionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_OPTION_ID, $accessLevelOptionId, $comparison);
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
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccessLevelDetailsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
    }

    /**
     * Filter the query on the last_updated column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdated('2011-03-14'); // WHERE last_updated = '2011-03-14'
     * $query->filterByLastUpdated('now'); // WHERE last_updated = '2011-03-14'
     * $query->filterByLastUpdated(array('max' => 'yesterday')); // WHERE last_updated > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdated The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(AccessLevelDetailsTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AccessLevelDetailsTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \AccessLevels object
     *
     * @param \AccessLevels|ObjectCollection $accessLevels The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterByAccessLevels($accessLevels, $comparison = null)
    {
        if ($accessLevels instanceof \AccessLevels) {
            return $this
                ->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_ID, $accessLevels->getId(), $comparison);
        } elseif ($accessLevels instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_ID, $accessLevels->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAccessLevels() only accepts arguments of type \AccessLevels or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AccessLevels relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function joinAccessLevels($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AccessLevels');

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
            $this->addJoinObject($join, 'AccessLevels');
        }

        return $this;
    }

    /**
     * Use the AccessLevels relation AccessLevels object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AccessLevelsQuery A secondary query class using the current class as primary query
     */
    public function useAccessLevelsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAccessLevels($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AccessLevels', '\AccessLevelsQuery');
    }

    /**
     * Filter the query by a related \AccessLevelOptions object
     *
     * @param \AccessLevelOptions|ObjectCollection $accessLevelOptions The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function filterByAccessLevelOptions($accessLevelOptions, $comparison = null)
    {
        if ($accessLevelOptions instanceof \AccessLevelOptions) {
            return $this
                ->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_OPTION_ID, $accessLevelOptions->getId(), $comparison);
        } elseif ($accessLevelOptions instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AccessLevelDetailsTableMap::COL_ACCESS_LEVEL_OPTION_ID, $accessLevelOptions->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAccessLevelOptions() only accepts arguments of type \AccessLevelOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AccessLevelOptions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function joinAccessLevelOptions($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AccessLevelOptions');

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
            $this->addJoinObject($join, 'AccessLevelOptions');
        }

        return $this;
    }

    /**
     * Use the AccessLevelOptions relation AccessLevelOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AccessLevelOptionsQuery A secondary query class using the current class as primary query
     */
    public function useAccessLevelOptionsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAccessLevelOptions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AccessLevelOptions', '\AccessLevelOptionsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAccessLevelDetails $accessLevelDetails Object to remove from the list of results
     *
     * @return $this|ChildAccessLevelDetailsQuery The current query, for fluid interface
     */
    public function prune($accessLevelDetails = null)
    {
        if ($accessLevelDetails) {
            $this->addUsingAlias(AccessLevelDetailsTableMap::COL_ID, $accessLevelDetails->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the access_level_details table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AccessLevelDetailsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AccessLevelDetailsTableMap::clearInstancePool();
            AccessLevelDetailsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AccessLevelDetailsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AccessLevelDetailsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AccessLevelDetailsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AccessLevelDetailsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AccessLevelDetailsQuery
