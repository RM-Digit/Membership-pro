<?php

namespace Base;

use \MeasureCollectionPlan as ChildMeasureCollectionPlan;
use \MeasureCollectionPlanQuery as ChildMeasureCollectionPlanQuery;
use \Exception;
use \PDO;
use Map\MeasureCollectionPlanTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'measure_collection_plan' table.
 *
 *
 *
 * @method     ChildMeasureCollectionPlanQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildMeasureCollectionPlanQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildMeasureCollectionPlanQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildMeasureCollectionPlanQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildMeasureCollectionPlanQuery orderByMeasure($order = Criteria::ASC) Order by the measure column
 * @method     ChildMeasureCollectionPlanQuery orderByMeasureType($order = Criteria::ASC) Order by the measure_type column
 * @method     ChildMeasureCollectionPlanQuery orderByDataType($order = Criteria::ASC) Order by the data_type column
 * @method     ChildMeasureCollectionPlanQuery orderByOperationalDefinition($order = Criteria::ASC) Order by the operational_definition column
 * @method     ChildMeasureCollectionPlanQuery orderBySpecification($order = Criteria::ASC) Order by the specification column
 * @method     ChildMeasureCollectionPlanQuery orderByTarget($order = Criteria::ASC) Order by the target column
 * @method     ChildMeasureCollectionPlanQuery orderByDataCollectionForm($order = Criteria::ASC) Order by the data_collection_form column
 * @method     ChildMeasureCollectionPlanQuery orderBySampling($order = Criteria::ASC) Order by the sampling column
 * @method     ChildMeasureCollectionPlanQuery orderByBaselineSigma($order = Criteria::ASC) Order by the baseline_sigma column
 * @method     ChildMeasureCollectionPlanQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildMeasureCollectionPlanQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildMeasureCollectionPlanQuery groupById() Group by the id column
 * @method     ChildMeasureCollectionPlanQuery groupByProjectId() Group by the project_id column
 * @method     ChildMeasureCollectionPlanQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildMeasureCollectionPlanQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildMeasureCollectionPlanQuery groupByMeasure() Group by the measure column
 * @method     ChildMeasureCollectionPlanQuery groupByMeasureType() Group by the measure_type column
 * @method     ChildMeasureCollectionPlanQuery groupByDataType() Group by the data_type column
 * @method     ChildMeasureCollectionPlanQuery groupByOperationalDefinition() Group by the operational_definition column
 * @method     ChildMeasureCollectionPlanQuery groupBySpecification() Group by the specification column
 * @method     ChildMeasureCollectionPlanQuery groupByTarget() Group by the target column
 * @method     ChildMeasureCollectionPlanQuery groupByDataCollectionForm() Group by the data_collection_form column
 * @method     ChildMeasureCollectionPlanQuery groupBySampling() Group by the sampling column
 * @method     ChildMeasureCollectionPlanQuery groupByBaselineSigma() Group by the baseline_sigma column
 * @method     ChildMeasureCollectionPlanQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildMeasureCollectionPlanQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildMeasureCollectionPlanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMeasureCollectionPlanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMeasureCollectionPlanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMeasureCollectionPlanQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMeasureCollectionPlanQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMeasureCollectionPlanQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMeasureCollectionPlanQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildMeasureCollectionPlanQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildMeasureCollectionPlanQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildMeasureCollectionPlanQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildMeasureCollectionPlanQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildMeasureCollectionPlanQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildMeasureCollectionPlanQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildMeasureCollectionPlanQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildMeasureCollectionPlanQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildMeasureCollectionPlanQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildMeasureCollectionPlanQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildMeasureCollectionPlanQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildMeasureCollectionPlanQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildMeasureCollectionPlanQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildMeasureCollectionPlanQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildMeasureCollectionPlanQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildMeasureCollectionPlanQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildMeasureCollectionPlanQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildMeasureCollectionPlanQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildMeasureCollectionPlanQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildMeasureCollectionPlanQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildMeasureCollectionPlan findOne(ConnectionInterface $con = null) Return the first ChildMeasureCollectionPlan matching the query
 * @method     ChildMeasureCollectionPlan findOneOrCreate(ConnectionInterface $con = null) Return the first ChildMeasureCollectionPlan matching the query, or a new ChildMeasureCollectionPlan object populated from the query conditions when no match is found
 *
 * @method     ChildMeasureCollectionPlan findOneById(int $id) Return the first ChildMeasureCollectionPlan filtered by the id column
 * @method     ChildMeasureCollectionPlan findOneByProjectId(int $project_id) Return the first ChildMeasureCollectionPlan filtered by the project_id column
 * @method     ChildMeasureCollectionPlan findOneByPhaseId(int $phase_id) Return the first ChildMeasureCollectionPlan filtered by the phase_id column
 * @method     ChildMeasureCollectionPlan findOneByPhaseComponentId(int $phase_component_id) Return the first ChildMeasureCollectionPlan filtered by the phase_component_id column
 * @method     ChildMeasureCollectionPlan findOneByMeasure(string $measure) Return the first ChildMeasureCollectionPlan filtered by the measure column
 * @method     ChildMeasureCollectionPlan findOneByMeasureType(string $measure_type) Return the first ChildMeasureCollectionPlan filtered by the measure_type column
 * @method     ChildMeasureCollectionPlan findOneByDataType(string $data_type) Return the first ChildMeasureCollectionPlan filtered by the data_type column
 * @method     ChildMeasureCollectionPlan findOneByOperationalDefinition(string $operational_definition) Return the first ChildMeasureCollectionPlan filtered by the operational_definition column
 * @method     ChildMeasureCollectionPlan findOneBySpecification(string $specification) Return the first ChildMeasureCollectionPlan filtered by the specification column
 * @method     ChildMeasureCollectionPlan findOneByTarget(string $target) Return the first ChildMeasureCollectionPlan filtered by the target column
 * @method     ChildMeasureCollectionPlan findOneByDataCollectionForm(string $data_collection_form) Return the first ChildMeasureCollectionPlan filtered by the data_collection_form column
 * @method     ChildMeasureCollectionPlan findOneBySampling(string $sampling) Return the first ChildMeasureCollectionPlan filtered by the sampling column
 * @method     ChildMeasureCollectionPlan findOneByBaselineSigma(string $baseline_sigma) Return the first ChildMeasureCollectionPlan filtered by the baseline_sigma column
 * @method     ChildMeasureCollectionPlan findOneByDateTimeCreated(string $date_time_created) Return the first ChildMeasureCollectionPlan filtered by the date_time_created column
 * @method     ChildMeasureCollectionPlan findOneByLastUpdated(string $last_updated) Return the first ChildMeasureCollectionPlan filtered by the last_updated column *

 * @method     ChildMeasureCollectionPlan requirePk($key, ConnectionInterface $con = null) Return the ChildMeasureCollectionPlan by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOne(ConnectionInterface $con = null) Return the first ChildMeasureCollectionPlan matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMeasureCollectionPlan requireOneById(int $id) Return the first ChildMeasureCollectionPlan filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByProjectId(int $project_id) Return the first ChildMeasureCollectionPlan filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByPhaseId(int $phase_id) Return the first ChildMeasureCollectionPlan filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildMeasureCollectionPlan filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByMeasure(string $measure) Return the first ChildMeasureCollectionPlan filtered by the measure column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByMeasureType(string $measure_type) Return the first ChildMeasureCollectionPlan filtered by the measure_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByDataType(string $data_type) Return the first ChildMeasureCollectionPlan filtered by the data_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByOperationalDefinition(string $operational_definition) Return the first ChildMeasureCollectionPlan filtered by the operational_definition column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneBySpecification(string $specification) Return the first ChildMeasureCollectionPlan filtered by the specification column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByTarget(string $target) Return the first ChildMeasureCollectionPlan filtered by the target column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByDataCollectionForm(string $data_collection_form) Return the first ChildMeasureCollectionPlan filtered by the data_collection_form column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneBySampling(string $sampling) Return the first ChildMeasureCollectionPlan filtered by the sampling column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByBaselineSigma(string $baseline_sigma) Return the first ChildMeasureCollectionPlan filtered by the baseline_sigma column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByDateTimeCreated(string $date_time_created) Return the first ChildMeasureCollectionPlan filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMeasureCollectionPlan requireOneByLastUpdated(string $last_updated) Return the first ChildMeasureCollectionPlan filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildMeasureCollectionPlan objects based on current ModelCriteria
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findById(int $id) Return ChildMeasureCollectionPlan objects filtered by the id column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByProjectId(int $project_id) Return ChildMeasureCollectionPlan objects filtered by the project_id column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildMeasureCollectionPlan objects filtered by the phase_id column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildMeasureCollectionPlan objects filtered by the phase_component_id column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByMeasure(string $measure) Return ChildMeasureCollectionPlan objects filtered by the measure column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByMeasureType(string $measure_type) Return ChildMeasureCollectionPlan objects filtered by the measure_type column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByDataType(string $data_type) Return ChildMeasureCollectionPlan objects filtered by the data_type column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByOperationalDefinition(string $operational_definition) Return ChildMeasureCollectionPlan objects filtered by the operational_definition column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findBySpecification(string $specification) Return ChildMeasureCollectionPlan objects filtered by the specification column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByTarget(string $target) Return ChildMeasureCollectionPlan objects filtered by the target column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByDataCollectionForm(string $data_collection_form) Return ChildMeasureCollectionPlan objects filtered by the data_collection_form column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findBySampling(string $sampling) Return ChildMeasureCollectionPlan objects filtered by the sampling column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByBaselineSigma(string $baseline_sigma) Return ChildMeasureCollectionPlan objects filtered by the baseline_sigma column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildMeasureCollectionPlan objects filtered by the date_time_created column
 * @method     ChildMeasureCollectionPlan[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildMeasureCollectionPlan objects filtered by the last_updated column
 * @method     ChildMeasureCollectionPlan[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class MeasureCollectionPlanQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\MeasureCollectionPlanQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\MeasureCollectionPlan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildMeasureCollectionPlanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildMeasureCollectionPlanQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildMeasureCollectionPlanQuery) {
            return $criteria;
        }
        $query = new ChildMeasureCollectionPlanQuery();
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
     * @return ChildMeasureCollectionPlan|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(MeasureCollectionPlanTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = MeasureCollectionPlanTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildMeasureCollectionPlan A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `measure`, `measure_type`, `data_type`, `operational_definition`, `specification`, `target`, `data_collection_form`, `sampling`, `baseline_sigma`, `date_time_created`, `last_updated` FROM `measure_collection_plan` WHERE `id` = :p0';
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
            /** @var ChildMeasureCollectionPlan $obj */
            $obj = new ChildMeasureCollectionPlan();
            $obj->hydrate($row);
            MeasureCollectionPlanTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildMeasureCollectionPlan|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_ID, $phaseId, $comparison);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the measure column
     *
     * Example usage:
     * <code>
     * $query->filterByMeasure('fooValue');   // WHERE measure = 'fooValue'
     * $query->filterByMeasure('%fooValue%', Criteria::LIKE); // WHERE measure LIKE '%fooValue%'
     * </code>
     *
     * @param     string $measure The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByMeasure($measure = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($measure)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_MEASURE, $measure, $comparison);
    }

    /**
     * Filter the query on the measure_type column
     *
     * Example usage:
     * <code>
     * $query->filterByMeasureType('fooValue');   // WHERE measure_type = 'fooValue'
     * $query->filterByMeasureType('%fooValue%', Criteria::LIKE); // WHERE measure_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $measureType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByMeasureType($measureType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($measureType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_MEASURE_TYPE, $measureType, $comparison);
    }

    /**
     * Filter the query on the data_type column
     *
     * Example usage:
     * <code>
     * $query->filterByDataType('fooValue');   // WHERE data_type = 'fooValue'
     * $query->filterByDataType('%fooValue%', Criteria::LIKE); // WHERE data_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dataType The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByDataType($dataType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dataType)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_DATA_TYPE, $dataType, $comparison);
    }

    /**
     * Filter the query on the operational_definition column
     *
     * Example usage:
     * <code>
     * $query->filterByOperationalDefinition('fooValue');   // WHERE operational_definition = 'fooValue'
     * $query->filterByOperationalDefinition('%fooValue%', Criteria::LIKE); // WHERE operational_definition LIKE '%fooValue%'
     * </code>
     *
     * @param     string $operationalDefinition The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByOperationalDefinition($operationalDefinition = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($operationalDefinition)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_OPERATIONAL_DEFINITION, $operationalDefinition, $comparison);
    }

    /**
     * Filter the query on the specification column
     *
     * Example usage:
     * <code>
     * $query->filterBySpecification('fooValue');   // WHERE specification = 'fooValue'
     * $query->filterBySpecification('%fooValue%', Criteria::LIKE); // WHERE specification LIKE '%fooValue%'
     * </code>
     *
     * @param     string $specification The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterBySpecification($specification = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($specification)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_SPECIFICATION, $specification, $comparison);
    }

    /**
     * Filter the query on the target column
     *
     * Example usage:
     * <code>
     * $query->filterByTarget('fooValue');   // WHERE target = 'fooValue'
     * $query->filterByTarget('%fooValue%', Criteria::LIKE); // WHERE target LIKE '%fooValue%'
     * </code>
     *
     * @param     string $target The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByTarget($target = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($target)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_TARGET, $target, $comparison);
    }

    /**
     * Filter the query on the data_collection_form column
     *
     * Example usage:
     * <code>
     * $query->filterByDataCollectionForm('fooValue');   // WHERE data_collection_form = 'fooValue'
     * $query->filterByDataCollectionForm('%fooValue%', Criteria::LIKE); // WHERE data_collection_form LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dataCollectionForm The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByDataCollectionForm($dataCollectionForm = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dataCollectionForm)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_DATA_COLLECTION_FORM, $dataCollectionForm, $comparison);
    }

    /**
     * Filter the query on the sampling column
     *
     * Example usage:
     * <code>
     * $query->filterBySampling('fooValue');   // WHERE sampling = 'fooValue'
     * $query->filterBySampling('%fooValue%', Criteria::LIKE); // WHERE sampling LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sampling The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterBySampling($sampling = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sampling)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_SAMPLING, $sampling, $comparison);
    }

    /**
     * Filter the query on the baseline_sigma column
     *
     * Example usage:
     * <code>
     * $query->filterByBaselineSigma('fooValue');   // WHERE baseline_sigma = 'fooValue'
     * $query->filterByBaselineSigma('%fooValue%', Criteria::LIKE); // WHERE baseline_sigma LIKE '%fooValue%'
     * </code>
     *
     * @param     string $baselineSigma The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByBaselineSigma($baselineSigma = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($baselineSigma)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_BASELINE_SIGMA, $baselineSigma, $comparison);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(MeasureCollectionPlanTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MeasureCollectionPlanTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
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
     * @return ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
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
     * @return ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
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
     * @param   ChildMeasureCollectionPlan $measureCollectionPlan Object to remove from the list of results
     *
     * @return $this|ChildMeasureCollectionPlanQuery The current query, for fluid interface
     */
    public function prune($measureCollectionPlan = null)
    {
        if ($measureCollectionPlan) {
            $this->addUsingAlias(MeasureCollectionPlanTableMap::COL_ID, $measureCollectionPlan->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the measure_collection_plan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureCollectionPlanTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            MeasureCollectionPlanTableMap::clearInstancePool();
            MeasureCollectionPlanTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureCollectionPlanTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(MeasureCollectionPlanTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            MeasureCollectionPlanTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            MeasureCollectionPlanTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // MeasureCollectionPlanQuery
