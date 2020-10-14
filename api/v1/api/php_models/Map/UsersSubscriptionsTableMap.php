<?php

namespace Map;

use \UsersSubscriptions;
use \UsersSubscriptionsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'users_subscriptions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UsersSubscriptionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UsersSubscriptionsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'users_subscriptions';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\UsersSubscriptions';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'UsersSubscriptions';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 8;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 8;

    /**
     * the column name for the id field
     */
    const COL_ID = 'users_subscriptions.id';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'users_subscriptions.user_id';

    /**
     * the column name for the package field
     */
    const COL_PACKAGE = 'users_subscriptions.package';

    /**
     * the column name for the is_trial field
     */
    const COL_IS_TRIAL = 'users_subscriptions.is_trial';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'users_subscriptions.date_time_created';

    /**
     * the column name for the date_time_expires field
     */
    const COL_DATE_TIME_EXPIRES = 'users_subscriptions.date_time_expires';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'users_subscriptions.status';

    /**
     * the column name for the wordpress_id field
     */
    const COL_WORDPRESS_ID = 'users_subscriptions.wordpress_id';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'UserId', 'Package', 'IsTrial', 'DateTimeCreated', 'DateTimeExpires', 'Status', 'WordpressId', ),
        self::TYPE_CAMELNAME     => array('id', 'userId', 'package', 'isTrial', 'dateTimeCreated', 'dateTimeExpires', 'status', 'wordpressId', ),
        self::TYPE_COLNAME       => array(UsersSubscriptionsTableMap::COL_ID, UsersSubscriptionsTableMap::COL_USER_ID, UsersSubscriptionsTableMap::COL_PACKAGE, UsersSubscriptionsTableMap::COL_IS_TRIAL, UsersSubscriptionsTableMap::COL_DATE_TIME_CREATED, UsersSubscriptionsTableMap::COL_DATE_TIME_EXPIRES, UsersSubscriptionsTableMap::COL_STATUS, UsersSubscriptionsTableMap::COL_WORDPRESS_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'user_id', 'package', 'is_trial', 'date_time_created', 'date_time_expires', 'status', 'wordpress_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'UserId' => 1, 'Package' => 2, 'IsTrial' => 3, 'DateTimeCreated' => 4, 'DateTimeExpires' => 5, 'Status' => 6, 'WordpressId' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'userId' => 1, 'package' => 2, 'isTrial' => 3, 'dateTimeCreated' => 4, 'dateTimeExpires' => 5, 'status' => 6, 'wordpressId' => 7, ),
        self::TYPE_COLNAME       => array(UsersSubscriptionsTableMap::COL_ID => 0, UsersSubscriptionsTableMap::COL_USER_ID => 1, UsersSubscriptionsTableMap::COL_PACKAGE => 2, UsersSubscriptionsTableMap::COL_IS_TRIAL => 3, UsersSubscriptionsTableMap::COL_DATE_TIME_CREATED => 4, UsersSubscriptionsTableMap::COL_DATE_TIME_EXPIRES => 5, UsersSubscriptionsTableMap::COL_STATUS => 6, UsersSubscriptionsTableMap::COL_WORDPRESS_ID => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'user_id' => 1, 'package' => 2, 'is_trial' => 3, 'date_time_created' => 4, 'date_time_expires' => 5, 'status' => 6, 'wordpress_id' => 7, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('users_subscriptions');
        $this->setPhpName('UsersSubscriptions');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\UsersSubscriptions');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', true, null, null);
        $this->addColumn('package', 'Package', 'VARCHAR', true, 255, null);
        $this->addColumn('is_trial', 'IsTrial', 'INTEGER', true, null, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('date_time_expires', 'DateTimeExpires', 'TIMESTAMP', false, null, null);
        $this->addColumn('status', 'Status', 'VARCHAR', true, 255, null);
        $this->addColumn('wordpress_id', 'WordpressId', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? UsersSubscriptionsTableMap::CLASS_DEFAULT : UsersSubscriptionsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (UsersSubscriptions object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UsersSubscriptionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UsersSubscriptionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UsersSubscriptionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsersSubscriptionsTableMap::OM_CLASS;
            /** @var UsersSubscriptions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UsersSubscriptionsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = UsersSubscriptionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UsersSubscriptionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var UsersSubscriptions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsersSubscriptionsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(UsersSubscriptionsTableMap::COL_ID);
            $criteria->addSelectColumn(UsersSubscriptionsTableMap::COL_USER_ID);
            $criteria->addSelectColumn(UsersSubscriptionsTableMap::COL_PACKAGE);
            $criteria->addSelectColumn(UsersSubscriptionsTableMap::COL_IS_TRIAL);
            $criteria->addSelectColumn(UsersSubscriptionsTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(UsersSubscriptionsTableMap::COL_DATE_TIME_EXPIRES);
            $criteria->addSelectColumn(UsersSubscriptionsTableMap::COL_STATUS);
            $criteria->addSelectColumn(UsersSubscriptionsTableMap::COL_WORDPRESS_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.package');
            $criteria->addSelectColumn($alias . '.is_trial');
            $criteria->addSelectColumn($alias . '.date_time_created');
            $criteria->addSelectColumn($alias . '.date_time_expires');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.wordpress_id');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(UsersSubscriptionsTableMap::DATABASE_NAME)->getTable(UsersSubscriptionsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UsersSubscriptionsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UsersSubscriptionsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UsersSubscriptionsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a UsersSubscriptions or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or UsersSubscriptions object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersSubscriptionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \UsersSubscriptions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsersSubscriptionsTableMap::DATABASE_NAME);
            $criteria->add(UsersSubscriptionsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = UsersSubscriptionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UsersSubscriptionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UsersSubscriptionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the users_subscriptions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UsersSubscriptionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a UsersSubscriptions or Criteria object.
     *
     * @param mixed               $criteria Criteria or UsersSubscriptions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersSubscriptionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from UsersSubscriptions object
        }

        if ($criteria->containsKey(UsersSubscriptionsTableMap::COL_ID) && $criteria->keyContainsValue(UsersSubscriptionsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsersSubscriptionsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = UsersSubscriptionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UsersSubscriptionsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UsersSubscriptionsTableMap::buildTableMap();
