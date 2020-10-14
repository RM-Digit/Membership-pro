<?php

namespace Map;

use \DefineCommunication;
use \DefineCommunicationQuery;
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
 * This class defines the structure of the 'define_communication' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DefineCommunicationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DefineCommunicationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'define_communication';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\DefineCommunication';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'DefineCommunication';

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
    const COL_ID = 'define_communication.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'define_communication.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'define_communication.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'define_communication.phase_component_id';

    /**
     * the column name for the media field
     */
    const COL_MEDIA = 'define_communication.media';

    /**
     * the column name for the purpose field
     */
    const COL_PURPOSE = 'define_communication.purpose';

    /**
     * the column name for the owner field
     */
    const COL_OWNER = 'define_communication.owner';

    /**
     * the column name for the frequency field
     */
    const COL_FREQUENCY = 'define_communication.frequency';

    /**
     * the column name for the day_time field
     */
    const COL_DAY_TIME = 'define_communication.day_time';

    /**
     * the column name for the length field
     */
    const COL_LENGTH = 'define_communication.length';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'define_communication.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'define_communication.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Media', 'Purpose', 'Owner', 'Frequency', 'DayTime', 'Length', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'media', 'purpose', 'owner', 'frequency', 'dayTime', 'length', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(DefineCommunicationTableMap::COL_ID, DefineCommunicationTableMap::COL_PROJECT_ID, DefineCommunicationTableMap::COL_PHASE_ID, DefineCommunicationTableMap::COL_PHASE_COMPONENT_ID, DefineCommunicationTableMap::COL_MEDIA, DefineCommunicationTableMap::COL_PURPOSE, DefineCommunicationTableMap::COL_OWNER, DefineCommunicationTableMap::COL_FREQUENCY, DefineCommunicationTableMap::COL_DAY_TIME, DefineCommunicationTableMap::COL_LENGTH, DefineCommunicationTableMap::COL_DATE_TIME_CREATED, DefineCommunicationTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'media', 'purpose', 'owner', 'frequency', 'day_time', 'length', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Media' => 4, 'Purpose' => 5, 'Owner' => 6, 'Frequency' => 7, 'DayTime' => 8, 'Length' => 9, 'DateTimeCreated' => 10, 'LastUpdated' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'media' => 4, 'purpose' => 5, 'owner' => 6, 'frequency' => 7, 'dayTime' => 8, 'length' => 9, 'dateTimeCreated' => 10, 'lastUpdated' => 11, ),
        self::TYPE_COLNAME       => array(DefineCommunicationTableMap::COL_ID => 0, DefineCommunicationTableMap::COL_PROJECT_ID => 1, DefineCommunicationTableMap::COL_PHASE_ID => 2, DefineCommunicationTableMap::COL_PHASE_COMPONENT_ID => 3, DefineCommunicationTableMap::COL_MEDIA => 4, DefineCommunicationTableMap::COL_PURPOSE => 5, DefineCommunicationTableMap::COL_OWNER => 6, DefineCommunicationTableMap::COL_FREQUENCY => 7, DefineCommunicationTableMap::COL_DAY_TIME => 8, DefineCommunicationTableMap::COL_LENGTH => 9, DefineCommunicationTableMap::COL_DATE_TIME_CREATED => 10, DefineCommunicationTableMap::COL_LAST_UPDATED => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'media' => 4, 'purpose' => 5, 'owner' => 6, 'frequency' => 7, 'day_time' => 8, 'length' => 9, 'date_time_created' => 10, 'last_updated' => 11, ),
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
        $this->setName('define_communication');
        $this->setPhpName('DefineCommunication');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\DefineCommunication');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addForeignKey('phase_component_id', 'PhaseComponentId', 'INTEGER', 'phase_components', 'id', true, null, null);
        $this->addColumn('media', 'Media', 'LONGVARCHAR', true, null, null);
        $this->addColumn('purpose', 'Purpose', 'LONGVARCHAR', true, null, null);
        $this->addForeignKey('owner', 'Owner', 'INTEGER', 'users', 'id', false, null, null);
        $this->addColumn('frequency', 'Frequency', 'VARCHAR', true, 255, null);
        $this->addColumn('day_time', 'DayTime', 'VARCHAR', true, 255, null);
        $this->addColumn('length', 'Length', 'VARCHAR', true, 255, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Projects', '\\Projects', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('ProjectPhases', '\\ProjectPhases', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':phase_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('PhaseComponents', '\\PhaseComponents', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('Users', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':owner',
    1 => ':id',
  ),
), 'SET NULL', null, null, false);
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
        return $withPrefix ? DefineCommunicationTableMap::CLASS_DEFAULT : DefineCommunicationTableMap::OM_CLASS;
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
     * @return array           (DefineCommunication object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DefineCommunicationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DefineCommunicationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DefineCommunicationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DefineCommunicationTableMap::OM_CLASS;
            /** @var DefineCommunication $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DefineCommunicationTableMap::addInstanceToPool($obj, $key);
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
            $key = DefineCommunicationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DefineCommunicationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var DefineCommunication $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DefineCommunicationTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_ID);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_MEDIA);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_PURPOSE);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_OWNER);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_FREQUENCY);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_DAY_TIME);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_LENGTH);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(DefineCommunicationTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.media');
            $criteria->addSelectColumn($alias . '.purpose');
            $criteria->addSelectColumn($alias . '.owner');
            $criteria->addSelectColumn($alias . '.frequency');
            $criteria->addSelectColumn($alias . '.day_time');
            $criteria->addSelectColumn($alias . '.length');
            $criteria->addSelectColumn($alias . '.date_time_created');
            $criteria->addSelectColumn($alias . '.last_updated');
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
        return Propel::getServiceContainer()->getDatabaseMap(DefineCommunicationTableMap::DATABASE_NAME)->getTable(DefineCommunicationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DefineCommunicationTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DefineCommunicationTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DefineCommunicationTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a DefineCommunication or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or DefineCommunication object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DefineCommunicationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \DefineCommunication) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DefineCommunicationTableMap::DATABASE_NAME);
            $criteria->add(DefineCommunicationTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = DefineCommunicationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DefineCommunicationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DefineCommunicationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the define_communication table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DefineCommunicationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DefineCommunication or Criteria object.
     *
     * @param mixed               $criteria Criteria or DefineCommunication object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DefineCommunicationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DefineCommunication object
        }

        if ($criteria->containsKey(DefineCommunicationTableMap::COL_ID) && $criteria->keyContainsValue(DefineCommunicationTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DefineCommunicationTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = DefineCommunicationQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DefineCommunicationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DefineCommunicationTableMap::buildTableMap();
