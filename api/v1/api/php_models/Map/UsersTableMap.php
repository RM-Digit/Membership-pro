<?php

namespace Map;

use \Users;
use \UsersQuery;
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
 * This class defines the structure of the 'users' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UsersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.UsersTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'users';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Users';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Users';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 22;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 22;

    /**
     * the column name for the id field
     */
    const COL_ID = 'users.id';

    /**
     * the column name for the client_id field
     */
    const COL_CLIENT_ID = 'users.client_id';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'users.status';

    /**
     * the column name for the access_level_id field
     */
    const COL_ACCESS_LEVEL_ID = 'users.access_level_id';

    /**
     * the column name for the email_address field
     */
    const COL_EMAIL_ADDRESS = 'users.email_address';

    /**
     * the column name for the password field
     */
    const COL_PASSWORD = 'users.password';

    /**
     * the column name for the first_name field
     */
    const COL_FIRST_NAME = 'users.first_name';

    /**
     * the column name for the last_name field
     */
    const COL_LAST_NAME = 'users.last_name';

    /**
     * the column name for the work_title field
     */
    const COL_WORK_TITLE = 'users.work_title';

    /**
     * the column name for the reports_to field
     */
    const COL_REPORTS_TO = 'users.reports_to';

    /**
     * the column name for the profile_image_url field
     */
    const COL_PROFILE_IMAGE_URL = 'users.profile_image_url';

    /**
     * the column name for the phone field
     */
    const COL_PHONE = 'users.phone';

    /**
     * the column name for the city field
     */
    const COL_CITY = 'users.city';

    /**
     * the column name for the state field
     */
    const COL_STATE = 'users.state';

    /**
     * the column name for the zip field
     */
    const COL_ZIP = 'users.zip';

    /**
     * the column name for the time_zone field
     */
    const COL_TIME_ZONE = 'users.time_zone';

    /**
     * the column name for the is_logged_in field
     */
    const COL_IS_LOGGED_IN = 'users.is_logged_in';

    /**
     * the column name for the last_login field
     */
    const COL_LAST_LOGIN = 'users.last_login';

    /**
     * the column name for the created_by field
     */
    const COL_CREATED_BY = 'users.created_by';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'users.last_updated';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'users.date_time_created';

    /**
     * the column name for the wordpress_id field
     */
    const COL_WORDPRESS_ID = 'users.wordpress_id';

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
        self::TYPE_PHPNAME       => array('Id', 'ClientId', 'Status', 'AccessLevelId', 'EmailAddress', 'Password', 'FirstName', 'LastName', 'WorkTitle', 'ReportsTo', 'ProfileImageUrl', 'Phone', 'City', 'State', 'Zip', 'TimeZone', 'IsLoggedIn', 'LastLogin', 'CreatedBy', 'LastUpdated', 'DateTimeCreated', 'WordpressId', ),
        self::TYPE_CAMELNAME     => array('id', 'clientId', 'status', 'accessLevelId', 'emailAddress', 'password', 'firstName', 'lastName', 'workTitle', 'reportsTo', 'profileImageUrl', 'phone', 'city', 'state', 'zip', 'timeZone', 'isLoggedIn', 'lastLogin', 'createdBy', 'lastUpdated', 'dateTimeCreated', 'wordpressId', ),
        self::TYPE_COLNAME       => array(UsersTableMap::COL_ID, UsersTableMap::COL_CLIENT_ID, UsersTableMap::COL_STATUS, UsersTableMap::COL_ACCESS_LEVEL_ID, UsersTableMap::COL_EMAIL_ADDRESS, UsersTableMap::COL_PASSWORD, UsersTableMap::COL_FIRST_NAME, UsersTableMap::COL_LAST_NAME, UsersTableMap::COL_WORK_TITLE, UsersTableMap::COL_REPORTS_TO, UsersTableMap::COL_PROFILE_IMAGE_URL, UsersTableMap::COL_PHONE, UsersTableMap::COL_CITY, UsersTableMap::COL_STATE, UsersTableMap::COL_ZIP, UsersTableMap::COL_TIME_ZONE, UsersTableMap::COL_IS_LOGGED_IN, UsersTableMap::COL_LAST_LOGIN, UsersTableMap::COL_CREATED_BY, UsersTableMap::COL_LAST_UPDATED, UsersTableMap::COL_DATE_TIME_CREATED, UsersTableMap::COL_WORDPRESS_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'client_id', 'status', 'access_level_id', 'email_address', 'password', 'first_name', 'last_name', 'work_title', 'reports_to', 'profile_image_url', 'phone', 'city', 'state', 'zip', 'time_zone', 'is_logged_in', 'last_login', 'created_by', 'last_updated', 'date_time_created', 'wordpress_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ClientId' => 1, 'Status' => 2, 'AccessLevelId' => 3, 'EmailAddress' => 4, 'Password' => 5, 'FirstName' => 6, 'LastName' => 7, 'WorkTitle' => 8, 'ReportsTo' => 9, 'ProfileImageUrl' => 10, 'Phone' => 11, 'City' => 12, 'State' => 13, 'Zip' => 14, 'TimeZone' => 15, 'IsLoggedIn' => 16, 'LastLogin' => 17, 'CreatedBy' => 18, 'LastUpdated' => 19, 'DateTimeCreated' => 20, 'WordpressId' => 21, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'clientId' => 1, 'status' => 2, 'accessLevelId' => 3, 'emailAddress' => 4, 'password' => 5, 'firstName' => 6, 'lastName' => 7, 'workTitle' => 8, 'reportsTo' => 9, 'profileImageUrl' => 10, 'phone' => 11, 'city' => 12, 'state' => 13, 'zip' => 14, 'timeZone' => 15, 'isLoggedIn' => 16, 'lastLogin' => 17, 'createdBy' => 18, 'lastUpdated' => 19, 'dateTimeCreated' => 20, 'wordpressId' => 21, ),
        self::TYPE_COLNAME       => array(UsersTableMap::COL_ID => 0, UsersTableMap::COL_CLIENT_ID => 1, UsersTableMap::COL_STATUS => 2, UsersTableMap::COL_ACCESS_LEVEL_ID => 3, UsersTableMap::COL_EMAIL_ADDRESS => 4, UsersTableMap::COL_PASSWORD => 5, UsersTableMap::COL_FIRST_NAME => 6, UsersTableMap::COL_LAST_NAME => 7, UsersTableMap::COL_WORK_TITLE => 8, UsersTableMap::COL_REPORTS_TO => 9, UsersTableMap::COL_PROFILE_IMAGE_URL => 10, UsersTableMap::COL_PHONE => 11, UsersTableMap::COL_CITY => 12, UsersTableMap::COL_STATE => 13, UsersTableMap::COL_ZIP => 14, UsersTableMap::COL_TIME_ZONE => 15, UsersTableMap::COL_IS_LOGGED_IN => 16, UsersTableMap::COL_LAST_LOGIN => 17, UsersTableMap::COL_CREATED_BY => 18, UsersTableMap::COL_LAST_UPDATED => 19, UsersTableMap::COL_DATE_TIME_CREATED => 20, UsersTableMap::COL_WORDPRESS_ID => 21, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'client_id' => 1, 'status' => 2, 'access_level_id' => 3, 'email_address' => 4, 'password' => 5, 'first_name' => 6, 'last_name' => 7, 'work_title' => 8, 'reports_to' => 9, 'profile_image_url' => 10, 'phone' => 11, 'city' => 12, 'state' => 13, 'zip' => 14, 'time_zone' => 15, 'is_logged_in' => 16, 'last_login' => 17, 'created_by' => 18, 'last_updated' => 19, 'date_time_created' => 20, 'wordpress_id' => 21, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
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
        $this->setName('users');
        $this->setPhpName('Users');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\Users');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('client_id', 'ClientId', 'INTEGER', 'clients', 'id', false, null, null);
        $this->addColumn('status', 'Status', 'CHAR', true, null, 'pending');
        $this->addForeignKey('access_level_id', 'AccessLevelId', 'INTEGER', 'access_levels', 'id', false, null, null);
        $this->addColumn('email_address', 'EmailAddress', 'VARCHAR', true, 55, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', true, 55, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', true, 55, null);
        $this->addColumn('work_title', 'WorkTitle', 'VARCHAR', false, 255, null);
        $this->addForeignKey('reports_to', 'ReportsTo', 'INTEGER', 'users', 'id', false, null, null);
        $this->addColumn('profile_image_url', 'ProfileImageUrl', 'VARCHAR', false, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 25, null);
        $this->addColumn('city', 'City', 'VARCHAR', false, 255, null);
        $this->addColumn('state', 'State', 'VARCHAR', false, 255, null);
        $this->addColumn('zip', 'Zip', 'VARCHAR', false, 25, null);
        $this->addColumn('time_zone', 'TimeZone', 'VARCHAR', false, 10, null);
        $this->addColumn('is_logged_in', 'IsLoggedIn', 'INTEGER', true, 1, 0);
        $this->addColumn('last_login', 'LastLogin', 'TIMESTAMP', false, null, null);
        $this->addColumn('created_by', 'CreatedBy', 'INTEGER', false, null, null);
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('wordpress_id', 'WordpressId', 'INTEGER', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Clients', '\\Clients', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('AccessLevels', '\\AccessLevels', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':access_level_id',
    1 => ':id',
  ),
), 'SET NULL', null, null, false);
        $this->addRelation('UsersRelatedByReportsTo', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':reports_to',
    1 => ':id',
  ),
), 'SET NULL', null, null, false);
        $this->addRelation('ActionTracking', '\\ActionTracking', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ActionTrackings', false);
        $this->addRelation('ControlControlPlan', '\\ControlControlPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':who_measures',
    1 => ':id',
  ),
), 'SET NULL', null, 'ControlControlPlans', false);
        $this->addRelation('ControlTestPlan', '\\ControlTestPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':responsible_party',
    1 => ':id',
  ),
), 'SET NULL', null, 'ControlTestPlans', false);
        $this->addRelation('DefineCommunication', '\\DefineCommunication', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':owner',
    1 => ':id',
  ),
), 'SET NULL', null, 'DefineCommunications', false);
        $this->addRelation('DefineRiskManagement', '\\DefineRiskManagement', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':person_accountable',
    1 => ':id',
  ),
), 'SET NULL', null, 'DefineRiskManagements', false);
        $this->addRelation('DefineStakeholders', '\\DefineStakeholders', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineStakeholderss', false);
        $this->addRelation('MeasureControlPlan', '\\MeasureControlPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':who_measures',
    1 => ':id',
  ),
), 'SET NULL', null, 'MeasureControlPlans', false);
        $this->addRelation('ProjectsRelatedByCreatedBy', '\\Projects', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':created_by',
    1 => ':id',
  ),
), null, null, 'ProjectssRelatedByCreatedBy', false);
        $this->addRelation('ProjectsRelatedBySponsor', '\\Projects', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':sponsor',
    1 => ':id',
  ),
), null, null, 'ProjectssRelatedBySponsor', false);
        $this->addRelation('ProjectsRelatedByLead', '\\Projects', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':lead',
    1 => ':id',
  ),
), 'SET NULL', null, 'ProjectssRelatedByLead', false);
        $this->addRelation('UsersRelatedById', '\\Users', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':reports_to',
    1 => ':id',
  ),
), 'SET NULL', null, 'UserssRelatedById', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to users     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ActionTrackingTableMap::clearInstancePool();
        ControlControlPlanTableMap::clearInstancePool();
        ControlTestPlanTableMap::clearInstancePool();
        DefineCommunicationTableMap::clearInstancePool();
        DefineRiskManagementTableMap::clearInstancePool();
        DefineStakeholdersTableMap::clearInstancePool();
        MeasureControlPlanTableMap::clearInstancePool();
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
        return $withPrefix ? UsersTableMap::CLASS_DEFAULT : UsersTableMap::OM_CLASS;
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
     * @return array           (Users object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UsersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UsersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UsersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UsersTableMap::OM_CLASS;
            /** @var Users $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UsersTableMap::addInstanceToPool($obj, $key);
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
            $key = UsersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UsersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Users $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UsersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UsersTableMap::COL_ID);
            $criteria->addSelectColumn(UsersTableMap::COL_CLIENT_ID);
            $criteria->addSelectColumn(UsersTableMap::COL_STATUS);
            $criteria->addSelectColumn(UsersTableMap::COL_ACCESS_LEVEL_ID);
            $criteria->addSelectColumn(UsersTableMap::COL_EMAIL_ADDRESS);
            $criteria->addSelectColumn(UsersTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(UsersTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(UsersTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(UsersTableMap::COL_WORK_TITLE);
            $criteria->addSelectColumn(UsersTableMap::COL_REPORTS_TO);
            $criteria->addSelectColumn(UsersTableMap::COL_PROFILE_IMAGE_URL);
            $criteria->addSelectColumn(UsersTableMap::COL_PHONE);
            $criteria->addSelectColumn(UsersTableMap::COL_CITY);
            $criteria->addSelectColumn(UsersTableMap::COL_STATE);
            $criteria->addSelectColumn(UsersTableMap::COL_ZIP);
            $criteria->addSelectColumn(UsersTableMap::COL_TIME_ZONE);
            $criteria->addSelectColumn(UsersTableMap::COL_IS_LOGGED_IN);
            $criteria->addSelectColumn(UsersTableMap::COL_LAST_LOGIN);
            $criteria->addSelectColumn(UsersTableMap::COL_CREATED_BY);
            $criteria->addSelectColumn(UsersTableMap::COL_LAST_UPDATED);
            $criteria->addSelectColumn(UsersTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(UsersTableMap::COL_WORDPRESS_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.client_id');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.access_level_id');
            $criteria->addSelectColumn($alias . '.email_address');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.work_title');
            $criteria->addSelectColumn($alias . '.reports_to');
            $criteria->addSelectColumn($alias . '.profile_image_url');
            $criteria->addSelectColumn($alias . '.phone');
            $criteria->addSelectColumn($alias . '.city');
            $criteria->addSelectColumn($alias . '.state');
            $criteria->addSelectColumn($alias . '.zip');
            $criteria->addSelectColumn($alias . '.time_zone');
            $criteria->addSelectColumn($alias . '.is_logged_in');
            $criteria->addSelectColumn($alias . '.last_login');
            $criteria->addSelectColumn($alias . '.created_by');
            $criteria->addSelectColumn($alias . '.last_updated');
            $criteria->addSelectColumn($alias . '.date_time_created');
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
        return Propel::getServiceContainer()->getDatabaseMap(UsersTableMap::DATABASE_NAME)->getTable(UsersTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UsersTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UsersTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UsersTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Users or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Users object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Users) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UsersTableMap::DATABASE_NAME);
            $criteria->add(UsersTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = UsersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UsersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UsersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the users table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UsersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Users or Criteria object.
     *
     * @param mixed               $criteria Criteria or Users object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Users object
        }

        if ($criteria->containsKey(UsersTableMap::COL_ID) && $criteria->keyContainsValue(UsersTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsersTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = UsersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UsersTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UsersTableMap::buildTableMap();
