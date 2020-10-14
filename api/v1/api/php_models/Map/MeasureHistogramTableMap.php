<?php

namespace Map;

use \MeasureHistogram;
use \MeasureHistogramQuery;
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
 * This class defines the structure of the 'measure_histogram' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MeasureHistogramTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MeasureHistogramTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'measure_histogram';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MeasureHistogram';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MeasureHistogram';

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
    const COL_ID = 'measure_histogram.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'measure_histogram.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'measure_histogram.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'measure_histogram.phase_component_id';

    /**
     * the column name for the title field
     */
    const COL_TITLE = 'measure_histogram.title';

    /**
     * the column name for the input field
     */
    const COL_INPUT = 'measure_histogram.input';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'measure_histogram.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'measure_histogram.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Title', 'Input', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'title', 'input', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(MeasureHistogramTableMap::COL_ID, MeasureHistogramTableMap::COL_PROJECT_ID, MeasureHistogramTableMap::COL_PHASE_ID, MeasureHistogramTableMap::COL_PHASE_COMPONENT_ID, MeasureHistogramTableMap::COL_TITLE, MeasureHistogramTableMap::COL_INPUT, MeasureHistogramTableMap::COL_DATE_TIME_CREATED, MeasureHistogramTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'title', 'input', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Title' => 4, 'Input' => 5, 'DateTimeCreated' => 6, 'LastUpdated' => 7, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'title' => 4, 'input' => 5, 'dateTimeCreated' => 6, 'lastUpdated' => 7, ),
        self::TYPE_COLNAME       => array(MeasureHistogramTableMap::COL_ID => 0, MeasureHistogramTableMap::COL_PROJECT_ID => 1, MeasureHistogramTableMap::COL_PHASE_ID => 2, MeasureHistogramTableMap::COL_PHASE_COMPONENT_ID => 3, MeasureHistogramTableMap::COL_TITLE => 4, MeasureHistogramTableMap::COL_INPUT => 5, MeasureHistogramTableMap::COL_DATE_TIME_CREATED => 6, MeasureHistogramTableMap::COL_LAST_UPDATED => 7, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'title' => 4, 'input' => 5, 'date_time_created' => 6, 'last_updated' => 7, ),
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
        $this->setName('measure_histogram');
        $this->setPhpName('MeasureHistogram');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\MeasureHistogram');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('project_id', 'ProjectId', 'INTEGER', true, null, null);
        $this->addColumn('phase_id', 'PhaseId', 'INTEGER', true, null, null);
        $this->addColumn('phase_component_id', 'PhaseComponentId', 'INTEGER', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 255, null);
        $this->addColumn('input', 'Input', 'LONGVARCHAR', false, null, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', false, null, 'CURRENT_TIMESTAMP');
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
        return $withPrefix ? MeasureHistogramTableMap::CLASS_DEFAULT : MeasureHistogramTableMap::OM_CLASS;
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
     * @return array           (MeasureHistogram object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MeasureHistogramTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MeasureHistogramTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MeasureHistogramTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MeasureHistogramTableMap::OM_CLASS;
            /** @var MeasureHistogram $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MeasureHistogramTableMap::addInstanceToPool($obj, $key);
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
            $key = MeasureHistogramTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MeasureHistogramTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MeasureHistogram $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MeasureHistogramTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MeasureHistogramTableMap::COL_ID);
            $criteria->addSelectColumn(MeasureHistogramTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(MeasureHistogramTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(MeasureHistogramTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(MeasureHistogramTableMap::COL_TITLE);
            $criteria->addSelectColumn(MeasureHistogramTableMap::COL_INPUT);
            $criteria->addSelectColumn(MeasureHistogramTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(MeasureHistogramTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.input');
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
        return Propel::getServiceContainer()->getDatabaseMap(MeasureHistogramTableMap::DATABASE_NAME)->getTable(MeasureHistogramTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MeasureHistogramTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MeasureHistogramTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MeasureHistogramTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MeasureHistogram or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MeasureHistogram object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureHistogramTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MeasureHistogram) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MeasureHistogramTableMap::DATABASE_NAME);
            $criteria->add(MeasureHistogramTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MeasureHistogramQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MeasureHistogramTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MeasureHistogramTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the measure_histogram table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MeasureHistogramQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MeasureHistogram or Criteria object.
     *
     * @param mixed               $criteria Criteria or MeasureHistogram object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureHistogramTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MeasureHistogram object
        }

        if ($criteria->containsKey(MeasureHistogramTableMap::COL_ID) && $criteria->keyContainsValue(MeasureHistogramTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MeasureHistogramTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MeasureHistogramQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MeasureHistogramTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MeasureHistogramTableMap::buildTableMap();
