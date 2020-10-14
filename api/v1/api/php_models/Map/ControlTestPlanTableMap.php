<?php

namespace Map;

use \ControlTestPlan;
use \ControlTestPlanQuery;
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
 * This class defines the structure of the 'control_test_plan' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ControlTestPlanTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ControlTestPlanTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'control_test_plan';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ControlTestPlan';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ControlTestPlan';

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
    const COL_ID = 'control_test_plan.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'control_test_plan.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'control_test_plan.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'control_test_plan.phase_component_id';

    /**
     * the column name for the subject field
     */
    const COL_SUBJECT = 'control_test_plan.subject';

    /**
     * the column name for the area field
     */
    const COL_AREA = 'control_test_plan.area';

    /**
     * the column name for the description field
     */
    const COL_DESCRIPTION = 'control_test_plan.description';

    /**
     * the column name for the details field
     */
    const COL_DETAILS = 'control_test_plan.details';

    /**
     * the column name for the expected_benefits field
     */
    const COL_EXPECTED_BENEFITS = 'control_test_plan.expected_benefits';

    /**
     * the column name for the responsible_party field
     */
    const COL_RESPONSIBLE_PARTY = 'control_test_plan.responsible_party';

    /**
     * the column name for the estimated_cost field
     */
    const COL_ESTIMATED_COST = 'control_test_plan.estimated_cost';

    /**
     * the column name for the timing field
     */
    const COL_TIMING = 'control_test_plan.timing';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'control_test_plan.status';

    /**
     * the column name for the comments field
     */
    const COL_COMMENTS = 'control_test_plan.comments';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'control_test_plan.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'control_test_plan.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Subject', 'Area', 'Description', 'Details', 'ExpectedBenefits', 'ResponsibleParty', 'EstimatedCost', 'Timing', 'Status', 'Comments', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'subject', 'area', 'description', 'details', 'expectedBenefits', 'responsibleParty', 'estimatedCost', 'timing', 'status', 'comments', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(ControlTestPlanTableMap::COL_ID, ControlTestPlanTableMap::COL_PROJECT_ID, ControlTestPlanTableMap::COL_PHASE_ID, ControlTestPlanTableMap::COL_PHASE_COMPONENT_ID, ControlTestPlanTableMap::COL_SUBJECT, ControlTestPlanTableMap::COL_AREA, ControlTestPlanTableMap::COL_DESCRIPTION, ControlTestPlanTableMap::COL_DETAILS, ControlTestPlanTableMap::COL_EXPECTED_BENEFITS, ControlTestPlanTableMap::COL_RESPONSIBLE_PARTY, ControlTestPlanTableMap::COL_ESTIMATED_COST, ControlTestPlanTableMap::COL_TIMING, ControlTestPlanTableMap::COL_STATUS, ControlTestPlanTableMap::COL_COMMENTS, ControlTestPlanTableMap::COL_DATE_TIME_CREATED, ControlTestPlanTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'subject', 'area', 'description', 'details', 'expected_benefits', 'responsible_party', 'estimated_cost', 'timing', 'status', 'comments', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Subject' => 4, 'Area' => 5, 'Description' => 6, 'Details' => 7, 'ExpectedBenefits' => 8, 'ResponsibleParty' => 9, 'EstimatedCost' => 10, 'Timing' => 11, 'Status' => 12, 'Comments' => 13, 'DateTimeCreated' => 14, 'LastUpdated' => 15, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'subject' => 4, 'area' => 5, 'description' => 6, 'details' => 7, 'expectedBenefits' => 8, 'responsibleParty' => 9, 'estimatedCost' => 10, 'timing' => 11, 'status' => 12, 'comments' => 13, 'dateTimeCreated' => 14, 'lastUpdated' => 15, ),
        self::TYPE_COLNAME       => array(ControlTestPlanTableMap::COL_ID => 0, ControlTestPlanTableMap::COL_PROJECT_ID => 1, ControlTestPlanTableMap::COL_PHASE_ID => 2, ControlTestPlanTableMap::COL_PHASE_COMPONENT_ID => 3, ControlTestPlanTableMap::COL_SUBJECT => 4, ControlTestPlanTableMap::COL_AREA => 5, ControlTestPlanTableMap::COL_DESCRIPTION => 6, ControlTestPlanTableMap::COL_DETAILS => 7, ControlTestPlanTableMap::COL_EXPECTED_BENEFITS => 8, ControlTestPlanTableMap::COL_RESPONSIBLE_PARTY => 9, ControlTestPlanTableMap::COL_ESTIMATED_COST => 10, ControlTestPlanTableMap::COL_TIMING => 11, ControlTestPlanTableMap::COL_STATUS => 12, ControlTestPlanTableMap::COL_COMMENTS => 13, ControlTestPlanTableMap::COL_DATE_TIME_CREATED => 14, ControlTestPlanTableMap::COL_LAST_UPDATED => 15, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'subject' => 4, 'area' => 5, 'description' => 6, 'details' => 7, 'expected_benefits' => 8, 'responsible_party' => 9, 'estimated_cost' => 10, 'timing' => 11, 'status' => 12, 'comments' => 13, 'date_time_created' => 14, 'last_updated' => 15, ),
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
        $this->setName('control_test_plan');
        $this->setPhpName('ControlTestPlan');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\ControlTestPlan');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addForeignKey('phase_component_id', 'PhaseComponentId', 'INTEGER', 'phase_components', 'id', true, null, null);
        $this->addColumn('subject', 'Subject', 'CHAR', true, null, null);
        $this->addColumn('area', 'Area', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 255, null);
        $this->addColumn('details', 'Details', 'VARCHAR', true, 255, null);
        $this->addColumn('expected_benefits', 'ExpectedBenefits', 'VARCHAR', true, 255, null);
        $this->addForeignKey('responsible_party', 'ResponsibleParty', 'INTEGER', 'users', 'id', false, null, null);
        $this->addColumn('estimated_cost', 'EstimatedCost', 'VARCHAR', true, 25, null);
        $this->addColumn('timing', 'Timing', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'VARCHAR', false, 255, null);
        $this->addColumn('comments', 'Comments', 'LONGVARCHAR', false, null, null);
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
    0 => ':responsible_party',
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
        return $withPrefix ? ControlTestPlanTableMap::CLASS_DEFAULT : ControlTestPlanTableMap::OM_CLASS;
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
     * @return array           (ControlTestPlan object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ControlTestPlanTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ControlTestPlanTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ControlTestPlanTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ControlTestPlanTableMap::OM_CLASS;
            /** @var ControlTestPlan $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ControlTestPlanTableMap::addInstanceToPool($obj, $key);
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
            $key = ControlTestPlanTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ControlTestPlanTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ControlTestPlan $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ControlTestPlanTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_ID);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_SUBJECT);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_AREA);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_DETAILS);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_EXPECTED_BENEFITS);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_RESPONSIBLE_PARTY);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_ESTIMATED_COST);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_TIMING);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_STATUS);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_COMMENTS);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(ControlTestPlanTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.subject');
            $criteria->addSelectColumn($alias . '.area');
            $criteria->addSelectColumn($alias . '.description');
            $criteria->addSelectColumn($alias . '.details');
            $criteria->addSelectColumn($alias . '.expected_benefits');
            $criteria->addSelectColumn($alias . '.responsible_party');
            $criteria->addSelectColumn($alias . '.estimated_cost');
            $criteria->addSelectColumn($alias . '.timing');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.comments');
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
        return Propel::getServiceContainer()->getDatabaseMap(ControlTestPlanTableMap::DATABASE_NAME)->getTable(ControlTestPlanTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ControlTestPlanTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ControlTestPlanTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ControlTestPlanTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a ControlTestPlan or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ControlTestPlan object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ControlTestPlanTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ControlTestPlan) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ControlTestPlanTableMap::DATABASE_NAME);
            $criteria->add(ControlTestPlanTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ControlTestPlanQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ControlTestPlanTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ControlTestPlanTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the control_test_plan table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ControlTestPlanQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ControlTestPlan or Criteria object.
     *
     * @param mixed               $criteria Criteria or ControlTestPlan object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ControlTestPlanTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ControlTestPlan object
        }

        if ($criteria->containsKey(ControlTestPlanTableMap::COL_ID) && $criteria->keyContainsValue(ControlTestPlanTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ControlTestPlanTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ControlTestPlanQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ControlTestPlanTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ControlTestPlanTableMap::buildTableMap();
