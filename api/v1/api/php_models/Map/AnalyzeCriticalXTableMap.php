<?php

namespace Map;

use \AnalyzeCriticalX;
use \AnalyzeCriticalXQuery;
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
 * This class defines the structure of the 'analyze_critical_x' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AnalyzeCriticalXTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AnalyzeCriticalXTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'analyze_critical_x';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AnalyzeCriticalX';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AnalyzeCriticalX';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 16;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 16;

    /**
     * the column name for the id field
     */
    const COL_ID = 'analyze_critical_x.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'analyze_critical_x.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'analyze_critical_x.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'analyze_critical_x.phase_component_id';

    /**
     * the column name for the input field
     */
    const COL_INPUT = 'analyze_critical_x.input';

    /**
     * the column name for the practical_theory field
     */
    const COL_PRACTICAL_THEORY = 'analyze_critical_x.practical_theory';

    /**
     * the column name for the x_measurement field
     */
    const COL_X_MEASUREMENT = 'analyze_critical_x.x_measurement';

    /**
     * the column name for the stat_tested field
     */
    const COL_STAT_TESTED = 'analyze_critical_x.stat_tested';

    /**
     * the column name for the tool_used field
     */
    const COL_TOOL_USED = 'analyze_critical_x.tool_used';

    /**
     * the column name for the ho field
     */
    const COL_HO = 'analyze_critical_x.ho';

    /**
     * the column name for the ha field
     */
    const COL_HA = 'analyze_critical_x.ha';

    /**
     * the column name for the results field
     */
    const COL_RESULTS = 'analyze_critical_x.results';

    /**
     * the column name for the practical_conclusions field
     */
    const COL_PRACTICAL_CONCLUSIONS = 'analyze_critical_x.practical_conclusions';

    /**
     * the column name for the next_steps field
     */
    const COL_NEXT_STEPS = 'analyze_critical_x.next_steps';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'analyze_critical_x.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'analyze_critical_x.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Input', 'PracticalTheory', 'XMeasurement', 'StatTested', 'ToolUsed', 'Ho', 'Ha', 'Results', 'PracticalConclusions', 'NextSteps', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'input', 'practicalTheory', 'xMeasurement', 'statTested', 'toolUsed', 'ho', 'ha', 'results', 'practicalConclusions', 'nextSteps', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(AnalyzeCriticalXTableMap::COL_ID, AnalyzeCriticalXTableMap::COL_PROJECT_ID, AnalyzeCriticalXTableMap::COL_PHASE_ID, AnalyzeCriticalXTableMap::COL_PHASE_COMPONENT_ID, AnalyzeCriticalXTableMap::COL_INPUT, AnalyzeCriticalXTableMap::COL_PRACTICAL_THEORY, AnalyzeCriticalXTableMap::COL_X_MEASUREMENT, AnalyzeCriticalXTableMap::COL_STAT_TESTED, AnalyzeCriticalXTableMap::COL_TOOL_USED, AnalyzeCriticalXTableMap::COL_HO, AnalyzeCriticalXTableMap::COL_HA, AnalyzeCriticalXTableMap::COL_RESULTS, AnalyzeCriticalXTableMap::COL_PRACTICAL_CONCLUSIONS, AnalyzeCriticalXTableMap::COL_NEXT_STEPS, AnalyzeCriticalXTableMap::COL_DATE_TIME_CREATED, AnalyzeCriticalXTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'input', 'practical_theory', 'x_measurement', 'stat_tested', 'tool_used', 'ho', 'ha', 'results', 'practical_conclusions', 'next_steps', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Input' => 4, 'PracticalTheory' => 5, 'XMeasurement' => 6, 'StatTested' => 7, 'ToolUsed' => 8, 'Ho' => 9, 'Ha' => 10, 'Results' => 11, 'PracticalConclusions' => 12, 'NextSteps' => 13, 'DateTimeCreated' => 14, 'LastUpdated' => 15, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'input' => 4, 'practicalTheory' => 5, 'xMeasurement' => 6, 'statTested' => 7, 'toolUsed' => 8, 'ho' => 9, 'ha' => 10, 'results' => 11, 'practicalConclusions' => 12, 'nextSteps' => 13, 'dateTimeCreated' => 14, 'lastUpdated' => 15, ),
        self::TYPE_COLNAME       => array(AnalyzeCriticalXTableMap::COL_ID => 0, AnalyzeCriticalXTableMap::COL_PROJECT_ID => 1, AnalyzeCriticalXTableMap::COL_PHASE_ID => 2, AnalyzeCriticalXTableMap::COL_PHASE_COMPONENT_ID => 3, AnalyzeCriticalXTableMap::COL_INPUT => 4, AnalyzeCriticalXTableMap::COL_PRACTICAL_THEORY => 5, AnalyzeCriticalXTableMap::COL_X_MEASUREMENT => 6, AnalyzeCriticalXTableMap::COL_STAT_TESTED => 7, AnalyzeCriticalXTableMap::COL_TOOL_USED => 8, AnalyzeCriticalXTableMap::COL_HO => 9, AnalyzeCriticalXTableMap::COL_HA => 10, AnalyzeCriticalXTableMap::COL_RESULTS => 11, AnalyzeCriticalXTableMap::COL_PRACTICAL_CONCLUSIONS => 12, AnalyzeCriticalXTableMap::COL_NEXT_STEPS => 13, AnalyzeCriticalXTableMap::COL_DATE_TIME_CREATED => 14, AnalyzeCriticalXTableMap::COL_LAST_UPDATED => 15, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'input' => 4, 'practical_theory' => 5, 'x_measurement' => 6, 'stat_tested' => 7, 'tool_used' => 8, 'ho' => 9, 'ha' => 10, 'results' => 11, 'practical_conclusions' => 12, 'next_steps' => 13, 'date_time_created' => 14, 'last_updated' => 15, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
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
        $this->setName('analyze_critical_x');
        $this->setPhpName('AnalyzeCriticalX');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\AnalyzeCriticalX');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addForeignKey('phase_component_id', 'PhaseComponentId', 'INTEGER', 'phase_components', 'id', true, null, null);
        $this->addColumn('input', 'Input', 'VARCHAR', true, 255, null);
        $this->addColumn('practical_theory', 'PracticalTheory', 'VARCHAR', true, 255, null);
        $this->addColumn('x_measurement', 'XMeasurement', 'VARCHAR', true, 255, null);
        $this->addColumn('stat_tested', 'StatTested', 'VARCHAR', true, 255, null);
        $this->addColumn('tool_used', 'ToolUsed', 'VARCHAR', true, 255, null);
        $this->addColumn('ho', 'Ho', 'VARCHAR', true, 255, null);
        $this->addColumn('ha', 'Ha', 'VARCHAR', true, 255, null);
        $this->addColumn('results', 'Results', 'VARCHAR', true, 255, null);
        $this->addColumn('practical_conclusions', 'PracticalConclusions', 'VARCHAR', true, 255, null);
        $this->addColumn('next_steps', 'NextSteps', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AnalyzeCriticalXTableMap::CLASS_DEFAULT : AnalyzeCriticalXTableMap::OM_CLASS;
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
     * @return array           (AnalyzeCriticalX object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AnalyzeCriticalXTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AnalyzeCriticalXTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AnalyzeCriticalXTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AnalyzeCriticalXTableMap::OM_CLASS;
            /** @var AnalyzeCriticalX $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AnalyzeCriticalXTableMap::addInstanceToPool($obj, $key);
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
            $key = AnalyzeCriticalXTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AnalyzeCriticalXTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AnalyzeCriticalX $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AnalyzeCriticalXTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_ID);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_INPUT);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_PRACTICAL_THEORY);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_X_MEASUREMENT);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_STAT_TESTED);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_TOOL_USED);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_HO);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_HA);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_RESULTS);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_PRACTICAL_CONCLUSIONS);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_NEXT_STEPS);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(AnalyzeCriticalXTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.input');
            $criteria->addSelectColumn($alias . '.practical_theory');
            $criteria->addSelectColumn($alias . '.x_measurement');
            $criteria->addSelectColumn($alias . '.stat_tested');
            $criteria->addSelectColumn($alias . '.tool_used');
            $criteria->addSelectColumn($alias . '.ho');
            $criteria->addSelectColumn($alias . '.ha');
            $criteria->addSelectColumn($alias . '.results');
            $criteria->addSelectColumn($alias . '.practical_conclusions');
            $criteria->addSelectColumn($alias . '.next_steps');
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
        return Propel::getServiceContainer()->getDatabaseMap(AnalyzeCriticalXTableMap::DATABASE_NAME)->getTable(AnalyzeCriticalXTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AnalyzeCriticalXTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AnalyzeCriticalXTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AnalyzeCriticalXTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AnalyzeCriticalX or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AnalyzeCriticalX object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCriticalXTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AnalyzeCriticalX) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AnalyzeCriticalXTableMap::DATABASE_NAME);
            $criteria->add(AnalyzeCriticalXTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AnalyzeCriticalXQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AnalyzeCriticalXTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AnalyzeCriticalXTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the analyze_critical_x table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AnalyzeCriticalXQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AnalyzeCriticalX or Criteria object.
     *
     * @param mixed               $criteria Criteria or AnalyzeCriticalX object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCriticalXTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AnalyzeCriticalX object
        }

        if ($criteria->containsKey(AnalyzeCriticalXTableMap::COL_ID) && $criteria->keyContainsValue(AnalyzeCriticalXTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AnalyzeCriticalXTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AnalyzeCriticalXQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AnalyzeCriticalXTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AnalyzeCriticalXTableMap::buildTableMap();
