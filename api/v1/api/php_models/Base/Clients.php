<?php

namespace Base;

use \AccessLevelOptions as ChildAccessLevelOptions;
use \AccessLevelOptionsQuery as ChildAccessLevelOptionsQuery;
use \AccessLevels as ChildAccessLevels;
use \AccessLevelsQuery as ChildAccessLevelsQuery;
use \ActionTracking as ChildActionTracking;
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
use Map\AccessLevelOptionsTableMap;
use Map\AccessLevelsTableMap;
use Map\ActionTrackingTableMap;
use Map\ClientsTableMap;
use Map\ProjectsTableMap;
use Map\UsersTableMap;
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
 * Base class that represents a row from the 'clients' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Clients implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\ClientsTableMap';


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
     * The value for the name field.
     *
     * @var        string
     */
    protected $name;

    /**
     * The value for the email_address field.
     *
     * @var        string
     */
    protected $email_address;

    /**
     * The value for the phone field.
     *
     * @var        string
     */
    protected $phone;

    /**
     * The value for the primary_contact field.
     *
     * @var        string
     */
    protected $primary_contact;

    /**
     * The value for the street field.
     *
     * @var        string
     */
    protected $street;

    /**
     * The value for the city field.
     *
     * @var        string
     */
    protected $city;

    /**
     * The value for the state field.
     *
     * @var        string
     */
    protected $state;

    /**
     * The value for the zip field.
     *
     * @var        string
     */
    protected $zip;

    /**
     * The value for the country field.
     *
     * @var        string
     */
    protected $country;

    /**
     * The value for the province field.
     *
     * @var        string
     */
    protected $province;

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
     * The value for the user_id field.
     *
     * @var        int
     */
    protected $user_id;

    /**
     * The value for the wordpress_id field.
     *
     * @var        int
     */
    protected $wordpress_id;

    /**
     * @var        ObjectCollection|ChildAccessLevelOptions[] Collection to store aggregation of ChildAccessLevelOptions objects.
     */
    protected $collAccessLevelOptionss;
    protected $collAccessLevelOptionssPartial;

    /**
     * @var        ObjectCollection|ChildAccessLevels[] Collection to store aggregation of ChildAccessLevels objects.
     */
    protected $collAccessLevelss;
    protected $collAccessLevelssPartial;

    /**
     * @var        ObjectCollection|ChildActionTracking[] Collection to store aggregation of ChildActionTracking objects.
     */
    protected $collActionTrackings;
    protected $collActionTrackingsPartial;

    /**
     * @var        ObjectCollection|ChildProjects[] Collection to store aggregation of ChildProjects objects.
     */
    protected $collProjectss;
    protected $collProjectssPartial;

    /**
     * @var        ObjectCollection|ChildUsers[] Collection to store aggregation of ChildUsers objects.
     */
    protected $collUserss;
    protected $collUserssPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAccessLevelOptions[]
     */
    protected $accessLevelOptionssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildAccessLevels[]
     */
    protected $accessLevelssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildActionTracking[]
     */
    protected $actionTrackingsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProjects[]
     */
    protected $projectssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildUsers[]
     */
    protected $userssScheduledForDeletion = null;

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
     * Initializes internal state of Base\Clients object.
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
     * Compares this with another <code>Clients</code> instance.  If
     * <code>obj</code> is an instance of <code>Clients</code>, delegates to
     * <code>equals(Clients)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Clients The current object, for fluid interface
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
     * Get the [name] column value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [email_address] column value.
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [primary_contact] column value.
     *
     * @return string
     */
    public function getPrimaryContact()
    {
        return $this->primary_contact;
    }

    /**
     * Get the [street] column value.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Get the [city] column value.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get the [state] column value.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Get the [zip] column value.
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Get the [country] column value.
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get the [province] column value.
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
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
     * Get the [user_id] column value.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Get the [wordpress_id] column value.
     *
     * @return int
     */
    public function getWordpressId()
    {
        return $this->wordpress_id;
    }

    /**
     * Set the value of [id] column.
     *
     * @param int $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[ClientsTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [name] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[ClientsTableMap::COL_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [email_address] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setEmailAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email_address !== $v) {
            $this->email_address = $v;
            $this->modifiedColumns[ClientsTableMap::COL_EMAIL_ADDRESS] = true;
        }

        return $this;
    } // setEmailAddress()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[ClientsTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [primary_contact] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setPrimaryContact($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->primary_contact !== $v) {
            $this->primary_contact = $v;
            $this->modifiedColumns[ClientsTableMap::COL_PRIMARY_CONTACT] = true;
        }

        return $this;
    } // setPrimaryContact()

    /**
     * Set the value of [street] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setStreet($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->street !== $v) {
            $this->street = $v;
            $this->modifiedColumns[ClientsTableMap::COL_STREET] = true;
        }

        return $this;
    } // setStreet()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[ClientsTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [state] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[ClientsTableMap::COL_STATE] = true;
        }

        return $this;
    } // setState()

    /**
     * Set the value of [zip] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[ClientsTableMap::COL_ZIP] = true;
        }

        return $this;
    } // setZip()

    /**
     * Set the value of [country] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setCountry($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->country !== $v) {
            $this->country = $v;
            $this->modifiedColumns[ClientsTableMap::COL_COUNTRY] = true;
        }

        return $this;
    } // setCountry()

    /**
     * Set the value of [province] column.
     *
     * @param string $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setProvince($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->province !== $v) {
            $this->province = $v;
            $this->modifiedColumns[ClientsTableMap::COL_PROVINCE] = true;
        }

        return $this;
    } // setProvince()

    /**
     * Sets the value of [date_time_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setDateTimeCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_time_created !== null || $dt !== null) {
            if ($this->date_time_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_time_created->format("Y-m-d H:i:s.u")) {
                $this->date_time_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ClientsTableMap::COL_DATE_TIME_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateTimeCreated()

    /**
     * Sets the value of [last_updated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setLastUpdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_updated !== null || $dt !== null) {
            if ($this->last_updated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_updated->format("Y-m-d H:i:s.u")) {
                $this->last_updated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[ClientsTableMap::COL_LAST_UPDATED] = true;
            }
        } // if either are not null

        return $this;
    } // setLastUpdated()

    /**
     * Set the value of [user_id] column.
     *
     * @param int $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setUserId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[ClientsTableMap::COL_USER_ID] = true;
        }

        return $this;
    } // setUserId()

    /**
     * Set the value of [wordpress_id] column.
     *
     * @param int $v new value
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function setWordpressId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->wordpress_id !== $v) {
            $this->wordpress_id = $v;
            $this->modifiedColumns[ClientsTableMap::COL_WORDPRESS_ID] = true;
        }

        return $this;
    } // setWordpressId()

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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ClientsTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ClientsTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ClientsTableMap::translateFieldName('EmailAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email_address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ClientsTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ClientsTableMap::translateFieldName('PrimaryContact', TableMap::TYPE_PHPNAME, $indexType)];
            $this->primary_contact = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ClientsTableMap::translateFieldName('Street', TableMap::TYPE_PHPNAME, $indexType)];
            $this->street = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ClientsTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ClientsTableMap::translateFieldName('State', TableMap::TYPE_PHPNAME, $indexType)];
            $this->state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ClientsTableMap::translateFieldName('Zip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ClientsTableMap::translateFieldName('Country', TableMap::TYPE_PHPNAME, $indexType)];
            $this->country = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ClientsTableMap::translateFieldName('Province', TableMap::TYPE_PHPNAME, $indexType)];
            $this->province = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ClientsTableMap::translateFieldName('DateTimeCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_time_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ClientsTableMap::translateFieldName('LastUpdated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_updated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ClientsTableMap::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ClientsTableMap::translateFieldName('WordpressId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->wordpress_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 15; // 15 = ClientsTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Clients'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(ClientsTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildClientsQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAccessLevelOptionss = null;

            $this->collAccessLevelss = null;

            $this->collActionTrackings = null;

            $this->collProjectss = null;

            $this->collUserss = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Clients::setDeleted()
     * @see Clients::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(ClientsTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildClientsQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(ClientsTableMap::DATABASE_NAME);
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
                ClientsTableMap::addInstanceToPool($this);
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

            if ($this->accessLevelOptionssScheduledForDeletion !== null) {
                if (!$this->accessLevelOptionssScheduledForDeletion->isEmpty()) {
                    \AccessLevelOptionsQuery::create()
                        ->filterByPrimaryKeys($this->accessLevelOptionssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->accessLevelOptionssScheduledForDeletion = null;
                }
            }

            if ($this->collAccessLevelOptionss !== null) {
                foreach ($this->collAccessLevelOptionss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->accessLevelssScheduledForDeletion !== null) {
                if (!$this->accessLevelssScheduledForDeletion->isEmpty()) {
                    \AccessLevelsQuery::create()
                        ->filterByPrimaryKeys($this->accessLevelssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->accessLevelssScheduledForDeletion = null;
                }
            }

            if ($this->collAccessLevelss !== null) {
                foreach ($this->collAccessLevelss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
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

            if ($this->projectssScheduledForDeletion !== null) {
                if (!$this->projectssScheduledForDeletion->isEmpty()) {
                    \ProjectsQuery::create()
                        ->filterByPrimaryKeys($this->projectssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->projectssScheduledForDeletion = null;
                }
            }

            if ($this->collProjectss !== null) {
                foreach ($this->collProjectss as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->userssScheduledForDeletion !== null) {
                if (!$this->userssScheduledForDeletion->isEmpty()) {
                    \UsersQuery::create()
                        ->filterByPrimaryKeys($this->userssScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->userssScheduledForDeletion = null;
                }
            }

            if ($this->collUserss !== null) {
                foreach ($this->collUserss as $referrerFK) {
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

        $this->modifiedColumns[ClientsTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientsTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(ClientsTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`name`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_EMAIL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`email_address`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_PRIMARY_CONTACT)) {
            $modifiedColumns[':p' . $index++]  = '`primary_contact`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_STREET)) {
            $modifiedColumns[':p' . $index++]  = '`street`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`city`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`state`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_ZIP)) {
            $modifiedColumns[':p' . $index++]  = '`zip`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_COUNTRY)) {
            $modifiedColumns[':p' . $index++]  = '`country`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_PROVINCE)) {
            $modifiedColumns[':p' . $index++]  = '`province`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_DATE_TIME_CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`date_time_created`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_LAST_UPDATED)) {
            $modifiedColumns[':p' . $index++]  = '`last_updated`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = '`user_id`';
        }
        if ($this->isColumnModified(ClientsTableMap::COL_WORDPRESS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`wordpress_id`';
        }

        $sql = sprintf(
            'INSERT INTO `clients` (%s) VALUES (%s)',
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
                    case '`name`':
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '`email_address`':
                        $stmt->bindValue($identifier, $this->email_address, PDO::PARAM_STR);
                        break;
                    case '`phone`':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case '`primary_contact`':
                        $stmt->bindValue($identifier, $this->primary_contact, PDO::PARAM_STR);
                        break;
                    case '`street`':
                        $stmt->bindValue($identifier, $this->street, PDO::PARAM_STR);
                        break;
                    case '`city`':
                        $stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);
                        break;
                    case '`state`':
                        $stmt->bindValue($identifier, $this->state, PDO::PARAM_STR);
                        break;
                    case '`zip`':
                        $stmt->bindValue($identifier, $this->zip, PDO::PARAM_STR);
                        break;
                    case '`country`':
                        $stmt->bindValue($identifier, $this->country, PDO::PARAM_STR);
                        break;
                    case '`province`':
                        $stmt->bindValue($identifier, $this->province, PDO::PARAM_STR);
                        break;
                    case '`date_time_created`':
                        $stmt->bindValue($identifier, $this->date_time_created ? $this->date_time_created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`last_updated`':
                        $stmt->bindValue($identifier, $this->last_updated ? $this->last_updated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`user_id`':
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case '`wordpress_id`':
                        $stmt->bindValue($identifier, $this->wordpress_id, PDO::PARAM_INT);
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
        $pos = ClientsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getEmailAddress();
                break;
            case 3:
                return $this->getPhone();
                break;
            case 4:
                return $this->getPrimaryContact();
                break;
            case 5:
                return $this->getStreet();
                break;
            case 6:
                return $this->getCity();
                break;
            case 7:
                return $this->getState();
                break;
            case 8:
                return $this->getZip();
                break;
            case 9:
                return $this->getCountry();
                break;
            case 10:
                return $this->getProvince();
                break;
            case 11:
                return $this->getDateTimeCreated();
                break;
            case 12:
                return $this->getLastUpdated();
                break;
            case 13:
                return $this->getUserId();
                break;
            case 14:
                return $this->getWordpressId();
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

        if (isset($alreadyDumpedObjects['Clients'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Clients'][$this->hashCode()] = true;
        $keys = ClientsTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getEmailAddress(),
            $keys[3] => $this->getPhone(),
            $keys[4] => $this->getPrimaryContact(),
            $keys[5] => $this->getStreet(),
            $keys[6] => $this->getCity(),
            $keys[7] => $this->getState(),
            $keys[8] => $this->getZip(),
            $keys[9] => $this->getCountry(),
            $keys[10] => $this->getProvince(),
            $keys[11] => $this->getDateTimeCreated(),
            $keys[12] => $this->getLastUpdated(),
            $keys[13] => $this->getUserId(),
            $keys[14] => $this->getWordpressId(),
        );
        if ($result[$keys[11]] instanceof \DateTimeInterface) {
            $result[$keys[11]] = $result[$keys[11]]->format('c');
        }

        if ($result[$keys[12]] instanceof \DateTimeInterface) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }

        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->collAccessLevelOptionss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'accessLevelOptionss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'access_level_optionss';
                        break;
                    default:
                        $key = 'AccessLevelOptionss';
                }

                $result[$key] = $this->collAccessLevelOptionss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAccessLevelss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'accessLevelss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'access_levelss';
                        break;
                    default:
                        $key = 'AccessLevelss';
                }

                $result[$key] = $this->collAccessLevelss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
            if (null !== $this->collProjectss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'projectss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'projectss';
                        break;
                    default:
                        $key = 'Projectss';
                }

                $result[$key] = $this->collProjectss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUserss) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'userss';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'userss';
                        break;
                    default:
                        $key = 'Userss';
                }

                $result[$key] = $this->collUserss->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Clients
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = ClientsTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Clients
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setEmailAddress($value);
                break;
            case 3:
                $this->setPhone($value);
                break;
            case 4:
                $this->setPrimaryContact($value);
                break;
            case 5:
                $this->setStreet($value);
                break;
            case 6:
                $this->setCity($value);
                break;
            case 7:
                $this->setState($value);
                break;
            case 8:
                $this->setZip($value);
                break;
            case 9:
                $this->setCountry($value);
                break;
            case 10:
                $this->setProvince($value);
                break;
            case 11:
                $this->setDateTimeCreated($value);
                break;
            case 12:
                $this->setLastUpdated($value);
                break;
            case 13:
                $this->setUserId($value);
                break;
            case 14:
                $this->setWordpressId($value);
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
        $keys = ClientsTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEmailAddress($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setPhone($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPrimaryContact($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setStreet($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCity($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setState($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setZip($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setCountry($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setProvince($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setDateTimeCreated($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setLastUpdated($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setUserId($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setWordpressId($arr[$keys[14]]);
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
     * @return $this|\Clients The current object, for fluid interface
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
        $criteria = new Criteria(ClientsTableMap::DATABASE_NAME);

        if ($this->isColumnModified(ClientsTableMap::COL_ID)) {
            $criteria->add(ClientsTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_NAME)) {
            $criteria->add(ClientsTableMap::COL_NAME, $this->name);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_EMAIL_ADDRESS)) {
            $criteria->add(ClientsTableMap::COL_EMAIL_ADDRESS, $this->email_address);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_PHONE)) {
            $criteria->add(ClientsTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_PRIMARY_CONTACT)) {
            $criteria->add(ClientsTableMap::COL_PRIMARY_CONTACT, $this->primary_contact);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_STREET)) {
            $criteria->add(ClientsTableMap::COL_STREET, $this->street);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_CITY)) {
            $criteria->add(ClientsTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_STATE)) {
            $criteria->add(ClientsTableMap::COL_STATE, $this->state);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_ZIP)) {
            $criteria->add(ClientsTableMap::COL_ZIP, $this->zip);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_COUNTRY)) {
            $criteria->add(ClientsTableMap::COL_COUNTRY, $this->country);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_PROVINCE)) {
            $criteria->add(ClientsTableMap::COL_PROVINCE, $this->province);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_DATE_TIME_CREATED)) {
            $criteria->add(ClientsTableMap::COL_DATE_TIME_CREATED, $this->date_time_created);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_LAST_UPDATED)) {
            $criteria->add(ClientsTableMap::COL_LAST_UPDATED, $this->last_updated);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_USER_ID)) {
            $criteria->add(ClientsTableMap::COL_USER_ID, $this->user_id);
        }
        if ($this->isColumnModified(ClientsTableMap::COL_WORDPRESS_ID)) {
            $criteria->add(ClientsTableMap::COL_WORDPRESS_ID, $this->wordpress_id);
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
        $criteria = ChildClientsQuery::create();
        $criteria->add(ClientsTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Clients (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setEmailAddress($this->getEmailAddress());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setPrimaryContact($this->getPrimaryContact());
        $copyObj->setStreet($this->getStreet());
        $copyObj->setCity($this->getCity());
        $copyObj->setState($this->getState());
        $copyObj->setZip($this->getZip());
        $copyObj->setCountry($this->getCountry());
        $copyObj->setProvince($this->getProvince());
        $copyObj->setDateTimeCreated($this->getDateTimeCreated());
        $copyObj->setLastUpdated($this->getLastUpdated());
        $copyObj->setUserId($this->getUserId());
        $copyObj->setWordpressId($this->getWordpressId());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getAccessLevelOptionss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAccessLevelOptions($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAccessLevelss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAccessLevels($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getActionTrackings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActionTracking($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjects($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUserss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsers($relObj->copy($deepCopy));
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
     * @return \Clients Clone of current object.
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
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('AccessLevelOptions' == $relationName) {
            $this->initAccessLevelOptionss();
            return;
        }
        if ('AccessLevels' == $relationName) {
            $this->initAccessLevelss();
            return;
        }
        if ('ActionTracking' == $relationName) {
            $this->initActionTrackings();
            return;
        }
        if ('Projects' == $relationName) {
            $this->initProjectss();
            return;
        }
        if ('Users' == $relationName) {
            $this->initUserss();
            return;
        }
    }

    /**
     * Clears out the collAccessLevelOptionss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAccessLevelOptionss()
     */
    public function clearAccessLevelOptionss()
    {
        $this->collAccessLevelOptionss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAccessLevelOptionss collection loaded partially.
     */
    public function resetPartialAccessLevelOptionss($v = true)
    {
        $this->collAccessLevelOptionssPartial = $v;
    }

    /**
     * Initializes the collAccessLevelOptionss collection.
     *
     * By default this just sets the collAccessLevelOptionss collection to an empty array (like clearcollAccessLevelOptionss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAccessLevelOptionss($overrideExisting = true)
    {
        if (null !== $this->collAccessLevelOptionss && !$overrideExisting) {
            return;
        }

        $collectionClassName = AccessLevelOptionsTableMap::getTableMap()->getCollectionClassName();

        $this->collAccessLevelOptionss = new $collectionClassName;
        $this->collAccessLevelOptionss->setModel('\AccessLevelOptions');
    }

    /**
     * Gets an array of ChildAccessLevelOptions objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildClients is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAccessLevelOptions[] List of ChildAccessLevelOptions objects
     * @throws PropelException
     */
    public function getAccessLevelOptionss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAccessLevelOptionssPartial && !$this->isNew();
        if (null === $this->collAccessLevelOptionss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAccessLevelOptionss) {
                // return empty collection
                $this->initAccessLevelOptionss();
            } else {
                $collAccessLevelOptionss = ChildAccessLevelOptionsQuery::create(null, $criteria)
                    ->filterByClients($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAccessLevelOptionssPartial && count($collAccessLevelOptionss)) {
                        $this->initAccessLevelOptionss(false);

                        foreach ($collAccessLevelOptionss as $obj) {
                            if (false == $this->collAccessLevelOptionss->contains($obj)) {
                                $this->collAccessLevelOptionss->append($obj);
                            }
                        }

                        $this->collAccessLevelOptionssPartial = true;
                    }

                    return $collAccessLevelOptionss;
                }

                if ($partial && $this->collAccessLevelOptionss) {
                    foreach ($this->collAccessLevelOptionss as $obj) {
                        if ($obj->isNew()) {
                            $collAccessLevelOptionss[] = $obj;
                        }
                    }
                }

                $this->collAccessLevelOptionss = $collAccessLevelOptionss;
                $this->collAccessLevelOptionssPartial = false;
            }
        }

        return $this->collAccessLevelOptionss;
    }

    /**
     * Sets a collection of ChildAccessLevelOptions objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $accessLevelOptionss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function setAccessLevelOptionss(Collection $accessLevelOptionss, ConnectionInterface $con = null)
    {
        /** @var ChildAccessLevelOptions[] $accessLevelOptionssToDelete */
        $accessLevelOptionssToDelete = $this->getAccessLevelOptionss(new Criteria(), $con)->diff($accessLevelOptionss);


        $this->accessLevelOptionssScheduledForDeletion = $accessLevelOptionssToDelete;

        foreach ($accessLevelOptionssToDelete as $accessLevelOptionsRemoved) {
            $accessLevelOptionsRemoved->setClients(null);
        }

        $this->collAccessLevelOptionss = null;
        foreach ($accessLevelOptionss as $accessLevelOptions) {
            $this->addAccessLevelOptions($accessLevelOptions);
        }

        $this->collAccessLevelOptionss = $accessLevelOptionss;
        $this->collAccessLevelOptionssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AccessLevelOptions objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AccessLevelOptions objects.
     * @throws PropelException
     */
    public function countAccessLevelOptionss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAccessLevelOptionssPartial && !$this->isNew();
        if (null === $this->collAccessLevelOptionss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAccessLevelOptionss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAccessLevelOptionss());
            }

            $query = ChildAccessLevelOptionsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClients($this)
                ->count($con);
        }

        return count($this->collAccessLevelOptionss);
    }

    /**
     * Method called to associate a ChildAccessLevelOptions object to this object
     * through the ChildAccessLevelOptions foreign key attribute.
     *
     * @param  ChildAccessLevelOptions $l ChildAccessLevelOptions
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function addAccessLevelOptions(ChildAccessLevelOptions $l)
    {
        if ($this->collAccessLevelOptionss === null) {
            $this->initAccessLevelOptionss();
            $this->collAccessLevelOptionssPartial = true;
        }

        if (!$this->collAccessLevelOptionss->contains($l)) {
            $this->doAddAccessLevelOptions($l);

            if ($this->accessLevelOptionssScheduledForDeletion and $this->accessLevelOptionssScheduledForDeletion->contains($l)) {
                $this->accessLevelOptionssScheduledForDeletion->remove($this->accessLevelOptionssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAccessLevelOptions $accessLevelOptions The ChildAccessLevelOptions object to add.
     */
    protected function doAddAccessLevelOptions(ChildAccessLevelOptions $accessLevelOptions)
    {
        $this->collAccessLevelOptionss[]= $accessLevelOptions;
        $accessLevelOptions->setClients($this);
    }

    /**
     * @param  ChildAccessLevelOptions $accessLevelOptions The ChildAccessLevelOptions object to remove.
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function removeAccessLevelOptions(ChildAccessLevelOptions $accessLevelOptions)
    {
        if ($this->getAccessLevelOptionss()->contains($accessLevelOptions)) {
            $pos = $this->collAccessLevelOptionss->search($accessLevelOptions);
            $this->collAccessLevelOptionss->remove($pos);
            if (null === $this->accessLevelOptionssScheduledForDeletion) {
                $this->accessLevelOptionssScheduledForDeletion = clone $this->collAccessLevelOptionss;
                $this->accessLevelOptionssScheduledForDeletion->clear();
            }
            $this->accessLevelOptionssScheduledForDeletion[]= $accessLevelOptions;
            $accessLevelOptions->setClients(null);
        }

        return $this;
    }

    /**
     * Clears out the collAccessLevelss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addAccessLevelss()
     */
    public function clearAccessLevelss()
    {
        $this->collAccessLevelss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collAccessLevelss collection loaded partially.
     */
    public function resetPartialAccessLevelss($v = true)
    {
        $this->collAccessLevelssPartial = $v;
    }

    /**
     * Initializes the collAccessLevelss collection.
     *
     * By default this just sets the collAccessLevelss collection to an empty array (like clearcollAccessLevelss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAccessLevelss($overrideExisting = true)
    {
        if (null !== $this->collAccessLevelss && !$overrideExisting) {
            return;
        }

        $collectionClassName = AccessLevelsTableMap::getTableMap()->getCollectionClassName();

        $this->collAccessLevelss = new $collectionClassName;
        $this->collAccessLevelss->setModel('\AccessLevels');
    }

    /**
     * Gets an array of ChildAccessLevels objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildClients is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildAccessLevels[] List of ChildAccessLevels objects
     * @throws PropelException
     */
    public function getAccessLevelss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collAccessLevelssPartial && !$this->isNew();
        if (null === $this->collAccessLevelss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAccessLevelss) {
                // return empty collection
                $this->initAccessLevelss();
            } else {
                $collAccessLevelss = ChildAccessLevelsQuery::create(null, $criteria)
                    ->filterByClients($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collAccessLevelssPartial && count($collAccessLevelss)) {
                        $this->initAccessLevelss(false);

                        foreach ($collAccessLevelss as $obj) {
                            if (false == $this->collAccessLevelss->contains($obj)) {
                                $this->collAccessLevelss->append($obj);
                            }
                        }

                        $this->collAccessLevelssPartial = true;
                    }

                    return $collAccessLevelss;
                }

                if ($partial && $this->collAccessLevelss) {
                    foreach ($this->collAccessLevelss as $obj) {
                        if ($obj->isNew()) {
                            $collAccessLevelss[] = $obj;
                        }
                    }
                }

                $this->collAccessLevelss = $collAccessLevelss;
                $this->collAccessLevelssPartial = false;
            }
        }

        return $this->collAccessLevelss;
    }

    /**
     * Sets a collection of ChildAccessLevels objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $accessLevelss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function setAccessLevelss(Collection $accessLevelss, ConnectionInterface $con = null)
    {
        /** @var ChildAccessLevels[] $accessLevelssToDelete */
        $accessLevelssToDelete = $this->getAccessLevelss(new Criteria(), $con)->diff($accessLevelss);


        $this->accessLevelssScheduledForDeletion = $accessLevelssToDelete;

        foreach ($accessLevelssToDelete as $accessLevelsRemoved) {
            $accessLevelsRemoved->setClients(null);
        }

        $this->collAccessLevelss = null;
        foreach ($accessLevelss as $accessLevels) {
            $this->addAccessLevels($accessLevels);
        }

        $this->collAccessLevelss = $accessLevelss;
        $this->collAccessLevelssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AccessLevels objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related AccessLevels objects.
     * @throws PropelException
     */
    public function countAccessLevelss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collAccessLevelssPartial && !$this->isNew();
        if (null === $this->collAccessLevelss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAccessLevelss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getAccessLevelss());
            }

            $query = ChildAccessLevelsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClients($this)
                ->count($con);
        }

        return count($this->collAccessLevelss);
    }

    /**
     * Method called to associate a ChildAccessLevels object to this object
     * through the ChildAccessLevels foreign key attribute.
     *
     * @param  ChildAccessLevels $l ChildAccessLevels
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function addAccessLevels(ChildAccessLevels $l)
    {
        if ($this->collAccessLevelss === null) {
            $this->initAccessLevelss();
            $this->collAccessLevelssPartial = true;
        }

        if (!$this->collAccessLevelss->contains($l)) {
            $this->doAddAccessLevels($l);

            if ($this->accessLevelssScheduledForDeletion and $this->accessLevelssScheduledForDeletion->contains($l)) {
                $this->accessLevelssScheduledForDeletion->remove($this->accessLevelssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildAccessLevels $accessLevels The ChildAccessLevels object to add.
     */
    protected function doAddAccessLevels(ChildAccessLevels $accessLevels)
    {
        $this->collAccessLevelss[]= $accessLevels;
        $accessLevels->setClients($this);
    }

    /**
     * @param  ChildAccessLevels $accessLevels The ChildAccessLevels object to remove.
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function removeAccessLevels(ChildAccessLevels $accessLevels)
    {
        if ($this->getAccessLevelss()->contains($accessLevels)) {
            $pos = $this->collAccessLevelss->search($accessLevels);
            $this->collAccessLevelss->remove($pos);
            if (null === $this->accessLevelssScheduledForDeletion) {
                $this->accessLevelssScheduledForDeletion = clone $this->collAccessLevelss;
                $this->accessLevelssScheduledForDeletion->clear();
            }
            $this->accessLevelssScheduledForDeletion[]= $accessLevels;
            $accessLevels->setClients(null);
        }

        return $this;
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
     * If this ChildClients is new, it will return
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
                    ->filterByClients($this)
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
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function setActionTrackings(Collection $actionTrackings, ConnectionInterface $con = null)
    {
        /** @var ChildActionTracking[] $actionTrackingsToDelete */
        $actionTrackingsToDelete = $this->getActionTrackings(new Criteria(), $con)->diff($actionTrackings);


        $this->actionTrackingsScheduledForDeletion = $actionTrackingsToDelete;

        foreach ($actionTrackingsToDelete as $actionTrackingRemoved) {
            $actionTrackingRemoved->setClients(null);
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
                ->filterByClients($this)
                ->count($con);
        }

        return count($this->collActionTrackings);
    }

    /**
     * Method called to associate a ChildActionTracking object to this object
     * through the ChildActionTracking foreign key attribute.
     *
     * @param  ChildActionTracking $l ChildActionTracking
     * @return $this|\Clients The current object (for fluent API support)
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
        $actionTracking->setClients($this);
    }

    /**
     * @param  ChildActionTracking $actionTracking The ChildActionTracking object to remove.
     * @return $this|ChildClients The current object (for fluent API support)
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
            $actionTracking->setClients(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clients is new, it will return
     * an empty collection; or if this Clients has previously
     * been saved, it will retrieve related ActionTrackings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clients.
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
     * Otherwise if this Clients is new, it will return
     * an empty collection; or if this Clients has previously
     * been saved, it will retrieve related ActionTrackings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clients.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildActionTracking[] List of ChildActionTracking objects
     */
    public function getActionTrackingsJoinProjects(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildActionTrackingQuery::create(null, $criteria);
        $query->joinWith('Projects', $joinBehavior);

        return $this->getActionTrackings($query, $con);
    }

    /**
     * Clears out the collProjectss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProjectss()
     */
    public function clearProjectss()
    {
        $this->collProjectss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProjectss collection loaded partially.
     */
    public function resetPartialProjectss($v = true)
    {
        $this->collProjectssPartial = $v;
    }

    /**
     * Initializes the collProjectss collection.
     *
     * By default this just sets the collProjectss collection to an empty array (like clearcollProjectss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectss($overrideExisting = true)
    {
        if (null !== $this->collProjectss && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProjectsTableMap::getTableMap()->getCollectionClassName();

        $this->collProjectss = new $collectionClassName;
        $this->collProjectss->setModel('\Projects');
    }

    /**
     * Gets an array of ChildProjects objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildClients is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     * @throws PropelException
     */
    public function getProjectss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectssPartial && !$this->isNew();
        if (null === $this->collProjectss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectss) {
                // return empty collection
                $this->initProjectss();
            } else {
                $collProjectss = ChildProjectsQuery::create(null, $criteria)
                    ->filterByClients($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProjectssPartial && count($collProjectss)) {
                        $this->initProjectss(false);

                        foreach ($collProjectss as $obj) {
                            if (false == $this->collProjectss->contains($obj)) {
                                $this->collProjectss->append($obj);
                            }
                        }

                        $this->collProjectssPartial = true;
                    }

                    return $collProjectss;
                }

                if ($partial && $this->collProjectss) {
                    foreach ($this->collProjectss as $obj) {
                        if ($obj->isNew()) {
                            $collProjectss[] = $obj;
                        }
                    }
                }

                $this->collProjectss = $collProjectss;
                $this->collProjectssPartial = false;
            }
        }

        return $this->collProjectss;
    }

    /**
     * Sets a collection of ChildProjects objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $projectss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function setProjectss(Collection $projectss, ConnectionInterface $con = null)
    {
        /** @var ChildProjects[] $projectssToDelete */
        $projectssToDelete = $this->getProjectss(new Criteria(), $con)->diff($projectss);


        $this->projectssScheduledForDeletion = $projectssToDelete;

        foreach ($projectssToDelete as $projectsRemoved) {
            $projectsRemoved->setClients(null);
        }

        $this->collProjectss = null;
        foreach ($projectss as $projects) {
            $this->addProjects($projects);
        }

        $this->collProjectss = $projectss;
        $this->collProjectssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Projects objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Projects objects.
     * @throws PropelException
     */
    public function countProjectss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectssPartial && !$this->isNew();
        if (null === $this->collProjectss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectss());
            }

            $query = ChildProjectsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClients($this)
                ->count($con);
        }

        return count($this->collProjectss);
    }

    /**
     * Method called to associate a ChildProjects object to this object
     * through the ChildProjects foreign key attribute.
     *
     * @param  ChildProjects $l ChildProjects
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function addProjects(ChildProjects $l)
    {
        if ($this->collProjectss === null) {
            $this->initProjectss();
            $this->collProjectssPartial = true;
        }

        if (!$this->collProjectss->contains($l)) {
            $this->doAddProjects($l);

            if ($this->projectssScheduledForDeletion and $this->projectssScheduledForDeletion->contains($l)) {
                $this->projectssScheduledForDeletion->remove($this->projectssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProjects $projects The ChildProjects object to add.
     */
    protected function doAddProjects(ChildProjects $projects)
    {
        $this->collProjectss[]= $projects;
        $projects->setClients($this);
    }

    /**
     * @param  ChildProjects $projects The ChildProjects object to remove.
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function removeProjects(ChildProjects $projects)
    {
        if ($this->getProjectss()->contains($projects)) {
            $pos = $this->collProjectss->search($projects);
            $this->collProjectss->remove($pos);
            if (null === $this->projectssScheduledForDeletion) {
                $this->projectssScheduledForDeletion = clone $this->collProjectss;
                $this->projectssScheduledForDeletion->clear();
            }
            $this->projectssScheduledForDeletion[]= $projects;
            $projects->setClients(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clients is new, it will return
     * an empty collection; or if this Clients has previously
     * been saved, it will retrieve related Projectss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clients.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     */
    public function getProjectssJoinUsersRelatedByCreatedBy(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProjectsQuery::create(null, $criteria);
        $query->joinWith('UsersRelatedByCreatedBy', $joinBehavior);

        return $this->getProjectss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clients is new, it will return
     * an empty collection; or if this Clients has previously
     * been saved, it will retrieve related Projectss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clients.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     */
    public function getProjectssJoinUsersRelatedBySponsor(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProjectsQuery::create(null, $criteria);
        $query->joinWith('UsersRelatedBySponsor', $joinBehavior);

        return $this->getProjectss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clients is new, it will return
     * an empty collection; or if this Clients has previously
     * been saved, it will retrieve related Projectss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clients.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     */
    public function getProjectssJoinUsersRelatedByLead(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProjectsQuery::create(null, $criteria);
        $query->joinWith('UsersRelatedByLead', $joinBehavior);

        return $this->getProjectss($query, $con);
    }

    /**
     * Clears out the collUserss collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUserss()
     */
    public function clearUserss()
    {
        $this->collUserss = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collUserss collection loaded partially.
     */
    public function resetPartialUserss($v = true)
    {
        $this->collUserssPartial = $v;
    }

    /**
     * Initializes the collUserss collection.
     *
     * By default this just sets the collUserss collection to an empty array (like clearcollUserss());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUserss($overrideExisting = true)
    {
        if (null !== $this->collUserss && !$overrideExisting) {
            return;
        }

        $collectionClassName = UsersTableMap::getTableMap()->getCollectionClassName();

        $this->collUserss = new $collectionClassName;
        $this->collUserss->setModel('\Users');
    }

    /**
     * Gets an array of ChildUsers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildClients is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildUsers[] List of ChildUsers objects
     * @throws PropelException
     */
    public function getUserss(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collUserssPartial && !$this->isNew();
        if (null === $this->collUserss || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUserss) {
                // return empty collection
                $this->initUserss();
            } else {
                $collUserss = ChildUsersQuery::create(null, $criteria)
                    ->filterByClients($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collUserssPartial && count($collUserss)) {
                        $this->initUserss(false);

                        foreach ($collUserss as $obj) {
                            if (false == $this->collUserss->contains($obj)) {
                                $this->collUserss->append($obj);
                            }
                        }

                        $this->collUserssPartial = true;
                    }

                    return $collUserss;
                }

                if ($partial && $this->collUserss) {
                    foreach ($this->collUserss as $obj) {
                        if ($obj->isNew()) {
                            $collUserss[] = $obj;
                        }
                    }
                }

                $this->collUserss = $collUserss;
                $this->collUserssPartial = false;
            }
        }

        return $this->collUserss;
    }

    /**
     * Sets a collection of ChildUsers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $userss A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function setUserss(Collection $userss, ConnectionInterface $con = null)
    {
        /** @var ChildUsers[] $userssToDelete */
        $userssToDelete = $this->getUserss(new Criteria(), $con)->diff($userss);


        $this->userssScheduledForDeletion = $userssToDelete;

        foreach ($userssToDelete as $usersRemoved) {
            $usersRemoved->setClients(null);
        }

        $this->collUserss = null;
        foreach ($userss as $users) {
            $this->addUsers($users);
        }

        $this->collUserss = $userss;
        $this->collUserssPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Users objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Users objects.
     * @throws PropelException
     */
    public function countUserss(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collUserssPartial && !$this->isNew();
        if (null === $this->collUserss || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUserss) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUserss());
            }

            $query = ChildUsersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByClients($this)
                ->count($con);
        }

        return count($this->collUserss);
    }

    /**
     * Method called to associate a ChildUsers object to this object
     * through the ChildUsers foreign key attribute.
     *
     * @param  ChildUsers $l ChildUsers
     * @return $this|\Clients The current object (for fluent API support)
     */
    public function addUsers(ChildUsers $l)
    {
        if ($this->collUserss === null) {
            $this->initUserss();
            $this->collUserssPartial = true;
        }

        if (!$this->collUserss->contains($l)) {
            $this->doAddUsers($l);

            if ($this->userssScheduledForDeletion and $this->userssScheduledForDeletion->contains($l)) {
                $this->userssScheduledForDeletion->remove($this->userssScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildUsers $users The ChildUsers object to add.
     */
    protected function doAddUsers(ChildUsers $users)
    {
        $this->collUserss[]= $users;
        $users->setClients($this);
    }

    /**
     * @param  ChildUsers $users The ChildUsers object to remove.
     * @return $this|ChildClients The current object (for fluent API support)
     */
    public function removeUsers(ChildUsers $users)
    {
        if ($this->getUserss()->contains($users)) {
            $pos = $this->collUserss->search($users);
            $this->collUserss->remove($pos);
            if (null === $this->userssScheduledForDeletion) {
                $this->userssScheduledForDeletion = clone $this->collUserss;
                $this->userssScheduledForDeletion->clear();
            }
            $this->userssScheduledForDeletion[]= $users;
            $users->setClients(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clients is new, it will return
     * an empty collection; or if this Clients has previously
     * been saved, it will retrieve related Userss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clients.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildUsers[] List of ChildUsers objects
     */
    public function getUserssJoinAccessLevels(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildUsersQuery::create(null, $criteria);
        $query->joinWith('AccessLevels', $joinBehavior);

        return $this->getUserss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Clients is new, it will return
     * an empty collection; or if this Clients has previously
     * been saved, it will retrieve related Userss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Clients.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildUsers[] List of ChildUsers objects
     */
    public function getUserssJoinUsersRelatedByReportsTo(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildUsersQuery::create(null, $criteria);
        $query->joinWith('UsersRelatedByReportsTo', $joinBehavior);

        return $this->getUserss($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->id = null;
        $this->name = null;
        $this->email_address = null;
        $this->phone = null;
        $this->primary_contact = null;
        $this->street = null;
        $this->city = null;
        $this->state = null;
        $this->zip = null;
        $this->country = null;
        $this->province = null;
        $this->date_time_created = null;
        $this->last_updated = null;
        $this->user_id = null;
        $this->wordpress_id = null;
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
            if ($this->collAccessLevelOptionss) {
                foreach ($this->collAccessLevelOptionss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAccessLevelss) {
                foreach ($this->collAccessLevelss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collActionTrackings) {
                foreach ($this->collActionTrackings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectss) {
                foreach ($this->collProjectss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUserss) {
                foreach ($this->collUserss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collAccessLevelOptionss = null;
        $this->collAccessLevelss = null;
        $this->collActionTrackings = null;
        $this->collProjectss = null;
        $this->collUserss = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(ClientsTableMap::DEFAULT_STRING_FORMAT);
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
