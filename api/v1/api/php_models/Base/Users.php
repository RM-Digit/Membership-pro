<?php

namespace Base;

use \AccessLevels as ChildAccessLevels;
use \AccessLevelsQuery as ChildAccessLevelsQuery;
use \ActionTracking as ChildActionTracking;
use \ActionTrackingQuery as ChildActionTrackingQuery;
use \Clients as ChildClients;
use \ClientsQuery as ChildClientsQuery;
use \ControlControlPlan as ChildControlControlPlan;
use \ControlControlPlanQuery as ChildControlControlPlanQuery;
use \ControlTestPlan as ChildControlTestPlan;
use \ControlTestPlanQuery as ChildControlTestPlanQuery;
use \DefineCommunication as ChildDefineCommunication;
use \DefineCommunicationQuery as ChildDefineCommunicationQuery;
use \DefineRiskManagement as ChildDefineRiskManagement;
use \DefineRiskManagementQuery as ChildDefineRiskManagementQuery;
use \DefineStakeholders as ChildDefineStakeholders;
use \DefineStakeholdersQuery as ChildDefineStakeholdersQuery;
use \MeasureControlPlan as ChildMeasureControlPlan;
use \MeasureControlPlanQuery as ChildMeasureControlPlanQuery;
use \Projects as ChildProjects;
use \ProjectsQuery as ChildProjectsQuery;
use \Users as ChildUsers;
use \UsersQuery as ChildUsersQuery;
use \DateTime;
use \Exception;
use \PDO;
use Map\ActionTrackingTableMap;
use Map\ControlControlPlanTableMap;
use Map\ControlTestPlanTableMap;
use Map\DefineCommunicationTableMap;
use Map\DefineRiskManagementTableMap;
use Map\DefineStakeholdersTableMap;
use Map\MeasureControlPlanTableMap;
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
 * Base class that represents a row from the 'users' table.
 *
 *
 *
 * @package    propel.generator..Base
 */
