<?php

namespace Map;

use \PhaseComponents;
use \PhaseComponentsQuery;
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
 * This class defines the structure of the 'phase_components' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PhaseComponentsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.PhaseComponentsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'phase_components';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\PhaseComponents';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'PhaseComponents';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the id field
     */
    const COL_ID = 'phase_components.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'phase_components.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'phase_components.phase_id';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'phase_components.status';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'phase_components.name';

    /**
     * the column name for the grade field
     */
    const COL_GRADE = 'phase_components.grade';

    /**
     * the column name for the date_time_started field
     */
    const COL_DATE_TIME_STARTED = 'phase_components.date_time_started';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'phase_components.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'phase_components.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'Status', 'Name', 'Grade', 'DateTimeStarted', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'status', 'name', 'grade', 'dateTimeStarted', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(PhaseComponentsTableMap::COL_ID, PhaseComponentsTableMap::COL_PROJECT_ID, PhaseComponentsTableMap::COL_PHASE_ID, PhaseComponentsTableMap::COL_STATUS, PhaseComponentsTableMap::COL_NAME, PhaseComponentsTableMap::COL_GRADE, PhaseComponentsTableMap::COL_DATE_TIME_STARTED, PhaseComponentsTableMap::COL_DATE_TIME_CREATED, PhaseComponentsTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'status', 'name', 'grade', 'date_time_started', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'Status' => 3, 'Name' => 4, 'Grade' => 5, 'DateTimeStarted' => 6, 'DateTimeCreated' => 7, 'LastUpdated' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'status' => 3, 'name' => 4, 'grade' => 5, 'dateTimeStarted' => 6, 'dateTimeCreated' => 7, 'lastUpdated' => 8, ),
        self::TYPE_COLNAME       => array(PhaseComponentsTableMap::COL_ID => 0, PhaseComponentsTableMap::COL_PROJECT_ID => 1, PhaseComponentsTableMap::COL_PHASE_ID => 2, PhaseComponentsTableMap::COL_STATUS => 3, PhaseComponentsTableMap::COL_NAME => 4, PhaseComponentsTableMap::COL_GRADE => 5, PhaseComponentsTableMap::COL_DATE_TIME_STARTED => 6, PhaseComponentsTableMap::COL_DATE_TIME_CREATED => 7, PhaseComponentsTableMap::COL_LAST_UPDATED => 8, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'status' => 3, 'name' => 4, 'grade' => 5, 'date_time_started' => 6, 'date_time_created' => 7, 'last_updated' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('phase_components');
        $this->setPhpName('PhaseComponents');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\PhaseComponents');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addColumn('status', 'Status', 'CHAR', true, null, 'working');
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('grade', 'Grade', 'VARCHAR', true, 25, '');
        $this->addColumn('date_time_started', 'DateTimeStarted', 'TIMESTAMP', false, null, null);
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
        $this->addRelation('AnalyzeCeMatrix', '\\AnalyzeCeMatrix', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeCeMatrices', false);
        $this->addRelation('AnalyzeCeMatrixOutputs', '\\AnalyzeCeMatrixOutputs', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), null, null, 'AnalyzeCeMatrixOutputss', false);
        $this->addRelation('AnalyzeCriticalX', '\\AnalyzeCriticalX', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeCriticalxes', false);
        $this->addRelation('AnalyzeFmea', '\\AnalyzeFmea', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeFmeas', false);
        $this->addRelation('AnalyzeGateReview', '\\AnalyzeGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeGateReviews', false);
        $this->addRelation('AnalyzeHypothesisMap', '\\AnalyzeHypothesisMap', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeHypothesisMaps', false);
        $this->addRelation('ChartExcelData', '\\ChartExcelData', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ChartExcelDatas', false);
        $this->addRelation('ControlControlPlan', '\\ControlControlPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ControlControlPlans', false);
        $this->addRelation('ControlGateReview', '\\ControlGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ControlGateReviews', false);
        $this->addRelation('ControlTestPlan', '\\ControlTestPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ControlTestPlans', false);
        $this->addRelation('DefineCommunication', '\\DefineCommunication', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineCommunications', false);
        $this->addRelation('DefineGateReview', '\\DefineGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineGateReviews', false);
        $this->addRelation('DefineRaci', '\\DefineRaci', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineRacis', false);
        $this->addRelation('DefineRiskManagement', '\\DefineRiskManagement', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineRiskManagements', false);
        $this->addRelation('DefineSipoc', '\\DefineSipoc', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineSipocs', false);
        $this->addRelation('DefineStakeholders', '\\DefineStakeholders', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineStakeholderss', false);
        $this->addRelation('DefineValueStreamDiagram', '\\DefineValueStreamDiagram', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineValueStreamDiagrams', false);
        $this->addRelation('DefineVocCcr', '\\DefineVocCcr', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineVocCcrs', false);
        $this->addRelation('ImproveGateReview', '\\ImproveGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ImproveGateReviews', false);
        $this->addRelation('ImproveImprovementPlan', '\\ImproveImprovementPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ImproveImprovementPlans', false);
        $this->addRelation('ImproveValueStreamDiagram', '\\ImproveValueStreamDiagram', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ImproveValueStreamDiagrams', false);
        $this->addRelation('MeasureCollectionPlan', '\\MeasureCollectionPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureCollectionPlans', false);
        $this->addRelation('MeasureControlPlan', '\\MeasureControlPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureControlPlans', false);
        $this->addRelation('MeasureGateReview', '\\MeasureGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureGateReviews', false);
        $this->addRelation('MeasureNonvalueAnalysis', '\\MeasureNonvalueAnalysis', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureNonvalueAnalyses', false);
        $this->addRelation('MeasureValueStreamDiagram', '\\MeasureValueStreamDiagram', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':phase_component_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureValueStreamDiagrams', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to phase_components     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        AnalyzeCeMatrixTableMap::clearInstancePool();
        AnalyzeCriticalXTableMap::clearInstancePool();
        AnalyzeFmeaTableMap::clearInstancePool();
        AnalyzeGateReviewTableMap::clearInstancePool();
        AnalyzeHypothesisMapTableMap::clearInstancePool();
        ChartExcelDataTableMap::clearInstancePool();
        ControlControlPlanTableMap::clearInstancePool();
        ControlGateReviewTableMap::clearInstancePool();
        ControlTestPlanTableMap::clearInstancePool();
        DefineCommunicationTableMap::clearInstancePool();
        DefineGateReviewTableMap::clearInstancePool();
        DefineRaciTableMap::clearInstancePool();
        DefineRiskManagementTableMap::clearInstancePool();
        DefineSipocTableMap::clearInstancePool();
        DefineStakeholdersTableMap::clearInstancePool();
        DefineValueStreamDiagramTableMap::clearInstancePool();
        DefineVocCcrTableMap::clearInstancePool();
        ImproveGateReviewTableMap::clearInstancePool();
        ImproveImprovementPlanTableMap::clearInstancePool();
        ImproveValueStreamDiagramTableMap::clearInstancePool();
        MeasureCollectionPlanTableMap::clearInstancePool();
        MeasureControlPlanTableMap::clearInstancePool();
        MeasureGateReviewTableMap::clearInstancePool();
        MeasureNonvalueAnalysisTableMap::clearInstancePool();
        MeasureValueStreamDiagramTableMap::clearInstancePool();
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
        return $withPrefix ? PhaseComponentsTableMap::CLASS_DEFAULT : PhaseComponentsTableMap::OM_CLASS;
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
     * @return array           (PhaseComponents object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PhaseComponentsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PhaseComponentsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PhaseComponentsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PhaseComponentsTableMap::OM_CLASS;
            /** @var PhaseComponents $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PhaseComponentsTableMap::addInstanceToPool($obj, $key);
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
            $key = PhaseComponentsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PhaseComponentsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var PhaseComponents $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PhaseComponentsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_ID);
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_STATUS);
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_NAME);
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_GRADE);
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_DATE_TIME_STARTED);
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(PhaseComponentsTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.grade');
            $criteria->addSelectColumn($alias . '.date_time_started');
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
        return Propel::getServiceContainer()->getDatabaseMap(PhaseComponentsTableMap::DATABASE_NAME)->getTable(PhaseComponentsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PhaseComponentsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PhaseComponentsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PhaseComponentsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a PhaseComponents or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or PhaseComponents object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PhaseComponentsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \PhaseComponents) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PhaseComponentsTableMap::DATABASE_NAME);
            $criteria->add(PhaseComponentsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = PhaseComponentsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PhaseComponentsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PhaseComponentsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the phase_components table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PhaseComponentsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a PhaseComponents or Criteria object.
     *
     * @param mixed               $criteria Criteria or PhaseComponents object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PhaseComponentsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from PhaseComponents object
        }

        if ($criteria->containsKey(PhaseComponentsTableMap::COL_ID) && $criteria->keyContainsValue(PhaseComponentsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PhaseComponentsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = PhaseComponentsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PhaseComponentsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PhaseComponentsTableMap::buildTableMap();
