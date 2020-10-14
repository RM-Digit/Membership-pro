<?php

namespace Base;

use \AnalyzeCriticalX as ChildAnalyzeCriticalX;
use \AnalyzeCriticalXQuery as ChildAnalyzeCriticalXQuery;
use \Exception;
use \PDO;
use Map\AnalyzeCriticalXTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'analyze_critical_x' table.
 *
 *
 *
 * @method     ChildAnalyzeCriticalXQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAnalyzeCriticalXQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildAnalyzeCriticalXQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildAnalyzeCriticalXQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildAnalyzeCriticalXQuery orderByInput($order = Criteria::ASC) Order by the input column
 * @method     ChildAnalyzeCriticalXQuery orderByPracticalTheory($order = Criteria::ASC) Order by the practical_theory column
 * @method     ChildAnalyzeCriticalXQuery orderByXMeasurement($order = Criteria::ASC) Order by the x_measurement column
 * @method     ChildAnalyzeCriticalXQuery orderByStatTested($order = Criteria::ASC) Order by the stat_tested column
 * @method     ChildAnalyzeCriticalXQuery orderByToolUsed($order = Criteria::ASC) Order by the tool_used column
 * @method     ChildAnalyzeCriticalXQuery orderByHo($order = Criteria::ASC) Order by the ho column
 * @method     ChildAnalyzeCriticalXQuery orderByHa($order = Criteria::ASC) Order by the ha column
 * @method     ChildAnalyzeCriticalXQuery orderByResults($order = Criteria::ASC) Order by the results column
 * @method     ChildAnalyzeCriticalXQuery orderByPracticalConclusions($order = Criteria::ASC) Order by the practical_conclusions column
 * @method     ChildAnalyzeCriticalXQuery orderByNextSteps($order = Criteria::ASC) Order by the next_steps column
 * @method     ChildAnalyzeCriticalXQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildAnalyzeCriticalXQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildAnalyzeCriticalXQuery groupById() Group by the id column
 * @method     ChildAnalyzeCriticalXQuery groupByProjectId() Group by the project_id column
 * @method     ChildAnalyzeCriticalXQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildAnalyzeCriticalXQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildAnalyzeCriticalXQuery groupByInput() Group by the input column
 * @method     ChildAnalyzeCriticalXQuery groupByPracticalTheory() Group by the practical_theory column
 * @method     ChildAnalyzeCriticalXQuery groupByXMeasurement() Group by the x_measurement column
 * @method     ChildAnalyzeCriticalXQuery groupByStatTested() Group by the stat_tested column
 * @method     ChildAnalyzeCriticalXQuery groupByToolUsed() Group by the tool_used column
 * @method     ChildAnalyzeCriticalXQuery groupByHo() Group by the ho column
 * @method     ChildAnalyzeCriticalXQuery groupByHa() Group by the ha column
 * @method     ChildAnalyzeCriticalXQuery groupByResults() Group by the results column
 * @method     ChildAnalyzeCriticalXQuery groupByPracticalConclusions() Group by the practical_conclusions column
 * @method     ChildAnalyzeCriticalXQuery groupByNextSteps() Group by the next_steps column
 * @method     ChildAnalyzeCriticalXQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildAnalyzeCriticalXQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildAnalyzeCriticalXQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAnalyzeCriticalXQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAnalyzeCriticalXQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAnalyzeCriticalXQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAnalyzeCriticalXQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAnalyzeCriticalXQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAnalyzeCriticalXQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildAnalyzeCriticalXQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildAnalyzeCriticalXQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildAnalyzeCriticalXQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildAnalyzeCriticalXQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildAnalyzeCriticalXQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildAnalyzeCriticalXQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildAnalyzeCriticalXQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildAnalyzeCriticalXQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildAnalyzeCriticalXQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildAnalyzeCriticalXQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildAnalyzeCriticalXQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildAnalyzeCriticalXQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildAnalyzeCriticalXQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildAnalyzeCriticalXQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildAnalyzeCriticalXQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildAnalyzeCriticalXQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildAnalyzeCriticalXQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildAnalyzeCriticalXQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildAnalyzeCriticalXQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildAnalyzeCriticalXQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAnalyzeCriticalX findOne(ConnectionInterface $con = null) Return the first ChildAnalyzeCriticalX matching the query
 * @method     ChildAnalyzeCriticalX findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAnalyzeCriticalX matching the query, or a new ChildAnalyzeCriticalX object populated from the query conditions when no match is found
 *
 * @method     ChildAnalyzeCriticalX findOneById(int $id) Return the first ChildAnalyzeCriticalX filtered by the id column
 * @method     ChildAnalyzeCriticalX findOneByProjectId(int $project_id) Return the first ChildAnalyzeCriticalX filtered by the project_id column
 * @method     ChildAnalyzeCriticalX findOneByPhaseId(int $phase_id) Return the first ChildAnalyzeCriticalX filtered by the phase_id column
 * @method     ChildAnalyzeCriticalX findOneByPhaseComponentId(int $phase_component_id) Return the first ChildAnalyzeCriticalX filtered by the phase_component_id column
 * @method     ChildAnalyzeCriticalX findOneByInput(string $input) Return the first ChildAnalyzeCriticalX filtered by the input column
 * @method     ChildAnalyzeCriticalX findOneByPracticalTheory(string $practical_theory) Return the first ChildAnalyzeCriticalX filtered by the practical_theory column
 * @method     ChildAnalyzeCriticalX findOneByXMeasurement(string $x_measurement) Return the first ChildAnalyzeCriticalX filtered by the x_measurement column
 * @method     ChildAnalyzeCriticalX findOneByStatTested(string $stat_tested) Return the first ChildAnalyzeCriticalX filtered by the stat_tested column
 * @method     ChildAnalyzeCriticalX findOneByToolUsed(string $tool_used) Return the first ChildAnalyzeCriticalX filtered by the tool_used column
 * @method     ChildAnalyzeCriticalX findOneByHo(string $ho) Return the first ChildAnalyzeCriticalX filtered by the ho column
 * @method     ChildAnalyzeCriticalX findOneByHa(string $ha) Return the first ChildAnalyzeCriticalX filtered by the ha column
 * @method     ChildAnalyzeCriticalX findOneByResults(string $results) Return the first ChildAnalyzeCriticalX filtered by the results column
 * @method     ChildAnalyzeCriticalX findOneByPracticalConclusions(string $practical_conclusions) Return the first ChildAnalyzeCriticalX filtered by the practical_conclusions column
 * @method     ChildAnalyzeCriticalX findOneByNextSteps(string $next_steps) Return the first ChildAnalyzeCriticalX filtered by the next_steps column
 * @method     ChildAnalyzeCriticalX findOneByDateTimeCreated(string $date_time_created) Return the first ChildAnalyzeCriticalX filtered by the date_time_created column
 * @method     ChildAnalyzeCriticalX findOneByLastUpdated(string $last_updated) Return the first ChildAnalyzeCriticalX filtered by the last_updated column *

 * @method     ChildAnalyzeCriticalX requirePk($key, ConnectionInterface $con = null) Return the ChildAnalyzeCriticalX by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOne(ConnectionInterface $con = null) Return the first ChildAnalyzeCriticalX matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnalyzeCriticalX requireOneById(int $id) Return the first ChildAnalyzeCriticalX filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByProjectId(int $project_id) Return the first ChildAnalyzeCriticalX filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByPhaseId(int $phase_id) Return the first ChildAnalyzeCriticalX filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildAnalyzeCriticalX filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByInput(string $input) Return the first ChildAnalyzeCriticalX filtered by the input column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByPracticalTheory(string $practical_theory) Return the first ChildAnalyzeCriticalX filtered by the practical_theory column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByXMeasurement(string $x_measurement) Return the first ChildAnalyzeCriticalX filtered by the x_measurement column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByStatTested(string $stat_tested) Return the first ChildAnalyzeCriticalX filtered by the stat_tested column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByToolUsed(string $tool_used) Return the first ChildAnalyzeCriticalX filtered by the tool_used column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByHo(string $ho) Return the first ChildAnalyzeCriticalX filtered by the ho column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByHa(string $ha) Return the first ChildAnalyzeCriticalX filtered by the ha column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByResults(string $results) Return the first ChildAnalyzeCriticalX filtered by the results column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByPracticalConclusions(string $practical_conclusions) Return the first ChildAnalyzeCriticalX filtered by the practical_conclusions column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByNextSteps(string $next_steps) Return the first ChildAnalyzeCriticalX filtered by the next_steps column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByDateTimeCreated(string $date_time_created) Return the first ChildAnalyzeCriticalX filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCriticalX requireOneByLastUpdated(string $last_updated) Return the first ChildAnalyzeCriticalX filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAnalyzeCriticalX objects based on current ModelCriteria
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findById(int $id) Return ChildAnalyzeCriticalX objects filtered by the id column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByProjectId(int $project_id) Return ChildAnalyzeCriticalX objects filtered by the project_id column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildAnalyzeCriticalX objects filtered by the phase_id column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildAnalyzeCriticalX objects filtered by the phase_component_id column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByInput(string $input) Return ChildAnalyzeCriticalX objects filtered by the input column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByPracticalTheory(string $practical_theory) Return ChildAnalyzeCriticalX objects filtered by the practical_theory column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByXMeasurement(string $x_measurement) Return ChildAnalyzeCriticalX objects filtered by the x_measurement column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByStatTested(string $stat_tested) Return ChildAnalyzeCriticalX objects filtered by the stat_tested column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByToolUsed(string $tool_used) Return ChildAnalyzeCriticalX objects filtered by the tool_used column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByHo(string $ho) Return ChildAnalyzeCriticalX objects filtered by the ho column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByHa(string $ha) Return ChildAnalyzeCriticalX objects filtered by the ha column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByResults(string $results) Return ChildAnalyzeCriticalX objects filtered by the results column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByPracticalConclusions(string $practical_conclusions) Return ChildAnalyzeCriticalX objects filtered by the practical_conclusions column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByNextSteps(string $next_steps) Return ChildAnalyzeCriticalX objects filtered by the next_steps column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildAnalyzeCriticalX objects filtered by the date_time_created column
 * @method     ChildAnalyzeCriticalX[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildAnalyzeCriticalX objects filtered by the last_updated column
 * @method     ChildAnalyzeCriticalX[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AnalyzeCriticalXQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AnalyzeCriticalXQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AnalyzeCriticalX', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAnalyzeCriticalXQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAnalyzeCriticalXQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAnalyzeCriticalXQuery) {
            return $criteria;
        }
        $query = new ChildAnalyzeCriticalXQuery();
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
     * @return ChildAnalyzeCriticalX|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AnalyzeCriticalXTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AnalyzeCriticalXTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAnalyzeCriticalX A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `input`, `practical_theory`, `x_measurement`, `stat_tested`, `tool_used`, `ho`, `ha`, `results`, `practical_conclusions`, `next_steps`, `date_time_created`, `last_updated` FROM `analyze_critical_x` WHERE `id` = :p0';
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
            /** @var ChildAnalyzeCriticalX $obj */
            $obj = new ChildAnalyzeCriticalX();
            $obj->hydrate($row);
            AnalyzeCriticalXTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAnalyzeCriticalX|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_ID, $phaseId, $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByInput($input = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($input)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_INPUT, $input, $comparison);
    }

    /**
     * Filter the query on the practical_theory column
     *
     * Example usage:
     * <code>
     * $query->filterByPracticalTheory('fooValue');   // WHERE practical_theory = 'fooValue'
     * $query->filterByPracticalTheory('%fooValue%', Criteria::LIKE); // WHERE practical_theory LIKE '%fooValue%'
     * </code>
     *
     * @param     string $practicalTheory The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByPracticalTheory($practicalTheory = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($practicalTheory)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PRACTICAL_THEORY, $practicalTheory, $comparison);
    }

    /**
     * Filter the query on the x_measurement column
     *
     * Example usage:
     * <code>
     * $query->filterByXMeasurement('fooValue');   // WHERE x_measurement = 'fooValue'
     * $query->filterByXMeasurement('%fooValue%', Criteria::LIKE); // WHERE x_measurement LIKE '%fooValue%'
     * </code>
     *
     * @param     string $xMeasurement The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByXMeasurement($xMeasurement = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xMeasurement)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_X_MEASUREMENT, $xMeasurement, $comparison);
    }

    /**
     * Filter the query on the stat_tested column
     *
     * Example usage:
     * <code>
     * $query->filterByStatTested('fooValue');   // WHERE stat_tested = 'fooValue'
     * $query->filterByStatTested('%fooValue%', Criteria::LIKE); // WHERE stat_tested LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statTested The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByStatTested($statTested = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statTested)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_STAT_TESTED, $statTested, $comparison);
    }

    /**
     * Filter the query on the tool_used column
     *
     * Example usage:
     * <code>
     * $query->filterByToolUsed('fooValue');   // WHERE tool_used = 'fooValue'
     * $query->filterByToolUsed('%fooValue%', Criteria::LIKE); // WHERE tool_used LIKE '%fooValue%'
     * </code>
     *
     * @param     string $toolUsed The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByToolUsed($toolUsed = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($toolUsed)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_TOOL_USED, $toolUsed, $comparison);
    }

    /**
     * Filter the query on the ho column
     *
     * Example usage:
     * <code>
     * $query->filterByHo('fooValue');   // WHERE ho = 'fooValue'
     * $query->filterByHo('%fooValue%', Criteria::LIKE); // WHERE ho LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ho The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByHo($ho = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ho)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_HO, $ho, $comparison);
    }

    /**
     * Filter the query on the ha column
     *
     * Example usage:
     * <code>
     * $query->filterByHa('fooValue');   // WHERE ha = 'fooValue'
     * $query->filterByHa('%fooValue%', Criteria::LIKE); // WHERE ha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ha The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByHa($ha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ha)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_HA, $ha, $comparison);
    }

    /**
     * Filter the query on the results column
     *
     * Example usage:
     * <code>
     * $query->filterByResults('fooValue');   // WHERE results = 'fooValue'
     * $query->filterByResults('%fooValue%', Criteria::LIKE); // WHERE results LIKE '%fooValue%'
     * </code>
     *
     * @param     string $results The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByResults($results = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($results)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_RESULTS, $results, $comparison);
    }

    /**
     * Filter the query on the practical_conclusions column
     *
     * Example usage:
     * <code>
     * $query->filterByPracticalConclusions('fooValue');   // WHERE practical_conclusions = 'fooValue'
     * $query->filterByPracticalConclusions('%fooValue%', Criteria::LIKE); // WHERE practical_conclusions LIKE '%fooValue%'
     * </code>
     *
     * @param     string $practicalConclusions The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByPracticalConclusions($practicalConclusions = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($practicalConclusions)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_PRACTICAL_CONCLUSIONS, $practicalConclusions, $comparison);
    }

    /**
     * Filter the query on the next_steps column
     *
     * Example usage:
     * <code>
     * $query->filterByNextSteps('fooValue');   // WHERE next_steps = 'fooValue'
     * $query->filterByNextSteps('%fooValue%', Criteria::LIKE); // WHERE next_steps LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nextSteps The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByNextSteps($nextSteps = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nextSteps)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_NEXT_STEPS, $nextSteps, $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(AnalyzeCriticalXTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyzeCriticalXTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
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
     * @return ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
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
     * @return ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyzeCriticalXTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
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
     * @param   ChildAnalyzeCriticalX $analyzeCriticalX Object to remove from the list of results
     *
     * @return $this|ChildAnalyzeCriticalXQuery The current query, for fluid interface
     */
    public function prune($analyzeCriticalX = null)
    {
        if ($analyzeCriticalX) {
            $this->addUsingAlias(AnalyzeCriticalXTableMap::COL_ID, $analyzeCriticalX->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the analyze_critical_x table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCriticalXTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AnalyzeCriticalXTableMap::clearInstancePool();
            AnalyzeCriticalXTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCriticalXTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AnalyzeCriticalXTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AnalyzeCriticalXTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AnalyzeCriticalXTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AnalyzeCriticalXQuery
