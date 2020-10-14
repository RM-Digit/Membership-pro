<?php

namespace Map;

use \AnalyzeCeMatrixData;
use \AnalyzeCeMatrixDataQuery;
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
 * This class defines the structure of the 'analyze_ce_matrix_data' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class AnalyzeCeMatrixDataTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.AnalyzeCeMatrixDataTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'analyze_ce_matrix_data';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\AnalyzeCeMatrixData';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'AnalyzeCeMatrixData';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    const COL_ID = 'analyze_ce_matrix_data.id';

    /**
     * the column name for the matrix_id field
     */
    const COL_MATRIX_ID = 'analyze_ce_matrix_data.matrix_id';

    /**
     * the column name for the matrix_output_id field
     */
    const COL_MATRIX_OUTPUT_ID = 'analyze_ce_matrix_data.matrix_output_id';

    /**
     * the column name for the correlation field
     */
    const COL_CORRELATION = 'analyze_ce_matrix_data.correlation';

    /**
     * the column name for the date_time_created field
     */
    const COL_DATE_TIME_CREATED = 'analyze_ce_matrix_data.date_time_created';

    /**
     * the column name for the last_updated field
     */
    const COL_LAST_UPDATED = 'analyze_ce_matrix_data.last_updated';

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
        self::TYPE_PHPNAME       => array('Id', 'MatrixId', 'MatrixOutputId', 'Correlation', 'DateTimeCreated', 'LastUpdated', ),
        self::TYPE_CAMELNAME     => array('id', 'matrixId', 'matrixOutputId', 'correlation', 'dateTimeCreated', 'lastUpdated', ),
        self::TYPE_COLNAME       => array(AnalyzeCeMatrixDataTableMap::COL_ID, AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID, AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID, AnalyzeCeMatrixDataTableMap::COL_CORRELATION, AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED, AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED, ),
        self::TYPE_FIELDNAME     => array('id', 'matrix_id', 'matrix_output_id', 'correlation', 'date_time_created', 'last_updated', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'MatrixId' => 1, 'MatrixOutputId' => 2, 'Correlation' => 3, 'DateTimeCreated' => 4, 'LastUpdated' => 5, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'matrixId' => 1, 'matrixOutputId' => 2, 'correlation' => 3, 'dateTimeCreated' => 4, 'lastUpdated' => 5, ),
        self::TYPE_COLNAME       => array(AnalyzeCeMatrixDataTableMap::COL_ID => 0, AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID => 1, AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID => 2, AnalyzeCeMatrixDataTableMap::COL_CORRELATION => 3, AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED => 4, AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED => 5, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'matrix_id' => 1, 'matrix_output_id' => 2, 'correlation' => 3, 'date_time_created' => 4, 'last_updated' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
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
        $this->setName('analyze_ce_matrix_data');
        $this->setPhpName('AnalyzeCeMatrixData');
        $this->setIdentifierQuoting(true);
        $this->setClassName('\\AnalyzeCeMatrixData');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('matrix_id', 'MatrixId', 'INTEGER', 'analyze_ce_matrix', 'id', true, null, null);
        $this->addForeignKey('matrix_output_id', 'MatrixOutputId', 'INTEGER', 'analyze_ce_matrix_outputs', 'id', false, null, null);
        $this->addColumn('correlation', 'Correlation', 'VARCHAR', true, 255, null);
        $this->addColumn('date_time_created', 'DateTimeCreated', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_updated', 'LastUpdated', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('AnalyzeCeMatrix', '\\AnalyzeCeMatrix', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':matrix_id',
    1 => ':id',
  ),
), 'CASCADE', null, null, false);
        $this->addRelation('AnalyzeCeMatrixOutputs', '\\AnalyzeCeMatrixOutputs', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':matrix_output_id',
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
        return $withPrefix ? AnalyzeCeMatrixDataTableMap::CLASS_DEFAULT : AnalyzeCeMatrixDataTableMap::OM_CLASS;
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
     * @return array           (AnalyzeCeMatrixData object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = AnalyzeCeMatrixDataTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AnalyzeCeMatrixDataTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AnalyzeCeMatrixDataTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AnalyzeCeMatrixDataTableMap::OM_CLASS;
            /** @var AnalyzeCeMatrixData $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AnalyzeCeMatrixDataTableMap::addInstanceToPool($obj, $key);
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
            $key = AnalyzeCeMatrixDataTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AnalyzeCeMatrixDataTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var AnalyzeCeMatrixData $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AnalyzeCeMatrixDataTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(AnalyzeCeMatrixDataTableMap::COL_ID);
            $criteria->addSelectColumn(AnalyzeCeMatrixDataTableMap::COL_MATRIX_ID);
            $criteria->addSelectColumn(AnalyzeCeMatrixDataTableMap::COL_MATRIX_OUTPUT_ID);
            $criteria->addSelectColumn(AnalyzeCeMatrixDataTableMap::COL_CORRELATION);
            $criteria->addSelectColumn(AnalyzeCeMatrixDataTableMap::COL_DATE_TIME_CREATED);
            $criteria->addSelectColumn(AnalyzeCeMatrixDataTableMap::COL_LAST_UPDATED);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.matrix_id');
            $criteria->addSelectColumn($alias . '.matrix_output_id');
            $criteria->addSelectColumn($alias . '.correlation');
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
        return Propel::getServiceContainer()->getDatabaseMap(AnalyzeCeMatrixDataTableMap::DATABASE_NAME)->getTable(AnalyzeCeMatrixDataTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(AnalyzeCeMatrixDataTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new AnalyzeCeMatrixDataTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a AnalyzeCeMatrixData or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or AnalyzeCeMatrixData object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AnalyzeCeMatrixData) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
            $criteria->add(AnalyzeCeMatrixDataTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AnalyzeCeMatrixDataQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AnalyzeCeMatrixDataTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AnalyzeCeMatrixDataTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the analyze_ce_matrix_data table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return AnalyzeCeMatrixDataQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a AnalyzeCeMatrixData or Criteria object.
     *
     * @param mixed               $criteria Criteria or AnalyzeCeMatrixData object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AnalyzeCeMatrixDataTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from AnalyzeCeMatrixData object
        }

        if ($criteria->containsKey(AnalyzeCeMatrixDataTableMap::COL_ID) && $criteria->keyContainsValue(AnalyzeCeMatrixDataTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AnalyzeCeMatrixDataTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AnalyzeCeMatrixDataQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // AnalyzeCeMatrixDataTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
AnalyzeCeMatrixDataTableMap::buildTableMap();
