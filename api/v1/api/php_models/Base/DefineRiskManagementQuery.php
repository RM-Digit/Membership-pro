<?php

namespace Base;

use \DefineRiskManagement as ChildDefineRiskManagement;
use \DefineRiskManagementQuery as ChildDefineRiskManagementQuery;
use \Exception;
use \PDO;
use Map\DefineRiskManagementTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'define_risk_management' table.
 *
 *
 *
 * @method     ChildDefineRiskManagementQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDefineRiskManagementQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildDefineRiskManagementQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildDefineRiskManagementQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildDefineRiskManagementQuery orderByDateEntered($order = Criteria::ASC) Order by the date_entered column
 * @method     ChildDefineRiskManagementQuery orderByCategoryArea($order = Criteria::ASC) Order by the category_area column
 * @method     ChildDefineRiskManagementQuery orderBySpecificRisk($order = Criteria::ASC) Order by the specific_risk column
 * @method     ChildDefineRiskManagementQuery orderBySeverity($order = Criteria::ASC) Order by the severity column
 * @method     ChildDefineRiskManagementQuery orderByLikelihood($order = Criteria::ASC) Order by the likelihood column
 * @method     ChildDefineRiskManagementQuery orderByDetectibility($order = Criteria::ASC) Order by the detectibility column
 * @method     ChildDefineRiskManagementQuery orderByRiskPriority($order = Criteria::ASC) Order by the risk_priority column
 * @method     ChildDefineRiskManagementQuery orderByMitigationSteps($order = Criteria::ASC) Order by the mitigation_steps column
 * @method     ChildDefineRiskManagementQuery orderByPersonAccountable($order = Criteria::ASC) Order by the person_accountable column
 * @method     ChildDefineRiskManagementQuery orderByDueDate($order = Criteria::ASC) Order by the due_date column
 * @method     ChildDefineRiskManagementQuery orderByContingencyPlan($order = Criteria::ASC) Order by the contingency_plan column
 * @method     ChildDefineRiskManagementQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildDefineRiskManagementQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildDefineRiskManagementQuery groupById() Group by the id column
 * @method     ChildDefineRiskManagementQuery groupByProjectId() Group by the project_id column
 * @method     ChildDefineRiskManagementQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildDefineRiskManagementQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildDefineRiskManagementQuery groupByDateEntered() Group by the date_entered column
 * @method     ChildDefineRiskManagementQuery groupByCategoryArea() Group by the category_area column
 * @method     ChildDefineRiskManagementQuery groupBySpecificRisk() Group by the specific_risk column
 * @method     ChildDefineRiskManagementQuery groupBySeverity() Group by the severity column
 * @method     ChildDefineRiskManagementQuery groupByLikelihood() Group by the likelihood column
 * @method     ChildDefineRiskManagementQuery groupByDetectibility() Group by the detectibility column
 * @method     ChildDefineRiskManagementQuery groupByRiskPriority() Group by the risk_priority column
 * @method     ChildDefineRiskManagementQuery groupByMitigationSteps() Group by the mitigation_steps column
 * @method     ChildDefineRiskManagementQuery groupByPersonAccountable() Group by the person_accountable column
 * @method     ChildDefineRiskManagementQuery groupByDueDate() Group by the due_date column
 * @method     ChildDefineRiskManagementQuery groupByContingencyPlan() Group by the contingency_plan column
 * @method     ChildDefineRiskManagementQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildDefineRiskManagementQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildDefineRiskManagementQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDefineRiskManagementQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDefineRiskManagementQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDefineRiskManagementQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDefineRiskManagementQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDefineRiskManagementQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDefineRiskManagementQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildDefineRiskManagementQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildDefineRiskManagementQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildDefineRiskManagementQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildDefineRiskManagementQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildDefineRiskManagementQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildDefineRiskManagementQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildDefineRiskManagementQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildDefineRiskManagementQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildDefineRiskManagementQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildDefineRiskManagementQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildDefineRiskManagementQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildDefineRiskManagementQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildDefineRiskManagementQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildDefineRiskManagementQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildDefineRiskManagementQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildDefineRiskManagementQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildDefineRiskManagementQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildDefineRiskManagementQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildDefineRiskManagementQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildDefineRiskManagementQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildDefineRiskManagementQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildDefineRiskManagementQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildDefineRiskManagementQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildDefineRiskManagementQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildDefineRiskManagementQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildDefineRiskManagementQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildDefineRiskManagementQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery|\UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDefineRiskManagement findOne(ConnectionInterface $con = null) Return the first ChildDefineRiskManagement matching the query
 * @method     ChildDefineRiskManagement findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDefineRiskManagement matching the query, or a new ChildDefineRiskManagement object populated from the query conditions when no match is found
 *
 * @method     ChildDefineRiskManagement findOneById(int $id) Return the first ChildDefineRiskManagement filtered by the id column
 * @method     ChildDefineRiskManagement findOneByProjectId(int $project_id) Return the first ChildDefineRiskManagement filtered by the project_id column
 * @method     ChildDefineRiskManagement findOneByPhaseId(int $phase_id) Return the first ChildDefineRiskManagement filtered by the phase_id column
 * @method     ChildDefineRiskManagement findOneByPhaseComponentId(int $phase_component_id) Return the first ChildDefineRiskManagement filtered by the phase_component_id column
 * @method     ChildDefineRiskManagement findOneByDateEntered(string $date_entered) Return the first ChildDefineRiskManagement filtered by the date_entered column
 * @method     ChildDefineRiskManagement findOneByCategoryArea(string $category_area) Return the first ChildDefineRiskManagement filtered by the category_area column
 * @method     ChildDefineRiskManagement findOneBySpecificRisk(string $specific_risk) Return the first ChildDefineRiskManagement filtered by the specific_risk column
 * @method     ChildDefineRiskManagement findOneBySeverity(int $severity) Return the first ChildDefineRiskManagement filtered by the severity column
 * @method     ChildDefineRiskManagement findOneByLikelihood(int $likelihood) Return the first ChildDefineRiskManagement filtered by the likelihood column
 * @method     ChildDefineRiskManagement findOneByDetectibility(int $detectibility) Return the first ChildDefineRiskManagement filtered by the detectibility column
 * @method     ChildDefineRiskManagement findOneByRiskPriority(string $risk_priority) Return the first ChildDefineRiskManagement filtered by the risk_priority column
 * @method     ChildDefineRiskManagement findOneByMitigationSteps(string $mitigation_steps) Return the first ChildDefineRiskManagement filtered by the mitigation_steps column
 * @method     ChildDefineRiskManagement findOneByPersonAccountable(int $person_accountable) Return the first ChildDefineRiskManagement filtered by the person_accountable column
 * @method     ChildDefineRiskManagement findOneByDueDate(string $due_date) Return the first ChildDefineRiskManagement filtered by the due_date column
 * @method     ChildDefineRiskManagement findOneByContingencyPlan(string $contingency_plan) Return the first ChildDefineRiskManagement filtered by the contingency_plan column
 * @method     ChildDefineRiskManagement findOneByDateTimeCreated(string $date_time_created) Return the first ChildDefineRiskManagement filtered by the date_time_created column
 * @method     ChildDefineRiskManagement findOneByLastUpdated(string $last_updated) Return the first ChildDefineRiskManagement filtered by the last_updated column *

 * @method     ChildDefineRiskManagement requirePk($key, ConnectionInterface $con = null) Return the ChildDefineRiskManagement by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOne(ConnectionInterface $con = null) Return the first ChildDefineRiskManagement matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDefineRiskManagement requireOneById(int $id) Return the first ChildDefineRiskManagement filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByProjectId(int $project_id) Return the first ChildDefineRiskManagement filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByPhaseId(int $phase_id) Return the first ChildDefineRiskManagement filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildDefineRiskManagement filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByDateEntered(string $date_entered) Return the first ChildDefineRiskManagement filtered by the date_entered column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByCategoryArea(string $category_area) Return the first ChildDefineRiskManagement filtered by the category_area column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneBySpecificRisk(string $specific_risk) Return the first ChildDefineRiskManagement filtered by the specific_risk column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneBySeverity(int $severity) Return the first ChildDefineRiskManagement filtered by the severity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByLikelihood(int $likelihood) Return the first ChildDefineRiskManagement filtered by the likelihood column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByDetectibility(int $detectibility) Return the first ChildDefineRiskManagement filtered by the detectibility column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByRiskPriority(string $risk_priority) Return the first ChildDefineRiskManagement filtered by the risk_priority column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByMitigationSteps(string $mitigation_steps) Return the first ChildDefineRiskManagement filtered by the mitigation_steps column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByPersonAccountable(int $person_accountable) Return the first ChildDefineRiskManagement filtered by the person_accountable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByDueDate(string $due_date) Return the first ChildDefineRiskManagement filtered by the due_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByContingencyPlan(string $contingency_plan) Return the first ChildDefineRiskManagement filtered by the contingency_plan column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByDateTimeCreated(string $date_time_created) Return the first ChildDefineRiskManagement filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineRiskManagement requireOneByLastUpdated(string $last_updated) Return the first ChildDefineRiskManagement filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDefineRiskManagement[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDefineRiskManagement objects based on current ModelCriteria
 * @method     ChildDefineRiskManagement[]|ObjectCollection findById(int $id) Return ChildDefineRiskManagement objects filtered by the id column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByProjectId(int $project_id) Return ChildDefineRiskManagement objects filtered by the project_id column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildDefineRiskManagement objects filtered by the phase_id column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildDefineRiskManagement objects filtered by the phase_component_id column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByDateEntered(string $date_entered) Return ChildDefineRiskManagement objects filtered by the date_entered column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByCategoryArea(string $category_area) Return ChildDefineRiskManagement objects filtered by the category_area column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findBySpecificRisk(string $specific_risk) Return ChildDefineRiskManagement objects filtered by the specific_risk column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findBySeverity(int $severity) Return ChildDefineRiskManagement objects filtered by the severity column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByLikelihood(int $likelihood) Return ChildDefineRiskManagement objects filtered by the likelihood column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByDetectibility(int $detectibility) Return ChildDefineRiskManagement objects filtered by the detectibility column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByRiskPriority(string $risk_priority) Return ChildDefineRiskManagement objects filtered by the risk_priority column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByMitigationSteps(string $mitigation_steps) Return ChildDefineRiskManagement objects filtered by the mitigation_steps column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByPersonAccountable(int $person_accountable) Return ChildDefineRiskManagement objects filtered by the person_accountable column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByDueDate(string $due_date) Return ChildDefineRiskManagement objects filtered by the due_date column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByContingencyPlan(string $contingency_plan) Return ChildDefineRiskManagement objects filtered by the contingency_plan column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildDefineRiskManagement objects filtered by the date_time_created column
 * @method     ChildDefineRiskManagement[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildDefineRiskManagement objects filtered by the last_updated column
 * @method     ChildDefineRiskManagement[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DefineRiskManagementQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DefineRiskManagementQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DefineRiskManagement', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDefineRiskManagementQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDefineRiskManagementQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDefineRiskManagementQuery) {
            return $criteria;
        }
        $query = new ChildDefineRiskManagementQuery();
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
     * @return ChildDefineRiskManagement|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DefineRiskManagementTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DefineRiskManagementTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDefineRiskManagement A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `date_entered`, `category_area`, `specific_risk`, `severity`, `likelihood`, `detectibility`, `risk_priority`, `mitigation_steps`, `person_accountable`, `due_date`, `contingency_plan`, `date_time_created`, `last_updated` FROM `define_risk_management` WHERE `id` = :p0';
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
            /** @var ChildDefineRiskManagement $obj */
            $obj = new ChildDefineRiskManagement();
            $obj->hydrate($row);
            DefineRiskManagementTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDefineRiskManagement|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_ID, $phaseId, $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the date_entered column
     *
     * Example usage:
     * <code>
     * $query->filterByDateEntered('2011-03-14'); // WHERE date_entered = '2011-03-14'
     * $query->filterByDateEntered('now'); // WHERE date_entered = '2011-03-14'
     * $query->filterByDateEntered(array('max' => 'yesterday')); // WHERE date_entered > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateEntered The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByDateEntered($dateEntered = null, $comparison = null)
    {
        if (is_array($dateEntered)) {
            $useMinMax = false;
            if (isset($dateEntered['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_DATE_ENTERED, $dateEntered['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateEntered['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_DATE_ENTERED, $dateEntered['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_DATE_ENTERED, $dateEntered, $comparison);
    }

    /**
     * Filter the query on the category_area column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryArea('fooValue');   // WHERE category_area = 'fooValue'
     * $query->filterByCategoryArea('%fooValue%', Criteria::LIKE); // WHERE category_area LIKE '%fooValue%'
     * </code>
     *
     * @param     string $categoryArea The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByCategoryArea($categoryArea = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($categoryArea)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_CATEGORY_AREA, $categoryArea, $comparison);
    }

    /**
     * Filter the query on the specific_risk column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecificRisk('fooValue');   // WHERE specific_risk = 'fooValue'
     * $query->filterBySpecificRisk('%fooValue%', Criteria::LIKE); // WHERE specific_risk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specificRisk The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterBySpecificRisk($specificRisk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specificRisk)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_SPECIFIC_RISK, $specificRisk, $comparison);
    }

    /**
     * Filter the query on the severity column
     *
     * Example usage:
     * <code>
     * $query->filterBySeverity(1234); // WHERE severity = 1234
     * $query->filterBySeverity(array(12, 34)); // WHERE severity IN (12, 34)
     * $query->filterBySeverity(array('min' => 12)); // WHERE severity > 12
     * </code>
     *
     * @param     mixed $severity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterBySeverity($severity = null, $comparison = null)
    {
        if (is_array($severity)) {
            $useMinMax = false;
            if (isset($severity['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_SEVERITY, $severity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($severity['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_SEVERITY, $severity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_SEVERITY, $severity, $comparison);
    }

    /**
     * Filter the query on the likelihood column
     *
     * Example usage:
     * <code>
     * $query->filterByLikelihood(1234); // WHERE likelihood = 1234
     * $query->filterByLikelihood(array(12, 34)); // WHERE likelihood IN (12, 34)
     * $query->filterByLikelihood(array('min' => 12)); // WHERE likelihood > 12
     * </code>
     *
     * @param     mixed $likelihood The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByLikelihood($likelihood = null, $comparison = null)
    {
        if (is_array($likelihood)) {
            $useMinMax = false;
            if (isset($likelihood['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_LIKELIHOOD, $likelihood['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($likelihood['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_LIKELIHOOD, $likelihood['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_LIKELIHOOD, $likelihood, $comparison);
    }

    /**
     * Filter the query on the detectibility column
     *
     * Example usage:
     * <code>
     * $query->filterByDetectibility(1234); // WHERE detectibility = 1234
     * $query->filterByDetectibility(array(12, 34)); // WHERE detectibility IN (12, 34)
     * $query->filterByDetectibility(array('min' => 12)); // WHERE detectibility > 12
     * </code>
     *
     * @param     mixed $detectibility The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByDetectibility($detectibility = null, $comparison = null)
    {
        if (is_array($detectibility)) {
            $useMinMax = false;
            if (isset($detectibility['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_DETECTIBILITY, $detectibility['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($detectibility['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_DETECTIBILITY, $detectibility['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_DETECTIBILITY, $detectibility, $comparison);
    }

    /**
     * Filter the query on the risk_priority column
     *
     * Example usage:
     * <code>
     * $query->filterByRiskPriority('fooValue');   // WHERE risk_priority = 'fooValue'
     * $query->filterByRiskPriority('%fooValue%', Criteria::LIKE); // WHERE risk_priority LIKE '%fooValue%'
     * </code>
     *
     * @param     string $riskPriority The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByRiskPriority($riskPriority = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($riskPriority)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_RISK_PRIORITY, $riskPriority, $comparison);
    }

    /**
     * Filter the query on the mitigation_steps column
     *
     * Example usage:
     * <code>
     * $query->filterByMitigationSteps('fooValue');   // WHERE mitigation_steps = 'fooValue'
     * $query->filterByMitigationSteps('%fooValue%', Criteria::LIKE); // WHERE mitigation_steps LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mitigationSteps The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByMitigationSteps($mitigationSteps = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mitigationSteps)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_MITIGATION_STEPS, $mitigationSteps, $comparison);
    }

    /**
     * Filter the query on the person_accountable column
     *
     * Example usage:
     * <code>
     * $query->filterByPersonAccountable(1234); // WHERE person_accountable = 1234
     * $query->filterByPersonAccountable(array(12, 34)); // WHERE person_accountable IN (12, 34)
     * $query->filterByPersonAccountable(array('min' => 12)); // WHERE person_accountable > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $personAccountable The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByPersonAccountable($personAccountable = null, $comparison = null)
    {
        if (is_array($personAccountable)) {
            $useMinMax = false;
            if (isset($personAccountable['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_PERSON_ACCOUNTABLE, $personAccountable['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($personAccountable['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_PERSON_ACCOUNTABLE, $personAccountable['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_PERSON_ACCOUNTABLE, $personAccountable, $comparison);
    }

    /**
     * Filter the query on the due_date column
     *
     * Example usage:
     * <code>
     * $query->filterByDueDate('2011-03-14'); // WHERE due_date = '2011-03-14'
     * $query->filterByDueDate('now'); // WHERE due_date = '2011-03-14'
     * $query->filterByDueDate(array('max' => 'yesterday')); // WHERE due_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $dueDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByDueDate($dueDate = null, $comparison = null)
    {
        if (is_array($dueDate)) {
            $useMinMax = false;
            if (isset($dueDate['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_DUE_DATE, $dueDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dueDate['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_DUE_DATE, $dueDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_DUE_DATE, $dueDate, $comparison);
    }

    /**
     * Filter the query on the contingency_plan column
     *
     * Example usage:
     * <code>
     * $query->filterByContingencyPlan('fooValue');   // WHERE contingency_plan = 'fooValue'
     * $query->filterByContingencyPlan('%fooValue%', Criteria::LIKE); // WHERE contingency_plan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contingencyPlan The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByContingencyPlan($contingencyPlan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contingencyPlan)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_CONTINGENCY_PLAN, $contingencyPlan, $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(DefineRiskManagementTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineRiskManagementTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(DefineRiskManagementTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineRiskManagementTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
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
     * @return ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
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
     * @return ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineRiskManagementTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
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
     * @return ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(DefineRiskManagementTableMap::COL_PERSON_ACCOUNTABLE, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineRiskManagementTableMap::COL_PERSON_ACCOUNTABLE, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
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
     * @param   ChildDefineRiskManagement $defineRiskManagement Object to remove from the list of results
     *
     * @return $this|ChildDefineRiskManagementQuery The current query, for fluid interface
     */
    public function prune($defineRiskManagement = null)
    {
        if ($defineRiskManagement) {
            $this->addUsingAlias(DefineRiskManagementTableMap::COL_ID, $defineRiskManagement->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the define_risk_management table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DefineRiskManagementTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DefineRiskManagementTableMap::clearInstancePool();
            DefineRiskManagementTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DefineRiskManagementTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DefineRiskManagementTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DefineRiskManagementTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DefineRiskManagementTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DefineRiskManagementQuery
