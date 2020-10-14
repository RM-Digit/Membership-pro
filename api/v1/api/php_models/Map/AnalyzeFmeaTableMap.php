<?php

namespace Map;

use \AnalyzeFmea;
use \AnalyzeFmeaQuery;
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
 * This class defines the structure of the 'analyze_fmea' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AnalyzeFmeaTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AnalyzeFmeaTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'analyze_fmea';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AnalyzeFmea';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AnalyzeFmea';

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
    const COL_ID = 'analyze_fmea.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'analyze_fmea.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'analyze_fmea.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'analyze_fmea.phase_component_id';

    /**
     * the column name for the input field
     */
    const COL_INPUT = 'analyze_fmea.input';

    /**
     * the column name for the failure_mode field
     */
    const COL_FAILURE_MODE = 'analyze_fmea.failure_mode';

    /**
     * the column name for the failure_effects field
     */
    const COL_FAILURE_EFFECTS = 'analyze_fmea.failure_effects';

    /**
     * the column name for the severity field
     */
    const COL_SEVERITY = 'analyze_fmea.severity';

    /**
     * the column name for the causes field
     */
    const COL_CAUSES = 'analyze_fmea.causes';

    /**
     * the column name for the likelihood field
     */
    const COL_LIKELIHOOD = 'analyze_fmea.likelihood';

    /**
     * the column name for the current_controls field
     */
    const COL_CURRENT_CONTROLS = 'analyze_fmea.current_controls';

    /**
     * the column name for the detection field
     */
    const COL_DETECTION = 'analyze_fmea.detection';

    /**
     * the column name for the rpn field
     */
    const COL_RPN = 'analyze_fmea.rpn';

    /**
     * the column name for the actions_recommended field
     */
    const COL_ACTIONS_RECOMMENDED = 'analyze_fmea.actions_recommended';

    /**
     * the column name for the resp field
     */
    const COL_RESP = 'analyze_fmea.resp';

    /**
     * the column name for the actions_taken field
     */
    const COL_ACTIONS_TAKEN = 'analyze_fmea.actions_taken';

    /**
     * the column name for the action_plan_severity field
     */
    const COL_ACTION_PLAN_SEVERITY = 'analyze_fmea.action_plan_severity';

    /**
     * the column name for the action_plan_likelihood field
     */
    const COL_ACTION_PLAN_LIKELIHOOD = 'analyze_fmea.action_plan_likelihood';

    /**
     * the column name for the action_plan_detection field
     */
    const COL_ACTION_PLAN_DETECTION = 'analyze_fmea.action_plan_detection';

    /**
     * the column name for the action_plan_rpn field
     */
    const COL_ACTION_PLAN_RPN = 'analyze_fmea.action_plan_rpn';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'analyze_fmea.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'analyze_fmea.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'Input', 'FailureMode', 'FailureEffects', 'Severity', 'Causes', 'Likelihood', 'CurrentControls', 'Detection', 'Rpn', 'ActionsRecommended', 'Resp', 'ActionsTaken', 'ActionPlanSeverity', 'ActionPlanLikelihood', 'ActionPlanDetection', 'ActionPlanRpn', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'input', 'failureMode', 'failureEffects', 'severity', 'causes', 'likelihood', 'currentControls', 'detection', 'rpn', 'actionsRecommended', 'resp', 'actionsTaken', 'actionPlanSeverity', 'actionPlanLikelihood', 'actionPlanDetection', 'actionPlanRpn', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(AnalyzeFmeaTableMap::COL_ID, AnalyzeFmeaTableMap::COL_PROJECT_ID, AnalyzeFmeaTableMap::COL_PHASE_ID, AnalyzeFmeaTableMap::COL_PHASE_COMPONENT_ID, AnalyzeFmeaTableMap::COL_INPUT, AnalyzeFmeaTableMap::COL_FAILURE_MODE, AnalyzeFmeaTableMap::COL_FAILURE_EFFECTS, AnalyzeFmeaTableMap::COL_SEVERITY, AnalyzeFmeaTableMap::COL_CAUSES, AnalyzeFmeaTableMap::COL_LIKELIHOOD, AnalyzeFmeaTableMap::COL_CURRENT_CONTROLS, AnalyzeFmeaTableMap::COL_DETECTION, AnalyzeFmeaTableMap::COL_RPN, AnalyzeFmeaTableMap::COL_ACTIONS_RECOMMENDED, AnalyzeFmeaTableMap::COL_RESP, AnalyzeFmeaTableMap::COL_ACTIONS_TAKEN, AnalyzeFmeaTableMap::COL_ACTION_PLAN_SEVERITY, AnalyzeFmeaTableMap::COL_ACTION_PLAN_LIKELIHOOD, AnalyzeFmeaTableMap::COL_ACTION_PLAN_DETECTION, AnalyzeFmeaTableMap::COL_ACTION_PLAN_RPN, AnalyzeFmeaTableMap::COL_DATE_TIME_CREATED, AnalyzeFmeaTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'input', 'failure_mode', 'failure_effects', 'severity', 'causes', 'likelihood', 'current_controls', 'detection', 'rpn', 'actions_recommended', 'resp', 'actions_taken', 'action_plan_severity', 'action_plan_likelihood', 'action_plan_detection', 'action_plan_rpn', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'Input' => 4, 'FailureMode' => 5, 'FailureEffects' => 6, 'Severity' => 7, 'Causes' => 8, 'Likelihood' => 9, 'CurrentControls' => 10, 'Detection' => 11, 'Rpn' => 12, 'ActionsRecommended' => 13, 'Resp' => 14, 'ActionsTaken' => 15, 'ActionPlanSeverity' => 16, 'ActionPlanLikelihood' => 17, 'ActionPlanDetection' => 18, 'ActionPlanRpn' => 19, 'DateTimeCreated' => 20, 'LastUpdated' => 21, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'input' => 4, 'failureMode' => 5, 'failureEffects' => 6, 'severity' => 7, 'causes' => 8, 'likelihood' => 9, 'currentControls' => 10, 'detection' => 11, 'rpn' => 12, 'actionsRecommended' => 13, 'resp' => 14, 'actionsTaken' => 15, 'actionPlanSeverity' => 16, 'actionPlanLikelihood' => 17, 'actionPlanDetection' => 18, 'actionPlanRpn' => 19, 'dateTimeCreated' => 20, 'lastUpdated' => 21, ),
        self::TYPE_COLNAME       => array(AnalyzeFmeaTableMap::COL_ID => 0, AnalyzeFmeaTableMap::COL_PROJECT_ID => 1, AnalyzeFmeaTableMap::COL_PHASE_ID => 2, AnalyzeFmeaTableMap::COL_PHASE_COMPONENT_ID => 3, AnalyzeFmeaTableMap::COL_INPUT => 4, AnalyzeFmeaTableMap::COL_FAILURE_MODE => 5, AnalyzeFmeaTableMap::COL_FAILURE_EFFECTS => 6, AnalyzeFmeaTableMap::COL_SEVERITY => 7, AnalyzeFmeaTableMap::COL_CAUSES => 8, AnalyzeFmeaTableMap::COL_LIKELIHOOD => 9, AnalyzeFmeaTableMap::COL_CURRENT_CONTROLS => 10, AnalyzeFmeaTableMap::COL_DETECTION => 11, AnalyzeFmeaTableMap::COL_RPN => 12, AnalyzeFmeaTableMap::COL_ACTIONS_RECOMMENDED => 13, AnalyzeFmeaTableMap::COL_RESP => 14, AnalyzeFmeaTableMap::COL_ACTIONS_TAKEN => 15, AnalyzeFmeaTableMap::COL_ACTION_PLAN_SEVERITY => 16, AnalyzeFmeaTableMap::COL_ACTION_PLAN_LIKELIHOOD => 17, AnalyzeFmeaTableMap::COL_ACTION_PLAN_DETECTION => 18, AnalyzeFmeaTableMap::COL_ACTION_PLAN_RPN => 19, AnalyzeFmeaTableMap::COL_DATE_TIME_CREATED => 20, AnalyzeFmeaTableMap::COL_LAST_UPDATED => 21, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'input' => 4, 'failure_mode' => 5, 'failure_effects' => 6, 'severity' => 7, 'causes' => 8, 'likelihood' => 9, 'current_controls' => 10, 'detection' => 11, 'rpn' => 12, 'actions_recommended' => 13, 'resp' => 14, 'actions_taken' => 15, 'action_plan_severity' => 16, 'action_plan_likelihood' => 17, 'action_plan_detection' => 18, 'action_plan_rpn' => 19, 'date_time_created' => 20, 'last_updated' => 21, ),
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
        $this->setName('analyze_fmea');
        $this->setPhpName('AnalyzeFmea');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\AnalyzeFmea');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addForeignKey('phase_component_id', 'PhaseComponentId', 'INTEGER', 'phase_components', 'id', true, null, null);
        $this->addColumn('input', 'Input', 'VARCHAR', true, 255, null);
        $this->addColumn('failure_mode', 'FailureMode', 'VARCHAR', true, 255, null);
        $this->addColumn('failure_effects', 'FailureEffects', 'VARCHAR', true, 255, null);
        $this->addColumn('severity', 'Severity', 'VARCHAR', true, 255, null);
        $this->addColumn('causes', 'Causes', 'VARCHAR', true, 255, null);
        $this->addColumn('likelihood', 'Likelihood', 'VARCHAR', true, 255, null);
        $this->addColumn('current_controls', 'CurrentControls', 'VARCHAR', true, 255, null);
        $this->addColumn('detection', 'Detection', 'VARCHAR', true, 255, null);
        $this->addColumn('rpn', 'Rpn', 'VARCHAR', true, 255, null);
        $this->addColumn('actions_recommended', 'ActionsRecommended', 'VARCHAR', true, 255, null);
        $this->addColumn('resp', 'Resp', 'VARCHAR', true, 255, null);
        $this->addColumn('actions_taken', 'ActionsTaken', 'VARCHAR', true, 255, null);
        $this->addColumn('action_plan_severity', 'ActionPlanSeverity', 'VARCHAR', true, 255, null);
        $this->addColumn('action_plan_likelihood', 'ActionPlanLikelihood', 'VARCHAR', true, 255, null);
        $this->addColumn('action_plan_detection', 'ActionPlanDetection', 'VARCHAR', true, 255, null);
        $this->addColumn('action_plan_rpn', 'ActionPlanRpn', 'VARCHAR', true, 255, null);
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
        return $withPrefix ? AnalyzeFmeaTableMap::CLASS_DEFAULT : AnalyzeFmeaTableMap::OM_CLASS;
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
     * @return array           (AnalyzeFmea object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AnalyzeFmeaTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AnalyzeFmeaTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AnalyzeFmeaTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AnalyzeFmeaTableMap::OM_CLASS;
            /** @var AnalyzeFmea $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AnalyzeFmeaTableMap::addInstanceToPool($obj, $key);
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
            $key = AnalyzeFmeaTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AnalyzeFmeaTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AnalyzeFmea $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AnalyzeFmeaTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_ID);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_INPUT);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_FAILURE_MODE);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_FAILURE_EFFECTS);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_SEVERITY);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_CAUSES);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_LIKELIHOOD);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_CURRENT_CONTROLS);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_DETECTION);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_RPN);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_ACTIONS_RECOMMENDED);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_RESP);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_ACTIONS_TAKEN);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_ACTION_PLAN_SEVERITY);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_ACTION_PLAN_LIKELIHOOD);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_ACTION_PLAN_DETECTION);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_ACTION_PLAN_RPN);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(AnalyzeFmeaTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.input');
            $criteria->addSelectColumn($alias . '.failure_mode');
            $criteria->addSelectColumn($alias . '.failure_effects');
            $criteria->addSelectColumn($alias . '.severity');
            $criteria->addSelectColumn($alias . '.causes');
            $criteria->addSelectColumn($alias . '.likelihood');
            $criteria->addSelectColumn($alias . '.current_controls');
            $criteria->addSelectColumn($alias . '.detection');
            $criteria->addSelectColumn($alias . '.rpn');
            $criteria->addSelectColumn($alias . '.actions_recommended');
            $criteria->addSelectColumn($alias . '.resp');
            $criteria->addSelectColumn($alias . '.actions_taken');
            $criteria->addSelectColumn($alias . '.action_plan_severity');
            $criteria->addSelectColumn($alias . '.action_plan_likelihood');
            $criteria->addSelectColumn($alias . '.action_plan_detection');
            $criteria->addSelectColumn($alias . '.action_plan_rpn');
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
        return Propel::getServiceContainer()->getDatabaseMap(AnalyzeFmeaTableMap::DATABASE_NAME)->getTable(AnalyzeFmeaTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AnalyzeFmeaTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AnalyzeFmeaTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AnalyzeFmeaTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AnalyzeFmea or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AnalyzeFmea object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeFmeaTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AnalyzeFmea) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AnalyzeFmeaTableMap::DATABASE_NAME);
            $criteria->add(AnalyzeFmeaTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AnalyzeFmeaQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AnalyzeFmeaTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AnalyzeFmeaTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the analyze_fmea table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AnalyzeFmeaQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AnalyzeFmea or Criteria object.
     *
     * @param mixed               $criteria Criteria or AnalyzeFmea object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeFmeaTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AnalyzeFmea object
        }

        if ($criteria->containsKey(AnalyzeFmeaTableMap::COL_ID) && $criteria->keyContainsValue(AnalyzeFmeaTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AnalyzeFmeaTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AnalyzeFmeaQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AnalyzeFmeaTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AnalyzeFmeaTableMap::buildTableMap();
