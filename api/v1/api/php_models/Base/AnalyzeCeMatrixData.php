<?php

namespace Base;

use \AnalyzeCeMatrix as ChildAnalyzeCeMatrix;
use \AnalyzeCeMatrixDataQuery as ChildAnalyzeCeMatrixDataQuery;
use \AnalyzeCeMatrixOutputs as ChildAnalyzeCeMatrixOutputs;
use \AnalyzeCeMatrixOutputsQuery as ChildAnalyzeCeMatrixOutputsQuery;
use \AnalyzeCeMatrixQuery as ChildAnalyzeCeMatrixQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\AnalyzeCeMatrixDataTableMap;
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
 * Base class that represents a row from the 'analyze_ce_matrix_data' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class AnalyzeCeMatrixData implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\AnalyzeCeMatrixDataTableMap';


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
     * The value for the matrix_id field.
     *
     * @var        int
     */
    protected $matrix_id;

    /**
     * The value for the matrix_output_id field.
     *
     * @var        int
     */
    protected $matrix_output_id;

    /**
     * The value for the correlation field.
     *
     * @var        string
     */
    protected $correlation;

    /**
     * The value for the date_time_created field.
     *
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
     * @var        ChildAnalyzeCeMatrix
     */
    protected $aAnalyzeCeMatrix;

    /**
     * @var        ChildAnalyzeCeMatrixOutputs
     */
    protected $aAnalyzeCeMatrixOutputs;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
    }

    /**
     * Initializes internal state of Base\AnalyzeCeMatrixData object.
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
     * Compares this with another <code>AnalyzeCeMatrixData</code> instance.  If
     * <code>obj</code> is an instance of <code>AnalyzeCeMatrixData</code>, delegates to
     * <code>equals(AnalyzeCeMatrixData)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|AnalyzeCeMatrixData The current object, for fluid interface
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
     * Get the [matrix_id] column value.
     *
     * @return int
     */
    public function getMatrixId()
    {
        return $this->matrix_id;
    }

    /**
     * Get the [matrix_output_id] column value.
     *
     * @return int
     */
    public function getMatrixOutputId()
    {
        return $this->matrix_output_id;
    }

    /**
     * Get the [correlation] column value.
     *
     * @return string
     */
    public function getCorrelation()
    {
        return $this->correlation;
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
     * @return $this|\AnalyzeCeMatrixData The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[AnalyzeCeMatrixDataTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [matrix_id] column.
     *
     * @param int $v new value
     * @return $this|\AnalyzeCeMatrixData The current object (for fluent API support)
     */
    public function setMatrixId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->matrix_id !== $v) {
            $this->matrix_id = $v;
            $this->modifiedColumns[AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID] = true;
        }

        if ($this->aAnalyzeCeMatrix !== null && $this->aAnalyzeCeMatrix->getId() !== $v) {
            $this->aAnalyzeCeMatrix = null;
        }

        return $this;
    } // setMatrixId()

    /**
     * Set the value of [matrix_output_id] column.
     *
     * @param int $v new value
     * @return $this|\AnalyzeCeMatrixData The current object (for fluent API support)
     */
    public function setMatrixOutputId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->matrix_output_id !== $v) {
            $this->matrix_output_id = $v;
            $this->modifiedColumns[AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID] = true;
        }

        if ($this->aAnalyzeCeMatrixOutputs !== null && $this->aAnalyzeCeMatrixOutputs->getId() !== $v) {
            $this->aAnalyzeCeMatrixOutputs = null;
        }

        return $this;
    } // setMatrixOutputId()

    /**
     * Set the value of [correlation] column.
     *
     * @param string $v new value
     * @return $this|\AnalyzeCeMatrixData The current object (for fluent API support)
     */
    public function setCorrelation($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->correlation !== $v) {
            $this->correlation = $v;
            $this->modifiedColumns[AnalyzeCeMatrixDataTableMap::COL_CORRELATION] = true;
        }

        return $this;
    } // setCorrelation()

    /**
     * Sets the value of [date_time_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\AnalyzeCeMatrixData The current object (for fluent API support)
     */
    public function setDateTimeCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_time_created !== null || $dt !== null) {
            if ($this->date_time_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_time_created->format("Y-m-d H:i:s.u")) {
                $this->date_time_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateTimeCreated()

    /**
     * Sets the value of [last_updated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\AnalyzeCeMatrixData The current object (for fluent API support)
     */
    public function setLastUpdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_updated !== null || $dt !== null) {
            if ($this->last_updated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_updated->format("Y-m-d H:i:s.u")) {
                $this->last_updated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED] = true;
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : AnalyzeCeMatrixDataTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : AnalyzeCeMatrixDataTableMap::translateFieldName('MatrixId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->matrix_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : AnalyzeCeMatrixDataTableMap::translateFieldName('MatrixOutputId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->matrix_output_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : AnalyzeCeMatrixDataTableMap::translateFieldName('Correlation', TableMap::TYPE_PHPNAME, $indexType)];
            $this->correlation = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : AnalyzeCeMatrixDataTableMap::translateFieldName('DateTimeCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_time_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : AnalyzeCeMatrixDataTableMap::translateFieldName('LastUpdated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_updated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 6; // 6 = AnalyzeCeMatrixDataTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\AnalyzeCeMatrixData'), 0, $e);
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
        if ($this->aAnalyzeCeMatrix !== null && $this->matrix_id !== $this->aAnalyzeCeMatrix->getId()) {
            $this->aAnalyzeCeMatrix = null;
        }
        if ($this->aAnalyzeCeMatrixOutputs !== null && $this->matrix_output_id !== $this->aAnalyzeCeMatrixOutputs->getId()) {
            $this->aAnalyzeCeMatrixOutputs = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildAnalyzeCeMatrixDataQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAnalyzeCeMatrix = null;
            $this->aAnalyzeCeMatrixOutputs = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see AnalyzeCeMatrixData::setDeleted()
     * @see AnalyzeCeMatrixData::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildAnalyzeCeMatrixDataQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
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
                AnalyzeCeMatrixDataTableMap::addInstanceToPool($this);
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

            if ($this->aAnalyzeCeMatrix !== null) {
                if ($this->aAnalyzeCeMatrix->isModified() || $this->aAnalyzeCeMatrix->isNew()) {
                    $affectedRows += $this->aAnalyzeCeMatrix->save($con);
                }
                $this->setAnalyzeCeMatrix($this->aAnalyzeCeMatrix);
            }

            if ($this->aAnalyzeCeMatrixOutputs !== null) {
                if ($this->aAnalyzeCeMatrixOutputs->isModified() || $this->aAnalyzeCeMatrixOutputs->isNew()) {
                    $affectedRows += $this->aAnalyzeCeMatrixOutputs->save($con);
                }
                $this->setAnalyzeCeMatrixOutputs($this->aAnalyzeCeMatrixOutputs);
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

        $this->modifiedColumns[AnalyzeCeMatrixDataTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . AnalyzeCeMatrixDataTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID)) {
            $modifiedColumns[':p' . $index++]  = '`matrix_id`';
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`matrix_output_id`';
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_CORRELATION)) {
            $modifiedColumns[':p' . $index++]  = '`correlation`';
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`date_time_created`';
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED)) {
            $modifiedColumns[':p' . $index++]  = '`last_updated`';
        }

        $sql = sprintf(
            'INSERT INTO `analyze_ce_matrix_data` (%s) VALUES (%s)',
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
                    case '`matrix_id`':
                        $stmt->bindValue($identifier, $this->matrix_id, PDO::PARAM_INT);
                        break;
                    case '`matrix_output_id`':
                        $stmt->bindValue($identifier, $this->matrix_output_id, PDO::PARAM_INT);
                        break;
                    case '`correlation`':
                        $stmt->bindValue($identifier, $this->correlation, PDO::PARAM_STR);
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
        $pos = AnalyzeCeMatrixDataTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getMatrixId();
                break;
            case 2:
                return $this->getMatrixOutputId();
                break;
            case 3:
                return $this->getCorrelation();
                break;
            case 4:
                return $this->getDateTimeCreated();
                break;
            case 5:
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

        if (isset($alreadyDumpedObjects['AnalyzeCeMatrixData'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AnalyzeCeMatrixData'][$this->hashCode()] = true;
        $keys = AnalyzeCeMatrixDataTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getMatrixId(),
            $keys[2] => $this->getMatrixOutputId(),
            $keys[3] => $this->getCorrelation(),
            $keys[4] => $this->getDateTimeCreated(),
            $keys[5] => $this->getLastUpdated(),
        );
        if ($result[$keys[4]] instanceof \DateTimeInterface) {
            $result[$keys[4]] = $result[$keys[4]]->format('c');
        }

        if ($result[$keys[5]] instanceof \DateTimeInterface) {
            $result[$keys[5]] = $result[$keys[5]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aAnalyzeCeMatrix) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'analyzeCeMatrix';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'analyze_ce_matrix';
                        break;
                    default:
                        $key = 'AnalyzeCeMatrix';
                }

                $result[$key] = $this->aAnalyzeCeMatrix->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAnalyzeCeMatrixOutputs) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'analyzeCeMatrixOutputs';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'analyze_ce_matrix_outputs';
                        break;
                    default:
                        $key = 'AnalyzeCeMatrixOutputs';
                }

                $result[$key] = $this->aAnalyzeCeMatrixOutputs->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
     * @return $this|\AnalyzeCeMatrixData
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = AnalyzeCeMatrixDataTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\AnalyzeCeMatrixData
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setMatrixId($value);
                break;
            case 2:
                $this->setMatrixOutputId($value);
                break;
            case 3:
                $this->setCorrelation($value);
                break;
            case 4:
                $this->setDateTimeCreated($value);
                break;
            case 5:
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
        $keys = AnalyzeCeMatrixDataTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setMatrixId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setMatrixOutputId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setCorrelation($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setDateTimeCreated($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setLastUpdated($arr[$keys[5]]);
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
     * @return $this|\AnalyzeCeMatrixData The current object, for fluid interface
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
        $criteria = new Criteria(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);

        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_ID)) {
            $criteria->add(AnalyzeCeMatrixDataTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID)) {
            $criteria->add(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID, $this->matrix_id);
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID)) {
            $criteria->add(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID, $this->matrix_output_id);
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_CORRELATION)) {
            $criteria->add(AnalyzeCeMatrixDataTableMap::COL_CORRELATION, $this->correlation);
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED)) {
            $criteria->add(AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED, $this->date_time_created);
        }
        if ($this->isColumnModified(AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED)) {
            $criteria->add(AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED, $this->last_updated);
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
        $criteria = ChildAnalyzeCeMatrixDataQuery::create();
        $criteria->add(AnalyzeCeMatrixDataTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \AnalyzeCeMatrixData (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMatrixId($this->getMatrixId());
        $copyObj->setMatrixOutputId($this->getMatrixOutputId());
        $copyObj->setCorrelation($this->getCorrelation());
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
     * @return \AnalyzeCeMatrixData Clone of current object.
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
     * Declares an association between this object and a ChildAnalyzeCeMatrix object.
     *
     * @param  ChildAnalyzeCeMatrix $v
     * @return $this|\AnalyzeCeMatrixData The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAnalyzeCeMatrix(ChildAnalyzeCeMatrix $v = null)
    {
        if ($v === null) {
            $this->setMatrixId(NULL);
        } else {
            $this->setMatrixId($v->getId());
        }

        $this->aAnalyzeCeMatrix = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAnalyzeCeMatrix object, it will not be re-added.
        if ($v !== null) {
            $v->addAnalyzeCeMatrixData($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAnalyzeCeMatrix object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAnalyzeCeMatrix The associated ChildAnalyzeCeMatrix object.
     * @throws PropelException
     */
    public function getAnalyzeCeMatrix(ConnectionInterface $con = null)
    {
        if ($this->aAnalyzeCeMatrix === null && ($this->matrix_id != 0)) {
            $this->aAnalyzeCeMatrix = ChildAnalyzeCeMatrixQuery::create()->findPk($this->matrix_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAnalyzeCeMatrix->addAnalyzeCeMatrixDatas($this);
             */
        }

        return $this->aAnalyzeCeMatrix;
    }

    /**
     * Declares an association between this object and a ChildAnalyzeCeMatrixOutputs object.
     *
     * @param  ChildAnalyzeCeMatrixOutputs $v
     * @return $this|\AnalyzeCeMatrixData The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAnalyzeCeMatrixOutputs(ChildAnalyzeCeMatrixOutputs $v = null)
    {
        if ($v === null) {
            $this->setMatrixOutputId(NULL);
        } else {
            $this->setMatrixOutputId($v->getId());
        }

        $this->aAnalyzeCeMatrixOutputs = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAnalyzeCeMatrixOutputs object, it will not be re-added.
        if ($v !== null) {
            $v->addAnalyzeCeMatrixData($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAnalyzeCeMatrixOutputs object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAnalyzeCeMatrixOutputs The associated ChildAnalyzeCeMatrixOutputs object.
     * @throws PropelException
     */
    public function getAnalyzeCeMatrixOutputs(ConnectionInterface $con = null)
    {
        if ($this->aAnalyzeCeMatrixOutputs === null && ($this->matrix_output_id != 0)) {
            $this->aAnalyzeCeMatrixOutputs = ChildAnalyzeCeMatrixOutputsQuery::create()->findPk($this->matrix_output_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAnalyzeCeMatrixOutputs->addAnalyzeCeMatrixDatas($this);
             */
        }

        return $this->aAnalyzeCeMatrixOutputs;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aAnalyzeCeMatrix) {
            $this->aAnalyzeCeMatrix->removeAnalyzeCeMatrixData($this);
        }
        if (null !== $this->aAnalyzeCeMatrixOutputs) {
            $this->aAnalyzeCeMatrixOutputs->removeAnalyzeCeMatrixData($this);
        }
        $this->id = null;
        $this->matrix_id = null;
        $this->matrix_output_id = null;
        $this->correlation = null;
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
        } // if ($deep)

        $this->aAnalyzeCeMatrix = null;
        $this->aAnalyzeCeMatrixOutputs = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AnalyzeCeMatrixDataTableMap::DEFAULT_STRING_FORMAT);
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
