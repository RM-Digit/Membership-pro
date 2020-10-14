<?php

namespace Base;

use \ValueStreamDiagram as ChildValueStreamDiagram;
use \ValueStreamDiagramQuery as ChildValueStreamDiagramQuery;
use \Exception;
use \PDO;
use Map\ValueStreamDiagramTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'value_stream_diagram' table.
 *
 *
 *
 * @method     ChildValueStreamDiagramQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildValueStreamDiagramQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildValueStreamDiagramQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildValueStreamDiagramQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildValueStreamDiagramQuery orderBySvg($order = Criteria::ASC) Order by the svg column
 * @method     ChildValueStreamDiagramQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildValueStreamDiagramQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildValueStreamDiagramQuery groupById() Group by the id column
 * @method     ChildValueStreamDiagramQuery groupByProjectId() Group by the project_id column
 * @method     ChildValueStreamDiagramQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildValueStreamDiagramQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildValueStreamDiagramQuery groupBySvg() Group by the svg column
 * @method     ChildValueStreamDiagramQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildValueStreamDiagramQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildValueStreamDiagramQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildValueStreamDiagramQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildValueStreamDiagramQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildValueStreamDiagramQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildValueStreamDiagramQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildValueStreamDiagramQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildValueStreamDiagram findOne(ConnectionInterface $con = null) Return the first ChildValueStreamDiagram matching the query
 * @method     ChildValueStreamDiagram findOneOrCreate(ConnectionInterface $con = null) Return the first ChildValueStreamDiagram matching the query, or a new ChildValueStreamDiagram object populated from the query conditions when no match is found
 *
 * @method     ChildValueStreamDiagram findOneById(int $id) Return the first ChildValueStreamDiagram filtered by the id column
 * @method     ChildValueStreamDiagram findOneByProjectId(int $project_id) Return the first ChildValueStreamDiagram filtered by the project_id column
 * @method     ChildValueStreamDiagram findOneByPhaseId(int $phase_id) Return the first ChildValueStreamDiagram filtered by the phase_id column
 * @method     ChildValueStreamDiagram findOneByPhaseComponentId(int $phase_component_id) Return the first ChildValueStreamDiagram filtered by the phase_component_id column
 * @method     ChildValueStreamDiagram findOneBySvg(string $svg) Return the first ChildValueStreamDiagram filtered by the svg column
 * @method     ChildValueStreamDiagram findOneByDateTimeCreated(string $date_time_created) Return the first ChildValueStreamDiagram filtered by the date_time_created column
 * @method     ChildValueStreamDiagram findOneByLastUpdated(string $last_updated) Return the first ChildValueStreamDiagram filtered by the last_updated column *

 * @method     ChildValueStreamDiagram requirePk($key, ConnectionInterface $con = null) Return the ChildValueStreamDiagram by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildValueStreamDiagram requireOne(ConnectionInterface $con = null) Return the first ChildValueStreamDiagram matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildValueStreamDiagram requireOneById(int $id) Return the first ChildValueStreamDiagram filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildValueStreamDiagram requireOneByProjectId(int $project_id) Return the first ChildValueStreamDiagram filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildValueStreamDiagram requireOneByPhaseId(int $phase_id) Return the first ChildValueStreamDiagram filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildValueStreamDiagram requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildValueStreamDiagram filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildValueStreamDiagram requireOneBySvg(string $svg) Return the first ChildValueStreamDiagram filtered by the svg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildValueStreamDiagram requireOneByDateTimeCreated(string $date_time_created) Return the first ChildValueStreamDiagram filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildValueStreamDiagram requireOneByLastUpdated(string $last_updated) Return the first ChildValueStreamDiagram filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildValueStreamDiagram[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildValueStreamDiagram objects based on current ModelCriteria
 * @method     ChildValueStreamDiagram[]|ObjectCollection findById(int $id) Return ChildValueStreamDiagram objects filtered by the id column
 * @method     ChildValueStreamDiagram[]|ObjectCollection findByProjectId(int $project_id) Return ChildValueStreamDiagram objects filtered by the project_id column
 * @method     ChildValueStreamDiagram[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildValueStreamDiagram objects filtered by the phase_id column
 * @method     ChildValueStreamDiagram[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildValueStreamDiagram objects filtered by the phase_component_id column
 * @method     ChildValueStreamDiagram[]|ObjectCollection findBySvg(string $svg) Return ChildValueStreamDiagram objects filtered by the svg column
 * @method     ChildValueStreamDiagram[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildValueStreamDiagram objects filtered by the date_time_created column
 * @method     ChildValueStreamDiagram[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildValueStreamDiagram objects filtered by the last_updated column
 * @method     ChildValueStreamDiagram[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ValueStreamDiagramQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ValueStreamDiagramQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ValueStreamDiagram', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildValueStreamDiagramQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildValueStreamDiagramQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildValueStreamDiagramQuery) {
            return $criteria;
        }
        $query = new ChildValueStreamDiagramQuery();
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
     * @return ChildValueStreamDiagram|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ValueStreamDiagramTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ValueStreamDiagramTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildValueStreamDiagram A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `svg`, `date_time_created`, `last_updated` FROM `value_stream_diagram` WHERE `id` = :p0';
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
            /** @var ChildValueStreamDiagram $obj */
            $obj = new ChildValueStreamDiagram();
            $obj->hydrate($row);
            ValueStreamDiagramTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildValueStreamDiagram|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_ID, $id, $comparison);
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
     * @param     mixed $projectId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PROJECT_ID, $projectId, $comparison);
    }

    /**
     * Filter the query on the phase_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhaseId(1234); // WHERE phase_id = 1234
     * $query->filterByPhaseId(array(12, 34)); // WHERE phase_id IN (12, 34)
     * $query->filterByPhaseId(array('min' => 12)); // WHERE phase_id > 12
     * </code>
     *
     * @param     mixed $phaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PHASE_ID, $phaseId, $comparison);
    }

    /**
     * Filter the query on the phase_component_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhaseComponentId(1234); // WHERE phase_component_id = 1234
     * $query->filterByPhaseComponentId(array(12, 34)); // WHERE phase_component_id IN (12, 34)
     * $query->filterByPhaseComponentId(array('min' => 12)); // WHERE phase_component_id > 12
     * </code>
     *
     * @param     mixed $phaseComponentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the svg column
     *
     * Example usage:
     * <code>
     * $query->filterBySvg('fooValue');   // WHERE svg = 'fooValue'
     * $query->filterBySvg('%fooValue%', Criteria::LIKE); // WHERE svg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $svg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterBySvg($svg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($svg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_SVG, $svg, $comparison);
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
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(ValueStreamDiagramTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ValueStreamDiagramTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildValueStreamDiagram $valueStreamDiagram Object to remove from the list of results
     *
     * @return $this|ChildValueStreamDiagramQuery The current query, for fluid interface
     */
    public function prune($valueStreamDiagram = null)
    {
        if ($valueStreamDiagram) {
            $this->addUsingAlias(ValueStreamDiagramTableMap::COL_ID, $valueStreamDiagram->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the value_stream_diagram table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ValueStreamDiagramTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ValueStreamDiagramTableMap::clearInstancePool();
            ValueStreamDiagramTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ValueStreamDiagramTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ValueStreamDiagramTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ValueStreamDiagramTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ValueStreamDiagramTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ValueStreamDiagramQuery
