<?php

namespace Map;

use \Projects;
use \ProjectsQuery;
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
 * This class defines the structure of the 'projects' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ProjectsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ProjectsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'projects';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Projects';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Projects';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 24;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 24;

    /**
     * the column name for the id field
     */
    const COL_ID = 'projects.id';

    /**
     * the column name for the client_id field
     */
    const COL_CLIENT_ID = 'projects.client_id';

    /**
     * the column name for the created_by field
     */
    const COL_CREATED_BY = 'projects.created_by';

    /**
     * the column name for the status field
     */
    const COL_STATUS = 'projects.status';

    /**
     * the column name for the name field
     */
    const COL_NAME = 'projects.name';

    /**
     * the column name for the type field
     */
    const COL_TYPE = 'projects.type';

    /**
     * the column name for the diagram_type field
     */
    const COL_DIAGRAM_TYPE = 'projects.diagram_type';

    /**
     * the column name for the lead field
     */
    const COL_LEAD = 'projects.lead';

    /**
     * the column name for the sponsor field
     */
    const COL_SPONSOR = 'projects.sponsor';

    /**
     * the column name for the core_team field
     */
    const COL_CORE_TEAM = 'projects.core_team';

    /**
     * the column name for the business_unit field
     */
    const COL_BUSINESS_UNIT = 'projects.business_unit';

    /**
     * the column name for the location field
     */
    const COL_LOCATION = 'projects.location';

    /**
     * the column name for the business_impact field
     */
    const COL_BUSINESS_IMPACT = 'projects.business_impact';

    /**
     * the column name for the business_impact_value field
     */
    const COL_BUSINESS_IMPACT_VALUE = 'projects.business_impact_value';

    /**
     * the column name for the problem_statement field
     */
    const COL_PROBLEM_STATEMENT = 'projects.problem_statement';

    /**
     * the column name for the goals field
     */
    const COL_GOALS = 'projects.goals';

    /**
     * the column name for the scope field
     */
    const COL_SCOPE = 'projects.scope';

    /**
     * the column name for the define_review_date field
     */
    const COL_DEFINE_REVIEW_DATE = 'projects.define_review_date';

    /**
     * the column name for the measure_review_date field
     */
    const COL_MEASURE_REVIEW_DATE = 'projects.measure_review_date';

    /**
     * the column name for the analyze_review_date field
     */
    const COL_ANALYZE_REVIEW_DATE = 'projects.analyze_review_date';

    /**
     * the column name for the improve_review_date field
     */
    const COL_IMPROVE_REVIEW_DATE = 'projects.improve_review_date';

    /**
     * the column name for the control_review_date field
     */
    const COL_CONTROL_REVIEW_DATE = 'projects.control_review_date';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'projects.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'projects.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'ClientId', 'CreatedBy', 'Status', 'Name', 'Type', 'DiagramType', 'Lead', 'Sponsor', 'CoreTeam', 'BusinessUnit', 'Location', 'BusinessImpact', 'BusinessImpactValue', 'ProblemStatement', 'Goals', 'Scope', 'DefineReviewDate', 'MeasureReviewDate', 'AnalyzeReviewDate', 'ImproveReviewDate', 'ControlReviewDate', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'clientId', 'createdBy', 'status', 'name', 'type', 'diagramType', 'lead', 'sponsor', 'coreTeam', 'businessUnit', 'location', 'businessImpact', 'businessImpactValue', 'problemStatement', 'goals', 'scope', 'defineReviewDate', 'measureReviewDate', 'analyzeReviewDate', 'improveReviewDate', 'controlReviewDate', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(ProjectsTableMap::COL_ID, ProjectsTableMap::COL_CLIENT_ID, ProjectsTableMap::COL_CREATED_BY, ProjectsTableMap::COL_STATUS, ProjectsTableMap::COL_NAME, ProjectsTableMap::COL_TYPE, ProjectsTableMap::COL_DIAGRAM_TYPE, ProjectsTableMap::COL_LEAD, ProjectsTableMap::COL_SPONSOR, ProjectsTableMap::COL_CORE_TEAM, ProjectsTableMap::COL_BUSINESS_UNIT, ProjectsTableMap::COL_LOCATION, ProjectsTableMap::COL_BUSINESS_IMPACT, ProjectsTableMap::COL_BUSINESS_IMPACT_VALUE, ProjectsTableMap::COL_PROBLEM_STATEMENT, ProjectsTableMap::COL_GOALS, ProjectsTableMap::COL_SCOPE, ProjectsTableMap::COL_DEFINE_REVIEW_DATE, ProjectsTableMap::COL_MEASURE_REVIEW_DATE, ProjectsTableMap::COL_ANALYZE_REVIEW_DATE, ProjectsTableMap::COL_IMPROVE_REVIEW_DATE, ProjectsTableMap::COL_CONTROL_REVIEW_DATE, ProjectsTableMap::COL_DATE_TIME_CREATED, ProjectsTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'client_id', 'created_by', 'status', 'name', 'type', 'diagram_type', 'lead', 'sponsor', 'core_team', 'business_unit', 'location', 'business_impact', 'business_impact_value', 'problem_statement', 'goals', 'scope', 'define_review_date', 'measure_review_date', 'analyze_review_date', 'improve_review_date', 'control_review_date', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'ClientId' => 1, 'CreatedBy' => 2, 'Status' => 3, 'Name' => 4, 'Type' => 5, 'DiagramType' => 6, 'Lead' => 7, 'Sponsor' => 8, 'CoreTeam' => 9, 'BusinessUnit' => 10, 'Location' => 11, 'BusinessImpact' => 12, 'BusinessImpactValue' => 13, 'ProblemStatement' => 14, 'Goals' => 15, 'Scope' => 16, 'DefineReviewDate' => 17, 'MeasureReviewDate' => 18, 'AnalyzeReviewDate' => 19, 'ImproveReviewDate' => 20, 'ControlReviewDate' => 21, 'DateTimeCreated' => 22, 'LastUpdated' => 23, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'clientId' => 1, 'createdBy' => 2, 'status' => 3, 'name' => 4, 'type' => 5, 'diagramType' => 6, 'lead' => 7, 'sponsor' => 8, 'coreTeam' => 9, 'businessUnit' => 10, 'location' => 11, 'businessImpact' => 12, 'businessImpactValue' => 13, 'problemStatement' => 14, 'goals' => 15, 'scope' => 16, 'defineReviewDate' => 17, 'measureReviewDate' => 18, 'analyzeReviewDate' => 19, 'improveReviewDate' => 20, 'controlReviewDate' => 21, 'dateTimeCreated' => 22, 'lastUpdated' => 23, ),
        self::TYPE_COLNAME       => array(ProjectsTableMap::COL_ID => 0, ProjectsTableMap::COL_CLIENT_ID => 1, ProjectsTableMap::COL_CREATED_BY => 2, ProjectsTableMap::COL_STATUS => 3, ProjectsTableMap::COL_NAME => 4, ProjectsTableMap::COL_TYPE => 5, ProjectsTableMap::COL_DIAGRAM_TYPE => 6, ProjectsTableMap::COL_LEAD => 7, ProjectsTableMap::COL_SPONSOR => 8, ProjectsTableMap::COL_CORE_TEAM => 9, ProjectsTableMap::COL_BUSINESS_UNIT => 10, ProjectsTableMap::COL_LOCATION => 11, ProjectsTableMap::COL_BUSINESS_IMPACT => 12, ProjectsTableMap::COL_BUSINESS_IMPACT_VALUE => 13, ProjectsTableMap::COL_PROBLEM_STATEMENT => 14, ProjectsTableMap::COL_GOALS => 15, ProjectsTableMap::COL_SCOPE => 16, ProjectsTableMap::COL_DEFINE_REVIEW_DATE => 17, ProjectsTableMap::COL_MEASURE_REVIEW_DATE => 18, ProjectsTableMap::COL_ANALYZE_REVIEW_DATE => 19, ProjectsTableMap::COL_IMPROVE_REVIEW_DATE => 20, ProjectsTableMap::COL_CONTROL_REVIEW_DATE => 21, ProjectsTableMap::COL_DATE_TIME_CREATED => 22, ProjectsTableMap::COL_LAST_UPDATED => 23, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'client_id' => 1, 'created_by' => 2, 'status' => 3, 'name' => 4, 'type' => 5, 'diagram_type' => 6, 'lead' => 7, 'sponsor' => 8, 'core_team' => 9, 'business_unit' => 10, 'location' => 11, 'business_impact' => 12, 'business_impact_value' => 13, 'problem_statement' => 14, 'goals' => 15, 'scope' => 16, 'define_review_date' => 17, 'measure_review_date' => 18, 'analyze_review_date' => 19, 'improve_review_date' => 20, 'control_review_date' => 21, 'date_time_created' => 22, 'last_updated' => 23, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
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
        $this->setName('projects');
        $this->setPhpName('Projects');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\Projects');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('client_id', 'ClientId', 'INTEGER', 'clients', 'id', false, null, null);
        $this->addForeignKey('created_by', 'CreatedBy', 'INTEGER', 'users', 'id', false, null, null);
        $this->addColumn('status', 'Status', 'CHAR', true, null, 'active');
        $this->addColumn('name', 'Name', 'VARCHAR', false, 255, null);
        $this->addColumn('type', 'Type', 'VARCHAR', false, 255, null);
        $this->addColumn('diagram_type', 'DiagramType', 'VARCHAR', true, 255, 'SIPOC');
        $this->addForeignKey('lead', 'Lead', 'INTEGER', 'users', 'id', false, null, null);
        $this->addForeignKey('sponsor', 'Sponsor', 'INTEGER', 'users', 'id', false, null, null);
        $this->addColumn('core_team', 'CoreTeam', 'VARCHAR', true, 255, '[]');
        $this->addColumn('business_unit', 'BusinessUnit', 'VARCHAR', false, 255, null);
        $this->addColumn('location', 'Location', 'VARCHAR', false, 255, null);
        $this->addColumn('business_impact', 'BusinessImpact', 'LONGVARCHAR', false, null, null);
        $this->addColumn('business_impact_value', 'BusinessImpactValue', 'VARCHAR', false, 25, null);
        $this->addColumn('problem_statement', 'ProblemStatement', 'LONGVARCHAR', false, null, null);
        $this->addColumn('goals', 'Goals', 'LONGVARCHAR', false, null, null);
        $this->addColumn('scope', 'Scope', 'LONGVARCHAR', false, null, null);
        $this->addColumn('define_review_date', 'DefineReviewDate', 'DATE', false, null, null);
        $this->addColumn('measure_review_date', 'MeasureReviewDate', 'DATE', false, null, null);
        $this->addColumn('analyze_review_date', 'AnalyzeReviewDate', 'DATE', false, null, null);
        $this->addColumn('improve_review_date', 'ImproveReviewDate', 'DATE', false, null, null);
        $this->addColumn('control_review_date', 'ControlReviewDate', 'DATE', false, null, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Clients', '\\Clients', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':client_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('UsersRelatedByCreatedBy', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':created_by',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('UsersRelatedBySponsor', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':sponsor',
    1 => ':id',
  ),
), null, null, null, false);
        $this->addRelation('UsersRelatedByLead', '\\Users', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':lead',
    1 => ':id',
  ),
), 'SET NULL', null, null, false);
        $this->addRelation('ActionTracking', '\\ActionTracking', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ActionTrackings', false);
        $this->addRelation('AnalyzeCeMatrix', '\\AnalyzeCeMatrix', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeCeMatrices', false);
        $this->addRelation('AnalyzeCeMatrixOutputs', '\\AnalyzeCeMatrixOutputs', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeCeMatrixOutputss', false);
        $this->addRelation('AnalyzeCriticalX', '\\AnalyzeCriticalX', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeCriticalxes', false);
        $this->addRelation('AnalyzeFmea', '\\AnalyzeFmea', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeFmeas', false);
        $this->addRelation('AnalyzeGateReview', '\\AnalyzeGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeGateReviews', false);
        $this->addRelation('AnalyzeHypothesisMap', '\\AnalyzeHypothesisMap', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'AnalyzeHypothesisMaps', false);
        $this->addRelation('ChartExcelData', '\\ChartExcelData', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ChartExcelDatas', false);
        $this->addRelation('ControlControlPlan', '\\ControlControlPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ControlControlPlans', false);
        $this->addRelation('ControlGateReview', '\\ControlGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ControlGateReviews', false);
        $this->addRelation('ControlTestPlan', '\\ControlTestPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ControlTestPlans', false);
        $this->addRelation('DefineCommunication', '\\DefineCommunication', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineCommunications', false);
        $this->addRelation('DefineGateReview', '\\DefineGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineGateReviews', false);
        $this->addRelation('DefineRaci', '\\DefineRaci', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineRacis', false);
        $this->addRelation('DefineRiskManagement', '\\DefineRiskManagement', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineRiskManagements', false);
        $this->addRelation('DefineSipoc', '\\DefineSipoc', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineSipocs', false);
        $this->addRelation('DefineStakeholders', '\\DefineStakeholders', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineStakeholderss', false);
        $this->addRelation('DefineValueStreamDiagram', '\\DefineValueStreamDiagram', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineValueStreamDiagrams', false);
        $this->addRelation('DefineVocCcr', '\\DefineVocCcr', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'DefineVocCcrs', false);
        $this->addRelation('ImproveGateReview', '\\ImproveGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ImproveGateReviews', false);
        $this->addRelation('ImproveImprovementPlan', '\\ImproveImprovementPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ImproveImprovementPlans', false);
        $this->addRelation('ImproveValueStreamDiagram', '\\ImproveValueStreamDiagram', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ImproveValueStreamDiagrams', false);
        $this->addRelation('MeasureCollectionPlan', '\\MeasureCollectionPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureCollectionPlans', false);
        $this->addRelation('MeasureControlPlan', '\\MeasureControlPlan', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureControlPlans', false);
        $this->addRelation('MeasureGateReview', '\\MeasureGateReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureGateReviews', false);
        $this->addRelation('MeasureNonvalueAnalysis', '\\MeasureNonvalueAnalysis', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureNonvalueAnalyses', false);
        $this->addRelation('MeasureValueStreamDiagram', '\\MeasureValueStreamDiagram', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'MeasureValueStreamDiagrams', false);
        $this->addRelation('PhaseComponents', '\\PhaseComponents', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'PhaseComponentss', false);
        $this->addRelation('ProjectPhases', '\\ProjectPhases', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':project_id',
    1 => ':id',
  ),
), 'CASCADE', null, 'ProjectPhasess', false);
    } // buildRelations()
    /**
     * Method to invalidate the instance pool of all tables related to projects     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        ActionTrackingTableMap::clearInstancePool();
        AnalyzeCeMatrixTableMap::clearInstancePool();
        AnalyzeCeMatrixOutputsTableMap::clearInstancePool();
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
        PhaseComponentsTableMap::clearInstancePool();
        ProjectPhasesTableMap::clearInstancePool();
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
        return $withPrefix ? ProjectsTableMap::CLASS_DEFAULT : ProjectsTableMap::OM_CLASS;
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
     * @return array           (Projects object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ProjectsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProjectsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProjectsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProjectsTableMap::OM_CLASS;
            /** @var Projects $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProjectsTableMap::addInstanceToPool($obj, $key);
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
            $key = ProjectsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProjectsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Projects $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ProjectsTableMap::COL_ID);
            $criteria->addSelectColumn(ProjectsTableMap::COL_CLIENT_ID);
            $criteria->addSelectColumn(ProjectsTableMap::COL_CREATED_BY);
            $criteria->addSelectColumn(ProjectsTableMap::COL_STATUS);
            $criteria->addSelectColumn(ProjectsTableMap::COL_NAME);
            $criteria->addSelectColumn(ProjectsTableMap::COL_TYPE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_DIAGRAM_TYPE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_LEAD);
            $criteria->addSelectColumn(ProjectsTableMap::COL_SPONSOR);
            $criteria->addSelectColumn(ProjectsTableMap::COL_CORE_TEAM);
            $criteria->addSelectColumn(ProjectsTableMap::COL_BUSINESS_UNIT);
            $criteria->addSelectColumn(ProjectsTableMap::COL_LOCATION);
            $criteria->addSelectColumn(ProjectsTableMap::COL_BUSINESS_IMPACT);
            $criteria->addSelectColumn(ProjectsTableMap::COL_BUSINESS_IMPACT_VALUE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_PROBLEM_STATEMENT);
            $criteria->addSelectColumn(ProjectsTableMap::COL_GOALS);
            $criteria->addSelectColumn(ProjectsTableMap::COL_SCOPE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_DEFINE_REVIEW_DATE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_MEASURE_REVIEW_DATE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_ANALYZE_REVIEW_DATE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_IMPROVE_REVIEW_DATE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_CONTROL_REVIEW_DATE);
            $criteria->addSelectColumn(ProjectsTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(ProjectsTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.client_id');
            $criteria->addSelectColumn($alias . '.created_by');
            $criteria->addSelectColumn($alias . '.status');
            $criteria->addSelectColumn($alias . '.name');
            $criteria->addSelectColumn($alias . '.type');
            $criteria->addSelectColumn($alias . '.diagram_type');
            $criteria->addSelectColumn($alias . '.lead');
            $criteria->addSelectColumn($alias . '.sponsor');
            $criteria->addSelectColumn($alias . '.core_team');
            $criteria->addSelectColumn($alias . '.business_unit');
            $criteria->addSelectColumn($alias . '.location');
            $criteria->addSelectColumn($alias . '.business_impact');
            $criteria->addSelectColumn($alias . '.business_impact_value');
            $criteria->addSelectColumn($alias . '.problem_statement');
            $criteria->addSelectColumn($alias . '.goals');
            $criteria->addSelectColumn($alias . '.scope');
            $criteria->addSelectColumn($alias . '.define_review_date');
            $criteria->addSelectColumn($alias . '.measure_review_date');
            $criteria->addSelectColumn($alias . '.analyze_review_date');
            $criteria->addSelectColumn($alias . '.improve_review_date');
            $criteria->addSelectColumn($alias . '.control_review_date');
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
        return Propel::getServiceContainer()->getDatabaseMap(ProjectsTableMap::DATABASE_NAME)->getTable(ProjectsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ProjectsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ProjectsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ProjectsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Projects or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Projects object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Projects) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectsTableMap::DATABASE_NAME);
            $criteria->add(ProjectsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ProjectsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProjectsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProjectsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the projects table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ProjectsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Projects or Criteria object.
     *
     * @param mixed               $criteria Criteria or Projects object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Projects object
        }

        if ($criteria->containsKey(ProjectsTableMap::COL_ID) && $criteria->keyContainsValue(ProjectsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ProjectsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ProjectsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ProjectsTableMap::buildTableMap();
