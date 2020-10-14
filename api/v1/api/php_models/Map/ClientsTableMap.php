<?php

namespace Map;

use \Clients;
use \ClientsQuery;
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
 * This class defines the structure of the 'clients' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ClientsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ClientsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'clients';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Clients';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Clients';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 15;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 15;

    /**
     * the column name for the id field
     */
    const COL_ID = 'clients.id';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'clients.name';

    /**
     * the column name for the email_address field
     */
    const COL_EMAIL_ADDRESS = 'clients.email_address';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'clients.phone';

    /**
     * the column name for the primary_contact field
     */
    const COL_PRIMARY_CONTACT = 'clients.primary_contact';

    /**
     * the column name for the street field
     */
    const COL_STREET = 'clients.street';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'clients.city';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'clients.state';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'clients.zip';

    /**
     * the column name for the country field
     */
    const COL_COUNTRY = 'clients.country';

    /**
     * the column name for the province field
     */
    const COL_PROVINCE = 'clients.province';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'clients.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'clients.last_updated';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'clients.user_id';

    /**
     * the column name for the wordpress_id field
     */
    const COL_WORDPRESS_ID = 'clients.wordpress_id';

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
        self::TYPE_PHPNAME       => array('Id', 'Name', 'EmailAddress', 'Phone', 'PrimaryContact', 'Street', 'City', 'State', 'Zip', 'Country', 'Province', 'DateTimeCreated', 'LastUpdated', 'UserId', 'WordpressId', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'emailAddress', 'phone', 'primaryContact', 'street', 'city', 'state', 'zip', 'country', 'province', 'dateTimeCreated', 'lastUpdated', 'userId', 'wordpressId', ),
        self::TYPE_COLNAME       => array(ClientsTableMap::COL_ID, ClientsTableMap::COL_NAME, ClientsTableMap::COL_EMAIL_ADDRESS, ClientsTableMap::COL_PHONE, ClientsTableMap::COL_PRIMARY_CONTACT, ClientsTableMap::COL_STREET, ClientsTableMap::COL_CITY, ClientsTableMap::COL_STATE, ClientsTableMap::COL_ZIP, ClientsTableMap::COL_COUNTRY, ClientsTableMap::COL_PROVINCE, ClientsTableMap::COL_DATE_TIME_CREATED, ClientsTableMap::COL_LAST_UPDATED, ClientsTableMap::COL_USER_ID, ClientsTableMap::COL_WORDPRESS_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'name', 'email_address', 'phone', 'primary_contact', 'street', 'city', 'state', 'zip', 'country', 'province', 'date_time_created', 'last_updated', 'user_id', 'wordpress_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'EmailAddress' => 2, 'Phone' => 3, 'PrimaryContact' => 4, 'Street' => 5, 'City' => 6, 'State' => 7, 'Zip' => 8, 'Country' => 9, 'Province' => 10, 'DateTimeCreated' => 11, 'LastUpdated' => 12, 'UserId' => 13, 'WordpressId' => 14, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'emailAddress' => 2, 'phone' => 3, 'primaryContact' => 4, 'street' => 5, 'city' => 6, 'state' => 7, 'zip' => 8, 'country' => 9, 'province' => 10, 'dateTimeCreated' => 11, 'lastUpdated' => 12, 'userId' => 13, 'wordpressId' => 14, ),
        self::TYPE_COLNAME       => array(ClientsTableMap::COL_ID => 0, ClientsTableMap::COL_NAME => 1, ClientsTableMap::COL_EMAIL_ADDRESS => 2, ClientsTableMap::COL_PHONE => 3, ClientsTableMap::COL_PRIMARY_CONTACT => 4, ClientsTableMap::COL_STREET => 5, ClientsTableMap::COL_CITY => 6, ClientsTableMap::COL_STATE => 7, ClientsTableMap::COL_ZIP => 8, ClientsTableMap::COL_COUNTRY => 9, ClientsTableMap::COL_PROVINCE => 10, ClientsTableMap::COL_DATE_TIME_CREATED => 11, ClientsTableMap::COL_LAST_UPDATED => 12, ClientsTableMap::COL_USER_ID => 13, ClientsTableMap::COL_WORDPRESS_ID => 14, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'name' => 1, 'email_address' => 2, 'phone' => 3, 'primary_contact' => 4, 'street' => 5, 'city' => 6, 'state' => 7, 'zip' => 8, 'country' => 9, 'province' => 10, 'date_time_created' => 11, 'last_updated' => 12, 'user_id' => 13, 'wordpress_id' => 14, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
        $this->setName('clients');
        $this->setPhpName('Clients');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\Clients');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('email_address', 'EmailAddress', 'VARCHAR', true, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', true, 255, null);
        $this->addColumn('primary_contact', 'PrimaryContact', 'VARCHAR', true, 255, null);
        $this->addColumn('street', 'Street', 'VARCHAR', true, 255, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 255, null);
        $this->addColumn('state', 'State', 'VARCHAR', true, 255, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', true, 255, null);
        $this->addColumn('country', 'Country', 'VARCHAR', true, 255, null);
        $this->addColumn('province', 'Province', 'VARCHAR', true, 255, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, 10, null);
        $this->addColumn('wordpress_id', 'WordpressId', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AccessLevelOptions', '\\AccessLevelOptions', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AccessLevelOptionss', false);
        $this->addRelation('AccessLevels', '\\AccessLevels', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AccessLevelss', false);
        $this->addRelation('ActionTracking', '\\ActionTracking', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ActionTrackings', false);
        $this->addRelation('Projects', '\\Projects', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'Projectss', false);
        $this->addRelation('Users', '\\Users', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'Userss', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to clients     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        AccessLevelOptionsTableMap::clearInstancePool();
        AccessLevelsTableMap::clearInstancePool();
        ActionTrackingTableMap::clearInstancePool();
        ProjectsTableMap::clearInstancePool();
        UsersTableMap::clearInstancePool();
    }

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
        return $withPrefix ? ClientsTableMap::CLASS_DEFAULT : ClientsTableMap::OM_CLASS;
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
     * @return array           (Clients object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ClientsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ClientsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ClientsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ClientsTableMap::OM_CLASS;
            /** @var Clients $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ClientsTableMap::addInstanceToPool($obj, $key);
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
            $key = ClientsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ClientsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Clients $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ClientsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ClientsTableMap::COL_ID);
            $criteria->addSelectColumn(ClientsTableMap::COL_NAME);
            $criteria->addSelectColumn(ClientsTableMap::COL_EMAIL_ADDRESS);
            $criteria->addSelectColumn(ClientsTableMap::COL_PHONE);
            $criteria->addSelectColumn(ClientsTableMap::COL_PRIMARY_CONTACT);
            $criteria->addSelectColumn(ClientsTableMap::COL_STREET);
            $criteria->addSelectColumn(ClientsTableMap::COL_CITY);
            $criteria->addSelectColumn(ClientsTableMap::COL_STATE);
            $criteria->addSelectColumn(ClientsTableMap::COL_ZIP);
            $criteria->addSelectColumn(ClientsTableMap::COL_COUNTRY);
            $criteria->addSelectColumn(ClientsTableMap::COL_PROVINCE);
            $criteria->addSelectColumn(ClientsTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(ClientsTableMap::COL_LAST_UPDATED);
            $criteria->addSelectColumn(ClientsTableMap::COL_USER_ID);
            $criteria->addSelectColumn(ClientsTableMap::COL_WORDPRESS_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.email_address');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.primary_contact');
            $criteria->addSelectColumn($alias . '.street');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.country');
            $criteria->addSelectColumn($alias . '.province');
            $criteria->addSelectColumn($alias . '.date_time_created');
            $criteria->addSelectColumn($alias . '.last_updated');
            $criteria->addSelectColumn($alias . '.user_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(ClientsTableMap::DATABASE_NAME)->getTable(ClientsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ClientsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ClientsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ClientsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Clients or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Clients object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ClientsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Clients) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ClientsTableMap::DATABASE_NAME);
            $criteria->add(ClientsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ClientsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ClientsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ClientsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the clients table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ClientsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Clients or Criteria object.
     *
     * @param mixed               $criteria Criteria or Clients object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Clients object
        }

        if ($criteria->containsKey(ClientsTableMap::COL_ID) && $criteria->keyContainsValue(ClientsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ClientsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ClientsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ClientsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ClientsTableMap::buildTableMap();
