<?php

namespace Base;

use \Clients as ChildClients;
use \ClientsQuery as ChildClientsQuery;
use \Exception;
use \PDO;
use Map\ClientsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'clients' table.
 *
 *
 *
 * @method     ChildClientsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildClientsQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildClientsQuery orderByEmailAddress($order = Criteria::ASC) Order by the email_address column
 * @method     ChildClientsQuery orderByPhone($order = Criteria::ASC) Order by the phone column
 * @method     ChildClientsQuery orderByPrimaryContact($order = Criteria::ASC) Order by the primary_contact column
 * @method     ChildClientsQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ChildClientsQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildClientsQuery orderByState($order = Criteria::ASC) Order by the state column
 * @method     ChildClientsQuery orderByZip($order = Criteria::ASC) Order by the zip column
 * @method     ChildClientsQuery orderByCountry($order = Criteria::ASC) Order by the country column
 * @method     ChildClientsQuery orderByProvince($order = Criteria::ASC) Order by the province column
 * @method     ChildClientsQuery orderByDateTimeCreated($order = Criteria::ASC) Order by the date_time_created column
 * @method     ChildClientsQuery orderByLastUpdated($order = Criteria::ASC) Order by the last_updated column
 * @method     ChildClientsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildClientsQuery orderByWordpressId($order = Criteria::ASC) Order by the wordpress_id column
 *
 * @method     ChildClientsQuery groupById() Group by the id column
 * @method     ChildClientsQuery groupByName() Group by the name column
 * @method     ChildClientsQuery groupByEmailAddress() Group by the email_address column
 * @method     ChildClientsQuery groupByPhone() Group by the phone column
 * @method     ChildClientsQuery groupByPrimaryContact() Group by the primary_contact column
 * @method     ChildClientsQuery groupByStreet() Group by the street column
 * @method     ChildClientsQuery groupByCity() Group by the city column
 * @method     ChildClientsQuery groupByState() Group by the state column
 * @method     ChildClientsQuery groupByZip() Group by the zip column
 * @method     ChildClientsQuery groupByCountry() Group by the country column
 * @method     ChildClientsQuery groupByProvince() Group by the province column
 * @method     ChildClientsQuery groupByDateTimeCreated() Group by the date_time_created column
 * @method     ChildClientsQuery groupByLastUpdated() Group by the last_updated column
 * @method     ChildClientsQuery groupByUserId() Group by the user_id column
 * @method     ChildClientsQuery groupByWordpressId() Group by the wordpress_id column
 *
 * @method     ChildClientsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildClientsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildClientsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildClientsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildClientsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildClientsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildClientsQuery leftJoinAccessLevelOptions($relationAlias = null) Adds a LEFT JOIN clause to the query using the AccessLevelOptions relation
 * @method     ChildClientsQuery rightJoinAccessLevelOptions($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AccessLevelOptions relation
 * @method     ChildClientsQuery innerJoinAccessLevelOptions($relationAlias = null) Adds a INNER JOIN clause to the query using the AccessLevelOptions relation
 *
 * @method     ChildClientsQuery joinWithAccessLevelOptions($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AccessLevelOptions relation
 *
 * @method     ChildClientsQuery leftJoinWithAccessLevelOptions() Adds a LEFT JOIN clause and with to the query using the AccessLevelOptions relation
 * @method     ChildClientsQuery rightJoinWithAccessLevelOptions() Adds a RIGHT JOIN clause and with to the query using the AccessLevelOptions relation
 * @method     ChildClientsQuery innerJoinWithAccessLevelOptions() Adds a INNER JOIN clause and with to the query using the AccessLevelOptions relation
 *
 * @method     ChildClientsQuery leftJoinAccessLevels($relationAlias = null) Adds a LEFT JOIN clause to the query using the AccessLevels relation
 * @method     ChildClientsQuery rightJoinAccessLevels($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AccessLevels relation
 * @method     ChildClientsQuery innerJoinAccessLevels($relationAlias = null) Adds a INNER JOIN clause to the query using the AccessLevels relation
 *
 * @method     ChildClientsQuery joinWithAccessLevels($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the AccessLevels relation
 *
 * @method     ChildClientsQuery leftJoinWithAccessLevels() Adds a LEFT JOIN clause and with to the query using the AccessLevels relation
 * @method     ChildClientsQuery rightJoinWithAccessLevels() Adds a RIGHT JOIN clause and with to the query using the AccessLevels relation
 * @method     ChildClientsQuery innerJoinWithAccessLevels() Adds a INNER JOIN clause and with to the query using the AccessLevels relation
 *
 * @method     ChildClientsQuery leftJoinActionTracking($relationAlias = null) Adds a LEFT JOIN clause to the query using the ActionTracking relation
 * @method     ChildClientsQuery rightJoinActionTracking($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ActionTracking relation
 * @method     ChildClientsQuery innerJoinActionTracking($relationAlias = null) Adds a INNER JOIN clause to the query using the ActionTracking relation
 *
 * @method     ChildClientsQuery joinWithActionTracking($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ActionTracking relation
 *
 * @method     ChildClientsQuery leftJoinWithActionTracking() Adds a LEFT JOIN clause and with to the query using the ActionTracking relation
 * @method     ChildClientsQuery rightJoinWithActionTracking() Adds a RIGHT JOIN clause and with to the query using the ActionTracking relation
 * @method     ChildClientsQuery innerJoinWithActionTracking() Adds a INNER JOIN clause and with to the query using the ActionTracking relation
 *
 * @method     ChildClientsQuery leftJoinProjects($relationAlias = null) Adds a LEFT JOIN clause to the query using the Projects relation
 * @method     ChildClientsQuery rightJoinProjects($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Projects relation
 * @method     ChildClientsQuery innerJoinProjects($relationAlias = null) Adds a INNER JOIN clause to the query using the Projects relation
 *
 * @method     ChildClientsQuery joinWithProjects($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Projects relation
 *
 * @method     ChildClientsQuery leftJoinWithProjects() Adds a LEFT JOIN clause and with to the query using the Projects relation
 * @method     ChildClientsQuery rightJoinWithProjects() Adds a RIGHT JOIN clause and with to the query using the Projects relation
 * @method     ChildClientsQuery innerJoinWithProjects() Adds a INNER JOIN clause and with to the query using the Projects relation
 *
 * @method     ChildClientsQuery leftJoinUsers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Users relation
 * @method     ChildClientsQuery rightJoinUsers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Users relation
 * @method     ChildClientsQuery innerJoinUsers($relationAlias = null) Adds a INNER JOIN clause to the query using the Users relation
 *
 * @method     ChildClientsQuery joinWithUsers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Users relation
 *
 * @method     ChildClientsQuery leftJoinWithUsers() Adds a LEFT JOIN clause and with to the query using the Users relation
 * @method     ChildClientsQuery rightJoinWithUsers() Adds a RIGHT JOIN clause and with to the query using the Users relation
 * @method     ChildClientsQuery innerJoinWithUsers() Adds a INNER JOIN clause and with to the query using the Users relation
 *
 * @method     \AccessLevelOptionsQuery|\AccessLevelsQuery|\ActionTrackingQuery|\ProjectsQuery|\UsersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildClients findOne(ConnectionInterface $con = null) Return the first ChildClients matching the query
 * @method     ChildClients findOneOrCreate(ConnectionInterface $con = null) Return the first ChildClients matching the query, or a new ChildClients object populated from the query conditions when no match is found
 *
 * @method     ChildClients findOneById(int $id) Return the first ChildClients filtered by the id column
 * @method     ChildClients findOneByName(string $name) Return the first ChildClients filtered by the name column
 * @method     ChildClients findOneByEmailAddress(string $email_address) Return the first ChildClients filtered by the email_address column
 * @method     ChildClients findOneByPhone(string $phone) Return the first ChildClients filtered by the phone column
 * @method     ChildClients findOneByPrimaryContact(string $primary_contact) Return the first ChildClients filtered by the primary_contact column
 * @method     ChildClients findOneByStreet(string $street) Return the first ChildClients filtered by the street column
 * @method     ChildClients findOneByCity(string $city) Return the first ChildClients filtered by the city column
 * @method     ChildClients findOneByState(string $state) Return the first ChildClients filtered by the state column
 * @method     ChildClients findOneByZip(string $zip) Return the first ChildClients filtered by the zip column
 * @method     ChildClients findOneByCountry(string $country) Return the first ChildClients filtered by the country column
 * @method     ChildClients findOneByProvince(string $province) Return the first ChildClients filtered by the province column
 * @method     ChildClients findOneByDateTimeCreated(string $date_time_created) Return the first ChildClients filtered by the date_time_created column
 * @method     ChildClients findOneByLastUpdated(string $last_updated) Return the first ChildClients filtered by the last_updated column
 * @method     ChildClients findOneByUserId(int $user_id) Return the first ChildClients filtered by the user_id column
 * @method     ChildClients findOneByWordpressId(int $wordpress_id) Return the first ChildClients filtered by the wordpress_id column *

 * @method     ChildClients requirePk($key, ConnectionInterface $con = null) Return the ChildClients by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOne(ConnectionInterface $con = null) Return the first ChildClients matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClients requireOneById(int $id) Return the first ChildClients filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByName(string $name) Return the first ChildClients filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByEmailAddress(string $email_address) Return the first ChildClients filtered by the email_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByPhone(string $phone) Return the first ChildClients filtered by the phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByPrimaryContact(string $primary_contact) Return the first ChildClients filtered by the primary_contact column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByStreet(string $street) Return the first ChildClients filtered by the street column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByCity(string $city) Return the first ChildClients filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByState(string $state) Return the first ChildClients filtered by the state column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByZip(string $zip) Return the first ChildClients filtered by the zip column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByCountry(string $country) Return the first ChildClients filtered by the country column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByProvince(string $province) Return the first ChildClients filtered by the province column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByDateTimeCreated(string $date_time_created) Return the first ChildClients filtered by the date_time_created column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByLastUpdated(string $last_updated) Return the first ChildClients filtered by the last_updated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByUserId(int $user_id) Return the first ChildClients filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildClients requireOneByWordpressId(int $wordpress_id) Return the first ChildClients filtered by the wordpress_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildClients[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildClients objects based on current ModelCriteria
 * @method     ChildClients[]|ObjectCollection findById(int $id) Return ChildClients objects filtered by the id column
 * @method     ChildClients[]|ObjectCollection findByName(string $name) Return ChildClients objects filtered by the name column
 * @method     ChildClients[]|ObjectCollection findByEmailAddress(string $email_address) Return ChildClients objects filtered by the email_address column
 * @method     ChildClients[]|ObjectCollection findByPhone(string $phone) Return ChildClients objects filtered by the phone column
 * @method     ChildClients[]|ObjectCollection findByPrimaryContact(string $primary_contact) Return ChildClients objects filtered by the primary_contact column
 * @method     ChildClients[]|ObjectCollection findByStreet(string $street) Return ChildClients objects filtered by the street column
 * @method     ChildClients[]|ObjectCollection findByCity(string $city) Return ChildClients objects filtered by the city column
 * @method     ChildClients[]|ObjectCollection findByState(string $state) Return ChildClients objects filtered by the state column
 * @method     ChildClients[]|ObjectCollection findByZip(string $zip) Return ChildClients objects filtered by the zip column
 * @method     ChildClients[]|ObjectCollection findByCountry(string $country) Return ChildClients objects filtered by the country column
 * @method     ChildClients[]|ObjectCollection findByProvince(string $province) Return ChildClients objects filtered by the province column
 * @method     ChildClients[]|ObjectCollection findByDateTimeCreated(string $date_time_created) Return ChildClients objects filtered by the date_time_created column
 * @method     ChildClients[]|ObjectCollection findByLastUpdated(string $last_updated) Return ChildClients objects filtered by the last_updated column
 * @method     ChildClients[]|ObjectCollection findByUserId(int $user_id) Return ChildClients objects filtered by the user_id column
 * @method     ChildClients[]|ObjectCollection findByWordpressId(int $wordpress_id) Return ChildClients objects filtered by the wordpress_id column
 * @method     ChildClients[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ClientsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ClientsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Clients', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildClientsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildClientsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildClientsQuery) {
            return $criteria;
        }
        $query = new ChildClientsQuery();
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
     * @return ChildClients|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ClientsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ClientsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildClients A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id`, `name`, `email_address`, `phone`, `primary_contact`, `street`, `city`, `state`, `zip`, `country`, `province`, `date_time_created`, `last_updated`, `user_id`, `wordpress_id` FROM `clients` WHERE `id` = :p0';
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
            /** @var ChildClients $obj */
            $obj = new ChildClients();
            $obj->hydrate($row);
            ClientsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildClients|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ClientsTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ClientsTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ClientsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ClientsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the email_address column
     *
     * Example usage:
     * <code>
     * $query->filterByEmailAddress('fooValue');   // WHERE email_address = 'fooValue'
     * $query->filterByEmailAddress('%fooValue%', Criteria::LIKE); // WHERE email_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $emailAddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByEmailAddress($emailAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($emailAddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_EMAIL_ADDRESS, $emailAddress, $comparison);
    }

    /**
     * Filter the query on the phone column
     *
     * Example usage:
     * <code>
     * $query->filterByPhone('fooValue');   // WHERE phone = 'fooValue'
     * $query->filterByPhone('%fooValue%', Criteria::LIKE); // WHERE phone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $phone The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByPhone($phone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($phone)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_PHONE, $phone, $comparison);
    }

    /**
     * Filter the query on the primary_contact column
     *
     * Example usage:
     * <code>
     * $query->filterByPrimaryContact('fooValue');   // WHERE primary_contact = 'fooValue'
     * $query->filterByPrimaryContact('%fooValue%', Criteria::LIKE); // WHERE primary_contact LIKE '%fooValue%'
     * </code>
     *
     * @param     string $primaryContact The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByPrimaryContact($primaryContact = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($primaryContact)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_PRIMARY_CONTACT, $primaryContact, $comparison);
    }

    /**
     * Filter the query on the street column
     *
     * Example usage:
     * <code>
     * $query->filterByStreet('fooValue');   // WHERE street = 'fooValue'
     * $query->filterByStreet('%fooValue%', Criteria::LIKE); // WHERE street LIKE '%fooValue%'
     * </code>
     *
     * @param     string $street The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByStreet($street = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($street)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_STREET, $street, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_CITY, $city, $comparison);
    }

    /**
     * Filter the query on the state column
     *
     * Example usage:
     * <code>
     * $query->filterByState('fooValue');   // WHERE state = 'fooValue'
     * $query->filterByState('%fooValue%', Criteria::LIKE); // WHERE state LIKE '%fooValue%'
     * </code>
     *
     * @param     string $state The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByState($state = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($state)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_STATE, $state, $comparison);
    }

    /**
     * Filter the query on the zip column
     *
     * Example usage:
     * <code>
     * $query->filterByZip('fooValue');   // WHERE zip = 'fooValue'
     * $query->filterByZip('%fooValue%', Criteria::LIKE); // WHERE zip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zip The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByZip($zip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zip)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_ZIP, $zip, $comparison);
    }

    /**
     * Filter the query on the country column
     *
     * Example usage:
     * <code>
     * $query->filterByCountry('fooValue');   // WHERE country = 'fooValue'
     * $query->filterByCountry('%fooValue%', Criteria::LIKE); // WHERE country LIKE '%fooValue%'
     * </code>
     *
     * @param     string $country The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByCountry($country = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($country)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_COUNTRY, $country, $comparison);
    }

    /**
     * Filter the query on the province column
     *
     * Example usage:
     * <code>
     * $query->filterByProvince('fooValue');   // WHERE province = 'fooValue'
     * $query->filterByProvince('%fooValue%', Criteria::LIKE); // WHERE province LIKE '%fooValue%'
     * </code>
     *
     * @param     string $province The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByProvince($province = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($province)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_PROVINCE, $province, $comparison);
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
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByDateTimeCreated($dateTimeCreated = null, $comparison = null)
    {
        if (is_array($dateTimeCreated)) {
            $useMinMax = false;
            if (isset($dateTimeCreated['min'])) {
                $this->addUsingAlias(ClientsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateTimeCreated['max'])) {
                $this->addUsingAlias(ClientsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_DATE_TIME_CREATED, $dateTimeCreated, $comparison);
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
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByLastUpdated($lastUpdated = null, $comparison = null)
    {
        if (is_array($lastUpdated)) {
            $useMinMax = false;
            if (isset($lastUpdated['min'])) {
                $this->addUsingAlias(ClientsTableMap::COL_LAST_UPDATED, $lastUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdated['max'])) {
                $this->addUsingAlias(ClientsTableMap::COL_LAST_UPDATED, $lastUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_LAST_UPDATED, $lastUpdated, $comparison);
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
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(ClientsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(ClientsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the wordpress_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWordpressId(1234); // WHERE wordpress_id = 1234
     * $query->filterByWordpressId(array(12, 34)); // WHERE wordpress_id IN (12, 34)
     * $query->filterByWordpressId(array('min' => 12)); // WHERE wordpress_id > 12
     * </code>
     *
     * @param     mixed $wordpressId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function filterByWordpressId($wordpressId = null, $comparison = null)
    {
        if (is_array($wordpressId)) {
            $useMinMax = false;
            if (isset($wordpressId['min'])) {
                $this->addUsingAlias(ClientsTableMap::COL_WORDPRESS_ID, $wordpressId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wordpressId['max'])) {
                $this->addUsingAlias(ClientsTableMap::COL_WORDPRESS_ID, $wordpressId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ClientsTableMap::COL_WORDPRESS_ID, $wordpressId, $comparison);
    }

    /**
     * Filter the query by a related \AccessLevelOptions object
     *
     * @param \AccessLevelOptions|ObjectCollection $accessLevelOptions the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClientsQuery The current query, for fluid interface
     */
    public function filterByAccessLevelOptions($accessLevelOptions, $comparison = null)
    {
        if ($accessLevelOptions instanceof \AccessLevelOptions) {
            return $this
                ->addUsingAlias(ClientsTableMap::COL_ID, $accessLevelOptions->getClientId(), $comparison);
        } elseif ($accessLevelOptions instanceof ObjectCollection) {
            return $this
                ->useAccessLevelOptionsQuery()
                ->filterByPrimaryKeys($accessLevelOptions->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAccessLevelOptions() only accepts arguments of type \AccessLevelOptions or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AccessLevelOptions relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function joinAccessLevelOptions($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AccessLevelOptions');

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
            $this->addJoinObject($join, 'AccessLevelOptions');
        }

        return $this;
    }

    /**
     * Use the AccessLevelOptions relation AccessLevelOptions object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AccessLevelOptionsQuery A secondary query class using the current class as primary query
     */
    public function useAccessLevelOptionsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAccessLevelOptions($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AccessLevelOptions', '\AccessLevelOptionsQuery');
    }

    /**
     * Filter the query by a related \AccessLevels object
     *
     * @param \AccessLevels|ObjectCollection $accessLevels the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClientsQuery The current query, for fluid interface
     */
    public function filterByAccessLevels($accessLevels, $comparison = null)
    {
        if ($accessLevels instanceof \AccessLevels) {
            return $this
                ->addUsingAlias(ClientsTableMap::COL_ID, $accessLevels->getClientId(), $comparison);
        } elseif ($accessLevels instanceof ObjectCollection) {
            return $this
                ->useAccessLevelsQuery()
                ->filterByPrimaryKeys($accessLevels->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAccessLevels() only accepts arguments of type \AccessLevels or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AccessLevels relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function joinAccessLevels($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AccessLevels');

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
            $this->addJoinObject($join, 'AccessLevels');
        }

        return $this;
    }

    /**
     * Use the AccessLevels relation AccessLevels object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AccessLevelsQuery A secondary query class using the current class as primary query
     */
    public function useAccessLevelsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAccessLevels($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AccessLevels', '\AccessLevelsQuery');
    }

    /**
     * Filter the query by a related \ActionTracking object
     *
     * @param \ActionTracking|ObjectCollection $actionTracking the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClientsQuery The current query, for fluid interface
     */
    public function filterByActionTracking($actionTracking, $comparison = null)
    {
        if ($actionTracking instanceof \ActionTracking) {
            return $this
                ->addUsingAlias(ClientsTableMap::COL_ID, $actionTracking->getClientId(), $comparison);
        } elseif ($actionTracking instanceof ObjectCollection) {
            return $this
                ->useActionTrackingQuery()
                ->filterByPrimaryKeys($actionTracking->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByActionTracking() only accepts arguments of type \ActionTracking or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ActionTracking relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function joinActionTracking($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ActionTracking');

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
            $this->addJoinObject($join, 'ActionTracking');
        }

        return $this;
    }

    /**
     * Use the ActionTracking relation ActionTracking object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ActionTrackingQuery A secondary query class using the current class as primary query
     */
    public function useActionTrackingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinActionTracking($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ActionTracking', '\ActionTrackingQuery');
    }

    /**
     * Filter the query by a related \Projects object
     *
     * @param \Projects|ObjectCollection $projects the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClientsQuery The current query, for fluid interface
     */
    public function filterByProjects($projects, $comparison = null)
    {
        if ($projects instanceof \Projects) {
            return $this
                ->addUsingAlias(ClientsTableMap::COL_ID, $projects->getClientId(), $comparison);
        } elseif ($projects instanceof ObjectCollection) {
            return $this
                ->useProjectsQuery()
                ->filterByPrimaryKeys($projects->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function joinProjects($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useProjectsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinProjects($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Projects', '\ProjectsQuery');
    }

    /**
     * Filter the query by a related \Users object
     *
     * @param \Users|ObjectCollection $users the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildClientsQuery The current query, for fluid interface
     */
    public function filterByUsers($users, $comparison = null)
    {
        if ($users instanceof \Users) {
            return $this
                ->addUsingAlias(ClientsTableMap::COL_ID, $users->getClientId(), $comparison);
        } elseif ($users instanceof ObjectCollection) {
            return $this
                ->useUsersQuery()
                ->filterByPrimaryKeys($users->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildClientsQuery The current query, for fluid interface
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
     * @param   ChildClients $clients Object to remove from the list of results
     *
     * @return $this|ChildClientsQuery The current query, for fluid interface
     */
    public function prune($clients = null)
    {
        if ($clients) {
            $this->addUsingAlias(ClientsTableMap::COL_ID, $clients->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the clients table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ClientsTableMap::clearInstancePool();
            ClientsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ClientsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ClientsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ClientsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ClientsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ClientsQuery
