<?php

namespace Base;

use \DefineStakeholders as ChildDefineStakeholders;
use \DefineStakeholdersQuery as ChildDefineStakeholdersQuery;
use \Exception;
use \PDO;
use Map\DefineStakeholdersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'define_stakeholders' table.
 *
 *
 *
 * @method     ChildDefineStakeholdersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDefineStakeholdersQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildDefineStakeholdersQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildDefineStakeholdersQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildDefineStakeholdersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildDefineStakeholdersQuery orderBySupportCategory($order = Criteria::ASC) Order by the support_category column
 * @method     ChildDefineStakeholdersQuery orderByResistanceType($order = Criteria::ASC) Order by the resistance_type column
 * @method     ChildDefineStakeholdersQuery orderByResistanceLevel($order = Criteria::ASC) Order by the resistance_level column
 * @method     ChildDefineStakeholdersQuery orderByResistanceStrategy($order = Criteria::ASC) Order by the resistance_strategy column
 * @method     ChildDefineStakeholdersQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildDefineStakeholdersQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildDefineStakeholdersQuery groupById() Group by the id column
 * @method     ChildDefineStakeholdersQuery groupByProjectId() Group by the project_id column
 * @method     ChildDefineStakeholdersQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildDefineStakeholdersQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildDefineStakeholdersQuery groupByUserId() Group by the user_id column
 * @method     ChildDefineStakeholdersQuery groupBySupportCategory() Group by the support_category column
 * @method     ChildDefineStakeholdersQuery groupByResistanceType() Group by the resistance_type column
 * @method     ChildDefineStakeholdersQuery groupByResistanceLevel() Group by the resistance_level column
 * @method     ChildDefineStakeholdersQuery groupByResistanceStrategy() Group by the resistance_strategy column
 * @method     ChildDefineStakeholdersQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildDefineStakeholdersQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildDefineStakeholdersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDefineStakeholdersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDefineStakeholdersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDefineStakeholdersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDefineStakeholdersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDefineStakeholdersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDefineStakeholdersQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildDefineStakeholdersQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildDefineStakeholdersQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildDefineStakeholdersQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildDefineStakeholdersQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildDefineStakeholdersQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildDefineStakeholdersQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildDefineStakeholdersQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildDefineStakeholdersQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildDefineStakeholdersQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildDefineStakeholdersQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildDefineStakeholdersQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildDefineStakeholdersQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildDefineStakeholdersQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildDefineStakeholdersQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildDefineStakeholdersQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildDefineStakeholdersQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildDefineStakeholdersQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildDefineStakeholdersQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildDefineStakeholdersQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildDefineStakeholdersQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildDefineStakeholdersQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildDefineStakeholdersQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildDefineStakeholdersQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildDefineStakeholdersQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildDefineStakeholdersQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildDefineStakeholdersQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildDefineStakeholdersQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery|\UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDefineStakeholders findOne(ConnectionInterface $con = null) Return the first ChildDefineStakeholders matching the query
 * @method     ChildDefineStakeholders findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDefineStakeholders matching the query, or a new ChildDefineStakeholders object populated from the query conditions when no match is found
 *
 * @method     ChildDefineStakeholders findOneById(int $id) Return the first ChildDefineStakeholders filtered by the id column
 * @method     ChildDefineStakeholders findOneByProjectId(int $project_id) Return the first ChildDefineStakeholders filtered by the project_id column
 * @method     ChildDefineStakeholders findOneByPhaseId(int $phase_id) Return the first ChildDefineStakeholders filtered by the phase_id column
 * @method     ChildDefineStakeholders findOneByPhaseComponentId(int $phase_component_id) Return the first ChildDefineStakeholders filtered by the phase_component_id column
 * @method     ChildDefineStakeholders findOneByUserId(int $user_id) Return the first ChildDefineStakeholders filtered by the user_id column
 * @method     ChildDefineStakeholders findOneBySupportCategory(string $support_category) Return the first ChildDefineStakeholders filtered by the support_category column
 * @method     ChildDefineStakeholders findOneByResistanceType(string $resistance_type) Return the first ChildDefineStakeholders filtered by the resistance_type column
 * @method     ChildDefineStakeholders findOneByResistanceLevel(string $resistance_level) Return the first ChildDefineStakeholders filtered by the resistance_level column
 * @method     ChildDefineStakeholders findOneByResistanceStrategy(string $resistance_strategy) Return the first ChildDefineStakeholders filtered by the resistance_strategy column
 * @method     ChildDefineStakeholders findOneByDateTimeCreated(string $date_time_created) Return the first ChildDefineStakeholders filtered by the date_time_created column
 * @method     ChildDefineStakeholders findOneByLastUpdated(string $last_updated) Return the first ChildDefineStakeholders filtered by the last_updated column *

 * @method     ChildDefineStakeholders requirePk($key, ConnectionInterface $con = null) Return the ChildDefineStakeholders by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOne(ConnectionInterface $con = null) Return the first ChildDefineStakeholders matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDefineStakeholders requireOneById(int $id) Return the first ChildDefineStakeholders filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByProjectId(int $project_id) Return the first ChildDefineStakeholders filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByPhaseId(int $phase_id) Return the first ChildDefineStakeholders filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildDefineStakeholders filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByUserId(int $user_id) Return the first ChildDefineStakeholders filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneBySupportCategory(string $support_category) Return the first ChildDefineStakeholders filtered by the support_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByResistanceType(string $resistance_type) Return the first ChildDefineStakeholders filtered by the resistance_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByResistanceLevel(string $resistance_level) Return the first ChildDefineStakeholders filtered by the resistance_level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByResistanceStrategy(string $resistance_strategy) Return the first ChildDefineStakeholders filtered by the resistance_strategy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByDateTimeCreated(string $date_time_created) Return the first ChildDefineStakeholders filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineStakeholders requireOneByLastUpdated(string $last_updated) Return the first ChildDefineStakeholders filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDefineStakeholders[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDefineStakeholders objects based on current ModelCriteria
 * @method     ChildDefineStakeholders[]|ObjectCollection findById(int $id) Return ChildDefineStakeholders objects filtered by the id column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByProjectId(int $project_id) Return ChildDefineStakeholders objects filtered by the project_id column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildDefineStakeholders objects filtered by the phase_id column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildDefineStakeholders objects filtered by the phase_component_id column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByUserId(int $user_id) Return ChildDefineStakeholders objects filtered by the user_id column
 * @method     ChildDefineStakeholders[]|ObjectCollection findBySupportCategory(string $support_category) Return ChildDefineStakeholders objects filtered by the support_category column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByResistanceType(string $resistance_type) Return ChildDefineStakeholders objects filtered by the resistance_type column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByResistanceLevel(string $resistance_level) Return ChildDefineStakeholders objects filtered by the resistance_level column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByResistanceStrategy(string $resistance_strategy) Return ChildDefineStakeholders objects filtered by the resistance_strategy column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildDefineStakeholders objects filtered by the date_time_created column
 * @method     ChildDefineStakeholders[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildDefineStakeholders objects filtered by the last_updated column
 * @method     ChildDefineStakeholders[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DefineStakeholdersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DefineStakeholdersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DefineStakeholders', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDefineStakeholdersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDefineStakeholdersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDefineStakeholdersQuery) {
            return $criteria;
        }
        $query = new ChildDefineStakeholdersQuery();
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
     * @return ChildDefineStakeholders|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DefineStakeholdersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DefineStakeholdersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDefineStakeholders A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `user_id`, `support_category`, `resistance_type`, `resistance_level`, `resistance_strategy`, `date_time_created`, `last_updated` FROM `define_stakeholders` WHERE `id` = :p0';
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
            /** @var ChildDefineStakeholders $obj */
            $obj = new ChildDefineStakeholders();
            $obj->hydrate($row);
            DefineStakeholdersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDefineStakeholders|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @see       filterByProjectPhases()
     *
     * @param     mixed $phaseId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_ID, $phaseId, $comparison);
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
     * @see       filterByPhaseComponents()
     *
     * @param     mixed $phaseComponentId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
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
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the support_category column
     *
     * Example usage:
     * <code>
     * $query->filterBySupportCategory('fooValue');   // WHERE support_category = 'fooValue'
     * $query->filterBySupportCategory('%fooValue%', Criteria::LIKE); // WHERE support_category LIKE '%fooValue%'
     * </code>
     *
     * @param     string $supportCategory The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterBySupportCategory($supportCategory = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($supportCategory)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_SUPPORT_CATEGORY, $supportCategory, $comparison);
    }

    /**
     * Filter the query on the resistance_type column
     *
     * Example usage:
     * <code>
     * $query->filterByResistanceType('fooValue');   // WHERE resistance_type = 'fooValue'
     * $query->filterByResistanceType('%fooValue%', Criteria::LIKE); // WHERE resistance_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resistanceType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByResistanceType($resistanceType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resistanceType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_RESISTANCE_TYPE, $resistanceType, $comparison);
    }

    /**
     * Filter the query on the resistance_level column
     *
     * Example usage:
     * <code>
     * $query->filterByResistanceLevel('fooValue');   // WHERE resistance_level = 'fooValue'
     * $query->filterByResistanceLevel('%fooValue%', Criteria::LIKE); // WHERE resistance_level LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resistanceLevel The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByResistanceLevel($resistanceLevel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resistanceLevel)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_RESISTANCE_LEVEL, $resistanceLevel, $comparison);
    }

    /**
     * Filter the query on the resistance_strategy column
     *
     * Example usage:
     * <code>
     * $query->filterByResistanceStrategy('fooValue');   // WHERE resistance_strategy = 'fooValue'
     * $query->filterByResistanceStrategy('%fooValue%', Criteria::LIKE); // WHERE resistance_strategy LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resistanceStrategy The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByResistanceStrategy($resistanceStrategy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resistanceStrategy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_RESISTANCE_STRATEGY, $resistanceStrategy, $comparison);
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
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(DefineStakeholdersTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineStakeholdersTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(DefineStakeholdersTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineStakeholdersTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
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
     * Filter the query by a related \ProjectPhases object
     *
     * @param \ProjectPhases|ObjectCollection $projectPhases The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByProjectPhases() only accepts arguments of type \ProjectPhases or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProjectPhases relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function joinProjectPhases($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProjectPhases');

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
            $this->addJoinObject($join, 'ProjectPhases');
        }

        return $this;
    }

    /**
     * Use the ProjectPhases relation ProjectPhases object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ProjectPhasesQuery A secondary query class using the current class as primary query
     */
    public function useProjectPhasesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProjectPhases($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProjectPhases', '\ProjectPhasesQuery');
    }

    /**
     * Filter the query by a related \PhaseComponents object
     *
     * @param \PhaseComponents|ObjectCollection $phaseComponents The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineStakeholdersTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPhaseComponents() only accepts arguments of type \PhaseComponents or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PhaseComponents relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function joinPhaseComponents($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PhaseComponents');

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
            $this->addJoinObject($join, 'PhaseComponents');
        }

        return $this;
    }

    /**
     * Use the PhaseComponents relation PhaseComponents object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \PhaseComponentsQuery A secondary query class using the current class as primary query
     */
    public function usePhaseComponentsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPhaseComponents($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PhaseComponents', '\PhaseComponentsQuery');
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(DefineStakeholdersTableMap::COL_USER_ID, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineStakeholdersTableMap::COL_USER_ID, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildDefineStakeholders $defineStakeholders Object to remove from the list of results
     *
     * @return $this|ChildDefineStakeholdersQuery The current query, for fluid interface
     */
    public function prune($defineStakeholders = null)
    {
        if ($defineStakeholders) {
            $this->addUsingAlias(DefineStakeholdersTableMap::COL_ID, $defineStakeholders->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the define_stakeholders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DefineStakeholdersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DefineStakeholdersTableMap::clearInstancePool();
            DefineStakeholdersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DefineStakeholdersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DefineStakeholdersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DefineStakeholdersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DefineStakeholdersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DefineStakeholdersQuery
