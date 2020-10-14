<?php

namespace Base;

use \Register as ChildRegister;
use \RegisterQuery as ChildRegisterQuery;
use \Exception;
use Map\RegisterTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Register' table.
 *
 *
 *
 * @method     ChildRegisterQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildRegisterQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildRegisterQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     ChildRegisterQuery orderByConfirmpass($order = Criteria::ASC) Order by the Confirmpass column
 *
 * @method     ChildRegisterQuery groupByFirstName() Group by the first_name column
 * @method     ChildRegisterQuery groupByLastName() Group by the last_name column
 * @method     ChildRegisterQuery groupByPassword() Group by the password column
 * @method     ChildRegisterQuery groupByConfirmpass() Group by the Confirmpass column
 *
 * @method     ChildRegisterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildRegisterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildRegisterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildRegisterQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildRegisterQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildRegisterQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildRegister findOne(ConnectionInterface $con = null) Return the first ChildRegister matching the query
 * @method     ChildRegister findOneOrCreate(ConnectionInterface $con = null) Return the first ChildRegister matching the query, or a new ChildRegister object populated from the query conditions when no match is found
 *
 * @method     ChildRegister findOneByFirstName(string $first_name) Return the first ChildRegister filtered by the first_name column
 * @method     ChildRegister findOneByLastName(string $last_name) Return the first ChildRegister filtered by the last_name column
 * @method     ChildRegister findOneByPassword(string $password) Return the first ChildRegister filtered by the password column
 * @method     ChildRegister findOneByConfirmpass(string $Confirmpass) Return the first ChildRegister filtered by the Confirmpass column *

 * @method     ChildRegister requirePk($key, ConnectionInterface $con = null) Return the ChildRegister by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegister requireOne(ConnectionInterface $con = null) Return the first ChildRegister matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRegister requireOneByFirstName(string $first_name) Return the first ChildRegister filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegister requireOneByLastName(string $last_name) Return the first ChildRegister filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegister requireOneByPassword(string $password) Return the first ChildRegister filtered by the password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildRegister requireOneByConfirmpass(string $Confirmpass) Return the first ChildRegister filtered by the Confirmpass column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildRegister[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildRegister objects based on current ModelCriteria
 * @method     ChildRegister[]|ObjectCollection findByFirstName(string $first_name) Return ChildRegister objects filtered by the first_name column
 * @method     ChildRegister[]|ObjectCollection findByLastName(string $last_name) Return ChildRegister objects filtered by the last_name column
 * @method     ChildRegister[]|ObjectCollection findByPassword(string $password) Return ChildRegister objects filtered by the password column
 * @method     ChildRegister[]|ObjectCollection findByConfirmpass(string $Confirmpass) Return ChildRegister objects filtered by the Confirmpass column
 * @method     ChildRegister[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class RegisterQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\RegisterQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Register', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildRegisterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildRegisterQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildRegisterQuery) {
            return $criteria;
        }
        $query = new ChildRegisterQuery();
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
     * @return ChildRegister|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Register object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Register object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildRegisterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Register object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildRegisterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Register object has no primary key');
    }

    /**
     * Filter the query on the first_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
     * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE first_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegisterQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegisterTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the last_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
     * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE last_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegisterQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegisterTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegisterQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegisterTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the Confirmpass column
     *
     * Example usage:
     * <code>
     * $query->filterByConfirmpass('fooValue');   // WHERE Confirmpass = 'fooValue'
     * $query->filterByConfirmpass('%fooValue%', Criteria::LIKE); // WHERE Confirmpass LIKE '%fooValue%'
     * </code>
     *
     * @param     string $confirmpass The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildRegisterQuery The current query, for fluid interface
     */
    public function filterByConfirmpass($confirmpass = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($confirmpass)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegisterTableMap::COL_CONFIRMPASS, $confirmpass, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildRegister $register Object to remove from the list of results
     *
     * @return $this|ChildRegisterQuery The current query, for fluid interface
     */
    public function prune($register = null)
    {
        if ($register) {
            throw new LogicException('Register object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the Register table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(RegisterTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            RegisterTableMap::clearInstancePool();
            RegisterTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(RegisterTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(RegisterTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            RegisterTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            RegisterTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // RegisterQuery
