<?php

namespace Map;

use \ImproveImprovementPlan;
use \ImproveImprovementPlanQuery;
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
 * This class defines the structure of the 'improve_improvement_plan' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ImproveImprovementPlanTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ImproveImprovementPlanTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'improve_improvement_plan';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ImproveImprovementPlan';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ImproveImprovementPlan';

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
    const COL_ID = 'improve_improvement_plan.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'improve_improvement_plan.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'improve_improvement_plan.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'improve_improvement_plan.phase_component_id';

    /**
     * the column name for the process field
     */
    const COL_PROCESS = 'improve_improvement_plan.process';

    /**
     * the column name for the goal field
     */
    const COL_GOAL = 'improve_improvement_plan.goal';

    /**
     * the column name for the action_needed field
     */
    const COL_ACTION_NEEDED = 'improve_improvement_plan.action_needed';

    /**
     * the column name for the resource_responsible field
     */
    const COL_RESOURCE_RESPONSIBLE = 'improve_improvement_plan.resource_responsible';

    /**
     * the column name for the challenges field
     */
    const COL_CHALLENGES = 'improve_improvement_plan.challenges';

    /**
     * the column name for the measures field
     */
    const COL_MEASURES = 'improve_improvement_plan.measures';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'improve_improvement_plan.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'improve_improvement_plan.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Process', 'Goal', 'ActionNeeded', 'ResourceResponsible', 'Challenges', 'Measures', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'process', 'goal', 'actionNeeded', 'resourceResponsible', 'challenges', 'measures', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(ImproveImprovementPlanTableMap::COL_ID, ImproveImprovementPlanTableMap::COL_PROJECT_ID, ImproveImprovementPlanTableMap::COL_PHASE_ID, ImproveImprovementPlanTableMap::COL_PHASE_COMPONENT_ID, ImproveImprovementPlanTableMap::COL_PROCESS, ImproveImprovementPlanTableMap::COL_GOAL, ImproveImprovementPlanTableMap::COL_ACTION_NEEDED, ImproveImprovementPlanTableMap::COL_RESOURCE_RESPONSIBLE, ImproveImprovementPlanTableMap::COL_CHALLENGES, ImproveImprovementPlanTableMap::COL_MEASURES, ImproveImprovementPlanTableMap::COL_DATE_TIME_CREATED, ImproveImprovementPlanTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'process', 'goal', 'action_needed', 'resource_responsible', 'challenges', 'measures', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Process' => 4, 'Goal' => 5, 'ActionNeeded' => 6, 'ResourceResponsible' => 7, 'Challenges' => 8, 'Measures' => 9, 'DateTimeCreated' => 10, 'LastUpdated' => 11, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'process' => 4, 'goal' => 5, 'actionNeeded' => 6, 'resourceResponsible' => 7, 'challenges' => 8, 'measures' => 9, 'dateTimeCreated' => 10, 'lastUpdated' => 11, ),
        self::TYPE_COLNAME       => array(ImproveImprovementPlanTableMap::COL_ID => 0, ImproveImprovementPlanTableMap::COL_PROJECT_ID => 1, ImproveImprovementPlanTableMap::COL_PHASE_ID => 2, ImproveImprovementPlanTableMap::COL_PHASE_COMPONENT_ID => 3, ImproveImprovementPlanTableMap::COL_PROCESS => 4, ImproveImprovementPlanTableMap::COL_GOAL => 5, ImproveImprovementPlanTableMap::COL_ACTION_NEEDED => 6, ImproveImprovementPlanTableMap::COL_RESOURCE_RESPONSIBLE => 7, ImproveImprovementPlanTableMap::COL_CHALLENGES => 8, ImproveImprovementPlanTableMap::COL_MEASURES => 9, ImproveImprovementPlanTableMap::COL_DATE_TIME_CREATED => 10, ImproveImprovementPlanTableMap::COL_LAST_UPDATED => 11, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'process' => 4, 'goal' => 5, 'action_needed' => 6, 'resource_responsible' => 7, 'challenges' => 8, 'measures' => 9, 'date_time_created' => 10, 'last_updated' => 11, ),
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
        $this->setName('improve_improvement_plan');
        $this->setPhpName('ImproveImprovementPlan');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\ImproveImprovementPlan');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addForeignKey('phase_component_id', 'PhaseComponentId', 'INTEGER', 'phase_components', 'id', true, null, null);
        $this->addColumn('process', 'Process', 'VARCHAR', true, 255, null);
        $this->addColumn('goal', 'Goal', 'VARCHAR', true, 255, null);
        $this->addColumn('action_needed', 'ActionNeeded', 'VARCHAR', true, 255, null);
        $this->addColumn('resource_responsible', 'ResourceResponsible', 'VARCHAR', true, 255, null);
        $this->addColumn('challenges', 'Challenges', 'VARCHAR', true, 255, null);
        $this->addColumn('measures', 'Measures', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? ImproveImprovementPlanTableMap::CLASS_DEFAULT : ImproveImprovementPlanTableMap::OM_CLASS;
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
     * @return array           (ImproveImprovementPlan object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ImproveImprovementPlanTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ImproveImprovementPlanTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ImproveImprovementPlanTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ImproveImprovementPlanTableMap::OM_CLASS;
            /** @var ImproveImprovementPlan $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ImproveImprovementPlanTableMap::addInstanceToPool($obj, $key);
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
            $key = ImproveImprovementPlanTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ImproveImprovementPlanTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ImproveImprovementPlan $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ImproveImprovementPlanTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_ID);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_PROCESS);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_GOAL);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_ACTION_NEEDED);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_RESOURCE_RESPONSIBLE);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_CHALLENGES);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_MEASURES);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(ImproveImprovementPlanTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.process');
            $criteria->addSelectColumn($alias . '.goal');
            $criteria->addSelectColumn($alias . '.action_needed');
            $criteria->addSelectColumn($alias . '.resource_responsible');
            $criteria->addSelectColumn($alias . '.challenges');
            $criteria->addSelectColumn($alias . '.measures');
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
        return Propel::getServiceContainer()->getDatabaseMap(ImproveImprovementPlanTableMap::DATABASE_NAME)->getTable(ImproveImprovementPlanTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ImproveImprovementPlanTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ImproveImprovementPlanTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ImproveImprovementPlanTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ImproveImprovementPlan or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ImproveImprovementPlan object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ImproveImprovementPlanTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ImproveImprovementPlan) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ImproveImprovementPlanTableMap::DATABASE_NAME);
            $criteria->add(ImproveImprovementPlanTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ImproveImprovementPlanQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ImproveImprovementPlanTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ImproveImprovementPlanTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the improve_improvement_plan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ImproveImprovementPlanQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ImproveImprovementPlan or Criteria object.
     *
     * @param mixed               $criteria Criteria or ImproveImprovementPlan object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ImproveImprovementPlanTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ImproveImprovementPlan object
        }

        if ($criteria->containsKey(ImproveImprovementPlanTableMap::COL_ID) && $criteria->keyContainsValue(ImproveImprovementPlanTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ImproveImprovementPlanTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ImproveImprovementPlanQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ImproveImprovementPlanTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ImproveImprovementPlanTableMap::buildTableMap();
