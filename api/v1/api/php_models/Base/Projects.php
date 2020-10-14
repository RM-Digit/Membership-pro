<?php

namespace Base;

use \ActionTracking as ChildActionTracking;
use \ActionTrackingQuery as ChildActionTrackingQuery;
use \AnalyzeCeMatrix as ChildAnalyzeCeMatrix;
use \AnalyzeCeMatrixOutputs as ChildAnalyzeCeMatrixOutputs;
use \AnalyzeCeMatrixOutputsQuery as ChildAnalyzeCeMatrixOutputsQuery;
use \AnalyzeCeMatrixQuery as ChildAnalyzeCeMatrixQuery;
use \AnalyzeCriticalX as ChildAnalyzeCriticalX;
use \AnalyzeCriticalXQuery as ChildAnalyzeCriticalXQuery;
use \AnalyzeFmea as ChildAnalyzeFmea;
use \AnalyzeFmeaQuery as ChildAnalyzeFmeaQuery;
use \AnalyzeGateReview as ChildAnalyzeGateReview;
use \AnalyzeGateReviewQuery as ChildAnalyzeGateReviewQuery;
use \AnalyzeHypothesisMap as ChildAnalyzeHypothesisMap;
use \AnalyzeHypothesisMapQuery as ChildAnalyzeHypothesisMapQuery;
use \ChartExcelData as ChildChartExcelData;
use \ChartExcelDataQuery as ChildChartExcelDataQuery;
use \Clients as ChildClients;
use \ClientsQuery as ChildClientsQuery;
use \ControlControlPlan as ChildControlControlPlan;
use \ControlControlPlanQuery as ChildControlControlPlanQuery;
use \ControlGateReview as ChildControlGateReview;
use \ControlGateReviewQuery as ChildControlGateReviewQuery;
use \ControlTestPlan as ChildControlTestPlan;
use \ControlTestPlanQuery as ChildControlTestPlanQuery;
use \DefineCommunication as ChildDefineCommunication;
use \DefineCommunicationQuery as ChildDefineCommunicationQuery;
use \DefineGateReview as ChildDefineGateReview;
use \DefineGateReviewQuery as ChildDefineGateReviewQuery;
use \DefineRaci as ChildDefineRaci;
use \DefineRaciQuery as ChildDefineRaciQuery;
use \DefineRiskManagement as ChildDefineRiskManagement;
use \DefineRiskManagementQuery as ChildDefineRiskManagementQuery;
use \DefineSipoc as ChildDefineSipoc;
use \DefineSipocQuery as ChildDefineSipocQuery;
use \DefineStakeholders as ChildDefineStakeholders;
use \DefineStakeholdersQuery as ChildDefineStakeholdersQuery;
use \DefineValueStreamDiagram as ChildDefineValueStreamDiagram;
use \DefineValueStreamDiagramQuery as ChildDefineValueStreamDiagramQuery;
use \DefineVocCcr as ChildDefineVocCcr;
use \DefineVocCcrQuery as ChildDefineVocCcrQuery;
use \ImproveGateReview as ChildImproveGateReview;
use \ImproveGateReviewQuery as ChildImproveGateReviewQuery;
use \ImproveImprovementPlan as ChildImproveImprovementPlan;
use \ImproveImprovementPlanQuery as ChildImproveImprovementPlanQuery;
use \ImproveValueStreamDiagram as ChildImproveValueStreamDiagram;
use \ImproveValueStreamDiagramQuery as ChildImproveValueStreamDiagramQuery;
use \MeasureCollectionPlan as ChildMeasureCollectionPlan;
use \MeasureCollectionPlanQuery as ChildMeasureCollectionPlanQuery;
use \MeasureControlPlan as ChildMeasureControlPlan;
use \MeasureControlPlanQuery as ChildMeasureControlPlanQuery;
use \MeasureGateReview as ChildMeasureGateReview;
use \MeasureGateReviewQuery as ChildMeasureGateReviewQuery;
use \MeasureNonvalueAnalysis as ChildMeasureNonvalueAnalysis;
use \MeasureNonvalueAnalysisQuery as ChildMeasureNonvalueAnalysisQuery;
use \MeasureValueStreamDiagram as ChildMeasureValueStreamDiagram;
use \MeasureValueStreamDiagramQuery as ChildMeasureValueStreamDiagramQuery;
use \PhaseComponents as ChildPhaseComponents;
use \PhaseComponentsQuery as ChildPhaseComponentsQuery;
use \ProjectPhases as ChildProjectPhases;
use \ProjectPhasesQuery as ChildProjectPhasesQuery;
use \Projects as ChildProjects;
use \ProjectsQuery as ChildProjectsQuery;
use \Users as ChildUsers;
use \UsersQuery as ChildUsersQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ActionTrackingTableMap;
use Map\AnalyzeCeMatrixOutputsTableMap;
use Map\AnalyzeCeMatrixTableMap;
use Map\AnalyzeCriticalXTableMap;
use Map\AnalyzeFmeaTableMap;
use Map\AnalyzeGateReviewTableMap;
use Map\AnalyzeHypothesisMapTableMap;
use Map\ChartExcelDataTableMap;
use Map\ControlControlPlanTableMap;
use Map\ControlGateReviewTableMap;
use Map\ControlTestPlanTableMap;
use Map\DefineCommunicationTableMap;
use Map\DefineGateReviewTableMap;
use Map\DefineRaciTableMap;
use Map\DefineRiskManagementTableMap;
use Map\DefineSipocTableMap;
use Map\DefineStakeholdersTableMap;
use Map\DefineValueStreamDiagramTableMap;
use Map\DefineVocCcrTableMap;
use Map\ImproveGateReviewTableMap;
use Map\ImproveImprovementPlanTableMap;
use Map\ImproveValueStreamDiagramTableMap;
use Map\MeasureCollectionPlanTableMap;
use Map\MeasureControlPlanTableMap;
use Map\MeasureGateReviewTableMap;
use Map\MeasureNonvalueAnalysisTableMap;
use Map\MeasureValueStreamDiagramTableMap;
use Map\PhaseComponentsTableMap;
use Map\ProjectPhasesTableMap;
use Map\ProjectsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'projects' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Projects implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ProjectsTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id field.
     *
     * @var        int
     */
    protected $id;

    /**
     * The value for the client_id field.
     *
     * @var        int
     */
    protected $client_id;

    /**
     * The value for the created_by field.
     *
     * @var        int
     */
    protected $created_by;

    /**
     * The value for the status field.
     *
     * Note: this column has a database default value of: 'active'
     * @var        string
     */
    protected $status;

    /**
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the type field.
     *
     * @var        string
     */
    protected $type;

    /**
     * The value for the diagram_type field.
     *
     * Note: this column has a database default value of: 'SIPOC'
     * @var        string
     */
    protected $diagram_type;

    /**
     * The value for the lead field.
     *
     * @var        int
     */
    protected $lead;

    /**
     * The value for the sponsor field.
     *
     * @var        int
     */
    protected $sponsor;

    /**
     * The value for the core_team field.
     *
     * Note: this column has a database default value of: '[]'
     * @var        string
     */
    protected $core_team;

    /**
     * The value for the business_unit field.
     *
     * @var        string
     */
    protected $business_unit;

    /**
     * The value for the location field.
     *
     * @var        string
     */
    protected $location;

    /**
     * The value for the business_impact field.
     *
     * @var        string
     */
    protected $business_impact;

    /**
     * The value for the business_impact_value field.
     *
     * @var        string
     */
    protected $business_impact_value;

    /**
     * The value for the problem_statement field.
     *
     * @var        string
     */
    protected $problem_statement;

    /**
     * The value for the goals field.
     *
     * @var        string
     */
    protected $goals;

    /**
     * The value for the scope field.
     *
     * @var        string
     */
    protected $scope;

    /**
     * The value for the define_review_date field.
     *
     * @var        DateTime
     */
    protected $define_review_date;

    /**
     * The value for the measure_review_date field.
     *
     * @var        DateTime
     */
    protected $measure_review_date;

    /**
     * The value for the analyze_review_date field.
     *
     * @var        DateTime
     */
    protected $analyze_review_date;

    /**
     * The value for the improve_review_date field.
     *
     * @var        DateTime
     */
    protected $improve_review_date;

    /**
     * The value for the control_review_date field.
     *
     * @var        DateTime
     */
    protected $control_review_date;

    /**
     * The value for the date_time_created field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $date_time_created;

    /**
     * The value for the last_updated field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $last_updated;

    /**
     * @var        ChildClients
     */
    protected $aClients;

    /**
     * @var        ChildUsers
     */
    protected $aUsersRelatedByCreatedBy;

    /**
     * @var        ChildUsers
     */
    protected $aUsersRelatedBySponsor;

    /**
     * @var        ChildUsers
     */
    protected $aUsersRelatedByLead;

    /**
     * @var        ObjectCollection|ChildActionTracking[] Collection to store aggregation of ChildActionTracking objects.
     */
    protected $collActionTrackings;
    protected $collActionTrackingsPartial;

    /**
     * @var        ObjectCollection|ChildAnalyzeCeMatrix[] Collection to store aggregation of ChildAnalyzeCeMatrix objects.
     */
    protected $collAnalyzeCeMatrices;
    protected $collAnalyzeCeMatricesPartial;

    /**
     * @var        ObjectCollection|ChildAnalyzeCeMatrixOutputs[] Collection to store aggregation of ChildAnalyzeCeMatrixOutputs objects.
     */
    protected $collAnalyzeCeMatrixOutputss;
    protected $collAnalyzeCeMatrixOutputssPartial;

    /**
     * @var        ObjectCollection|ChildAnalyzeCriticalX[] Collection to store aggregation of ChildAnalyzeCriticalX objects.
     */
    protected $collAnalyzeCriticalxes;
    protected $collAnalyzeCriticalxesPartial;

    /**
     * @var        ObjectCollection|ChildAnalyzeFmea[] Collection to store aggregation of ChildAnalyzeFmea objects.
     */
    protected $collAnalyzeFmeas;
    protected $collAnalyzeFmeasPartial;

    /**
     * @var        ObjectCollection|ChildAnalyzeGateReview[] Collection to store aggregation of ChildAnalyzeGateReview objects.
     */
    protected $collAnalyzeGateReviews;
    protected $collAnalyzeGateReviewsPartial;

    /**
     * @var        ObjectCollection|ChildAnalyzeHypothesisMap[] Collection to store aggregation of ChildAnalyzeHypothesisMap objects.
     */
    protected $collAnalyzeHypothesisMaps;
    protected $collAnalyzeHypothesisMapsPartial;

    /**
     * @var        ObjectCollection|ChildChartExcelData[] Collection to store aggregation of ChildChartExcelData objects.
     */
    protected $collChartExcelDatas;
    protected $collChartExcelDatasPartial;

    /**
     * @var        ObjectCollection|ChildControlControlPlan[] Collection to store aggregation of ChildControlControlPlan objects.
     */
    protected $collControlControlPlans;
    protected $collControlControlPlansPartial;

    /**
     * @var        ObjectCollection|ChildControlGateReview[] Collection to store aggregation of ChildControlGateReview objects.
     */
    protected $collControlGateReviews;
    protected $collControlGateReviewsPartial;

    /**
     * @var        ObjectCollection|ChildControlTestPlan[] Collection to store aggregation of ChildControlTestPlan objects.
     */
    protected $collControlTestPlans;
    protected $collControlTestPlansPartial;

    /**
     * @var        ObjectCollection|ChildDefineCommunication[] Collection to store aggregation of ChildDefineCommunication objects.
     */
    protected $collDefineCommunications;
    protected $collDefineCommunicationsPartial;

    /**
     * @var        ObjectCollection|ChildDefineGateReview[] Collection to store aggregation of ChildDefineGateReview objects.
     */
    protected $collDefineGateReviews;
    protected $collDefineGateReviewsPartial;

    /**
     * @var        ObjectCollection|ChildDefineRaci[] Collection to store aggregation of ChildDefineRaci objects.
     */
    protected $collDefineRacis;
    protected $collDefineRacisPartial;

    /**
     * @var        ObjectCollection|ChildDefineRiskManagement[] Collection to store aggregation of ChildDefineRiskManagement objects.
     */
    protected $collDefineRiskManagements;
    protected $collDefineRiskManagementsPartial;

    /**
     * @var        ObjectCollection|ChildDefineSipoc[] Collection to store aggregation of ChildDefineSipoc objects.
     */
    protected $collDefineSipocs;
    protected $collDefineSipocsPartial;

    /**
     * @var        ObjectCollection|ChildDefineStakeholders[] Collection to store aggregation of ChildDefineStakeholders objects.
     */
    protected $collDefineStakeholderss;
    protected $collDefineStakeholderssPartial;

    /**
     * @var        ObjectCollection|ChildDefineValueStreamDiagram[] Collection to store aggregation of ChildDefineValueStreamDiagram objects.
     */
    protected $collDefineValueStreamDiagrams;
    protected $collDefineValueStreamDiagramsPartial;

    /**
     * @var        ObjectCollection|ChildDefineVocCcr[] Collection to store aggregation of ChildDefineVocCcr objects.
     */
    protected $collDefineVocCcrs;
    protected $collDefineVocCcrsPartial;

    /**
     * @var        ObjectCollection|ChildImproveGateReview[] Collection to store aggregation of ChildImproveGateReview objects.
     */
    protected $collImproveGateReviews;
    protected $collImproveGateReviewsPartial;

    /**
     * @var        ObjectCollection|ChildImproveImprovementPlan[] Collection to store aggregation of ChildImproveImprovementPlan objects.
     */
    protected $collImproveImprovementPlans;
    protected $collImproveImprovementPlansPartial;

    /**
     * @var        ObjectCollection|ChildImproveValueStreamDiagram[] Collection to store aggregation of ChildImproveValueStreamDiagram objects.
     */
    protected $collImproveValueStreamDiagrams;
    protected $collImproveValueStreamDiagramsPartial;

    /**
     * @var        ObjectCollection|ChildMeasureCollectionPlan[] Collection to store aggregation of ChildMeasureCollectionPlan objects.
     */
    protected $collMeasureCollectionPlans;
    protected $collMeasureCollectionPlansPartial;

    /**
     * @var        ObjectCollection|ChildMeasureControlPlan[] Collection to store aggregation of ChildMeasureControlPlan objects.
     */
    protected $collMeasureControlPlans;
    protected $collMeasureControlPlansPartial;

    /**
     * @var        ObjectCollection|ChildMeasureGateReview[] Collection to store aggregation of ChildMeasureGateReview objects.
     */
    protected $collMeasureGateReviews;
    protected $collMeasureGateReviewsPartial;

    /**
     * @var        ObjectCollection|ChildMeasureNonvalueAnalysis[] Collection to store aggregation of ChildMeasureNonvalueAnalysis objects.
     */
    protected $collMeasureNonvalueAnalyses;
    protected $collMeasureNonvalueAnalysesPartial;

    /**
     * @var        ObjectCollection|ChildMeasureValueStreamDiagram[] Collection to store aggregation of ChildMeasureValueStreamDiagram objects.
     */
    protected $collMeasureValueStreamDiagrams;
    protected $collMeasureValueStreamDiagramsPartial;

    /**
     * @var        ObjectCollection|ChildPhaseComponents[] Collection to store aggregation of ChildPhaseComponents objects.
     */
    protected $collPhaseComponentss;
    protected $collPhaseComponentssPartial;

    /**
     * @var        ObjectCollection|ChildProjectPhases[] Collection to store aggregation of ChildProjectPhases objects.
     */
    protected $collProjectPhasess;
    protected $collProjectPhasessPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildActionTracking[]
     */
    protected $actionTrackingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAnalyzeCeMatrix[]
     */
    protected $analyzeCeMatricesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAnalyzeCeMatrixOutputs[]
     */
    protected $analyzeCeMatrixOutputssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAnalyzeCriticalX[]
     */
    protected $analyzeCriticalxesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAnalyzeFmea[]
     */
    protected $analyzeFmeasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAnalyzeGateReview[]
     */
    protected $analyzeGateReviewsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAnalyzeHypothesisMap[]
     */
    protected $analyzeHypothesisMapsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildChartExcelData[]
     */
    protected $chartExcelDatasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildControlControlPlan[]
     */
    protected $controlControlPlansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildControlGateReview[]
     */
    protected $controlGateReviewsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildControlTestPlan[]
     */
    protected $controlTestPlansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineCommunication[]
     */
    protected $defineCommunicationsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineGateReview[]
     */
    protected $defineGateReviewsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineRaci[]
     */
    protected $defineRacisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineRiskManagement[]
     */
    protected $defineRiskManagementsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineSipoc[]
     */
    protected $defineSipocsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineStakeholders[]
     */
    protected $defineStakeholderssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineValueStreamDiagram[]
     */
    protected $defineValueStreamDiagramsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineVocCcr[]
     */
    protected $defineVocCcrsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildImproveGateReview[]
     */
    protected $improveGateReviewsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildImproveImprovementPlan[]
     */
    protected $improveImprovementPlansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildImproveValueStreamDiagram[]
     */
    protected $improveValueStreamDiagramsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMeasureCollectionPlan[]
     */
    protected $measureCollectionPlansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMeasureControlPlan[]
     */
    protected $measureControlPlansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMeasureGateReview[]
     */
    protected $measureGateReviewsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMeasureNonvalueAnalysis[]
     */
    protected $measureNonvalueAnalysesScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMeasureValueStreamDiagram[]
     */
    protected $measureValueStreamDiagramsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPhaseComponents[]
     */
    protected $phaseComponentssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProjectPhases[]
     */
    protected $projectPhasessScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->status = 'active';
        $this->diagram_type = 'SIPOC';
        $this->core_team = '[]';
    }

    /**
     * Initializes internal state of Base\Projects object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Projects</code> instance.  If
     * <code>obj</code> is an instance of <code>Projects</code>, delegates to
     * <code>equals(Projects)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Projects The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id] column value.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the [client_id] column value.
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Get the [created_by] column value.
     *
     * @return int
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [type] column value.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get the [diagram_type] column value.
     *
     * @return string
     */
    public function getDiagramType()
    {
        return $this->diagram_type;
    }

    /**
     * Get the [lead] column value.
     *
     * @return int
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * Get the [sponsor] column value.
     *
     * @return int
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }

    /**
     * Get the [core_team] column value.
     *
     * @return string
     */
    public function getCoreTeam()
    {
        return $this->core_team;
    }

    /**
     * Get the [business_unit] column value.
     *
     * @return string
     */
    public function getBusinessUnit()
    {
        return $this->business_unit;
    }

    /**
     * Get the [location] column value.
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Get the [business_impact] column value.
     *
     * @return string
     */
    public function getBusinessImpact()
    {
        return $this->business_impact;
    }

    /**
     * Get the [business_impact_value] column value.
     *
     * @return string
     */
    public function getBusinessImpactValue()
    {
        return $this->business_impact_value;
    }

    /**
     * Get the [problem_statement] column value.
     *
     * @return string
     */
    public function getProblemStatement()
    {
        return $this->problem_statement;
    }

    /**
     * Get the [goals] column value.
     *
     * @return string
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * Get the [scope] column value.
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Get the [optionally formatted] temporal [define_review_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDefineReviewDate($format = NULL)
    {
        if ($format === null) {
            return $this->define_review_date;
        } else {
            return $this->define_review_date instanceof \DateTimeInterface ? $this->define_review_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [measure_review_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getMeasureReviewDate($format = NULL)
    {
        if ($format === null) {
            return $this->measure_review_date;
        } else {
            return $this->measure_review_date instanceof \DateTimeInterface ? $this->measure_review_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [analyze_review_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getAnalyzeReviewDate($format = NULL)
    {
        if ($format === null) {
            return $this->analyze_review_date;
        } else {
            return $this->analyze_review_date instanceof \DateTimeInterface ? $this->analyze_review_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [improve_review_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getImproveReviewDate($format = NULL)
    {
        if ($format === null) {
            return $this->improve_review_date;
        } else {
            return $this->improve_review_date instanceof \DateTimeInterface ? $this->improve_review_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [control_review_date] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getControlReviewDate($format = NULL)
    {
        if ($format === null) {
            return $this->control_review_date;
        } else {
            return $this->control_review_date instanceof \DateTimeInterface ? $this->control_review_date->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [date_time_created] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getDateTimeCreated($format = NULL)
    {
        if ($format === null) {
            return $this->date_time_created;
        } else {
            return $this->date_time_created instanceof \DateTimeInterface ? $this->date_time_created->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [last_updated] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastUpdated($format = NULL)
    {
        if ($format === null) {
            return $this->last_updated;
        } else {
            return $this->last_updated instanceof \DateTimeInterface ? $this->last_updated->format($format) : null;
        }
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [client_id] column.
     *
     * @param int $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setClientId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->client_id !== $v) {
            $this->client_id = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_CLIENT_ID] = true;
        }

        if ($this->aClients !== null && $this->aClients->getId() !== $v) {
            $this->aClients = null;
        }

        return $this;
    } // setClientId()

    /**
     * Set the value of [created_by] column.
     *
     * @param int $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_CREATED_BY] = true;
        }

        if ($this->aUsersRelatedByCreatedBy !== null && $this->aUsersRelatedByCreatedBy->getId() !== $v) {
            $this->aUsersRelatedByCreatedBy = null;
        }

        return $this;
    } // setCreatedBy()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [type] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->type !== $v) {
            $this->type = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_TYPE] = true;
        }

        return $this;
    } // setType()

    /**
     * Set the value of [diagram_type] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setDiagramType($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->diagram_type !== $v) {
            $this->diagram_type = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_DIAGRAM_TYPE] = true;
        }

        return $this;
    } // setDiagramType()

    /**
     * Set the value of [lead] column.
     *
     * @param int $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setLead($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->lead !== $v) {
            $this->lead = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_LEAD] = true;
        }

        if ($this->aUsersRelatedByLead !== null && $this->aUsersRelatedByLead->getId() !== $v) {
            $this->aUsersRelatedByLead = null;
        }

        return $this;
    } // setLead()

    /**
     * Set the value of [sponsor] column.
     *
     * @param int $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setSponsor($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->sponsor !== $v) {
            $this->sponsor = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_SPONSOR] = true;
        }

        if ($this->aUsersRelatedBySponsor !== null && $this->aUsersRelatedBySponsor->getId() !== $v) {
            $this->aUsersRelatedBySponsor = null;
        }

        return $this;
    } // setSponsor()

    /**
     * Set the value of [core_team] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setCoreTeam($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->core_team !== $v) {
            $this->core_team = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_CORE_TEAM] = true;
        }

        return $this;
    } // setCoreTeam()

    /**
     * Set the value of [business_unit] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setBusinessUnit($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->business_unit !== $v) {
            $this->business_unit = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_BUSINESS_UNIT] = true;
        }

        return $this;
    } // setBusinessUnit()

    /**
     * Set the value of [location] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setLocation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->location !== $v) {
            $this->location = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_LOCATION] = true;
        }

        return $this;
    } // setLocation()

    /**
     * Set the value of [business_impact] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setBusinessImpact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->business_impact !== $v) {
            $this->business_impact = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_BUSINESS_IMPACT] = true;
        }

        return $this;
    } // setBusinessImpact()

    /**
     * Set the value of [business_impact_value] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setBusinessImpactValue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->business_impact_value !== $v) {
            $this->business_impact_value = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_BUSINESS_IMPACT_VALUE] = true;
        }

        return $this;
    } // setBusinessImpactValue()

    /**
     * Set the value of [problem_statement] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setProblemStatement($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->problem_statement !== $v) {
            $this->problem_statement = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_PROBLEM_STATEMENT] = true;
        }

        return $this;
    } // setProblemStatement()

    /**
     * Set the value of [goals] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setGoals($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->goals !== $v) {
            $this->goals = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_GOALS] = true;
        }

        return $this;
    } // setGoals()

    /**
     * Set the value of [scope] column.
     *
     * @param string $v new value
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setScope($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->scope !== $v) {
            $this->scope = $v;
            $this->modifiedColumns[ProjectsTableMap::COL_SCOPE] = true;
        }

        return $this;
    } // setScope()

    /**
     * Sets the value of [define_review_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setDefineReviewDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->define_review_date !== null || $dt !== null) {
            if ($this->define_review_date === null || $dt === null || $dt->format("Y-m-d") !== $this->define_review_date->format("Y-m-d")) {
                $this->define_review_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ProjectsTableMap::COL_DEFINE_REVIEW_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setDefineReviewDate()

    /**
     * Sets the value of [measure_review_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setMeasureReviewDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->measure_review_date !== null || $dt !== null) {
            if ($this->measure_review_date === null || $dt === null || $dt->format("Y-m-d") !== $this->measure_review_date->format("Y-m-d")) {
                $this->measure_review_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ProjectsTableMap::COL_MEASURE_REVIEW_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setMeasureReviewDate()

    /**
     * Sets the value of [analyze_review_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setAnalyzeReviewDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->analyze_review_date !== null || $dt !== null) {
            if ($this->analyze_review_date === null || $dt === null || $dt->format("Y-m-d") !== $this->analyze_review_date->format("Y-m-d")) {
                $this->analyze_review_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ProjectsTableMap::COL_ANALYZE_REVIEW_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setAnalyzeReviewDate()

    /**
     * Sets the value of [improve_review_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setImproveReviewDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->improve_review_date !== null || $dt !== null) {
            if ($this->improve_review_date === null || $dt === null || $dt->format("Y-m-d") !== $this->improve_review_date->format("Y-m-d")) {
                $this->improve_review_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ProjectsTableMap::COL_IMPROVE_REVIEW_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setImproveReviewDate()

    /**
     * Sets the value of [control_review_date] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setControlReviewDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->control_review_date !== null || $dt !== null) {
            if ($this->control_review_date === null || $dt === null || $dt->format("Y-m-d") !== $this->control_review_date->format("Y-m-d")) {
                $this->control_review_date = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ProjectsTableMap::COL_CONTROL_REVIEW_DATE] = true;
            }
        } // if either are not null

        return $this;
    } // setControlReviewDate()

    /**
     * Sets the value of [date_time_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setDateTimeCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_time_created !== null || $dt !== null) {
            if ($this->date_time_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_time_created->format("Y-m-d H:i:s.u")) {
                $this->date_time_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ProjectsTableMap::COL_DATE_TIME_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateTimeCreated()

    /**
     * Sets the value of [last_updated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function setLastUpdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_updated !== null || $dt !== null) {
            if ($this->last_updated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_updated->format("Y-m-d H:i:s.u")) {
                $this->last_updated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ProjectsTableMap::COL_LAST_UPDATED] = true;
            }
        } // if either are not null

        return $this;
    } // setLastUpdated()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->status !== 'active') {
                return false;
            }

            if ($this->diagram_type !== 'SIPOC') {
                return false;
            }

            if ($this->core_team !== '[]') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ProjectsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ProjectsTableMap::translateFieldName('ClientId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->client_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ProjectsTableMap::translateFieldName('CreatedBy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->created_by = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ProjectsTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ProjectsTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ProjectsTableMap::translateFieldName('Type', TableMap::TYPE_PHPNAME, $indexType)];
            $this->type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ProjectsTableMap::translateFieldName('DiagramType', TableMap::TYPE_PHPNAME, $indexType)];
            $this->diagram_type = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ProjectsTableMap::translateFieldName('Lead', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lead = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ProjectsTableMap::translateFieldName('Sponsor', TableMap::TYPE_PHPNAME, $indexType)];
            $this->sponsor = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ProjectsTableMap::translateFieldName('CoreTeam', TableMap::TYPE_PHPNAME, $indexType)];
            $this->core_team = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ProjectsTableMap::translateFieldName('BusinessUnit', TableMap::TYPE_PHPNAME, $indexType)];
            $this->business_unit = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ProjectsTableMap::translateFieldName('Location', TableMap::TYPE_PHPNAME, $indexType)];
            $this->location = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ProjectsTableMap::translateFieldName('BusinessImpact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->business_impact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ProjectsTableMap::translateFieldName('BusinessImpactValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->business_impact_value = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ProjectsTableMap::translateFieldName('ProblemStatement', TableMap::TYPE_PHPNAME, $indexType)];
            $this->problem_statement = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ProjectsTableMap::translateFieldName('Goals', TableMap::TYPE_PHPNAME, $indexType)];
            $this->goals = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : ProjectsTableMap::translateFieldName('Scope', TableMap::TYPE_PHPNAME, $indexType)];
            $this->scope = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : ProjectsTableMap::translateFieldName('DefineReviewDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->define_review_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : ProjectsTableMap::translateFieldName('MeasureReviewDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->measure_review_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : ProjectsTableMap::translateFieldName('AnalyzeReviewDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->analyze_review_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : ProjectsTableMap::translateFieldName('ImproveReviewDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->improve_review_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : ProjectsTableMap::translateFieldName('ControlReviewDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00') {
                $col = null;
            }
            $this->control_review_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : ProjectsTableMap::translateFieldName('DateTimeCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_time_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : ProjectsTableMap::translateFieldName('LastUpdated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_updated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 24; // 24 = ProjectsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Projects'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aClients !== null && $this->client_id !== $this->aClients->getId()) {
            $this->aClients = null;
        }
        if ($this->aUsersRelatedByCreatedBy !== null && $this->created_by !== $this->aUsersRelatedByCreatedBy->getId()) {
            $this->aUsersRelatedByCreatedBy = null;
        }
        if ($this->aUsersRelatedByLead !== null && $this->lead !== $this->aUsersRelatedByLead->getId()) {
            $this->aUsersRelatedByLead = null;
        }
        if ($this->aUsersRelatedBySponsor !== null && $this->sponsor !== $this->aUsersRelatedBySponsor->getId()) {
            $this->aUsersRelatedBySponsor = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProjectsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildProjectsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClients = null;
            $this->aUsersRelatedByCreatedBy = null;
            $this->aUsersRelatedBySponsor = null;
            $this->aUsersRelatedByLead = null;
            $this->collActionTrackings = null;

            $this->collAnalyzeCeMatrices = null;

            $this->collAnalyzeCeMatrixOutputss = null;

            $this->collAnalyzeCriticalxes = null;

            $this->collAnalyzeFmeas = null;

            $this->collAnalyzeGateReviews = null;

            $this->collAnalyzeHypothesisMaps = null;

            $this->collChartExcelDatas = null;

            $this->collControlControlPlans = null;

            $this->collControlGateReviews = null;

            $this->collControlTestPlans = null;

            $this->collDefineCommunications = null;

            $this->collDefineGateReviews = null;

            $this->collDefineRacis = null;

            $this->collDefineRiskManagements = null;

            $this->collDefineSipocs = null;

            $this->collDefineStakeholderss = null;

            $this->collDefineValueStreamDiagrams = null;

            $this->collDefineVocCcrs = null;

            $this->collImproveGateReviews = null;

            $this->collImproveImprovementPlans = null;

            $this->collImproveValueStreamDiagrams = null;

            $this->collMeasureCollectionPlans = null;

            $this->collMeasureControlPlans = null;

            $this->collMeasureGateReviews = null;

            $this->collMeasureNonvalueAnalyses = null;

            $this->collMeasureValueStreamDiagrams = null;

            $this->collPhaseComponentss = null;

            $this->collProjectPhasess = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Projects::setDeleted()
     * @see Projects::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildProjectsQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectsTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                ProjectsTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aClients !== null) {
                if ($this->aClients->isModified() || $this->aClients->isNew()) {
                    $affectedRows += $this->aClients->save($con);
                }
                $this->setClients($this->aClients);
            }

            if ($this->aUsersRelatedByCreatedBy !== null) {
                if ($this->aUsersRelatedByCreatedBy->isModified() || $this->aUsersRelatedByCreatedBy->isNew()) {
                    $affectedRows += $this->aUsersRelatedByCreatedBy->save($con);
                }
                $this->setUsersRelatedByCreatedBy($this->aUsersRelatedByCreatedBy);
            }

            if ($this->aUsersRelatedBySponsor !== null) {
                if ($this->aUsersRelatedBySponsor->isModified() || $this->aUsersRelatedBySponsor->isNew()) {
                    $affectedRows += $this->aUsersRelatedBySponsor->save($con);
                }
                $this->setUsersRelatedBySponsor($this->aUsersRelatedBySponsor);
            }

            if ($this->aUsersRelatedByLead !== null) {
                if ($this->aUsersRelatedByLead->isModified() || $this->aUsersRelatedByLead->isNew()) {
                    $affectedRows += $this->aUsersRelatedByLead->save($con);
                }
                $this->setUsersRelatedByLead($this->aUsersRelatedByLead);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->actionTrackingsScheduledForDeletion !== null) {
                if (!$this->actionTrackingsScheduledForDeletion->isEmpty()) {
                    \ActionTrackingQuery::create()
                        ->filterByPrimaryKeys($this->actionTrackingsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->actionTrackingsScheduledForDeletion = null;
                }
            }

            if ($this->collActionTrackings !== null) {
                foreach ($this->collActionTrackings as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->analyzeCeMatricesScheduledForDeletion !== null) {
                if (!$this->analyzeCeMatricesScheduledForDeletion->isEmpty()) {
                    \AnalyzeCeMatrixQuery::create()
                        ->filterByPrimaryKeys($this->analyzeCeMatricesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->analyzeCeMatricesScheduledForDeletion = null;
                }
            }

            if ($this->collAnalyzeCeMatrices !== null) {
                foreach ($this->collAnalyzeCeMatrices as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->analyzeCeMatrixOutputssScheduledForDeletion !== null) {
                if (!$this->analyzeCeMatrixOutputssScheduledForDeletion->isEmpty()) {
                    \AnalyzeCeMatrixOutputsQuery::create()
                        ->filterByPrimaryKeys($this->analyzeCeMatrixOutputssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->analyzeCeMatrixOutputssScheduledForDeletion = null;
                }
            }

            if ($this->collAnalyzeCeMatrixOutputss !== null) {
                foreach ($this->collAnalyzeCeMatrixOutputss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->analyzeCriticalxesScheduledForDeletion !== null) {
                if (!$this->analyzeCriticalxesScheduledForDeletion->isEmpty()) {
                    \AnalyzeCriticalXQuery::create()
                        ->filterByPrimaryKeys($this->analyzeCriticalxesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->analyzeCriticalxesScheduledForDeletion = null;
                }
            }

            if ($this->collAnalyzeCriticalxes !== null) {
                foreach ($this->collAnalyzeCriticalxes as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->analyzeFmeasScheduledForDeletion !== null) {
                if (!$this->analyzeFmeasScheduledForDeletion->isEmpty()) {
                    \AnalyzeFmeaQuery::create()
                        ->filterByPrimaryKeys($this->analyzeFmeasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->analyzeFmeasScheduledForDeletion = null;
                }
            }

            if ($this->collAnalyzeFmeas !== null) {
                foreach ($this->collAnalyzeFmeas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->analyzeGateReviewsScheduledForDeletion !== null) {
                if (!$this->analyzeGateReviewsScheduledForDeletion->isEmpty()) {
                    \AnalyzeGateReviewQuery::create()
                        ->filterByPrimaryKeys($this->analyzeGateReviewsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->analyzeGateReviewsScheduledForDeletion = null;
                }
            }

            if ($this->collAnalyzeGateReviews !== null) {
                foreach ($this->collAnalyzeGateReviews as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->analyzeHypothesisMapsScheduledForDeletion !== null) {
                if (!$this->analyzeHypothesisMapsScheduledForDeletion->isEmpty()) {
                    \AnalyzeHypothesisMapQuery::create()
                        ->filterByPrimaryKeys($this->analyzeHypothesisMapsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->analyzeHypothesisMapsScheduledForDeletion = null;
                }
            }

            if ($this->collAnalyzeHypothesisMaps !== null) {
                foreach ($this->collAnalyzeHypothesisMaps as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->chartExcelDatasScheduledForDeletion !== null) {
                if (!$this->chartExcelDatasScheduledForDeletion->isEmpty()) {
                    \ChartExcelDataQuery::create()
                        ->filterByPrimaryKeys($this->chartExcelDatasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->chartExcelDatasScheduledForDeletion = null;
                }
            }

            if ($this->collChartExcelDatas !== null) {
                foreach ($this->collChartExcelDatas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->controlControlPlansScheduledForDeletion !== null) {
                if (!$this->controlControlPlansScheduledForDeletion->isEmpty()) {
                    \ControlControlPlanQuery::create()
                        ->filterByPrimaryKeys($this->controlControlPlansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->controlControlPlansScheduledForDeletion = null;
                }
            }

            if ($this->collControlControlPlans !== null) {
                foreach ($this->collControlControlPlans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->controlGateReviewsScheduledForDeletion !== null) {
                if (!$this->controlGateReviewsScheduledForDeletion->isEmpty()) {
                    \ControlGateReviewQuery::create()
                        ->filterByPrimaryKeys($this->controlGateReviewsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->controlGateReviewsScheduledForDeletion = null;
                }
            }

            if ($this->collControlGateReviews !== null) {
                foreach ($this->collControlGateReviews as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->controlTestPlansScheduledForDeletion !== null) {
                if (!$this->controlTestPlansScheduledForDeletion->isEmpty()) {
                    \ControlTestPlanQuery::create()
                        ->filterByPrimaryKeys($this->controlTestPlansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->controlTestPlansScheduledForDeletion = null;
                }
            }

            if ($this->collControlTestPlans !== null) {
                foreach ($this->collControlTestPlans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->defineCommunicationsScheduledForDeletion !== null) {
                if (!$this->defineCommunicationsScheduledForDeletion->isEmpty()) {
                    \DefineCommunicationQuery::create()
                        ->filterByPrimaryKeys($this->defineCommunicationsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->defineCommunicationsScheduledForDeletion = null;
                }
            }

            if ($this->collDefineCommunications !== null) {
                foreach ($this->collDefineCommunications as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->defineGateReviewsScheduledForDeletion !== null) {
                if (!$this->defineGateReviewsScheduledForDeletion->isEmpty()) {
                    \DefineGateReviewQuery::create()
                        ->filterByPrimaryKeys($this->defineGateReviewsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->defineGateReviewsScheduledForDeletion = null;
                }
            }

            if ($this->collDefineGateReviews !== null) {
                foreach ($this->collDefineGateReviews as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->defineRacisScheduledForDeletion !== null) {
                if (!$this->defineRacisScheduledForDeletion->isEmpty()) {
                    \DefineRaciQuery::create()
                        ->filterByPrimaryKeys($this->defineRacisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->defineRacisScheduledForDeletion = null;
                }
            }

            if ($this->collDefineRacis !== null) {
                foreach ($this->collDefineRacis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->defineRiskManagementsScheduledForDeletion !== null) {
                if (!$this->defineRiskManagementsScheduledForDeletion->isEmpty()) {
                    \DefineRiskManagementQuery::create()
                        ->filterByPrimaryKeys($this->defineRiskManagementsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->defineRiskManagementsScheduledForDeletion = null;
                }
            }

            if ($this->collDefineRiskManagements !== null) {
                foreach ($this->collDefineRiskManagements as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->defineSipocsScheduledForDeletion !== null) {
                if (!$this->defineSipocsScheduledForDeletion->isEmpty()) {
                    \DefineSipocQuery::create()
                        ->filterByPrimaryKeys($this->defineSipocsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->defineSipocsScheduledForDeletion = null;
                }
            }

            if ($this->collDefineSipocs !== null) {
                foreach ($this->collDefineSipocs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->defineStakeholderssScheduledForDeletion !== null) {
                if (!$this->defineStakeholderssScheduledForDeletion->isEmpty()) {
                    \DefineStakeholdersQuery::create()
                        ->filterByPrimaryKeys($this->defineStakeholderssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->defineStakeholderssScheduledForDeletion = null;
                }
            }

            if ($this->collDefineStakeholderss !== null) {
                foreach ($this->collDefineStakeholderss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->defineValueStreamDiagramsScheduledForDeletion !== null) {
                if (!$this->defineValueStreamDiagramsScheduledForDeletion->isEmpty()) {
                    \DefineValueStreamDiagramQuery::create()
                        ->filterByPrimaryKeys($this->defineValueStreamDiagramsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->defineValueStreamDiagramsScheduledForDeletion = null;
                }
            }

            if ($this->collDefineValueStreamDiagrams !== null) {
                foreach ($this->collDefineValueStreamDiagrams as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->defineVocCcrsScheduledForDeletion !== null) {
                if (!$this->defineVocCcrsScheduledForDeletion->isEmpty()) {
                    \DefineVocCcrQuery::create()
                        ->filterByPrimaryKeys($this->defineVocCcrsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->defineVocCcrsScheduledForDeletion = null;
                }
            }

            if ($this->collDefineVocCcrs !== null) {
                foreach ($this->collDefineVocCcrs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->improveGateReviewsScheduledForDeletion !== null) {
                if (!$this->improveGateReviewsScheduledForDeletion->isEmpty()) {
                    \ImproveGateReviewQuery::create()
                        ->filterByPrimaryKeys($this->improveGateReviewsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->improveGateReviewsScheduledForDeletion = null;
                }
            }

            if ($this->collImproveGateReviews !== null) {
                foreach ($this->collImproveGateReviews as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->improveImprovementPlansScheduledForDeletion !== null) {
                if (!$this->improveImprovementPlansScheduledForDeletion->isEmpty()) {
                    \ImproveImprovementPlanQuery::create()
                        ->filterByPrimaryKeys($this->improveImprovementPlansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->improveImprovementPlansScheduledForDeletion = null;
                }
            }

            if ($this->collImproveImprovementPlans !== null) {
                foreach ($this->collImproveImprovementPlans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->improveValueStreamDiagramsScheduledForDeletion !== null) {
                if (!$this->improveValueStreamDiagramsScheduledForDeletion->isEmpty()) {
                    \ImproveValueStreamDiagramQuery::create()
                        ->filterByPrimaryKeys($this->improveValueStreamDiagramsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->improveValueStreamDiagramsScheduledForDeletion = null;
                }
            }

            if ($this->collImproveValueStreamDiagrams !== null) {
                foreach ($this->collImproveValueStreamDiagrams as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->measureCollectionPlansScheduledForDeletion !== null) {
                if (!$this->measureCollectionPlansScheduledForDeletion->isEmpty()) {
                    \MeasureCollectionPlanQuery::create()
                        ->filterByPrimaryKeys($this->measureCollectionPlansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->measureCollectionPlansScheduledForDeletion = null;
                }
            }

            if ($this->collMeasureCollectionPlans !== null) {
                foreach ($this->collMeasureCollectionPlans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->measureControlPlansScheduledForDeletion !== null) {
                if (!$this->measureControlPlansScheduledForDeletion->isEmpty()) {
                    \MeasureControlPlanQuery::create()
                        ->filterByPrimaryKeys($this->measureControlPlansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->measureControlPlansScheduledForDeletion = null;
                }
            }

            if ($this->collMeasureControlPlans !== null) {
                foreach ($this->collMeasureControlPlans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->measureGateReviewsScheduledForDeletion !== null) {
                if (!$this->measureGateReviewsScheduledForDeletion->isEmpty()) {
                    \MeasureGateReviewQuery::create()
                        ->filterByPrimaryKeys($this->measureGateReviewsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->measureGateReviewsScheduledForDeletion = null;
                }
            }

            if ($this->collMeasureGateReviews !== null) {
                foreach ($this->collMeasureGateReviews as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->measureNonvalueAnalysesScheduledForDeletion !== null) {
                if (!$this->measureNonvalueAnalysesScheduledForDeletion->isEmpty()) {
                    \MeasureNonvalueAnalysisQuery::create()
                        ->filterByPrimaryKeys($this->measureNonvalueAnalysesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->measureNonvalueAnalysesScheduledForDeletion = null;
                }
            }

            if ($this->collMeasureNonvalueAnalyses !== null) {
                foreach ($this->collMeasureNonvalueAnalyses as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->measureValueStreamDiagramsScheduledForDeletion !== null) {
                if (!$this->measureValueStreamDiagramsScheduledForDeletion->isEmpty()) {
                    \MeasureValueStreamDiagramQuery::create()
                        ->filterByPrimaryKeys($this->measureValueStreamDiagramsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->measureValueStreamDiagramsScheduledForDeletion = null;
                }
            }

            if ($this->collMeasureValueStreamDiagrams !== null) {
                foreach ($this->collMeasureValueStreamDiagrams as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->phaseComponentssScheduledForDeletion !== null) {
                if (!$this->phaseComponentssScheduledForDeletion->isEmpty()) {
                    \PhaseComponentsQuery::create()
                        ->filterByPrimaryKeys($this->phaseComponentssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->phaseComponentssScheduledForDeletion = null;
                }
            }

            if ($this->collPhaseComponentss !== null) {
                foreach ($this->collPhaseComponentss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->projectPhasessScheduledForDeletion !== null) {
                if (!$this->projectPhasessScheduledForDeletion->isEmpty()) {
                    \ProjectPhasesQuery::create()
                        ->filterByPrimaryKeys($this->projectPhasessScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectPhasessScheduledForDeletion = null;
                }
            }

            if ($this->collProjectPhasess !== null) {
                foreach ($this->collProjectPhasess as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[ProjectsTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProjectsTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ProjectsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_CLIENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`client_id`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`type`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_DIAGRAM_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '`diagram_type`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_LEAD)) {
            $modifiedColumns[':p' . $index++]  = '`lead`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_SPONSOR)) {
            $modifiedColumns[':p' . $index++]  = '`sponsor`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_CORE_TEAM)) {
            $modifiedColumns[':p' . $index++]  = '`core_team`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_BUSINESS_UNIT)) {
            $modifiedColumns[':p' . $index++]  = '`business_unit`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_LOCATION)) {
            $modifiedColumns[':p' . $index++]  = '`location`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_BUSINESS_IMPACT)) {
            $modifiedColumns[':p' . $index++]  = '`business_impact`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_BUSINESS_IMPACT_VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`business_impact_value`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_PROBLEM_STATEMENT)) {
            $modifiedColumns[':p' . $index++]  = '`problem_statement`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_GOALS)) {
            $modifiedColumns[':p' . $index++]  = '`goals`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_SCOPE)) {
            $modifiedColumns[':p' . $index++]  = '`scope`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_DEFINE_REVIEW_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`define_review_date`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_MEASURE_REVIEW_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`measure_review_date`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_ANALYZE_REVIEW_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`analyze_review_date`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_IMPROVE_REVIEW_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`improve_review_date`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_CONTROL_REVIEW_DATE)) {
            $modifiedColumns[':p' . $index++]  = '`control_review_date`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_DATE_TIME_CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`date_time_created`';
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_LAST_UPDATED)) {
            $modifiedColumns[':p' . $index++]  = '`last_updated`';
        }

        $sql = sprintf(
            'INSERT INTO `projects` (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '`id`':
                        $stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
                        break;
                    case '`client_id`':
                        $stmt->bindValue($identifier, $this->client_id, PDO::PARAM_INT);
                        break;
                    case '`created_by`':
                        $stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`type`':
                        $stmt->bindValue($identifier, $this->type, PDO::PARAM_STR);
                        break;
                    case '`diagram_type`':
                        $stmt->bindValue($identifier, $this->diagram_type, PDO::PARAM_STR);
                        break;
                    case '`lead`':
                        $stmt->bindValue($identifier, $this->lead, PDO::PARAM_INT);
                        break;
                    case '`sponsor`':
                        $stmt->bindValue($identifier, $this->sponsor, PDO::PARAM_INT);
                        break;
                    case '`core_team`':
                        $stmt->bindValue($identifier, $this->core_team, PDO::PARAM_STR);
                        break;
                    case '`business_unit`':
                        $stmt->bindValue($identifier, $this->business_unit, PDO::PARAM_STR);
                        break;
                    case '`location`':
                        $stmt->bindValue($identifier, $this->location, PDO::PARAM_STR);
                        break;
                    case '`business_impact`':
                        $stmt->bindValue($identifier, $this->business_impact, PDO::PARAM_STR);
                        break;
                    case '`business_impact_value`':
                        $stmt->bindValue($identifier, $this->business_impact_value, PDO::PARAM_STR);
                        break;
                    case '`problem_statement`':
                        $stmt->bindValue($identifier, $this->problem_statement, PDO::PARAM_STR);
                        break;
                    case '`goals`':
                        $stmt->bindValue($identifier, $this->goals, PDO::PARAM_STR);
                        break;
                    case '`scope`':
                        $stmt->bindValue($identifier, $this->scope, PDO::PARAM_STR);
                        break;
                    case '`define_review_date`':
                        $stmt->bindValue($identifier, $this->define_review_date ? $this->define_review_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`measure_review_date`':
                        $stmt->bindValue($identifier, $this->measure_review_date ? $this->measure_review_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`analyze_review_date`':
                        $stmt->bindValue($identifier, $this->analyze_review_date ? $this->analyze_review_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`improve_review_date`':
                        $stmt->bindValue($identifier, $this->improve_review_date ? $this->improve_review_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`control_review_date`':
                        $stmt->bindValue($identifier, $this->control_review_date ? $this->control_review_date->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`date_time_created`':
                        $stmt->bindValue($identifier, $this->date_time_created ? $this->date_time_created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`last_updated`':
                        $stmt->bindValue($identifier, $this->last_updated ? $this->last_updated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ProjectsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getClientId();
                break;
            case 2:
                return $this->getCreatedBy();
                break;
            case 3:
                return $this->getStatus();
                break;
            case 4:
                return $this->getName();
                break;
            case 5:
                return $this->getType();
                break;
            case 6:
                return $this->getDiagramType();
                break;
            case 7:
                return $this->getLead();
                break;
            case 8:
                return $this->getSponsor();
                break;
            case 9:
                return $this->getCoreTeam();
                break;
            case 10:
                return $this->getBusinessUnit();
                break;
            case 11:
                return $this->getLocation();
                break;
            case 12:
                return $this->getBusinessImpact();
                break;
            case 13:
                return $this->getBusinessImpactValue();
                break;
            case 14:
                return $this->getProblemStatement();
                break;
            case 15:
                return $this->getGoals();
                break;
            case 16:
                return $this->getScope();
                break;
            case 17:
                return $this->getDefineReviewDate();
                break;
            case 18:
                return $this->getMeasureReviewDate();
                break;
            case 19:
                return $this->getAnalyzeReviewDate();
                break;
            case 20:
                return $this->getImproveReviewDate();
                break;
            case 21:
                return $this->getControlReviewDate();
                break;
            case 22:
                return $this->getDateTimeCreated();
                break;
            case 23:
                return $this->getLastUpdated();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Projects'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Projects'][$this->hashCode()] = true;
        $keys = ProjectsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getClientId(),
            $keys[2] => $this->getCreatedBy(),
            $keys[3] => $this->getStatus(),
            $keys[4] => $this->getName(),
            $keys[5] => $this->getType(),
            $keys[6] => $this->getDiagramType(),
            $keys[7] => $this->getLead(),
            $keys[8] => $this->getSponsor(),
            $keys[9] => $this->getCoreTeam(),
            $keys[10] => $this->getBusinessUnit(),
            $keys[11] => $this->getLocation(),
            $keys[12] => $this->getBusinessImpact(),
            $keys[13] => $this->getBusinessImpactValue(),
            $keys[14] => $this->getProblemStatement(),
            $keys[15] => $this->getGoals(),
            $keys[16] => $this->getScope(),
            $keys[17] => $this->getDefineReviewDate(),
            $keys[18] => $this->getMeasureReviewDate(),
            $keys[19] => $this->getAnalyzeReviewDate(),
            $keys[20] => $this->getImproveReviewDate(),
            $keys[21] => $this->getControlReviewDate(),
            $keys[22] => $this->getDateTimeCreated(),
            $keys[23] => $this->getLastUpdated(),
        );
        if ($result[$keys[17]] instanceof \DateTimeInterface) {
            $result[$keys[17]] = $result[$keys[17]]->format('c');
        }

        if ($result[$keys[18]] instanceof \DateTimeInterface) {
            $result[$keys[18]] = $result[$keys[18]]->format('c');
        }

        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
        }

        if ($result[$keys[21]] instanceof \DateTimeInterface) {
            $result[$keys[21]] = $result[$keys[21]]->format('c');
        }

        if ($result[$keys[22]] instanceof \DateTimeInterface) {
            $result[$keys[22]] = $result[$keys[22]]->format('c');
        }

        if ($result[$keys[23]] instanceof \DateTimeInterface) {
            $result[$keys[23]] = $result[$keys[23]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aClients) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'clients';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'clients';
                        break;
                    default:
                        $key = 'Clients';
                }

                $result[$key] = $this->aClients->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUsersRelatedByCreatedBy) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'users';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'users';
                        break;
                    default:
                        $key = 'Users';
                }

                $result[$key] = $this->aUsersRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUsersRelatedBySponsor) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'users';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'users';
                        break;
                    default:
                        $key = 'Users';
                }

                $result[$key] = $this->aUsersRelatedBySponsor->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUsersRelatedByLead) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'users';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'users';
                        break;
                    default:
                        $key = 'Users';
                }

                $result[$key] = $this->aUsersRelatedByLead->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collActionTrackings) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'actionTrackings';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'action_trackings';
                        break;
                    default:
                        $key = 'ActionTrackings';
                }

                $result[$key] = $this->collActionTrackings->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnalyzeCeMatrices) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'analyzeCeMatrices';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'analyze_ce_matrices';
                        break;
                    default:
                        $key = 'AnalyzeCeMatrices';
                }

                $result[$key] = $this->collAnalyzeCeMatrices->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnalyzeCeMatrixOutputss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'analyzeCeMatrixOutputss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'analyze_ce_matrix_outputss';
                        break;
                    default:
                        $key = 'AnalyzeCeMatrixOutputss';
                }

                $result[$key] = $this->collAnalyzeCeMatrixOutputss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnalyzeCriticalxes) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'analyzeCriticalxes';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'analyze_critical_xes';
                        break;
                    default:
                        $key = 'AnalyzeCriticalxes';
                }

                $result[$key] = $this->collAnalyzeCriticalxes->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnalyzeFmeas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'analyzeFmeas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'analyze_fmeas';
                        break;
                    default:
                        $key = 'AnalyzeFmeas';
                }

                $result[$key] = $this->collAnalyzeFmeas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnalyzeGateReviews) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'analyzeGateReviews';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'analyze_gate_reviews';
                        break;
                    default:
                        $key = 'AnalyzeGateReviews';
                }

                $result[$key] = $this->collAnalyzeGateReviews->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAnalyzeHypothesisMaps) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'analyzeHypothesisMaps';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'analyze_hypothesis_maps';
                        break;
                    default:
                        $key = 'AnalyzeHypothesisMaps';
                }

                $result[$key] = $this->collAnalyzeHypothesisMaps->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collChartExcelDatas) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'chartExcelDatas';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'chart_excel_datas';
                        break;
                    default:
                        $key = 'ChartExcelDatas';
                }

                $result[$key] = $this->collChartExcelDatas->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collControlControlPlans) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'controlControlPlans';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'control_control_plans';
                        break;
                    default:
                        $key = 'ControlControlPlans';
                }

                $result[$key] = $this->collControlControlPlans->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collControlGateReviews) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'controlGateReviews';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'control_gate_reviews';
                        break;
                    default:
                        $key = 'ControlGateReviews';
                }

                $result[$key] = $this->collControlGateReviews->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collControlTestPlans) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'controlTestPlans';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'control_test_plans';
                        break;
                    default:
                        $key = 'ControlTestPlans';
                }

                $result[$key] = $this->collControlTestPlans->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDefineCommunications) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'defineCommunications';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'define_communications';
                        break;
                    default:
                        $key = 'DefineCommunications';
                }

                $result[$key] = $this->collDefineCommunications->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDefineGateReviews) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'defineGateReviews';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'define_gate_reviews';
                        break;
                    default:
                        $key = 'DefineGateReviews';
                }

                $result[$key] = $this->collDefineGateReviews->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDefineRacis) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'defineRacis';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'define_racis';
                        break;
                    default:
                        $key = 'DefineRacis';
                }

                $result[$key] = $this->collDefineRacis->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDefineRiskManagements) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'defineRiskManagements';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'define_risk_managements';
                        break;
                    default:
                        $key = 'DefineRiskManagements';
                }

                $result[$key] = $this->collDefineRiskManagements->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDefineSipocs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'defineSipocs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'define_sipocs';
                        break;
                    default:
                        $key = 'DefineSipocs';
                }

                $result[$key] = $this->collDefineSipocs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDefineStakeholderss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'defineStakeholderss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'define_stakeholderss';
                        break;
                    default:
                        $key = 'DefineStakeholderss';
                }

                $result[$key] = $this->collDefineStakeholderss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDefineValueStreamDiagrams) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'defineValueStreamDiagrams';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'define_value_stream_diagrams';
                        break;
                    default:
                        $key = 'DefineValueStreamDiagrams';
                }

                $result[$key] = $this->collDefineValueStreamDiagrams->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collDefineVocCcrs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'defineVocCcrs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'define_voc_ccrs';
                        break;
                    default:
                        $key = 'DefineVocCcrs';
                }

                $result[$key] = $this->collDefineVocCcrs->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collImproveGateReviews) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'improveGateReviews';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'improve_gate_reviews';
                        break;
                    default:
                        $key = 'ImproveGateReviews';
                }

                $result[$key] = $this->collImproveGateReviews->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collImproveImprovementPlans) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'improveImprovementPlans';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'improve_improvement_plans';
                        break;
                    default:
                        $key = 'ImproveImprovementPlans';
                }

                $result[$key] = $this->collImproveImprovementPlans->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collImproveValueStreamDiagrams) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'improveValueStreamDiagrams';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'improve_value_stream_diagrams';
                        break;
                    default:
                        $key = 'ImproveValueStreamDiagrams';
                }

                $result[$key] = $this->collImproveValueStreamDiagrams->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMeasureCollectionPlans) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'measureCollectionPlans';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'measure_collection_plans';
                        break;
                    default:
                        $key = 'MeasureCollectionPlans';
                }

                $result[$key] = $this->collMeasureCollectionPlans->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMeasureControlPlans) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'measureControlPlans';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'measure_control_plans';
                        break;
                    default:
                        $key = 'MeasureControlPlans';
                }

                $result[$key] = $this->collMeasureControlPlans->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMeasureGateReviews) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'measureGateReviews';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'measure_gate_reviews';
                        break;
                    default:
                        $key = 'MeasureGateReviews';
                }

                $result[$key] = $this->collMeasureGateReviews->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMeasureNonvalueAnalyses) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'measureNonvalueAnalyses';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'measure_nonvalue_analyses';
                        break;
                    default:
                        $key = 'MeasureNonvalueAnalyses';
                }

                $result[$key] = $this->collMeasureNonvalueAnalyses->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMeasureValueStreamDiagrams) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'measureValueStreamDiagrams';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'measure_value_stream_diagrams';
                        break;
                    default:
                        $key = 'MeasureValueStreamDiagrams';
                }

                $result[$key] = $this->collMeasureValueStreamDiagrams->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPhaseComponentss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'phaseComponentss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'phase_componentss';
                        break;
                    default:
                        $key = 'PhaseComponentss';
                }

                $result[$key] = $this->collPhaseComponentss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProjectPhasess) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'projectPhasess';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'project_phasess';
                        break;
                    default:
                        $key = 'ProjectPhasess';
                }

                $result[$key] = $this->collProjectPhasess->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Projects
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ProjectsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Projects
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setClientId($value);
                break;
            case 2:
                $this->setCreatedBy($value);
                break;
            case 3:
                $this->setStatus($value);
                break;
            case 4:
                $this->setName($value);
                break;
            case 5:
                $this->setType($value);
                break;
            case 6:
                $this->setDiagramType($value);
                break;
            case 7:
                $this->setLead($value);
                break;
            case 8:
                $this->setSponsor($value);
                break;
            case 9:
                $this->setCoreTeam($value);
                break;
            case 10:
                $this->setBusinessUnit($value);
                break;
            case 11:
                $this->setLocation($value);
                break;
            case 12:
                $this->setBusinessImpact($value);
                break;
            case 13:
                $this->setBusinessImpactValue($value);
                break;
            case 14:
                $this->setProblemStatement($value);
                break;
            case 15:
                $this->setGoals($value);
                break;
            case 16:
                $this->setScope($value);
                break;
            case 17:
                $this->setDefineReviewDate($value);
                break;
            case 18:
                $this->setMeasureReviewDate($value);
                break;
            case 19:
                $this->setAnalyzeReviewDate($value);
                break;
            case 20:
                $this->setImproveReviewDate($value);
                break;
            case 21:
                $this->setControlReviewDate($value);
                break;
            case 22:
                $this->setDateTimeCreated($value);
                break;
            case 23:
                $this->setLastUpdated($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = ProjectsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setClientId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setCreatedBy($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setStatus($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setName($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setType($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setDiagramType($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLead($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setSponsor($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCoreTeam($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setBusinessUnit($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setLocation($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setBusinessImpact($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setBusinessImpactValue($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setProblemStatement($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setGoals($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setScope($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setDefineReviewDate($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setMeasureReviewDate($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setAnalyzeReviewDate($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setImproveReviewDate($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setControlReviewDate($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setDateTimeCreated($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setLastUpdated($arr[$keys[23]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Projects The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(ProjectsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ProjectsTableMap::COL_ID)) {
            $criteria->add(ProjectsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_CLIENT_ID)) {
            $criteria->add(ProjectsTableMap::COL_CLIENT_ID, $this->client_id);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_CREATED_BY)) {
            $criteria->add(ProjectsTableMap::COL_CREATED_BY, $this->created_by);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_STATUS)) {
            $criteria->add(ProjectsTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_NAME)) {
            $criteria->add(ProjectsTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_TYPE)) {
            $criteria->add(ProjectsTableMap::COL_TYPE, $this->type);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_DIAGRAM_TYPE)) {
            $criteria->add(ProjectsTableMap::COL_DIAGRAM_TYPE, $this->diagram_type);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_LEAD)) {
            $criteria->add(ProjectsTableMap::COL_LEAD, $this->lead);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_SPONSOR)) {
            $criteria->add(ProjectsTableMap::COL_SPONSOR, $this->sponsor);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_CORE_TEAM)) {
            $criteria->add(ProjectsTableMap::COL_CORE_TEAM, $this->core_team);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_BUSINESS_UNIT)) {
            $criteria->add(ProjectsTableMap::COL_BUSINESS_UNIT, $this->business_unit);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_LOCATION)) {
            $criteria->add(ProjectsTableMap::COL_LOCATION, $this->location);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_BUSINESS_IMPACT)) {
            $criteria->add(ProjectsTableMap::COL_BUSINESS_IMPACT, $this->business_impact);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_BUSINESS_IMPACT_VALUE)) {
            $criteria->add(ProjectsTableMap::COL_BUSINESS_IMPACT_VALUE, $this->business_impact_value);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_PROBLEM_STATEMENT)) {
            $criteria->add(ProjectsTableMap::COL_PROBLEM_STATEMENT, $this->problem_statement);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_GOALS)) {
            $criteria->add(ProjectsTableMap::COL_GOALS, $this->goals);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_SCOPE)) {
            $criteria->add(ProjectsTableMap::COL_SCOPE, $this->scope);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_DEFINE_REVIEW_DATE)) {
            $criteria->add(ProjectsTableMap::COL_DEFINE_REVIEW_DATE, $this->define_review_date);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_MEASURE_REVIEW_DATE)) {
            $criteria->add(ProjectsTableMap::COL_MEASURE_REVIEW_DATE, $this->measure_review_date);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_ANALYZE_REVIEW_DATE)) {
            $criteria->add(ProjectsTableMap::COL_ANALYZE_REVIEW_DATE, $this->analyze_review_date);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_IMPROVE_REVIEW_DATE)) {
            $criteria->add(ProjectsTableMap::COL_IMPROVE_REVIEW_DATE, $this->improve_review_date);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_CONTROL_REVIEW_DATE)) {
            $criteria->add(ProjectsTableMap::COL_CONTROL_REVIEW_DATE, $this->control_review_date);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_DATE_TIME_CREATED)) {
            $criteria->add(ProjectsTableMap::COL_DATE_TIME_CREATED, $this->date_time_created);
        }
        if ($this->isColumnModified(ProjectsTableMap::COL_LAST_UPDATED)) {
            $criteria->add(ProjectsTableMap::COL_LAST_UPDATED, $this->last_updated);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildProjectsQuery::create();
        $criteria->add(ProjectsTableMap::COL_ID, $this->id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Projects (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setClientId($this->getClientId());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setName($this->getName());
        $copyObj->setType($this->getType());
        $copyObj->setDiagramType($this->getDiagramType());
        $copyObj->setLead($this->getLead());
        $copyObj->setSponsor($this->getSponsor());
        $copyObj->setCoreTeam($this->getCoreTeam());
        $copyObj->setBusinessUnit($this->getBusinessUnit());
        $copyObj->setLocation($this->getLocation());
        $copyObj->setBusinessImpact($this->getBusinessImpact());
        $copyObj->setBusinessImpactValue($this->getBusinessImpactValue());
        $copyObj->setProblemStatement($this->getProblemStatement());
        $copyObj->setGoals($this->getGoals());
        $copyObj->setScope($this->getScope());
        $copyObj->setDefineReviewDate($this->getDefineReviewDate());
        $copyObj->setMeasureReviewDate($this->getMeasureReviewDate());
        $copyObj->setAnalyzeReviewDate($this->getAnalyzeReviewDate());
        $copyObj->setImproveReviewDate($this->getImproveReviewDate());
        $copyObj->setControlReviewDate($this->getControlReviewDate());
        $copyObj->setDateTimeCreated($this->getDateTimeCreated());
        $copyObj->setLastUpdated($this->getLastUpdated());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getActionTrackings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActionTracking($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnalyzeCeMatrices() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnalyzeCeMatrix($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnalyzeCeMatrixOutputss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnalyzeCeMatrixOutputs($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnalyzeCriticalxes() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnalyzeCriticalX($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnalyzeFmeas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnalyzeFmea($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnalyzeGateReviews() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnalyzeGateReview($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAnalyzeHypothesisMaps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnalyzeHypothesisMap($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getChartExcelDatas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addChartExcelData($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getControlControlPlans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addControlControlPlan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getControlGateReviews() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addControlGateReview($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getControlTestPlans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addControlTestPlan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineCommunications() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineCommunication($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineGateReviews() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineGateReview($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineRacis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineRaci($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineRiskManagements() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineRiskManagement($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineSipocs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineSipoc($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineStakeholderss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineStakeholders($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineValueStreamDiagrams() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineValueStreamDiagram($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineVocCcrs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineVocCcr($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getImproveGateReviews() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addImproveGateReview($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getImproveImprovementPlans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addImproveImprovementPlan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getImproveValueStreamDiagrams() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addImproveValueStreamDiagram($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMeasureCollectionPlans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMeasureCollectionPlan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMeasureControlPlans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMeasureControlPlan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMeasureGateReviews() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMeasureGateReview($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMeasureNonvalueAnalyses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMeasureNonvalueAnalysis($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMeasureValueStreamDiagrams() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMeasureValueStreamDiagram($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPhaseComponentss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPhaseComponents($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectPhasess() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectPhases($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Projects Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildClients object.
     *
     * @param  ChildClients $v
     * @return $this|\Projects The current object (for fluent API support)
     * @throws PropelException
     */
    public function setClients(ChildClients $v = null)
    {
        if ($v === null) {
            $this->setClientId(NULL);
        } else {
            $this->setClientId($v->getId());
        }

        $this->aClients = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildClients object, it will not be re-added.
        if ($v !== null) {
            $v->addProjects($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildClients object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildClients The associated ChildClients object.
     * @throws PropelException
     */
    public function getClients(ConnectionInterface $con = null)
    {
        if ($this->aClients === null && ($this->client_id != 0)) {
            $this->aClients = ChildClientsQuery::create()->findPk($this->client_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aClients->addProjectss($this);
             */
        }

        return $this->aClients;
    }

    /**
     * Declares an association between this object and a ChildUsers object.
     *
     * @param  ChildUsers $v
     * @return $this|\Projects The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUsersRelatedByCreatedBy(ChildUsers $v = null)
    {
        if ($v === null) {
            $this->setCreatedBy(NULL);
        } else {
            $this->setCreatedBy($v->getId());
        }

        $this->aUsersRelatedByCreatedBy = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addProjectsRelatedByCreatedBy($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUsers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUsers The associated ChildUsers object.
     * @throws PropelException
     */
    public function getUsersRelatedByCreatedBy(ConnectionInterface $con = null)
    {
        if ($this->aUsersRelatedByCreatedBy === null && ($this->created_by != 0)) {
            $this->aUsersRelatedByCreatedBy = ChildUsersQuery::create()->findPk($this->created_by, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUsersRelatedByCreatedBy->addProjectssRelatedByCreatedBy($this);
             */
        }

        return $this->aUsersRelatedByCreatedBy;
    }

    /**
     * Declares an association between this object and a ChildUsers object.
     *
     * @param  ChildUsers $v
     * @return $this|\Projects The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUsersRelatedBySponsor(ChildUsers $v = null)
    {
        if ($v === null) {
            $this->setSponsor(NULL);
        } else {
            $this->setSponsor($v->getId());
        }

        $this->aUsersRelatedBySponsor = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addProjectsRelatedBySponsor($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUsers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUsers The associated ChildUsers object.
     * @throws PropelException
     */
    public function getUsersRelatedBySponsor(ConnectionInterface $con = null)
    {
        if ($this->aUsersRelatedBySponsor === null && ($this->sponsor != 0)) {
            $this->aUsersRelatedBySponsor = ChildUsersQuery::create()->findPk($this->sponsor, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUsersRelatedBySponsor->addProjectssRelatedBySponsor($this);
             */
        }

        return $this->aUsersRelatedBySponsor;
    }

    /**
     * Declares an association between this object and a ChildUsers object.
     *
     * @param  ChildUsers $v
     * @return $this|\Projects The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUsersRelatedByLead(ChildUsers $v = null)
    {
        if ($v === null) {
            $this->setLead(NULL);
        } else {
            $this->setLead($v->getId());
        }

        $this->aUsersRelatedByLead = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addProjectsRelatedByLead($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUsers object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUsers The associated ChildUsers object.
     * @throws PropelException
     */
    public function getUsersRelatedByLead(ConnectionInterface $con = null)
    {
        if ($this->aUsersRelatedByLead === null && ($this->lead != 0)) {
            $this->aUsersRelatedByLead = ChildUsersQuery::create()->findPk($this->lead, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUsersRelatedByLead->addProjectssRelatedByLead($this);
             */
        }

        return $this->aUsersRelatedByLead;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('ActionTracking' == $relationName) {
            $this->initActionTrackings();
            return;
        }
        if ('AnalyzeCeMatrix' == $relationName) {
            $this->initAnalyzeCeMatrices();
            return;
        }
        if ('AnalyzeCeMatrixOutputs' == $relationName) {
            $this->initAnalyzeCeMatrixOutputss();
            return;
        }
        if ('AnalyzeCriticalX' == $relationName) {
            $this->initAnalyzeCriticalxes();
            return;
        }
        if ('AnalyzeFmea' == $relationName) {
            $this->initAnalyzeFmeas();
            return;
        }
        if ('AnalyzeGateReview' == $relationName) {
            $this->initAnalyzeGateReviews();
            return;
        }
        if ('AnalyzeHypothesisMap' == $relationName) {
            $this->initAnalyzeHypothesisMaps();
            return;
        }
        if ('ChartExcelData' == $relationName) {
            $this->initChartExcelDatas();
            return;
        }
        if ('ControlControlPlan' == $relationName) {
            $this->initControlControlPlans();
            return;
        }
        if ('ControlGateReview' == $relationName) {
            $this->initControlGateReviews();
            return;
        }
        if ('ControlTestPlan' == $relationName) {
            $this->initControlTestPlans();
            return;
        }
        if ('DefineCommunication' == $relationName) {
            $this->initDefineCommunications();
            return;
        }
        if ('DefineGateReview' == $relationName) {
            $this->initDefineGateReviews();
            return;
        }
        if ('DefineRaci' == $relationName) {
            $this->initDefineRacis();
            return;
        }
        if ('DefineRiskManagement' == $relationName) {
            $this->initDefineRiskManagements();
            return;
        }
        if ('DefineSipoc' == $relationName) {
            $this->initDefineSipocs();
            return;
        }
        if ('DefineStakeholders' == $relationName) {
            $this->initDefineStakeholderss();
            return;
        }
        if ('DefineValueStreamDiagram' == $relationName) {
            $this->initDefineValueStreamDiagrams();
            return;
        }
        if ('DefineVocCcr' == $relationName) {
            $this->initDefineVocCcrs();
            return;
        }
        if ('ImproveGateReview' == $relationName) {
            $this->initImproveGateReviews();
            return;
        }
        if ('ImproveImprovementPlan' == $relationName) {
            $this->initImproveImprovementPlans();
            return;
        }
        if ('ImproveValueStreamDiagram' == $relationName) {
            $this->initImproveValueStreamDiagrams();
            return;
        }
        if ('MeasureCollectionPlan' == $relationName) {
            $this->initMeasureCollectionPlans();
            return;
        }
        if ('MeasureControlPlan' == $relationName) {
            $this->initMeasureControlPlans();
            return;
        }
        if ('MeasureGateReview' == $relationName) {
            $this->initMeasureGateReviews();
            return;
        }
        if ('MeasureNonvalueAnalysis' == $relationName) {
            $this->initMeasureNonvalueAnalyses();
            return;
        }
        if ('MeasureValueStreamDiagram' == $relationName) {
            $this->initMeasureValueStreamDiagrams();
            return;
        }
        if ('PhaseComponents' == $relationName) {
            $this->initPhaseComponentss();
            return;
        }
        if ('ProjectPhases' == $relationName) {
            $this->initProjectPhasess();
            return;
        }
    }

    /**
     * Clears out the collActionTrackings collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addActionTrackings()
     */
    public function clearActionTrackings()
    {
        $this->collActionTrackings = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collActionTrackings collection loaded partially.
     */
    public function resetPartialActionTrackings($v = true)
    {
        $this->collActionTrackingsPartial = $v;
    }

    /**
     * Initializes the collActionTrackings collection.
     *
     * By default this just sets the collActionTrackings collection to an empty array (like clearcollActionTrackings());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initActionTrackings($overrideExisting = true)
    {
        if (null !== $this->collActionTrackings && !$overrideExisting) {
            return;
        }

        $collectionClassName = ActionTrackingTableMap::getTableMap()->getCollectionClassName();

        $this->collActionTrackings = new $collectionClassName;
        $this->collActionTrackings->setModel('\ActionTracking');
    }

    /**
     * Gets an array of ChildActionTracking objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildActionTracking[] List of ChildActionTracking objects
     * @throws PropelException
     */
    public function getActionTrackings(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collActionTrackingsPartial && !$this->isNew();
        if (null === $this->collActionTrackings || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collActionTrackings) {
                // return empty collection
                $this->initActionTrackings();
            } else {
                $collActionTrackings = ChildActionTrackingQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collActionTrackingsPartial && count($collActionTrackings)) {
                        $this->initActionTrackings(false);

                        foreach ($collActionTrackings as $obj) {
                            if (false == $this->collActionTrackings->contains($obj)) {
                                $this->collActionTrackings->append($obj);
                            }
                        }

                        $this->collActionTrackingsPartial = true;
                    }

                    return $collActionTrackings;
                }

                if ($partial && $this->collActionTrackings) {
                    foreach ($this->collActionTrackings as $obj) {
                        if ($obj->isNew()) {
                            $collActionTrackings[] = $obj;
                        }
                    }
                }

                $this->collActionTrackings = $collActionTrackings;
                $this->collActionTrackingsPartial = false;
            }
        }

        return $this->collActionTrackings;
    }

    /**
     * Sets a collection of ChildActionTracking objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $actionTrackings A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setActionTrackings(Collection $actionTrackings, ConnectionInterface $con = null)
    {
        /** @var ChildActionTracking[] $actionTrackingsToDelete */
        $actionTrackingsToDelete = $this->getActionTrackings(new Criteria(), $con)->diff($actionTrackings);


        $this->actionTrackingsScheduledForDeletion = $actionTrackingsToDelete;

        foreach ($actionTrackingsToDelete as $actionTrackingRemoved) {
            $actionTrackingRemoved->setProjects(null);
        }

        $this->collActionTrackings = null;
        foreach ($actionTrackings as $actionTracking) {
            $this->addActionTracking($actionTracking);
        }

        $this->collActionTrackings = $actionTrackings;
        $this->collActionTrackingsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ActionTracking objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ActionTracking objects.
     * @throws PropelException
     */
    public function countActionTrackings(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collActionTrackingsPartial && !$this->isNew();
        if (null === $this->collActionTrackings || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collActionTrackings) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getActionTrackings());
            }

            $query = ChildActionTrackingQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collActionTrackings);
    }

    /**
     * Method called to associate a ChildActionTracking object to this object
     * through the ChildActionTracking foreign key attribute.
     *
     * @param  ChildActionTracking $l ChildActionTracking
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addActionTracking(ChildActionTracking $l)
    {
        if ($this->collActionTrackings === null) {
            $this->initActionTrackings();
            $this->collActionTrackingsPartial = true;
        }

        if (!$this->collActionTrackings->contains($l)) {
            $this->doAddActionTracking($l);

            if ($this->actionTrackingsScheduledForDeletion and $this->actionTrackingsScheduledForDeletion->contains($l)) {
                $this->actionTrackingsScheduledForDeletion->remove($this->actionTrackingsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildActionTracking $actionTracking The ChildActionTracking object to add.
     */
    protected function doAddActionTracking(ChildActionTracking $actionTracking)
    {
        $this->collActionTrackings[]= $actionTracking;
        $actionTracking->setProjects($this);
    }

    /**
     * @param  ChildActionTracking $actionTracking The ChildActionTracking object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeActionTracking(ChildActionTracking $actionTracking)
    {
        if ($this->getActionTrackings()->contains($actionTracking)) {
            $pos = $this->collActionTrackings->search($actionTracking);
            $this->collActionTrackings->remove($pos);
            if (null === $this->actionTrackingsScheduledForDeletion) {
                $this->actionTrackingsScheduledForDeletion = clone $this->collActionTrackings;
                $this->actionTrackingsScheduledForDeletion->clear();
            }
            $this->actionTrackingsScheduledForDeletion[]= clone $actionTracking;
            $actionTracking->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ActionTrackings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActionTracking[] List of ChildActionTracking objects
     */
    public function getActionTrackingsJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActionTrackingQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

        return $this->getActionTrackings($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ActionTrackings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActionTracking[] List of ChildActionTracking objects
     */
    public function getActionTrackingsJoinClients(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActionTrackingQuery::create(null, $criteria);
        $query->joinWith('Clients', $joinBehavior);

        return $this->getActionTrackings($query, $con);
    }

    /**
     * Clears out the collAnalyzeCeMatrices collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAnalyzeCeMatrices()
     */
    public function clearAnalyzeCeMatrices()
    {
        $this->collAnalyzeCeMatrices = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAnalyzeCeMatrices collection loaded partially.
     */
    public function resetPartialAnalyzeCeMatrices($v = true)
    {
        $this->collAnalyzeCeMatricesPartial = $v;
    }

    /**
     * Initializes the collAnalyzeCeMatrices collection.
     *
     * By default this just sets the collAnalyzeCeMatrices collection to an empty array (like clearcollAnalyzeCeMatrices());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnalyzeCeMatrices($overrideExisting = true)
    {
        if (null !== $this->collAnalyzeCeMatrices && !$overrideExisting) {
            return;
        }

        $collectionClassName = AnalyzeCeMatrixTableMap::getTableMap()->getCollectionClassName();

        $this->collAnalyzeCeMatrices = new $collectionClassName;
        $this->collAnalyzeCeMatrices->setModel('\AnalyzeCeMatrix');
    }

    /**
     * Gets an array of ChildAnalyzeCeMatrix objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAnalyzeCeMatrix[] List of ChildAnalyzeCeMatrix objects
     * @throws PropelException
     */
    public function getAnalyzeCeMatrices(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeCeMatricesPartial && !$this->isNew();
        if (null === $this->collAnalyzeCeMatrices || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeCeMatrices) {
                // return empty collection
                $this->initAnalyzeCeMatrices();
            } else {
                $collAnalyzeCeMatrices = ChildAnalyzeCeMatrixQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAnalyzeCeMatricesPartial && count($collAnalyzeCeMatrices)) {
                        $this->initAnalyzeCeMatrices(false);

                        foreach ($collAnalyzeCeMatrices as $obj) {
                            if (false == $this->collAnalyzeCeMatrices->contains($obj)) {
                                $this->collAnalyzeCeMatrices->append($obj);
                            }
                        }

                        $this->collAnalyzeCeMatricesPartial = true;
                    }

                    return $collAnalyzeCeMatrices;
                }

                if ($partial && $this->collAnalyzeCeMatrices) {
                    foreach ($this->collAnalyzeCeMatrices as $obj) {
                        if ($obj->isNew()) {
                            $collAnalyzeCeMatrices[] = $obj;
                        }
                    }
                }

                $this->collAnalyzeCeMatrices = $collAnalyzeCeMatrices;
                $this->collAnalyzeCeMatricesPartial = false;
            }
        }

        return $this->collAnalyzeCeMatrices;
    }

    /**
     * Sets a collection of ChildAnalyzeCeMatrix objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $analyzeCeMatrices A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setAnalyzeCeMatrices(Collection $analyzeCeMatrices, ConnectionInterface $con = null)
    {
        /** @var ChildAnalyzeCeMatrix[] $analyzeCeMatricesToDelete */
        $analyzeCeMatricesToDelete = $this->getAnalyzeCeMatrices(new Criteria(), $con)->diff($analyzeCeMatrices);


        $this->analyzeCeMatricesScheduledForDeletion = $analyzeCeMatricesToDelete;

        foreach ($analyzeCeMatricesToDelete as $analyzeCeMatrixRemoved) {
            $analyzeCeMatrixRemoved->setProjects(null);
        }

        $this->collAnalyzeCeMatrices = null;
        foreach ($analyzeCeMatrices as $analyzeCeMatrix) {
            $this->addAnalyzeCeMatrix($analyzeCeMatrix);
        }

        $this->collAnalyzeCeMatrices = $analyzeCeMatrices;
        $this->collAnalyzeCeMatricesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnalyzeCeMatrix objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AnalyzeCeMatrix objects.
     * @throws PropelException
     */
    public function countAnalyzeCeMatrices(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeCeMatricesPartial && !$this->isNew();
        if (null === $this->collAnalyzeCeMatrices || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeCeMatrices) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAnalyzeCeMatrices());
            }

            $query = ChildAnalyzeCeMatrixQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collAnalyzeCeMatrices);
    }

    /**
     * Method called to associate a ChildAnalyzeCeMatrix object to this object
     * through the ChildAnalyzeCeMatrix foreign key attribute.
     *
     * @param  ChildAnalyzeCeMatrix $l ChildAnalyzeCeMatrix
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addAnalyzeCeMatrix(ChildAnalyzeCeMatrix $l)
    {
        if ($this->collAnalyzeCeMatrices === null) {
            $this->initAnalyzeCeMatrices();
            $this->collAnalyzeCeMatricesPartial = true;
        }

        if (!$this->collAnalyzeCeMatrices->contains($l)) {
            $this->doAddAnalyzeCeMatrix($l);

            if ($this->analyzeCeMatricesScheduledForDeletion and $this->analyzeCeMatricesScheduledForDeletion->contains($l)) {
                $this->analyzeCeMatricesScheduledForDeletion->remove($this->analyzeCeMatricesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAnalyzeCeMatrix $analyzeCeMatrix The ChildAnalyzeCeMatrix object to add.
     */
    protected function doAddAnalyzeCeMatrix(ChildAnalyzeCeMatrix $analyzeCeMatrix)
    {
        $this->collAnalyzeCeMatrices[]= $analyzeCeMatrix;
        $analyzeCeMatrix->setProjects($this);
    }

    /**
     * @param  ChildAnalyzeCeMatrix $analyzeCeMatrix The ChildAnalyzeCeMatrix object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeAnalyzeCeMatrix(ChildAnalyzeCeMatrix $analyzeCeMatrix)
    {
        if ($this->getAnalyzeCeMatrices()->contains($analyzeCeMatrix)) {
            $pos = $this->collAnalyzeCeMatrices->search($analyzeCeMatrix);
            $this->collAnalyzeCeMatrices->remove($pos);
            if (null === $this->analyzeCeMatricesScheduledForDeletion) {
                $this->analyzeCeMatricesScheduledForDeletion = clone $this->collAnalyzeCeMatrices;
                $this->analyzeCeMatricesScheduledForDeletion->clear();
            }
            $this->analyzeCeMatricesScheduledForDeletion[]= clone $analyzeCeMatrix;
            $analyzeCeMatrix->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeCeMatrices from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeCeMatrix[] List of ChildAnalyzeCeMatrix objects
     */
    public function getAnalyzeCeMatricesJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeCeMatrixQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getAnalyzeCeMatrices($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeCeMatrices from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeCeMatrix[] List of ChildAnalyzeCeMatrix objects
     */
    public function getAnalyzeCeMatricesJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeCeMatrixQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getAnalyzeCeMatrices($query, $con);
    }

    /**
     * Clears out the collAnalyzeCeMatrixOutputss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAnalyzeCeMatrixOutputss()
     */
    public function clearAnalyzeCeMatrixOutputss()
    {
        $this->collAnalyzeCeMatrixOutputss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAnalyzeCeMatrixOutputss collection loaded partially.
     */
    public function resetPartialAnalyzeCeMatrixOutputss($v = true)
    {
        $this->collAnalyzeCeMatrixOutputssPartial = $v;
    }

    /**
     * Initializes the collAnalyzeCeMatrixOutputss collection.
     *
     * By default this just sets the collAnalyzeCeMatrixOutputss collection to an empty array (like clearcollAnalyzeCeMatrixOutputss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnalyzeCeMatrixOutputss($overrideExisting = true)
    {
        if (null !== $this->collAnalyzeCeMatrixOutputss && !$overrideExisting) {
            return;
        }

        $collectionClassName = AnalyzeCeMatrixOutputsTableMap::getTableMap()->getCollectionClassName();

        $this->collAnalyzeCeMatrixOutputss = new $collectionClassName;
        $this->collAnalyzeCeMatrixOutputss->setModel('\AnalyzeCeMatrixOutputs');
    }

    /**
     * Gets an array of ChildAnalyzeCeMatrixOutputs objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAnalyzeCeMatrixOutputs[] List of ChildAnalyzeCeMatrixOutputs objects
     * @throws PropelException
     */
    public function getAnalyzeCeMatrixOutputss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeCeMatrixOutputssPartial && !$this->isNew();
        if (null === $this->collAnalyzeCeMatrixOutputss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeCeMatrixOutputss) {
                // return empty collection
                $this->initAnalyzeCeMatrixOutputss();
            } else {
                $collAnalyzeCeMatrixOutputss = ChildAnalyzeCeMatrixOutputsQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAnalyzeCeMatrixOutputssPartial && count($collAnalyzeCeMatrixOutputss)) {
                        $this->initAnalyzeCeMatrixOutputss(false);

                        foreach ($collAnalyzeCeMatrixOutputss as $obj) {
                            if (false == $this->collAnalyzeCeMatrixOutputss->contains($obj)) {
                                $this->collAnalyzeCeMatrixOutputss->append($obj);
                            }
                        }

                        $this->collAnalyzeCeMatrixOutputssPartial = true;
                    }

                    return $collAnalyzeCeMatrixOutputss;
                }

                if ($partial && $this->collAnalyzeCeMatrixOutputss) {
                    foreach ($this->collAnalyzeCeMatrixOutputss as $obj) {
                        if ($obj->isNew()) {
                            $collAnalyzeCeMatrixOutputss[] = $obj;
                        }
                    }
                }

                $this->collAnalyzeCeMatrixOutputss = $collAnalyzeCeMatrixOutputss;
                $this->collAnalyzeCeMatrixOutputssPartial = false;
            }
        }

        return $this->collAnalyzeCeMatrixOutputss;
    }

    /**
     * Sets a collection of ChildAnalyzeCeMatrixOutputs objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $analyzeCeMatrixOutputss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setAnalyzeCeMatrixOutputss(Collection $analyzeCeMatrixOutputss, ConnectionInterface $con = null)
    {
        /** @var ChildAnalyzeCeMatrixOutputs[] $analyzeCeMatrixOutputssToDelete */
        $analyzeCeMatrixOutputssToDelete = $this->getAnalyzeCeMatrixOutputss(new Criteria(), $con)->diff($analyzeCeMatrixOutputss);


        $this->analyzeCeMatrixOutputssScheduledForDeletion = $analyzeCeMatrixOutputssToDelete;

        foreach ($analyzeCeMatrixOutputssToDelete as $analyzeCeMatrixOutputsRemoved) {
            $analyzeCeMatrixOutputsRemoved->setProjects(null);
        }

        $this->collAnalyzeCeMatrixOutputss = null;
        foreach ($analyzeCeMatrixOutputss as $analyzeCeMatrixOutputs) {
            $this->addAnalyzeCeMatrixOutputs($analyzeCeMatrixOutputs);
        }

        $this->collAnalyzeCeMatrixOutputss = $analyzeCeMatrixOutputss;
        $this->collAnalyzeCeMatrixOutputssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnalyzeCeMatrixOutputs objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AnalyzeCeMatrixOutputs objects.
     * @throws PropelException
     */
    public function countAnalyzeCeMatrixOutputss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeCeMatrixOutputssPartial && !$this->isNew();
        if (null === $this->collAnalyzeCeMatrixOutputss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeCeMatrixOutputss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAnalyzeCeMatrixOutputss());
            }

            $query = ChildAnalyzeCeMatrixOutputsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collAnalyzeCeMatrixOutputss);
    }

    /**
     * Method called to associate a ChildAnalyzeCeMatrixOutputs object to this object
     * through the ChildAnalyzeCeMatrixOutputs foreign key attribute.
     *
     * @param  ChildAnalyzeCeMatrixOutputs $l ChildAnalyzeCeMatrixOutputs
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addAnalyzeCeMatrixOutputs(ChildAnalyzeCeMatrixOutputs $l)
    {
        if ($this->collAnalyzeCeMatrixOutputss === null) {
            $this->initAnalyzeCeMatrixOutputss();
            $this->collAnalyzeCeMatrixOutputssPartial = true;
        }

        if (!$this->collAnalyzeCeMatrixOutputss->contains($l)) {
            $this->doAddAnalyzeCeMatrixOutputs($l);

            if ($this->analyzeCeMatrixOutputssScheduledForDeletion and $this->analyzeCeMatrixOutputssScheduledForDeletion->contains($l)) {
                $this->analyzeCeMatrixOutputssScheduledForDeletion->remove($this->analyzeCeMatrixOutputssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAnalyzeCeMatrixOutputs $analyzeCeMatrixOutputs The ChildAnalyzeCeMatrixOutputs object to add.
     */
    protected function doAddAnalyzeCeMatrixOutputs(ChildAnalyzeCeMatrixOutputs $analyzeCeMatrixOutputs)
    {
        $this->collAnalyzeCeMatrixOutputss[]= $analyzeCeMatrixOutputs;
        $analyzeCeMatrixOutputs->setProjects($this);
    }

    /**
     * @param  ChildAnalyzeCeMatrixOutputs $analyzeCeMatrixOutputs The ChildAnalyzeCeMatrixOutputs object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeAnalyzeCeMatrixOutputs(ChildAnalyzeCeMatrixOutputs $analyzeCeMatrixOutputs)
    {
        if ($this->getAnalyzeCeMatrixOutputss()->contains($analyzeCeMatrixOutputs)) {
            $pos = $this->collAnalyzeCeMatrixOutputss->search($analyzeCeMatrixOutputs);
            $this->collAnalyzeCeMatrixOutputss->remove($pos);
            if (null === $this->analyzeCeMatrixOutputssScheduledForDeletion) {
                $this->analyzeCeMatrixOutputssScheduledForDeletion = clone $this->collAnalyzeCeMatrixOutputss;
                $this->analyzeCeMatrixOutputssScheduledForDeletion->clear();
            }
            $this->analyzeCeMatrixOutputssScheduledForDeletion[]= clone $analyzeCeMatrixOutputs;
            $analyzeCeMatrixOutputs->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeCeMatrixOutputss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeCeMatrixOutputs[] List of ChildAnalyzeCeMatrixOutputs objects
     */
    public function getAnalyzeCeMatrixOutputssJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeCeMatrixOutputsQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getAnalyzeCeMatrixOutputss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeCeMatrixOutputss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeCeMatrixOutputs[] List of ChildAnalyzeCeMatrixOutputs objects
     */
    public function getAnalyzeCeMatrixOutputssJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeCeMatrixOutputsQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getAnalyzeCeMatrixOutputss($query, $con);
    }

    /**
     * Clears out the collAnalyzeCriticalxes collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAnalyzeCriticalxes()
     */
    public function clearAnalyzeCriticalxes()
    {
        $this->collAnalyzeCriticalxes = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAnalyzeCriticalxes collection loaded partially.
     */
    public function resetPartialAnalyzeCriticalxes($v = true)
    {
        $this->collAnalyzeCriticalxesPartial = $v;
    }

    /**
     * Initializes the collAnalyzeCriticalxes collection.
     *
     * By default this just sets the collAnalyzeCriticalxes collection to an empty array (like clearcollAnalyzeCriticalxes());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnalyzeCriticalxes($overrideExisting = true)
    {
        if (null !== $this->collAnalyzeCriticalxes && !$overrideExisting) {
            return;
        }

        $collectionClassName = AnalyzeCriticalXTableMap::getTableMap()->getCollectionClassName();

        $this->collAnalyzeCriticalxes = new $collectionClassName;
        $this->collAnalyzeCriticalxes->setModel('\AnalyzeCriticalX');
    }

    /**
     * Gets an array of ChildAnalyzeCriticalX objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAnalyzeCriticalX[] List of ChildAnalyzeCriticalX objects
     * @throws PropelException
     */
    public function getAnalyzeCriticalxes(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeCriticalxesPartial && !$this->isNew();
        if (null === $this->collAnalyzeCriticalxes || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeCriticalxes) {
                // return empty collection
                $this->initAnalyzeCriticalxes();
            } else {
                $collAnalyzeCriticalxes = ChildAnalyzeCriticalXQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAnalyzeCriticalxesPartial && count($collAnalyzeCriticalxes)) {
                        $this->initAnalyzeCriticalxes(false);

                        foreach ($collAnalyzeCriticalxes as $obj) {
                            if (false == $this->collAnalyzeCriticalxes->contains($obj)) {
                                $this->collAnalyzeCriticalxes->append($obj);
                            }
                        }

                        $this->collAnalyzeCriticalxesPartial = true;
                    }

                    return $collAnalyzeCriticalxes;
                }

                if ($partial && $this->collAnalyzeCriticalxes) {
                    foreach ($this->collAnalyzeCriticalxes as $obj) {
                        if ($obj->isNew()) {
                            $collAnalyzeCriticalxes[] = $obj;
                        }
                    }
                }

                $this->collAnalyzeCriticalxes = $collAnalyzeCriticalxes;
                $this->collAnalyzeCriticalxesPartial = false;
            }
        }

        return $this->collAnalyzeCriticalxes;
    }

    /**
     * Sets a collection of ChildAnalyzeCriticalX objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $analyzeCriticalxes A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setAnalyzeCriticalxes(Collection $analyzeCriticalxes, ConnectionInterface $con = null)
    {
        /** @var ChildAnalyzeCriticalX[] $analyzeCriticalxesToDelete */
        $analyzeCriticalxesToDelete = $this->getAnalyzeCriticalxes(new Criteria(), $con)->diff($analyzeCriticalxes);


        $this->analyzeCriticalxesScheduledForDeletion = $analyzeCriticalxesToDelete;

        foreach ($analyzeCriticalxesToDelete as $analyzeCriticalXRemoved) {
            $analyzeCriticalXRemoved->setProjects(null);
        }

        $this->collAnalyzeCriticalxes = null;
        foreach ($analyzeCriticalxes as $analyzeCriticalX) {
            $this->addAnalyzeCriticalX($analyzeCriticalX);
        }

        $this->collAnalyzeCriticalxes = $analyzeCriticalxes;
        $this->collAnalyzeCriticalxesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnalyzeCriticalX objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AnalyzeCriticalX objects.
     * @throws PropelException
     */
    public function countAnalyzeCriticalxes(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeCriticalxesPartial && !$this->isNew();
        if (null === $this->collAnalyzeCriticalxes || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeCriticalxes) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAnalyzeCriticalxes());
            }

            $query = ChildAnalyzeCriticalXQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collAnalyzeCriticalxes);
    }

    /**
     * Method called to associate a ChildAnalyzeCriticalX object to this object
     * through the ChildAnalyzeCriticalX foreign key attribute.
     *
     * @param  ChildAnalyzeCriticalX $l ChildAnalyzeCriticalX
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addAnalyzeCriticalX(ChildAnalyzeCriticalX $l)
    {
        if ($this->collAnalyzeCriticalxes === null) {
            $this->initAnalyzeCriticalxes();
            $this->collAnalyzeCriticalxesPartial = true;
        }

        if (!$this->collAnalyzeCriticalxes->contains($l)) {
            $this->doAddAnalyzeCriticalX($l);

            if ($this->analyzeCriticalxesScheduledForDeletion and $this->analyzeCriticalxesScheduledForDeletion->contains($l)) {
                $this->analyzeCriticalxesScheduledForDeletion->remove($this->analyzeCriticalxesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAnalyzeCriticalX $analyzeCriticalX The ChildAnalyzeCriticalX object to add.
     */
    protected function doAddAnalyzeCriticalX(ChildAnalyzeCriticalX $analyzeCriticalX)
    {
        $this->collAnalyzeCriticalxes[]= $analyzeCriticalX;
        $analyzeCriticalX->setProjects($this);
    }

    /**
     * @param  ChildAnalyzeCriticalX $analyzeCriticalX The ChildAnalyzeCriticalX object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeAnalyzeCriticalX(ChildAnalyzeCriticalX $analyzeCriticalX)
    {
        if ($this->getAnalyzeCriticalxes()->contains($analyzeCriticalX)) {
            $pos = $this->collAnalyzeCriticalxes->search($analyzeCriticalX);
            $this->collAnalyzeCriticalxes->remove($pos);
            if (null === $this->analyzeCriticalxesScheduledForDeletion) {
                $this->analyzeCriticalxesScheduledForDeletion = clone $this->collAnalyzeCriticalxes;
                $this->analyzeCriticalxesScheduledForDeletion->clear();
            }
            $this->analyzeCriticalxesScheduledForDeletion[]= clone $analyzeCriticalX;
            $analyzeCriticalX->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeCriticalxes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeCriticalX[] List of ChildAnalyzeCriticalX objects
     */
    public function getAnalyzeCriticalxesJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeCriticalXQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getAnalyzeCriticalxes($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeCriticalxes from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeCriticalX[] List of ChildAnalyzeCriticalX objects
     */
    public function getAnalyzeCriticalxesJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeCriticalXQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getAnalyzeCriticalxes($query, $con);
    }

    /**
     * Clears out the collAnalyzeFmeas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAnalyzeFmeas()
     */
    public function clearAnalyzeFmeas()
    {
        $this->collAnalyzeFmeas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAnalyzeFmeas collection loaded partially.
     */
    public function resetPartialAnalyzeFmeas($v = true)
    {
        $this->collAnalyzeFmeasPartial = $v;
    }

    /**
     * Initializes the collAnalyzeFmeas collection.
     *
     * By default this just sets the collAnalyzeFmeas collection to an empty array (like clearcollAnalyzeFmeas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnalyzeFmeas($overrideExisting = true)
    {
        if (null !== $this->collAnalyzeFmeas && !$overrideExisting) {
            return;
        }

        $collectionClassName = AnalyzeFmeaTableMap::getTableMap()->getCollectionClassName();

        $this->collAnalyzeFmeas = new $collectionClassName;
        $this->collAnalyzeFmeas->setModel('\AnalyzeFmea');
    }

    /**
     * Gets an array of ChildAnalyzeFmea objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAnalyzeFmea[] List of ChildAnalyzeFmea objects
     * @throws PropelException
     */
    public function getAnalyzeFmeas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeFmeasPartial && !$this->isNew();
        if (null === $this->collAnalyzeFmeas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeFmeas) {
                // return empty collection
                $this->initAnalyzeFmeas();
            } else {
                $collAnalyzeFmeas = ChildAnalyzeFmeaQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAnalyzeFmeasPartial && count($collAnalyzeFmeas)) {
                        $this->initAnalyzeFmeas(false);

                        foreach ($collAnalyzeFmeas as $obj) {
                            if (false == $this->collAnalyzeFmeas->contains($obj)) {
                                $this->collAnalyzeFmeas->append($obj);
                            }
                        }

                        $this->collAnalyzeFmeasPartial = true;
                    }

                    return $collAnalyzeFmeas;
                }

                if ($partial && $this->collAnalyzeFmeas) {
                    foreach ($this->collAnalyzeFmeas as $obj) {
                        if ($obj->isNew()) {
                            $collAnalyzeFmeas[] = $obj;
                        }
                    }
                }

                $this->collAnalyzeFmeas = $collAnalyzeFmeas;
                $this->collAnalyzeFmeasPartial = false;
            }
        }

        return $this->collAnalyzeFmeas;
    }

    /**
     * Sets a collection of ChildAnalyzeFmea objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $analyzeFmeas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setAnalyzeFmeas(Collection $analyzeFmeas, ConnectionInterface $con = null)
    {
        /** @var ChildAnalyzeFmea[] $analyzeFmeasToDelete */
        $analyzeFmeasToDelete = $this->getAnalyzeFmeas(new Criteria(), $con)->diff($analyzeFmeas);


        $this->analyzeFmeasScheduledForDeletion = $analyzeFmeasToDelete;

        foreach ($analyzeFmeasToDelete as $analyzeFmeaRemoved) {
            $analyzeFmeaRemoved->setProjects(null);
        }

        $this->collAnalyzeFmeas = null;
        foreach ($analyzeFmeas as $analyzeFmea) {
            $this->addAnalyzeFmea($analyzeFmea);
        }

        $this->collAnalyzeFmeas = $analyzeFmeas;
        $this->collAnalyzeFmeasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnalyzeFmea objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AnalyzeFmea objects.
     * @throws PropelException
     */
    public function countAnalyzeFmeas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeFmeasPartial && !$this->isNew();
        if (null === $this->collAnalyzeFmeas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeFmeas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAnalyzeFmeas());
            }

            $query = ChildAnalyzeFmeaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collAnalyzeFmeas);
    }

    /**
     * Method called to associate a ChildAnalyzeFmea object to this object
     * through the ChildAnalyzeFmea foreign key attribute.
     *
     * @param  ChildAnalyzeFmea $l ChildAnalyzeFmea
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addAnalyzeFmea(ChildAnalyzeFmea $l)
    {
        if ($this->collAnalyzeFmeas === null) {
            $this->initAnalyzeFmeas();
            $this->collAnalyzeFmeasPartial = true;
        }

        if (!$this->collAnalyzeFmeas->contains($l)) {
            $this->doAddAnalyzeFmea($l);

            if ($this->analyzeFmeasScheduledForDeletion and $this->analyzeFmeasScheduledForDeletion->contains($l)) {
                $this->analyzeFmeasScheduledForDeletion->remove($this->analyzeFmeasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAnalyzeFmea $analyzeFmea The ChildAnalyzeFmea object to add.
     */
    protected function doAddAnalyzeFmea(ChildAnalyzeFmea $analyzeFmea)
    {
        $this->collAnalyzeFmeas[]= $analyzeFmea;
        $analyzeFmea->setProjects($this);
    }

    /**
     * @param  ChildAnalyzeFmea $analyzeFmea The ChildAnalyzeFmea object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeAnalyzeFmea(ChildAnalyzeFmea $analyzeFmea)
    {
        if ($this->getAnalyzeFmeas()->contains($analyzeFmea)) {
            $pos = $this->collAnalyzeFmeas->search($analyzeFmea);
            $this->collAnalyzeFmeas->remove($pos);
            if (null === $this->analyzeFmeasScheduledForDeletion) {
                $this->analyzeFmeasScheduledForDeletion = clone $this->collAnalyzeFmeas;
                $this->analyzeFmeasScheduledForDeletion->clear();
            }
            $this->analyzeFmeasScheduledForDeletion[]= clone $analyzeFmea;
            $analyzeFmea->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeFmeas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeFmea[] List of ChildAnalyzeFmea objects
     */
    public function getAnalyzeFmeasJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeFmeaQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getAnalyzeFmeas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeFmeas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeFmea[] List of ChildAnalyzeFmea objects
     */
    public function getAnalyzeFmeasJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeFmeaQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getAnalyzeFmeas($query, $con);
    }

    /**
     * Clears out the collAnalyzeGateReviews collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAnalyzeGateReviews()
     */
    public function clearAnalyzeGateReviews()
    {
        $this->collAnalyzeGateReviews = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAnalyzeGateReviews collection loaded partially.
     */
    public function resetPartialAnalyzeGateReviews($v = true)
    {
        $this->collAnalyzeGateReviewsPartial = $v;
    }

    /**
     * Initializes the collAnalyzeGateReviews collection.
     *
     * By default this just sets the collAnalyzeGateReviews collection to an empty array (like clearcollAnalyzeGateReviews());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnalyzeGateReviews($overrideExisting = true)
    {
        if (null !== $this->collAnalyzeGateReviews && !$overrideExisting) {
            return;
        }

        $collectionClassName = AnalyzeGateReviewTableMap::getTableMap()->getCollectionClassName();

        $this->collAnalyzeGateReviews = new $collectionClassName;
        $this->collAnalyzeGateReviews->setModel('\AnalyzeGateReview');
    }

    /**
     * Gets an array of ChildAnalyzeGateReview objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAnalyzeGateReview[] List of ChildAnalyzeGateReview objects
     * @throws PropelException
     */
    public function getAnalyzeGateReviews(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeGateReviewsPartial && !$this->isNew();
        if (null === $this->collAnalyzeGateReviews || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeGateReviews) {
                // return empty collection
                $this->initAnalyzeGateReviews();
            } else {
                $collAnalyzeGateReviews = ChildAnalyzeGateReviewQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAnalyzeGateReviewsPartial && count($collAnalyzeGateReviews)) {
                        $this->initAnalyzeGateReviews(false);

                        foreach ($collAnalyzeGateReviews as $obj) {
                            if (false == $this->collAnalyzeGateReviews->contains($obj)) {
                                $this->collAnalyzeGateReviews->append($obj);
                            }
                        }

                        $this->collAnalyzeGateReviewsPartial = true;
                    }

                    return $collAnalyzeGateReviews;
                }

                if ($partial && $this->collAnalyzeGateReviews) {
                    foreach ($this->collAnalyzeGateReviews as $obj) {
                        if ($obj->isNew()) {
                            $collAnalyzeGateReviews[] = $obj;
                        }
                    }
                }

                $this->collAnalyzeGateReviews = $collAnalyzeGateReviews;
                $this->collAnalyzeGateReviewsPartial = false;
            }
        }

        return $this->collAnalyzeGateReviews;
    }

    /**
     * Sets a collection of ChildAnalyzeGateReview objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $analyzeGateReviews A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setAnalyzeGateReviews(Collection $analyzeGateReviews, ConnectionInterface $con = null)
    {
        /** @var ChildAnalyzeGateReview[] $analyzeGateReviewsToDelete */
        $analyzeGateReviewsToDelete = $this->getAnalyzeGateReviews(new Criteria(), $con)->diff($analyzeGateReviews);


        $this->analyzeGateReviewsScheduledForDeletion = $analyzeGateReviewsToDelete;

        foreach ($analyzeGateReviewsToDelete as $analyzeGateReviewRemoved) {
            $analyzeGateReviewRemoved->setProjects(null);
        }

        $this->collAnalyzeGateReviews = null;
        foreach ($analyzeGateReviews as $analyzeGateReview) {
            $this->addAnalyzeGateReview($analyzeGateReview);
        }

        $this->collAnalyzeGateReviews = $analyzeGateReviews;
        $this->collAnalyzeGateReviewsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnalyzeGateReview objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AnalyzeGateReview objects.
     * @throws PropelException
     */
    public function countAnalyzeGateReviews(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeGateReviewsPartial && !$this->isNew();
        if (null === $this->collAnalyzeGateReviews || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeGateReviews) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAnalyzeGateReviews());
            }

            $query = ChildAnalyzeGateReviewQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collAnalyzeGateReviews);
    }

    /**
     * Method called to associate a ChildAnalyzeGateReview object to this object
     * through the ChildAnalyzeGateReview foreign key attribute.
     *
     * @param  ChildAnalyzeGateReview $l ChildAnalyzeGateReview
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addAnalyzeGateReview(ChildAnalyzeGateReview $l)
    {
        if ($this->collAnalyzeGateReviews === null) {
            $this->initAnalyzeGateReviews();
            $this->collAnalyzeGateReviewsPartial = true;
        }

        if (!$this->collAnalyzeGateReviews->contains($l)) {
            $this->doAddAnalyzeGateReview($l);

            if ($this->analyzeGateReviewsScheduledForDeletion and $this->analyzeGateReviewsScheduledForDeletion->contains($l)) {
                $this->analyzeGateReviewsScheduledForDeletion->remove($this->analyzeGateReviewsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAnalyzeGateReview $analyzeGateReview The ChildAnalyzeGateReview object to add.
     */
    protected function doAddAnalyzeGateReview(ChildAnalyzeGateReview $analyzeGateReview)
    {
        $this->collAnalyzeGateReviews[]= $analyzeGateReview;
        $analyzeGateReview->setProjects($this);
    }

    /**
     * @param  ChildAnalyzeGateReview $analyzeGateReview The ChildAnalyzeGateReview object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeAnalyzeGateReview(ChildAnalyzeGateReview $analyzeGateReview)
    {
        if ($this->getAnalyzeGateReviews()->contains($analyzeGateReview)) {
            $pos = $this->collAnalyzeGateReviews->search($analyzeGateReview);
            $this->collAnalyzeGateReviews->remove($pos);
            if (null === $this->analyzeGateReviewsScheduledForDeletion) {
                $this->analyzeGateReviewsScheduledForDeletion = clone $this->collAnalyzeGateReviews;
                $this->analyzeGateReviewsScheduledForDeletion->clear();
            }
            $this->analyzeGateReviewsScheduledForDeletion[]= clone $analyzeGateReview;
            $analyzeGateReview->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeGateReview[] List of ChildAnalyzeGateReview objects
     */
    public function getAnalyzeGateReviewsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeGateReviewQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getAnalyzeGateReviews($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeGateReview[] List of ChildAnalyzeGateReview objects
     */
    public function getAnalyzeGateReviewsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeGateReviewQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getAnalyzeGateReviews($query, $con);
    }

    /**
     * Clears out the collAnalyzeHypothesisMaps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAnalyzeHypothesisMaps()
     */
    public function clearAnalyzeHypothesisMaps()
    {
        $this->collAnalyzeHypothesisMaps = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAnalyzeHypothesisMaps collection loaded partially.
     */
    public function resetPartialAnalyzeHypothesisMaps($v = true)
    {
        $this->collAnalyzeHypothesisMapsPartial = $v;
    }

    /**
     * Initializes the collAnalyzeHypothesisMaps collection.
     *
     * By default this just sets the collAnalyzeHypothesisMaps collection to an empty array (like clearcollAnalyzeHypothesisMaps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnalyzeHypothesisMaps($overrideExisting = true)
    {
        if (null !== $this->collAnalyzeHypothesisMaps && !$overrideExisting) {
            return;
        }

        $collectionClassName = AnalyzeHypothesisMapTableMap::getTableMap()->getCollectionClassName();

        $this->collAnalyzeHypothesisMaps = new $collectionClassName;
        $this->collAnalyzeHypothesisMaps->setModel('\AnalyzeHypothesisMap');
    }

    /**
     * Gets an array of ChildAnalyzeHypothesisMap objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAnalyzeHypothesisMap[] List of ChildAnalyzeHypothesisMap objects
     * @throws PropelException
     */
    public function getAnalyzeHypothesisMaps(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeHypothesisMapsPartial && !$this->isNew();
        if (null === $this->collAnalyzeHypothesisMaps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeHypothesisMaps) {
                // return empty collection
                $this->initAnalyzeHypothesisMaps();
            } else {
                $collAnalyzeHypothesisMaps = ChildAnalyzeHypothesisMapQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAnalyzeHypothesisMapsPartial && count($collAnalyzeHypothesisMaps)) {
                        $this->initAnalyzeHypothesisMaps(false);

                        foreach ($collAnalyzeHypothesisMaps as $obj) {
                            if (false == $this->collAnalyzeHypothesisMaps->contains($obj)) {
                                $this->collAnalyzeHypothesisMaps->append($obj);
                            }
                        }

                        $this->collAnalyzeHypothesisMapsPartial = true;
                    }

                    return $collAnalyzeHypothesisMaps;
                }

                if ($partial && $this->collAnalyzeHypothesisMaps) {
                    foreach ($this->collAnalyzeHypothesisMaps as $obj) {
                        if ($obj->isNew()) {
                            $collAnalyzeHypothesisMaps[] = $obj;
                        }
                    }
                }

                $this->collAnalyzeHypothesisMaps = $collAnalyzeHypothesisMaps;
                $this->collAnalyzeHypothesisMapsPartial = false;
            }
        }

        return $this->collAnalyzeHypothesisMaps;
    }

    /**
     * Sets a collection of ChildAnalyzeHypothesisMap objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $analyzeHypothesisMaps A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setAnalyzeHypothesisMaps(Collection $analyzeHypothesisMaps, ConnectionInterface $con = null)
    {
        /** @var ChildAnalyzeHypothesisMap[] $analyzeHypothesisMapsToDelete */
        $analyzeHypothesisMapsToDelete = $this->getAnalyzeHypothesisMaps(new Criteria(), $con)->diff($analyzeHypothesisMaps);


        $this->analyzeHypothesisMapsScheduledForDeletion = $analyzeHypothesisMapsToDelete;

        foreach ($analyzeHypothesisMapsToDelete as $analyzeHypothesisMapRemoved) {
            $analyzeHypothesisMapRemoved->setProjects(null);
        }

        $this->collAnalyzeHypothesisMaps = null;
        foreach ($analyzeHypothesisMaps as $analyzeHypothesisMap) {
            $this->addAnalyzeHypothesisMap($analyzeHypothesisMap);
        }

        $this->collAnalyzeHypothesisMaps = $analyzeHypothesisMaps;
        $this->collAnalyzeHypothesisMapsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnalyzeHypothesisMap objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AnalyzeHypothesisMap objects.
     * @throws PropelException
     */
    public function countAnalyzeHypothesisMaps(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAnalyzeHypothesisMapsPartial && !$this->isNew();
        if (null === $this->collAnalyzeHypothesisMaps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnalyzeHypothesisMaps) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAnalyzeHypothesisMaps());
            }

            $query = ChildAnalyzeHypothesisMapQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collAnalyzeHypothesisMaps);
    }

    /**
     * Method called to associate a ChildAnalyzeHypothesisMap object to this object
     * through the ChildAnalyzeHypothesisMap foreign key attribute.
     *
     * @param  ChildAnalyzeHypothesisMap $l ChildAnalyzeHypothesisMap
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addAnalyzeHypothesisMap(ChildAnalyzeHypothesisMap $l)
    {
        if ($this->collAnalyzeHypothesisMaps === null) {
            $this->initAnalyzeHypothesisMaps();
            $this->collAnalyzeHypothesisMapsPartial = true;
        }

        if (!$this->collAnalyzeHypothesisMaps->contains($l)) {
            $this->doAddAnalyzeHypothesisMap($l);

            if ($this->analyzeHypothesisMapsScheduledForDeletion and $this->analyzeHypothesisMapsScheduledForDeletion->contains($l)) {
                $this->analyzeHypothesisMapsScheduledForDeletion->remove($this->analyzeHypothesisMapsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAnalyzeHypothesisMap $analyzeHypothesisMap The ChildAnalyzeHypothesisMap object to add.
     */
    protected function doAddAnalyzeHypothesisMap(ChildAnalyzeHypothesisMap $analyzeHypothesisMap)
    {
        $this->collAnalyzeHypothesisMaps[]= $analyzeHypothesisMap;
        $analyzeHypothesisMap->setProjects($this);
    }

    /**
     * @param  ChildAnalyzeHypothesisMap $analyzeHypothesisMap The ChildAnalyzeHypothesisMap object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeAnalyzeHypothesisMap(ChildAnalyzeHypothesisMap $analyzeHypothesisMap)
    {
        if ($this->getAnalyzeHypothesisMaps()->contains($analyzeHypothesisMap)) {
            $pos = $this->collAnalyzeHypothesisMaps->search($analyzeHypothesisMap);
            $this->collAnalyzeHypothesisMaps->remove($pos);
            if (null === $this->analyzeHypothesisMapsScheduledForDeletion) {
                $this->analyzeHypothesisMapsScheduledForDeletion = clone $this->collAnalyzeHypothesisMaps;
                $this->analyzeHypothesisMapsScheduledForDeletion->clear();
            }
            $this->analyzeHypothesisMapsScheduledForDeletion[]= clone $analyzeHypothesisMap;
            $analyzeHypothesisMap->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeHypothesisMaps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeHypothesisMap[] List of ChildAnalyzeHypothesisMap objects
     */
    public function getAnalyzeHypothesisMapsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeHypothesisMapQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getAnalyzeHypothesisMaps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related AnalyzeHypothesisMaps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildAnalyzeHypothesisMap[] List of ChildAnalyzeHypothesisMap objects
     */
    public function getAnalyzeHypothesisMapsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildAnalyzeHypothesisMapQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getAnalyzeHypothesisMaps($query, $con);
    }

    /**
     * Clears out the collChartExcelDatas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addChartExcelDatas()
     */
    public function clearChartExcelDatas()
    {
        $this->collChartExcelDatas = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collChartExcelDatas collection loaded partially.
     */
    public function resetPartialChartExcelDatas($v = true)
    {
        $this->collChartExcelDatasPartial = $v;
    }

    /**
     * Initializes the collChartExcelDatas collection.
     *
     * By default this just sets the collChartExcelDatas collection to an empty array (like clearcollChartExcelDatas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initChartExcelDatas($overrideExisting = true)
    {
        if (null !== $this->collChartExcelDatas && !$overrideExisting) {
            return;
        }

        $collectionClassName = ChartExcelDataTableMap::getTableMap()->getCollectionClassName();

        $this->collChartExcelDatas = new $collectionClassName;
        $this->collChartExcelDatas->setModel('\ChartExcelData');
    }

    /**
     * Gets an array of ChildChartExcelData objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildChartExcelData[] List of ChildChartExcelData objects
     * @throws PropelException
     */
    public function getChartExcelDatas(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collChartExcelDatasPartial && !$this->isNew();
        if (null === $this->collChartExcelDatas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collChartExcelDatas) {
                // return empty collection
                $this->initChartExcelDatas();
            } else {
                $collChartExcelDatas = ChildChartExcelDataQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collChartExcelDatasPartial && count($collChartExcelDatas)) {
                        $this->initChartExcelDatas(false);

                        foreach ($collChartExcelDatas as $obj) {
                            if (false == $this->collChartExcelDatas->contains($obj)) {
                                $this->collChartExcelDatas->append($obj);
                            }
                        }

                        $this->collChartExcelDatasPartial = true;
                    }

                    return $collChartExcelDatas;
                }

                if ($partial && $this->collChartExcelDatas) {
                    foreach ($this->collChartExcelDatas as $obj) {
                        if ($obj->isNew()) {
                            $collChartExcelDatas[] = $obj;
                        }
                    }
                }

                $this->collChartExcelDatas = $collChartExcelDatas;
                $this->collChartExcelDatasPartial = false;
            }
        }

        return $this->collChartExcelDatas;
    }

    /**
     * Sets a collection of ChildChartExcelData objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $chartExcelDatas A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setChartExcelDatas(Collection $chartExcelDatas, ConnectionInterface $con = null)
    {
        /** @var ChildChartExcelData[] $chartExcelDatasToDelete */
        $chartExcelDatasToDelete = $this->getChartExcelDatas(new Criteria(), $con)->diff($chartExcelDatas);


        $this->chartExcelDatasScheduledForDeletion = $chartExcelDatasToDelete;

        foreach ($chartExcelDatasToDelete as $chartExcelDataRemoved) {
            $chartExcelDataRemoved->setProjects(null);
        }

        $this->collChartExcelDatas = null;
        foreach ($chartExcelDatas as $chartExcelData) {
            $this->addChartExcelData($chartExcelData);
        }

        $this->collChartExcelDatas = $chartExcelDatas;
        $this->collChartExcelDatasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ChartExcelData objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ChartExcelData objects.
     * @throws PropelException
     */
    public function countChartExcelDatas(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collChartExcelDatasPartial && !$this->isNew();
        if (null === $this->collChartExcelDatas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collChartExcelDatas) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getChartExcelDatas());
            }

            $query = ChildChartExcelDataQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collChartExcelDatas);
    }

    /**
     * Method called to associate a ChildChartExcelData object to this object
     * through the ChildChartExcelData foreign key attribute.
     *
     * @param  ChildChartExcelData $l ChildChartExcelData
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addChartExcelData(ChildChartExcelData $l)
    {
        if ($this->collChartExcelDatas === null) {
            $this->initChartExcelDatas();
            $this->collChartExcelDatasPartial = true;
        }

        if (!$this->collChartExcelDatas->contains($l)) {
            $this->doAddChartExcelData($l);

            if ($this->chartExcelDatasScheduledForDeletion and $this->chartExcelDatasScheduledForDeletion->contains($l)) {
                $this->chartExcelDatasScheduledForDeletion->remove($this->chartExcelDatasScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildChartExcelData $chartExcelData The ChildChartExcelData object to add.
     */
    protected function doAddChartExcelData(ChildChartExcelData $chartExcelData)
    {
        $this->collChartExcelDatas[]= $chartExcelData;
        $chartExcelData->setProjects($this);
    }

    /**
     * @param  ChildChartExcelData $chartExcelData The ChildChartExcelData object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeChartExcelData(ChildChartExcelData $chartExcelData)
    {
        if ($this->getChartExcelDatas()->contains($chartExcelData)) {
            $pos = $this->collChartExcelDatas->search($chartExcelData);
            $this->collChartExcelDatas->remove($pos);
            if (null === $this->chartExcelDatasScheduledForDeletion) {
                $this->chartExcelDatasScheduledForDeletion = clone $this->collChartExcelDatas;
                $this->chartExcelDatasScheduledForDeletion->clear();
            }
            $this->chartExcelDatasScheduledForDeletion[]= clone $chartExcelData;
            $chartExcelData->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ChartExcelDatas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildChartExcelData[] List of ChildChartExcelData objects
     */
    public function getChartExcelDatasJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildChartExcelDataQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getChartExcelDatas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ChartExcelDatas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildChartExcelData[] List of ChildChartExcelData objects
     */
    public function getChartExcelDatasJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildChartExcelDataQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getChartExcelDatas($query, $con);
    }

    /**
     * Clears out the collControlControlPlans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addControlControlPlans()
     */
    public function clearControlControlPlans()
    {
        $this->collControlControlPlans = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collControlControlPlans collection loaded partially.
     */
    public function resetPartialControlControlPlans($v = true)
    {
        $this->collControlControlPlansPartial = $v;
    }

    /**
     * Initializes the collControlControlPlans collection.
     *
     * By default this just sets the collControlControlPlans collection to an empty array (like clearcollControlControlPlans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initControlControlPlans($overrideExisting = true)
    {
        if (null !== $this->collControlControlPlans && !$overrideExisting) {
            return;
        }

        $collectionClassName = ControlControlPlanTableMap::getTableMap()->getCollectionClassName();

        $this->collControlControlPlans = new $collectionClassName;
        $this->collControlControlPlans->setModel('\ControlControlPlan');
    }

    /**
     * Gets an array of ChildControlControlPlan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildControlControlPlan[] List of ChildControlControlPlan objects
     * @throws PropelException
     */
    public function getControlControlPlans(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collControlControlPlansPartial && !$this->isNew();
        if (null === $this->collControlControlPlans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collControlControlPlans) {
                // return empty collection
                $this->initControlControlPlans();
            } else {
                $collControlControlPlans = ChildControlControlPlanQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collControlControlPlansPartial && count($collControlControlPlans)) {
                        $this->initControlControlPlans(false);

                        foreach ($collControlControlPlans as $obj) {
                            if (false == $this->collControlControlPlans->contains($obj)) {
                                $this->collControlControlPlans->append($obj);
                            }
                        }

                        $this->collControlControlPlansPartial = true;
                    }

                    return $collControlControlPlans;
                }

                if ($partial && $this->collControlControlPlans) {
                    foreach ($this->collControlControlPlans as $obj) {
                        if ($obj->isNew()) {
                            $collControlControlPlans[] = $obj;
                        }
                    }
                }

                $this->collControlControlPlans = $collControlControlPlans;
                $this->collControlControlPlansPartial = false;
            }
        }

        return $this->collControlControlPlans;
    }

    /**
     * Sets a collection of ChildControlControlPlan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $controlControlPlans A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setControlControlPlans(Collection $controlControlPlans, ConnectionInterface $con = null)
    {
        /** @var ChildControlControlPlan[] $controlControlPlansToDelete */
        $controlControlPlansToDelete = $this->getControlControlPlans(new Criteria(), $con)->diff($controlControlPlans);


        $this->controlControlPlansScheduledForDeletion = $controlControlPlansToDelete;

        foreach ($controlControlPlansToDelete as $controlControlPlanRemoved) {
            $controlControlPlanRemoved->setProjects(null);
        }

        $this->collControlControlPlans = null;
        foreach ($controlControlPlans as $controlControlPlan) {
            $this->addControlControlPlan($controlControlPlan);
        }

        $this->collControlControlPlans = $controlControlPlans;
        $this->collControlControlPlansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ControlControlPlan objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ControlControlPlan objects.
     * @throws PropelException
     */
    public function countControlControlPlans(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collControlControlPlansPartial && !$this->isNew();
        if (null === $this->collControlControlPlans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collControlControlPlans) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getControlControlPlans());
            }

            $query = ChildControlControlPlanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collControlControlPlans);
    }

    /**
     * Method called to associate a ChildControlControlPlan object to this object
     * through the ChildControlControlPlan foreign key attribute.
     *
     * @param  ChildControlControlPlan $l ChildControlControlPlan
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addControlControlPlan(ChildControlControlPlan $l)
    {
        if ($this->collControlControlPlans === null) {
            $this->initControlControlPlans();
            $this->collControlControlPlansPartial = true;
        }

        if (!$this->collControlControlPlans->contains($l)) {
            $this->doAddControlControlPlan($l);

            if ($this->controlControlPlansScheduledForDeletion and $this->controlControlPlansScheduledForDeletion->contains($l)) {
                $this->controlControlPlansScheduledForDeletion->remove($this->controlControlPlansScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildControlControlPlan $controlControlPlan The ChildControlControlPlan object to add.
     */
    protected function doAddControlControlPlan(ChildControlControlPlan $controlControlPlan)
    {
        $this->collControlControlPlans[]= $controlControlPlan;
        $controlControlPlan->setProjects($this);
    }

    /**
     * @param  ChildControlControlPlan $controlControlPlan The ChildControlControlPlan object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeControlControlPlan(ChildControlControlPlan $controlControlPlan)
    {
        if ($this->getControlControlPlans()->contains($controlControlPlan)) {
            $pos = $this->collControlControlPlans->search($controlControlPlan);
            $this->collControlControlPlans->remove($pos);
            if (null === $this->controlControlPlansScheduledForDeletion) {
                $this->controlControlPlansScheduledForDeletion = clone $this->collControlControlPlans;
                $this->controlControlPlansScheduledForDeletion->clear();
            }
            $this->controlControlPlansScheduledForDeletion[]= clone $controlControlPlan;
            $controlControlPlan->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ControlControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlControlPlan[] List of ChildControlControlPlan objects
     */
    public function getControlControlPlansJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlControlPlanQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getControlControlPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ControlControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlControlPlan[] List of ChildControlControlPlan objects
     */
    public function getControlControlPlansJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlControlPlanQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getControlControlPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ControlControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlControlPlan[] List of ChildControlControlPlan objects
     */
    public function getControlControlPlansJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlControlPlanQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

        return $this->getControlControlPlans($query, $con);
    }

    /**
     * Clears out the collControlGateReviews collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addControlGateReviews()
     */
    public function clearControlGateReviews()
    {
        $this->collControlGateReviews = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collControlGateReviews collection loaded partially.
     */
    public function resetPartialControlGateReviews($v = true)
    {
        $this->collControlGateReviewsPartial = $v;
    }

    /**
     * Initializes the collControlGateReviews collection.
     *
     * By default this just sets the collControlGateReviews collection to an empty array (like clearcollControlGateReviews());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initControlGateReviews($overrideExisting = true)
    {
        if (null !== $this->collControlGateReviews && !$overrideExisting) {
            return;
        }

        $collectionClassName = ControlGateReviewTableMap::getTableMap()->getCollectionClassName();

        $this->collControlGateReviews = new $collectionClassName;
        $this->collControlGateReviews->setModel('\ControlGateReview');
    }

    /**
     * Gets an array of ChildControlGateReview objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildControlGateReview[] List of ChildControlGateReview objects
     * @throws PropelException
     */
    public function getControlGateReviews(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collControlGateReviewsPartial && !$this->isNew();
        if (null === $this->collControlGateReviews || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collControlGateReviews) {
                // return empty collection
                $this->initControlGateReviews();
            } else {
                $collControlGateReviews = ChildControlGateReviewQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collControlGateReviewsPartial && count($collControlGateReviews)) {
                        $this->initControlGateReviews(false);

                        foreach ($collControlGateReviews as $obj) {
                            if (false == $this->collControlGateReviews->contains($obj)) {
                                $this->collControlGateReviews->append($obj);
                            }
                        }

                        $this->collControlGateReviewsPartial = true;
                    }

                    return $collControlGateReviews;
                }

                if ($partial && $this->collControlGateReviews) {
                    foreach ($this->collControlGateReviews as $obj) {
                        if ($obj->isNew()) {
                            $collControlGateReviews[] = $obj;
                        }
                    }
                }

                $this->collControlGateReviews = $collControlGateReviews;
                $this->collControlGateReviewsPartial = false;
            }
        }

        return $this->collControlGateReviews;
    }

    /**
     * Sets a collection of ChildControlGateReview objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $controlGateReviews A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setControlGateReviews(Collection $controlGateReviews, ConnectionInterface $con = null)
    {
        /** @var ChildControlGateReview[] $controlGateReviewsToDelete */
        $controlGateReviewsToDelete = $this->getControlGateReviews(new Criteria(), $con)->diff($controlGateReviews);


        $this->controlGateReviewsScheduledForDeletion = $controlGateReviewsToDelete;

        foreach ($controlGateReviewsToDelete as $controlGateReviewRemoved) {
            $controlGateReviewRemoved->setProjects(null);
        }

        $this->collControlGateReviews = null;
        foreach ($controlGateReviews as $controlGateReview) {
            $this->addControlGateReview($controlGateReview);
        }

        $this->collControlGateReviews = $controlGateReviews;
        $this->collControlGateReviewsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ControlGateReview objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ControlGateReview objects.
     * @throws PropelException
     */
    public function countControlGateReviews(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collControlGateReviewsPartial && !$this->isNew();
        if (null === $this->collControlGateReviews || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collControlGateReviews) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getControlGateReviews());
            }

            $query = ChildControlGateReviewQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collControlGateReviews);
    }

    /**
     * Method called to associate a ChildControlGateReview object to this object
     * through the ChildControlGateReview foreign key attribute.
     *
     * @param  ChildControlGateReview $l ChildControlGateReview
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addControlGateReview(ChildControlGateReview $l)
    {
        if ($this->collControlGateReviews === null) {
            $this->initControlGateReviews();
            $this->collControlGateReviewsPartial = true;
        }

        if (!$this->collControlGateReviews->contains($l)) {
            $this->doAddControlGateReview($l);

            if ($this->controlGateReviewsScheduledForDeletion and $this->controlGateReviewsScheduledForDeletion->contains($l)) {
                $this->controlGateReviewsScheduledForDeletion->remove($this->controlGateReviewsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildControlGateReview $controlGateReview The ChildControlGateReview object to add.
     */
    protected function doAddControlGateReview(ChildControlGateReview $controlGateReview)
    {
        $this->collControlGateReviews[]= $controlGateReview;
        $controlGateReview->setProjects($this);
    }

    /**
     * @param  ChildControlGateReview $controlGateReview The ChildControlGateReview object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeControlGateReview(ChildControlGateReview $controlGateReview)
    {
        if ($this->getControlGateReviews()->contains($controlGateReview)) {
            $pos = $this->collControlGateReviews->search($controlGateReview);
            $this->collControlGateReviews->remove($pos);
            if (null === $this->controlGateReviewsScheduledForDeletion) {
                $this->controlGateReviewsScheduledForDeletion = clone $this->collControlGateReviews;
                $this->controlGateReviewsScheduledForDeletion->clear();
            }
            $this->controlGateReviewsScheduledForDeletion[]= clone $controlGateReview;
            $controlGateReview->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ControlGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlGateReview[] List of ChildControlGateReview objects
     */
    public function getControlGateReviewsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlGateReviewQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getControlGateReviews($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ControlGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlGateReview[] List of ChildControlGateReview objects
     */
    public function getControlGateReviewsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlGateReviewQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getControlGateReviews($query, $con);
    }

    /**
     * Clears out the collControlTestPlans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addControlTestPlans()
     */
    public function clearControlTestPlans()
    {
        $this->collControlTestPlans = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collControlTestPlans collection loaded partially.
     */
    public function resetPartialControlTestPlans($v = true)
    {
        $this->collControlTestPlansPartial = $v;
    }

    /**
     * Initializes the collControlTestPlans collection.
     *
     * By default this just sets the collControlTestPlans collection to an empty array (like clearcollControlTestPlans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initControlTestPlans($overrideExisting = true)
    {
        if (null !== $this->collControlTestPlans && !$overrideExisting) {
            return;
        }

        $collectionClassName = ControlTestPlanTableMap::getTableMap()->getCollectionClassName();

        $this->collControlTestPlans = new $collectionClassName;
        $this->collControlTestPlans->setModel('\ControlTestPlan');
    }

    /**
     * Gets an array of ChildControlTestPlan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildControlTestPlan[] List of ChildControlTestPlan objects
     * @throws PropelException
     */
    public function getControlTestPlans(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collControlTestPlansPartial && !$this->isNew();
        if (null === $this->collControlTestPlans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collControlTestPlans) {
                // return empty collection
                $this->initControlTestPlans();
            } else {
                $collControlTestPlans = ChildControlTestPlanQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collControlTestPlansPartial && count($collControlTestPlans)) {
                        $this->initControlTestPlans(false);

                        foreach ($collControlTestPlans as $obj) {
                            if (false == $this->collControlTestPlans->contains($obj)) {
                                $this->collControlTestPlans->append($obj);
                            }
                        }

                        $this->collControlTestPlansPartial = true;
                    }

                    return $collControlTestPlans;
                }

                if ($partial && $this->collControlTestPlans) {
                    foreach ($this->collControlTestPlans as $obj) {
                        if ($obj->isNew()) {
                            $collControlTestPlans[] = $obj;
                        }
                    }
                }

                $this->collControlTestPlans = $collControlTestPlans;
                $this->collControlTestPlansPartial = false;
            }
        }

        return $this->collControlTestPlans;
    }

    /**
     * Sets a collection of ChildControlTestPlan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $controlTestPlans A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setControlTestPlans(Collection $controlTestPlans, ConnectionInterface $con = null)
    {
        /** @var ChildControlTestPlan[] $controlTestPlansToDelete */
        $controlTestPlansToDelete = $this->getControlTestPlans(new Criteria(), $con)->diff($controlTestPlans);


        $this->controlTestPlansScheduledForDeletion = $controlTestPlansToDelete;

        foreach ($controlTestPlansToDelete as $controlTestPlanRemoved) {
            $controlTestPlanRemoved->setProjects(null);
        }

        $this->collControlTestPlans = null;
        foreach ($controlTestPlans as $controlTestPlan) {
            $this->addControlTestPlan($controlTestPlan);
        }

        $this->collControlTestPlans = $controlTestPlans;
        $this->collControlTestPlansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ControlTestPlan objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ControlTestPlan objects.
     * @throws PropelException
     */
    public function countControlTestPlans(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collControlTestPlansPartial && !$this->isNew();
        if (null === $this->collControlTestPlans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collControlTestPlans) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getControlTestPlans());
            }

            $query = ChildControlTestPlanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collControlTestPlans);
    }

    /**
     * Method called to associate a ChildControlTestPlan object to this object
     * through the ChildControlTestPlan foreign key attribute.
     *
     * @param  ChildControlTestPlan $l ChildControlTestPlan
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addControlTestPlan(ChildControlTestPlan $l)
    {
        if ($this->collControlTestPlans === null) {
            $this->initControlTestPlans();
            $this->collControlTestPlansPartial = true;
        }

        if (!$this->collControlTestPlans->contains($l)) {
            $this->doAddControlTestPlan($l);

            if ($this->controlTestPlansScheduledForDeletion and $this->controlTestPlansScheduledForDeletion->contains($l)) {
                $this->controlTestPlansScheduledForDeletion->remove($this->controlTestPlansScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildControlTestPlan $controlTestPlan The ChildControlTestPlan object to add.
     */
    protected function doAddControlTestPlan(ChildControlTestPlan $controlTestPlan)
    {
        $this->collControlTestPlans[]= $controlTestPlan;
        $controlTestPlan->setProjects($this);
    }

    /**
     * @param  ChildControlTestPlan $controlTestPlan The ChildControlTestPlan object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeControlTestPlan(ChildControlTestPlan $controlTestPlan)
    {
        if ($this->getControlTestPlans()->contains($controlTestPlan)) {
            $pos = $this->collControlTestPlans->search($controlTestPlan);
            $this->collControlTestPlans->remove($pos);
            if (null === $this->controlTestPlansScheduledForDeletion) {
                $this->controlTestPlansScheduledForDeletion = clone $this->collControlTestPlans;
                $this->controlTestPlansScheduledForDeletion->clear();
            }
            $this->controlTestPlansScheduledForDeletion[]= clone $controlTestPlan;
            $controlTestPlan->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ControlTestPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlTestPlan[] List of ChildControlTestPlan objects
     */
    public function getControlTestPlansJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlTestPlanQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getControlTestPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ControlTestPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlTestPlan[] List of ChildControlTestPlan objects
     */
    public function getControlTestPlansJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlTestPlanQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getControlTestPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ControlTestPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlTestPlan[] List of ChildControlTestPlan objects
     */
    public function getControlTestPlansJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlTestPlanQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

        return $this->getControlTestPlans($query, $con);
    }

    /**
     * Clears out the collDefineCommunications collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDefineCommunications()
     */
    public function clearDefineCommunications()
    {
        $this->collDefineCommunications = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDefineCommunications collection loaded partially.
     */
    public function resetPartialDefineCommunications($v = true)
    {
        $this->collDefineCommunicationsPartial = $v;
    }

    /**
     * Initializes the collDefineCommunications collection.
     *
     * By default this just sets the collDefineCommunications collection to an empty array (like clearcollDefineCommunications());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDefineCommunications($overrideExisting = true)
    {
        if (null !== $this->collDefineCommunications && !$overrideExisting) {
            return;
        }

        $collectionClassName = DefineCommunicationTableMap::getTableMap()->getCollectionClassName();

        $this->collDefineCommunications = new $collectionClassName;
        $this->collDefineCommunications->setModel('\DefineCommunication');
    }

    /**
     * Gets an array of ChildDefineCommunication objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDefineCommunication[] List of ChildDefineCommunication objects
     * @throws PropelException
     */
    public function getDefineCommunications(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineCommunicationsPartial && !$this->isNew();
        if (null === $this->collDefineCommunications || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDefineCommunications) {
                // return empty collection
                $this->initDefineCommunications();
            } else {
                $collDefineCommunications = ChildDefineCommunicationQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDefineCommunicationsPartial && count($collDefineCommunications)) {
                        $this->initDefineCommunications(false);

                        foreach ($collDefineCommunications as $obj) {
                            if (false == $this->collDefineCommunications->contains($obj)) {
                                $this->collDefineCommunications->append($obj);
                            }
                        }

                        $this->collDefineCommunicationsPartial = true;
                    }

                    return $collDefineCommunications;
                }

                if ($partial && $this->collDefineCommunications) {
                    foreach ($this->collDefineCommunications as $obj) {
                        if ($obj->isNew()) {
                            $collDefineCommunications[] = $obj;
                        }
                    }
                }

                $this->collDefineCommunications = $collDefineCommunications;
                $this->collDefineCommunicationsPartial = false;
            }
        }

        return $this->collDefineCommunications;
    }

    /**
     * Sets a collection of ChildDefineCommunication objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $defineCommunications A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setDefineCommunications(Collection $defineCommunications, ConnectionInterface $con = null)
    {
        /** @var ChildDefineCommunication[] $defineCommunicationsToDelete */
        $defineCommunicationsToDelete = $this->getDefineCommunications(new Criteria(), $con)->diff($defineCommunications);


        $this->defineCommunicationsScheduledForDeletion = $defineCommunicationsToDelete;

        foreach ($defineCommunicationsToDelete as $defineCommunicationRemoved) {
            $defineCommunicationRemoved->setProjects(null);
        }

        $this->collDefineCommunications = null;
        foreach ($defineCommunications as $defineCommunication) {
            $this->addDefineCommunication($defineCommunication);
        }

        $this->collDefineCommunications = $defineCommunications;
        $this->collDefineCommunicationsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DefineCommunication objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DefineCommunication objects.
     * @throws PropelException
     */
    public function countDefineCommunications(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineCommunicationsPartial && !$this->isNew();
        if (null === $this->collDefineCommunications || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDefineCommunications) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDefineCommunications());
            }

            $query = ChildDefineCommunicationQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collDefineCommunications);
    }

    /**
     * Method called to associate a ChildDefineCommunication object to this object
     * through the ChildDefineCommunication foreign key attribute.
     *
     * @param  ChildDefineCommunication $l ChildDefineCommunication
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addDefineCommunication(ChildDefineCommunication $l)
    {
        if ($this->collDefineCommunications === null) {
            $this->initDefineCommunications();
            $this->collDefineCommunicationsPartial = true;
        }

        if (!$this->collDefineCommunications->contains($l)) {
            $this->doAddDefineCommunication($l);

            if ($this->defineCommunicationsScheduledForDeletion and $this->defineCommunicationsScheduledForDeletion->contains($l)) {
                $this->defineCommunicationsScheduledForDeletion->remove($this->defineCommunicationsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDefineCommunication $defineCommunication The ChildDefineCommunication object to add.
     */
    protected function doAddDefineCommunication(ChildDefineCommunication $defineCommunication)
    {
        $this->collDefineCommunications[]= $defineCommunication;
        $defineCommunication->setProjects($this);
    }

    /**
     * @param  ChildDefineCommunication $defineCommunication The ChildDefineCommunication object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeDefineCommunication(ChildDefineCommunication $defineCommunication)
    {
        if ($this->getDefineCommunications()->contains($defineCommunication)) {
            $pos = $this->collDefineCommunications->search($defineCommunication);
            $this->collDefineCommunications->remove($pos);
            if (null === $this->defineCommunicationsScheduledForDeletion) {
                $this->defineCommunicationsScheduledForDeletion = clone $this->collDefineCommunications;
                $this->defineCommunicationsScheduledForDeletion->clear();
            }
            $this->defineCommunicationsScheduledForDeletion[]= clone $defineCommunication;
            $defineCommunication->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineCommunications from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineCommunication[] List of ChildDefineCommunication objects
     */
    public function getDefineCommunicationsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineCommunicationQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getDefineCommunications($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineCommunications from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineCommunication[] List of ChildDefineCommunication objects
     */
    public function getDefineCommunicationsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineCommunicationQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getDefineCommunications($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineCommunications from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineCommunication[] List of ChildDefineCommunication objects
     */
    public function getDefineCommunicationsJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineCommunicationQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

        return $this->getDefineCommunications($query, $con);
    }

    /**
     * Clears out the collDefineGateReviews collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDefineGateReviews()
     */
    public function clearDefineGateReviews()
    {
        $this->collDefineGateReviews = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDefineGateReviews collection loaded partially.
     */
    public function resetPartialDefineGateReviews($v = true)
    {
        $this->collDefineGateReviewsPartial = $v;
    }

    /**
     * Initializes the collDefineGateReviews collection.
     *
     * By default this just sets the collDefineGateReviews collection to an empty array (like clearcollDefineGateReviews());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDefineGateReviews($overrideExisting = true)
    {
        if (null !== $this->collDefineGateReviews && !$overrideExisting) {
            return;
        }

        $collectionClassName = DefineGateReviewTableMap::getTableMap()->getCollectionClassName();

        $this->collDefineGateReviews = new $collectionClassName;
        $this->collDefineGateReviews->setModel('\DefineGateReview');
    }

    /**
     * Gets an array of ChildDefineGateReview objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDefineGateReview[] List of ChildDefineGateReview objects
     * @throws PropelException
     */
    public function getDefineGateReviews(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineGateReviewsPartial && !$this->isNew();
        if (null === $this->collDefineGateReviews || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDefineGateReviews) {
                // return empty collection
                $this->initDefineGateReviews();
            } else {
                $collDefineGateReviews = ChildDefineGateReviewQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDefineGateReviewsPartial && count($collDefineGateReviews)) {
                        $this->initDefineGateReviews(false);

                        foreach ($collDefineGateReviews as $obj) {
                            if (false == $this->collDefineGateReviews->contains($obj)) {
                                $this->collDefineGateReviews->append($obj);
                            }
                        }

                        $this->collDefineGateReviewsPartial = true;
                    }

                    return $collDefineGateReviews;
                }

                if ($partial && $this->collDefineGateReviews) {
                    foreach ($this->collDefineGateReviews as $obj) {
                        if ($obj->isNew()) {
                            $collDefineGateReviews[] = $obj;
                        }
                    }
                }

                $this->collDefineGateReviews = $collDefineGateReviews;
                $this->collDefineGateReviewsPartial = false;
            }
        }

        return $this->collDefineGateReviews;
    }

    /**
     * Sets a collection of ChildDefineGateReview objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $defineGateReviews A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setDefineGateReviews(Collection $defineGateReviews, ConnectionInterface $con = null)
    {
        /** @var ChildDefineGateReview[] $defineGateReviewsToDelete */
        $defineGateReviewsToDelete = $this->getDefineGateReviews(new Criteria(), $con)->diff($defineGateReviews);


        $this->defineGateReviewsScheduledForDeletion = $defineGateReviewsToDelete;

        foreach ($defineGateReviewsToDelete as $defineGateReviewRemoved) {
            $defineGateReviewRemoved->setProjects(null);
        }

        $this->collDefineGateReviews = null;
        foreach ($defineGateReviews as $defineGateReview) {
            $this->addDefineGateReview($defineGateReview);
        }

        $this->collDefineGateReviews = $defineGateReviews;
        $this->collDefineGateReviewsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DefineGateReview objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DefineGateReview objects.
     * @throws PropelException
     */
    public function countDefineGateReviews(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineGateReviewsPartial && !$this->isNew();
        if (null === $this->collDefineGateReviews || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDefineGateReviews) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDefineGateReviews());
            }

            $query = ChildDefineGateReviewQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collDefineGateReviews);
    }

    /**
     * Method called to associate a ChildDefineGateReview object to this object
     * through the ChildDefineGateReview foreign key attribute.
     *
     * @param  ChildDefineGateReview $l ChildDefineGateReview
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addDefineGateReview(ChildDefineGateReview $l)
    {
        if ($this->collDefineGateReviews === null) {
            $this->initDefineGateReviews();
            $this->collDefineGateReviewsPartial = true;
        }

        if (!$this->collDefineGateReviews->contains($l)) {
            $this->doAddDefineGateReview($l);

            if ($this->defineGateReviewsScheduledForDeletion and $this->defineGateReviewsScheduledForDeletion->contains($l)) {
                $this->defineGateReviewsScheduledForDeletion->remove($this->defineGateReviewsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDefineGateReview $defineGateReview The ChildDefineGateReview object to add.
     */
    protected function doAddDefineGateReview(ChildDefineGateReview $defineGateReview)
    {
        $this->collDefineGateReviews[]= $defineGateReview;
        $defineGateReview->setProjects($this);
    }

    /**
     * @param  ChildDefineGateReview $defineGateReview The ChildDefineGateReview object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeDefineGateReview(ChildDefineGateReview $defineGateReview)
    {
        if ($this->getDefineGateReviews()->contains($defineGateReview)) {
            $pos = $this->collDefineGateReviews->search($defineGateReview);
            $this->collDefineGateReviews->remove($pos);
            if (null === $this->defineGateReviewsScheduledForDeletion) {
                $this->defineGateReviewsScheduledForDeletion = clone $this->collDefineGateReviews;
                $this->defineGateReviewsScheduledForDeletion->clear();
            }
            $this->defineGateReviewsScheduledForDeletion[]= clone $defineGateReview;
            $defineGateReview->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineGateReview[] List of ChildDefineGateReview objects
     */
    public function getDefineGateReviewsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineGateReviewQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getDefineGateReviews($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineGateReview[] List of ChildDefineGateReview objects
     */
    public function getDefineGateReviewsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineGateReviewQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getDefineGateReviews($query, $con);
    }

    /**
     * Clears out the collDefineRacis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDefineRacis()
     */
    public function clearDefineRacis()
    {
        $this->collDefineRacis = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDefineRacis collection loaded partially.
     */
    public function resetPartialDefineRacis($v = true)
    {
        $this->collDefineRacisPartial = $v;
    }

    /**
     * Initializes the collDefineRacis collection.
     *
     * By default this just sets the collDefineRacis collection to an empty array (like clearcollDefineRacis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDefineRacis($overrideExisting = true)
    {
        if (null !== $this->collDefineRacis && !$overrideExisting) {
            return;
        }

        $collectionClassName = DefineRaciTableMap::getTableMap()->getCollectionClassName();

        $this->collDefineRacis = new $collectionClassName;
        $this->collDefineRacis->setModel('\DefineRaci');
    }

    /**
     * Gets an array of ChildDefineRaci objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDefineRaci[] List of ChildDefineRaci objects
     * @throws PropelException
     */
    public function getDefineRacis(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineRacisPartial && !$this->isNew();
        if (null === $this->collDefineRacis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDefineRacis) {
                // return empty collection
                $this->initDefineRacis();
            } else {
                $collDefineRacis = ChildDefineRaciQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDefineRacisPartial && count($collDefineRacis)) {
                        $this->initDefineRacis(false);

                        foreach ($collDefineRacis as $obj) {
                            if (false == $this->collDefineRacis->contains($obj)) {
                                $this->collDefineRacis->append($obj);
                            }
                        }

                        $this->collDefineRacisPartial = true;
                    }

                    return $collDefineRacis;
                }

                if ($partial && $this->collDefineRacis) {
                    foreach ($this->collDefineRacis as $obj) {
                        if ($obj->isNew()) {
                            $collDefineRacis[] = $obj;
                        }
                    }
                }

                $this->collDefineRacis = $collDefineRacis;
                $this->collDefineRacisPartial = false;
            }
        }

        return $this->collDefineRacis;
    }

    /**
     * Sets a collection of ChildDefineRaci objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $defineRacis A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setDefineRacis(Collection $defineRacis, ConnectionInterface $con = null)
    {
        /** @var ChildDefineRaci[] $defineRacisToDelete */
        $defineRacisToDelete = $this->getDefineRacis(new Criteria(), $con)->diff($defineRacis);


        $this->defineRacisScheduledForDeletion = $defineRacisToDelete;

        foreach ($defineRacisToDelete as $defineRaciRemoved) {
            $defineRaciRemoved->setProjects(null);
        }

        $this->collDefineRacis = null;
        foreach ($defineRacis as $defineRaci) {
            $this->addDefineRaci($defineRaci);
        }

        $this->collDefineRacis = $defineRacis;
        $this->collDefineRacisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DefineRaci objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DefineRaci objects.
     * @throws PropelException
     */
    public function countDefineRacis(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineRacisPartial && !$this->isNew();
        if (null === $this->collDefineRacis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDefineRacis) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDefineRacis());
            }

            $query = ChildDefineRaciQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collDefineRacis);
    }

    /**
     * Method called to associate a ChildDefineRaci object to this object
     * through the ChildDefineRaci foreign key attribute.
     *
     * @param  ChildDefineRaci $l ChildDefineRaci
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addDefineRaci(ChildDefineRaci $l)
    {
        if ($this->collDefineRacis === null) {
            $this->initDefineRacis();
            $this->collDefineRacisPartial = true;
        }

        if (!$this->collDefineRacis->contains($l)) {
            $this->doAddDefineRaci($l);

            if ($this->defineRacisScheduledForDeletion and $this->defineRacisScheduledForDeletion->contains($l)) {
                $this->defineRacisScheduledForDeletion->remove($this->defineRacisScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDefineRaci $defineRaci The ChildDefineRaci object to add.
     */
    protected function doAddDefineRaci(ChildDefineRaci $defineRaci)
    {
        $this->collDefineRacis[]= $defineRaci;
        $defineRaci->setProjects($this);
    }

    /**
     * @param  ChildDefineRaci $defineRaci The ChildDefineRaci object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeDefineRaci(ChildDefineRaci $defineRaci)
    {
        if ($this->getDefineRacis()->contains($defineRaci)) {
            $pos = $this->collDefineRacis->search($defineRaci);
            $this->collDefineRacis->remove($pos);
            if (null === $this->defineRacisScheduledForDeletion) {
                $this->defineRacisScheduledForDeletion = clone $this->collDefineRacis;
                $this->defineRacisScheduledForDeletion->clear();
            }
            $this->defineRacisScheduledForDeletion[]= clone $defineRaci;
            $defineRaci->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineRacis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineRaci[] List of ChildDefineRaci objects
     */
    public function getDefineRacisJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineRaciQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getDefineRacis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineRacis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineRaci[] List of ChildDefineRaci objects
     */
    public function getDefineRacisJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineRaciQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getDefineRacis($query, $con);
    }

    /**
     * Clears out the collDefineRiskManagements collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDefineRiskManagements()
     */
    public function clearDefineRiskManagements()
    {
        $this->collDefineRiskManagements = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDefineRiskManagements collection loaded partially.
     */
    public function resetPartialDefineRiskManagements($v = true)
    {
        $this->collDefineRiskManagementsPartial = $v;
    }

    /**
     * Initializes the collDefineRiskManagements collection.
     *
     * By default this just sets the collDefineRiskManagements collection to an empty array (like clearcollDefineRiskManagements());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDefineRiskManagements($overrideExisting = true)
    {
        if (null !== $this->collDefineRiskManagements && !$overrideExisting) {
            return;
        }

        $collectionClassName = DefineRiskManagementTableMap::getTableMap()->getCollectionClassName();

        $this->collDefineRiskManagements = new $collectionClassName;
        $this->collDefineRiskManagements->setModel('\DefineRiskManagement');
    }

    /**
     * Gets an array of ChildDefineRiskManagement objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDefineRiskManagement[] List of ChildDefineRiskManagement objects
     * @throws PropelException
     */
    public function getDefineRiskManagements(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineRiskManagementsPartial && !$this->isNew();
        if (null === $this->collDefineRiskManagements || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDefineRiskManagements) {
                // return empty collection
                $this->initDefineRiskManagements();
            } else {
                $collDefineRiskManagements = ChildDefineRiskManagementQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDefineRiskManagementsPartial && count($collDefineRiskManagements)) {
                        $this->initDefineRiskManagements(false);

                        foreach ($collDefineRiskManagements as $obj) {
                            if (false == $this->collDefineRiskManagements->contains($obj)) {
                                $this->collDefineRiskManagements->append($obj);
                            }
                        }

                        $this->collDefineRiskManagementsPartial = true;
                    }

                    return $collDefineRiskManagements;
                }

                if ($partial && $this->collDefineRiskManagements) {
                    foreach ($this->collDefineRiskManagements as $obj) {
                        if ($obj->isNew()) {
                            $collDefineRiskManagements[] = $obj;
                        }
                    }
                }

                $this->collDefineRiskManagements = $collDefineRiskManagements;
                $this->collDefineRiskManagementsPartial = false;
            }
        }

        return $this->collDefineRiskManagements;
    }

    /**
     * Sets a collection of ChildDefineRiskManagement objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $defineRiskManagements A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setDefineRiskManagements(Collection $defineRiskManagements, ConnectionInterface $con = null)
    {
        /** @var ChildDefineRiskManagement[] $defineRiskManagementsToDelete */
        $defineRiskManagementsToDelete = $this->getDefineRiskManagements(new Criteria(), $con)->diff($defineRiskManagements);


        $this->defineRiskManagementsScheduledForDeletion = $defineRiskManagementsToDelete;

        foreach ($defineRiskManagementsToDelete as $defineRiskManagementRemoved) {
            $defineRiskManagementRemoved->setProjects(null);
        }

        $this->collDefineRiskManagements = null;
        foreach ($defineRiskManagements as $defineRiskManagement) {
            $this->addDefineRiskManagement($defineRiskManagement);
        }

        $this->collDefineRiskManagements = $defineRiskManagements;
        $this->collDefineRiskManagementsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DefineRiskManagement objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DefineRiskManagement objects.
     * @throws PropelException
     */
    public function countDefineRiskManagements(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineRiskManagementsPartial && !$this->isNew();
        if (null === $this->collDefineRiskManagements || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDefineRiskManagements) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDefineRiskManagements());
            }

            $query = ChildDefineRiskManagementQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collDefineRiskManagements);
    }

    /**
     * Method called to associate a ChildDefineRiskManagement object to this object
     * through the ChildDefineRiskManagement foreign key attribute.
     *
     * @param  ChildDefineRiskManagement $l ChildDefineRiskManagement
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addDefineRiskManagement(ChildDefineRiskManagement $l)
    {
        if ($this->collDefineRiskManagements === null) {
            $this->initDefineRiskManagements();
            $this->collDefineRiskManagementsPartial = true;
        }

        if (!$this->collDefineRiskManagements->contains($l)) {
            $this->doAddDefineRiskManagement($l);

            if ($this->defineRiskManagementsScheduledForDeletion and $this->defineRiskManagementsScheduledForDeletion->contains($l)) {
                $this->defineRiskManagementsScheduledForDeletion->remove($this->defineRiskManagementsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDefineRiskManagement $defineRiskManagement The ChildDefineRiskManagement object to add.
     */
    protected function doAddDefineRiskManagement(ChildDefineRiskManagement $defineRiskManagement)
    {
        $this->collDefineRiskManagements[]= $defineRiskManagement;
        $defineRiskManagement->setProjects($this);
    }

    /**
     * @param  ChildDefineRiskManagement $defineRiskManagement The ChildDefineRiskManagement object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeDefineRiskManagement(ChildDefineRiskManagement $defineRiskManagement)
    {
        if ($this->getDefineRiskManagements()->contains($defineRiskManagement)) {
            $pos = $this->collDefineRiskManagements->search($defineRiskManagement);
            $this->collDefineRiskManagements->remove($pos);
            if (null === $this->defineRiskManagementsScheduledForDeletion) {
                $this->defineRiskManagementsScheduledForDeletion = clone $this->collDefineRiskManagements;
                $this->defineRiskManagementsScheduledForDeletion->clear();
            }
            $this->defineRiskManagementsScheduledForDeletion[]= clone $defineRiskManagement;
            $defineRiskManagement->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineRiskManagements from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineRiskManagement[] List of ChildDefineRiskManagement objects
     */
    public function getDefineRiskManagementsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineRiskManagementQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getDefineRiskManagements($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineRiskManagements from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineRiskManagement[] List of ChildDefineRiskManagement objects
     */
    public function getDefineRiskManagementsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineRiskManagementQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getDefineRiskManagements($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineRiskManagements from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineRiskManagement[] List of ChildDefineRiskManagement objects
     */
    public function getDefineRiskManagementsJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineRiskManagementQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

        return $this->getDefineRiskManagements($query, $con);
    }

    /**
     * Clears out the collDefineSipocs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDefineSipocs()
     */
    public function clearDefineSipocs()
    {
        $this->collDefineSipocs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDefineSipocs collection loaded partially.
     */
    public function resetPartialDefineSipocs($v = true)
    {
        $this->collDefineSipocsPartial = $v;
    }

    /**
     * Initializes the collDefineSipocs collection.
     *
     * By default this just sets the collDefineSipocs collection to an empty array (like clearcollDefineSipocs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDefineSipocs($overrideExisting = true)
    {
        if (null !== $this->collDefineSipocs && !$overrideExisting) {
            return;
        }

        $collectionClassName = DefineSipocTableMap::getTableMap()->getCollectionClassName();

        $this->collDefineSipocs = new $collectionClassName;
        $this->collDefineSipocs->setModel('\DefineSipoc');
    }

    /**
     * Gets an array of ChildDefineSipoc objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDefineSipoc[] List of ChildDefineSipoc objects
     * @throws PropelException
     */
    public function getDefineSipocs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineSipocsPartial && !$this->isNew();
        if (null === $this->collDefineSipocs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDefineSipocs) {
                // return empty collection
                $this->initDefineSipocs();
            } else {
                $collDefineSipocs = ChildDefineSipocQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDefineSipocsPartial && count($collDefineSipocs)) {
                        $this->initDefineSipocs(false);

                        foreach ($collDefineSipocs as $obj) {
                            if (false == $this->collDefineSipocs->contains($obj)) {
                                $this->collDefineSipocs->append($obj);
                            }
                        }

                        $this->collDefineSipocsPartial = true;
                    }

                    return $collDefineSipocs;
                }

                if ($partial && $this->collDefineSipocs) {
                    foreach ($this->collDefineSipocs as $obj) {
                        if ($obj->isNew()) {
                            $collDefineSipocs[] = $obj;
                        }
                    }
                }

                $this->collDefineSipocs = $collDefineSipocs;
                $this->collDefineSipocsPartial = false;
            }
        }

        return $this->collDefineSipocs;
    }

    /**
     * Sets a collection of ChildDefineSipoc objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $defineSipocs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setDefineSipocs(Collection $defineSipocs, ConnectionInterface $con = null)
    {
        /** @var ChildDefineSipoc[] $defineSipocsToDelete */
        $defineSipocsToDelete = $this->getDefineSipocs(new Criteria(), $con)->diff($defineSipocs);


        $this->defineSipocsScheduledForDeletion = $defineSipocsToDelete;

        foreach ($defineSipocsToDelete as $defineSipocRemoved) {
            $defineSipocRemoved->setProjects(null);
        }

        $this->collDefineSipocs = null;
        foreach ($defineSipocs as $defineSipoc) {
            $this->addDefineSipoc($defineSipoc);
        }

        $this->collDefineSipocs = $defineSipocs;
        $this->collDefineSipocsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DefineSipoc objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DefineSipoc objects.
     * @throws PropelException
     */
    public function countDefineSipocs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineSipocsPartial && !$this->isNew();
        if (null === $this->collDefineSipocs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDefineSipocs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDefineSipocs());
            }

            $query = ChildDefineSipocQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collDefineSipocs);
    }

    /**
     * Method called to associate a ChildDefineSipoc object to this object
     * through the ChildDefineSipoc foreign key attribute.
     *
     * @param  ChildDefineSipoc $l ChildDefineSipoc
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addDefineSipoc(ChildDefineSipoc $l)
    {
        if ($this->collDefineSipocs === null) {
            $this->initDefineSipocs();
            $this->collDefineSipocsPartial = true;
        }

        if (!$this->collDefineSipocs->contains($l)) {
            $this->doAddDefineSipoc($l);

            if ($this->defineSipocsScheduledForDeletion and $this->defineSipocsScheduledForDeletion->contains($l)) {
                $this->defineSipocsScheduledForDeletion->remove($this->defineSipocsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDefineSipoc $defineSipoc The ChildDefineSipoc object to add.
     */
    protected function doAddDefineSipoc(ChildDefineSipoc $defineSipoc)
    {
        $this->collDefineSipocs[]= $defineSipoc;
        $defineSipoc->setProjects($this);
    }

    /**
     * @param  ChildDefineSipoc $defineSipoc The ChildDefineSipoc object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeDefineSipoc(ChildDefineSipoc $defineSipoc)
    {
        if ($this->getDefineSipocs()->contains($defineSipoc)) {
            $pos = $this->collDefineSipocs->search($defineSipoc);
            $this->collDefineSipocs->remove($pos);
            if (null === $this->defineSipocsScheduledForDeletion) {
                $this->defineSipocsScheduledForDeletion = clone $this->collDefineSipocs;
                $this->defineSipocsScheduledForDeletion->clear();
            }
            $this->defineSipocsScheduledForDeletion[]= clone $defineSipoc;
            $defineSipoc->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineSipocs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineSipoc[] List of ChildDefineSipoc objects
     */
    public function getDefineSipocsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineSipocQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getDefineSipocs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineSipocs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineSipoc[] List of ChildDefineSipoc objects
     */
    public function getDefineSipocsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineSipocQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getDefineSipocs($query, $con);
    }

    /**
     * Clears out the collDefineStakeholderss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDefineStakeholderss()
     */
    public function clearDefineStakeholderss()
    {
        $this->collDefineStakeholderss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDefineStakeholderss collection loaded partially.
     */
    public function resetPartialDefineStakeholderss($v = true)
    {
        $this->collDefineStakeholderssPartial = $v;
    }

    /**
     * Initializes the collDefineStakeholderss collection.
     *
     * By default this just sets the collDefineStakeholderss collection to an empty array (like clearcollDefineStakeholderss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDefineStakeholderss($overrideExisting = true)
    {
        if (null !== $this->collDefineStakeholderss && !$overrideExisting) {
            return;
        }

        $collectionClassName = DefineStakeholdersTableMap::getTableMap()->getCollectionClassName();

        $this->collDefineStakeholderss = new $collectionClassName;
        $this->collDefineStakeholderss->setModel('\DefineStakeholders');
    }

    /**
     * Gets an array of ChildDefineStakeholders objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDefineStakeholders[] List of ChildDefineStakeholders objects
     * @throws PropelException
     */
    public function getDefineStakeholderss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineStakeholderssPartial && !$this->isNew();
        if (null === $this->collDefineStakeholderss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDefineStakeholderss) {
                // return empty collection
                $this->initDefineStakeholderss();
            } else {
                $collDefineStakeholderss = ChildDefineStakeholdersQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDefineStakeholderssPartial && count($collDefineStakeholderss)) {
                        $this->initDefineStakeholderss(false);

                        foreach ($collDefineStakeholderss as $obj) {
                            if (false == $this->collDefineStakeholderss->contains($obj)) {
                                $this->collDefineStakeholderss->append($obj);
                            }
                        }

                        $this->collDefineStakeholderssPartial = true;
                    }

                    return $collDefineStakeholderss;
                }

                if ($partial && $this->collDefineStakeholderss) {
                    foreach ($this->collDefineStakeholderss as $obj) {
                        if ($obj->isNew()) {
                            $collDefineStakeholderss[] = $obj;
                        }
                    }
                }

                $this->collDefineStakeholderss = $collDefineStakeholderss;
                $this->collDefineStakeholderssPartial = false;
            }
        }

        return $this->collDefineStakeholderss;
    }

    /**
     * Sets a collection of ChildDefineStakeholders objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $defineStakeholderss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setDefineStakeholderss(Collection $defineStakeholderss, ConnectionInterface $con = null)
    {
        /** @var ChildDefineStakeholders[] $defineStakeholderssToDelete */
        $defineStakeholderssToDelete = $this->getDefineStakeholderss(new Criteria(), $con)->diff($defineStakeholderss);


        $this->defineStakeholderssScheduledForDeletion = $defineStakeholderssToDelete;

        foreach ($defineStakeholderssToDelete as $defineStakeholdersRemoved) {
            $defineStakeholdersRemoved->setProjects(null);
        }

        $this->collDefineStakeholderss = null;
        foreach ($defineStakeholderss as $defineStakeholders) {
            $this->addDefineStakeholders($defineStakeholders);
        }

        $this->collDefineStakeholderss = $defineStakeholderss;
        $this->collDefineStakeholderssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DefineStakeholders objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DefineStakeholders objects.
     * @throws PropelException
     */
    public function countDefineStakeholderss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineStakeholderssPartial && !$this->isNew();
        if (null === $this->collDefineStakeholderss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDefineStakeholderss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDefineStakeholderss());
            }

            $query = ChildDefineStakeholdersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collDefineStakeholderss);
    }

    /**
     * Method called to associate a ChildDefineStakeholders object to this object
     * through the ChildDefineStakeholders foreign key attribute.
     *
     * @param  ChildDefineStakeholders $l ChildDefineStakeholders
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addDefineStakeholders(ChildDefineStakeholders $l)
    {
        if ($this->collDefineStakeholderss === null) {
            $this->initDefineStakeholderss();
            $this->collDefineStakeholderssPartial = true;
        }

        if (!$this->collDefineStakeholderss->contains($l)) {
            $this->doAddDefineStakeholders($l);

            if ($this->defineStakeholderssScheduledForDeletion and $this->defineStakeholderssScheduledForDeletion->contains($l)) {
                $this->defineStakeholderssScheduledForDeletion->remove($this->defineStakeholderssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDefineStakeholders $defineStakeholders The ChildDefineStakeholders object to add.
     */
    protected function doAddDefineStakeholders(ChildDefineStakeholders $defineStakeholders)
    {
        $this->collDefineStakeholderss[]= $defineStakeholders;
        $defineStakeholders->setProjects($this);
    }

    /**
     * @param  ChildDefineStakeholders $defineStakeholders The ChildDefineStakeholders object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeDefineStakeholders(ChildDefineStakeholders $defineStakeholders)
    {
        if ($this->getDefineStakeholderss()->contains($defineStakeholders)) {
            $pos = $this->collDefineStakeholderss->search($defineStakeholders);
            $this->collDefineStakeholderss->remove($pos);
            if (null === $this->defineStakeholderssScheduledForDeletion) {
                $this->defineStakeholderssScheduledForDeletion = clone $this->collDefineStakeholderss;
                $this->defineStakeholderssScheduledForDeletion->clear();
            }
            $this->defineStakeholderssScheduledForDeletion[]= clone $defineStakeholders;
            $defineStakeholders->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineStakeholderss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineStakeholders[] List of ChildDefineStakeholders objects
     */
    public function getDefineStakeholderssJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineStakeholdersQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getDefineStakeholderss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineStakeholderss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineStakeholders[] List of ChildDefineStakeholders objects
     */
    public function getDefineStakeholderssJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineStakeholdersQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getDefineStakeholderss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineStakeholderss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineStakeholders[] List of ChildDefineStakeholders objects
     */
    public function getDefineStakeholderssJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineStakeholdersQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

        return $this->getDefineStakeholderss($query, $con);
    }

    /**
     * Clears out the collDefineValueStreamDiagrams collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDefineValueStreamDiagrams()
     */
    public function clearDefineValueStreamDiagrams()
    {
        $this->collDefineValueStreamDiagrams = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDefineValueStreamDiagrams collection loaded partially.
     */
    public function resetPartialDefineValueStreamDiagrams($v = true)
    {
        $this->collDefineValueStreamDiagramsPartial = $v;
    }

    /**
     * Initializes the collDefineValueStreamDiagrams collection.
     *
     * By default this just sets the collDefineValueStreamDiagrams collection to an empty array (like clearcollDefineValueStreamDiagrams());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDefineValueStreamDiagrams($overrideExisting = true)
    {
        if (null !== $this->collDefineValueStreamDiagrams && !$overrideExisting) {
            return;
        }

        $collectionClassName = DefineValueStreamDiagramTableMap::getTableMap()->getCollectionClassName();

        $this->collDefineValueStreamDiagrams = new $collectionClassName;
        $this->collDefineValueStreamDiagrams->setModel('\DefineValueStreamDiagram');
    }

    /**
     * Gets an array of ChildDefineValueStreamDiagram objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDefineValueStreamDiagram[] List of ChildDefineValueStreamDiagram objects
     * @throws PropelException
     */
    public function getDefineValueStreamDiagrams(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineValueStreamDiagramsPartial && !$this->isNew();
        if (null === $this->collDefineValueStreamDiagrams || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDefineValueStreamDiagrams) {
                // return empty collection
                $this->initDefineValueStreamDiagrams();
            } else {
                $collDefineValueStreamDiagrams = ChildDefineValueStreamDiagramQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDefineValueStreamDiagramsPartial && count($collDefineValueStreamDiagrams)) {
                        $this->initDefineValueStreamDiagrams(false);

                        foreach ($collDefineValueStreamDiagrams as $obj) {
                            if (false == $this->collDefineValueStreamDiagrams->contains($obj)) {
                                $this->collDefineValueStreamDiagrams->append($obj);
                            }
                        }

                        $this->collDefineValueStreamDiagramsPartial = true;
                    }

                    return $collDefineValueStreamDiagrams;
                }

                if ($partial && $this->collDefineValueStreamDiagrams) {
                    foreach ($this->collDefineValueStreamDiagrams as $obj) {
                        if ($obj->isNew()) {
                            $collDefineValueStreamDiagrams[] = $obj;
                        }
                    }
                }

                $this->collDefineValueStreamDiagrams = $collDefineValueStreamDiagrams;
                $this->collDefineValueStreamDiagramsPartial = false;
            }
        }

        return $this->collDefineValueStreamDiagrams;
    }

    /**
     * Sets a collection of ChildDefineValueStreamDiagram objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $defineValueStreamDiagrams A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setDefineValueStreamDiagrams(Collection $defineValueStreamDiagrams, ConnectionInterface $con = null)
    {
        /** @var ChildDefineValueStreamDiagram[] $defineValueStreamDiagramsToDelete */
        $defineValueStreamDiagramsToDelete = $this->getDefineValueStreamDiagrams(new Criteria(), $con)->diff($defineValueStreamDiagrams);


        $this->defineValueStreamDiagramsScheduledForDeletion = $defineValueStreamDiagramsToDelete;

        foreach ($defineValueStreamDiagramsToDelete as $defineValueStreamDiagramRemoved) {
            $defineValueStreamDiagramRemoved->setProjects(null);
        }

        $this->collDefineValueStreamDiagrams = null;
        foreach ($defineValueStreamDiagrams as $defineValueStreamDiagram) {
            $this->addDefineValueStreamDiagram($defineValueStreamDiagram);
        }

        $this->collDefineValueStreamDiagrams = $defineValueStreamDiagrams;
        $this->collDefineValueStreamDiagramsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DefineValueStreamDiagram objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DefineValueStreamDiagram objects.
     * @throws PropelException
     */
    public function countDefineValueStreamDiagrams(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineValueStreamDiagramsPartial && !$this->isNew();
        if (null === $this->collDefineValueStreamDiagrams || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDefineValueStreamDiagrams) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDefineValueStreamDiagrams());
            }

            $query = ChildDefineValueStreamDiagramQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collDefineValueStreamDiagrams);
    }

    /**
     * Method called to associate a ChildDefineValueStreamDiagram object to this object
     * through the ChildDefineValueStreamDiagram foreign key attribute.
     *
     * @param  ChildDefineValueStreamDiagram $l ChildDefineValueStreamDiagram
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addDefineValueStreamDiagram(ChildDefineValueStreamDiagram $l)
    {
        if ($this->collDefineValueStreamDiagrams === null) {
            $this->initDefineValueStreamDiagrams();
            $this->collDefineValueStreamDiagramsPartial = true;
        }

        if (!$this->collDefineValueStreamDiagrams->contains($l)) {
            $this->doAddDefineValueStreamDiagram($l);

            if ($this->defineValueStreamDiagramsScheduledForDeletion and $this->defineValueStreamDiagramsScheduledForDeletion->contains($l)) {
                $this->defineValueStreamDiagramsScheduledForDeletion->remove($this->defineValueStreamDiagramsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDefineValueStreamDiagram $defineValueStreamDiagram The ChildDefineValueStreamDiagram object to add.
     */
    protected function doAddDefineValueStreamDiagram(ChildDefineValueStreamDiagram $defineValueStreamDiagram)
    {
        $this->collDefineValueStreamDiagrams[]= $defineValueStreamDiagram;
        $defineValueStreamDiagram->setProjects($this);
    }

    /**
     * @param  ChildDefineValueStreamDiagram $defineValueStreamDiagram The ChildDefineValueStreamDiagram object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeDefineValueStreamDiagram(ChildDefineValueStreamDiagram $defineValueStreamDiagram)
    {
        if ($this->getDefineValueStreamDiagrams()->contains($defineValueStreamDiagram)) {
            $pos = $this->collDefineValueStreamDiagrams->search($defineValueStreamDiagram);
            $this->collDefineValueStreamDiagrams->remove($pos);
            if (null === $this->defineValueStreamDiagramsScheduledForDeletion) {
                $this->defineValueStreamDiagramsScheduledForDeletion = clone $this->collDefineValueStreamDiagrams;
                $this->defineValueStreamDiagramsScheduledForDeletion->clear();
            }
            $this->defineValueStreamDiagramsScheduledForDeletion[]= clone $defineValueStreamDiagram;
            $defineValueStreamDiagram->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineValueStreamDiagrams from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineValueStreamDiagram[] List of ChildDefineValueStreamDiagram objects
     */
    public function getDefineValueStreamDiagramsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineValueStreamDiagramQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getDefineValueStreamDiagrams($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineValueStreamDiagrams from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineValueStreamDiagram[] List of ChildDefineValueStreamDiagram objects
     */
    public function getDefineValueStreamDiagramsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineValueStreamDiagramQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getDefineValueStreamDiagrams($query, $con);
    }

    /**
     * Clears out the collDefineVocCcrs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addDefineVocCcrs()
     */
    public function clearDefineVocCcrs()
    {
        $this->collDefineVocCcrs = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collDefineVocCcrs collection loaded partially.
     */
    public function resetPartialDefineVocCcrs($v = true)
    {
        $this->collDefineVocCcrsPartial = $v;
    }

    /**
     * Initializes the collDefineVocCcrs collection.
     *
     * By default this just sets the collDefineVocCcrs collection to an empty array (like clearcollDefineVocCcrs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initDefineVocCcrs($overrideExisting = true)
    {
        if (null !== $this->collDefineVocCcrs && !$overrideExisting) {
            return;
        }

        $collectionClassName = DefineVocCcrTableMap::getTableMap()->getCollectionClassName();

        $this->collDefineVocCcrs = new $collectionClassName;
        $this->collDefineVocCcrs->setModel('\DefineVocCcr');
    }

    /**
     * Gets an array of ChildDefineVocCcr objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildDefineVocCcr[] List of ChildDefineVocCcr objects
     * @throws PropelException
     */
    public function getDefineVocCcrs(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineVocCcrsPartial && !$this->isNew();
        if (null === $this->collDefineVocCcrs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collDefineVocCcrs) {
                // return empty collection
                $this->initDefineVocCcrs();
            } else {
                $collDefineVocCcrs = ChildDefineVocCcrQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collDefineVocCcrsPartial && count($collDefineVocCcrs)) {
                        $this->initDefineVocCcrs(false);

                        foreach ($collDefineVocCcrs as $obj) {
                            if (false == $this->collDefineVocCcrs->contains($obj)) {
                                $this->collDefineVocCcrs->append($obj);
                            }
                        }

                        $this->collDefineVocCcrsPartial = true;
                    }

                    return $collDefineVocCcrs;
                }

                if ($partial && $this->collDefineVocCcrs) {
                    foreach ($this->collDefineVocCcrs as $obj) {
                        if ($obj->isNew()) {
                            $collDefineVocCcrs[] = $obj;
                        }
                    }
                }

                $this->collDefineVocCcrs = $collDefineVocCcrs;
                $this->collDefineVocCcrsPartial = false;
            }
        }

        return $this->collDefineVocCcrs;
    }

    /**
     * Sets a collection of ChildDefineVocCcr objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $defineVocCcrs A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setDefineVocCcrs(Collection $defineVocCcrs, ConnectionInterface $con = null)
    {
        /** @var ChildDefineVocCcr[] $defineVocCcrsToDelete */
        $defineVocCcrsToDelete = $this->getDefineVocCcrs(new Criteria(), $con)->diff($defineVocCcrs);


        $this->defineVocCcrsScheduledForDeletion = $defineVocCcrsToDelete;

        foreach ($defineVocCcrsToDelete as $defineVocCcrRemoved) {
            $defineVocCcrRemoved->setProjects(null);
        }

        $this->collDefineVocCcrs = null;
        foreach ($defineVocCcrs as $defineVocCcr) {
            $this->addDefineVocCcr($defineVocCcr);
        }

        $this->collDefineVocCcrs = $defineVocCcrs;
        $this->collDefineVocCcrsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related DefineVocCcr objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related DefineVocCcr objects.
     * @throws PropelException
     */
    public function countDefineVocCcrs(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collDefineVocCcrsPartial && !$this->isNew();
        if (null === $this->collDefineVocCcrs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collDefineVocCcrs) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getDefineVocCcrs());
            }

            $query = ChildDefineVocCcrQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collDefineVocCcrs);
    }

    /**
     * Method called to associate a ChildDefineVocCcr object to this object
     * through the ChildDefineVocCcr foreign key attribute.
     *
     * @param  ChildDefineVocCcr $l ChildDefineVocCcr
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addDefineVocCcr(ChildDefineVocCcr $l)
    {
        if ($this->collDefineVocCcrs === null) {
            $this->initDefineVocCcrs();
            $this->collDefineVocCcrsPartial = true;
        }

        if (!$this->collDefineVocCcrs->contains($l)) {
            $this->doAddDefineVocCcr($l);

            if ($this->defineVocCcrsScheduledForDeletion and $this->defineVocCcrsScheduledForDeletion->contains($l)) {
                $this->defineVocCcrsScheduledForDeletion->remove($this->defineVocCcrsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildDefineVocCcr $defineVocCcr The ChildDefineVocCcr object to add.
     */
    protected function doAddDefineVocCcr(ChildDefineVocCcr $defineVocCcr)
    {
        $this->collDefineVocCcrs[]= $defineVocCcr;
        $defineVocCcr->setProjects($this);
    }

    /**
     * @param  ChildDefineVocCcr $defineVocCcr The ChildDefineVocCcr object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeDefineVocCcr(ChildDefineVocCcr $defineVocCcr)
    {
        if ($this->getDefineVocCcrs()->contains($defineVocCcr)) {
            $pos = $this->collDefineVocCcrs->search($defineVocCcr);
            $this->collDefineVocCcrs->remove($pos);
            if (null === $this->defineVocCcrsScheduledForDeletion) {
                $this->defineVocCcrsScheduledForDeletion = clone $this->collDefineVocCcrs;
                $this->defineVocCcrsScheduledForDeletion->clear();
            }
            $this->defineVocCcrsScheduledForDeletion[]= clone $defineVocCcr;
            $defineVocCcr->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineVocCcrs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineVocCcr[] List of ChildDefineVocCcr objects
     */
    public function getDefineVocCcrsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineVocCcrQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getDefineVocCcrs($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related DefineVocCcrs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineVocCcr[] List of ChildDefineVocCcr objects
     */
    public function getDefineVocCcrsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineVocCcrQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getDefineVocCcrs($query, $con);
    }

    /**
     * Clears out the collImproveGateReviews collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addImproveGateReviews()
     */
    public function clearImproveGateReviews()
    {
        $this->collImproveGateReviews = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collImproveGateReviews collection loaded partially.
     */
    public function resetPartialImproveGateReviews($v = true)
    {
        $this->collImproveGateReviewsPartial = $v;
    }

    /**
     * Initializes the collImproveGateReviews collection.
     *
     * By default this just sets the collImproveGateReviews collection to an empty array (like clearcollImproveGateReviews());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initImproveGateReviews($overrideExisting = true)
    {
        if (null !== $this->collImproveGateReviews && !$overrideExisting) {
            return;
        }

        $collectionClassName = ImproveGateReviewTableMap::getTableMap()->getCollectionClassName();

        $this->collImproveGateReviews = new $collectionClassName;
        $this->collImproveGateReviews->setModel('\ImproveGateReview');
    }

    /**
     * Gets an array of ChildImproveGateReview objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildImproveGateReview[] List of ChildImproveGateReview objects
     * @throws PropelException
     */
    public function getImproveGateReviews(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collImproveGateReviewsPartial && !$this->isNew();
        if (null === $this->collImproveGateReviews || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collImproveGateReviews) {
                // return empty collection
                $this->initImproveGateReviews();
            } else {
                $collImproveGateReviews = ChildImproveGateReviewQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collImproveGateReviewsPartial && count($collImproveGateReviews)) {
                        $this->initImproveGateReviews(false);

                        foreach ($collImproveGateReviews as $obj) {
                            if (false == $this->collImproveGateReviews->contains($obj)) {
                                $this->collImproveGateReviews->append($obj);
                            }
                        }

                        $this->collImproveGateReviewsPartial = true;
                    }

                    return $collImproveGateReviews;
                }

                if ($partial && $this->collImproveGateReviews) {
                    foreach ($this->collImproveGateReviews as $obj) {
                        if ($obj->isNew()) {
                            $collImproveGateReviews[] = $obj;
                        }
                    }
                }

                $this->collImproveGateReviews = $collImproveGateReviews;
                $this->collImproveGateReviewsPartial = false;
            }
        }

        return $this->collImproveGateReviews;
    }

    /**
     * Sets a collection of ChildImproveGateReview objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $improveGateReviews A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setImproveGateReviews(Collection $improveGateReviews, ConnectionInterface $con = null)
    {
        /** @var ChildImproveGateReview[] $improveGateReviewsToDelete */
        $improveGateReviewsToDelete = $this->getImproveGateReviews(new Criteria(), $con)->diff($improveGateReviews);


        $this->improveGateReviewsScheduledForDeletion = $improveGateReviewsToDelete;

        foreach ($improveGateReviewsToDelete as $improveGateReviewRemoved) {
            $improveGateReviewRemoved->setProjects(null);
        }

        $this->collImproveGateReviews = null;
        foreach ($improveGateReviews as $improveGateReview) {
            $this->addImproveGateReview($improveGateReview);
        }

        $this->collImproveGateReviews = $improveGateReviews;
        $this->collImproveGateReviewsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ImproveGateReview objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ImproveGateReview objects.
     * @throws PropelException
     */
    public function countImproveGateReviews(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collImproveGateReviewsPartial && !$this->isNew();
        if (null === $this->collImproveGateReviews || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collImproveGateReviews) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getImproveGateReviews());
            }

            $query = ChildImproveGateReviewQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collImproveGateReviews);
    }

    /**
     * Method called to associate a ChildImproveGateReview object to this object
     * through the ChildImproveGateReview foreign key attribute.
     *
     * @param  ChildImproveGateReview $l ChildImproveGateReview
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addImproveGateReview(ChildImproveGateReview $l)
    {
        if ($this->collImproveGateReviews === null) {
            $this->initImproveGateReviews();
            $this->collImproveGateReviewsPartial = true;
        }

        if (!$this->collImproveGateReviews->contains($l)) {
            $this->doAddImproveGateReview($l);

            if ($this->improveGateReviewsScheduledForDeletion and $this->improveGateReviewsScheduledForDeletion->contains($l)) {
                $this->improveGateReviewsScheduledForDeletion->remove($this->improveGateReviewsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildImproveGateReview $improveGateReview The ChildImproveGateReview object to add.
     */
    protected function doAddImproveGateReview(ChildImproveGateReview $improveGateReview)
    {
        $this->collImproveGateReviews[]= $improveGateReview;
        $improveGateReview->setProjects($this);
    }

    /**
     * @param  ChildImproveGateReview $improveGateReview The ChildImproveGateReview object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeImproveGateReview(ChildImproveGateReview $improveGateReview)
    {
        if ($this->getImproveGateReviews()->contains($improveGateReview)) {
            $pos = $this->collImproveGateReviews->search($improveGateReview);
            $this->collImproveGateReviews->remove($pos);
            if (null === $this->improveGateReviewsScheduledForDeletion) {
                $this->improveGateReviewsScheduledForDeletion = clone $this->collImproveGateReviews;
                $this->improveGateReviewsScheduledForDeletion->clear();
            }
            $this->improveGateReviewsScheduledForDeletion[]= clone $improveGateReview;
            $improveGateReview->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ImproveGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildImproveGateReview[] List of ChildImproveGateReview objects
     */
    public function getImproveGateReviewsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildImproveGateReviewQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getImproveGateReviews($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ImproveGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildImproveGateReview[] List of ChildImproveGateReview objects
     */
    public function getImproveGateReviewsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildImproveGateReviewQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getImproveGateReviews($query, $con);
    }

    /**
     * Clears out the collImproveImprovementPlans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addImproveImprovementPlans()
     */
    public function clearImproveImprovementPlans()
    {
        $this->collImproveImprovementPlans = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collImproveImprovementPlans collection loaded partially.
     */
    public function resetPartialImproveImprovementPlans($v = true)
    {
        $this->collImproveImprovementPlansPartial = $v;
    }

    /**
     * Initializes the collImproveImprovementPlans collection.
     *
     * By default this just sets the collImproveImprovementPlans collection to an empty array (like clearcollImproveImprovementPlans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initImproveImprovementPlans($overrideExisting = true)
    {
        if (null !== $this->collImproveImprovementPlans && !$overrideExisting) {
            return;
        }

        $collectionClassName = ImproveImprovementPlanTableMap::getTableMap()->getCollectionClassName();

        $this->collImproveImprovementPlans = new $collectionClassName;
        $this->collImproveImprovementPlans->setModel('\ImproveImprovementPlan');
    }

    /**
     * Gets an array of ChildImproveImprovementPlan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildImproveImprovementPlan[] List of ChildImproveImprovementPlan objects
     * @throws PropelException
     */
    public function getImproveImprovementPlans(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collImproveImprovementPlansPartial && !$this->isNew();
        if (null === $this->collImproveImprovementPlans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collImproveImprovementPlans) {
                // return empty collection
                $this->initImproveImprovementPlans();
            } else {
                $collImproveImprovementPlans = ChildImproveImprovementPlanQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collImproveImprovementPlansPartial && count($collImproveImprovementPlans)) {
                        $this->initImproveImprovementPlans(false);

                        foreach ($collImproveImprovementPlans as $obj) {
                            if (false == $this->collImproveImprovementPlans->contains($obj)) {
                                $this->collImproveImprovementPlans->append($obj);
                            }
                        }

                        $this->collImproveImprovementPlansPartial = true;
                    }

                    return $collImproveImprovementPlans;
                }

                if ($partial && $this->collImproveImprovementPlans) {
                    foreach ($this->collImproveImprovementPlans as $obj) {
                        if ($obj->isNew()) {
                            $collImproveImprovementPlans[] = $obj;
                        }
                    }
                }

                $this->collImproveImprovementPlans = $collImproveImprovementPlans;
                $this->collImproveImprovementPlansPartial = false;
            }
        }

        return $this->collImproveImprovementPlans;
    }

    /**
     * Sets a collection of ChildImproveImprovementPlan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $improveImprovementPlans A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setImproveImprovementPlans(Collection $improveImprovementPlans, ConnectionInterface $con = null)
    {
        /** @var ChildImproveImprovementPlan[] $improveImprovementPlansToDelete */
        $improveImprovementPlansToDelete = $this->getImproveImprovementPlans(new Criteria(), $con)->diff($improveImprovementPlans);


        $this->improveImprovementPlansScheduledForDeletion = $improveImprovementPlansToDelete;

        foreach ($improveImprovementPlansToDelete as $improveImprovementPlanRemoved) {
            $improveImprovementPlanRemoved->setProjects(null);
        }

        $this->collImproveImprovementPlans = null;
        foreach ($improveImprovementPlans as $improveImprovementPlan) {
            $this->addImproveImprovementPlan($improveImprovementPlan);
        }

        $this->collImproveImprovementPlans = $improveImprovementPlans;
        $this->collImproveImprovementPlansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ImproveImprovementPlan objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ImproveImprovementPlan objects.
     * @throws PropelException
     */
    public function countImproveImprovementPlans(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collImproveImprovementPlansPartial && !$this->isNew();
        if (null === $this->collImproveImprovementPlans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collImproveImprovementPlans) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getImproveImprovementPlans());
            }

            $query = ChildImproveImprovementPlanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collImproveImprovementPlans);
    }

    /**
     * Method called to associate a ChildImproveImprovementPlan object to this object
     * through the ChildImproveImprovementPlan foreign key attribute.
     *
     * @param  ChildImproveImprovementPlan $l ChildImproveImprovementPlan
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addImproveImprovementPlan(ChildImproveImprovementPlan $l)
    {
        if ($this->collImproveImprovementPlans === null) {
            $this->initImproveImprovementPlans();
            $this->collImproveImprovementPlansPartial = true;
        }

        if (!$this->collImproveImprovementPlans->contains($l)) {
            $this->doAddImproveImprovementPlan($l);

            if ($this->improveImprovementPlansScheduledForDeletion and $this->improveImprovementPlansScheduledForDeletion->contains($l)) {
                $this->improveImprovementPlansScheduledForDeletion->remove($this->improveImprovementPlansScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildImproveImprovementPlan $improveImprovementPlan The ChildImproveImprovementPlan object to add.
     */
    protected function doAddImproveImprovementPlan(ChildImproveImprovementPlan $improveImprovementPlan)
    {
        $this->collImproveImprovementPlans[]= $improveImprovementPlan;
        $improveImprovementPlan->setProjects($this);
    }

    /**
     * @param  ChildImproveImprovementPlan $improveImprovementPlan The ChildImproveImprovementPlan object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeImproveImprovementPlan(ChildImproveImprovementPlan $improveImprovementPlan)
    {
        if ($this->getImproveImprovementPlans()->contains($improveImprovementPlan)) {
            $pos = $this->collImproveImprovementPlans->search($improveImprovementPlan);
            $this->collImproveImprovementPlans->remove($pos);
            if (null === $this->improveImprovementPlansScheduledForDeletion) {
                $this->improveImprovementPlansScheduledForDeletion = clone $this->collImproveImprovementPlans;
                $this->improveImprovementPlansScheduledForDeletion->clear();
            }
            $this->improveImprovementPlansScheduledForDeletion[]= clone $improveImprovementPlan;
            $improveImprovementPlan->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ImproveImprovementPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildImproveImprovementPlan[] List of ChildImproveImprovementPlan objects
     */
    public function getImproveImprovementPlansJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildImproveImprovementPlanQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getImproveImprovementPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ImproveImprovementPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildImproveImprovementPlan[] List of ChildImproveImprovementPlan objects
     */
    public function getImproveImprovementPlansJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildImproveImprovementPlanQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getImproveImprovementPlans($query, $con);
    }

    /**
     * Clears out the collImproveValueStreamDiagrams collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addImproveValueStreamDiagrams()
     */
    public function clearImproveValueStreamDiagrams()
    {
        $this->collImproveValueStreamDiagrams = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collImproveValueStreamDiagrams collection loaded partially.
     */
    public function resetPartialImproveValueStreamDiagrams($v = true)
    {
        $this->collImproveValueStreamDiagramsPartial = $v;
    }

    /**
     * Initializes the collImproveValueStreamDiagrams collection.
     *
     * By default this just sets the collImproveValueStreamDiagrams collection to an empty array (like clearcollImproveValueStreamDiagrams());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initImproveValueStreamDiagrams($overrideExisting = true)
    {
        if (null !== $this->collImproveValueStreamDiagrams && !$overrideExisting) {
            return;
        }

        $collectionClassName = ImproveValueStreamDiagramTableMap::getTableMap()->getCollectionClassName();

        $this->collImproveValueStreamDiagrams = new $collectionClassName;
        $this->collImproveValueStreamDiagrams->setModel('\ImproveValueStreamDiagram');
    }

    /**
     * Gets an array of ChildImproveValueStreamDiagram objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildImproveValueStreamDiagram[] List of ChildImproveValueStreamDiagram objects
     * @throws PropelException
     */
    public function getImproveValueStreamDiagrams(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collImproveValueStreamDiagramsPartial && !$this->isNew();
        if (null === $this->collImproveValueStreamDiagrams || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collImproveValueStreamDiagrams) {
                // return empty collection
                $this->initImproveValueStreamDiagrams();
            } else {
                $collImproveValueStreamDiagrams = ChildImproveValueStreamDiagramQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collImproveValueStreamDiagramsPartial && count($collImproveValueStreamDiagrams)) {
                        $this->initImproveValueStreamDiagrams(false);

                        foreach ($collImproveValueStreamDiagrams as $obj) {
                            if (false == $this->collImproveValueStreamDiagrams->contains($obj)) {
                                $this->collImproveValueStreamDiagrams->append($obj);
                            }
                        }

                        $this->collImproveValueStreamDiagramsPartial = true;
                    }

                    return $collImproveValueStreamDiagrams;
                }

                if ($partial && $this->collImproveValueStreamDiagrams) {
                    foreach ($this->collImproveValueStreamDiagrams as $obj) {
                        if ($obj->isNew()) {
                            $collImproveValueStreamDiagrams[] = $obj;
                        }
                    }
                }

                $this->collImproveValueStreamDiagrams = $collImproveValueStreamDiagrams;
                $this->collImproveValueStreamDiagramsPartial = false;
            }
        }

        return $this->collImproveValueStreamDiagrams;
    }

    /**
     * Sets a collection of ChildImproveValueStreamDiagram objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $improveValueStreamDiagrams A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setImproveValueStreamDiagrams(Collection $improveValueStreamDiagrams, ConnectionInterface $con = null)
    {
        /** @var ChildImproveValueStreamDiagram[] $improveValueStreamDiagramsToDelete */
        $improveValueStreamDiagramsToDelete = $this->getImproveValueStreamDiagrams(new Criteria(), $con)->diff($improveValueStreamDiagrams);


        $this->improveValueStreamDiagramsScheduledForDeletion = $improveValueStreamDiagramsToDelete;

        foreach ($improveValueStreamDiagramsToDelete as $improveValueStreamDiagramRemoved) {
            $improveValueStreamDiagramRemoved->setProjects(null);
        }

        $this->collImproveValueStreamDiagrams = null;
        foreach ($improveValueStreamDiagrams as $improveValueStreamDiagram) {
            $this->addImproveValueStreamDiagram($improveValueStreamDiagram);
        }

        $this->collImproveValueStreamDiagrams = $improveValueStreamDiagrams;
        $this->collImproveValueStreamDiagramsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ImproveValueStreamDiagram objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ImproveValueStreamDiagram objects.
     * @throws PropelException
     */
    public function countImproveValueStreamDiagrams(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collImproveValueStreamDiagramsPartial && !$this->isNew();
        if (null === $this->collImproveValueStreamDiagrams || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collImproveValueStreamDiagrams) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getImproveValueStreamDiagrams());
            }

            $query = ChildImproveValueStreamDiagramQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collImproveValueStreamDiagrams);
    }

    /**
     * Method called to associate a ChildImproveValueStreamDiagram object to this object
     * through the ChildImproveValueStreamDiagram foreign key attribute.
     *
     * @param  ChildImproveValueStreamDiagram $l ChildImproveValueStreamDiagram
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addImproveValueStreamDiagram(ChildImproveValueStreamDiagram $l)
    {
        if ($this->collImproveValueStreamDiagrams === null) {
            $this->initImproveValueStreamDiagrams();
            $this->collImproveValueStreamDiagramsPartial = true;
        }

        if (!$this->collImproveValueStreamDiagrams->contains($l)) {
            $this->doAddImproveValueStreamDiagram($l);

            if ($this->improveValueStreamDiagramsScheduledForDeletion and $this->improveValueStreamDiagramsScheduledForDeletion->contains($l)) {
                $this->improveValueStreamDiagramsScheduledForDeletion->remove($this->improveValueStreamDiagramsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildImproveValueStreamDiagram $improveValueStreamDiagram The ChildImproveValueStreamDiagram object to add.
     */
    protected function doAddImproveValueStreamDiagram(ChildImproveValueStreamDiagram $improveValueStreamDiagram)
    {
        $this->collImproveValueStreamDiagrams[]= $improveValueStreamDiagram;
        $improveValueStreamDiagram->setProjects($this);
    }

    /**
     * @param  ChildImproveValueStreamDiagram $improveValueStreamDiagram The ChildImproveValueStreamDiagram object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeImproveValueStreamDiagram(ChildImproveValueStreamDiagram $improveValueStreamDiagram)
    {
        if ($this->getImproveValueStreamDiagrams()->contains($improveValueStreamDiagram)) {
            $pos = $this->collImproveValueStreamDiagrams->search($improveValueStreamDiagram);
            $this->collImproveValueStreamDiagrams->remove($pos);
            if (null === $this->improveValueStreamDiagramsScheduledForDeletion) {
                $this->improveValueStreamDiagramsScheduledForDeletion = clone $this->collImproveValueStreamDiagrams;
                $this->improveValueStreamDiagramsScheduledForDeletion->clear();
            }
            $this->improveValueStreamDiagramsScheduledForDeletion[]= clone $improveValueStreamDiagram;
            $improveValueStreamDiagram->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ImproveValueStreamDiagrams from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildImproveValueStreamDiagram[] List of ChildImproveValueStreamDiagram objects
     */
    public function getImproveValueStreamDiagramsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildImproveValueStreamDiagramQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getImproveValueStreamDiagrams($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related ImproveValueStreamDiagrams from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildImproveValueStreamDiagram[] List of ChildImproveValueStreamDiagram objects
     */
    public function getImproveValueStreamDiagramsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildImproveValueStreamDiagramQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getImproveValueStreamDiagrams($query, $con);
    }

    /**
     * Clears out the collMeasureCollectionPlans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMeasureCollectionPlans()
     */
    public function clearMeasureCollectionPlans()
    {
        $this->collMeasureCollectionPlans = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMeasureCollectionPlans collection loaded partially.
     */
    public function resetPartialMeasureCollectionPlans($v = true)
    {
        $this->collMeasureCollectionPlansPartial = $v;
    }

    /**
     * Initializes the collMeasureCollectionPlans collection.
     *
     * By default this just sets the collMeasureCollectionPlans collection to an empty array (like clearcollMeasureCollectionPlans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMeasureCollectionPlans($overrideExisting = true)
    {
        if (null !== $this->collMeasureCollectionPlans && !$overrideExisting) {
            return;
        }

        $collectionClassName = MeasureCollectionPlanTableMap::getTableMap()->getCollectionClassName();

        $this->collMeasureCollectionPlans = new $collectionClassName;
        $this->collMeasureCollectionPlans->setModel('\MeasureCollectionPlan');
    }

    /**
     * Gets an array of ChildMeasureCollectionPlan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMeasureCollectionPlan[] List of ChildMeasureCollectionPlan objects
     * @throws PropelException
     */
    public function getMeasureCollectionPlans(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureCollectionPlansPartial && !$this->isNew();
        if (null === $this->collMeasureCollectionPlans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMeasureCollectionPlans) {
                // return empty collection
                $this->initMeasureCollectionPlans();
            } else {
                $collMeasureCollectionPlans = ChildMeasureCollectionPlanQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMeasureCollectionPlansPartial && count($collMeasureCollectionPlans)) {
                        $this->initMeasureCollectionPlans(false);

                        foreach ($collMeasureCollectionPlans as $obj) {
                            if (false == $this->collMeasureCollectionPlans->contains($obj)) {
                                $this->collMeasureCollectionPlans->append($obj);
                            }
                        }

                        $this->collMeasureCollectionPlansPartial = true;
                    }

                    return $collMeasureCollectionPlans;
                }

                if ($partial && $this->collMeasureCollectionPlans) {
                    foreach ($this->collMeasureCollectionPlans as $obj) {
                        if ($obj->isNew()) {
                            $collMeasureCollectionPlans[] = $obj;
                        }
                    }
                }

                $this->collMeasureCollectionPlans = $collMeasureCollectionPlans;
                $this->collMeasureCollectionPlansPartial = false;
            }
        }

        return $this->collMeasureCollectionPlans;
    }

    /**
     * Sets a collection of ChildMeasureCollectionPlan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $measureCollectionPlans A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setMeasureCollectionPlans(Collection $measureCollectionPlans, ConnectionInterface $con = null)
    {
        /** @var ChildMeasureCollectionPlan[] $measureCollectionPlansToDelete */
        $measureCollectionPlansToDelete = $this->getMeasureCollectionPlans(new Criteria(), $con)->diff($measureCollectionPlans);


        $this->measureCollectionPlansScheduledForDeletion = $measureCollectionPlansToDelete;

        foreach ($measureCollectionPlansToDelete as $measureCollectionPlanRemoved) {
            $measureCollectionPlanRemoved->setProjects(null);
        }

        $this->collMeasureCollectionPlans = null;
        foreach ($measureCollectionPlans as $measureCollectionPlan) {
            $this->addMeasureCollectionPlan($measureCollectionPlan);
        }

        $this->collMeasureCollectionPlans = $measureCollectionPlans;
        $this->collMeasureCollectionPlansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MeasureCollectionPlan objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MeasureCollectionPlan objects.
     * @throws PropelException
     */
    public function countMeasureCollectionPlans(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureCollectionPlansPartial && !$this->isNew();
        if (null === $this->collMeasureCollectionPlans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMeasureCollectionPlans) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMeasureCollectionPlans());
            }

            $query = ChildMeasureCollectionPlanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collMeasureCollectionPlans);
    }

    /**
     * Method called to associate a ChildMeasureCollectionPlan object to this object
     * through the ChildMeasureCollectionPlan foreign key attribute.
     *
     * @param  ChildMeasureCollectionPlan $l ChildMeasureCollectionPlan
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addMeasureCollectionPlan(ChildMeasureCollectionPlan $l)
    {
        if ($this->collMeasureCollectionPlans === null) {
            $this->initMeasureCollectionPlans();
            $this->collMeasureCollectionPlansPartial = true;
        }

        if (!$this->collMeasureCollectionPlans->contains($l)) {
            $this->doAddMeasureCollectionPlan($l);

            if ($this->measureCollectionPlansScheduledForDeletion and $this->measureCollectionPlansScheduledForDeletion->contains($l)) {
                $this->measureCollectionPlansScheduledForDeletion->remove($this->measureCollectionPlansScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMeasureCollectionPlan $measureCollectionPlan The ChildMeasureCollectionPlan object to add.
     */
    protected function doAddMeasureCollectionPlan(ChildMeasureCollectionPlan $measureCollectionPlan)
    {
        $this->collMeasureCollectionPlans[]= $measureCollectionPlan;
        $measureCollectionPlan->setProjects($this);
    }

    /**
     * @param  ChildMeasureCollectionPlan $measureCollectionPlan The ChildMeasureCollectionPlan object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeMeasureCollectionPlan(ChildMeasureCollectionPlan $measureCollectionPlan)
    {
        if ($this->getMeasureCollectionPlans()->contains($measureCollectionPlan)) {
            $pos = $this->collMeasureCollectionPlans->search($measureCollectionPlan);
            $this->collMeasureCollectionPlans->remove($pos);
            if (null === $this->measureCollectionPlansScheduledForDeletion) {
                $this->measureCollectionPlansScheduledForDeletion = clone $this->collMeasureCollectionPlans;
                $this->measureCollectionPlansScheduledForDeletion->clear();
            }
            $this->measureCollectionPlansScheduledForDeletion[]= clone $measureCollectionPlan;
            $measureCollectionPlan->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureCollectionPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureCollectionPlan[] List of ChildMeasureCollectionPlan objects
     */
    public function getMeasureCollectionPlansJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureCollectionPlanQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getMeasureCollectionPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureCollectionPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureCollectionPlan[] List of ChildMeasureCollectionPlan objects
     */
    public function getMeasureCollectionPlansJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureCollectionPlanQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getMeasureCollectionPlans($query, $con);
    }

    /**
     * Clears out the collMeasureControlPlans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMeasureControlPlans()
     */
    public function clearMeasureControlPlans()
    {
        $this->collMeasureControlPlans = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMeasureControlPlans collection loaded partially.
     */
    public function resetPartialMeasureControlPlans($v = true)
    {
        $this->collMeasureControlPlansPartial = $v;
    }

    /**
     * Initializes the collMeasureControlPlans collection.
     *
     * By default this just sets the collMeasureControlPlans collection to an empty array (like clearcollMeasureControlPlans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMeasureControlPlans($overrideExisting = true)
    {
        if (null !== $this->collMeasureControlPlans && !$overrideExisting) {
            return;
        }

        $collectionClassName = MeasureControlPlanTableMap::getTableMap()->getCollectionClassName();

        $this->collMeasureControlPlans = new $collectionClassName;
        $this->collMeasureControlPlans->setModel('\MeasureControlPlan');
    }

    /**
     * Gets an array of ChildMeasureControlPlan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMeasureControlPlan[] List of ChildMeasureControlPlan objects
     * @throws PropelException
     */
    public function getMeasureControlPlans(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureControlPlansPartial && !$this->isNew();
        if (null === $this->collMeasureControlPlans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMeasureControlPlans) {
                // return empty collection
                $this->initMeasureControlPlans();
            } else {
                $collMeasureControlPlans = ChildMeasureControlPlanQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMeasureControlPlansPartial && count($collMeasureControlPlans)) {
                        $this->initMeasureControlPlans(false);

                        foreach ($collMeasureControlPlans as $obj) {
                            if (false == $this->collMeasureControlPlans->contains($obj)) {
                                $this->collMeasureControlPlans->append($obj);
                            }
                        }

                        $this->collMeasureControlPlansPartial = true;
                    }

                    return $collMeasureControlPlans;
                }

                if ($partial && $this->collMeasureControlPlans) {
                    foreach ($this->collMeasureControlPlans as $obj) {
                        if ($obj->isNew()) {
                            $collMeasureControlPlans[] = $obj;
                        }
                    }
                }

                $this->collMeasureControlPlans = $collMeasureControlPlans;
                $this->collMeasureControlPlansPartial = false;
            }
        }

        return $this->collMeasureControlPlans;
    }

    /**
     * Sets a collection of ChildMeasureControlPlan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $measureControlPlans A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setMeasureControlPlans(Collection $measureControlPlans, ConnectionInterface $con = null)
    {
        /** @var ChildMeasureControlPlan[] $measureControlPlansToDelete */
        $measureControlPlansToDelete = $this->getMeasureControlPlans(new Criteria(), $con)->diff($measureControlPlans);


        $this->measureControlPlansScheduledForDeletion = $measureControlPlansToDelete;

        foreach ($measureControlPlansToDelete as $measureControlPlanRemoved) {
            $measureControlPlanRemoved->setProjects(null);
        }

        $this->collMeasureControlPlans = null;
        foreach ($measureControlPlans as $measureControlPlan) {
            $this->addMeasureControlPlan($measureControlPlan);
        }

        $this->collMeasureControlPlans = $measureControlPlans;
        $this->collMeasureControlPlansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MeasureControlPlan objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MeasureControlPlan objects.
     * @throws PropelException
     */
    public function countMeasureControlPlans(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureControlPlansPartial && !$this->isNew();
        if (null === $this->collMeasureControlPlans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMeasureControlPlans) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMeasureControlPlans());
            }

            $query = ChildMeasureControlPlanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collMeasureControlPlans);
    }

    /**
     * Method called to associate a ChildMeasureControlPlan object to this object
     * through the ChildMeasureControlPlan foreign key attribute.
     *
     * @param  ChildMeasureControlPlan $l ChildMeasureControlPlan
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addMeasureControlPlan(ChildMeasureControlPlan $l)
    {
        if ($this->collMeasureControlPlans === null) {
            $this->initMeasureControlPlans();
            $this->collMeasureControlPlansPartial = true;
        }

        if (!$this->collMeasureControlPlans->contains($l)) {
            $this->doAddMeasureControlPlan($l);

            if ($this->measureControlPlansScheduledForDeletion and $this->measureControlPlansScheduledForDeletion->contains($l)) {
                $this->measureControlPlansScheduledForDeletion->remove($this->measureControlPlansScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMeasureControlPlan $measureControlPlan The ChildMeasureControlPlan object to add.
     */
    protected function doAddMeasureControlPlan(ChildMeasureControlPlan $measureControlPlan)
    {
        $this->collMeasureControlPlans[]= $measureControlPlan;
        $measureControlPlan->setProjects($this);
    }

    /**
     * @param  ChildMeasureControlPlan $measureControlPlan The ChildMeasureControlPlan object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeMeasureControlPlan(ChildMeasureControlPlan $measureControlPlan)
    {
        if ($this->getMeasureControlPlans()->contains($measureControlPlan)) {
            $pos = $this->collMeasureControlPlans->search($measureControlPlan);
            $this->collMeasureControlPlans->remove($pos);
            if (null === $this->measureControlPlansScheduledForDeletion) {
                $this->measureControlPlansScheduledForDeletion = clone $this->collMeasureControlPlans;
                $this->measureControlPlansScheduledForDeletion->clear();
            }
            $this->measureControlPlansScheduledForDeletion[]= clone $measureControlPlan;
            $measureControlPlan->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureControlPlan[] List of ChildMeasureControlPlan objects
     */
    public function getMeasureControlPlansJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureControlPlanQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getMeasureControlPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureControlPlan[] List of ChildMeasureControlPlan objects
     */
    public function getMeasureControlPlansJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureControlPlanQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getMeasureControlPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureControlPlan[] List of ChildMeasureControlPlan objects
     */
    public function getMeasureControlPlansJoinUsers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureControlPlanQuery::create(null, $criteria);
        $query->joinWith('Users', $joinBehavior);

        return $this->getMeasureControlPlans($query, $con);
    }

    /**
     * Clears out the collMeasureGateReviews collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMeasureGateReviews()
     */
    public function clearMeasureGateReviews()
    {
        $this->collMeasureGateReviews = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMeasureGateReviews collection loaded partially.
     */
    public function resetPartialMeasureGateReviews($v = true)
    {
        $this->collMeasureGateReviewsPartial = $v;
    }

    /**
     * Initializes the collMeasureGateReviews collection.
     *
     * By default this just sets the collMeasureGateReviews collection to an empty array (like clearcollMeasureGateReviews());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMeasureGateReviews($overrideExisting = true)
    {
        if (null !== $this->collMeasureGateReviews && !$overrideExisting) {
            return;
        }

        $collectionClassName = MeasureGateReviewTableMap::getTableMap()->getCollectionClassName();

        $this->collMeasureGateReviews = new $collectionClassName;
        $this->collMeasureGateReviews->setModel('\MeasureGateReview');
    }

    /**
     * Gets an array of ChildMeasureGateReview objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMeasureGateReview[] List of ChildMeasureGateReview objects
     * @throws PropelException
     */
    public function getMeasureGateReviews(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureGateReviewsPartial && !$this->isNew();
        if (null === $this->collMeasureGateReviews || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMeasureGateReviews) {
                // return empty collection
                $this->initMeasureGateReviews();
            } else {
                $collMeasureGateReviews = ChildMeasureGateReviewQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMeasureGateReviewsPartial && count($collMeasureGateReviews)) {
                        $this->initMeasureGateReviews(false);

                        foreach ($collMeasureGateReviews as $obj) {
                            if (false == $this->collMeasureGateReviews->contains($obj)) {
                                $this->collMeasureGateReviews->append($obj);
                            }
                        }

                        $this->collMeasureGateReviewsPartial = true;
                    }

                    return $collMeasureGateReviews;
                }

                if ($partial && $this->collMeasureGateReviews) {
                    foreach ($this->collMeasureGateReviews as $obj) {
                        if ($obj->isNew()) {
                            $collMeasureGateReviews[] = $obj;
                        }
                    }
                }

                $this->collMeasureGateReviews = $collMeasureGateReviews;
                $this->collMeasureGateReviewsPartial = false;
            }
        }

        return $this->collMeasureGateReviews;
    }

    /**
     * Sets a collection of ChildMeasureGateReview objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $measureGateReviews A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setMeasureGateReviews(Collection $measureGateReviews, ConnectionInterface $con = null)
    {
        /** @var ChildMeasureGateReview[] $measureGateReviewsToDelete */
        $measureGateReviewsToDelete = $this->getMeasureGateReviews(new Criteria(), $con)->diff($measureGateReviews);


        $this->measureGateReviewsScheduledForDeletion = $measureGateReviewsToDelete;

        foreach ($measureGateReviewsToDelete as $measureGateReviewRemoved) {
            $measureGateReviewRemoved->setProjects(null);
        }

        $this->collMeasureGateReviews = null;
        foreach ($measureGateReviews as $measureGateReview) {
            $this->addMeasureGateReview($measureGateReview);
        }

        $this->collMeasureGateReviews = $measureGateReviews;
        $this->collMeasureGateReviewsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MeasureGateReview objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MeasureGateReview objects.
     * @throws PropelException
     */
    public function countMeasureGateReviews(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureGateReviewsPartial && !$this->isNew();
        if (null === $this->collMeasureGateReviews || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMeasureGateReviews) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMeasureGateReviews());
            }

            $query = ChildMeasureGateReviewQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collMeasureGateReviews);
    }

    /**
     * Method called to associate a ChildMeasureGateReview object to this object
     * through the ChildMeasureGateReview foreign key attribute.
     *
     * @param  ChildMeasureGateReview $l ChildMeasureGateReview
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addMeasureGateReview(ChildMeasureGateReview $l)
    {
        if ($this->collMeasureGateReviews === null) {
            $this->initMeasureGateReviews();
            $this->collMeasureGateReviewsPartial = true;
        }

        if (!$this->collMeasureGateReviews->contains($l)) {
            $this->doAddMeasureGateReview($l);

            if ($this->measureGateReviewsScheduledForDeletion and $this->measureGateReviewsScheduledForDeletion->contains($l)) {
                $this->measureGateReviewsScheduledForDeletion->remove($this->measureGateReviewsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMeasureGateReview $measureGateReview The ChildMeasureGateReview object to add.
     */
    protected function doAddMeasureGateReview(ChildMeasureGateReview $measureGateReview)
    {
        $this->collMeasureGateReviews[]= $measureGateReview;
        $measureGateReview->setProjects($this);
    }

    /**
     * @param  ChildMeasureGateReview $measureGateReview The ChildMeasureGateReview object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeMeasureGateReview(ChildMeasureGateReview $measureGateReview)
    {
        if ($this->getMeasureGateReviews()->contains($measureGateReview)) {
            $pos = $this->collMeasureGateReviews->search($measureGateReview);
            $this->collMeasureGateReviews->remove($pos);
            if (null === $this->measureGateReviewsScheduledForDeletion) {
                $this->measureGateReviewsScheduledForDeletion = clone $this->collMeasureGateReviews;
                $this->measureGateReviewsScheduledForDeletion->clear();
            }
            $this->measureGateReviewsScheduledForDeletion[]= clone $measureGateReview;
            $measureGateReview->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureGateReview[] List of ChildMeasureGateReview objects
     */
    public function getMeasureGateReviewsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureGateReviewQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getMeasureGateReviews($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureGateReviews from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureGateReview[] List of ChildMeasureGateReview objects
     */
    public function getMeasureGateReviewsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureGateReviewQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getMeasureGateReviews($query, $con);
    }

    /**
     * Clears out the collMeasureNonvalueAnalyses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMeasureNonvalueAnalyses()
     */
    public function clearMeasureNonvalueAnalyses()
    {
        $this->collMeasureNonvalueAnalyses = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMeasureNonvalueAnalyses collection loaded partially.
     */
    public function resetPartialMeasureNonvalueAnalyses($v = true)
    {
        $this->collMeasureNonvalueAnalysesPartial = $v;
    }

    /**
     * Initializes the collMeasureNonvalueAnalyses collection.
     *
     * By default this just sets the collMeasureNonvalueAnalyses collection to an empty array (like clearcollMeasureNonvalueAnalyses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMeasureNonvalueAnalyses($overrideExisting = true)
    {
        if (null !== $this->collMeasureNonvalueAnalyses && !$overrideExisting) {
            return;
        }

        $collectionClassName = MeasureNonvalueAnalysisTableMap::getTableMap()->getCollectionClassName();

        $this->collMeasureNonvalueAnalyses = new $collectionClassName;
        $this->collMeasureNonvalueAnalyses->setModel('\MeasureNonvalueAnalysis');
    }

    /**
     * Gets an array of ChildMeasureNonvalueAnalysis objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMeasureNonvalueAnalysis[] List of ChildMeasureNonvalueAnalysis objects
     * @throws PropelException
     */
    public function getMeasureNonvalueAnalyses(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureNonvalueAnalysesPartial && !$this->isNew();
        if (null === $this->collMeasureNonvalueAnalyses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMeasureNonvalueAnalyses) {
                // return empty collection
                $this->initMeasureNonvalueAnalyses();
            } else {
                $collMeasureNonvalueAnalyses = ChildMeasureNonvalueAnalysisQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMeasureNonvalueAnalysesPartial && count($collMeasureNonvalueAnalyses)) {
                        $this->initMeasureNonvalueAnalyses(false);

                        foreach ($collMeasureNonvalueAnalyses as $obj) {
                            if (false == $this->collMeasureNonvalueAnalyses->contains($obj)) {
                                $this->collMeasureNonvalueAnalyses->append($obj);
                            }
                        }

                        $this->collMeasureNonvalueAnalysesPartial = true;
                    }

                    return $collMeasureNonvalueAnalyses;
                }

                if ($partial && $this->collMeasureNonvalueAnalyses) {
                    foreach ($this->collMeasureNonvalueAnalyses as $obj) {
                        if ($obj->isNew()) {
                            $collMeasureNonvalueAnalyses[] = $obj;
                        }
                    }
                }

                $this->collMeasureNonvalueAnalyses = $collMeasureNonvalueAnalyses;
                $this->collMeasureNonvalueAnalysesPartial = false;
            }
        }

        return $this->collMeasureNonvalueAnalyses;
    }

    /**
     * Sets a collection of ChildMeasureNonvalueAnalysis objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $measureNonvalueAnalyses A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setMeasureNonvalueAnalyses(Collection $measureNonvalueAnalyses, ConnectionInterface $con = null)
    {
        /** @var ChildMeasureNonvalueAnalysis[] $measureNonvalueAnalysesToDelete */
        $measureNonvalueAnalysesToDelete = $this->getMeasureNonvalueAnalyses(new Criteria(), $con)->diff($measureNonvalueAnalyses);


        $this->measureNonvalueAnalysesScheduledForDeletion = $measureNonvalueAnalysesToDelete;

        foreach ($measureNonvalueAnalysesToDelete as $measureNonvalueAnalysisRemoved) {
            $measureNonvalueAnalysisRemoved->setProjects(null);
        }

        $this->collMeasureNonvalueAnalyses = null;
        foreach ($measureNonvalueAnalyses as $measureNonvalueAnalysis) {
            $this->addMeasureNonvalueAnalysis($measureNonvalueAnalysis);
        }

        $this->collMeasureNonvalueAnalyses = $measureNonvalueAnalyses;
        $this->collMeasureNonvalueAnalysesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MeasureNonvalueAnalysis objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MeasureNonvalueAnalysis objects.
     * @throws PropelException
     */
    public function countMeasureNonvalueAnalyses(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureNonvalueAnalysesPartial && !$this->isNew();
        if (null === $this->collMeasureNonvalueAnalyses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMeasureNonvalueAnalyses) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMeasureNonvalueAnalyses());
            }

            $query = ChildMeasureNonvalueAnalysisQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collMeasureNonvalueAnalyses);
    }

    /**
     * Method called to associate a ChildMeasureNonvalueAnalysis object to this object
     * through the ChildMeasureNonvalueAnalysis foreign key attribute.
     *
     * @param  ChildMeasureNonvalueAnalysis $l ChildMeasureNonvalueAnalysis
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addMeasureNonvalueAnalysis(ChildMeasureNonvalueAnalysis $l)
    {
        if ($this->collMeasureNonvalueAnalyses === null) {
            $this->initMeasureNonvalueAnalyses();
            $this->collMeasureNonvalueAnalysesPartial = true;
        }

        if (!$this->collMeasureNonvalueAnalyses->contains($l)) {
            $this->doAddMeasureNonvalueAnalysis($l);

            if ($this->measureNonvalueAnalysesScheduledForDeletion and $this->measureNonvalueAnalysesScheduledForDeletion->contains($l)) {
                $this->measureNonvalueAnalysesScheduledForDeletion->remove($this->measureNonvalueAnalysesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMeasureNonvalueAnalysis $measureNonvalueAnalysis The ChildMeasureNonvalueAnalysis object to add.
     */
    protected function doAddMeasureNonvalueAnalysis(ChildMeasureNonvalueAnalysis $measureNonvalueAnalysis)
    {
        $this->collMeasureNonvalueAnalyses[]= $measureNonvalueAnalysis;
        $measureNonvalueAnalysis->setProjects($this);
    }

    /**
     * @param  ChildMeasureNonvalueAnalysis $measureNonvalueAnalysis The ChildMeasureNonvalueAnalysis object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeMeasureNonvalueAnalysis(ChildMeasureNonvalueAnalysis $measureNonvalueAnalysis)
    {
        if ($this->getMeasureNonvalueAnalyses()->contains($measureNonvalueAnalysis)) {
            $pos = $this->collMeasureNonvalueAnalyses->search($measureNonvalueAnalysis);
            $this->collMeasureNonvalueAnalyses->remove($pos);
            if (null === $this->measureNonvalueAnalysesScheduledForDeletion) {
                $this->measureNonvalueAnalysesScheduledForDeletion = clone $this->collMeasureNonvalueAnalyses;
                $this->measureNonvalueAnalysesScheduledForDeletion->clear();
            }
            $this->measureNonvalueAnalysesScheduledForDeletion[]= clone $measureNonvalueAnalysis;
            $measureNonvalueAnalysis->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureNonvalueAnalyses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureNonvalueAnalysis[] List of ChildMeasureNonvalueAnalysis objects
     */
    public function getMeasureNonvalueAnalysesJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureNonvalueAnalysisQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getMeasureNonvalueAnalyses($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureNonvalueAnalyses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureNonvalueAnalysis[] List of ChildMeasureNonvalueAnalysis objects
     */
    public function getMeasureNonvalueAnalysesJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureNonvalueAnalysisQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getMeasureNonvalueAnalyses($query, $con);
    }

    /**
     * Clears out the collMeasureValueStreamDiagrams collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addMeasureValueStreamDiagrams()
     */
    public function clearMeasureValueStreamDiagrams()
    {
        $this->collMeasureValueStreamDiagrams = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collMeasureValueStreamDiagrams collection loaded partially.
     */
    public function resetPartialMeasureValueStreamDiagrams($v = true)
    {
        $this->collMeasureValueStreamDiagramsPartial = $v;
    }

    /**
     * Initializes the collMeasureValueStreamDiagrams collection.
     *
     * By default this just sets the collMeasureValueStreamDiagrams collection to an empty array (like clearcollMeasureValueStreamDiagrams());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMeasureValueStreamDiagrams($overrideExisting = true)
    {
        if (null !== $this->collMeasureValueStreamDiagrams && !$overrideExisting) {
            return;
        }

        $collectionClassName = MeasureValueStreamDiagramTableMap::getTableMap()->getCollectionClassName();

        $this->collMeasureValueStreamDiagrams = new $collectionClassName;
        $this->collMeasureValueStreamDiagrams->setModel('\MeasureValueStreamDiagram');
    }

    /**
     * Gets an array of ChildMeasureValueStreamDiagram objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildMeasureValueStreamDiagram[] List of ChildMeasureValueStreamDiagram objects
     * @throws PropelException
     */
    public function getMeasureValueStreamDiagrams(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureValueStreamDiagramsPartial && !$this->isNew();
        if (null === $this->collMeasureValueStreamDiagrams || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMeasureValueStreamDiagrams) {
                // return empty collection
                $this->initMeasureValueStreamDiagrams();
            } else {
                $collMeasureValueStreamDiagrams = ChildMeasureValueStreamDiagramQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collMeasureValueStreamDiagramsPartial && count($collMeasureValueStreamDiagrams)) {
                        $this->initMeasureValueStreamDiagrams(false);

                        foreach ($collMeasureValueStreamDiagrams as $obj) {
                            if (false == $this->collMeasureValueStreamDiagrams->contains($obj)) {
                                $this->collMeasureValueStreamDiagrams->append($obj);
                            }
                        }

                        $this->collMeasureValueStreamDiagramsPartial = true;
                    }

                    return $collMeasureValueStreamDiagrams;
                }

                if ($partial && $this->collMeasureValueStreamDiagrams) {
                    foreach ($this->collMeasureValueStreamDiagrams as $obj) {
                        if ($obj->isNew()) {
                            $collMeasureValueStreamDiagrams[] = $obj;
                        }
                    }
                }

                $this->collMeasureValueStreamDiagrams = $collMeasureValueStreamDiagrams;
                $this->collMeasureValueStreamDiagramsPartial = false;
            }
        }

        return $this->collMeasureValueStreamDiagrams;
    }

    /**
     * Sets a collection of ChildMeasureValueStreamDiagram objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $measureValueStreamDiagrams A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setMeasureValueStreamDiagrams(Collection $measureValueStreamDiagrams, ConnectionInterface $con = null)
    {
        /** @var ChildMeasureValueStreamDiagram[] $measureValueStreamDiagramsToDelete */
        $measureValueStreamDiagramsToDelete = $this->getMeasureValueStreamDiagrams(new Criteria(), $con)->diff($measureValueStreamDiagrams);


        $this->measureValueStreamDiagramsScheduledForDeletion = $measureValueStreamDiagramsToDelete;

        foreach ($measureValueStreamDiagramsToDelete as $measureValueStreamDiagramRemoved) {
            $measureValueStreamDiagramRemoved->setProjects(null);
        }

        $this->collMeasureValueStreamDiagrams = null;
        foreach ($measureValueStreamDiagrams as $measureValueStreamDiagram) {
            $this->addMeasureValueStreamDiagram($measureValueStreamDiagram);
        }

        $this->collMeasureValueStreamDiagrams = $measureValueStreamDiagrams;
        $this->collMeasureValueStreamDiagramsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MeasureValueStreamDiagram objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related MeasureValueStreamDiagram objects.
     * @throws PropelException
     */
    public function countMeasureValueStreamDiagrams(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collMeasureValueStreamDiagramsPartial && !$this->isNew();
        if (null === $this->collMeasureValueStreamDiagrams || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMeasureValueStreamDiagrams) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getMeasureValueStreamDiagrams());
            }

            $query = ChildMeasureValueStreamDiagramQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collMeasureValueStreamDiagrams);
    }

    /**
     * Method called to associate a ChildMeasureValueStreamDiagram object to this object
     * through the ChildMeasureValueStreamDiagram foreign key attribute.
     *
     * @param  ChildMeasureValueStreamDiagram $l ChildMeasureValueStreamDiagram
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addMeasureValueStreamDiagram(ChildMeasureValueStreamDiagram $l)
    {
        if ($this->collMeasureValueStreamDiagrams === null) {
            $this->initMeasureValueStreamDiagrams();
            $this->collMeasureValueStreamDiagramsPartial = true;
        }

        if (!$this->collMeasureValueStreamDiagrams->contains($l)) {
            $this->doAddMeasureValueStreamDiagram($l);

            if ($this->measureValueStreamDiagramsScheduledForDeletion and $this->measureValueStreamDiagramsScheduledForDeletion->contains($l)) {
                $this->measureValueStreamDiagramsScheduledForDeletion->remove($this->measureValueStreamDiagramsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildMeasureValueStreamDiagram $measureValueStreamDiagram The ChildMeasureValueStreamDiagram object to add.
     */
    protected function doAddMeasureValueStreamDiagram(ChildMeasureValueStreamDiagram $measureValueStreamDiagram)
    {
        $this->collMeasureValueStreamDiagrams[]= $measureValueStreamDiagram;
        $measureValueStreamDiagram->setProjects($this);
    }

    /**
     * @param  ChildMeasureValueStreamDiagram $measureValueStreamDiagram The ChildMeasureValueStreamDiagram object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeMeasureValueStreamDiagram(ChildMeasureValueStreamDiagram $measureValueStreamDiagram)
    {
        if ($this->getMeasureValueStreamDiagrams()->contains($measureValueStreamDiagram)) {
            $pos = $this->collMeasureValueStreamDiagrams->search($measureValueStreamDiagram);
            $this->collMeasureValueStreamDiagrams->remove($pos);
            if (null === $this->measureValueStreamDiagramsScheduledForDeletion) {
                $this->measureValueStreamDiagramsScheduledForDeletion = clone $this->collMeasureValueStreamDiagrams;
                $this->measureValueStreamDiagramsScheduledForDeletion->clear();
            }
            $this->measureValueStreamDiagramsScheduledForDeletion[]= clone $measureValueStreamDiagram;
            $measureValueStreamDiagram->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureValueStreamDiagrams from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureValueStreamDiagram[] List of ChildMeasureValueStreamDiagram objects
     */
    public function getMeasureValueStreamDiagramsJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureValueStreamDiagramQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getMeasureValueStreamDiagrams($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related MeasureValueStreamDiagrams from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureValueStreamDiagram[] List of ChildMeasureValueStreamDiagram objects
     */
    public function getMeasureValueStreamDiagramsJoinPhaseComponents(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureValueStreamDiagramQuery::create(null, $criteria);
        $query->joinWith('PhaseComponents', $joinBehavior);

        return $this->getMeasureValueStreamDiagrams($query, $con);
    }

    /**
     * Clears out the collPhaseComponentss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPhaseComponentss()
     */
    public function clearPhaseComponentss()
    {
        $this->collPhaseComponentss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPhaseComponentss collection loaded partially.
     */
    public function resetPartialPhaseComponentss($v = true)
    {
        $this->collPhaseComponentssPartial = $v;
    }

    /**
     * Initializes the collPhaseComponentss collection.
     *
     * By default this just sets the collPhaseComponentss collection to an empty array (like clearcollPhaseComponentss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPhaseComponentss($overrideExisting = true)
    {
        if (null !== $this->collPhaseComponentss && !$overrideExisting) {
            return;
        }

        $collectionClassName = PhaseComponentsTableMap::getTableMap()->getCollectionClassName();

        $this->collPhaseComponentss = new $collectionClassName;
        $this->collPhaseComponentss->setModel('\PhaseComponents');
    }

    /**
     * Gets an array of ChildPhaseComponents objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPhaseComponents[] List of ChildPhaseComponents objects
     * @throws PropelException
     */
    public function getPhaseComponentss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPhaseComponentssPartial && !$this->isNew();
        if (null === $this->collPhaseComponentss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPhaseComponentss) {
                // return empty collection
                $this->initPhaseComponentss();
            } else {
                $collPhaseComponentss = ChildPhaseComponentsQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPhaseComponentssPartial && count($collPhaseComponentss)) {
                        $this->initPhaseComponentss(false);

                        foreach ($collPhaseComponentss as $obj) {
                            if (false == $this->collPhaseComponentss->contains($obj)) {
                                $this->collPhaseComponentss->append($obj);
                            }
                        }

                        $this->collPhaseComponentssPartial = true;
                    }

                    return $collPhaseComponentss;
                }

                if ($partial && $this->collPhaseComponentss) {
                    foreach ($this->collPhaseComponentss as $obj) {
                        if ($obj->isNew()) {
                            $collPhaseComponentss[] = $obj;
                        }
                    }
                }

                $this->collPhaseComponentss = $collPhaseComponentss;
                $this->collPhaseComponentssPartial = false;
            }
        }

        return $this->collPhaseComponentss;
    }

    /**
     * Sets a collection of ChildPhaseComponents objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $phaseComponentss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setPhaseComponentss(Collection $phaseComponentss, ConnectionInterface $con = null)
    {
        /** @var ChildPhaseComponents[] $phaseComponentssToDelete */
        $phaseComponentssToDelete = $this->getPhaseComponentss(new Criteria(), $con)->diff($phaseComponentss);


        $this->phaseComponentssScheduledForDeletion = $phaseComponentssToDelete;

        foreach ($phaseComponentssToDelete as $phaseComponentsRemoved) {
            $phaseComponentsRemoved->setProjects(null);
        }

        $this->collPhaseComponentss = null;
        foreach ($phaseComponentss as $phaseComponents) {
            $this->addPhaseComponents($phaseComponents);
        }

        $this->collPhaseComponentss = $phaseComponentss;
        $this->collPhaseComponentssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PhaseComponents objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PhaseComponents objects.
     * @throws PropelException
     */
    public function countPhaseComponentss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPhaseComponentssPartial && !$this->isNew();
        if (null === $this->collPhaseComponentss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPhaseComponentss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPhaseComponentss());
            }

            $query = ChildPhaseComponentsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collPhaseComponentss);
    }

    /**
     * Method called to associate a ChildPhaseComponents object to this object
     * through the ChildPhaseComponents foreign key attribute.
     *
     * @param  ChildPhaseComponents $l ChildPhaseComponents
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addPhaseComponents(ChildPhaseComponents $l)
    {
        if ($this->collPhaseComponentss === null) {
            $this->initPhaseComponentss();
            $this->collPhaseComponentssPartial = true;
        }

        if (!$this->collPhaseComponentss->contains($l)) {
            $this->doAddPhaseComponents($l);

            if ($this->phaseComponentssScheduledForDeletion and $this->phaseComponentssScheduledForDeletion->contains($l)) {
                $this->phaseComponentssScheduledForDeletion->remove($this->phaseComponentssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPhaseComponents $phaseComponents The ChildPhaseComponents object to add.
     */
    protected function doAddPhaseComponents(ChildPhaseComponents $phaseComponents)
    {
        $this->collPhaseComponentss[]= $phaseComponents;
        $phaseComponents->setProjects($this);
    }

    /**
     * @param  ChildPhaseComponents $phaseComponents The ChildPhaseComponents object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removePhaseComponents(ChildPhaseComponents $phaseComponents)
    {
        if ($this->getPhaseComponentss()->contains($phaseComponents)) {
            $pos = $this->collPhaseComponentss->search($phaseComponents);
            $this->collPhaseComponentss->remove($pos);
            if (null === $this->phaseComponentssScheduledForDeletion) {
                $this->phaseComponentssScheduledForDeletion = clone $this->collPhaseComponentss;
                $this->phaseComponentssScheduledForDeletion->clear();
            }
            $this->phaseComponentssScheduledForDeletion[]= clone $phaseComponents;
            $phaseComponents->setProjects(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Projects is new, it will return
     * an empty collection; or if this Projects has previously
     * been saved, it will retrieve related PhaseComponentss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Projects.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPhaseComponents[] List of ChildPhaseComponents objects
     */
    public function getPhaseComponentssJoinProjectPhases(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPhaseComponentsQuery::create(null, $criteria);
        $query->joinWith('ProjectPhases', $joinBehavior);

        return $this->getPhaseComponentss($query, $con);
    }

    /**
     * Clears out the collProjectPhasess collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProjectPhasess()
     */
    public function clearProjectPhasess()
    {
        $this->collProjectPhasess = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProjectPhasess collection loaded partially.
     */
    public function resetPartialProjectPhasess($v = true)
    {
        $this->collProjectPhasessPartial = $v;
    }

    /**
     * Initializes the collProjectPhasess collection.
     *
     * By default this just sets the collProjectPhasess collection to an empty array (like clearcollProjectPhasess());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectPhasess($overrideExisting = true)
    {
        if (null !== $this->collProjectPhasess && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProjectPhasesTableMap::getTableMap()->getCollectionClassName();

        $this->collProjectPhasess = new $collectionClassName;
        $this->collProjectPhasess->setModel('\ProjectPhases');
    }

    /**
     * Gets an array of ChildProjectPhases objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildProjects is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProjectPhases[] List of ChildProjectPhases objects
     * @throws PropelException
     */
    public function getProjectPhasess(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectPhasessPartial && !$this->isNew();
        if (null === $this->collProjectPhasess || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectPhasess) {
                // return empty collection
                $this->initProjectPhasess();
            } else {
                $collProjectPhasess = ChildProjectPhasesQuery::create(null, $criteria)
                    ->filterByProjects($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProjectPhasessPartial && count($collProjectPhasess)) {
                        $this->initProjectPhasess(false);

                        foreach ($collProjectPhasess as $obj) {
                            if (false == $this->collProjectPhasess->contains($obj)) {
                                $this->collProjectPhasess->append($obj);
                            }
                        }

                        $this->collProjectPhasessPartial = true;
                    }

                    return $collProjectPhasess;
                }

                if ($partial && $this->collProjectPhasess) {
                    foreach ($this->collProjectPhasess as $obj) {
                        if ($obj->isNew()) {
                            $collProjectPhasess[] = $obj;
                        }
                    }
                }

                $this->collProjectPhasess = $collProjectPhasess;
                $this->collProjectPhasessPartial = false;
            }
        }

        return $this->collProjectPhasess;
    }

    /**
     * Sets a collection of ChildProjectPhases objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $projectPhasess A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function setProjectPhasess(Collection $projectPhasess, ConnectionInterface $con = null)
    {
        /** @var ChildProjectPhases[] $projectPhasessToDelete */
        $projectPhasessToDelete = $this->getProjectPhasess(new Criteria(), $con)->diff($projectPhasess);


        $this->projectPhasessScheduledForDeletion = $projectPhasessToDelete;

        foreach ($projectPhasessToDelete as $projectPhasesRemoved) {
            $projectPhasesRemoved->setProjects(null);
        }

        $this->collProjectPhasess = null;
        foreach ($projectPhasess as $projectPhases) {
            $this->addProjectPhases($projectPhases);
        }

        $this->collProjectPhasess = $projectPhasess;
        $this->collProjectPhasessPartial = false;

        return $this;
    }

    /**
     * Returns the number of related ProjectPhases objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related ProjectPhases objects.
     * @throws PropelException
     */
    public function countProjectPhasess(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectPhasessPartial && !$this->isNew();
        if (null === $this->collProjectPhasess || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectPhasess) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectPhasess());
            }

            $query = ChildProjectPhasesQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByProjects($this)
                ->count($con);
        }

        return count($this->collProjectPhasess);
    }

    /**
     * Method called to associate a ChildProjectPhases object to this object
     * through the ChildProjectPhases foreign key attribute.
     *
     * @param  ChildProjectPhases $l ChildProjectPhases
     * @return $this|\Projects The current object (for fluent API support)
     */
    public function addProjectPhases(ChildProjectPhases $l)
    {
        if ($this->collProjectPhasess === null) {
            $this->initProjectPhasess();
            $this->collProjectPhasessPartial = true;
        }

        if (!$this->collProjectPhasess->contains($l)) {
            $this->doAddProjectPhases($l);

            if ($this->projectPhasessScheduledForDeletion and $this->projectPhasessScheduledForDeletion->contains($l)) {
                $this->projectPhasessScheduledForDeletion->remove($this->projectPhasessScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProjectPhases $projectPhases The ChildProjectPhases object to add.
     */
    protected function doAddProjectPhases(ChildProjectPhases $projectPhases)
    {
        $this->collProjectPhasess[]= $projectPhases;
        $projectPhases->setProjects($this);
    }

    /**
     * @param  ChildProjectPhases $projectPhases The ChildProjectPhases object to remove.
     * @return $this|ChildProjects The current object (for fluent API support)
     */
    public function removeProjectPhases(ChildProjectPhases $projectPhases)
    {
        if ($this->getProjectPhasess()->contains($projectPhases)) {
            $pos = $this->collProjectPhasess->search($projectPhases);
            $this->collProjectPhasess->remove($pos);
            if (null === $this->projectPhasessScheduledForDeletion) {
                $this->projectPhasessScheduledForDeletion = clone $this->collProjectPhasess;
                $this->projectPhasessScheduledForDeletion->clear();
            }
            $this->projectPhasessScheduledForDeletion[]= clone $projectPhases;
            $projectPhases->setProjects(null);
        }

        return $this;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aClients) {
            $this->aClients->removeProjects($this);
        }
        if (null !== $this->aUsersRelatedByCreatedBy) {
            $this->aUsersRelatedByCreatedBy->removeProjectsRelatedByCreatedBy($this);
        }
        if (null !== $this->aUsersRelatedBySponsor) {
            $this->aUsersRelatedBySponsor->removeProjectsRelatedBySponsor($this);
        }
        if (null !== $this->aUsersRelatedByLead) {
            $this->aUsersRelatedByLead->removeProjectsRelatedByLead($this);
        }
        $this->id = null;
        $this->client_id = null;
        $this->created_by = null;
        $this->status = null;
        $this->name = null;
        $this->type = null;
        $this->diagram_type = null;
        $this->lead = null;
        $this->sponsor = null;
        $this->core_team = null;
        $this->business_unit = null;
        $this->location = null;
        $this->business_impact = null;
        $this->business_impact_value = null;
        $this->problem_statement = null;
        $this->goals = null;
        $this->scope = null;
        $this->define_review_date = null;
        $this->measure_review_date = null;
        $this->analyze_review_date = null;
        $this->improve_review_date = null;
        $this->control_review_date = null;
        $this->date_time_created = null;
        $this->last_updated = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collActionTrackings) {
                foreach ($this->collActionTrackings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnalyzeCeMatrices) {
                foreach ($this->collAnalyzeCeMatrices as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnalyzeCeMatrixOutputss) {
                foreach ($this->collAnalyzeCeMatrixOutputss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnalyzeCriticalxes) {
                foreach ($this->collAnalyzeCriticalxes as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnalyzeFmeas) {
                foreach ($this->collAnalyzeFmeas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnalyzeGateReviews) {
                foreach ($this->collAnalyzeGateReviews as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAnalyzeHypothesisMaps) {
                foreach ($this->collAnalyzeHypothesisMaps as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collChartExcelDatas) {
                foreach ($this->collChartExcelDatas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collControlControlPlans) {
                foreach ($this->collControlControlPlans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collControlGateReviews) {
                foreach ($this->collControlGateReviews as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collControlTestPlans) {
                foreach ($this->collControlTestPlans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineCommunications) {
                foreach ($this->collDefineCommunications as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineGateReviews) {
                foreach ($this->collDefineGateReviews as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineRacis) {
                foreach ($this->collDefineRacis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineRiskManagements) {
                foreach ($this->collDefineRiskManagements as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineSipocs) {
                foreach ($this->collDefineSipocs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineStakeholderss) {
                foreach ($this->collDefineStakeholderss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineValueStreamDiagrams) {
                foreach ($this->collDefineValueStreamDiagrams as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineVocCcrs) {
                foreach ($this->collDefineVocCcrs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collImproveGateReviews) {
                foreach ($this->collImproveGateReviews as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collImproveImprovementPlans) {
                foreach ($this->collImproveImprovementPlans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collImproveValueStreamDiagrams) {
                foreach ($this->collImproveValueStreamDiagrams as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMeasureCollectionPlans) {
                foreach ($this->collMeasureCollectionPlans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMeasureControlPlans) {
                foreach ($this->collMeasureControlPlans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMeasureGateReviews) {
                foreach ($this->collMeasureGateReviews as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMeasureNonvalueAnalyses) {
                foreach ($this->collMeasureNonvalueAnalyses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMeasureValueStreamDiagrams) {
                foreach ($this->collMeasureValueStreamDiagrams as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPhaseComponentss) {
                foreach ($this->collPhaseComponentss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectPhasess) {
                foreach ($this->collProjectPhasess as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collActionTrackings = null;
        $this->collAnalyzeCeMatrices = null;
        $this->collAnalyzeCeMatrixOutputss = null;
        $this->collAnalyzeCriticalxes = null;
        $this->collAnalyzeFmeas = null;
        $this->collAnalyzeGateReviews = null;
        $this->collAnalyzeHypothesisMaps = null;
        $this->collChartExcelDatas = null;
        $this->collControlControlPlans = null;
        $this->collControlGateReviews = null;
        $this->collControlTestPlans = null;
        $this->collDefineCommunications = null;
        $this->collDefineGateReviews = null;
        $this->collDefineRacis = null;
        $this->collDefineRiskManagements = null;
        $this->collDefineSipocs = null;
        $this->collDefineStakeholderss = null;
        $this->collDefineValueStreamDiagrams = null;
        $this->collDefineVocCcrs = null;
        $this->collImproveGateReviews = null;
        $this->collImproveImprovementPlans = null;
        $this->collImproveValueStreamDiagrams = null;
        $this->collMeasureCollectionPlans = null;
        $this->collMeasureControlPlans = null;
        $this->collMeasureGateReviews = null;
        $this->collMeasureNonvalueAnalyses = null;
        $this->collMeasureValueStreamDiagrams = null;
        $this->collPhaseComponentss = null;
        $this->collProjectPhasess = null;
        $this->aClients = null;
        $this->aUsersRelatedByCreatedBy = null;
        $this->aUsersRelatedBySponsor = null;
        $this->aUsersRelatedByLead = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ProjectsTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
