<?php

namespace Base;

use \ControlControlPlan as ChildControlControlPlan;
use \ControlControlPlanQuery as ChildControlControlPlanQuery;
use \Exception;
use \PDO;
use Map\ControlControlPlanTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'control_control_plan' table.
 *
 *
 *
 * @method     ChildControlControlPlanQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildControlControlPlanQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildControlControlPlanQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildControlControlPlanQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildControlControlPlanQuery orderByProcessSteps($order = Criteria::ASC) Order by the process_steps column
 * @method     ChildControlControlPlanQuery orderByCtq($order = Criteria::ASC) Order by the ctq column
 * @method     ChildControlControlPlanQuery orderBySpecificationCharacteristic($order = Criteria::ASC) Order by the specification_characteristic column
 * @method     ChildControlControlPlanQuery orderByLsl($order = Criteria::ASC) Order by the lsl column
 * @method     ChildControlControlPlanQuery orderByUsl($order = Criteria::ASC) Order by the usl column
 * @method     ChildControlControlPlanQuery orderByUnitOfMeasure($order = Criteria::ASC) Order by the unit_of_measure column
 * @method     ChildControlControlPlanQuery orderByDataDescription($order = Criteria::ASC) Order by the data_description column
 * @method     ChildControlControlPlanQuery orderByMeasurementMethod($order = Criteria::ASC) Order by the measurement_method column
 * @method     ChildControlControlPlanQuery orderBySampleSize($order = Criteria::ASC) Order by the sample_size column
 * @method     ChildControlControlPlanQuery orderByMeasurementFrequency($order = Criteria::ASC) Order by the measurement_frequency column
 * @method     ChildControlControlPlanQuery orderByWhoMeasures($order = Criteria::ASC) Order by the who_measures column
 * @method     ChildControlControlPlanQuery orderByWhereRecorded($order = Criteria::ASC) Order by the where_recorded column
 * @method     ChildControlControlPlanQuery orderByCorrectiveAction($order = Criteria::ASC) Order by the corrective_action column
 * @method     ChildControlControlPlanQuery orderByApplicableSop($order = Criteria::ASC) Order by the applicable_sop column
 * @method     ChildControlControlPlanQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildControlControlPlanQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildControlControlPlanQuery groupById() Group by the id column
 * @method     ChildControlControlPlanQuery groupByProjectId() Group by the project_id column
 * @method     ChildControlControlPlanQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildControlControlPlanQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildControlControlPlanQuery groupByProcessSteps() Group by the process_steps column
 * @method     ChildControlControlPlanQuery groupByCtq() Group by the ctq column
 * @method     ChildControlControlPlanQuery groupBySpecificationCharacteristic() Group by the specification_characteristic column
 * @method     ChildControlControlPlanQuery groupByLsl() Group by the lsl column
 * @method     ChildControlControlPlanQuery groupByUsl() Group by the usl column
 * @method     ChildControlControlPlanQuery groupByUnitOfMeasure() Group by the unit_of_measure column
 * @method     ChildControlControlPlanQuery groupByDataDescription() Group by the data_description column
 * @method     ChildControlControlPlanQuery groupByMeasurementMethod() Group by the measurement_method column
 * @method     ChildControlControlPlanQuery groupBySampleSize() Group by the sample_size column
 * @method     ChildControlControlPlanQuery groupByMeasurementFrequency() Group by the measurement_frequency column
 * @method     ChildControlControlPlanQuery groupByWhoMeasures() Group by the who_measures column
 * @method     ChildControlControlPlanQuery groupByWhereRecorded() Group by the where_recorded column
 * @method     ChildControlControlPlanQuery groupByCorrectiveAction() Group by the corrective_action column
 * @method     ChildControlControlPlanQuery groupByApplicableSop() Group by the applicable_sop column
 * @method     ChildControlControlPlanQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildControlControlPlanQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildControlControlPlanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildControlControlPlanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildControlControlPlanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildControlControlPlanQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildControlControlPlanQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildControlControlPlanQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildControlControlPlanQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildControlControlPlanQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildControlControlPlanQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildControlControlPlanQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildControlControlPlanQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildControlControlPlanQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildControlControlPlanQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildControlControlPlanQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildControlControlPlanQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildControlControlPlanQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildControlControlPlanQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildControlControlPlanQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildControlControlPlanQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildControlControlPlanQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildControlControlPlanQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildControlControlPlanQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildControlControlPlanQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildControlControlPlanQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildControlControlPlanQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildControlControlPlanQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildControlControlPlanQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildControlControlPlanQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildControlControlPlanQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildControlControlPlanQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildControlControlPlanQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildControlControlPlanQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildControlControlPlanQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildControlControlPlanQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery|\UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildControlControlPlan findOne(ConnectionInterface $con = null) Return the first ChildControlControlPlan matching the query
 * @method     ChildControlControlPlan findOneOrCreate(ConnectionInterface $con = null) Return the first ChildControlControlPlan matching the query, or a new ChildControlControlPlan object populated from the query conditions when no match is found
 *
 * @method     ChildControlControlPlan findOneById(int $id) Return the first ChildControlControlPlan filtered by the id column
 * @method     ChildControlControlPlan findOneByProjectId(int $project_id) Return the first ChildControlControlPlan filtered by the project_id column
 * @method     ChildControlControlPlan findOneByPhaseId(int $phase_id) Return the first ChildControlControlPlan filtered by the phase_id column
 * @method     ChildControlControlPlan findOneByPhaseComponentId(int $phase_component_id) Return the first ChildControlControlPlan filtered by the phase_component_id column
 * @method     ChildControlControlPlan findOneByProcessSteps(string $process_steps) Return the first ChildControlControlPlan filtered by the process_steps column
 * @method     ChildControlControlPlan findOneByCtq(string $ctq) Return the first ChildControlControlPlan filtered by the ctq column
 * @method     ChildControlControlPlan findOneBySpecificationCharacteristic(string $specification_characteristic) Return the first ChildControlControlPlan filtered by the specification_characteristic column
 * @method     ChildControlControlPlan findOneByLsl(string $lsl) Return the first ChildControlControlPlan filtered by the lsl column
 * @method     ChildControlControlPlan findOneByUsl(string $usl) Return the first ChildControlControlPlan filtered by the usl column
 * @method     ChildControlControlPlan findOneByUnitOfMeasure(string $unit_of_measure) Return the first ChildControlControlPlan filtered by the unit_of_measure column
 * @method     ChildControlControlPlan findOneByDataDescription(string $data_description) Return the first ChildControlControlPlan filtered by the data_description column
 * @method     ChildControlControlPlan findOneByMeasurementMethod(string $measurement_method) Return the first ChildControlControlPlan filtered by the measurement_method column
 * @method     ChildControlControlPlan findOneBySampleSize(int $sample_size) Return the first ChildControlControlPlan filtered by the sample_size column
 * @method     ChildControlControlPlan findOneByMeasurementFrequency(string $measurement_frequency) Return the first ChildControlControlPlan filtered by the measurement_frequency column
 * @method     ChildControlControlPlan findOneByWhoMeasures(int $who_measures) Return the first ChildControlControlPlan filtered by the who_measures column
 * @method     ChildControlControlPlan findOneByWhereRecorded(string $where_recorded) Return the first ChildControlControlPlan filtered by the where_recorded column
 * @method     ChildControlControlPlan findOneByCorrectiveAction(string $corrective_action) Return the first ChildControlControlPlan filtered by the corrective_action column
 * @method     ChildControlControlPlan findOneByApplicableSop(string $applicable_sop) Return the first ChildControlControlPlan filtered by the applicable_sop column
 * @method     ChildControlControlPlan findOneByDateTimeCreated(string $date_time_created) Return the first ChildControlControlPlan filtered by the date_time_created column
 * @method     ChildControlControlPlan findOneByLastUpdated(string $last_updated) Return the first ChildControlControlPlan filtered by the last_updated column *

 * @method     ChildControlControlPlan requirePk($key, ConnectionInterface $con = null) Return the ChildControlControlPlan by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOne(ConnectionInterface $con = null) Return the first ChildControlControlPlan matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildControlControlPlan requireOneById(int $id) Return the first ChildControlControlPlan filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByProjectId(int $project_id) Return the first ChildControlControlPlan filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByPhaseId(int $phase_id) Return the first ChildControlControlPlan filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildControlControlPlan filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByProcessSteps(string $process_steps) Return the first ChildControlControlPlan filtered by the process_steps column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByCtq(string $ctq) Return the first ChildControlControlPlan filtered by the ctq column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneBySpecificationCharacteristic(string $specification_characteristic) Return the first ChildControlControlPlan filtered by the specification_characteristic column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByLsl(string $lsl) Return the first ChildControlControlPlan filtered by the lsl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByUsl(string $usl) Return the first ChildControlControlPlan filtered by the usl column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByUnitOfMeasure(string $unit_of_measure) Return the first ChildControlControlPlan filtered by the unit_of_measure column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByDataDescription(string $data_description) Return the first ChildControlControlPlan filtered by the data_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByMeasurementMethod(string $measurement_method) Return the first ChildControlControlPlan filtered by the measurement_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneBySampleSize(int $sample_size) Return the first ChildControlControlPlan filtered by the sample_size column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByMeasurementFrequency(string $measurement_frequency) Return the first ChildControlControlPlan filtered by the measurement_frequency column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByWhoMeasures(int $who_measures) Return the first ChildControlControlPlan filtered by the who_measures column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByWhereRecorded(string $where_recorded) Return the first ChildControlControlPlan filtered by the where_recorded column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByCorrectiveAction(string $corrective_action) Return the first ChildControlControlPlan filtered by the corrective_action column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByApplicableSop(string $applicable_sop) Return the first ChildControlControlPlan filtered by the applicable_sop column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByDateTimeCreated(string $date_time_created) Return the first ChildControlControlPlan filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildControlControlPlan requireOneByLastUpdated(string $last_updated) Return the first ChildControlControlPlan filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildControlControlPlan[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildControlControlPlan objects based on current ModelCriteria
 * @method     ChildControlControlPlan[]|ObjectCollection findById(int $id) Return ChildControlControlPlan objects filtered by the id column
 * @method     ChildControlControlPlan[]|ObjectCollection findByProjectId(int $project_id) Return ChildControlControlPlan objects filtered by the project_id column
 * @method     ChildControlControlPlan[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildControlControlPlan objects filtered by the phase_id column
 * @method     ChildControlControlPlan[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildControlControlPlan objects filtered by the phase_component_id column
 * @method     ChildControlControlPlan[]|ObjectCollection findByProcessSteps(string $process_steps) Return ChildControlControlPlan objects filtered by the process_steps column
 * @method     ChildControlControlPlan[]|ObjectCollection findByCtq(string $ctq) Return ChildControlControlPlan objects filtered by the ctq column
 * @method     ChildControlControlPlan[]|ObjectCollection findBySpecificationCharacteristic(string $specification_characteristic) Return ChildControlControlPlan objects filtered by the specification_characteristic column
 * @method     ChildControlControlPlan[]|ObjectCollection findByLsl(string $lsl) Return ChildControlControlPlan objects filtered by the lsl column
 * @method     ChildControlControlPlan[]|ObjectCollection findByUsl(string $usl) Return ChildControlControlPlan objects filtered by the usl column
 * @method     ChildControlControlPlan[]|ObjectCollection findByUnitOfMeasure(string $unit_of_measure) Return ChildControlControlPlan objects filtered by the unit_of_measure column
 * @method     ChildControlControlPlan[]|ObjectCollection findByDataDescription(string $data_description) Return ChildControlControlPlan objects filtered by the data_description column
 * @method     ChildControlControlPlan[]|ObjectCollection findByMeasurementMethod(string $measurement_method) Return ChildControlControlPlan objects filtered by the measurement_method column
 * @method     ChildControlControlPlan[]|ObjectCollection findBySampleSize(int $sample_size) Return ChildControlControlPlan objects filtered by the sample_size column
 * @method     ChildControlControlPlan[]|ObjectCollection findByMeasurementFrequency(string $measurement_frequency) Return ChildControlControlPlan objects filtered by the measurement_frequency column
 * @method     ChildControlControlPlan[]|ObjectCollection findByWhoMeasures(int $who_measures) Return ChildControlControlPlan objects filtered by the who_measures column
 * @method     ChildControlControlPlan[]|ObjectCollection findByWhereRecorded(string $where_recorded) Return ChildControlControlPlan objects filtered by the where_recorded column
 * @method     ChildControlControlPlan[]|ObjectCollection findByCorrectiveAction(string $corrective_action) Return ChildControlControlPlan objects filtered by the corrective_action column
 * @method     ChildControlControlPlan[]|ObjectCollection findByApplicableSop(string $applicable_sop) Return ChildControlControlPlan objects filtered by the applicable_sop column
 * @method     ChildControlControlPlan[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildControlControlPlan objects filtered by the date_time_created column
 * @method     ChildControlControlPlan[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildControlControlPlan objects filtered by the last_updated column
 * @method     ChildControlControlPlan[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ControlControlPlanQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ControlControlPlanQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\ControlControlPlan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildControlControlPlanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildControlControlPlanQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildControlControlPlanQuery) {
            return $criteria;
        }
        $query = new ChildControlControlPlanQuery();
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
     * @return ChildControlControlPlan|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ControlControlPlanTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ControlControlPlanTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildControlControlPlan A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `process_steps`, `ctq`, `specification_characteristic`, `lsl`, `usl`, `unit_of_measure`, `data_description`, `measurement_method`, `sample_size`, `measurement_frequency`, `who_measures`, `where_recorded`, `corrective_action`, `applicable_sop`, `date_time_created`, `last_updated` FROM `control_control_plan` WHERE `id` = :p0';
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
            /** @var ChildControlControlPlan $obj */
            $obj = new ChildControlControlPlan();
            $obj->hydrate($row);
            ControlControlPlanTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildControlControlPlan|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_ID, $phaseId, $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the process_steps column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessSteps('fooValue');   // WHERE process_steps = 'fooValue'
     * $query->filterByProcessSteps('%fooValue%', Criteria::LIKE); // WHERE process_steps LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processSteps The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByProcessSteps($processSteps = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processSteps)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_PROCESS_STEPS, $processSteps, $comparison);
    }

    /**
     * Filter the query on the ctq column
     *
     * Example usage:
     * <code>
     * $query->filterByCtq('fooValue');   // WHERE ctq = 'fooValue'
     * $query->filterByCtq('%fooValue%', Criteria::LIKE); // WHERE ctq LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ctq The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByCtq($ctq = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ctq)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_CTQ, $ctq, $comparison);
    }

    /**
     * Filter the query on the specification_characteristic column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecificationCharacteristic('fooValue');   // WHERE specification_characteristic = 'fooValue'
     * $query->filterBySpecificationCharacteristic('%fooValue%', Criteria::LIKE); // WHERE specification_characteristic LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specificationCharacteristic The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterBySpecificationCharacteristic($specificationCharacteristic = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specificationCharacteristic)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_SPECIFICATION_CHARACTERISTIC, $specificationCharacteristic, $comparison);
    }

    /**
     * Filter the query on the lsl column
     *
     * Example usage:
     * <code>
     * $query->filterByLsl('fooValue');   // WHERE lsl = 'fooValue'
     * $query->filterByLsl('%fooValue%', Criteria::LIKE); // WHERE lsl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lsl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByLsl($lsl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lsl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_LSL, $lsl, $comparison);
    }

    /**
     * Filter the query on the usl column
     *
     * Example usage:
     * <code>
     * $query->filterByUsl('fooValue');   // WHERE usl = 'fooValue'
     * $query->filterByUsl('%fooValue%', Criteria::LIKE); // WHERE usl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $usl The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByUsl($usl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($usl)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_USL, $usl, $comparison);
    }

    /**
     * Filter the query on the unit_of_measure column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitOfMeasure('fooValue');   // WHERE unit_of_measure = 'fooValue'
     * $query->filterByUnitOfMeasure('%fooValue%', Criteria::LIKE); // WHERE unit_of_measure LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unitOfMeasure The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByUnitOfMeasure($unitOfMeasure = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unitOfMeasure)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_UNIT_OF_MEASURE, $unitOfMeasure, $comparison);
    }

    /**
     * Filter the query on the data_description column
     *
     * Example usage:
     * <code>
     * $query->filterByDataDescription('fooValue');   // WHERE data_description = 'fooValue'
     * $query->filterByDataDescription('%fooValue%', Criteria::LIKE); // WHERE data_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dataDescription The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByDataDescription($dataDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dataDescription)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_DATA_DESCRIPTION, $dataDescription, $comparison);
    }

    /**
     * Filter the query on the measurement_method column
     *
     * Example usage:
     * <code>
     * $query->filterByMeasurementMethod('fooValue');   // WHERE measurement_method = 'fooValue'
     * $query->filterByMeasurementMethod('%fooValue%', Criteria::LIKE); // WHERE measurement_method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $measurementMethod The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByMeasurementMethod($measurementMethod = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($measurementMethod)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_MEASUREMENT_METHOD, $measurementMethod, $comparison);
    }

    /**
     * Filter the query on the sample_size column
     *
     * Example usage:
     * <code>
     * $query->filterBySampleSize(1234); // WHERE sample_size = 1234
     * $query->filterBySampleSize(array(12, 34)); // WHERE sample_size IN (12, 34)
     * $query->filterBySampleSize(array('min' => 12)); // WHERE sample_size > 12
     * </code>
     *
     * @param     mixed $sampleSize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterBySampleSize($sampleSize = null, $comparison = null)
    {
        if (is_array($sampleSize)) {
            $useMinMax = false;
            if (isset($sampleSize['min'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_SAMPLE_SIZE, $sampleSize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sampleSize['max'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_SAMPLE_SIZE, $sampleSize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_SAMPLE_SIZE, $sampleSize, $comparison);
    }

    /**
     * Filter the query on the measurement_frequency column
     *
     * Example usage:
     * <code>
     * $query->filterByMeasurementFrequency('fooValue');   // WHERE measurement_frequency = 'fooValue'
     * $query->filterByMeasurementFrequency('%fooValue%', Criteria::LIKE); // WHERE measurement_frequency LIKE '%fooValue%'
     * </code>
     *
     * @param     string $measurementFrequency The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByMeasurementFrequency($measurementFrequency = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($measurementFrequency)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_MEASUREMENT_FREQUENCY, $measurementFrequency, $comparison);
    }

    /**
     * Filter the query on the who_measures column
     *
     * Example usage:
     * <code>
     * $query->filterByWhoMeasures(1234); // WHERE who_measures = 1234
     * $query->filterByWhoMeasures(array(12, 34)); // WHERE who_measures IN (12, 34)
     * $query->filterByWhoMeasures(array('min' => 12)); // WHERE who_measures > 12
     * </code>
     *
     * @see       filterByUsers()
     *
     * @param     mixed $whoMeasures The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByWhoMeasures($whoMeasures = null, $comparison = null)
    {
        if (is_array($whoMeasures)) {
            $useMinMax = false;
            if (isset($whoMeasures['min'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_WHO_MEASURES, $whoMeasures['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($whoMeasures['max'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_WHO_MEASURES, $whoMeasures['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_WHO_MEASURES, $whoMeasures, $comparison);
    }

    /**
     * Filter the query on the where_recorded column
     *
     * Example usage:
     * <code>
     * $query->filterByWhereRecorded('fooValue');   // WHERE where_recorded = 'fooValue'
     * $query->filterByWhereRecorded('%fooValue%', Criteria::LIKE); // WHERE where_recorded LIKE '%fooValue%'
     * </code>
     *
     * @param     string $whereRecorded The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByWhereRecorded($whereRecorded = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($whereRecorded)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_WHERE_RECORDED, $whereRecorded, $comparison);
    }

    /**
     * Filter the query on the corrective_action column
     *
     * Example usage:
     * <code>
     * $query->filterByCorrectiveAction('fooValue');   // WHERE corrective_action = 'fooValue'
     * $query->filterByCorrectiveAction('%fooValue%', Criteria::LIKE); // WHERE corrective_action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $correctiveAction The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByCorrectiveAction($correctiveAction = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($correctiveAction)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_CORRECTIVE_ACTION, $correctiveAction, $comparison);
    }

    /**
     * Filter the query on the applicable_sop column
     *
     * Example usage:
     * <code>
     * $query->filterByApplicableSop('fooValue');   // WHERE applicable_sop = 'fooValue'
     * $query->filterByApplicableSop('%fooValue%', Criteria::LIKE); // WHERE applicable_sop LIKE '%fooValue%'
     * </code>
     *
     * @param     string $applicableSop The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByApplicableSop($applicableSop = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($applicableSop)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_APPLICABLE_SOP, $applicableSop, $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(ControlControlPlanTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ControlControlPlanTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(ControlControlPlanTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ControlControlPlanTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
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
     * @return ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
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
     * @return ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ControlControlPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
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
     * @return ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(ControlControlPlanTableMap::COL_WHO_MEASURES, $users->getId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ControlControlPlanTableMap::COL_WHO_MEASURES, $users->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
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
     * @param   ChildControlControlPlan $controlControlPlan Object to remove from the list of results
     *
     * @return $this|ChildControlControlPlanQuery The current query, for fluid interface
     */
    public function prune($controlControlPlan = null)
    {
        if ($controlControlPlan) {
            $this->addUsingAlias(ControlControlPlanTableMap::COL_ID, $controlControlPlan->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the control_control_plan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ControlControlPlanTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ControlControlPlanTableMap::clearInstancePool();
            ControlControlPlanTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ControlControlPlanTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ControlControlPlanTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ControlControlPlanTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ControlControlPlanTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ControlControlPlanQuery
