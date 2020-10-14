<?php

namespace Base;

use \AnalyzeRegressionQuery as ChildAnalyzeRegressionQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\AnalyzeRegressionTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;

/**
 * Base class that represents a row from the 'analyze_regression' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class AnalyzeRegression implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\AnalyzeRegressionTableMap';


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
     * The value for the project_id field.
     *
     * @var        int
     */
    protected $project_id;

    /**
     * The value for the phase_id field.
     *
     * @var        int
     */
    protected $phase_id;

    /**
     * The value for the phase_component_id field.
     *
     * @var        int
     */
    protected $phase_component_id;

    /**
     * The value for the input field.
     *
     * @var        string
     */
    protected $input;

    /**
     * The value for the multiple_r field.
     *
     * @var        double
     */
    protected $multiple_r;

    /**
     * The value for the r_square field.
     *
     * @var        double
     */
    protected $r_square;

    /**
     * The value for the adjusted_r_square field.
     *
     * @var        double
     */
    protected $adjusted_r_square;

    /**
     * The value for the standard_error field.
     *
     * @var        double
     */
    protected $standard_error;

    /**
     * The value for the observations field.
     *
     * @var        int
     */
    protected $observations;

    /**
     * The value for the regression_df field.
     *
     * @var        double
     */
    protected $regression_df;

    /**
     * The value for the regression_ss field.
     *
     * @var        double
     */
    protected $regression_ss;

    /**
     * The value for the regression_ms field.
     *
     * @var        double
     */
    protected $regression_ms;

    /**
     * The value for the regression_f field.
     *
     * @var        double
     */
    protected $regression_f;

    /**
     * The value for the regression_f_significance field.
     *
     * @var        double
     */
    protected $regression_f_significance;

    /**
     * The value for the residual_df field.
     *
     * @var        double
     */
    protected $residual_df;

    /**
     * The value for the residual_ss field.
     *
     * @var        double
     */
    protected $residual_ss;

    /**
     * The value for the residual_ms field.
     *
     * @var        double
     */
    protected $residual_ms;

    /**
     * The value for the total_df field.
     *
     * @var        double
     */
    protected $total_df;

    /**
     * The value for the total_ss field.
     *
     * @var        double
     */
    protected $total_ss;

    /**
     * The value for the intercept_coefficients field.
     *
     * @var        double
     */
    protected $intercept_coefficients;

    /**
     * The value for the intercept_standard_error field.
     *
     * @var        double
     */
    protected $intercept_standard_error;

    /**
     * The value for the intercept_t_stat field.
     *
     * @var        double
     */
    protected $intercept_t_stat;

    /**
     * The value for the intercept_p_value field.
     *
     * @var        double
     */
    protected $intercept_p_value;

    /**
     * The value for the intercept_lower field.
     *
     * @var        double
     */
    protected $intercept_lower;

    /**
     * The value for the intercept_upper field.
     *
     * @var        double
     */
    protected $intercept_upper;

    /**
     * The value for the hh_size_coefficients field.
     *
     * @var        double
     */
    protected $hh_size_coefficients;

    /**
     * The value for the hh_size_standard_error field.
     *
     * @var        double
     */
    protected $hh_size_standard_error;

    /**
     * The value for the hh_size_t_stat field.
     *
     * @var        double
     */
    protected $hh_size_t_stat;

    /**
     * The value for the hh_size_p_value field.
     *
     * @var        double
     */
    protected $hh_size_p_value;

    /**
     * The value for the hh_size_lower field.
     *
     * @var        double
     */
    protected $hh_size_lower;

    /**
     * The value for the hh_size_upper field.
     *
     * @var        double
     */
    protected $hh_size_upper;

    /**
     * The value for the date_time_created field.
     *
     * @var        DateTime
     */
    protected $date_time_created;

    /**
     * The value for the last_updated field.
     *
     * @var        DateTime
     */
    protected $last_updated;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Initializes internal state of Base\AnalyzeRegression object.
     */
    public function __construct()
    {
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
     * Compares this with another <code>AnalyzeRegression</code> instance.  If
     * <code>obj</code> is an instance of <code>AnalyzeRegression</code>, delegates to
     * <code>equals(AnalyzeRegression)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AnalyzeRegression The current object, for fluid interface
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
     * Get the [project_id] column value.
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * Get the [phase_id] column value.
     *
     * @return int
     */
    public function getPhaseId()
    {
        return $this->phase_id;
    }

    /**
     * Get the [phase_component_id] column value.
     *
     * @return int
     */
    public function getPhaseComponentId()
    {
        return $this->phase_component_id;
    }

    /**
     * Get the [input] column value.
     *
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * Get the [multiple_r] column value.
     *
     * @return double
     */
    public function getMultipleR()
    {
        return $this->multiple_r;
    }

    /**
     * Get the [r_square] column value.
     *
     * @return double
     */
    public function getRSquare()
    {
        return $this->r_square;
    }

    /**
     * Get the [adjusted_r_square] column value.
     *
     * @return double
     */
    public function getAdjustedRSquare()
    {
        return $this->adjusted_r_square;
    }

    /**
     * Get the [standard_error] column value.
     *
     * @return double
     */
    public function getStandardError()
    {
        return $this->standard_error;
    }

    /**
     * Get the [observations] column value.
     *
     * @return int
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Get the [regression_df] column value.
     *
     * @return double
     */
    public function getRegressionDf()
    {
        return $this->regression_df;
    }

    /**
     * Get the [regression_ss] column value.
     *
     * @return double
     */
    public function getRegressionSs()
    {
        return $this->regression_ss;
    }

    /**
     * Get the [regression_ms] column value.
     *
     * @return double
     */
    public function getRegressionMs()
    {
        return $this->regression_ms;
    }

    /**
     * Get the [regression_f] column value.
     *
     * @return double
     */
    public function getRegressionF()
    {
        return $this->regression_f;
    }

    /**
     * Get the [regression_f_significance] column value.
     *
     * @return double
     */
    public function getRegressionFSignificance()
    {
        return $this->regression_f_significance;
    }

    /**
     * Get the [residual_df] column value.
     *
     * @return double
     */
    public function getResidualDf()
    {
        return $this->residual_df;
    }

    /**
     * Get the [residual_ss] column value.
     *
     * @return double
     */
    public function getResidualSs()
    {
        return $this->residual_ss;
    }

    /**
     * Get the [residual_ms] column value.
     *
     * @return double
     */
    public function getResidualMs()
    {
        return $this->residual_ms;
    }

    /**
     * Get the [total_df] column value.
     *
     * @return double
     */
    public function getTotalDf()
    {
        return $this->total_df;
    }

    /**
     * Get the [total_ss] column value.
     *
     * @return double
     */
    public function getTotalSs()
    {
        return $this->total_ss;
    }

    /**
     * Get the [intercept_coefficients] column value.
     *
     * @return double
     */
    public function getInterceptCoefficients()
    {
        return $this->intercept_coefficients;
    }

    /**
     * Get the [intercept_standard_error] column value.
     *
     * @return double
     */
    public function getInterceptStandardError()
    {
        return $this->intercept_standard_error;
    }

    /**
     * Get the [intercept_t_stat] column value.
     *
     * @return double
     */
    public function getInterceptTStat()
    {
        return $this->intercept_t_stat;
    }

    /**
     * Get the [intercept_p_value] column value.
     *
     * @return double
     */
    public function getInterceptPValue()
    {
        return $this->intercept_p_value;
    }

    /**
     * Get the [intercept_lower] column value.
     *
     * @return double
     */
    public function getInterceptLower()
    {
        return $this->intercept_lower;
    }

    /**
     * Get the [intercept_upper] column value.
     *
     * @return double
     */
    public function getInterceptUpper()
    {
        return $this->intercept_upper;
    }

    /**
     * Get the [hh_size_coefficients] column value.
     *
     * @return double
     */
    public function getHhSizeCoefficients()
    {
        return $this->hh_size_coefficients;
    }

    /**
     * Get the [hh_size_standard_error] column value.
     *
     * @return double
     */
    public function getHhSizeStandardError()
    {
        return $this->hh_size_standard_error;
    }

    /**
     * Get the [hh_size_t_stat] column value.
     *
     * @return double
     */
    public function getHhSizeTStat()
    {
        return $this->hh_size_t_stat;
    }

    /**
     * Get the [hh_size_p_value] column value.
     *
     * @return double
     */
    public function getHhSizePValue()
    {
        return $this->hh_size_p_value;
    }

    /**
     * Get the [hh_size_lower] column value.
     *
     * @return double
     */
    public function getHhSizeLower()
    {
        return $this->hh_size_lower;
    }

    /**
     * Get the [hh_size_upper] column value.
     *
     * @return double
     */
    public function getHhSizeUpper()
    {
        return $this->hh_size_upper;
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
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [project_id] column.
     *
     * @param int $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setProjectId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->project_id !== $v) {
            $this->project_id = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_PROJECT_ID] = true;
        }

        return $this;
    } // setProjectId()

    /**
     * Set the value of [phase_id] column.
     *
     * @param int $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setPhaseId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->phase_id !== $v) {
            $this->phase_id = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_PHASE_ID] = true;
        }

        return $this;
    } // setPhaseId()

    /**
     * Set the value of [phase_component_id] column.
     *
     * @param int $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setPhaseComponentId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->phase_component_id !== $v) {
            $this->phase_component_id = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID] = true;
        }

        return $this;
    } // setPhaseComponentId()

    /**
     * Set the value of [input] column.
     *
     * @param string $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setInput($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->input !== $v) {
            $this->input = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_INPUT] = true;
        }

        return $this;
    } // setInput()

    /**
     * Set the value of [multiple_r] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setMultipleR($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->multiple_r !== $v) {
            $this->multiple_r = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_MULTIPLE_R] = true;
        }

        return $this;
    } // setMultipleR()

    /**
     * Set the value of [r_square] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setRSquare($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->r_square !== $v) {
            $this->r_square = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_R_SQUARE] = true;
        }

        return $this;
    } // setRSquare()

    /**
     * Set the value of [adjusted_r_square] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setAdjustedRSquare($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->adjusted_r_square !== $v) {
            $this->adjusted_r_square = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE] = true;
        }

        return $this;
    } // setAdjustedRSquare()

    /**
     * Set the value of [standard_error] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setStandardError($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->standard_error !== $v) {
            $this->standard_error = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_STANDARD_ERROR] = true;
        }

        return $this;
    } // setStandardError()

    /**
     * Set the value of [observations] column.
     *
     * @param int $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setObservations($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->observations !== $v) {
            $this->observations = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_OBSERVATIONS] = true;
        }

        return $this;
    } // setObservations()

    /**
     * Set the value of [regression_df] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setRegressionDf($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->regression_df !== $v) {
            $this->regression_df = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_REGRESSION_DF] = true;
        }

        return $this;
    } // setRegressionDf()

    /**
     * Set the value of [regression_ss] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setRegressionSs($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->regression_ss !== $v) {
            $this->regression_ss = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_REGRESSION_SS] = true;
        }

        return $this;
    } // setRegressionSs()

    /**
     * Set the value of [regression_ms] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setRegressionMs($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->regression_ms !== $v) {
            $this->regression_ms = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_REGRESSION_MS] = true;
        }

        return $this;
    } // setRegressionMs()

    /**
     * Set the value of [regression_f] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setRegressionF($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->regression_f !== $v) {
            $this->regression_f = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_REGRESSION_F] = true;
        }

        return $this;
    } // setRegressionF()

    /**
     * Set the value of [regression_f_significance] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setRegressionFSignificance($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->regression_f_significance !== $v) {
            $this->regression_f_significance = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE] = true;
        }

        return $this;
    } // setRegressionFSignificance()

    /**
     * Set the value of [residual_df] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setResidualDf($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->residual_df !== $v) {
            $this->residual_df = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_RESIDUAL_DF] = true;
        }

        return $this;
    } // setResidualDf()

    /**
     * Set the value of [residual_ss] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setResidualSs($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->residual_ss !== $v) {
            $this->residual_ss = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_RESIDUAL_SS] = true;
        }

        return $this;
    } // setResidualSs()

    /**
     * Set the value of [residual_ms] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setResidualMs($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->residual_ms !== $v) {
            $this->residual_ms = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_RESIDUAL_MS] = true;
        }

        return $this;
    } // setResidualMs()

    /**
     * Set the value of [total_df] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setTotalDf($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->total_df !== $v) {
            $this->total_df = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_TOTAL_DF] = true;
        }

        return $this;
    } // setTotalDf()

    /**
     * Set the value of [total_ss] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setTotalSs($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->total_ss !== $v) {
            $this->total_ss = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_TOTAL_SS] = true;
        }

        return $this;
    } // setTotalSs()

    /**
     * Set the value of [intercept_coefficients] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setInterceptCoefficients($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->intercept_coefficients !== $v) {
            $this->intercept_coefficients = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS] = true;
        }

        return $this;
    } // setInterceptCoefficients()

    /**
     * Set the value of [intercept_standard_error] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setInterceptStandardError($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->intercept_standard_error !== $v) {
            $this->intercept_standard_error = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR] = true;
        }

        return $this;
    } // setInterceptStandardError()

    /**
     * Set the value of [intercept_t_stat] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setInterceptTStat($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->intercept_t_stat !== $v) {
            $this->intercept_t_stat = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT] = true;
        }

        return $this;
    } // setInterceptTStat()

    /**
     * Set the value of [intercept_p_value] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setInterceptPValue($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->intercept_p_value !== $v) {
            $this->intercept_p_value = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE] = true;
        }

        return $this;
    } // setInterceptPValue()

    /**
     * Set the value of [intercept_lower] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setInterceptLower($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->intercept_lower !== $v) {
            $this->intercept_lower = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER] = true;
        }

        return $this;
    } // setInterceptLower()

    /**
     * Set the value of [intercept_upper] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setInterceptUpper($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->intercept_upper !== $v) {
            $this->intercept_upper = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER] = true;
        }

        return $this;
    } // setInterceptUpper()

    /**
     * Set the value of [hh_size_coefficients] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setHhSizeCoefficients($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->hh_size_coefficients !== $v) {
            $this->hh_size_coefficients = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS] = true;
        }

        return $this;
    } // setHhSizeCoefficients()

    /**
     * Set the value of [hh_size_standard_error] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setHhSizeStandardError($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->hh_size_standard_error !== $v) {
            $this->hh_size_standard_error = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR] = true;
        }

        return $this;
    } // setHhSizeStandardError()

    /**
     * Set the value of [hh_size_t_stat] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setHhSizeTStat($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->hh_size_t_stat !== $v) {
            $this->hh_size_t_stat = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT] = true;
        }

        return $this;
    } // setHhSizeTStat()

    /**
     * Set the value of [hh_size_p_value] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setHhSizePValue($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->hh_size_p_value !== $v) {
            $this->hh_size_p_value = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE] = true;
        }

        return $this;
    } // setHhSizePValue()

    /**
     * Set the value of [hh_size_lower] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setHhSizeLower($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->hh_size_lower !== $v) {
            $this->hh_size_lower = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER] = true;
        }

        return $this;
    } // setHhSizeLower()

    /**
     * Set the value of [hh_size_upper] column.
     *
     * @param double $v new value
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setHhSizeUpper($v)
    {
        if ($v !== null) {
            $v = (double) $v;
        }

        if ($this->hh_size_upper !== $v) {
            $this->hh_size_upper = $v;
            $this->modifiedColumns[AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER] = true;
        }

        return $this;
    } // setHhSizeUpper()

    /**
     * Sets the value of [date_time_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setDateTimeCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_time_created !== null || $dt !== null) {
            if ($this->date_time_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_time_created->format("Y-m-d H:i:s.u")) {
                $this->date_time_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateTimeCreated()

    /**
     * Sets the value of [last_updated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\AnalyzeRegression The current object (for fluent API support)
     */
    public function setLastUpdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_updated !== null || $dt !== null) {
            if ($this->last_updated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_updated->format("Y-m-d H:i:s.u")) {
                $this->last_updated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AnalyzeRegressionTableMap::COL_LAST_UPDATED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AnalyzeRegressionTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AnalyzeRegressionTableMap::translateFieldName('ProjectId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->project_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AnalyzeRegressionTableMap::translateFieldName('PhaseId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phase_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AnalyzeRegressionTableMap::translateFieldName('PhaseComponentId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phase_component_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AnalyzeRegressionTableMap::translateFieldName('Input', TableMap::TYPE_PHPNAME, $indexType)];
            $this->input = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AnalyzeRegressionTableMap::translateFieldName('MultipleR', TableMap::TYPE_PHPNAME, $indexType)];
            $this->multiple_r = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : AnalyzeRegressionTableMap::translateFieldName('RSquare', TableMap::TYPE_PHPNAME, $indexType)];
            $this->r_square = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : AnalyzeRegressionTableMap::translateFieldName('AdjustedRSquare', TableMap::TYPE_PHPNAME, $indexType)];
            $this->adjusted_r_square = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : AnalyzeRegressionTableMap::translateFieldName('StandardError', TableMap::TYPE_PHPNAME, $indexType)];
            $this->standard_error = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : AnalyzeRegressionTableMap::translateFieldName('Observations', TableMap::TYPE_PHPNAME, $indexType)];
            $this->observations = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : AnalyzeRegressionTableMap::translateFieldName('RegressionDf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regression_df = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : AnalyzeRegressionTableMap::translateFieldName('RegressionSs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regression_ss = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : AnalyzeRegressionTableMap::translateFieldName('RegressionMs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regression_ms = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : AnalyzeRegressionTableMap::translateFieldName('RegressionF', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regression_f = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : AnalyzeRegressionTableMap::translateFieldName('RegressionFSignificance', TableMap::TYPE_PHPNAME, $indexType)];
            $this->regression_f_significance = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : AnalyzeRegressionTableMap::translateFieldName('ResidualDf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->residual_df = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : AnalyzeRegressionTableMap::translateFieldName('ResidualSs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->residual_ss = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : AnalyzeRegressionTableMap::translateFieldName('ResidualMs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->residual_ms = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : AnalyzeRegressionTableMap::translateFieldName('TotalDf', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_df = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : AnalyzeRegressionTableMap::translateFieldName('TotalSs', TableMap::TYPE_PHPNAME, $indexType)];
            $this->total_ss = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : AnalyzeRegressionTableMap::translateFieldName('InterceptCoefficients', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intercept_coefficients = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : AnalyzeRegressionTableMap::translateFieldName('InterceptStandardError', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intercept_standard_error = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 22 + $startcol : AnalyzeRegressionTableMap::translateFieldName('InterceptTStat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intercept_t_stat = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 23 + $startcol : AnalyzeRegressionTableMap::translateFieldName('InterceptPValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intercept_p_value = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 24 + $startcol : AnalyzeRegressionTableMap::translateFieldName('InterceptLower', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intercept_lower = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 25 + $startcol : AnalyzeRegressionTableMap::translateFieldName('InterceptUpper', TableMap::TYPE_PHPNAME, $indexType)];
            $this->intercept_upper = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 26 + $startcol : AnalyzeRegressionTableMap::translateFieldName('HhSizeCoefficients', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hh_size_coefficients = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 27 + $startcol : AnalyzeRegressionTableMap::translateFieldName('HhSizeStandardError', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hh_size_standard_error = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 28 + $startcol : AnalyzeRegressionTableMap::translateFieldName('HhSizeTStat', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hh_size_t_stat = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 29 + $startcol : AnalyzeRegressionTableMap::translateFieldName('HhSizePValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hh_size_p_value = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 30 + $startcol : AnalyzeRegressionTableMap::translateFieldName('HhSizeLower', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hh_size_lower = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 31 + $startcol : AnalyzeRegressionTableMap::translateFieldName('HhSizeUpper', TableMap::TYPE_PHPNAME, $indexType)];
            $this->hh_size_upper = (null !== $col) ? (double) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 32 + $startcol : AnalyzeRegressionTableMap::translateFieldName('DateTimeCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_time_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 33 + $startcol : AnalyzeRegressionTableMap::translateFieldName('LastUpdated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_updated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 34; // 34 = AnalyzeRegressionTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\AnalyzeRegression'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(AnalyzeRegressionTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAnalyzeRegressionQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see AnalyzeRegression::setDeleted()
     * @see AnalyzeRegression::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeRegressionTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAnalyzeRegressionQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeRegressionTableMap::DATABASE_NAME);
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
                AnalyzeRegressionTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[AnalyzeRegressionTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AnalyzeRegressionTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_PROJECT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`project_id`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_PHASE_ID)) {
            $modifiedColumns[':p' . $index++]  = '`phase_id`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`phase_component_id`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INPUT)) {
            $modifiedColumns[':p' . $index++]  = '`input`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_MULTIPLE_R)) {
            $modifiedColumns[':p' . $index++]  = '`multiple_r`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_R_SQUARE)) {
            $modifiedColumns[':p' . $index++]  = '`r_square`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE)) {
            $modifiedColumns[':p' . $index++]  = '`adjusted_r_square`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_STANDARD_ERROR)) {
            $modifiedColumns[':p' . $index++]  = '`standard_error`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_OBSERVATIONS)) {
            $modifiedColumns[':p' . $index++]  = '`observations`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_DF)) {
            $modifiedColumns[':p' . $index++]  = '`regression_df`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_SS)) {
            $modifiedColumns[':p' . $index++]  = '`regression_ss`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_MS)) {
            $modifiedColumns[':p' . $index++]  = '`regression_ms`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_F)) {
            $modifiedColumns[':p' . $index++]  = '`regression_f`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE)) {
            $modifiedColumns[':p' . $index++]  = '`regression_f_significance`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_RESIDUAL_DF)) {
            $modifiedColumns[':p' . $index++]  = '`residual_df`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_RESIDUAL_SS)) {
            $modifiedColumns[':p' . $index++]  = '`residual_ss`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_RESIDUAL_MS)) {
            $modifiedColumns[':p' . $index++]  = '`residual_ms`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_TOTAL_DF)) {
            $modifiedColumns[':p' . $index++]  = '`total_df`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_TOTAL_SS)) {
            $modifiedColumns[':p' . $index++]  = '`total_ss`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS)) {
            $modifiedColumns[':p' . $index++]  = '`intercept_coefficients`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR)) {
            $modifiedColumns[':p' . $index++]  = '`intercept_standard_error`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT)) {
            $modifiedColumns[':p' . $index++]  = '`intercept_t_stat`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`intercept_p_value`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER)) {
            $modifiedColumns[':p' . $index++]  = '`intercept_lower`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER)) {
            $modifiedColumns[':p' . $index++]  = '`intercept_upper`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS)) {
            $modifiedColumns[':p' . $index++]  = '`hh_size_coefficients`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR)) {
            $modifiedColumns[':p' . $index++]  = '`hh_size_standard_error`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT)) {
            $modifiedColumns[':p' . $index++]  = '`hh_size_t_stat`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`hh_size_p_value`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER)) {
            $modifiedColumns[':p' . $index++]  = '`hh_size_lower`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER)) {
            $modifiedColumns[':p' . $index++]  = '`hh_size_upper`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`date_time_created`';
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_LAST_UPDATED)) {
            $modifiedColumns[':p' . $index++]  = '`last_updated`';
        }

        $sql = sprintf(
            'INSERT INTO `analyze_regression` (%s) VALUES (%s)',
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
                    case '`project_id`':
                        $stmt->bindValue($identifier, $this->project_id, PDO::PARAM_INT);
                        break;
                    case '`phase_id`':
                        $stmt->bindValue($identifier, $this->phase_id, PDO::PARAM_INT);
                        break;
                    case '`phase_component_id`':
                        $stmt->bindValue($identifier, $this->phase_component_id, PDO::PARAM_INT);
                        break;
                    case '`input`':
                        $stmt->bindValue($identifier, $this->input, PDO::PARAM_STR);
                        break;
                    case '`multiple_r`':
                        $stmt->bindValue($identifier, $this->multiple_r, PDO::PARAM_STR);
                        break;
                    case '`r_square`':
                        $stmt->bindValue($identifier, $this->r_square, PDO::PARAM_STR);
                        break;
                    case '`adjusted_r_square`':
                        $stmt->bindValue($identifier, $this->adjusted_r_square, PDO::PARAM_STR);
                        break;
                    case '`standard_error`':
                        $stmt->bindValue($identifier, $this->standard_error, PDO::PARAM_STR);
                        break;
                    case '`observations`':
                        $stmt->bindValue($identifier, $this->observations, PDO::PARAM_INT);
                        break;
                    case '`regression_df`':
                        $stmt->bindValue($identifier, $this->regression_df, PDO::PARAM_STR);
                        break;
                    case '`regression_ss`':
                        $stmt->bindValue($identifier, $this->regression_ss, PDO::PARAM_STR);
                        break;
                    case '`regression_ms`':
                        $stmt->bindValue($identifier, $this->regression_ms, PDO::PARAM_STR);
                        break;
                    case '`regression_f`':
                        $stmt->bindValue($identifier, $this->regression_f, PDO::PARAM_STR);
                        break;
                    case '`regression_f_significance`':
                        $stmt->bindValue($identifier, $this->regression_f_significance, PDO::PARAM_STR);
                        break;
                    case '`residual_df`':
                        $stmt->bindValue($identifier, $this->residual_df, PDO::PARAM_STR);
                        break;
                    case '`residual_ss`':
                        $stmt->bindValue($identifier, $this->residual_ss, PDO::PARAM_STR);
                        break;
                    case '`residual_ms`':
                        $stmt->bindValue($identifier, $this->residual_ms, PDO::PARAM_STR);
                        break;
                    case '`total_df`':
                        $stmt->bindValue($identifier, $this->total_df, PDO::PARAM_STR);
                        break;
                    case '`total_ss`':
                        $stmt->bindValue($identifier, $this->total_ss, PDO::PARAM_STR);
                        break;
                    case '`intercept_coefficients`':
                        $stmt->bindValue($identifier, $this->intercept_coefficients, PDO::PARAM_STR);
                        break;
                    case '`intercept_standard_error`':
                        $stmt->bindValue($identifier, $this->intercept_standard_error, PDO::PARAM_STR);
                        break;
                    case '`intercept_t_stat`':
                        $stmt->bindValue($identifier, $this->intercept_t_stat, PDO::PARAM_STR);
                        break;
                    case '`intercept_p_value`':
                        $stmt->bindValue($identifier, $this->intercept_p_value, PDO::PARAM_STR);
                        break;
                    case '`intercept_lower`':
                        $stmt->bindValue($identifier, $this->intercept_lower, PDO::PARAM_STR);
                        break;
                    case '`intercept_upper`':
                        $stmt->bindValue($identifier, $this->intercept_upper, PDO::PARAM_STR);
                        break;
                    case '`hh_size_coefficients`':
                        $stmt->bindValue($identifier, $this->hh_size_coefficients, PDO::PARAM_STR);
                        break;
                    case '`hh_size_standard_error`':
                        $stmt->bindValue($identifier, $this->hh_size_standard_error, PDO::PARAM_STR);
                        break;
                    case '`hh_size_t_stat`':
                        $stmt->bindValue($identifier, $this->hh_size_t_stat, PDO::PARAM_STR);
                        break;
                    case '`hh_size_p_value`':
                        $stmt->bindValue($identifier, $this->hh_size_p_value, PDO::PARAM_STR);
                        break;
                    case '`hh_size_lower`':
                        $stmt->bindValue($identifier, $this->hh_size_lower, PDO::PARAM_STR);
                        break;
                    case '`hh_size_upper`':
                        $stmt->bindValue($identifier, $this->hh_size_upper, PDO::PARAM_STR);
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
        $pos = AnalyzeRegressionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getProjectId();
                break;
            case 2:
                return $this->getPhaseId();
                break;
            case 3:
                return $this->getPhaseComponentId();
                break;
            case 4:
                return $this->getInput();
                break;
            case 5:
                return $this->getMultipleR();
                break;
            case 6:
                return $this->getRSquare();
                break;
            case 7:
                return $this->getAdjustedRSquare();
                break;
            case 8:
                return $this->getStandardError();
                break;
            case 9:
                return $this->getObservations();
                break;
            case 10:
                return $this->getRegressionDf();
                break;
            case 11:
                return $this->getRegressionSs();
                break;
            case 12:
                return $this->getRegressionMs();
                break;
            case 13:
                return $this->getRegressionF();
                break;
            case 14:
                return $this->getRegressionFSignificance();
                break;
            case 15:
                return $this->getResidualDf();
                break;
            case 16:
                return $this->getResidualSs();
                break;
            case 17:
                return $this->getResidualMs();
                break;
            case 18:
                return $this->getTotalDf();
                break;
            case 19:
                return $this->getTotalSs();
                break;
            case 20:
                return $this->getInterceptCoefficients();
                break;
            case 21:
                return $this->getInterceptStandardError();
                break;
            case 22:
                return $this->getInterceptTStat();
                break;
            case 23:
                return $this->getInterceptPValue();
                break;
            case 24:
                return $this->getInterceptLower();
                break;
            case 25:
                return $this->getInterceptUpper();
                break;
            case 26:
                return $this->getHhSizeCoefficients();
                break;
            case 27:
                return $this->getHhSizeStandardError();
                break;
            case 28:
                return $this->getHhSizeTStat();
                break;
            case 29:
                return $this->getHhSizePValue();
                break;
            case 30:
                return $this->getHhSizeLower();
                break;
            case 31:
                return $this->getHhSizeUpper();
                break;
            case 32:
                return $this->getDateTimeCreated();
                break;
            case 33:
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['AnalyzeRegression'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AnalyzeRegression'][$this->hashCode()] = true;
        $keys = AnalyzeRegressionTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getProjectId(),
            $keys[2] => $this->getPhaseId(),
            $keys[3] => $this->getPhaseComponentId(),
            $keys[4] => $this->getInput(),
            $keys[5] => $this->getMultipleR(),
            $keys[6] => $this->getRSquare(),
            $keys[7] => $this->getAdjustedRSquare(),
            $keys[8] => $this->getStandardError(),
            $keys[9] => $this->getObservations(),
            $keys[10] => $this->getRegressionDf(),
            $keys[11] => $this->getRegressionSs(),
            $keys[12] => $this->getRegressionMs(),
            $keys[13] => $this->getRegressionF(),
            $keys[14] => $this->getRegressionFSignificance(),
            $keys[15] => $this->getResidualDf(),
            $keys[16] => $this->getResidualSs(),
            $keys[17] => $this->getResidualMs(),
            $keys[18] => $this->getTotalDf(),
            $keys[19] => $this->getTotalSs(),
            $keys[20] => $this->getInterceptCoefficients(),
            $keys[21] => $this->getInterceptStandardError(),
            $keys[22] => $this->getInterceptTStat(),
            $keys[23] => $this->getInterceptPValue(),
            $keys[24] => $this->getInterceptLower(),
            $keys[25] => $this->getInterceptUpper(),
            $keys[26] => $this->getHhSizeCoefficients(),
            $keys[27] => $this->getHhSizeStandardError(),
            $keys[28] => $this->getHhSizeTStat(),
            $keys[29] => $this->getHhSizePValue(),
            $keys[30] => $this->getHhSizeLower(),
            $keys[31] => $this->getHhSizeUpper(),
            $keys[32] => $this->getDateTimeCreated(),
            $keys[33] => $this->getLastUpdated(),
        );
        if ($result[$keys[32]] instanceof \DateTimeInterface) {
            $result[$keys[32]] = $result[$keys[32]]->format('c');
        }

        if ($result[$keys[33]] instanceof \DateTimeInterface) {
            $result[$keys[33]] = $result[$keys[33]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\AnalyzeRegression
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AnalyzeRegressionTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\AnalyzeRegression
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setProjectId($value);
                break;
            case 2:
                $this->setPhaseId($value);
                break;
            case 3:
                $this->setPhaseComponentId($value);
                break;
            case 4:
                $this->setInput($value);
                break;
            case 5:
                $this->setMultipleR($value);
                break;
            case 6:
                $this->setRSquare($value);
                break;
            case 7:
                $this->setAdjustedRSquare($value);
                break;
            case 8:
                $this->setStandardError($value);
                break;
            case 9:
                $this->setObservations($value);
                break;
            case 10:
                $this->setRegressionDf($value);
                break;
            case 11:
                $this->setRegressionSs($value);
                break;
            case 12:
                $this->setRegressionMs($value);
                break;
            case 13:
                $this->setRegressionF($value);
                break;
            case 14:
                $this->setRegressionFSignificance($value);
                break;
            case 15:
                $this->setResidualDf($value);
                break;
            case 16:
                $this->setResidualSs($value);
                break;
            case 17:
                $this->setResidualMs($value);
                break;
            case 18:
                $this->setTotalDf($value);
                break;
            case 19:
                $this->setTotalSs($value);
                break;
            case 20:
                $this->setInterceptCoefficients($value);
                break;
            case 21:
                $this->setInterceptStandardError($value);
                break;
            case 22:
                $this->setInterceptTStat($value);
                break;
            case 23:
                $this->setInterceptPValue($value);
                break;
            case 24:
                $this->setInterceptLower($value);
                break;
            case 25:
                $this->setInterceptUpper($value);
                break;
            case 26:
                $this->setHhSizeCoefficients($value);
                break;
            case 27:
                $this->setHhSizeStandardError($value);
                break;
            case 28:
                $this->setHhSizeTStat($value);
                break;
            case 29:
                $this->setHhSizePValue($value);
                break;
            case 30:
                $this->setHhSizeLower($value);
                break;
            case 31:
                $this->setHhSizeUpper($value);
                break;
            case 32:
                $this->setDateTimeCreated($value);
                break;
            case 33:
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
        $keys = AnalyzeRegressionTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setProjectId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setPhaseId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPhaseComponentId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setInput($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setMultipleR($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setRSquare($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setAdjustedRSquare($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setStandardError($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setObservations($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setRegressionDf($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setRegressionSs($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setRegressionMs($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setRegressionF($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setRegressionFSignificance($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setResidualDf($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setResidualSs($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setResidualMs($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setTotalDf($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setTotalSs($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setInterceptCoefficients($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setInterceptStandardError($arr[$keys[21]]);
        }
        if (array_key_exists($keys[22], $arr)) {
            $this->setInterceptTStat($arr[$keys[22]]);
        }
        if (array_key_exists($keys[23], $arr)) {
            $this->setInterceptPValue($arr[$keys[23]]);
        }
        if (array_key_exists($keys[24], $arr)) {
            $this->setInterceptLower($arr[$keys[24]]);
        }
        if (array_key_exists($keys[25], $arr)) {
            $this->setInterceptUpper($arr[$keys[25]]);
        }
        if (array_key_exists($keys[26], $arr)) {
            $this->setHhSizeCoefficients($arr[$keys[26]]);
        }
        if (array_key_exists($keys[27], $arr)) {
            $this->setHhSizeStandardError($arr[$keys[27]]);
        }
        if (array_key_exists($keys[28], $arr)) {
            $this->setHhSizeTStat($arr[$keys[28]]);
        }
        if (array_key_exists($keys[29], $arr)) {
            $this->setHhSizePValue($arr[$keys[29]]);
        }
        if (array_key_exists($keys[30], $arr)) {
            $this->setHhSizeLower($arr[$keys[30]]);
        }
        if (array_key_exists($keys[31], $arr)) {
            $this->setHhSizeUpper($arr[$keys[31]]);
        }
        if (array_key_exists($keys[32], $arr)) {
            $this->setDateTimeCreated($arr[$keys[32]]);
        }
        if (array_key_exists($keys[33], $arr)) {
            $this->setLastUpdated($arr[$keys[33]]);
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
     * @return $this|\AnalyzeRegression The current object, for fluid interface
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
        $criteria = new Criteria(AnalyzeRegressionTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_ID)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_PROJECT_ID)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_PROJECT_ID, $this->project_id);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_PHASE_ID)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_PHASE_ID, $this->phase_id);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_PHASE_COMPONENT_ID, $this->phase_component_id);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INPUT)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_INPUT, $this->input);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_MULTIPLE_R)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_MULTIPLE_R, $this->multiple_r);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_R_SQUARE)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_R_SQUARE, $this->r_square);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_ADJUSTED_R_SQUARE, $this->adjusted_r_square);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_STANDARD_ERROR)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_STANDARD_ERROR, $this->standard_error);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_OBSERVATIONS)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_OBSERVATIONS, $this->observations);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_DF)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_REGRESSION_DF, $this->regression_df);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_SS)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_REGRESSION_SS, $this->regression_ss);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_MS)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_REGRESSION_MS, $this->regression_ms);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_F)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_REGRESSION_F, $this->regression_f);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_REGRESSION_F_SIGNIFICANCE, $this->regression_f_significance);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_RESIDUAL_DF)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_RESIDUAL_DF, $this->residual_df);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_RESIDUAL_SS)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_RESIDUAL_SS, $this->residual_ss);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_RESIDUAL_MS)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_RESIDUAL_MS, $this->residual_ms);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_TOTAL_DF)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_TOTAL_DF, $this->total_df);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_TOTAL_SS)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_TOTAL_SS, $this->total_ss);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_INTERCEPT_COEFFICIENTS, $this->intercept_coefficients);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_INTERCEPT_STANDARD_ERROR, $this->intercept_standard_error);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_INTERCEPT_T_STAT, $this->intercept_t_stat);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_INTERCEPT_P_VALUE, $this->intercept_p_value);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_INTERCEPT_LOWER, $this->intercept_lower);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_INTERCEPT_UPPER, $this->intercept_upper);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_HH_SIZE_COEFFICIENTS, $this->hh_size_coefficients);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_HH_SIZE_STANDARD_ERROR, $this->hh_size_standard_error);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_HH_SIZE_T_STAT, $this->hh_size_t_stat);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_HH_SIZE_P_VALUE, $this->hh_size_p_value);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_HH_SIZE_LOWER, $this->hh_size_lower);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_HH_SIZE_UPPER, $this->hh_size_upper);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_DATE_TIME_CREATED, $this->date_time_created);
        }
        if ($this->isColumnModified(AnalyzeRegressionTableMap::COL_LAST_UPDATED)) {
            $criteria->add(AnalyzeRegressionTableMap::COL_LAST_UPDATED, $this->last_updated);
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
        $criteria = ChildAnalyzeRegressionQuery::create();
        $criteria->add(AnalyzeRegressionTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \AnalyzeRegression (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setProjectId($this->getProjectId());
        $copyObj->setPhaseId($this->getPhaseId());
        $copyObj->setPhaseComponentId($this->getPhaseComponentId());
        $copyObj->setInput($this->getInput());
        $copyObj->setMultipleR($this->getMultipleR());
        $copyObj->setRSquare($this->getRSquare());
        $copyObj->setAdjustedRSquare($this->getAdjustedRSquare());
        $copyObj->setStandardError($this->getStandardError());
        $copyObj->setObservations($this->getObservations());
        $copyObj->setRegressionDf($this->getRegressionDf());
        $copyObj->setRegressionSs($this->getRegressionSs());
        $copyObj->setRegressionMs($this->getRegressionMs());
        $copyObj->setRegressionF($this->getRegressionF());
        $copyObj->setRegressionFSignificance($this->getRegressionFSignificance());
        $copyObj->setResidualDf($this->getResidualDf());
        $copyObj->setResidualSs($this->getResidualSs());
        $copyObj->setResidualMs($this->getResidualMs());
        $copyObj->setTotalDf($this->getTotalDf());
        $copyObj->setTotalSs($this->getTotalSs());
        $copyObj->setInterceptCoefficients($this->getInterceptCoefficients());
        $copyObj->setInterceptStandardError($this->getInterceptStandardError());
        $copyObj->setInterceptTStat($this->getInterceptTStat());
        $copyObj->setInterceptPValue($this->getInterceptPValue());
        $copyObj->setInterceptLower($this->getInterceptLower());
        $copyObj->setInterceptUpper($this->getInterceptUpper());
        $copyObj->setHhSizeCoefficients($this->getHhSizeCoefficients());
        $copyObj->setHhSizeStandardError($this->getHhSizeStandardError());
        $copyObj->setHhSizeTStat($this->getHhSizeTStat());
        $copyObj->setHhSizePValue($this->getHhSizePValue());
        $copyObj->setHhSizeLower($this->getHhSizeLower());
        $copyObj->setHhSizeUpper($this->getHhSizeUpper());
        $copyObj->setDateTimeCreated($this->getDateTimeCreated());
        $copyObj->setLastUpdated($this->getLastUpdated());
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
     * @return \AnalyzeRegression Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->project_id = null;
        $this->phase_id = null;
        $this->phase_component_id = null;
        $this->input = null;
        $this->multiple_r = null;
        $this->r_square = null;
        $this->adjusted_r_square = null;
        $this->standard_error = null;
        $this->observations = null;
        $this->regression_df = null;
        $this->regression_ss = null;
        $this->regression_ms = null;
        $this->regression_f = null;
        $this->regression_f_significance = null;
        $this->residual_df = null;
        $this->residual_ss = null;
        $this->residual_ms = null;
        $this->total_df = null;
        $this->total_ss = null;
        $this->intercept_coefficients = null;
        $this->intercept_standard_error = null;
        $this->intercept_t_stat = null;
        $this->intercept_p_value = null;
        $this->intercept_lower = null;
        $this->intercept_upper = null;
        $this->hh_size_coefficients = null;
        $this->hh_size_standard_error = null;
        $this->hh_size_t_stat = null;
        $this->hh_size_p_value = null;
        $this->hh_size_lower = null;
        $this->hh_size_upper = null;
        $this->date_time_created = null;
        $this->last_updated = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
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
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AnalyzeRegressionTableMap::DEFAULT_STRING_FORMAT);
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
