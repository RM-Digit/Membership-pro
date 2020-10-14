<?php

namespace Base;

use \ActionTrackingQuery as ChildActionTrackingQuery;
use \Clients as ChildClients;
use \ClientsQuery as ChildClientsQuery;
use \Projects as ChildProjects;
use \ProjectsQuery as ChildProjectsQuery;
use \Users as ChildUsers;
use \UsersQuery as ChildUsersQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ActionTrackingTableMap;
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
 * Base class that represents a row from the 'action_tracking' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class ActionTracking implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ActionTrackingTableMap';


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
     * The value for the project_id field.
     *
     * @var        int
     */
    protected $project_id;

    /**
     * The value for the table_modified field.
     *
     * @var        string
     */
    protected $table_modified;

    /**
     * The value for the record_id field.
     *
     * @var        int
     */
    protected $record_id;

    /**
     * The value for the field_label field.
     *
     * @var        string
     */
    protected $field_label;

    /**
     * The value for the old_value field.
     *
     * @var        string
     */
    protected $old_value;

    /**
     * The value for the new_value field.
     *
     * @var        string
     */
    protected $new_value;

    /**
     * The value for the caption field.
     *
     * @var        string
     */
    protected $caption;

    /**
     * The value for the icon field.
     *
     * @var        string
     */
    protected $icon;

    /**
     * The value for the date_time_created field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $date_time_created;

    /**
     * The value for the user_id field.
     *
     * @var        int
     */
    protected $user_id;

    /**
     * @var        ChildUsers
     */
    protected $aUsers;

    /**
     * @var        ChildProjects
     */
    protected $aProjects;

    /**
     * @var        ChildClients
     */
    protected $aClients;

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
     * Initializes internal state of Base\ActionTracking object.
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
     * Compares this with another <code>ActionTracking</code> instance.  If
     * <code>obj</code> is an instance of <code>ActionTracking</code>, delegates to
     * <code>equals(ActionTracking)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|ActionTracking The current object, for fluid interface
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
     * Get the [project_id] column value.
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * Get the [table_modified] column value.
     *
     * @return string
     */
    public function getTableModified()
    {
        return $this->table_modified;
    }

    /**
     * Get the [record_id] column value.
     *
     * @return int
     */
    public function getRecordId()
    {
        return $this->record_id;
    }

    /**
     * Get the [field_label] column value.
     *
     * @return string
     */
    public function getFieldLabel()
    {
        return $this->field_label;
    }

    /**
     * Get the [old_value] column value.
     *
     * @return string
     */
    public function getOldValue()
    {
        return $this->old_value;
    }

    /**
     * Get the [new_value] column value.
     *
     * @return string
     */
    public function getNewValue()
    {
        return $this->new_value;
    }

    /**
     * Get the [caption] column value.
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Get the [icon] column value.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
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
     * Get the [user_id] column value.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [client_id] column.
     *
     * @param int $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setClientId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->client_id !== $v) {
            $this->client_id = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_CLIENT_ID] = true;
        }

        if ($this->aClients !== null && $this->aClients->getId() !== $v) {
            $this->aClients = null;
        }

        return $this;
    } // setClientId()

    /**
     * Set the value of [project_id] column.
     *
     * @param int $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setProjectId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->project_id !== $v) {
            $this->project_id = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_PROJECT_ID] = true;
        }

        if ($this->aProjects !== null && $this->aProjects->getId() !== $v) {
            $this->aProjects = null;
        }

        return $this;
    } // setProjectId()

    /**
     * Set the value of [table_modified] column.
     *
     * @param string $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setTableModified($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->table_modified !== $v) {
            $this->table_modified = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_TABLE_MODIFIED] = true;
        }

        return $this;
    } // setTableModified()

    /**
     * Set the value of [record_id] column.
     *
     * @param int $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setRecordId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->record_id !== $v) {
            $this->record_id = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_RECORD_ID] = true;
        }

        return $this;
    } // setRecordId()

    /**
     * Set the value of [field_label] column.
     *
     * @param string $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setFieldLabel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->field_label !== $v) {
            $this->field_label = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_FIELD_LABEL] = true;
        }

        return $this;
    } // setFieldLabel()

    /**
     * Set the value of [old_value] column.
     *
     * @param string $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setOldValue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->old_value !== $v) {
            $this->old_value = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_OLD_VALUE] = true;
        }

        return $this;
    } // setOldValue()

    /**
     * Set the value of [new_value] column.
     *
     * @param string $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setNewValue($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->new_value !== $v) {
            $this->new_value = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_NEW_VALUE] = true;
        }

        return $this;
    } // setNewValue()

    /**
     * Set the value of [caption] column.
     *
     * @param string $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setCaption($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->caption !== $v) {
            $this->caption = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_CAPTION] = true;
        }

        return $this;
    } // setCaption()

    /**
     * Set the value of [icon] column.
     *
     * @param string $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setIcon($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->icon !== $v) {
            $this->icon = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_ICON] = true;
        }

        return $this;
    } // setIcon()

    /**
     * Sets the value of [date_time_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setDateTimeCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_time_created !== null || $dt !== null) {
            if ($this->date_time_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_time_created->format("Y-m-d H:i:s.u")) {
                $this->date_time_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ActionTrackingTableMap::COL_DATE_TIME_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateTimeCreated()

    /**
     * Set the value of [user_id] column.
     *
     * @param int $v new value
     * @return $this|\ActionTracking The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[ActionTrackingTableMap::COL_USER_ID] = true;
        }

        if ($this->aUsers !== null && $this->aUsers->getId() !== $v) {
            $this->aUsers = null;
        }

        return $this;
    } // setUserId()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ActionTrackingTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ActionTrackingTableMap::translateFieldName('ClientId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->client_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ActionTrackingTableMap::translateFieldName('ProjectId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->project_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ActionTrackingTableMap::translateFieldName('TableModified', TableMap::TYPE_PHPNAME, $indexType)];
            $this->table_modified = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ActionTrackingTableMap::translateFieldName('RecordId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->record_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ActionTrackingTableMap::translateFieldName('FieldLabel', TableMap::TYPE_PHPNAME, $indexType)];
            $this->field_label = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ActionTrackingTableMap::translateFieldName('OldValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->old_value = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ActionTrackingTableMap::translateFieldName('NewValue', TableMap::TYPE_PHPNAME, $indexType)];
            $this->new_value = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ActionTrackingTableMap::translateFieldName('Caption', TableMap::TYPE_PHPNAME, $indexType)];
            $this->caption = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ActionTrackingTableMap::translateFieldName('Icon', TableMap::TYPE_PHPNAME, $indexType)];
            $this->icon = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ActionTrackingTableMap::translateFieldName('DateTimeCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_time_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ActionTrackingTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 12; // 12 = ActionTrackingTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\ActionTracking'), 0, $e);
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
        if ($this->aProjects !== null && $this->project_id !== $this->aProjects->getId()) {
            $this->aProjects = null;
        }
        if ($this->aUsers !== null && $this->user_id !== $this->aUsers->getId()) {
            $this->aUsers = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(ActionTrackingTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildActionTrackingQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUsers = null;
            $this->aProjects = null;
            $this->aClients = null;
        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see ActionTracking::setDeleted()
     * @see ActionTracking::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ActionTrackingTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildActionTrackingQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ActionTrackingTableMap::DATABASE_NAME);
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
                ActionTrackingTableMap::addInstanceToPool($this);
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

            if ($this->aUsers !== null) {
                if ($this->aUsers->isModified() || $this->aUsers->isNew()) {
                    $affectedRows += $this->aUsers->save($con);
                }
                $this->setUsers($this->aUsers);
            }

            if ($this->aProjects !== null) {
                if ($this->aProjects->isModified() || $this->aProjects->isNew()) {
                    $affectedRows += $this->aProjects->save($con);
                }
                $this->setProjects($this->aProjects);
            }

            if ($this->aClients !== null) {
                if ($this->aClients->isModified() || $this->aClients->isNew()) {
                    $affectedRows += $this->aClients->save($con);
                }
                $this->setClients($this->aClients);
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

        $this->modifiedColumns[ActionTrackingTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ActionTrackingTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ActionTrackingTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_CLIENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`client_id`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_PROJECT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`project_id`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_TABLE_MODIFIED)) {
            $modifiedColumns[':p' . $index++]  = '`table_modified`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_RECORD_ID)) {
            $modifiedColumns[':p' . $index++]  = '`record_id`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_FIELD_LABEL)) {
            $modifiedColumns[':p' . $index++]  = '`field_label`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_OLD_VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`old_value`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_NEW_VALUE)) {
            $modifiedColumns[':p' . $index++]  = '`new_value`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_CAPTION)) {
            $modifiedColumns[':p' . $index++]  = '`caption`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_ICON)) {
            $modifiedColumns[':p' . $index++]  = '`icon`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_DATE_TIME_CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`date_time_created`';
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`user_id`';
        }

        $sql = sprintf(
            'INSERT INTO `action_tracking` (%s) VALUES (%s)',
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
                    case '`project_id`':
                        $stmt->bindValue($identifier, $this->project_id, PDO::PARAM_INT);
                        break;
                    case '`table_modified`':
                        $stmt->bindValue($identifier, $this->table_modified, PDO::PARAM_STR);
                        break;
                    case '`record_id`':
                        $stmt->bindValue($identifier, $this->record_id, PDO::PARAM_INT);
                        break;
                    case '`field_label`':
                        $stmt->bindValue($identifier, $this->field_label, PDO::PARAM_STR);
                        break;
                    case '`old_value`':
                        $stmt->bindValue($identifier, $this->old_value, PDO::PARAM_STR);
                        break;
                    case '`new_value`':
                        $stmt->bindValue($identifier, $this->new_value, PDO::PARAM_STR);
                        break;
                    case '`caption`':
                        $stmt->bindValue($identifier, $this->caption, PDO::PARAM_STR);
                        break;
                    case '`icon`':
                        $stmt->bindValue($identifier, $this->icon, PDO::PARAM_STR);
                        break;
                    case '`date_time_created`':
                        $stmt->bindValue($identifier, $this->date_time_created ? $this->date_time_created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`user_id`':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
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
        $pos = ActionTrackingTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getProjectId();
                break;
            case 3:
                return $this->getTableModified();
                break;
            case 4:
                return $this->getRecordId();
                break;
            case 5:
                return $this->getFieldLabel();
                break;
            case 6:
                return $this->getOldValue();
                break;
            case 7:
                return $this->getNewValue();
                break;
            case 8:
                return $this->getCaption();
                break;
            case 9:
                return $this->getIcon();
                break;
            case 10:
                return $this->getDateTimeCreated();
                break;
            case 11:
                return $this->getUserId();
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

        if (isset($alreadyDumpedObjects['ActionTracking'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['ActionTracking'][$this->hashCode()] = true;
        $keys = ActionTrackingTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getClientId(),
            $keys[2] => $this->getProjectId(),
            $keys[3] => $this->getTableModified(),
            $keys[4] => $this->getRecordId(),
            $keys[5] => $this->getFieldLabel(),
            $keys[6] => $this->getOldValue(),
            $keys[7] => $this->getNewValue(),
            $keys[8] => $this->getCaption(),
            $keys[9] => $this->getIcon(),
            $keys[10] => $this->getDateTimeCreated(),
            $keys[11] => $this->getUserId(),
        );
        if ($result[$keys[10]] instanceof \DateTimeInterface) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aUsers) {

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

                $result[$key] = $this->aUsers->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aProjects) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'projects';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'projects';
                        break;
                    default:
                        $key = 'Projects';
                }

                $result[$key] = $this->aProjects->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
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
     * @return $this|\ActionTracking
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ActionTrackingTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\ActionTracking
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
                $this->setProjectId($value);
                break;
            case 3:
                $this->setTableModified($value);
                break;
            case 4:
                $this->setRecordId($value);
                break;
            case 5:
                $this->setFieldLabel($value);
                break;
            case 6:
                $this->setOldValue($value);
                break;
            case 7:
                $this->setNewValue($value);
                break;
            case 8:
                $this->setCaption($value);
                break;
            case 9:
                $this->setIcon($value);
                break;
            case 10:
                $this->setDateTimeCreated($value);
                break;
            case 11:
                $this->setUserId($value);
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
        $keys = ActionTrackingTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setClientId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setProjectId($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setTableModified($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setRecordId($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setFieldLabel($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setOldValue($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setNewValue($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setCaption($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setIcon($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setDateTimeCreated($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setUserId($arr[$keys[11]]);
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
     * @return $this|\ActionTracking The current object, for fluid interface
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
        $criteria = new Criteria(ActionTrackingTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ActionTrackingTableMap::COL_ID)) {
            $criteria->add(ActionTrackingTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_CLIENT_ID)) {
            $criteria->add(ActionTrackingTableMap::COL_CLIENT_ID, $this->client_id);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_PROJECT_ID)) {
            $criteria->add(ActionTrackingTableMap::COL_PROJECT_ID, $this->project_id);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_TABLE_MODIFIED)) {
            $criteria->add(ActionTrackingTableMap::COL_TABLE_MODIFIED, $this->table_modified);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_RECORD_ID)) {
            $criteria->add(ActionTrackingTableMap::COL_RECORD_ID, $this->record_id);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_FIELD_LABEL)) {
            $criteria->add(ActionTrackingTableMap::COL_FIELD_LABEL, $this->field_label);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_OLD_VALUE)) {
            $criteria->add(ActionTrackingTableMap::COL_OLD_VALUE, $this->old_value);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_NEW_VALUE)) {
            $criteria->add(ActionTrackingTableMap::COL_NEW_VALUE, $this->new_value);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_CAPTION)) {
            $criteria->add(ActionTrackingTableMap::COL_CAPTION, $this->caption);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_ICON)) {
            $criteria->add(ActionTrackingTableMap::COL_ICON, $this->icon);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_DATE_TIME_CREATED)) {
            $criteria->add(ActionTrackingTableMap::COL_DATE_TIME_CREATED, $this->date_time_created);
        }
        if ($this->isColumnModified(ActionTrackingTableMap::COL_USER_ID)) {
            $criteria->add(ActionTrackingTableMap::COL_USER_ID, $this->user_id);
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
        $criteria = ChildActionTrackingQuery::create();
        $criteria->add(ActionTrackingTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \ActionTracking (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setClientId($this->getClientId());
        $copyObj->setProjectId($this->getProjectId());
        $copyObj->setTableModified($this->getTableModified());
        $copyObj->setRecordId($this->getRecordId());
        $copyObj->setFieldLabel($this->getFieldLabel());
        $copyObj->setOldValue($this->getOldValue());
        $copyObj->setNewValue($this->getNewValue());
        $copyObj->setCaption($this->getCaption());
        $copyObj->setIcon($this->getIcon());
        $copyObj->setDateTimeCreated($this->getDateTimeCreated());
        $copyObj->setUserId($this->getUserId());
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
     * @return \ActionTracking Clone of current object.
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
     * Declares an association between this object and a ChildUsers object.
     *
     * @param  ChildUsers $v
     * @return $this|\ActionTracking The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUsers(ChildUsers $v = null)
    {
        if ($v === null) {
            $this->setUserId(NULL);
        } else {
            $this->setUserId($v->getId());
        }

        $this->aUsers = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addActionTracking($this);
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
    public function getUsers(ConnectionInterface $con = null)
    {
        if ($this->aUsers === null && ($this->user_id != 0)) {
            $this->aUsers = ChildUsersQuery::create()->findPk($this->user_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUsers->addActionTrackings($this);
             */
        }

        return $this->aUsers;
    }

    /**
     * Declares an association between this object and a ChildProjects object.
     *
     * @param  ChildProjects $v
     * @return $this|\ActionTracking The current object (for fluent API support)
     * @throws PropelException
     */
    public function setProjects(ChildProjects $v = null)
    {
        if ($v === null) {
            $this->setProjectId(NULL);
        } else {
            $this->setProjectId($v->getId());
        }

        $this->aProjects = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildProjects object, it will not be re-added.
        if ($v !== null) {
            $v->addActionTracking($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildProjects object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildProjects The associated ChildProjects object.
     * @throws PropelException
     */
    public function getProjects(ConnectionInterface $con = null)
    {
        if ($this->aProjects === null && ($this->project_id != 0)) {
            $this->aProjects = ChildProjectsQuery::create()->findPk($this->project_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aProjects->addActionTrackings($this);
             */
        }

        return $this->aProjects;
    }

    /**
     * Declares an association between this object and a ChildClients object.
     *
     * @param  ChildClients $v
     * @return $this|\ActionTracking The current object (for fluent API support)
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
            $v->addActionTracking($this);
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
                $this->aClients->addActionTrackings($this);
             */
        }

        return $this->aClients;
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aUsers) {
            $this->aUsers->removeActionTracking($this);
        }
        if (null !== $this->aProjects) {
            $this->aProjects->removeActionTracking($this);
        }
        if (null !== $this->aClients) {
            $this->aClients->removeActionTracking($this);
        }
        $this->id = null;
        $this->client_id = null;
        $this->project_id = null;
        $this->table_modified = null;
        $this->record_id = null;
        $this->field_label = null;
        $this->old_value = null;
        $this->new_value = null;
        $this->caption = null;
        $this->icon = null;
        $this->date_time_created = null;
        $this->user_id = null;
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

        $this->aUsers = null;
        $this->aProjects = null;
        $this->aClients = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ActionTrackingTableMap::DEFAULT_STRING_FORMAT);
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