abstract class Users implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Map\\UsersTableMap';


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
     * The value for the status field.
     *
     * Note: this column has a database default value of: 'pending'
     * @var        string
     */
    protected $status;

    /**
     * The value for the access_level_id field.
     *
     * @var        int
     */
    protected $access_level_id;

    /**
     * The value for the email_address field.
     *
     * @var        string
     */
    protected $email_address;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * The value for the first_name field.
     *
     * @var        string
     */
    protected $first_name;

    /**
     * The value for the last_name field.
     *
     * @var        string
     */
    protected $last_name;

    /**
     * The value for the work_title field.
     *
     * @var        string
     */
    protected $work_title;

    /**
     * The value for the reports_to field.
     *
     * @var        int
     */
    protected $reports_to;

    /**
     * The value for the profile_image_url field.
     *
     * @var        string
     */
    protected $profile_image_url;

    /**
     * The value for the phone field.
     *
     * @var        string
     */
    protected $phone;

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
     * The value for the time_zone field.
     *
     * @var        string
     */
    protected $time_zone;

    /**
     * The value for the is_logged_in field.
     *
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $is_logged_in;

    /**
     * The value for the last_login field.
     *
     * @var        DateTime
     */
    protected $last_login;

    /**
     * The value for the created_by field.
     *
     * @var        int
     */
    protected $created_by;

    /**
     * The value for the last_updated field.
     *
     * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
     * @var        DateTime
     */
    protected $last_updated;

    /**
     * The value for the date_time_created field.
     *
     * @var        DateTime
     */
    protected $date_time_created;

    /**
     * The value for the wordpress_id field.
     *
     * @var        int
     */
    protected $wordpress_id;

    /**
     * @var        ChildClients
     */
    protected $aClients;

    /**
     * @var        ChildAccessLevels
     */
    protected $aAccessLevels;

    /**
     * @var        ChildUsers
     */
    protected $aUsersRelatedByReportsTo;

    /**
     * @var        ObjectCollection|ChildActionTracking[] Collection to store aggregation of ChildActionTracking objects.
     */
    protected $collActionTrackings;
    protected $collActionTrackingsPartial;

    /**
     * @var        ObjectCollection|ChildControlControlPlan[] Collection to store aggregation of ChildControlControlPlan objects.
     */
    protected $collControlControlPlans;
    protected $collControlControlPlansPartial;

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
     * @var        ObjectCollection|ChildDefineRiskManagement[] Collection to store aggregation of ChildDefineRiskManagement objects.
     */
    protected $collDefineRiskManagements;
    protected $collDefineRiskManagementsPartial;

    /**
     * @var        ObjectCollection|ChildDefineStakeholders[] Collection to store aggregation of ChildDefineStakeholders objects.
     */
    protected $collDefineStakeholderss;
    protected $collDefineStakeholderssPartial;

    /**
     * @var        ObjectCollection|ChildMeasureControlPlan[] Collection to store aggregation of ChildMeasureControlPlan objects.
     */
    protected $collMeasureControlPlans;
    protected $collMeasureControlPlansPartial;

    /**
     * @var        ObjectCollection|ChildProjects[] Collection to store aggregation of ChildProjects objects.
     */
    protected $collProjectssRelatedByCreatedBy;
    protected $collProjectssRelatedByCreatedByPartial;

    /**
     * @var        ObjectCollection|ChildProjects[] Collection to store aggregation of ChildProjects objects.
     */
    protected $collProjectssRelatedBySponsor;
    protected $collProjectssRelatedBySponsorPartial;

    /**
     * @var        ObjectCollection|ChildProjects[] Collection to store aggregation of ChildProjects objects.
     */
    protected $collProjectssRelatedByLead;
    protected $collProjectssRelatedByLeadPartial;

    /**
     * @var        ObjectCollection|ChildUsers[] Collection to store aggregation of ChildUsers objects.
     */
    protected $collUserssRelatedById;
    protected $collUserssRelatedByIdPartial;

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
     * @var ObjectCollection|ChildControlControlPlan[]
     */
    protected $controlControlPlansScheduledForDeletion = null;

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
     * @var ObjectCollection|ChildDefineRiskManagement[]
     */
    protected $defineRiskManagementsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildDefineStakeholders[]
     */
    protected $defineStakeholderssScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildMeasureControlPlan[]
     */
    protected $measureControlPlansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProjects[]
     */
    protected $projectssRelatedByCreatedByScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProjects[]
     */
    protected $projectssRelatedBySponsorScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildProjects[]
     */
    protected $projectssRelatedByLeadScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildUsers[]
     */
    protected $userssRelatedByIdScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->status = 'pending';
        $this->is_logged_in = 0;
    }

    /**
     * Initializes internal state of Base\Users object.
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
     * Compares this with another <code>Users</code> instance.  If
     * <code>obj</code> is an instance of <code>Users</code>, delegates to
     * <code>equals(Users)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|Users The current object, for fluid interface
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
     * Get the [status] column value.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the [access_level_id] column value.
     *
     * @return int
     */
    public function getAccessLevelId()
    {
        return $this->access_level_id;
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
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [first_name] column value.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Get the [last_name] column value.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Get the [work_title] column value.
     *
     * @return string
     */
    public function getWorkTitle()
    {
        return $this->work_title;
    }

    /**
     * Get the [reports_to] column value.
     *
     * @return int
     */
    public function getReportsTo()
    {
        return $this->reports_to;
    }

    /**
     * Get the [profile_image_url] column value.
     *
     * @return string
     */
    public function getProfileImageUrl()
    {
        return $this->profile_image_url;
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
     * Get the [time_zone] column value.
     *
     * @return string
     */
    public function getTimeZone()
    {
        return $this->time_zone;
    }

    /**
     * Get the [is_logged_in] column value.
     *
     * @return int
     */
    public function getIsLoggedIn()
    {
        return $this->is_logged_in;
    }

    /**
     * Get the [optionally formatted] temporal [last_login] column value.
     *
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastLogin($format = NULL)
    {
        if ($format === null) {
            return $this->last_login;
        } else {
            return $this->last_login instanceof \DateTimeInterface ? $this->last_login->format($format) : null;
        }
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
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id !== $v) {
            $this->id = $v;
            $this->modifiedColumns[UsersTableMap::COL_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [client_id] column.
     *
     * @param int $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setClientId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->client_id !== $v) {
            $this->client_id = $v;
            $this->modifiedColumns[UsersTableMap::COL_CLIENT_ID] = true;
        }

        if ($this->aClients !== null && $this->aClients->getId() !== $v) {
            $this->aClients = null;
        }

        return $this;
    } // setClientId()

    /**
     * Set the value of [status] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->status !== $v) {
            $this->status = $v;
            $this->modifiedColumns[UsersTableMap::COL_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [access_level_id] column.
     *
     * @param int $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setAccessLevelId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->access_level_id !== $v) {
            $this->access_level_id = $v;
            $this->modifiedColumns[UsersTableMap::COL_ACCESS_LEVEL_ID] = true;
        }

        if ($this->aAccessLevels !== null && $this->aAccessLevels->getId() !== $v) {
            $this->aAccessLevels = null;
        }

        return $this;
    } // setAccessLevelId()

    /**
     * Set the value of [email_address] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setEmailAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email_address !== $v) {
            $this->email_address = $v;
            $this->modifiedColumns[UsersTableMap::COL_EMAIL_ADDRESS] = true;
        }

        return $this;
    } // setEmailAddress()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[UsersTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [first_name] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->first_name !== $v) {
            $this->first_name = $v;
            $this->modifiedColumns[UsersTableMap::COL_FIRST_NAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [last_name] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->last_name !== $v) {
            $this->last_name = $v;
            $this->modifiedColumns[UsersTableMap::COL_LAST_NAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [work_title] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setWorkTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->work_title !== $v) {
            $this->work_title = $v;
            $this->modifiedColumns[UsersTableMap::COL_WORK_TITLE] = true;
        }

        return $this;
    } // setWorkTitle()

    /**
     * Set the value of [reports_to] column.
     *
     * @param int $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setReportsTo($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->reports_to !== $v) {
            $this->reports_to = $v;
            $this->modifiedColumns[UsersTableMap::COL_REPORTS_TO] = true;
        }

        if ($this->aUsersRelatedByReportsTo !== null && $this->aUsersRelatedByReportsTo->getId() !== $v) {
            $this->aUsersRelatedByReportsTo = null;
        }

        return $this;
    } // setReportsTo()

    /**
     * Set the value of [profile_image_url] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setProfileImageUrl($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->profile_image_url !== $v) {
            $this->profile_image_url = $v;
            $this->modifiedColumns[UsersTableMap::COL_PROFILE_IMAGE_URL] = true;
        }

        return $this;
    } // setProfileImageUrl()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[UsersTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [city] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setCity($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->city !== $v) {
            $this->city = $v;
            $this->modifiedColumns[UsersTableMap::COL_CITY] = true;
        }

        return $this;
    } // setCity()

    /**
     * Set the value of [state] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setState($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->state !== $v) {
            $this->state = $v;
            $this->modifiedColumns[UsersTableMap::COL_STATE] = true;
        }

        return $this;
    } // setState()

    /**
     * Set the value of [zip] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setZip($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->zip !== $v) {
            $this->zip = $v;
            $this->modifiedColumns[UsersTableMap::COL_ZIP] = true;
        }

        return $this;
    } // setZip()

    /**
     * Set the value of [time_zone] column.
     *
     * @param string $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setTimeZone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->time_zone !== $v) {
            $this->time_zone = $v;
            $this->modifiedColumns[UsersTableMap::COL_TIME_ZONE] = true;
        }

        return $this;
    } // setTimeZone()

    /**
     * Set the value of [is_logged_in] column.
     *
     * @param int $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setIsLoggedIn($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->is_logged_in !== $v) {
            $this->is_logged_in = $v;
            $this->modifiedColumns[UsersTableMap::COL_IS_LOGGED_IN] = true;
        }

        return $this;
    } // setIsLoggedIn()

    /**
     * Sets the value of [last_login] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setLastLogin($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_login !== null || $dt !== null) {
            if ($this->last_login === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_login->format("Y-m-d H:i:s.u")) {
                $this->last_login = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UsersTableMap::COL_LAST_LOGIN] = true;
            }
        } // if either are not null

        return $this;
    } // setLastLogin()

    /**
     * Set the value of [created_by] column.
     *
     * @param int $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->created_by !== $v) {
            $this->created_by = $v;
            $this->modifiedColumns[UsersTableMap::COL_CREATED_BY] = true;
        }

        return $this;
    } // setCreatedBy()

    /**
     * Sets the value of [last_updated] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setLastUpdated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_updated !== null || $dt !== null) {
            if ($this->last_updated === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->last_updated->format("Y-m-d H:i:s.u")) {
                $this->last_updated = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UsersTableMap::COL_LAST_UPDATED] = true;
            }
        } // if either are not null

        return $this;
    } // setLastUpdated()

    /**
     * Sets the value of [date_time_created] column to a normalized version of the date/time value specified.
     *
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setDateTimeCreated($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->date_time_created !== null || $dt !== null) {
            if ($this->date_time_created === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->date_time_created->format("Y-m-d H:i:s.u")) {
                $this->date_time_created = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UsersTableMap::COL_DATE_TIME_CREATED] = true;
            }
        } // if either are not null

        return $this;
    } // setDateTimeCreated()

    /**
     * Set the value of [wordpress_id] column.
     *
     * @param int $v new value
     * @return $this|\Users The current object (for fluent API support)
     */
    public function setWordpressId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->wordpress_id !== $v) {
            $this->wordpress_id = $v;
            $this->modifiedColumns[UsersTableMap::COL_WORDPRESS_ID] = true;
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
            if ($this->status !== 'pending') {
                return false;
            }

            if ($this->is_logged_in !== 0) {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UsersTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UsersTableMap::translateFieldName('ClientId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->client_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UsersTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UsersTableMap::translateFieldName('AccessLevelId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->access_level_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UsersTableMap::translateFieldName('EmailAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email_address = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UsersTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UsersTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->first_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : UsersTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->last_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : UsersTableMap::translateFieldName('WorkTitle', TableMap::TYPE_PHPNAME, $indexType)];
            $this->work_title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : UsersTableMap::translateFieldName('ReportsTo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->reports_to = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : UsersTableMap::translateFieldName('ProfileImageUrl', TableMap::TYPE_PHPNAME, $indexType)];
            $this->profile_image_url = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : UsersTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : UsersTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
            $this->city = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : UsersTableMap::translateFieldName('State', TableMap::TYPE_PHPNAME, $indexType)];
            $this->state = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : UsersTableMap::translateFieldName('Zip', TableMap::TYPE_PHPNAME, $indexType)];
            $this->zip = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : UsersTableMap::translateFieldName('TimeZone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->time_zone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : UsersTableMap::translateFieldName('IsLoggedIn', TableMap::TYPE_PHPNAME, $indexType)];
            $this->is_logged_in = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : UsersTableMap::translateFieldName('LastLogin', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_login = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : UsersTableMap::translateFieldName('CreatedBy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->created_by = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : UsersTableMap::translateFieldName('LastUpdated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->last_updated = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 20 + $startcol : UsersTableMap::translateFieldName('DateTimeCreated', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->date_time_created = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 21 + $startcol : UsersTableMap::translateFieldName('WordpressId', TableMap::TYPE_PHPNAME, $indexType)];
            $this->wordpress_id = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 22; // 22 = UsersTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Users'), 0, $e);
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
        if ($this->aAccessLevels !== null && $this->access_level_id !== $this->aAccessLevels->getId()) {
            $this->aAccessLevels = null;
        }
        if ($this->aUsersRelatedByReportsTo !== null && $this->reports_to !== $this->aUsersRelatedByReportsTo->getId()) {
            $this->aUsersRelatedByReportsTo = null;
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
            $con = Propel::getServiceContainer()->getReadConnection(UsersTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUsersQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aClients = null;
            $this->aAccessLevels = null;
            $this->aUsersRelatedByReportsTo = null;
            $this->collActionTrackings = null;

            $this->collControlControlPlans = null;

            $this->collControlTestPlans = null;

            $this->collDefineCommunications = null;

            $this->collDefineRiskManagements = null;

            $this->collDefineStakeholderss = null;

            $this->collMeasureControlPlans = null;

            $this->collProjectssRelatedByCreatedBy = null;

            $this->collProjectssRelatedBySponsor = null;

            $this->collProjectssRelatedByLead = null;

            $this->collUserssRelatedById = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Users::setDeleted()
     * @see Users::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUsersQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(UsersTableMap::DATABASE_NAME);
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
                UsersTableMap::addInstanceToPool($this);
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

            if ($this->aAccessLevels !== null) {
                if ($this->aAccessLevels->isModified() || $this->aAccessLevels->isNew()) {
                    $affectedRows += $this->aAccessLevels->save($con);
                }
                $this->setAccessLevels($this->aAccessLevels);
            }

            if ($this->aUsersRelatedByReportsTo !== null) {
                if ($this->aUsersRelatedByReportsTo->isModified() || $this->aUsersRelatedByReportsTo->isNew()) {
                    $affectedRows += $this->aUsersRelatedByReportsTo->save($con);
                }
                $this->setUsersRelatedByReportsTo($this->aUsersRelatedByReportsTo);
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

            if ($this->controlControlPlansScheduledForDeletion !== null) {
                if (!$this->controlControlPlansScheduledForDeletion->isEmpty()) {
                    foreach ($this->controlControlPlansScheduledForDeletion as $controlControlPlan) {
                        // need to save related object because we set the relation to null
                        $controlControlPlan->save($con);
                    }
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

            if ($this->controlTestPlansScheduledForDeletion !== null) {
                if (!$this->controlTestPlansScheduledForDeletion->isEmpty()) {
                    foreach ($this->controlTestPlansScheduledForDeletion as $controlTestPlan) {
                        // need to save related object because we set the relation to null
                        $controlTestPlan->save($con);
                    }
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
                    foreach ($this->defineCommunicationsScheduledForDeletion as $defineCommunication) {
                        // need to save related object because we set the relation to null
                        $defineCommunication->save($con);
                    }
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

            if ($this->defineRiskManagementsScheduledForDeletion !== null) {
                if (!$this->defineRiskManagementsScheduledForDeletion->isEmpty()) {
                    foreach ($this->defineRiskManagementsScheduledForDeletion as $defineRiskManagement) {
                        // need to save related object because we set the relation to null
                        $defineRiskManagement->save($con);
                    }
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

            if ($this->measureControlPlansScheduledForDeletion !== null) {
                if (!$this->measureControlPlansScheduledForDeletion->isEmpty()) {
                    foreach ($this->measureControlPlansScheduledForDeletion as $measureControlPlan) {
                        // need to save related object because we set the relation to null
                        $measureControlPlan->save($con);
                    }
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

            if ($this->projectssRelatedByCreatedByScheduledForDeletion !== null) {
                if (!$this->projectssRelatedByCreatedByScheduledForDeletion->isEmpty()) {
                    foreach ($this->projectssRelatedByCreatedByScheduledForDeletion as $projectsRelatedByCreatedBy) {
                        // need to save related object because we set the relation to null
                        $projectsRelatedByCreatedBy->save($con);
                    }
                    $this->projectssRelatedByCreatedByScheduledForDeletion = null;
                }
            }

            if ($this->collProjectssRelatedByCreatedBy !== null) {
                foreach ($this->collProjectssRelatedByCreatedBy as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->projectssRelatedBySponsorScheduledForDeletion !== null) {
                if (!$this->projectssRelatedBySponsorScheduledForDeletion->isEmpty()) {
                    foreach ($this->projectssRelatedBySponsorScheduledForDeletion as $projectsRelatedBySponsor) {
                        // need to save related object because we set the relation to null
                        $projectsRelatedBySponsor->save($con);
                    }
                    $this->projectssRelatedBySponsorScheduledForDeletion = null;
                }
            }

            if ($this->collProjectssRelatedBySponsor !== null) {
                foreach ($this->collProjectssRelatedBySponsor as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->projectssRelatedByLeadScheduledForDeletion !== null) {
                if (!$this->projectssRelatedByLeadScheduledForDeletion->isEmpty()) {
                    foreach ($this->projectssRelatedByLeadScheduledForDeletion as $projectsRelatedByLead) {
                        // need to save related object because we set the relation to null
                        $projectsRelatedByLead->save($con);
                    }
                    $this->projectssRelatedByLeadScheduledForDeletion = null;
                }
            }

            if ($this->collProjectssRelatedByLead !== null) {
                foreach ($this->collProjectssRelatedByLead as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->userssRelatedByIdScheduledForDeletion !== null) {
                if (!$this->userssRelatedByIdScheduledForDeletion->isEmpty()) {
                    foreach ($this->userssRelatedByIdScheduledForDeletion as $usersRelatedById) {
                        // need to save related object because we set the relation to null
                        $usersRelatedById->save($con);
                    }
                    $this->userssRelatedByIdScheduledForDeletion = null;
                }
            }

            if ($this->collUserssRelatedById !== null) {
                foreach ($this->collUserssRelatedById as $referrerFK) {
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

        $this->modifiedColumns[UsersTableMap::COL_ID] = true;
        if (null !== $this->id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UsersTableMap::COL_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UsersTableMap::COL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`id`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_CLIENT_ID)) {
            $modifiedColumns[':p' . $index++]  = '`client_id`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '`status`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_ACCESS_LEVEL_ID)) {
            $modifiedColumns[':p' . $index++]  = '`access_level_id`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_EMAIL_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '`email_address`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '`password`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_FIRST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`first_name`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_LAST_NAME)) {
            $modifiedColumns[':p' . $index++]  = '`last_name`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_WORK_TITLE)) {
            $modifiedColumns[':p' . $index++]  = '`work_title`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_REPORTS_TO)) {
            $modifiedColumns[':p' . $index++]  = '`reports_to`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_PROFILE_IMAGE_URL)) {
            $modifiedColumns[':p' . $index++]  = '`profile_image_url`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '`phone`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_CITY)) {
            $modifiedColumns[':p' . $index++]  = '`city`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_STATE)) {
            $modifiedColumns[':p' . $index++]  = '`state`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_ZIP)) {
            $modifiedColumns[':p' . $index++]  = '`zip`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_TIME_ZONE)) {
            $modifiedColumns[':p' . $index++]  = '`time_zone`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_IS_LOGGED_IN)) {
            $modifiedColumns[':p' . $index++]  = '`is_logged_in`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_LAST_LOGIN)) {
            $modifiedColumns[':p' . $index++]  = '`last_login`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_CREATED_BY)) {
            $modifiedColumns[':p' . $index++]  = '`created_by`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_LAST_UPDATED)) {
            $modifiedColumns[':p' . $index++]  = '`last_updated`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_DATE_TIME_CREATED)) {
            $modifiedColumns[':p' . $index++]  = '`date_time_created`';
        }
        if ($this->isColumnModified(UsersTableMap::COL_WORDPRESS_ID)) {
            $modifiedColumns[':p' . $index++]  = '`wordpress_id`';
        }

        $sql = sprintf(
            'INSERT INTO `users` (%s) VALUES (%s)',
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
                    case '`status`':
                        $stmt->bindValue($identifier, $this->status, PDO::PARAM_STR);
                        break;
                    case '`access_level_id`':
                        $stmt->bindValue($identifier, $this->access_level_id, PDO::PARAM_INT);
                        break;
                    case '`email_address`':
                        $stmt->bindValue($identifier, $this->email_address, PDO::PARAM_STR);
                        break;
                    case '`password`':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '`first_name`':
                        $stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);
                        break;
                    case '`last_name`':
                        $stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);
                        break;
                    case '`work_title`':
                        $stmt->bindValue($identifier, $this->work_title, PDO::PARAM_STR);
                        break;
                    case '`reports_to`':
                        $stmt->bindValue($identifier, $this->reports_to, PDO::PARAM_INT);
                        break;
                    case '`profile_image_url`':
                        $stmt->bindValue($identifier, $this->profile_image_url, PDO::PARAM_STR);
                        break;
                    case '`phone`':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
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
                    case '`time_zone`':
                        $stmt->bindValue($identifier, $this->time_zone, PDO::PARAM_STR);
                        break;
                    case '`is_logged_in`':
                        $stmt->bindValue($identifier, $this->is_logged_in, PDO::PARAM_INT);
                        break;
                    case '`last_login`':
                        $stmt->bindValue($identifier, $this->last_login ? $this->last_login->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`created_by`':
                        $stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);
                        break;
                    case '`last_updated`':
                        $stmt->bindValue($identifier, $this->last_updated ? $this->last_updated->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case '`date_time_created`':
                        $stmt->bindValue($identifier, $this->date_time_created ? $this->date_time_created->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
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
        $pos = UsersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getStatus();
                break;
            case 3:
                return $this->getAccessLevelId();
                break;
            case 4:
                return $this->getEmailAddress();
                break;
            case 5:
                return $this->getPassword();
                break;
            case 6:
                return $this->getFirstName();
                break;
            case 7:
                return $this->getLastName();
                break;
            case 8:
                return $this->getWorkTitle();
                break;
            case 9:
                return $this->getReportsTo();
                break;
            case 10:
                return $this->getProfileImageUrl();
                break;
            case 11:
                return $this->getPhone();
                break;
            case 12:
                return $this->getCity();
                break;
            case 13:
                return $this->getState();
                break;
            case 14:
                return $this->getZip();
                break;
            case 15:
                return $this->getTimeZone();
                break;
            case 16:
                return $this->getIsLoggedIn();
                break;
            case 17:
                return $this->getLastLogin();
                break;
            case 18:
                return $this->getCreatedBy();
                break;
            case 19:
                return $this->getLastUpdated();
                break;
            case 20:
                return $this->getDateTimeCreated();
                break;
            case 21:
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

        if (isset($alreadyDumpedObjects['Users'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Users'][$this->hashCode()] = true;
        $keys = UsersTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getClientId(),
            $keys[2] => $this->getStatus(),
            $keys[3] => $this->getAccessLevelId(),
            $keys[4] => $this->getEmailAddress(),
            $keys[5] => $this->getPassword(),
            $keys[6] => $this->getFirstName(),
            $keys[7] => $this->getLastName(),
            $keys[8] => $this->getWorkTitle(),
            $keys[9] => $this->getReportsTo(),
            $keys[10] => $this->getProfileImageUrl(),
            $keys[11] => $this->getPhone(),
            $keys[12] => $this->getCity(),
            $keys[13] => $this->getState(),
            $keys[14] => $this->getZip(),
            $keys[15] => $this->getTimeZone(),
            $keys[16] => $this->getIsLoggedIn(),
            $keys[17] => $this->getLastLogin(),
            $keys[18] => $this->getCreatedBy(),
            $keys[19] => $this->getLastUpdated(),
            $keys[20] => $this->getDateTimeCreated(),
            $keys[21] => $this->getWordpressId(),
        );
        if ($result[$keys[17]] instanceof \DateTimeInterface) {
            $result[$keys[17]] = $result[$keys[17]]->format('c');
        }

        if ($result[$keys[19]] instanceof \DateTimeInterface) {
            $result[$keys[19]] = $result[$keys[19]]->format('c');
        }

        if ($result[$keys[20]] instanceof \DateTimeInterface) {
            $result[$keys[20]] = $result[$keys[20]]->format('c');
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
            if (null !== $this->aAccessLevels) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'accessLevels';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'access_levels';
                        break;
                    default:
                        $key = 'AccessLevels';
                }

                $result[$key] = $this->aAccessLevels->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aUsersRelatedByReportsTo) {

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

                $result[$key] = $this->aUsersRelatedByReportsTo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
            if (null !== $this->collProjectssRelatedByCreatedBy) {

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

                $result[$key] = $this->collProjectssRelatedByCreatedBy->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProjectssRelatedBySponsor) {

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

                $result[$key] = $this->collProjectssRelatedBySponsor->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collProjectssRelatedByLead) {

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

                $result[$key] = $this->collProjectssRelatedByLead->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collUserssRelatedById) {

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

                $result[$key] = $this->collUserssRelatedById->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
     * @return $this|\Users
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UsersTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Users
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
                $this->setStatus($value);
                break;
            case 3:
                $this->setAccessLevelId($value);
                break;
            case 4:
                $this->setEmailAddress($value);
                break;
            case 5:
                $this->setPassword($value);
                break;
            case 6:
                $this->setFirstName($value);
                break;
            case 7:
                $this->setLastName($value);
                break;
            case 8:
                $this->setWorkTitle($value);
                break;
            case 9:
                $this->setReportsTo($value);
                break;
            case 10:
                $this->setProfileImageUrl($value);
                break;
            case 11:
                $this->setPhone($value);
                break;
            case 12:
                $this->setCity($value);
                break;
            case 13:
                $this->setState($value);
                break;
            case 14:
                $this->setZip($value);
                break;
            case 15:
                $this->setTimeZone($value);
                break;
            case 16:
                $this->setIsLoggedIn($value);
                break;
            case 17:
                $this->setLastLogin($value);
                break;
            case 18:
                $this->setCreatedBy($value);
                break;
            case 19:
                $this->setLastUpdated($value);
                break;
            case 20:
                $this->setDateTimeCreated($value);
                break;
            case 21:
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
        $keys = UsersTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setClientId($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setStatus($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setAccessLevelId($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setEmailAddress($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPassword($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setFirstName($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setLastName($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setWorkTitle($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setReportsTo($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setProfileImageUrl($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setPhone($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setCity($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setState($arr[$keys[13]]);
        }
        if (array_key_exists($keys[14], $arr)) {
            $this->setZip($arr[$keys[14]]);
        }
        if (array_key_exists($keys[15], $arr)) {
            $this->setTimeZone($arr[$keys[15]]);
        }
        if (array_key_exists($keys[16], $arr)) {
            $this->setIsLoggedIn($arr[$keys[16]]);
        }
        if (array_key_exists($keys[17], $arr)) {
            $this->setLastLogin($arr[$keys[17]]);
        }
        if (array_key_exists($keys[18], $arr)) {
            $this->setCreatedBy($arr[$keys[18]]);
        }
        if (array_key_exists($keys[19], $arr)) {
            $this->setLastUpdated($arr[$keys[19]]);
        }
        if (array_key_exists($keys[20], $arr)) {
            $this->setDateTimeCreated($arr[$keys[20]]);
        }
        if (array_key_exists($keys[21], $arr)) {
            $this->setWordpressId($arr[$keys[21]]);
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
     * @return $this|\Users The current object, for fluid interface
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
        $criteria = new Criteria(UsersTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UsersTableMap::COL_ID)) {
            $criteria->add(UsersTableMap::COL_ID, $this->id);
        }
        if ($this->isColumnModified(UsersTableMap::COL_CLIENT_ID)) {
            $criteria->add(UsersTableMap::COL_CLIENT_ID, $this->client_id);
        }
        if ($this->isColumnModified(UsersTableMap::COL_STATUS)) {
            $criteria->add(UsersTableMap::COL_STATUS, $this->status);
        }
        if ($this->isColumnModified(UsersTableMap::COL_ACCESS_LEVEL_ID)) {
            $criteria->add(UsersTableMap::COL_ACCESS_LEVEL_ID, $this->access_level_id);
        }
        if ($this->isColumnModified(UsersTableMap::COL_EMAIL_ADDRESS)) {
            $criteria->add(UsersTableMap::COL_EMAIL_ADDRESS, $this->email_address);
        }
        if ($this->isColumnModified(UsersTableMap::COL_PASSWORD)) {
            $criteria->add(UsersTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(UsersTableMap::COL_FIRST_NAME)) {
            $criteria->add(UsersTableMap::COL_FIRST_NAME, $this->first_name);
        }
        if ($this->isColumnModified(UsersTableMap::COL_LAST_NAME)) {
            $criteria->add(UsersTableMap::COL_LAST_NAME, $this->last_name);
        }
        if ($this->isColumnModified(UsersTableMap::COL_WORK_TITLE)) {
            $criteria->add(UsersTableMap::COL_WORK_TITLE, $this->work_title);
        }
        if ($this->isColumnModified(UsersTableMap::COL_REPORTS_TO)) {
            $criteria->add(UsersTableMap::COL_REPORTS_TO, $this->reports_to);
        }
        if ($this->isColumnModified(UsersTableMap::COL_PROFILE_IMAGE_URL)) {
            $criteria->add(UsersTableMap::COL_PROFILE_IMAGE_URL, $this->profile_image_url);
        }
        if ($this->isColumnModified(UsersTableMap::COL_PHONE)) {
            $criteria->add(UsersTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(UsersTableMap::COL_CITY)) {
            $criteria->add(UsersTableMap::COL_CITY, $this->city);
        }
        if ($this->isColumnModified(UsersTableMap::COL_STATE)) {
            $criteria->add(UsersTableMap::COL_STATE, $this->state);
        }
        if ($this->isColumnModified(UsersTableMap::COL_ZIP)) {
            $criteria->add(UsersTableMap::COL_ZIP, $this->zip);
        }
        if ($this->isColumnModified(UsersTableMap::COL_TIME_ZONE)) {
            $criteria->add(UsersTableMap::COL_TIME_ZONE, $this->time_zone);
        }
        if ($this->isColumnModified(UsersTableMap::COL_IS_LOGGED_IN)) {
            $criteria->add(UsersTableMap::COL_IS_LOGGED_IN, $this->is_logged_in);
        }
        if ($this->isColumnModified(UsersTableMap::COL_LAST_LOGIN)) {
            $criteria->add(UsersTableMap::COL_LAST_LOGIN, $this->last_login);
        }
        if ($this->isColumnModified(UsersTableMap::COL_CREATED_BY)) {
            $criteria->add(UsersTableMap::COL_CREATED_BY, $this->created_by);
        }
        if ($this->isColumnModified(UsersTableMap::COL_LAST_UPDATED)) {
            $criteria->add(UsersTableMap::COL_LAST_UPDATED, $this->last_updated);
        }
        if ($this->isColumnModified(UsersTableMap::COL_DATE_TIME_CREATED)) {
            $criteria->add(UsersTableMap::COL_DATE_TIME_CREATED, $this->date_time_created);
        }
        if ($this->isColumnModified(UsersTableMap::COL_WORDPRESS_ID)) {
            $criteria->add(UsersTableMap::COL_WORDPRESS_ID, $this->wordpress_id);
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
        $criteria = ChildUsersQuery::create();
        $criteria->add(UsersTableMap::COL_ID, $this->id);

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
     * @param      object $copyObj An object of \Users (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setClientId($this->getClientId());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setAccessLevelId($this->getAccessLevelId());
        $copyObj->setEmailAddress($this->getEmailAddress());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setWorkTitle($this->getWorkTitle());
        $copyObj->setReportsTo($this->getReportsTo());
        $copyObj->setProfileImageUrl($this->getProfileImageUrl());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setCity($this->getCity());
        $copyObj->setState($this->getState());
        $copyObj->setZip($this->getZip());
        $copyObj->setTimeZone($this->getTimeZone());
        $copyObj->setIsLoggedIn($this->getIsLoggedIn());
        $copyObj->setLastLogin($this->getLastLogin());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setLastUpdated($this->getLastUpdated());
        $copyObj->setDateTimeCreated($this->getDateTimeCreated());
        $copyObj->setWordpressId($this->getWordpressId());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getActionTrackings() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addActionTracking($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getControlControlPlans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addControlControlPlan($relObj->copy($deepCopy));
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

            foreach ($this->getDefineRiskManagements() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineRiskManagement($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getDefineStakeholderss() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addDefineStakeholders($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMeasureControlPlans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMeasureControlPlan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectssRelatedByCreatedBy() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectsRelatedByCreatedBy($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectssRelatedBySponsor() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectsRelatedBySponsor($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getProjectssRelatedByLead() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addProjectsRelatedByLead($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getUserssRelatedById() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addUsersRelatedById($relObj->copy($deepCopy));
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
     * @return \Users Clone of current object.
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
     * @return $this|\Users The current object (for fluent API support)
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
            $v->addUsers($this);
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
                $this->aClients->addUserss($this);
             */
        }

        return $this->aClients;
    }

    /**
     * Declares an association between this object and a ChildAccessLevels object.
     *
     * @param  ChildAccessLevels $v
     * @return $this|\Users The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAccessLevels(ChildAccessLevels $v = null)
    {
        if ($v === null) {
            $this->setAccessLevelId(NULL);
        } else {
            $this->setAccessLevelId($v->getId());
        }

        $this->aAccessLevels = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAccessLevels object, it will not be re-added.
        if ($v !== null) {
            $v->addUsers($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAccessLevels object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAccessLevels The associated ChildAccessLevels object.
     * @throws PropelException
     */
    public function getAccessLevels(ConnectionInterface $con = null)
    {
        if ($this->aAccessLevels === null && ($this->access_level_id != 0)) {
            $this->aAccessLevels = ChildAccessLevelsQuery::create()->findPk($this->access_level_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAccessLevels->addUserss($this);
             */
        }

        return $this->aAccessLevels;
    }

    /**
     * Declares an association between this object and a ChildUsers object.
     *
     * @param  ChildUsers $v
     * @return $this|\Users The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUsersRelatedByReportsTo(ChildUsers $v = null)
    {
        if ($v === null) {
            $this->setReportsTo(NULL);
        } else {
            $this->setReportsTo($v->getId());
        }

        $this->aUsersRelatedByReportsTo = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUsers object, it will not be re-added.
        if ($v !== null) {
            $v->addUsersRelatedById($this);
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
    public function getUsersRelatedByReportsTo(ConnectionInterface $con = null)
    {
        if ($this->aUsersRelatedByReportsTo === null && ($this->reports_to != 0)) {
            $this->aUsersRelatedByReportsTo = ChildUsersQuery::create()->findPk($this->reports_to, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUsersRelatedByReportsTo->addUserssRelatedById($this);
             */
        }

        return $this->aUsersRelatedByReportsTo;
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
        if ('ControlControlPlan' == $relationName) {
            $this->initControlControlPlans();
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
        if ('DefineRiskManagement' == $relationName) {
            $this->initDefineRiskManagements();
            return;
        }
        if ('DefineStakeholders' == $relationName) {
            $this->initDefineStakeholderss();
            return;
        }
        if ('MeasureControlPlan' == $relationName) {
            $this->initMeasureControlPlans();
            return;
        }
        if ('ProjectsRelatedByCreatedBy' == $relationName) {
            $this->initProjectssRelatedByCreatedBy();
            return;
        }
        if ('ProjectsRelatedBySponsor' == $relationName) {
            $this->initProjectssRelatedBySponsor();
            return;
        }
        if ('ProjectsRelatedByLead' == $relationName) {
            $this->initProjectssRelatedByLead();
            return;
        }
        if ('UsersRelatedById' == $relationName) {
            $this->initUserssRelatedById();
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
     * If this ChildUsers is new, it will return
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
                    ->filterByUsers($this)
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
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setActionTrackings(Collection $actionTrackings, ConnectionInterface $con = null)
    {
        /** @var ChildActionTracking[] $actionTrackingsToDelete */
        $actionTrackingsToDelete = $this->getActionTrackings(new Criteria(), $con)->diff($actionTrackings);


        $this->actionTrackingsScheduledForDeletion = $actionTrackingsToDelete;

        foreach ($actionTrackingsToDelete as $actionTrackingRemoved) {
            $actionTrackingRemoved->setUsers(null);
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
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collActionTrackings);
    }

    /**
     * Method called to associate a ChildActionTracking object to this object
     * through the ChildActionTracking foreign key attribute.
     *
     * @param  ChildActionTracking $l ChildActionTracking
     * @return $this|\Users The current object (for fluent API support)
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
        $actionTracking->setUsers($this);
    }

    /**
     * @param  ChildActionTracking $actionTracking The ChildActionTracking object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
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
            $actionTracking->setUsers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ActionTrackings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ActionTrackings from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * If this ChildUsers is new, it will return
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
                    ->filterByUsers($this)
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
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setControlControlPlans(Collection $controlControlPlans, ConnectionInterface $con = null)
    {
        /** @var ChildControlControlPlan[] $controlControlPlansToDelete */
        $controlControlPlansToDelete = $this->getControlControlPlans(new Criteria(), $con)->diff($controlControlPlans);


        $this->controlControlPlansScheduledForDeletion = $controlControlPlansToDelete;

        foreach ($controlControlPlansToDelete as $controlControlPlanRemoved) {
            $controlControlPlanRemoved->setUsers(null);
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
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collControlControlPlans);
    }

    /**
     * Method called to associate a ChildControlControlPlan object to this object
     * through the ChildControlControlPlan foreign key attribute.
     *
     * @param  ChildControlControlPlan $l ChildControlControlPlan
     * @return $this|\Users The current object (for fluent API support)
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
        $controlControlPlan->setUsers($this);
    }

    /**
     * @param  ChildControlControlPlan $controlControlPlan The ChildControlControlPlan object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
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
            $this->controlControlPlansScheduledForDeletion[]= $controlControlPlan;
            $controlControlPlan->setUsers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ControlControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlControlPlan[] List of ChildControlControlPlan objects
     */
    public function getControlControlPlansJoinProjects(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlControlPlanQuery::create(null, $criteria);
        $query->joinWith('Projects', $joinBehavior);

        return $this->getControlControlPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ControlControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ControlControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * If this ChildUsers is new, it will return
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
                    ->filterByUsers($this)
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
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setControlTestPlans(Collection $controlTestPlans, ConnectionInterface $con = null)
    {
        /** @var ChildControlTestPlan[] $controlTestPlansToDelete */
        $controlTestPlansToDelete = $this->getControlTestPlans(new Criteria(), $con)->diff($controlTestPlans);


        $this->controlTestPlansScheduledForDeletion = $controlTestPlansToDelete;

        foreach ($controlTestPlansToDelete as $controlTestPlanRemoved) {
            $controlTestPlanRemoved->setUsers(null);
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
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collControlTestPlans);
    }

    /**
     * Method called to associate a ChildControlTestPlan object to this object
     * through the ChildControlTestPlan foreign key attribute.
     *
     * @param  ChildControlTestPlan $l ChildControlTestPlan
     * @return $this|\Users The current object (for fluent API support)
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
        $controlTestPlan->setUsers($this);
    }

    /**
     * @param  ChildControlTestPlan $controlTestPlan The ChildControlTestPlan object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
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
            $this->controlTestPlansScheduledForDeletion[]= $controlTestPlan;
            $controlTestPlan->setUsers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ControlTestPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildControlTestPlan[] List of ChildControlTestPlan objects
     */
    public function getControlTestPlansJoinProjects(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildControlTestPlanQuery::create(null, $criteria);
        $query->joinWith('Projects', $joinBehavior);

        return $this->getControlTestPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ControlTestPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ControlTestPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * If this ChildUsers is new, it will return
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
                    ->filterByUsers($this)
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
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setDefineCommunications(Collection $defineCommunications, ConnectionInterface $con = null)
    {
        /** @var ChildDefineCommunication[] $defineCommunicationsToDelete */
        $defineCommunicationsToDelete = $this->getDefineCommunications(new Criteria(), $con)->diff($defineCommunications);


        $this->defineCommunicationsScheduledForDeletion = $defineCommunicationsToDelete;

        foreach ($defineCommunicationsToDelete as $defineCommunicationRemoved) {
            $defineCommunicationRemoved->setUsers(null);
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
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collDefineCommunications);
    }

    /**
     * Method called to associate a ChildDefineCommunication object to this object
     * through the ChildDefineCommunication foreign key attribute.
     *
     * @param  ChildDefineCommunication $l ChildDefineCommunication
     * @return $this|\Users The current object (for fluent API support)
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
        $defineCommunication->setUsers($this);
    }

    /**
     * @param  ChildDefineCommunication $defineCommunication The ChildDefineCommunication object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
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
            $this->defineCommunicationsScheduledForDeletion[]= $defineCommunication;
            $defineCommunication->setUsers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineCommunications from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineCommunication[] List of ChildDefineCommunication objects
     */
    public function getDefineCommunicationsJoinProjects(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineCommunicationQuery::create(null, $criteria);
        $query->joinWith('Projects', $joinBehavior);

        return $this->getDefineCommunications($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineCommunications from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineCommunications from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * If this ChildUsers is new, it will return
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
                    ->filterByUsers($this)
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
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setDefineRiskManagements(Collection $defineRiskManagements, ConnectionInterface $con = null)
    {
        /** @var ChildDefineRiskManagement[] $defineRiskManagementsToDelete */
        $defineRiskManagementsToDelete = $this->getDefineRiskManagements(new Criteria(), $con)->diff($defineRiskManagements);


        $this->defineRiskManagementsScheduledForDeletion = $defineRiskManagementsToDelete;

        foreach ($defineRiskManagementsToDelete as $defineRiskManagementRemoved) {
            $defineRiskManagementRemoved->setUsers(null);
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
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collDefineRiskManagements);
    }

    /**
     * Method called to associate a ChildDefineRiskManagement object to this object
     * through the ChildDefineRiskManagement foreign key attribute.
     *
     * @param  ChildDefineRiskManagement $l ChildDefineRiskManagement
     * @return $this|\Users The current object (for fluent API support)
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
        $defineRiskManagement->setUsers($this);
    }

    /**
     * @param  ChildDefineRiskManagement $defineRiskManagement The ChildDefineRiskManagement object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
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
            $this->defineRiskManagementsScheduledForDeletion[]= $defineRiskManagement;
            $defineRiskManagement->setUsers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineRiskManagements from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineRiskManagement[] List of ChildDefineRiskManagement objects
     */
    public function getDefineRiskManagementsJoinProjects(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineRiskManagementQuery::create(null, $criteria);
        $query->joinWith('Projects', $joinBehavior);

        return $this->getDefineRiskManagements($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineRiskManagements from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineRiskManagements from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * If this ChildUsers is new, it will return
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
                    ->filterByUsers($this)
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
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setDefineStakeholderss(Collection $defineStakeholderss, ConnectionInterface $con = null)
    {
        /** @var ChildDefineStakeholders[] $defineStakeholderssToDelete */
        $defineStakeholderssToDelete = $this->getDefineStakeholderss(new Criteria(), $con)->diff($defineStakeholderss);


        $this->defineStakeholderssScheduledForDeletion = $defineStakeholderssToDelete;

        foreach ($defineStakeholderssToDelete as $defineStakeholdersRemoved) {
            $defineStakeholdersRemoved->setUsers(null);
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
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collDefineStakeholderss);
    }

    /**
     * Method called to associate a ChildDefineStakeholders object to this object
     * through the ChildDefineStakeholders foreign key attribute.
     *
     * @param  ChildDefineStakeholders $l ChildDefineStakeholders
     * @return $this|\Users The current object (for fluent API support)
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
        $defineStakeholders->setUsers($this);
    }

    /**
     * @param  ChildDefineStakeholders $defineStakeholders The ChildDefineStakeholders object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
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
            $defineStakeholders->setUsers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineStakeholderss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildDefineStakeholders[] List of ChildDefineStakeholders objects
     */
    public function getDefineStakeholderssJoinProjects(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildDefineStakeholdersQuery::create(null, $criteria);
        $query->joinWith('Projects', $joinBehavior);

        return $this->getDefineStakeholderss($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineStakeholderss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related DefineStakeholderss from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * If this ChildUsers is new, it will return
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
                    ->filterByUsers($this)
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
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setMeasureControlPlans(Collection $measureControlPlans, ConnectionInterface $con = null)
    {
        /** @var ChildMeasureControlPlan[] $measureControlPlansToDelete */
        $measureControlPlansToDelete = $this->getMeasureControlPlans(new Criteria(), $con)->diff($measureControlPlans);


        $this->measureControlPlansScheduledForDeletion = $measureControlPlansToDelete;

        foreach ($measureControlPlansToDelete as $measureControlPlanRemoved) {
            $measureControlPlanRemoved->setUsers(null);
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
                ->filterByUsers($this)
                ->count($con);
        }

        return count($this->collMeasureControlPlans);
    }

    /**
     * Method called to associate a ChildMeasureControlPlan object to this object
     * through the ChildMeasureControlPlan foreign key attribute.
     *
     * @param  ChildMeasureControlPlan $l ChildMeasureControlPlan
     * @return $this|\Users The current object (for fluent API support)
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
        $measureControlPlan->setUsers($this);
    }

    /**
     * @param  ChildMeasureControlPlan $measureControlPlan The ChildMeasureControlPlan object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
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
            $this->measureControlPlansScheduledForDeletion[]= $measureControlPlan;
            $measureControlPlan->setUsers(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related MeasureControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildMeasureControlPlan[] List of ChildMeasureControlPlan objects
     */
    public function getMeasureControlPlansJoinProjects(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildMeasureControlPlanQuery::create(null, $criteria);
        $query->joinWith('Projects', $joinBehavior);

        return $this->getMeasureControlPlans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related MeasureControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related MeasureControlPlans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
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
     * Clears out the collProjectssRelatedByCreatedBy collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProjectssRelatedByCreatedBy()
     */
    public function clearProjectssRelatedByCreatedBy()
    {
        $this->collProjectssRelatedByCreatedBy = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProjectssRelatedByCreatedBy collection loaded partially.
     */
    public function resetPartialProjectssRelatedByCreatedBy($v = true)
    {
        $this->collProjectssRelatedByCreatedByPartial = $v;
    }

    /**
     * Initializes the collProjectssRelatedByCreatedBy collection.
     *
     * By default this just sets the collProjectssRelatedByCreatedBy collection to an empty array (like clearcollProjectssRelatedByCreatedBy());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectssRelatedByCreatedBy($overrideExisting = true)
    {
        if (null !== $this->collProjectssRelatedByCreatedBy && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProjectsTableMap::getTableMap()->getCollectionClassName();

        $this->collProjectssRelatedByCreatedBy = new $collectionClassName;
        $this->collProjectssRelatedByCreatedBy->setModel('\Projects');
    }

    /**
     * Gets an array of ChildProjects objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     * @throws PropelException
     */
    public function getProjectssRelatedByCreatedBy(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectssRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collProjectssRelatedByCreatedBy || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectssRelatedByCreatedBy) {
                // return empty collection
                $this->initProjectssRelatedByCreatedBy();
            } else {
                $collProjectssRelatedByCreatedBy = ChildProjectsQuery::create(null, $criteria)
                    ->filterByUsersRelatedByCreatedBy($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProjectssRelatedByCreatedByPartial && count($collProjectssRelatedByCreatedBy)) {
                        $this->initProjectssRelatedByCreatedBy(false);

                        foreach ($collProjectssRelatedByCreatedBy as $obj) {
                            if (false == $this->collProjectssRelatedByCreatedBy->contains($obj)) {
                                $this->collProjectssRelatedByCreatedBy->append($obj);
                            }
                        }

                        $this->collProjectssRelatedByCreatedByPartial = true;
                    }

                    return $collProjectssRelatedByCreatedBy;
                }

                if ($partial && $this->collProjectssRelatedByCreatedBy) {
                    foreach ($this->collProjectssRelatedByCreatedBy as $obj) {
                        if ($obj->isNew()) {
                            $collProjectssRelatedByCreatedBy[] = $obj;
                        }
                    }
                }

                $this->collProjectssRelatedByCreatedBy = $collProjectssRelatedByCreatedBy;
                $this->collProjectssRelatedByCreatedByPartial = false;
            }
        }

        return $this->collProjectssRelatedByCreatedBy;
    }

    /**
     * Sets a collection of ChildProjects objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $projectssRelatedByCreatedBy A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setProjectssRelatedByCreatedBy(Collection $projectssRelatedByCreatedBy, ConnectionInterface $con = null)
    {
        /** @var ChildProjects[] $projectssRelatedByCreatedByToDelete */
        $projectssRelatedByCreatedByToDelete = $this->getProjectssRelatedByCreatedBy(new Criteria(), $con)->diff($projectssRelatedByCreatedBy);


        $this->projectssRelatedByCreatedByScheduledForDeletion = $projectssRelatedByCreatedByToDelete;

        foreach ($projectssRelatedByCreatedByToDelete as $projectsRelatedByCreatedByRemoved) {
            $projectsRelatedByCreatedByRemoved->setUsersRelatedByCreatedBy(null);
        }

        $this->collProjectssRelatedByCreatedBy = null;
        foreach ($projectssRelatedByCreatedBy as $projectsRelatedByCreatedBy) {
            $this->addProjectsRelatedByCreatedBy($projectsRelatedByCreatedBy);
        }

        $this->collProjectssRelatedByCreatedBy = $projectssRelatedByCreatedBy;
        $this->collProjectssRelatedByCreatedByPartial = false;

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
    public function countProjectssRelatedByCreatedBy(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectssRelatedByCreatedByPartial && !$this->isNew();
        if (null === $this->collProjectssRelatedByCreatedBy || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectssRelatedByCreatedBy) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectssRelatedByCreatedBy());
            }

            $query = ChildProjectsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsersRelatedByCreatedBy($this)
                ->count($con);
        }

        return count($this->collProjectssRelatedByCreatedBy);
    }

    /**
     * Method called to associate a ChildProjects object to this object
     * through the ChildProjects foreign key attribute.
     *
     * @param  ChildProjects $l ChildProjects
     * @return $this|\Users The current object (for fluent API support)
     */
    public function addProjectsRelatedByCreatedBy(ChildProjects $l)
    {
        if ($this->collProjectssRelatedByCreatedBy === null) {
            $this->initProjectssRelatedByCreatedBy();
            $this->collProjectssRelatedByCreatedByPartial = true;
        }

        if (!$this->collProjectssRelatedByCreatedBy->contains($l)) {
            $this->doAddProjectsRelatedByCreatedBy($l);

            if ($this->projectssRelatedByCreatedByScheduledForDeletion and $this->projectssRelatedByCreatedByScheduledForDeletion->contains($l)) {
                $this->projectssRelatedByCreatedByScheduledForDeletion->remove($this->projectssRelatedByCreatedByScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProjects $projectsRelatedByCreatedBy The ChildProjects object to add.
     */
    protected function doAddProjectsRelatedByCreatedBy(ChildProjects $projectsRelatedByCreatedBy)
    {
        $this->collProjectssRelatedByCreatedBy[]= $projectsRelatedByCreatedBy;
        $projectsRelatedByCreatedBy->setUsersRelatedByCreatedBy($this);
    }

    /**
     * @param  ChildProjects $projectsRelatedByCreatedBy The ChildProjects object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function removeProjectsRelatedByCreatedBy(ChildProjects $projectsRelatedByCreatedBy)
    {
        if ($this->getProjectssRelatedByCreatedBy()->contains($projectsRelatedByCreatedBy)) {
            $pos = $this->collProjectssRelatedByCreatedBy->search($projectsRelatedByCreatedBy);
            $this->collProjectssRelatedByCreatedBy->remove($pos);
            if (null === $this->projectssRelatedByCreatedByScheduledForDeletion) {
                $this->projectssRelatedByCreatedByScheduledForDeletion = clone $this->collProjectssRelatedByCreatedBy;
                $this->projectssRelatedByCreatedByScheduledForDeletion->clear();
            }
            $this->projectssRelatedByCreatedByScheduledForDeletion[]= $projectsRelatedByCreatedBy;
            $projectsRelatedByCreatedBy->setUsersRelatedByCreatedBy(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ProjectssRelatedByCreatedBy from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     */
    public function getProjectssRelatedByCreatedByJoinClients(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProjectsQuery::create(null, $criteria);
        $query->joinWith('Clients', $joinBehavior);

        return $this->getProjectssRelatedByCreatedBy($query, $con);
    }

    /**
     * Clears out the collProjectssRelatedBySponsor collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProjectssRelatedBySponsor()
     */
    public function clearProjectssRelatedBySponsor()
    {
        $this->collProjectssRelatedBySponsor = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProjectssRelatedBySponsor collection loaded partially.
     */
    public function resetPartialProjectssRelatedBySponsor($v = true)
    {
        $this->collProjectssRelatedBySponsorPartial = $v;
    }

    /**
     * Initializes the collProjectssRelatedBySponsor collection.
     *
     * By default this just sets the collProjectssRelatedBySponsor collection to an empty array (like clearcollProjectssRelatedBySponsor());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectssRelatedBySponsor($overrideExisting = true)
    {
        if (null !== $this->collProjectssRelatedBySponsor && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProjectsTableMap::getTableMap()->getCollectionClassName();

        $this->collProjectssRelatedBySponsor = new $collectionClassName;
        $this->collProjectssRelatedBySponsor->setModel('\Projects');
    }

    /**
     * Gets an array of ChildProjects objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     * @throws PropelException
     */
    public function getProjectssRelatedBySponsor(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectssRelatedBySponsorPartial && !$this->isNew();
        if (null === $this->collProjectssRelatedBySponsor || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectssRelatedBySponsor) {
                // return empty collection
                $this->initProjectssRelatedBySponsor();
            } else {
                $collProjectssRelatedBySponsor = ChildProjectsQuery::create(null, $criteria)
                    ->filterByUsersRelatedBySponsor($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProjectssRelatedBySponsorPartial && count($collProjectssRelatedBySponsor)) {
                        $this->initProjectssRelatedBySponsor(false);

                        foreach ($collProjectssRelatedBySponsor as $obj) {
                            if (false == $this->collProjectssRelatedBySponsor->contains($obj)) {
                                $this->collProjectssRelatedBySponsor->append($obj);
                            }
                        }

                        $this->collProjectssRelatedBySponsorPartial = true;
                    }

                    return $collProjectssRelatedBySponsor;
                }

                if ($partial && $this->collProjectssRelatedBySponsor) {
                    foreach ($this->collProjectssRelatedBySponsor as $obj) {
                        if ($obj->isNew()) {
                            $collProjectssRelatedBySponsor[] = $obj;
                        }
                    }
                }

                $this->collProjectssRelatedBySponsor = $collProjectssRelatedBySponsor;
                $this->collProjectssRelatedBySponsorPartial = false;
            }
        }

        return $this->collProjectssRelatedBySponsor;
    }

    /**
     * Sets a collection of ChildProjects objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $projectssRelatedBySponsor A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setProjectssRelatedBySponsor(Collection $projectssRelatedBySponsor, ConnectionInterface $con = null)
    {
        /** @var ChildProjects[] $projectssRelatedBySponsorToDelete */
        $projectssRelatedBySponsorToDelete = $this->getProjectssRelatedBySponsor(new Criteria(), $con)->diff($projectssRelatedBySponsor);


        $this->projectssRelatedBySponsorScheduledForDeletion = $projectssRelatedBySponsorToDelete;

        foreach ($projectssRelatedBySponsorToDelete as $projectsRelatedBySponsorRemoved) {
            $projectsRelatedBySponsorRemoved->setUsersRelatedBySponsor(null);
        }

        $this->collProjectssRelatedBySponsor = null;
        foreach ($projectssRelatedBySponsor as $projectsRelatedBySponsor) {
            $this->addProjectsRelatedBySponsor($projectsRelatedBySponsor);
        }

        $this->collProjectssRelatedBySponsor = $projectssRelatedBySponsor;
        $this->collProjectssRelatedBySponsorPartial = false;

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
    public function countProjectssRelatedBySponsor(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectssRelatedBySponsorPartial && !$this->isNew();
        if (null === $this->collProjectssRelatedBySponsor || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectssRelatedBySponsor) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectssRelatedBySponsor());
            }

            $query = ChildProjectsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsersRelatedBySponsor($this)
                ->count($con);
        }

        return count($this->collProjectssRelatedBySponsor);
    }

    /**
     * Method called to associate a ChildProjects object to this object
     * through the ChildProjects foreign key attribute.
     *
     * @param  ChildProjects $l ChildProjects
     * @return $this|\Users The current object (for fluent API support)
     */
    public function addProjectsRelatedBySponsor(ChildProjects $l)
    {
        if ($this->collProjectssRelatedBySponsor === null) {
            $this->initProjectssRelatedBySponsor();
            $this->collProjectssRelatedBySponsorPartial = true;
        }

        if (!$this->collProjectssRelatedBySponsor->contains($l)) {
            $this->doAddProjectsRelatedBySponsor($l);

            if ($this->projectssRelatedBySponsorScheduledForDeletion and $this->projectssRelatedBySponsorScheduledForDeletion->contains($l)) {
                $this->projectssRelatedBySponsorScheduledForDeletion->remove($this->projectssRelatedBySponsorScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProjects $projectsRelatedBySponsor The ChildProjects object to add.
     */
    protected function doAddProjectsRelatedBySponsor(ChildProjects $projectsRelatedBySponsor)
    {
        $this->collProjectssRelatedBySponsor[]= $projectsRelatedBySponsor;
        $projectsRelatedBySponsor->setUsersRelatedBySponsor($this);
    }

    /**
     * @param  ChildProjects $projectsRelatedBySponsor The ChildProjects object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function removeProjectsRelatedBySponsor(ChildProjects $projectsRelatedBySponsor)
    {
        if ($this->getProjectssRelatedBySponsor()->contains($projectsRelatedBySponsor)) {
            $pos = $this->collProjectssRelatedBySponsor->search($projectsRelatedBySponsor);
            $this->collProjectssRelatedBySponsor->remove($pos);
            if (null === $this->projectssRelatedBySponsorScheduledForDeletion) {
                $this->projectssRelatedBySponsorScheduledForDeletion = clone $this->collProjectssRelatedBySponsor;
                $this->projectssRelatedBySponsorScheduledForDeletion->clear();
            }
            $this->projectssRelatedBySponsorScheduledForDeletion[]= $projectsRelatedBySponsor;
            $projectsRelatedBySponsor->setUsersRelatedBySponsor(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ProjectssRelatedBySponsor from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     */
    public function getProjectssRelatedBySponsorJoinClients(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProjectsQuery::create(null, $criteria);
        $query->joinWith('Clients', $joinBehavior);

        return $this->getProjectssRelatedBySponsor($query, $con);
    }

    /**
     * Clears out the collProjectssRelatedByLead collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addProjectssRelatedByLead()
     */
    public function clearProjectssRelatedByLead()
    {
        $this->collProjectssRelatedByLead = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collProjectssRelatedByLead collection loaded partially.
     */
    public function resetPartialProjectssRelatedByLead($v = true)
    {
        $this->collProjectssRelatedByLeadPartial = $v;
    }

    /**
     * Initializes the collProjectssRelatedByLead collection.
     *
     * By default this just sets the collProjectssRelatedByLead collection to an empty array (like clearcollProjectssRelatedByLead());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initProjectssRelatedByLead($overrideExisting = true)
    {
        if (null !== $this->collProjectssRelatedByLead && !$overrideExisting) {
            return;
        }

        $collectionClassName = ProjectsTableMap::getTableMap()->getCollectionClassName();

        $this->collProjectssRelatedByLead = new $collectionClassName;
        $this->collProjectssRelatedByLead->setModel('\Projects');
    }

    /**
     * Gets an array of ChildProjects objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     * @throws PropelException
     */
    public function getProjectssRelatedByLead(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectssRelatedByLeadPartial && !$this->isNew();
        if (null === $this->collProjectssRelatedByLead || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collProjectssRelatedByLead) {
                // return empty collection
                $this->initProjectssRelatedByLead();
            } else {
                $collProjectssRelatedByLead = ChildProjectsQuery::create(null, $criteria)
                    ->filterByUsersRelatedByLead($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collProjectssRelatedByLeadPartial && count($collProjectssRelatedByLead)) {
                        $this->initProjectssRelatedByLead(false);

                        foreach ($collProjectssRelatedByLead as $obj) {
                            if (false == $this->collProjectssRelatedByLead->contains($obj)) {
                                $this->collProjectssRelatedByLead->append($obj);
                            }
                        }

                        $this->collProjectssRelatedByLeadPartial = true;
                    }

                    return $collProjectssRelatedByLead;
                }

                if ($partial && $this->collProjectssRelatedByLead) {
                    foreach ($this->collProjectssRelatedByLead as $obj) {
                        if ($obj->isNew()) {
                            $collProjectssRelatedByLead[] = $obj;
                        }
                    }
                }

                $this->collProjectssRelatedByLead = $collProjectssRelatedByLead;
                $this->collProjectssRelatedByLeadPartial = false;
            }
        }

        return $this->collProjectssRelatedByLead;
    }

    /**
     * Sets a collection of ChildProjects objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $projectssRelatedByLead A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setProjectssRelatedByLead(Collection $projectssRelatedByLead, ConnectionInterface $con = null)
    {
        /** @var ChildProjects[] $projectssRelatedByLeadToDelete */
        $projectssRelatedByLeadToDelete = $this->getProjectssRelatedByLead(new Criteria(), $con)->diff($projectssRelatedByLead);


        $this->projectssRelatedByLeadScheduledForDeletion = $projectssRelatedByLeadToDelete;

        foreach ($projectssRelatedByLeadToDelete as $projectsRelatedByLeadRemoved) {
            $projectsRelatedByLeadRemoved->setUsersRelatedByLead(null);
        }

        $this->collProjectssRelatedByLead = null;
        foreach ($projectssRelatedByLead as $projectsRelatedByLead) {
            $this->addProjectsRelatedByLead($projectsRelatedByLead);
        }

        $this->collProjectssRelatedByLead = $projectssRelatedByLead;
        $this->collProjectssRelatedByLeadPartial = false;

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
    public function countProjectssRelatedByLead(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collProjectssRelatedByLeadPartial && !$this->isNew();
        if (null === $this->collProjectssRelatedByLead || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collProjectssRelatedByLead) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getProjectssRelatedByLead());
            }

            $query = ChildProjectsQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsersRelatedByLead($this)
                ->count($con);
        }

        return count($this->collProjectssRelatedByLead);
    }

    /**
     * Method called to associate a ChildProjects object to this object
     * through the ChildProjects foreign key attribute.
     *
     * @param  ChildProjects $l ChildProjects
     * @return $this|\Users The current object (for fluent API support)
     */
    public function addProjectsRelatedByLead(ChildProjects $l)
    {
        if ($this->collProjectssRelatedByLead === null) {
            $this->initProjectssRelatedByLead();
            $this->collProjectssRelatedByLeadPartial = true;
        }

        if (!$this->collProjectssRelatedByLead->contains($l)) {
            $this->doAddProjectsRelatedByLead($l);

            if ($this->projectssRelatedByLeadScheduledForDeletion and $this->projectssRelatedByLeadScheduledForDeletion->contains($l)) {
                $this->projectssRelatedByLeadScheduledForDeletion->remove($this->projectssRelatedByLeadScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildProjects $projectsRelatedByLead The ChildProjects object to add.
     */
    protected function doAddProjectsRelatedByLead(ChildProjects $projectsRelatedByLead)
    {
        $this->collProjectssRelatedByLead[]= $projectsRelatedByLead;
        $projectsRelatedByLead->setUsersRelatedByLead($this);
    }

    /**
     * @param  ChildProjects $projectsRelatedByLead The ChildProjects object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function removeProjectsRelatedByLead(ChildProjects $projectsRelatedByLead)
    {
        if ($this->getProjectssRelatedByLead()->contains($projectsRelatedByLead)) {
            $pos = $this->collProjectssRelatedByLead->search($projectsRelatedByLead);
            $this->collProjectssRelatedByLead->remove($pos);
            if (null === $this->projectssRelatedByLeadScheduledForDeletion) {
                $this->projectssRelatedByLeadScheduledForDeletion = clone $this->collProjectssRelatedByLead;
                $this->projectssRelatedByLeadScheduledForDeletion->clear();
            }
            $this->projectssRelatedByLeadScheduledForDeletion[]= $projectsRelatedByLead;
            $projectsRelatedByLead->setUsersRelatedByLead(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related ProjectssRelatedByLead from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildProjects[] List of ChildProjects objects
     */
    public function getProjectssRelatedByLeadJoinClients(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildProjectsQuery::create(null, $criteria);
        $query->joinWith('Clients', $joinBehavior);

        return $this->getProjectssRelatedByLead($query, $con);
    }

    /**
     * Clears out the collUserssRelatedById collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addUserssRelatedById()
     */
    public function clearUserssRelatedById()
    {
        $this->collUserssRelatedById = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collUserssRelatedById collection loaded partially.
     */
    public function resetPartialUserssRelatedById($v = true)
    {
        $this->collUserssRelatedByIdPartial = $v;
    }

    /**
     * Initializes the collUserssRelatedById collection.
     *
     * By default this just sets the collUserssRelatedById collection to an empty array (like clearcollUserssRelatedById());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initUserssRelatedById($overrideExisting = true)
    {
        if (null !== $this->collUserssRelatedById && !$overrideExisting) {
            return;
        }

        $collectionClassName = UsersTableMap::getTableMap()->getCollectionClassName();

        $this->collUserssRelatedById = new $collectionClassName;
        $this->collUserssRelatedById->setModel('\Users');
    }

    /**
     * Gets an array of ChildUsers objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildUsers is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildUsers[] List of ChildUsers objects
     * @throws PropelException
     */
    public function getUserssRelatedById(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collUserssRelatedByIdPartial && !$this->isNew();
        if (null === $this->collUserssRelatedById || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collUserssRelatedById) {
                // return empty collection
                $this->initUserssRelatedById();
            } else {
                $collUserssRelatedById = ChildUsersQuery::create(null, $criteria)
                    ->filterByUsersRelatedByReportsTo($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collUserssRelatedByIdPartial && count($collUserssRelatedById)) {
                        $this->initUserssRelatedById(false);

                        foreach ($collUserssRelatedById as $obj) {
                            if (false == $this->collUserssRelatedById->contains($obj)) {
                                $this->collUserssRelatedById->append($obj);
                            }
                        }

                        $this->collUserssRelatedByIdPartial = true;
                    }

                    return $collUserssRelatedById;
                }

                if ($partial && $this->collUserssRelatedById) {
                    foreach ($this->collUserssRelatedById as $obj) {
                        if ($obj->isNew()) {
                            $collUserssRelatedById[] = $obj;
                        }
                    }
                }

                $this->collUserssRelatedById = $collUserssRelatedById;
                $this->collUserssRelatedByIdPartial = false;
            }
        }

        return $this->collUserssRelatedById;
    }

    /**
     * Sets a collection of ChildUsers objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $userssRelatedById A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function setUserssRelatedById(Collection $userssRelatedById, ConnectionInterface $con = null)
    {
        /** @var ChildUsers[] $userssRelatedByIdToDelete */
        $userssRelatedByIdToDelete = $this->getUserssRelatedById(new Criteria(), $con)->diff($userssRelatedById);


        $this->userssRelatedByIdScheduledForDeletion = $userssRelatedByIdToDelete;

        foreach ($userssRelatedByIdToDelete as $usersRelatedByIdRemoved) {
            $usersRelatedByIdRemoved->setUsersRelatedByReportsTo(null);
        }

        $this->collUserssRelatedById = null;
        foreach ($userssRelatedById as $usersRelatedById) {
            $this->addUsersRelatedById($usersRelatedById);
        }

        $this->collUserssRelatedById = $userssRelatedById;
        $this->collUserssRelatedByIdPartial = false;

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
    public function countUserssRelatedById(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collUserssRelatedByIdPartial && !$this->isNew();
        if (null === $this->collUserssRelatedById || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collUserssRelatedById) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getUserssRelatedById());
            }

            $query = ChildUsersQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByUsersRelatedByReportsTo($this)
                ->count($con);
        }

        return count($this->collUserssRelatedById);
    }

    /**
     * Method called to associate a ChildUsers object to this object
     * through the ChildUsers foreign key attribute.
     *
     * @param  ChildUsers $l ChildUsers
     * @return $this|\Users The current object (for fluent API support)
     */
    public function addUsersRelatedById(ChildUsers $l)
    {
        if ($this->collUserssRelatedById === null) {
            $this->initUserssRelatedById();
            $this->collUserssRelatedByIdPartial = true;
        }

        if (!$this->collUserssRelatedById->contains($l)) {
            $this->doAddUsersRelatedById($l);

            if ($this->userssRelatedByIdScheduledForDeletion and $this->userssRelatedByIdScheduledForDeletion->contains($l)) {
                $this->userssRelatedByIdScheduledForDeletion->remove($this->userssRelatedByIdScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildUsers $usersRelatedById The ChildUsers object to add.
     */
    protected function doAddUsersRelatedById(ChildUsers $usersRelatedById)
    {
        $this->collUserssRelatedById[]= $usersRelatedById;
        $usersRelatedById->setUsersRelatedByReportsTo($this);
    }

    /**
     * @param  ChildUsers $usersRelatedById The ChildUsers object to remove.
     * @return $this|ChildUsers The current object (for fluent API support)
     */
    public function removeUsersRelatedById(ChildUsers $usersRelatedById)
    {
        if ($this->getUserssRelatedById()->contains($usersRelatedById)) {
            $pos = $this->collUserssRelatedById->search($usersRelatedById);
            $this->collUserssRelatedById->remove($pos);
            if (null === $this->userssRelatedByIdScheduledForDeletion) {
                $this->userssRelatedByIdScheduledForDeletion = clone $this->collUserssRelatedById;
                $this->userssRelatedByIdScheduledForDeletion->clear();
            }
            $this->userssRelatedByIdScheduledForDeletion[]= $usersRelatedById;
            $usersRelatedById->setUsersRelatedByReportsTo(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related UserssRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildUsers[] List of ChildUsers objects
     */
    public function getUserssRelatedByIdJoinClients(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildUsersQuery::create(null, $criteria);
        $query->joinWith('Clients', $joinBehavior);

        return $this->getUserssRelatedById($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Users is new, it will return
     * an empty collection; or if this Users has previously
     * been saved, it will retrieve related UserssRelatedById from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Users.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildUsers[] List of ChildUsers objects
     */
    public function getUserssRelatedByIdJoinAccessLevels(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildUsersQuery::create(null, $criteria);
        $query->joinWith('AccessLevels', $joinBehavior);

        return $this->getUserssRelatedById($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aClients) {
            $this->aClients->removeUsers($this);
        }
        if (null !== $this->aAccessLevels) {
            $this->aAccessLevels->removeUsers($this);
        }
        if (null !== $this->aUsersRelatedByReportsTo) {
            $this->aUsersRelatedByReportsTo->removeUsersRelatedById($this);
        }
        $this->id = null;
        $this->client_id = null;
        $this->status = null;
        $this->access_level_id = null;
        $this->email_address = null;
        $this->password = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->work_title = null;
        $this->reports_to = null;
        $this->profile_image_url = null;
        $this->phone = null;
        $this->city = null;
        $this->state = null;
        $this->zip = null;
        $this->time_zone = null;
        $this->is_logged_in = null;
        $this->last_login = null;
        $this->created_by = null;
        $this->last_updated = null;
        $this->date_time_created = null;
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
            if ($this->collActionTrackings) {
                foreach ($this->collActionTrackings as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collControlControlPlans) {
                foreach ($this->collControlControlPlans as $o) {
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
            if ($this->collDefineRiskManagements) {
                foreach ($this->collDefineRiskManagements as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collDefineStakeholderss) {
                foreach ($this->collDefineStakeholderss as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMeasureControlPlans) {
                foreach ($this->collMeasureControlPlans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectssRelatedByCreatedBy) {
                foreach ($this->collProjectssRelatedByCreatedBy as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectssRelatedBySponsor) {
                foreach ($this->collProjectssRelatedBySponsor as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collProjectssRelatedByLead) {
                foreach ($this->collProjectssRelatedByLead as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collUserssRelatedById) {
                foreach ($this->collUserssRelatedById as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collActionTrackings = null;
        $this->collControlControlPlans = null;
        $this->collControlTestPlans = null;
        $this->collDefineCommunications = null;
        $this->collDefineRiskManagements = null;
        $this->collDefineStakeholderss = null;
        $this->collMeasureControlPlans = null;
        $this->collProjectssRelatedByCreatedBy = null;
        $this->collProjectssRelatedBySponsor = null;
        $this->collProjectssRelatedByLead = null;
        $this->collUserssRelatedById = null;
        $this->aClients = null;
        $this->aAccessLevels = null;
        $this->aUsersRelatedByReportsTo = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UsersTableMap::DEFAULT_STRING_FORMAT);
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
