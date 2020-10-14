<?php

namespace Map;

use \ValueStreamDiagram;
use \ValueStreamDiagramQuery;
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
 * This class defines the structure of the 'value_stream_diagram' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ValueStreamDiagramTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ValueStreamDiagramTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'value_stream_diagram';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ValueStreamDiagram';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ValueStreamDiagram';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    const COL_ID = 'value_stream_diagram.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'value_stream_diagram.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'value_stream_diagram.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'value_stream_diagram.phase_component_id';

    /**
     * the column name for the svg field
     */
    const COL_SVG = 'value_stream_diagram.svg';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'value_stream_diagram.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'value_stream_diagram.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Svg', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'svg', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(ValueStreamDiagramTableMap::COL_ID, ValueStreamDiagramTableMap::COL_PROJECT_ID, ValueStreamDiagramTableMap::COL_PHASE_ID, ValueStreamDiagramTableMap::COL_PHASE_COMPONENT_ID, ValueStreamDiagramTableMap::COL_SVG, ValueStreamDiagramTableMap::COL_DATE_TIME_CREATED, ValueStreamDiagramTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'svg', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Svg' => 4, 'DateTimeCreated' => 5, 'LastUpdated' => 6, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'svg' => 4, 'dateTimeCreated' => 5, 'lastUpdated' => 6, ),
        self::TYPE_COLNAME       => array(ValueStreamDiagramTableMap::COL_ID => 0, ValueStreamDiagramTableMap::COL_PROJECT_ID => 1, ValueStreamDiagramTableMap::COL_PHASE_ID => 2, ValueStreamDiagramTableMap::COL_PHASE_COMPONENT_ID => 3, ValueStreamDiagramTableMap::COL_SVG => 4, ValueStreamDiagramTableMap::COL_DATE_TIME_CREATED => 5, ValueStreamDiagramTableMap::COL_LAST_UPDATED => 6, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'svg' => 4, 'date_time_created' => 5, 'last_updated' => 6, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, )
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
        $this->setName('value_stream_diagram');
        $this->setPhpName('ValueStreamDiagram');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\ValueStreamDiagram');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('project_id', 'ProjectId', 'INTEGER', true, null, null);
        $this->addColumn('phase_id', 'PhaseId', 'INTEGER', true, null, null);
        $this->addColumn('phase_component_id', 'PhaseComponentId', 'INTEGER', true, null, null);
        $this->addColumn('svg', 'Svg', 'CLOB', true, null, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
        return $withPrefix ? ValueStreamDiagramTableMap::CLASS_DEFAULT : ValueStreamDiagramTableMap::OM_CLASS;
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
     * @return array           (ValueStreamDiagram object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ValueStreamDiagramTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ValueStreamDiagramTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ValueStreamDiagramTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ValueStreamDiagramTableMap::OM_CLASS;
            /** @var ValueStreamDiagram $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ValueStreamDiagramTableMap::addInstanceToPool($obj, $key);
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
            $key = ValueStreamDiagramTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ValueStreamDiagramTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ValueStreamDiagram $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ValueStreamDiagramTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ValueStreamDiagramTableMap::COL_ID);
            $criteria->addSelectColumn(ValueStreamDiagramTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(ValueStreamDiagramTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(ValueStreamDiagramTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(ValueStreamDiagramTableMap::COL_SVG);
            $criteria->addSelectColumn(ValueStreamDiagramTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(ValueStreamDiagramTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.svg');
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
        return Propel::getServiceContainer()->getDatabaseMap(ValueStreamDiagramTableMap::DATABASE_NAME)->getTable(ValueStreamDiagramTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ValueStreamDiagramTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ValueStreamDiagramTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ValueStreamDiagramTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ValueStreamDiagram or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ValueStreamDiagram object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ValueStreamDiagramTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ValueStreamDiagram) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ValueStreamDiagramTableMap::DATABASE_NAME);
            $criteria->add(ValueStreamDiagramTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ValueStreamDiagramQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ValueStreamDiagramTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ValueStreamDiagramTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the value_stream_diagram table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ValueStreamDiagramQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ValueStreamDiagram or Criteria object.
     *
     * @param mixed               $criteria Criteria or ValueStreamDiagram object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ValueStreamDiagramTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ValueStreamDiagram object
        }

        if ($criteria->containsKey(ValueStreamDiagramTableMap::COL_ID) && $criteria->keyContainsValue(ValueStreamDiagramTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ValueStreamDiagramTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ValueStreamDiagramQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ValueStreamDiagramTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ValueStreamDiagramTableMap::buildTableMap();
