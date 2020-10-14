<?php

namespace Map;

use \DefineRiskManagement;
use \DefineRiskManagementQuery;
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
 * This class defines the structure of the 'define_risk_management' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class DefineRiskManagementTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.DefineRiskManagementTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'define_risk_management';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\DefineRiskManagement';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'DefineRiskManagement';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 17;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 17;

    /**
     * the column name for the id field
     */
    const COL_ID = 'define_risk_management.id';

    /**
     * the column name for the project_id field
     */
    const COL_PROJECT_ID = 'define_risk_management.project_id';

    /**
     * the column name for the phase_id field
     */
    const COL_PHASE_ID = 'define_risk_management.phase_id';

    /**
     * the column name for the phase_component_id field
     */
    const COL_PHASE_COMPONENT_ID = 'define_risk_management.phase_component_id';

    /**
     * the column name for the date_entered field
     */
    const COL_DATE_ENTERED = 'define_risk_management.date_entered';

    /**
     * the column name for the category_area field
     */
    const COL_CATEGORY_AREA = 'define_risk_management.category_area';

    /**
     * the column name for the specific_risk field
     */
    const COL_SPECIFIC_RISK = 'define_risk_management.specific_risk';

    /**
     * the column name for the severity field
     */
    const COL_SEVERITY = 'define_risk_management.severity';

    /**
     * the column name for the likelihood field
     */
    const COL_LIKELIHOOD = 'define_risk_management.likelihood';

    /**
     * the column name for the detectibility field
     */
    const COL_DETECTIBILITY = 'define_risk_management.detectibility';

    /**
     * the column name for the risk_priority field
     */
    const COL_RISK_PRIORITY = 'define_risk_management.risk_priority';

    /**
     * the column name for the mitigation_steps field
     */
    const COL_MITIGATION_STEPS = 'define_risk_management.mitigation_steps';

    /**
     * the column name for the person_accountable field
     */
    const COL_PERSON_ACCOUNTABLE = 'define_risk_management.person_accountable';

    /**
     * the column name for the due_date field
     */
    const COL_DUE_DATE = 'define_risk_management.due_date';

    /**
     * the column name for the contingency_plan field
     */
    const COL_CONTINGENCY_PLAN = 'define_risk_management.contingency_plan';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'define_risk_management.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'define_risk_management.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ProjectId', 'PhaseId', 'PhaseComponentId', 'DateEntered', 'CategoryArea', 'SpecificRisk', 'Severity', 'Likelihood', 'Detectibility', 'RiskPriority', 'MitigationSteps', 'PersonAccountable', 'DueDate', 'ContingencyPlan', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'projectId', 'phaseId', 'phaseComponentId', 'dateEntered', 'categoryArea', 'specificRisk', 'severity', 'likelihood', 'detectibility', 'riskPriority', 'mitigationSteps', 'personAccountable', 'dueDate', 'contingencyPlan', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(DefineRiskManagementTableMap::COL_ID, DefineRiskManagementTableMap::COL_PROJECT_ID, DefineRiskManagementTableMap::COL_PHASE_ID, DefineRiskManagementTableMap::COL_PHASE_COMPONENT_ID, DefineRiskManagementTableMap::COL_DATE_ENTERED, DefineRiskManagementTableMap::COL_CATEGORY_AREA, DefineRiskManagementTableMap::COL_SPECIFIC_RISK, DefineRiskManagementTableMap::COL_SEVERITY, DefineRiskManagementTableMap::COL_LIKELIHOOD, DefineRiskManagementTableMap::COL_DETECTIBILITY, DefineRiskManagementTableMap::COL_RISK_PRIORITY, DefineRiskManagementTableMap::COL_MITIGATION_STEPS, DefineRiskManagementTableMap::COL_PERSON_ACCOUNTABLE, DefineRiskManagementTableMap::COL_DUE_DATE, DefineRiskManagementTableMap::COL_CONTINGENCY_PLAN, DefineRiskManagementTableMap::COL_DATE_TIME_CREATED, DefineRiskManagementTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'project_id', 'phase_id', 'phase_component_id', 'date_entered', 'category_area', 'specific_risk', 'severity', 'likelihood', 'detectibility', 'risk_priority', 'mitigation_steps', 'person_accountable', 'due_date', 'contingency_plan', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ProjectId' => 1, 'PhaseId' => 2, 'PhaseComponentId' => 3, 'DateEntered' => 4, 'CategoryArea' => 5, 'SpecificRisk' => 6, 'Severity' => 7, 'Likelihood' => 8, 'Detectibility' => 9, 'RiskPriority' => 10, 'MitigationSteps' => 11, 'PersonAccountable' => 12, 'DueDate' => 13, 'ContingencyPlan' => 14, 'DateTimeCreated' => 15, 'LastUpdated' => 16, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'projectId' => 1, 'phaseId' => 2, 'phaseComponentId' => 3, 'dateEntered' => 4, 'categoryArea' => 5, 'specificRisk' => 6, 'severity' => 7, 'likelihood' => 8, 'detectibility' => 9, 'riskPriority' => 10, 'mitigationSteps' => 11, 'personAccountable' => 12, 'dueDate' => 13, 'contingencyPlan' => 14, 'dateTimeCreated' => 15, 'lastUpdated' => 16, ),
        self::TYPE_COLNAME       => array(DefineRiskManagementTableMap::COL_ID => 0, DefineRiskManagementTableMap::COL_PROJECT_ID => 1, DefineRiskManagementTableMap::COL_PHASE_ID => 2, DefineRiskManagementTableMap::COL_PHASE_COMPONENT_ID => 3, DefineRiskManagementTableMap::COL_DATE_ENTERED => 4, DefineRiskManagementTableMap::COL_CATEGORY_AREA => 5, DefineRiskManagementTableMap::COL_SPECIFIC_RISK => 6, DefineRiskManagementTableMap::COL_SEVERITY => 7, DefineRiskManagementTableMap::COL_LIKELIHOOD => 8, DefineRiskManagementTableMap::COL_DETECTIBILITY => 9, DefineRiskManagementTableMap::COL_RISK_PRIORITY => 10, DefineRiskManagementTableMap::COL_MITIGATION_STEPS => 11, DefineRiskManagementTableMap::COL_PERSON_ACCOUNTABLE => 12, DefineRiskManagementTableMap::COL_DUE_DATE => 13, DefineRiskManagementTableMap::COL_CONTINGENCY_PLAN => 14, DefineRiskManagementTableMap::COL_DATE_TIME_CREATED => 15, DefineRiskManagementTableMap::COL_LAST_UPDATED => 16, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'project_id' => 1, 'phase_id' => 2, 'phase_component_id' => 3, 'date_entered' => 4, 'category_area' => 5, 'specific_risk' => 6, 'severity' => 7, 'likelihood' => 8, 'detectibility' => 9, 'risk_priority' => 10, 'mitigation_steps' => 11, 'person_accountable' => 12, 'due_date' => 13, 'contingency_plan' => 14, 'date_time_created' => 15, 'last_updated' => 16, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
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
        $this->setName('define_risk_management');
        $this->setPhpName('DefineRiskManagement');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\DefineRiskManagement');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('project_id', 'ProjectId', 'INTEGER', 'projects', 'id', true, null, null);
        $this->addForeignKey('phase_id', 'PhaseId', 'INTEGER', 'project_phases', 'id', true, null, null);
        $this->addForeignKey('phase_component_id', 'PhaseComponentId', 'INTEGER', 'phase_components', 'id', true, null, null);
        $this->addColumn('date_entered', 'DateEntered', 'TIMESTAMP', false, null, null);
        $this->addColumn('category_area', 'CategoryArea', 'VARCHAR', true, 255, null);
        $this->addColumn('specific_risk', 'SpecificRisk', 'VARCHAR', true, 255, null);
        $this->addColumn('severity', 'Severity', 'INTEGER', true, null, null);
        $this->addColumn('likelihood', 'Likelihood', 'INTEGER', true, null, null);
        $this->addColumn('detectibility', 'Detectibility', 'INTEGER', true, null, null);
        $this->addColumn('risk_priority', 'RiskPriority', 'VARCHAR', true, 255, null);
        $this->addColumn('mitigation_steps', 'MitigationSteps', 'VARCHAR', true, 255, null);
        $this->addForeignKey('person_accountable', 'PersonAccountable', 'INTEGER', 'users', 'id', false, null, null);
        $this->addColumn('due_date', 'DueDate', 'DATE', true, null, null);
        $this->addColumn('contingency_plan', 'ContingencyPlan', 'VARCHAR', true, 255, null);
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
    0 => ':person_accountable',
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
        return $withPrefix ? DefineRiskManagementTableMap::CLASS_DEFAULT : DefineRiskManagementTableMap::OM_CLASS;
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
     * @return array           (DefineRiskManagement object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = DefineRiskManagementTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DefineRiskManagementTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DefineRiskManagementTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DefineRiskManagementTableMap::OM_CLASS;
            /** @var DefineRiskManagement $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DefineRiskManagementTableMap::addInstanceToPool($obj, $key);
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
            $key = DefineRiskManagementTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DefineRiskManagementTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var DefineRiskManagement $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DefineRiskManagementTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_ID);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_PROJECT_ID);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_PHASE_ID);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_PHASE_COMPONENT_ID);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_DATE_ENTERED);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_CATEGORY_AREA);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_SPECIFIC_RISK);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_SEVERITY);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_LIKELIHOOD);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_DETECTIBILITY);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_RISK_PRIORITY);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_MITIGATION_STEPS);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_PERSON_ACCOUNTABLE);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_DUE_DATE);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_CONTINGENCY_PLAN);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(DefineRiskManagementTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.project_id');
            $criteria->addSelectColumn($alias . '.phase_id');
            $criteria->addSelectColumn($alias . '.phase_component_id');
            $criteria->addSelectColumn($alias . '.date_entered');
            $criteria->addSelectColumn($alias . '.category_area');
            $criteria->addSelectColumn($alias . '.specific_risk');
            $criteria->addSelectColumn($alias . '.severity');
            $criteria->addSelectColumn($alias . '.likelihood');
            $criteria->addSelectColumn($alias . '.detectibility');
            $criteria->addSelectColumn($alias . '.risk_priority');
            $criteria->addSelectColumn($alias . '.mitigation_steps');
            $criteria->addSelectColumn($alias . '.person_accountable');
            $criteria->addSelectColumn($alias . '.due_date');
            $criteria->addSelectColumn($alias . '.contingency_plan');
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
        return Propel::getServiceContainer()->getDatabaseMap(DefineRiskManagementTableMap::DATABASE_NAME)->getTable(DefineRiskManagementTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(DefineRiskManagementTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(DefineRiskManagementTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new DefineRiskManagementTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a DefineRiskManagement or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or DefineRiskManagement object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(DefineRiskManagementTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \DefineRiskManagement) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DefineRiskManagementTableMap::DATABASE_NAME);
            $criteria->add(DefineRiskManagementTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = DefineRiskManagementQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DefineRiskManagementTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DefineRiskManagementTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the define_risk_management table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return DefineRiskManagementQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DefineRiskManagement or Criteria object.
     *
     * @param mixed               $criteria Criteria or DefineRiskManagement object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DefineRiskManagementTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DefineRiskManagement object
        }

        if ($criteria->containsKey(DefineRiskManagementTableMap::COL_ID) && $criteria->keyContainsValue(DefineRiskManagementTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DefineRiskManagementTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = DefineRiskManagementQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // DefineRiskManagementTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
DefineRiskManagementTableMap::buildTableMap();
