<?php

namespace Map;

use \ActionTracking;
use \ActionTrackingQuery;
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
 * This class defines the structure of the 'action_tracking' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ActionTrackingTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ActionTrackingTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'action_tracking';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ActionTracking';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ActionTracking';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 12;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 12;

    /**
     * the column name for the id field
     */
    const COL_ID = 'action_tracking.id';

    /**
     * the column name for the client_id field
     */
    const COL_CLIENT_ID = 'action_tracking.client_id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'action_tracking.project_id';

    /**
     * the column name for the table_modified field
     */
    const COL_TABLE_MODIFIED = 'action_tracking.table_modified';

    /**
     * the column name for the record_id field
     */
    const COL_RECORD_ID = 'action_tracking.record_id';

    /**
     * the column name for the field_label field
     */
    const COL_FIELD_LABEL = 'action_tracking.field_label';

    /**
     * the column name for the old_value field
     */
    const COL_OLD_VALUE = 'action_tracking.old_value';

    /**
     * the column name for the new_value field
     */
    const COL_NEW_VALUE = 'action_tracking.new_value';

    /**
     * the column name for the caption field
     */
    const COL_CAPTION = 'action_tracking.caption';

    /**
     * the column name for the icon field
     */
    const COL_ICON = 'action_tracking.icon';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'action_tracking.date_time_created';

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'action_tracking.user_id';

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
        self::TYPE_PHPNAME       => array('Id', 'ClientId', 'ProjectId', 'TableModified', 'RecordId', 'FieldLabel', 'OldValue', 'NewValue', 'Caption', 'Icon', 'DateTimeCreated', 'UserId', ),
        self::TYPE_CAMELNAME     => array('id', 'clientId', 'projectId', 'tableModified', 'recordId', 'fieldLabel', 'oldValue', 'newValue', 'caption', 'icon', 'dateTimeCreated', 'userId', ),
        self::TYPE_COLNAME       => array(ActionTrackingTableMap::COL_ID, ActionTrackingTableMap::COL_CLIENT_ID, ActionTrackingTableMap::COL_PROJECT_ID, ActionTrackingTableMap::COL_TABLE_MODIFIED, ActionTrackingTableMap::COL_RECORD_ID, ActionTrackingTableMap::COL_FIELD_LABEL, ActionTrackingTableMap::COL_OLD_VALUE, ActionTrackingTableMap::COL_NEW_VALUE, ActionTrackingTableMap::COL_CAPTION, ActionTrackingTableMap::COL_ICON, ActionTrackingTableMap::COL_DATE_TIME_CREATED, ActionTrackingTableMap::COL_USER_ID, ),
        self::TYPE_FIELDNAME     => array('id', 'client_id', 'project_id', 'table_modified', 'record_id', 'field_label', 'old_value', 'new_value', 'caption', 'icon', 'date_time_created', 'user_id', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ClientId' => 1, 'ProjectId' => 2, 'TableModified' => 3, 'RecordId' => 4, 'FieldLabel' => 5, 'OldValue' => 6, 'NewValue' => 7, 'Caption' => 8, 'Icon' => 9, 'DateTimeCreated' => 10, 'UserId' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'clientId' => 1, 'projectId' => 2, 'tableModified' => 3, 'recordId' => 4, 'fieldLabel' => 5, 'oldValue' => 6, 'newValue' => 7, 'caption' => 8, 'icon' => 9, 'dateTimeCreated' => 10, 'userId' => 11, ),
        self::TYPE_COLNAME       => array(ActionTrackingTableMap::COL_ID => 0, ActionTrackingTableMap::COL_CLIENT_ID => 1, ActionTrackingTableMap::COL_PROJECT_ID => 2, ActionTrackingTableMap::COL_TABLE_MODIFIED => 3, ActionTrackingTableMap::COL_RECORD_ID => 4, ActionTrackingTableMap::COL_FIELD_LABEL => 5, ActionTrackingTableMap::COL_OLD_VALUE => 6, ActionTrackingTableMap::COL_NEW_VALUE => 7, ActionTrackingTableMap::COL_CAPTION => 8, ActionTrackingTableMap::COL_ICON => 9, ActionTrackingTableMap::COL_DATE_TIME_CREATED => 10, ActionTrackingTableMap::COL_USER_ID => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'client_id' => 1, 'project_id' => 2, 'table_modified' => 3, 'record_id' => 4, 'field_label' => 5, 'old_value' => 6, 'new_value' => 7, 'caption' => 8, 'icon' => 9, 'date_time_created' => 10, 'user_id' => 11, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
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
        $this->setName('action_tracking');
        $this->setPhpName('ActionTracking');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\ActionTracking');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('client_id', 'ClientId', 'INTEGER', 'clients', 'id', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addColumn('table_modified', 'TableModified', 'VARCHAR', true, 25, null);
        $this->addColumn('record_id', 'RecordId', 'INTEGER', true, null, null);
        $this->addColumn('field_label', 'FieldLabel', 'VARCHAR', false, 255, null);
        $this->addColumn('old_value', 'OldValue', 'CLOB', false, null, null);
        $this->addColumn('new_value', 'NewValue', 'CLOB', false, null, null);
        $this->addColumn('caption', 'Caption', 'VARCHAR', false, 255, null);
        $this->addColumn('icon', 'Icon', 'VARCHAR', false, 25, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addForeignKey('user_id', 'UserId', 'INTEGER', 'users', 'id', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Users', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Projects', '\\Projects', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Clients', '\\Clients', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
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
        return $withPrefix ? ActionTrackingTableMap::CLASS_DEFAULT : ActionTrackingTableMap::OM_CLASS;
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
     * @return array           (ActionTracking object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ActionTrackingTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ActionTrackingTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ActionTrackingTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ActionTrackingTableMap::OM_CLASS;
            /** @var ActionTracking $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ActionTrackingTableMap::addInstanceToPool($obj, $key);
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
            $key = ActionTrackingTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ActionTrackingTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ActionTracking $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ActionTrackingTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_ID);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_CLIENT_ID);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_TABLE_MODIFIED);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_RECORD_ID);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_FIELD_LABEL);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_OLD_VALUE);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_NEW_VALUE);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_CAPTION);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_ICON);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(ActionTrackingTableMap::COL_USER_ID);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.client_id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.table_modified');
            $criteria->addSelectColumn($alias . '.record_id');
            $criteria->addSelectColumn($alias . '.field_label');
            $criteria->addSelectColumn($alias . '.old_value');
            $criteria->addSelectColumn($alias . '.new_value');
            $criteria->addSelectColumn($alias . '.caption');
            $criteria->addSelectColumn($alias . '.icon');
            $criteria->addSelectColumn($alias . '.date_time_created');
            $criteria->addSelectColumn($alias . '.user_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(ActionTrackingTableMap::DATABASE_NAME)->getTable(ActionTrackingTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ActionTrackingTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ActionTrackingTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ActionTrackingTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ActionTracking or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ActionTracking object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ActionTrackingTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ActionTracking) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ActionTrackingTableMap::DATABASE_NAME);
            $criteria->add(ActionTrackingTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ActionTrackingQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ActionTrackingTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ActionTrackingTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the action_tracking table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ActionTrackingQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ActionTracking or Criteria object.
     *
     * @param mixed               $criteria Criteria or ActionTracking object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActionTrackingTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ActionTracking object
        }

        if ($criteria->containsKey(ActionTrackingTableMap::COL_ID) && $criteria->keyContainsValue(ActionTrackingTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActionTrackingTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ActionTrackingQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ActionTrackingTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ActionTrackingTableMap::buildTableMap();
