<?php

namespace Base;

use \ControlTestPlan as ChildControlTestPlan;
use \ControlTestPlanQuery as ChildControlTestPlanQuery;
use \Exception;
use \PDO;
use Map\ControlTestPlanTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'control_test_plan' table.
 *
 *
 *
 * @method     ChildControlTestPlanQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildControlTestPlanQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildControlTestPlanQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildControlTestPlanQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildControlTestPlanQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     ChildControlTestPlanQuery orderByArea($order = Criteria::ASC) Order by the area column
 * @method     ChildControlTestPlanQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildControlTestPlanQuery orderByDetails($order = Criteria::ASC) Order by the details column
 * @method     ChildControlTestPlanQuery orderByExpectedBenefits($order = Criteria::ASC) Order by the expected_benefits column
 * @method     ChildControlTestPlanQuery orderByResponsibleParty($order = Criteria::ASC) Order by the responsible_party column
 * @method     ChildControlTestPlanQuery orderByEstimatedCost($order = Criteria::ASC) Order by the estimated_cost column
 * @method     ChildControlTestPlanQuery orderByTiming($order = Criteria::ASC) Order by the timing column
 * @method     ChildControlTestPlanQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method     ChildControlTestPlanQuery orderByComments($order = Criteria::ASC) Order by the comments column
 * @method     ChildControlTestPlanQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildControlTestPlanQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildControlTestPlanQuery groupById() Group by the id column
 * @method     ChildControlTestPlanQuery groupByProjectId() Group by the project_id column
 * @method     ChildControlTestPlanQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildControlTestPlanQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildControlTestPlanQuery groupBySubject() Group by the subject column
 * @method     ChildControlTestPlanQuery groupByArea() Group by the area column
 * @method     ChildControlTestPlanQuery groupByDescription() Group by the description column
 * @method     ChildControlTestPlanQuery groupByDetails() Group by the details column
 * @method     ChildControlTestPlanQuery groupByExpectedBenefits() Group by the expected_benefits column
 * @method     ChildControlTestPlanQuery groupByResponsibleParty() Group by the responsible_party column
 * @method     ChildControlTestPlanQuery groupByEstimatedCost() Group by the estimated_cost column
 * @method     ChildControlTestPlanQuery groupByTiming() Group by the timing column
 * @method     ChildControlTestPlanQuery groupByStatus() Group by the status column
 * @method     ChildControlTestPlanQuery groupByComments() Group by the comments column
 * @method     ChildControlTestPlanQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildControlTestPlanQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildControlTestPlanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildControlTestPlanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildControlTestPlanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildControlTestPlanQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildControlTestPlanQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildControlTestPlanQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildControlTestPlanQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildControlTestPlanQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildControlTestPlanQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildControlTestPlanQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildControlTestPlanQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildControlTestPlanQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildControlTestPlanQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildControlTestPlanQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildControlTestPlanQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildControlTestPlanQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildControlTestPlanQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildControlTestPlanQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildControlTestPlanQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildControlTestPlanQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildControlTestPlanQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildControlTestPlanQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildControlTestPlanQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildControlTestPlanQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildControlTestPlanQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildControlTestPlanQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildControlTestPlanQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildControlTestPlanQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildControlTestPlanQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildControlTestPlanQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildControlTestPlanQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildControlTestPlanQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildControlTestPlanQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildControlTestPlanQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery|\UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildControlTestPlan findOne(ConnectionInterface $con = null) Return the first ChildControlTestPlan matching the query
 * @method     ChildControlTestPlan findOneOrCreate(ConnectionInterface $con = null) Return the first ChildControlTestPlan matching the query, or a new ChildControlTestPlan object populated from the query conditions when no match is found
 *
 * @method     ChildControlTestPlan findOneById(int $id) Return the first ChildControlTestPlan filtered by the id column
 * @method     ChildControlTestPlan findOneByProjectId(int $project_id) Return the first ChildControlTestPlan filtered by the project_id column
 * @method     ChildControlTestPlan findOneByPhaseId(int $phase_id) Return the first ChildControlTestPlan filtered by the phase_id column
 * @method     ChildControlTestPlan findOneByPhaseComponentId(int $phase_component_id) Return the first ChildControlTestPlan filtered by the phase_component_id column
 * @method     ChildControlTestPlan findOneBySubject(string $subject) Return the first ChildControlTestPlan filtered by the subject column
 * @method     ChildControlTestPlan findOneByArea(string $area) Return the first ChildControlTestPlan filtered by the area column
 * @method     ChildControlTestPlan findOneByDescription(string $description) Return the first ChildControlTestPlan filtered by the description column
 * @method     ChildControlTestPlan findOneByDetails(string $details) Return the first ChildControlTestPlan filtered by the details column
 * @method     ChildControlTestPlan findOneByExpectedBenefits(string $expected_benefits) Return the first ChildControlTestPlan filtered by the expected_benefits column
 * @method     ChildControlTestPlan findOneByResponsibleParty(int $responsible_party) Return the first ChildControlTestPlan filtered by the responsible_party column
 * @method     ChildControlTestPlan findOneByEstimatedCost(string $estimated_cost) Return the first ChildControlTestPlan filtered by the estimated_cost column
 * @method     ChildControlTestPlan findOneByTiming(string $timing) Return the first ChildControlTestPlan filtered by the timing column
 * @method     ChildControlTestPlan findOneByStatus(string $status) Return the first ChildControlTestPlan filtered by the status column
 * @method     ChildControlTestPlan findOneByComments(string $comments) Return the first ChildControlTestPlan filtered by the comments column
 * @method     ChildControlTestPlan findOneByDateTimeCreated(string $date_time_created) Return the first ChildControlTestPlan filtered by the date_time_created column
 * @method     ChildControlTestPlan findOneByLastUpdated(string $last_updated) Return the first ChildControlTestPlan filtered by the last_updated column *

 * @method     ChildControlTestPlan requirePk($key, ConnectionInterface $con = null) Return the ChildControlTestPlan by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOne(ConnectionInterface $con = null) Return the first ChildControlTestPlan matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildControlTestPlan requireOneById(int $id) Return the first ChildControlTestPlan filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByProjectId(int $project_id) Return the first ChildControlTestPlan filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByPhaseId(int $phase_id) Return the first ChildControlTestPlan filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildControlTestPlan filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneBySubject(string $subject) Return the first ChildControlTestPlan filtered by the subject column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByArea(string $area) Return the first ChildControlTestPlan filtered by the area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByDescription(string $description) Return the first ChildControlTestPlan filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByDetails(string $details) Return the first ChildControlTestPlan filtered by the details column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByExpectedBenefits(string $expected_benefits) Return the first ChildControlTestPlan filtered by the expected_benefits column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByResponsibleParty(int $responsible_party) Return the first ChildControlTestPlan filtered by the responsible_party column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByEstimatedCost(string $estimated_cost) Return the first ChildControlTestPlan filtered by the estimated_cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByTiming(string $timing) Return the first ChildControlTestPlan filtered by the timing column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByStatus(string $status) Return the first ChildControlTestPlan filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByComments(string $comments) Return the first ChildControlTestPlan filtered by the comments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByDateTimeCreated(string $date_time_created) Return the first ChildControlTestPlan filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlTestPlan requireOneByLastUpdated(string $last_updated) Return the first ChildControlTestPlan filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildControlTestPlan[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildControlTestPlan objects based on current ModelCriteria
 * @method     ChildControlTestPlan[]|ObjectCollection findById(int $id) Return ChildControlTestPlan objects filtered by the id column
 * @method     ChildControlTestPlan[]|ObjectCollection findByProjectId(int $project_id) Return ChildControlTestPlan objects filtered by the project_id column
 * @method     ChildControlTestPlan[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildControlTestPlan objects filtered by the phase_id column
 * @method     ChildControlTestPlan[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildControlTestPlan objects filtered by the phase_component_id column
 * @method     ChildControlTestPlan[]|ObjectCollection findBySubject(string $subject) Return ChildControlTestPlan objects filtered by the subject column
 * @method     ChildControlTestPlan[]|ObjectCollection findByArea(string $area) Return ChildControlTestPlan objects filtered by the area column
 * @method     ChildControlTestPlan[]|ObjectCollection findByDescription(string $description) Return ChildControlTestPlan objects filtered by the description column
 * @method     ChildControlTestPlan[]|ObjectCollection findByDetails(string $details) Return ChildControlTestPlan objects filtered by the details column
 * @method     ChildControlTestPlan[]|ObjectCollection findByExpectedBenefits(string $expected_benefits) Return ChildControlTestPlan objects filtered by the expected_benefits column
 * @method     ChildControlTestPlan[]|ObjectCollection findByResponsibleParty(int $responsible_party) Return ChildControlTestPlan objects filtered by the responsible_party column
 * @method     ChildControlTestPlan[]|ObjectCollection findByEstimatedCost(string $estimated_cost) Return ChildControlTestPlan objects filtered by the estimated_cost column
 * @method     ChildControlTestPlan[]|ObjectCollection findByTiming(string $timing) Return ChildControlTestPlan objects filtered by the timing column
 * @method     ChildControlTestPlan[]|ObjectCollection findByStatus(string $status) Return ChildControlTestPlan objects filtered by the status column
 * @method     ChildControlTestPlan[]|ObjectCollection findByComments(string $comments) Return ChildControlTestPlan objects filtered by the comments column
 * @method     ChildControlTestPlan[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildControlTestPlan objects filtered by the date_time_created column
 * @method     ChildControlTestPlan[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildControlTestPlan objects filtered by the last_updated column
 * @method     ChildControlTestPlan[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ControlTestPlanQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ControlTestPlanQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ControlTestPlan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildControlTestPlanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildControlTestPlanQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildControlTestPlanQuery) {
            return $criteria;
        }
        $query = new ChildControlTestPlanQuery();
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
     * @return ChildControlTestPlan|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ControlTestPlanTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ControlTestPlanTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildControlTestPlan A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `subject`, `area`, `description`, `details`, `expected_benefits`, `responsible_party`, `estimated_cost`, `timing`, `status`, `comments`, `date_time_created`, `last_updated` FROM `control_test_plan` WHERE `id` = :p0';
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
            /** @var ChildControlTestPlan $obj */
            $obj = new ChildControlTestPlan();
            $obj->hydrate($row);
            ControlTestPlanTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildControlTestPlan|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_ID, $phaseId, $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
     * $query->filterBySubject('%fooValue%', Criteria::LIKE); // WHERE subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subject The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterBySubject($subject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subject)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the area column
     *
     * Example usage:
     * <code>
     * $query->filterByArea('fooValue');   // WHERE area = 'fooValue'
     * $query->filterByArea('%fooValue%', Criteria::LIKE); // WHERE area LIKE '%fooValue%'
     * </code>
     *
     * @param     string $area The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByArea($area = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($area)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_AREA, $area, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the details column
     *
     * Example usage:
     * <code>
     * $query->filterByDetails('fooValue');   // WHERE details = 'fooValue'
     * $query->filterByDetails('%fooValue%', Criteria::LIKE); // WHERE details LIKE '%fooValue%'
     * </code>
     *
     * @param     string $details The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByDetails($details = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($details)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_DETAILS, $details, $comparison);
    }

    /**
     * Filter the query on the expected_benefits column
     *
     * Example usage:
     * <code>
     * $query->filterByExpectedBenefits('fooValue');   // WHERE expected_benefits = 'fooValue'
     * $query->filterByExpectedBenefits('%fooValue%', Criteria::LIKE); // WHERE expected_benefits LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expectedBenefits The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByExpectedBenefits($expectedBenefits = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expectedBenefits)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_EXPECTED_BENEFITS, $expectedBenefits, $comparison);
    }

    /**
     * Filter the query on the responsible_party column
     *
     * Example usage:
     * <code>
     * $query->filterByResponsibleParty(1234); // WHERE responsible_party = 1234
     * $query->filterByResponsibleParty(array(12, 34)); // WHERE responsible_party IN (12, 34)
     * $query->filterByResponsibleParty(array('min' => 12)); // WHERE responsible_party > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $responsibleParty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByResponsibleParty($responsibleParty = null, $comparison = null)
    {
        if (is_array($responsibleParty)) {
            $useMinMax = false;
            if (isset($responsibleParty['min'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_RESPONSIBLE_PARTY, $responsibleParty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($responsibleParty['max'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_RESPONSIBLE_PARTY, $responsibleParty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_RESPONSIBLE_PARTY, $responsibleParty, $comparison);
    }

    /**
     * Filter the query on the estimated_cost column
     *
     * Example usage:
     * <code>
     * $query->filterByEstimatedCost('fooValue');   // WHERE estimated_cost = 'fooValue'
     * $query->filterByEstimatedCost('%fooValue%', Criteria::LIKE); // WHERE estimated_cost LIKE '%fooValue%'
     * </code>
     *
     * @param     string $estimatedCost The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByEstimatedCost($estimatedCost = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($estimatedCost)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_ESTIMATED_COST, $estimatedCost, $comparison);
    }

    /**
     * Filter the query on the timing column
     *
     * Example usage:
     * <code>
     * $query->filterByTiming('fooValue');   // WHERE timing = 'fooValue'
     * $query->filterByTiming('%fooValue%', Criteria::LIKE); // WHERE timing LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timing The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByTiming($timing = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timing)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_TIMING, $timing, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the comments column
     *
     * Example usage:
     * <code>
     * $query->filterByComments('fooValue');   // WHERE comments = 'fooValue'
     * $query->filterByComments('%fooValue%', Criteria::LIKE); // WHERE comments LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comments The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByComments($comments = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comments)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_COMMENTS, $comments, $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(ControlTestPlanTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlTestPlanTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(ControlTestPlanTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ControlTestPlanTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
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
     * @return ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
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
     * @return ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ControlTestPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
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
     * @return ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(ControlTestPlanTableMap::COL_RESPONSIBLE_PARTY, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ControlTestPlanTableMap::COL_RESPONSIBLE_PARTY, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function joinUsers($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useUsersQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinUsers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Users', '\UsersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildControlTestPlan $controlTestPlan Object to remove from the list of results
     *
     * @return $this|ChildControlTestPlanQuery The current query, for fluid interface
     */
    public function prune($controlTestPlan = null)
    {
        if ($controlTestPlan) {
            $this->addUsingAlias(ControlTestPlanTableMap::COL_ID, $controlTestPlan->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the control_test_plan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ControlTestPlanTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ControlTestPlanTableMap::clearInstancePool();
            ControlTestPlanTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ControlTestPlanTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ControlTestPlanTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ControlTestPlanTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ControlTestPlanTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ControlTestPlanQuery
