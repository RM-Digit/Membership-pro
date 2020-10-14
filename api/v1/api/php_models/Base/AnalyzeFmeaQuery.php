<?php

namespace Base;

use \AnalyzeFmea as ChildAnalyzeFmea;
use \AnalyzeFmeaQuery as ChildAnalyzeFmeaQuery;
use \Exception;
use \PDO;
use Map\AnalyzeFmeaTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'analyze_fmea' table.
 *
 *
 *
 * @method     ChildAnalyzeFmeaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAnalyzeFmeaQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildAnalyzeFmeaQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildAnalyzeFmeaQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildAnalyzeFmeaQuery orderByInput($order = Criteria::ASC) Order by the input column
 * @method     ChildAnalyzeFmeaQuery orderByFailureMode($order = Criteria::ASC) Order by the failure_mode column
 * @method     ChildAnalyzeFmeaQuery orderByFailureEffects($order = Criteria::ASC) Order by the failure_effects column
 * @method     ChildAnalyzeFmeaQuery orderBySeverity($order = Criteria::ASC) Order by the severity column
 * @method     ChildAnalyzeFmeaQuery orderByCauses($order = Criteria::ASC) Order by the causes column
 * @method     ChildAnalyzeFmeaQuery orderByLikelihood($order = Criteria::ASC) Order by the likelihood column
 * @method     ChildAnalyzeFmeaQuery orderByCurrentControls($order = Criteria::ASC) Order by the current_controls column
 * @method     ChildAnalyzeFmeaQuery orderByDetection($order = Criteria::ASC) Order by the detection column
 * @method     ChildAnalyzeFmeaQuery orderByRpn($order = Criteria::ASC) Order by the rpn column
 * @method     ChildAnalyzeFmeaQuery orderByActionsRecommended($order = Criteria::ASC) Order by the actions_recommended column
 * @method     ChildAnalyzeFmeaQuery orderByResp($order = Criteria::ASC) Order by the resp column
 * @method     ChildAnalyzeFmeaQuery orderByActionsTaken($order = Criteria::ASC) Order by the actions_taken column
 * @method     ChildAnalyzeFmeaQuery orderByActionPlanSeverity($order = Criteria::ASC) Order by the action_plan_severity column
 * @method     ChildAnalyzeFmeaQuery orderByActionPlanLikelihood($order = Criteria::ASC) Order by the action_plan_likelihood column
 * @method     ChildAnalyzeFmeaQuery orderByActionPlanDetection($order = Criteria::ASC) Order by the action_plan_detection column
 * @method     ChildAnalyzeFmeaQuery orderByActionPlanRpn($order = Criteria::ASC) Order by the action_plan_rpn column
 * @method     ChildAnalyzeFmeaQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildAnalyzeFmeaQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildAnalyzeFmeaQuery groupById() Group by the id column
 * @method     ChildAnalyzeFmeaQuery groupByProjectId() Group by the project_id column
 * @method     ChildAnalyzeFmeaQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildAnalyzeFmeaQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildAnalyzeFmeaQuery groupByInput() Group by the input column
 * @method     ChildAnalyzeFmeaQuery groupByFailureMode() Group by the failure_mode column
 * @method     ChildAnalyzeFmeaQuery groupByFailureEffects() Group by the failure_effects column
 * @method     ChildAnalyzeFmeaQuery groupBySeverity() Group by the severity column
 * @method     ChildAnalyzeFmeaQuery groupByCauses() Group by the causes column
 * @method     ChildAnalyzeFmeaQuery groupByLikelihood() Group by the likelihood column
 * @method     ChildAnalyzeFmeaQuery groupByCurrentControls() Group by the current_controls column
 * @method     ChildAnalyzeFmeaQuery groupByDetection() Group by the detection column
 * @method     ChildAnalyzeFmeaQuery groupByRpn() Group by the rpn column
 * @method     ChildAnalyzeFmeaQuery groupByActionsRecommended() Group by the actions_recommended column
 * @method     ChildAnalyzeFmeaQuery groupByResp() Group by the resp column
 * @method     ChildAnalyzeFmeaQuery groupByActionsTaken() Group by the actions_taken column
 * @method     ChildAnalyzeFmeaQuery groupByActionPlanSeverity() Group by the action_plan_severity column
 * @method     ChildAnalyzeFmeaQuery groupByActionPlanLikelihood() Group by the action_plan_likelihood column
 * @method     ChildAnalyzeFmeaQuery groupByActionPlanDetection() Group by the action_plan_detection column
 * @method     ChildAnalyzeFmeaQuery groupByActionPlanRpn() Group by the action_plan_rpn column
 * @method     ChildAnalyzeFmeaQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildAnalyzeFmeaQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildAnalyzeFmeaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAnalyzeFmeaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAnalyzeFmeaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAnalyzeFmeaQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAnalyzeFmeaQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAnalyzeFmeaQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAnalyzeFmeaQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildAnalyzeFmeaQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildAnalyzeFmeaQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildAnalyzeFmeaQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildAnalyzeFmeaQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildAnalyzeFmeaQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildAnalyzeFmeaQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildAnalyzeFmeaQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildAnalyzeFmeaQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildAnalyzeFmeaQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildAnalyzeFmeaQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildAnalyzeFmeaQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildAnalyzeFmeaQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildAnalyzeFmeaQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildAnalyzeFmeaQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildAnalyzeFmeaQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildAnalyzeFmeaQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildAnalyzeFmeaQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildAnalyzeFmeaQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildAnalyzeFmeaQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildAnalyzeFmeaQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAnalyzeFmea findOne(ConnectionInterface $con = null) Return the first ChildAnalyzeFmea matching the query
 * @method     ChildAnalyzeFmea findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAnalyzeFmea matching the query, or a new ChildAnalyzeFmea object populated from the query conditions when no match is found
 *
 * @method     ChildAnalyzeFmea findOneById(int $id) Return the first ChildAnalyzeFmea filtered by the id column
 * @method     ChildAnalyzeFmea findOneByProjectId(int $project_id) Return the first ChildAnalyzeFmea filtered by the project_id column
 * @method     ChildAnalyzeFmea findOneByPhaseId(int $phase_id) Return the first ChildAnalyzeFmea filtered by the phase_id column
 * @method     ChildAnalyzeFmea findOneByPhaseComponentId(int $phase_component_id) Return the first ChildAnalyzeFmea filtered by the phase_component_id column
 * @method     ChildAnalyzeFmea findOneByInput(string $input) Return the first ChildAnalyzeFmea filtered by the input column
 * @method     ChildAnalyzeFmea findOneByFailureMode(string $failure_mode) Return the first ChildAnalyzeFmea filtered by the failure_mode column
 * @method     ChildAnalyzeFmea findOneByFailureEffects(string $failure_effects) Return the first ChildAnalyzeFmea filtered by the failure_effects column
 * @method     ChildAnalyzeFmea findOneBySeverity(string $severity) Return the first ChildAnalyzeFmea filtered by the severity column
 * @method     ChildAnalyzeFmea findOneByCauses(string $causes) Return the first ChildAnalyzeFmea filtered by the causes column
 * @method     ChildAnalyzeFmea findOneByLikelihood(string $likelihood) Return the first ChildAnalyzeFmea filtered by the likelihood column
 * @method     ChildAnalyzeFmea findOneByCurrentControls(string $current_controls) Return the first ChildAnalyzeFmea filtered by the current_controls column
 * @method     ChildAnalyzeFmea findOneByDetection(string $detection) Return the first ChildAnalyzeFmea filtered by the detection column
 * @method     ChildAnalyzeFmea findOneByRpn(string $rpn) Return the first ChildAnalyzeFmea filtered by the rpn column
 * @method     ChildAnalyzeFmea findOneByActionsRecommended(string $actions_recommended) Return the first ChildAnalyzeFmea filtered by the actions_recommended column
 * @method     ChildAnalyzeFmea findOneByResp(string $resp) Return the first ChildAnalyzeFmea filtered by the resp column
 * @method     ChildAnalyzeFmea findOneByActionsTaken(string $actions_taken) Return the first ChildAnalyzeFmea filtered by the actions_taken column
 * @method     ChildAnalyzeFmea findOneByActionPlanSeverity(string $action_plan_severity) Return the first ChildAnalyzeFmea filtered by the action_plan_severity column
 * @method     ChildAnalyzeFmea findOneByActionPlanLikelihood(string $action_plan_likelihood) Return the first ChildAnalyzeFmea filtered by the action_plan_likelihood column
 * @method     ChildAnalyzeFmea findOneByActionPlanDetection(string $action_plan_detection) Return the first ChildAnalyzeFmea filtered by the action_plan_detection column
 * @method     ChildAnalyzeFmea findOneByActionPlanRpn(string $action_plan_rpn) Return the first ChildAnalyzeFmea filtered by the action_plan_rpn column
 * @method     ChildAnalyzeFmea findOneByDateTimeCreated(string $date_time_created) Return the first ChildAnalyzeFmea filtered by the date_time_created column
 * @method     ChildAnalyzeFmea findOneByLastUpdated(string $last_updated) Return the first ChildAnalyzeFmea filtered by the last_updated column *

 * @method     ChildAnalyzeFmea requirePk($key, ConnectionInterface $con = null) Return the ChildAnalyzeFmea by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOne(ConnectionInterface $con = null) Return the first ChildAnalyzeFmea matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnalyzeFmea requireOneById(int $id) Return the first ChildAnalyzeFmea filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByProjectId(int $project_id) Return the first ChildAnalyzeFmea filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByPhaseId(int $phase_id) Return the first ChildAnalyzeFmea filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildAnalyzeFmea filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByInput(string $input) Return the first ChildAnalyzeFmea filtered by the input column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByFailureMode(string $failure_mode) Return the first ChildAnalyzeFmea filtered by the failure_mode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByFailureEffects(string $failure_effects) Return the first ChildAnalyzeFmea filtered by the failure_effects column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneBySeverity(string $severity) Return the first ChildAnalyzeFmea filtered by the severity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByCauses(string $causes) Return the first ChildAnalyzeFmea filtered by the causes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByLikelihood(string $likelihood) Return the first ChildAnalyzeFmea filtered by the likelihood column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByCurrentControls(string $current_controls) Return the first ChildAnalyzeFmea filtered by the current_controls column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByDetection(string $detection) Return the first ChildAnalyzeFmea filtered by the detection column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByRpn(string $rpn) Return the first ChildAnalyzeFmea filtered by the rpn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByActionsRecommended(string $actions_recommended) Return the first ChildAnalyzeFmea filtered by the actions_recommended column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByResp(string $resp) Return the first ChildAnalyzeFmea filtered by the resp column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByActionsTaken(string $actions_taken) Return the first ChildAnalyzeFmea filtered by the actions_taken column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByActionPlanSeverity(string $action_plan_severity) Return the first ChildAnalyzeFmea filtered by the action_plan_severity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByActionPlanLikelihood(string $action_plan_likelihood) Return the first ChildAnalyzeFmea filtered by the action_plan_likelihood column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByActionPlanDetection(string $action_plan_detection) Return the first ChildAnalyzeFmea filtered by the action_plan_detection column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByActionPlanRpn(string $action_plan_rpn) Return the first ChildAnalyzeFmea filtered by the action_plan_rpn column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByDateTimeCreated(string $date_time_created) Return the first ChildAnalyzeFmea filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeFmea requireOneByLastUpdated(string $last_updated) Return the first ChildAnalyzeFmea filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnalyzeFmea[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAnalyzeFmea objects based on current ModelCriteria
 * @method     ChildAnalyzeFmea[]|ObjectCollection findById(int $id) Return ChildAnalyzeFmea objects filtered by the id column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByProjectId(int $project_id) Return ChildAnalyzeFmea objects filtered by the project_id column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildAnalyzeFmea objects filtered by the phase_id column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildAnalyzeFmea objects filtered by the phase_component_id column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByInput(string $input) Return ChildAnalyzeFmea objects filtered by the input column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByFailureMode(string $failure_mode) Return ChildAnalyzeFmea objects filtered by the failure_mode column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByFailureEffects(string $failure_effects) Return ChildAnalyzeFmea objects filtered by the failure_effects column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findBySeverity(string $severity) Return ChildAnalyzeFmea objects filtered by the severity column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByCauses(string $causes) Return ChildAnalyzeFmea objects filtered by the causes column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByLikelihood(string $likelihood) Return ChildAnalyzeFmea objects filtered by the likelihood column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByCurrentControls(string $current_controls) Return ChildAnalyzeFmea objects filtered by the current_controls column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByDetection(string $detection) Return ChildAnalyzeFmea objects filtered by the detection column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByRpn(string $rpn) Return ChildAnalyzeFmea objects filtered by the rpn column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByActionsRecommended(string $actions_recommended) Return ChildAnalyzeFmea objects filtered by the actions_recommended column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByResp(string $resp) Return ChildAnalyzeFmea objects filtered by the resp column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByActionsTaken(string $actions_taken) Return ChildAnalyzeFmea objects filtered by the actions_taken column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByActionPlanSeverity(string $action_plan_severity) Return ChildAnalyzeFmea objects filtered by the action_plan_severity column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByActionPlanLikelihood(string $action_plan_likelihood) Return ChildAnalyzeFmea objects filtered by the action_plan_likelihood column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByActionPlanDetection(string $action_plan_detection) Return ChildAnalyzeFmea objects filtered by the action_plan_detection column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByActionPlanRpn(string $action_plan_rpn) Return ChildAnalyzeFmea objects filtered by the action_plan_rpn column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildAnalyzeFmea objects filtered by the date_time_created column
 * @method     ChildAnalyzeFmea[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildAnalyzeFmea objects filtered by the last_updated column
 * @method     ChildAnalyzeFmea[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AnalyzeFmeaQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AnalyzeFmeaQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AnalyzeFmea', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAnalyzeFmeaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAnalyzeFmeaQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAnalyzeFmeaQuery) {
            return $criteria;
        }
        $query = new ChildAnalyzeFmeaQuery();
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
     * @return ChildAnalyzeFmea|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AnalyzeFmeaTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AnalyzeFmeaTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAnalyzeFmea A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `input`, `failure_mode`, `failure_effects`, `severity`, `causes`, `likelihood`, `current_controls`, `detection`, `rpn`, `actions_recommended`, `resp`, `actions_taken`, `action_plan_severity`, `action_plan_likelihood`, `action_plan_detection`, `action_plan_rpn`, `date_time_created`, `last_updated` FROM `analyze_fmea` WHERE `id` = :p0';
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
            /** @var ChildAnalyzeFmea $obj */
            $obj = new ChildAnalyzeFmea();
            $obj->hydrate($row);
            AnalyzeFmeaTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAnalyzeFmea|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_ID, $phaseId, $comparison);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the input column
     *
     * Example usage:
     * <code>
     * $query->filterByInput('fooValue');   // WHERE input = 'fooValue'
     * $query->filterByInput('%fooValue%', Criteria::LIKE); // WHERE input LIKE '%fooValue%'
     * </code>
     *
     * @param     string $input The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByInput($input = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($input)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_INPUT, $input, $comparison);
    }

    /**
     * Filter the query on the failure_mode column
     *
     * Example usage:
     * <code>
     * $query->filterByFailureMode('fooValue');   // WHERE failure_mode = 'fooValue'
     * $query->filterByFailureMode('%fooValue%', Criteria::LIKE); // WHERE failure_mode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $failureMode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByFailureMode($failureMode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($failureMode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_FAILURE_MODE, $failureMode, $comparison);
    }

    /**
     * Filter the query on the failure_effects column
     *
     * Example usage:
     * <code>
     * $query->filterByFailureEffects('fooValue');   // WHERE failure_effects = 'fooValue'
     * $query->filterByFailureEffects('%fooValue%', Criteria::LIKE); // WHERE failure_effects LIKE '%fooValue%'
     * </code>
     *
     * @param     string $failureEffects The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByFailureEffects($failureEffects = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($failureEffects)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_FAILURE_EFFECTS, $failureEffects, $comparison);
    }

    /**
     * Filter the query on the severity column
     *
     * Example usage:
     * <code>
     * $query->filterBySeverity('fooValue');   // WHERE severity = 'fooValue'
     * $query->filterBySeverity('%fooValue%', Criteria::LIKE); // WHERE severity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $severity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterBySeverity($severity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($severity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_SEVERITY, $severity, $comparison);
    }

    /**
     * Filter the query on the causes column
     *
     * Example usage:
     * <code>
     * $query->filterByCauses('fooValue');   // WHERE causes = 'fooValue'
     * $query->filterByCauses('%fooValue%', Criteria::LIKE); // WHERE causes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $causes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByCauses($causes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($causes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_CAUSES, $causes, $comparison);
    }

    /**
     * Filter the query on the likelihood column
     *
     * Example usage:
     * <code>
     * $query->filterByLikelihood('fooValue');   // WHERE likelihood = 'fooValue'
     * $query->filterByLikelihood('%fooValue%', Criteria::LIKE); // WHERE likelihood LIKE '%fooValue%'
     * </code>
     *
     * @param     string $likelihood The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByLikelihood($likelihood = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($likelihood)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_LIKELIHOOD, $likelihood, $comparison);
    }

    /**
     * Filter the query on the current_controls column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrentControls('fooValue');   // WHERE current_controls = 'fooValue'
     * $query->filterByCurrentControls('%fooValue%', Criteria::LIKE); // WHERE current_controls LIKE '%fooValue%'
     * </code>
     *
     * @param     string $currentControls The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByCurrentControls($currentControls = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($currentControls)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_CURRENT_CONTROLS, $currentControls, $comparison);
    }

    /**
     * Filter the query on the detection column
     *
     * Example usage:
     * <code>
     * $query->filterByDetection('fooValue');   // WHERE detection = 'fooValue'
     * $query->filterByDetection('%fooValue%', Criteria::LIKE); // WHERE detection LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detection The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByDetection($detection = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detection)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_DETECTION, $detection, $comparison);
    }

    /**
     * Filter the query on the rpn column
     *
     * Example usage:
     * <code>
     * $query->filterByRpn('fooValue');   // WHERE rpn = 'fooValue'
     * $query->filterByRpn('%fooValue%', Criteria::LIKE); // WHERE rpn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rpn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByRpn($rpn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rpn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_RPN, $rpn, $comparison);
    }

    /**
     * Filter the query on the actions_recommended column
     *
     * Example usage:
     * <code>
     * $query->filterByActionsRecommended('fooValue');   // WHERE actions_recommended = 'fooValue'
     * $query->filterByActionsRecommended('%fooValue%', Criteria::LIKE); // WHERE actions_recommended LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionsRecommended The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByActionsRecommended($actionsRecommended = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionsRecommended)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ACTIONS_RECOMMENDED, $actionsRecommended, $comparison);
    }

    /**
     * Filter the query on the resp column
     *
     * Example usage:
     * <code>
     * $query->filterByResp('fooValue');   // WHERE resp = 'fooValue'
     * $query->filterByResp('%fooValue%', Criteria::LIKE); // WHERE resp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $resp The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByResp($resp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($resp)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_RESP, $resp, $comparison);
    }

    /**
     * Filter the query on the actions_taken column
     *
     * Example usage:
     * <code>
     * $query->filterByActionsTaken('fooValue');   // WHERE actions_taken = 'fooValue'
     * $query->filterByActionsTaken('%fooValue%', Criteria::LIKE); // WHERE actions_taken LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionsTaken The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByActionsTaken($actionsTaken = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionsTaken)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ACTIONS_TAKEN, $actionsTaken, $comparison);
    }

    /**
     * Filter the query on the action_plan_severity column
     *
     * Example usage:
     * <code>
     * $query->filterByActionPlanSeverity('fooValue');   // WHERE action_plan_severity = 'fooValue'
     * $query->filterByActionPlanSeverity('%fooValue%', Criteria::LIKE); // WHERE action_plan_severity LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionPlanSeverity The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByActionPlanSeverity($actionPlanSeverity = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionPlanSeverity)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ACTION_PLAN_SEVERITY, $actionPlanSeverity, $comparison);
    }

    /**
     * Filter the query on the action_plan_likelihood column
     *
     * Example usage:
     * <code>
     * $query->filterByActionPlanLikelihood('fooValue');   // WHERE action_plan_likelihood = 'fooValue'
     * $query->filterByActionPlanLikelihood('%fooValue%', Criteria::LIKE); // WHERE action_plan_likelihood LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionPlanLikelihood The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByActionPlanLikelihood($actionPlanLikelihood = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionPlanLikelihood)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ACTION_PLAN_LIKELIHOOD, $actionPlanLikelihood, $comparison);
    }

    /**
     * Filter the query on the action_plan_detection column
     *
     * Example usage:
     * <code>
     * $query->filterByActionPlanDetection('fooValue');   // WHERE action_plan_detection = 'fooValue'
     * $query->filterByActionPlanDetection('%fooValue%', Criteria::LIKE); // WHERE action_plan_detection LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionPlanDetection The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByActionPlanDetection($actionPlanDetection = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionPlanDetection)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ACTION_PLAN_DETECTION, $actionPlanDetection, $comparison);
    }

    /**
     * Filter the query on the action_plan_rpn column
     *
     * Example usage:
     * <code>
     * $query->filterByActionPlanRpn('fooValue');   // WHERE action_plan_rpn = 'fooValue'
     * $query->filterByActionPlanRpn('%fooValue%', Criteria::LIKE); // WHERE action_plan_rpn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $actionPlanRpn The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByActionPlanRpn($actionPlanRpn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($actionPlanRpn)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ACTION_PLAN_RPN, $actionPlanRpn, $comparison);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(AnalyzeFmeaTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeFmeaTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(AnalyzeFmeaTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyzeFmeaTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
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
     * @return ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
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
     * @return ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyzeFmeaTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildAnalyzeFmea $analyzeFmea Object to remove from the list of results
     *
     * @return $this|ChildAnalyzeFmeaQuery The current query, for fluid interface
     */
    public function prune($analyzeFmea = null)
    {
        if ($analyzeFmea) {
            $this->addUsingAlias(AnalyzeFmeaTableMap::COL_ID, $analyzeFmea->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the analyze_fmea table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeFmeaTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AnalyzeFmeaTableMap::clearInstancePool();
            AnalyzeFmeaTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeFmeaTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AnalyzeFmeaTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AnalyzeFmeaTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AnalyzeFmeaTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AnalyzeFmeaQuery
