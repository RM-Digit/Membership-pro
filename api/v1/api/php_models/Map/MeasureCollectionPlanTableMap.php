<?php

namespace Map;

use \MeasureCollectionPlan;
use \MeasureCollectionPlanQuery;
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
 * This class defines the structure of the 'measure_collection_plan' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class MeasureCollectionPlanTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.MeasureCollectionPlanTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'measure_collection_plan';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\MeasureCollectionPlan';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'MeasureCollectionPlan';

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
    const COL_ID = 'measure_collection_plan.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'measure_collection_plan.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'measure_collection_plan.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'measure_collection_plan.phase_component_id';

    /**
     * the column name for the measure field
     */
    const COL_MEASURE = 'measure_collection_plan.measure';

    /**
     * the column name for the measure_type field
     */
    const COL_MEASURE_TYPE = 'measure_collection_plan.measure_type';

    /**
     * the column name for the data_type field
     */
    const COL_DATA_TYPE = 'measure_collection_plan.data_type';

    /**
     * the column name for the operational_definition field
     */
    const COL_OPERATIONAL_DEFINITION = 'measure_collection_plan.operational_definition';

    /**
     * the column name for the specification field
     */
    const COL_SPECIFICATION = 'measure_collection_plan.specification';

    /**
     * the column name for the target field
     */
    const COL_TARGET = 'measure_collection_plan.target';

    /**
     * the column name for the data_collection_form field
     */
    const COL_DATA_COLLECTION_FORM = 'measure_collection_plan.data_collection_form';

    /**
     * the column name for the sampling field
     */
    const COL_SAMPLING = 'measure_collection_plan.sampling';

    /**
     * the column name for the baseline_sigma field
     */
    const COL_BASELINE_SIGMA = 'measure_collection_plan.baseline_sigma';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'measure_collection_plan.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'measure_collection_plan.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Measure', 'MeasureType', 'DataType', 'OperationalDefinition', 'Specification', 'Target', 'DataCollectionForm', 'Sampling', 'BaselineSigma', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'measure', 'measureType', 'dataType', 'operationalDefinition', 'specification', 'target', 'dataCollectionForm', 'sampling', 'baselineSigma', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(MeasureCollectionPlanTableMap::COL_ID, MeasureCollectionPlanTableMap::COL_PROJECT_ID, MeasureCollectionPlanTableMap::COL_PHASE_ID, MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID, MeasureCollectionPlanTableMap::COL_MEASURE, MeasureCollectionPlanTableMap::COL_MEASURE_TYPE, MeasureCollectionPlanTableMap::COL_DATA_TYPE, MeasureCollectionPlanTableMap::COL_OPERATIONAL_DEFINITION, MeasureCollectionPlanTableMap::COL_SPECIFICATION, MeasureCollectionPlanTableMap::COL_TARGET, MeasureCollectionPlanTableMap::COL_DATA_COLLECTION_FORM, MeasureCollectionPlanTableMap::COL_SAMPLING, MeasureCollectionPlanTableMap::COL_BASELINE_SIGMA, MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED, MeasureCollectionPlanTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'measure', 'measure_type', 'data_type', 'operational_definition', 'specification', 'target', 'data_collection_form', 'sampling', 'baseline_sigma', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Measure' => 4, 'MeasureType' => 5, 'DataType' => 6, 'OperationalDefinition' => 7, 'Specification' => 8, 'Target' => 9, 'DataCollectionForm' => 10, 'Sampling' => 11, 'BaselineSigma' => 12, 'DateTimeCreated' => 13, 'LastUpdated' => 14, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'measure' => 4, 'measureType' => 5, 'dataType' => 6, 'operationalDefinition' => 7, 'specification' => 8, 'target' => 9, 'dataCollectionForm' => 10, 'sampling' => 11, 'baselineSigma' => 12, 'dateTimeCreated' => 13, 'lastUpdated' => 14, ),
        self::TYPE_COLNAME       => array(MeasureCollectionPlanTableMap::COL_ID => 0, MeasureCollectionPlanTableMap::COL_PROJECT_ID => 1, MeasureCollectionPlanTableMap::COL_PHASE_ID => 2, MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID => 3, MeasureCollectionPlanTableMap::COL_MEASURE => 4, MeasureCollectionPlanTableMap::COL_MEASURE_TYPE => 5, MeasureCollectionPlanTableMap::COL_DATA_TYPE => 6, MeasureCollectionPlanTableMap::COL_OPERATIONAL_DEFINITION => 7, MeasureCollectionPlanTableMap::COL_SPECIFICATION => 8, MeasureCollectionPlanTableMap::COL_TARGET => 9, MeasureCollectionPlanTableMap::COL_DATA_COLLECTION_FORM => 10, MeasureCollectionPlanTableMap::COL_SAMPLING => 11, MeasureCollectionPlanTableMap::COL_BASELINE_SIGMA => 12, MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED => 13, MeasureCollectionPlanTableMap::COL_LAST_UPDATED => 14, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'measure' => 4, 'measure_type' => 5, 'data_type' => 6, 'operational_definition' => 7, 'specification' => 8, 'target' => 9, 'data_collection_form' => 10, 'sampling' => 11, 'baseline_sigma' => 12, 'date_time_created' => 13, 'last_updated' => 14, ),
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
        $this->setName('measure_collection_plan');
        $this->setPhpName('MeasureCollectionPlan');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\MeasureCollectionPlan');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addForeignKey('phase_component_id', 'PhaseComponentId', 'INTEGER', 'phase_components', 'id', true, null, null);
        $this->addColumn('measure', 'Measure', 'VARCHAR', true, 255, null);
        $this->addColumn('measure_type', 'MeasureType', 'VARCHAR', true, 255, null);
        $this->addColumn('data_type', 'DataType', 'VARCHAR', true, 255, null);
        $this->addColumn('operational_definition', 'OperationalDefinition', 'LONGVARCHAR', true, null, null);
        $this->addColumn('specification', 'Specification', 'LONGVARCHAR', true, null, null);
        $this->addColumn('target', 'Target', 'VARCHAR', true, 255, null);
        $this->addColumn('data_collection_form', 'DataCollectionForm', 'VARCHAR', true, 255, null);
        $this->addColumn('sampling', 'Sampling', 'VARCHAR', true, 255, null);
        $this->addColumn('baseline_sigma', 'BaselineSigma', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? MeasureCollectionPlanTableMap::CLASS_DEFAULT : MeasureCollectionPlanTableMap::OM_CLASS;
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
     * @return array           (MeasureCollectionPlan object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = MeasureCollectionPlanTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = MeasureCollectionPlanTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + MeasureCollectionPlanTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = MeasureCollectionPlanTableMap::OM_CLASS;
            /** @var MeasureCollectionPlan $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            MeasureCollectionPlanTableMap::addInstanceToPool($obj, $key);
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
            $key = MeasureCollectionPlanTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = MeasureCollectionPlanTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var MeasureCollectionPlan $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                MeasureCollectionPlanTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_ID);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_MEASURE);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_MEASURE_TYPE);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_DATA_TYPE);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_OPERATIONAL_DEFINITION);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_SPECIFICATION);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_TARGET);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_DATA_COLLECTION_FORM);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_SAMPLING);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_BASELINE_SIGMA);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(MeasureCollectionPlanTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.measure');
            $criteria->addSelectColumn($alias . '.measure_type');
            $criteria->addSelectColumn($alias . '.data_type');
            $criteria->addSelectColumn($alias . '.operational_definition');
            $criteria->addSelectColumn($alias . '.specification');
            $criteria->addSelectColumn($alias . '.target');
            $criteria->addSelectColumn($alias . '.data_collection_form');
            $criteria->addSelectColumn($alias . '.sampling');
            $criteria->addSelectColumn($alias . '.baseline_sigma');
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
        return Propel::getServiceContainer()->getDatabaseMap(MeasureCollectionPlanTableMap::DATABASE_NAME)->getTable(MeasureCollectionPlanTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(MeasureCollectionPlanTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(MeasureCollectionPlanTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new MeasureCollectionPlanTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a MeasureCollectionPlan or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or MeasureCollectionPlan object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureCollectionPlanTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \MeasureCollectionPlan) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(MeasureCollectionPlanTableMap::DATABASE_NAME);
            $criteria->add(MeasureCollectionPlanTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = MeasureCollectionPlanQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            MeasureCollectionPlanTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                MeasureCollectionPlanTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the measure_collection_plan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return MeasureCollectionPlanQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a MeasureCollectionPlan or Criteria object.
     *
     * @param mixed               $criteria Criteria or MeasureCollectionPlan object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(MeasureCollectionPlanTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from MeasureCollectionPlan object
        }

        if ($criteria->containsKey(MeasureCollectionPlanTableMap::COL_ID) && $criteria->keyContainsValue(MeasureCollectionPlanTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.MeasureCollectionPlanTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = MeasureCollectionPlanQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // MeasureCollectionPlanTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
MeasureCollectionPlanTableMap::buildTableMap();
