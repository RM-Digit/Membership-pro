<?php

namespace Base;

use \DefineSipoc as ChildDefineSipoc;
use \DefineSipocQuery as ChildDefineSipocQuery;
use \Exception;
use \PDO;
use Map\DefineSipocTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'define_sipoc' table.
 *
 *
 *
 * @method     ChildDefineSipocQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDefineSipocQuery orderByProjectId($order = Criteria::ASC) Order by the project_id column
 * @method     ChildDefineSipocQuery orderByPhaseId($order = Criteria::ASC) Order by the phase_id column
 * @method     ChildDefineSipocQuery orderByPhaseComponentId($order = Criteria::ASC) Order by the phase_component_id column
 * @method     ChildDefineSipocQuery orderBySuppliers($order = Criteria::ASC) Order by the suppliers column
 * @method     ChildDefineSipocQuery orderByInputs($order = Criteria::ASC) Order by the inputs column
 * @method     ChildDefineSipocQuery orderByOutputs($order = Criteria::ASC) Order by the outputs column
 * @method     ChildDefineSipocQuery orderByProcesses($order = Criteria::ASC) Order by the processes column
 * @method     ChildDefineSipocQuery orderByCustomers($order = Criteria::ASC) Order by the customers column
 * @method     ChildDefineSipocQuery orderByProcessMeasures($order = Criteria::ASC) Order by the process_measures column
 * @method     ChildDefineSipocQuery orderByOutputMeasures($order = Criteria::ASC) Order by the output_measures column
 * @method     ChildDefineSipocQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildDefineSipocQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildDefineSipocQuery groupById() Group by the id column
 * @method     ChildDefineSipocQuery groupByProjectId() Group by the project_id column
 * @method     ChildDefineSipocQuery groupByPhaseId() Group by the phase_id column
 * @method     ChildDefineSipocQuery groupByPhaseComponentId() Group by the phase_component_id column
 * @method     ChildDefineSipocQuery groupBySuppliers() Group by the suppliers column
 * @method     ChildDefineSipocQuery groupByInputs() Group by the inputs column
 * @method     ChildDefineSipocQuery groupByOutputs() Group by the outputs column
 * @method     ChildDefineSipocQuery groupByProcesses() Group by the processes column
 * @method     ChildDefineSipocQuery groupByCustomers() Group by the customers column
 * @method     ChildDefineSipocQuery groupByProcessMeasures() Group by the process_measures column
 * @method     ChildDefineSipocQuery groupByOutputMeasures() Group by the output_measures column
 * @method     ChildDefineSipocQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildDefineSipocQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildDefineSipocQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDefineSipocQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDefineSipocQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDefineSipocQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDefineSipocQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDefineSipocQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDefineSipocQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildDefineSipocQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildDefineSipocQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildDefineSipocQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildDefineSipocQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildDefineSipocQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildDefineSipocQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildDefineSipocQuery leftJoinProjectPhases($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildDefineSipocQuery rightJoinProjectPhases($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProjectPhases relation
 * @method     ChildDefineSipocQuery innerJoinProjectPhases($relationAlias = null) Adds a INNER JOIN clause to the query using the ProjectPhases relation
 *
 * @method     ChildDefineSipocQuery joinWithProjectPhases($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildDefineSipocQuery leftJoinWithProjectPhases() Adds a LEFT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildDefineSipocQuery rightJoinWithProjectPhases() Adds a RIGHT JOIN clause and with to the query using the ProjectPhases relation
 * @method     ChildDefineSipocQuery innerJoinWithProjectPhases() Adds a INNER JOIN clause and with to the query using the ProjectPhases relation
 *
 * @method     ChildDefineSipocQuery leftJoinPhaseComponents($relationAlias = null) Adds a LEFT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildDefineSipocQuery rightJoinPhaseComponents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PhaseComponents relation
 * @method     ChildDefineSipocQuery innerJoinPhaseComponents($relationAlias = null) Adds a INNER JOIN clause to the query using the PhaseComponents relation
 *
 * @method     ChildDefineSipocQuery joinWithPhaseComponents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PhaseComponents relation
 *
 * @method     ChildDefineSipocQuery leftJoinWithPhaseComponents() Adds a LEFT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildDefineSipocQuery rightJoinWithPhaseComponents() Adds a RIGHT JOIN clause and with to the query using the PhaseComponents relation
 * @method     ChildDefineSipocQuery innerJoinWithPhaseComponents() Adds a INNER JOIN clause and with to the query using the PhaseComponents relation
 *
 * @method     \ProjectsQuery|\ProjectPhasesQuery|\PhaseComponentsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDefineSipoc findOne(ConnectionInterface $con = null) Return the first ChildDefineSipoc matching the query
 * @method     ChildDefineSipoc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDefineSipoc matching the query, or a new ChildDefineSipoc object populated from the query conditions when no match is found
 *
 * @method     ChildDefineSipoc findOneById(int $id) Return the first ChildDefineSipoc filtered by the id column
 * @method     ChildDefineSipoc findOneByProjectId(int $project_id) Return the first ChildDefineSipoc filtered by the project_id column
 * @method     ChildDefineSipoc findOneByPhaseId(int $phase_id) Return the first ChildDefineSipoc filtered by the phase_id column
 * @method     ChildDefineSipoc findOneByPhaseComponentId(int $phase_component_id) Return the first ChildDefineSipoc filtered by the phase_component_id column
 * @method     ChildDefineSipoc findOneBySuppliers(string $suppliers) Return the first ChildDefineSipoc filtered by the suppliers column
 * @method     ChildDefineSipoc findOneByInputs(string $inputs) Return the first ChildDefineSipoc filtered by the inputs column
 * @method     ChildDefineSipoc findOneByOutputs(string $outputs) Return the first ChildDefineSipoc filtered by the outputs column
 * @method     ChildDefineSipoc findOneByProcesses(string $processes) Return the first ChildDefineSipoc filtered by the processes column
 * @method     ChildDefineSipoc findOneByCustomers(string $customers) Return the first ChildDefineSipoc filtered by the customers column
 * @method     ChildDefineSipoc findOneByProcessMeasures(string $process_measures) Return the first ChildDefineSipoc filtered by the process_measures column
 * @method     ChildDefineSipoc findOneByOutputMeasures(string $output_measures) Return the first ChildDefineSipoc filtered by the output_measures column
 * @method     ChildDefineSipoc findOneByDateTimeCreated(string $date_time_created) Return the first ChildDefineSipoc filtered by the date_time_created column
 * @method     ChildDefineSipoc findOneByLastUpdated(string $last_updated) Return the first ChildDefineSipoc filtered by the last_updated column *

 * @method     ChildDefineSipoc requirePk($key, ConnectionInterface $con = null) Return the ChildDefineSipoc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOne(ConnectionInterface $con = null) Return the first ChildDefineSipoc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDefineSipoc requireOneById(int $id) Return the first ChildDefineSipoc filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByProjectId(int $project_id) Return the first ChildDefineSipoc filtered by the project_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByPhaseId(int $phase_id) Return the first ChildDefineSipoc filtered by the phase_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByPhaseComponentId(int $phase_component_id) Return the first ChildDefineSipoc filtered by the phase_component_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneBySuppliers(string $suppliers) Return the first ChildDefineSipoc filtered by the suppliers column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByInputs(string $inputs) Return the first ChildDefineSipoc filtered by the inputs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByOutputs(string $outputs) Return the first ChildDefineSipoc filtered by the outputs column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByProcesses(string $processes) Return the first ChildDefineSipoc filtered by the processes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByCustomers(string $customers) Return the first ChildDefineSipoc filtered by the customers column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByProcessMeasures(string $process_measures) Return the first ChildDefineSipoc filtered by the process_measures column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByOutputMeasures(string $output_measures) Return the first ChildDefineSipoc filtered by the output_measures column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByDateTimeCreated(string $date_time_created) Return the first ChildDefineSipoc filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDefineSipoc requireOneByLastUpdated(string $last_updated) Return the first ChildDefineSipoc filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDefineSipoc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDefineSipoc objects based on current ModelCriteria
 * @method     ChildDefineSipoc[]|ObjectCollection findById(int $id) Return ChildDefineSipoc objects filtered by the id column
 * @method     ChildDefineSipoc[]|ObjectCollection findByProjectId(int $project_id) Return ChildDefineSipoc objects filtered by the project_id column
 * @method     ChildDefineSipoc[]|ObjectCollection findByPhaseId(int $phase_id) Return ChildDefineSipoc objects filtered by the phase_id column
 * @method     ChildDefineSipoc[]|ObjectCollection findByPhaseComponentId(int $phase_component_id) Return ChildDefineSipoc objects filtered by the phase_component_id column
 * @method     ChildDefineSipoc[]|ObjectCollection findBySuppliers(string $suppliers) Return ChildDefineSipoc objects filtered by the suppliers column
 * @method     ChildDefineSipoc[]|ObjectCollection findByInputs(string $inputs) Return ChildDefineSipoc objects filtered by the inputs column
 * @method     ChildDefineSipoc[]|ObjectCollection findByOutputs(string $outputs) Return ChildDefineSipoc objects filtered by the outputs column
 * @method     ChildDefineSipoc[]|ObjectCollection findByProcesses(string $processes) Return ChildDefineSipoc objects filtered by the processes column
 * @method     ChildDefineSipoc[]|ObjectCollection findByCustomers(string $customers) Return ChildDefineSipoc objects filtered by the customers column
 * @method     ChildDefineSipoc[]|ObjectCollection findByProcessMeasures(string $process_measures) Return ChildDefineSipoc objects filtered by the process_measures column
 * @method     ChildDefineSipoc[]|ObjectCollection findByOutputMeasures(string $output_measures) Return ChildDefineSipoc objects filtered by the output_measures column
 * @method     ChildDefineSipoc[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildDefineSipoc objects filtered by the date_time_created column
 * @method     ChildDefineSipoc[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildDefineSipoc objects filtered by the last_updated column
 * @method     ChildDefineSipoc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DefineSipocQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DefineSipocQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\DefineSipoc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDefineSipocQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDefineSipocQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDefineSipocQuery) {
            return $criteria;
        }
        $query = new ChildDefineSipocQuery();
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
     * @return ChildDefineSipoc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DefineSipocTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DefineSipocTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildDefineSipoc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `project_id`, `phase_id`, `phase_component_id`, `suppliers`, `inputs`, `outputs`, `processes`, `customers`, `process_measures`, `output_measures`, `date_time_created`, `last_updated` FROM `define_sipoc` WHERE `id` = :p0';
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
            /** @var ChildDefineSipoc $obj */
            $obj = new ChildDefineSipoc();
            $obj->hydrate($row);
            DefineSipocTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildDefineSipoc|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DefineSipocTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DefineSipocTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_ID, $id, $comparison);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByProjectId($projectId = null, $comparison = null)
    {
        if (is_array($projectId)) {
            $useMinMax = false;
            if (isset($projectId['min'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_PROJECT_ID, $projectId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($projectId['max'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_PROJECT_ID, $projectId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_PROJECT_ID, $projectId, $comparison);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByPhaseId($phaseId = null, $comparison = null)
    {
        if (is_array($phaseId)) {
            $useMinMax = false;
            if (isset($phaseId['min'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_PHASE_ID, $phaseId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseId['max'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_PHASE_ID, $phaseId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_PHASE_ID, $phaseId, $comparison);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByPhaseComponentId($phaseComponentId = null, $comparison = null)
    {
        if (is_array($phaseComponentId)) {
            $useMinMax = false;
            if (isset($phaseComponentId['min'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phaseComponentId['max'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_PHASE_COMPONENT_ID, $phaseComponentId, $comparison);
    }

    /**
     * Filter the query on the suppliers column
     *
     * Example usage:
     * <code>
     * $query->filterBySuppliers('fooValue');   // WHERE suppliers = 'fooValue'
     * $query->filterBySuppliers('%fooValue%', Criteria::LIKE); // WHERE suppliers LIKE '%fooValue%'
     * </code>
     *
     * @param     string $suppliers The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterBySuppliers($suppliers = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($suppliers)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_SUPPLIERS, $suppliers, $comparison);
    }

    /**
     * Filter the query on the inputs column
     *
     * Example usage:
     * <code>
     * $query->filterByInputs('fooValue');   // WHERE inputs = 'fooValue'
     * $query->filterByInputs('%fooValue%', Criteria::LIKE); // WHERE inputs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inputs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByInputs($inputs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inputs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_INPUTS, $inputs, $comparison);
    }

    /**
     * Filter the query on the outputs column
     *
     * Example usage:
     * <code>
     * $query->filterByOutputs('fooValue');   // WHERE outputs = 'fooValue'
     * $query->filterByOutputs('%fooValue%', Criteria::LIKE); // WHERE outputs LIKE '%fooValue%'
     * </code>
     *
     * @param     string $outputs The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByOutputs($outputs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($outputs)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_OUTPUTS, $outputs, $comparison);
    }

    /**
     * Filter the query on the processes column
     *
     * Example usage:
     * <code>
     * $query->filterByProcesses('fooValue');   // WHERE processes = 'fooValue'
     * $query->filterByProcesses('%fooValue%', Criteria::LIKE); // WHERE processes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processes The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByProcesses($processes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processes)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_PROCESSES, $processes, $comparison);
    }

    /**
     * Filter the query on the customers column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomers('fooValue');   // WHERE customers = 'fooValue'
     * $query->filterByCustomers('%fooValue%', Criteria::LIKE); // WHERE customers LIKE '%fooValue%'
     * </code>
     *
     * @param     string $customers The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByCustomers($customers = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($customers)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_CUSTOMERS, $customers, $comparison);
    }

    /**
     * Filter the query on the process_measures column
     *
     * Example usage:
     * <code>
     * $query->filterByProcessMeasures('fooValue');   // WHERE process_measures = 'fooValue'
     * $query->filterByProcessMeasures('%fooValue%', Criteria::LIKE); // WHERE process_measures LIKE '%fooValue%'
     * </code>
     *
     * @param     string $processMeasures The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByProcessMeasures($processMeasures = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($processMeasures)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_PROCESS_MEASURES, $processMeasures, $comparison);
    }

    /**
     * Filter the query on the output_measures column
     *
     * Example usage:
     * <code>
     * $query->filterByOutputMeasures('fooValue');   // WHERE output_measures = 'fooValue'
     * $query->filterByOutputMeasures('%fooValue%', Criteria::LIKE); // WHERE output_measures LIKE '%fooValue%'
     * </code>
     *
     * @param     string $outputMeasures The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByOutputMeasures($outputMeasures = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($outputMeasures)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_OUTPUT_MEASURES, $outputMeasures, $comparison);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(DefineSipocTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DefineSipocTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(DefineSipocTableMap::COL_PROJECT_ID, $projects->getId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineSipocTableMap::COL_PROJECT_ID, $projects->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
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
     * @return ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByProjectPhases($projectPhases, $comparison = null)
    {
        if ($projectPhases instanceof \ProjectPhases) {
            return $this
                ->addUsingAlias(DefineSipocTableMap::COL_PHASE_ID, $projectPhases->getId(), $comparison);
        } elseif ($projectPhases instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineSipocTableMap::COL_PHASE_ID, $projectPhases->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
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
     * @return ChildDefineSipocQuery The current query, for fluid interface
     */
    public function filterByPhaseComponents($phaseComponents, $comparison = null)
    {
        if ($phaseComponents instanceof \PhaseComponents) {
            return $this
                ->addUsingAlias(DefineSipocTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->getId(), $comparison);
        } elseif ($phaseComponents instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DefineSipocTableMap::COL_PHASE_COMPONENT_ID, $phaseComponents->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
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
     * @param   ChildDefineSipoc $defineSipoc Object to remove from the list of results
     *
     * @return $this|ChildDefineSipocQuery The current query, for fluid interface
     */
    public function prune($defineSipoc = null)
    {
        if ($defineSipoc) {
            $this->addUsingAlias(DefineSipocTableMap::COL_ID, $defineSipoc->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the define_sipoc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DefineSipocTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DefineSipocTableMap::clearInstancePool();
            DefineSipocTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DefineSipocTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DefineSipocTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DefineSipocTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DefineSipocTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DefineSipocQuery
