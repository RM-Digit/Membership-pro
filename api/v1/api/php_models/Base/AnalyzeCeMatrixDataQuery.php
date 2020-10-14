<?php

namespace Base;

use \AnalyzeCeMatrixData as ChildAnalyzeCeMatrixData;
use \AnalyzeCeMatrixDataQuery as ChildAnalyzeCeMatrixDataQuery;
use \Exception;
use \PDO;
use Map\AnalyzeCeMatrixDataTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'analyze_ce_matrix_data' table.
 *
 *
 *
 * @method     ChildAnalyzeCeMatrixDataQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAnalyzeCeMatrixDataQuery orderByMatrixId($order = Criteria::ASC) Order by the matrix_id column
 * @method     ChildAnalyzeCeMatrixDataQuery orderByMatrixOutputId($order = Criteria::ASC) Order by the matrix_output_id column
 * @method     ChildAnalyzeCeMatrixDataQuery orderByCorrelation($order = Criteria::ASC) Order by the correlation column
 * @method     ChildAnalyzeCeMatrixDataQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildAnalyzeCeMatrixDataQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 *
 * @method     ChildAnalyzeCeMatrixDataQuery groupById() Group by the id column
 * @method     ChildAnalyzeCeMatrixDataQuery groupByMatrixId() Group by the matrix_id column
 * @method     ChildAnalyzeCeMatrixDataQuery groupByMatrixOutputId() Group by the matrix_output_id column
 * @method     ChildAnalyzeCeMatrixDataQuery groupByCorrelation() Group by the correlation column
 * @method     ChildAnalyzeCeMatrixDataQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildAnalyzeCeMatrixDataQuery groupByLastUpdated() Group by the last_updated column
 *
 * @method     ChildAnalyzeCeMatrixDataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAnalyzeCeMatrixDataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAnalyzeCeMatrixDataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAnalyzeCeMatrixDataQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAnalyzeCeMatrixDataQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAnalyzeCeMatrixDataQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAnalyzeCeMatrixDataQuery leftJoinAnalyzeCeMatrix($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeCeMatrix relation
 * @method     ChildAnalyzeCeMatrixDataQuery rightJoinAnalyzeCeMatrix($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeCeMatrix relation
 * @method     ChildAnalyzeCeMatrixDataQuery innerJoinAnalyzeCeMatrix($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildAnalyzeCeMatrixDataQuery joinWithAnalyzeCeMatrix($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildAnalyzeCeMatrixDataQuery leftJoinWithAnalyzeCeMatrix() Adds a LEFT JOIN clause and with to the query using the AnalyzeCeMatrix relation
 * @method     ChildAnalyzeCeMatrixDataQuery rightJoinWithAnalyzeCeMatrix() Adds a RIGHT JOIN clause and with to the query using the AnalyzeCeMatrix relation
 * @method     ChildAnalyzeCeMatrixDataQuery innerJoinWithAnalyzeCeMatrix() Adds a INNER JOIN clause and with to the query using the AnalyzeCeMatrix relation
 *
 * @method     ChildAnalyzeCeMatrixDataQuery leftJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildAnalyzeCeMatrixDataQuery rightJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildAnalyzeCeMatrixDataQuery innerJoinAnalyzeCeMatrixOutputs($relationAlias = null) Adds a INNER JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     ChildAnalyzeCeMatrixDataQuery joinWithAnalyzeCeMatrixOutputs($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     ChildAnalyzeCeMatrixDataQuery leftJoinWithAnalyzeCeMatrixOutputs() Adds a LEFT JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildAnalyzeCeMatrixDataQuery rightJoinWithAnalyzeCeMatrixOutputs() Adds a RIGHT JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 * @method     ChildAnalyzeCeMatrixDataQuery innerJoinWithAnalyzeCeMatrixOutputs() Adds a INNER JOIN clause and with to the query using the AnalyzeCeMatrixOutputs relation
 *
 * @method     \AnalyzeCeMatrixQuery|\AnalyzeCeMatrixOutputsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildAnalyzeCeMatrixData findOne(ConnectionInterface $con = null) Return the first ChildAnalyzeCeMatrixData matching the query
 * @method     ChildAnalyzeCeMatrixData findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAnalyzeCeMatrixData matching the query, or a new ChildAnalyzeCeMatrixData object populated from the query conditions when no match is found
 *
 * @method     ChildAnalyzeCeMatrixData findOneById(int $id) Return the first ChildAnalyzeCeMatrixData filtered by the id column
 * @method     ChildAnalyzeCeMatrixData findOneByMatrixId(int $matrix_id) Return the first ChildAnalyzeCeMatrixData filtered by the matrix_id column
 * @method     ChildAnalyzeCeMatrixData findOneByMatrixOutputId(int $matrix_output_id) Return the first ChildAnalyzeCeMatrixData filtered by the matrix_output_id column
 * @method     ChildAnalyzeCeMatrixData findOneByCorrelation(string $correlation) Return the first ChildAnalyzeCeMatrixData filtered by the correlation column
 * @method     ChildAnalyzeCeMatrixData findOneByDateTimeCreated(string $date_time_created) Return the first ChildAnalyzeCeMatrixData filtered by the date_time_created column
 * @method     ChildAnalyzeCeMatrixData findOneByLastUpdated(string $last_updated) Return the first ChildAnalyzeCeMatrixData filtered by the last_updated column *

 * @method     ChildAnalyzeCeMatrixData requirePk($key, ConnectionInterface $con = null) Return the ChildAnalyzeCeMatrixData by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCeMatrixData requireOne(ConnectionInterface $con = null) Return the first ChildAnalyzeCeMatrixData matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnalyzeCeMatrixData requireOneById(int $id) Return the first ChildAnalyzeCeMatrixData filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCeMatrixData requireOneByMatrixId(int $matrix_id) Return the first ChildAnalyzeCeMatrixData filtered by the matrix_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCeMatrixData requireOneByMatrixOutputId(int $matrix_output_id) Return the first ChildAnalyzeCeMatrixData filtered by the matrix_output_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCeMatrixData requireOneByCorrelation(string $correlation) Return the first ChildAnalyzeCeMatrixData filtered by the correlation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCeMatrixData requireOneByDateTimeCreated(string $date_time_created) Return the first ChildAnalyzeCeMatrixData filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAnalyzeCeMatrixData requireOneByLastUpdated(string $last_updated) Return the first ChildAnalyzeCeMatrixData filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAnalyzeCeMatrixData[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildAnalyzeCeMatrixData objects based on current ModelCriteria
 * @method     ChildAnalyzeCeMatrixData[]|ObjectCollection findById(int $id) Return ChildAnalyzeCeMatrixData objects filtered by the id column
 * @method     ChildAnalyzeCeMatrixData[]|ObjectCollection findByMatrixId(int $matrix_id) Return ChildAnalyzeCeMatrixData objects filtered by the matrix_id column
 * @method     ChildAnalyzeCeMatrixData[]|ObjectCollection findByMatrixOutputId(int $matrix_output_id) Return ChildAnalyzeCeMatrixData objects filtered by the matrix_output_id column
 * @method     ChildAnalyzeCeMatrixData[]|ObjectCollection findByCorrelation(string $correlation) Return ChildAnalyzeCeMatrixData objects filtered by the correlation column
 * @method     ChildAnalyzeCeMatrixData[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildAnalyzeCeMatrixData objects filtered by the date_time_created column
 * @method     ChildAnalyzeCeMatrixData[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildAnalyzeCeMatrixData objects filtered by the last_updated column
 * @method     ChildAnalyzeCeMatrixData[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class AnalyzeCeMatrixDataQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\AnalyzeCeMatrixDataQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AnalyzeCeMatrixData', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAnalyzeCeMatrixDataQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAnalyzeCeMatrixDataQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildAnalyzeCeMatrixDataQuery) {
            return $criteria;
        }
        $query = new ChildAnalyzeCeMatrixDataQuery();
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
     * @return ChildAnalyzeCeMatrixData|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AnalyzeCeMatrixDataTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAnalyzeCeMatrixData A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `matrix_id`, `matrix_output_id`, `correlation`, `date_time_created`, `last_updated` FROM `analyze_ce_matrix_data` WHERE `id` = :p0';
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
            /** @var ChildAnalyzeCeMatrixData $obj */
            $obj = new ChildAnalyzeCeMatrixData();
            $obj->hydrate($row);
            AnalyzeCeMatrixDataTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAnalyzeCeMatrixData|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the matrix_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMatrixId(1234); // WHERE matrix_id = 1234
     * $query->filterByMatrixId(array(12, 34)); // WHERE matrix_id IN (12, 34)
     * $query->filterByMatrixId(array('min' => 12)); // WHERE matrix_id > 12
     * </code>
     *
     * @see       filterByAnalyzeCeMatrix()
     *
     * @param     mixed $matrixId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByMatrixId($matrixId = null, $comparison = null)
    {
        if (is_array($matrixId)) {
            $useMinMax = false;
            if (isset($matrixId['min'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID, $matrixId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matrixId['max'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID, $matrixId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID, $matrixId, $comparison);
    }

    /**
     * Filter the query on the matrix_output_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMatrixOutputId(1234); // WHERE matrix_output_id = 1234
     * $query->filterByMatrixOutputId(array(12, 34)); // WHERE matrix_output_id IN (12, 34)
     * $query->filterByMatrixOutputId(array('min' => 12)); // WHERE matrix_output_id > 12
     * </code>
     *
     * @see       filterByAnalyzeCeMatrixOutputs()
     *
     * @param     mixed $matrixOutputId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByMatrixOutputId($matrixOutputId = null, $comparison = null)
    {
        if (is_array($matrixOutputId)) {
            $useMinMax = false;
            if (isset($matrixOutputId['min'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID, $matrixOutputId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($matrixOutputId['max'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID, $matrixOutputId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID, $matrixOutputId, $comparison);
    }

    /**
     * Filter the query on the correlation column
     *
     * Example usage:
     * <code>
     * $query->filterByCorrelation('fooValue');   // WHERE correlation = 'fooValue'
     * $query->filterByCorrelation('%fooValue%', Criteria::LIKE); // WHERE correlation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $correlation The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByCorrelation($correlation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($correlation)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_CORRELATION, $correlation, $comparison);
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
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
    }

    /**
     * Filter the query by a related \AnalyzeCeMatrix object
     *
     * @param \AnalyzeCeMatrix|ObjectCollection $analyzeCeMatrix The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByAnalyzeCeMatrix($analyzeCeMatrix, $comparison = null)
    {
        if ($analyzeCeMatrix instanceof \AnalyzeCeMatrix) {
            return $this
                ->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID, $analyzeCeMatrix->getId(), $comparison);
        } elseif ($analyzeCeMatrix instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID, $analyzeCeMatrix->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAnalyzeCeMatrix() only accepts arguments of type \AnalyzeCeMatrix or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnalyzeCeMatrix relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function joinAnalyzeCeMatrix($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnalyzeCeMatrix');

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
            $this->addJoinObject($join, 'AnalyzeCeMatrix');
        }

        return $this;
    }

    /**
     * Use the AnalyzeCeMatrix relation AnalyzeCeMatrix object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnalyzeCeMatrixQuery A secondary query class using the current class as primary query
     */
    public function useAnalyzeCeMatrixQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnalyzeCeMatrix($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnalyzeCeMatrix', '\AnalyzeCeMatrixQuery');
    }

    /**
     * Filter the query by a related \AnalyzeCeMatrixOutputs object
     *
     * @param \AnalyzeCeMatrixOutputs|ObjectCollection $analyzeCeMatrixOutputs The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function filterByAnalyzeCeMatrixOutputs($analyzeCeMatrixOutputs, $comparison = null)
    {
        if ($analyzeCeMatrixOutputs instanceof \AnalyzeCeMatrixOutputs) {
            return $this
                ->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID, $analyzeCeMatrixOutputs->getId(), $comparison);
        } elseif ($analyzeCeMatrixOutputs instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID, $analyzeCeMatrixOutputs->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAnalyzeCeMatrixOutputs() only accepts arguments of type \AnalyzeCeMatrixOutputs or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnalyzeCeMatrixOutputs relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function joinAnalyzeCeMatrixOutputs($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnalyzeCeMatrixOutputs');

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
            $this->addJoinObject($join, 'AnalyzeCeMatrixOutputs');
        }

        return $this;
    }

    /**
     * Use the AnalyzeCeMatrixOutputs relation AnalyzeCeMatrixOutputs object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AnalyzeCeMatrixOutputsQuery A secondary query class using the current class as primary query
     */
    public function useAnalyzeCeMatrixOutputsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAnalyzeCeMatrixOutputs($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnalyzeCeMatrixOutputs', '\AnalyzeCeMatrixOutputsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAnalyzeCeMatrixData $analyzeCeMatrixData Object to remove from the list of results
     *
     * @return $this|ChildAnalyzeCeMatrixDataQuery The current query, for fluid interface
     */
    public function prune($analyzeCeMatrixData = null)
    {
        if ($analyzeCeMatrixData) {
            $this->addUsingAlias(AnalyzeCeMatrixDataTableMap::COL_ID, $analyzeCeMatrixData->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the analyze_ce_matrix_data table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AnalyzeCeMatrixDataTableMap::clearInstancePool();
            AnalyzeCeMatrixDataTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AnalyzeCeMatrixDataTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AnalyzeCeMatrixDataTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // AnalyzeCeMatrixDataQuery
