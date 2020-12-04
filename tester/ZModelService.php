<?php

/**
 *
 *
 * Author:  Asror Zakirov
 *
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

namespace common\service\giiapp;

use common\system\Az;
use common\system\helpers\ZArrayHelper;
use common\system\helpers\ZFileHelper;
use common\system\helpers\ZInflector;
use common\system\kernels\ZFrame;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\db\Command;
use yii\db\Connection;
use yii\db\Schema;
use yii\helpers\Inflector;


class ZModelService extends ZFrame
{
    private $tableName;
    private $classNames;

    public const Namespace_Cores = "common\actives\cores\\";
    public const Namespace_Model = "common\actives\model\\";
    public const Path_Model = '/actives/model';
    public const Path_Cores = '/actives/cores/';

    public $bOverwrite = true;

    private $modelClass;
    private $generateRelations = true;
    private $generateLabelsFromComments = false;
    private $useTablePrefix = false;

    private $tableNames;
    private $sAllRelation;
    private $message;
    private $allLabels;
    private $attrByRelation;
    private $sAllRule;
    private $attrByType;
    private $StringSearchAtrribs;
    private $IntegerSearchAtrribs;
    private $sHasOneAddon;
    private $sHasManyAddon;
    public const aExceptionColumn = [
        /**
         * included lower-case attributes as DB has them...
         */
        'id',
        'createdAt',
        'modifiedAt',
        'createdBy',
        'modifiedBy',
    ];

    private $sResult;
    private $sTemplate;

    private $sAllColumns;

    private $sSampleRelationsAll = <<<PHP
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function get{TableName}()
    {
        { // ThisRelation }
    }
    
PHP;

    public $sSampleOtherRules = <<<PHP
    { //OtherRules },\r\n
PHP;

    public $sSampleSafeRules = <<<PHP
[[[{ //SafeRules }], 'safe']]
PHP;

    public $sSampleSearchInteger = <<<PHP
        '{columnName}' => \$this->{columnName},\r\n
PHP;

    public $sSampleSearchOthers = <<<PHP
                ->andFilterWhere(['like', '{columnName}', \$this->{columnName}]){ifLastItem}
PHP;

    public $sAttributesByType = <<<PHP
 * @property {attrType} \${attrName}\r\n
PHP;

    public $sAttributesByRelation = <<<PHP
 * @property {className}{prefBracket} \${tableName}\r\n
PHP;

    public $sLabels = <<<PHP
    '{attrID}' => Az::l('{attrName}'),\r\n
PHP;

    public $sIntellectData = <<<PHP
    '{fieldName}' => [
            {DynaGridBoolean}
            {widgetData}
            {attribData}
        ],\r\n
PHP;

    public $sIntellectAttrib = <<<PHP
{ifFirstItem}{attribKey} => {attribValue}{ifLastItem}
PHP;

    public $sHasOne = <<<PHP
        '{className}' => {attribName},\r\n
PHP;

    public $sHasMany = <<<PHP
        '{className}' => {attribName},\r\n
PHP;

    public $sSampleAllColumns = <<<PHP
        '{columnName}' => '{columnType}',\r\n
PHP;


    /**
     * @inheritdoc
     * @param string $sChoosedTable
     * @throws Exception
     * @throws NotSupportedException
     */
    public function run(string $sChoosedTable = null)
    {
        Az::start(__FUNCTION__);
        $db = $this->getDbConnection();
        $connection = \Yii::$app->getDb();

        if (!$db)
            return Az::error($db, 'DB Connection Error');

        $sTemplate = file_get_contents(\Yii::getAlias('@common') . '/service/giiapp/sample/Model.php');

        $schemaName = $this->getSchemaName();

        Az::debug($schemaName, 'schemaName =');

        $aRelation = $this->generateRelations();

        $aTableSchema = $db->getSchema()->getTableSchemas($schemaName);

        Az::count($aTableSchema, 'Table Schema Count');

        $aChoosedTable = $this->getChoosenTables($sChoosedTable, $aTableSchema);

        foreach ($aChoosedTable as $table) {
            $tableName = $table->name;

            $this->getAllColumns($table);

            $this->fillRelationsArray($table->name);

            $this->setModelLabels($table, $connection, $tableName);

            $className = $this->generateClassName($tableName);

            Az::trace($className, "Classname for {$tableName}", 'ClassNameFor', 1);

            $attrByRelation = null;

            $this->setRelations($aRelation, $className);

            //All Rules
            $aRule = $this->generateRules($table);

            $this->setOtherRules($aRule);

            $attrByType = null;

            $columns = $this->setAttributesByType($table);

            $sSafeRule = $this->setSafeRules($columns);

            //search method
            $this->generateSearchMethod($table);

            //core classes
            $coreClassName = $this->setCoreClassName($className);

            //table comment
            $tableParams = $this->getTableComment($connection, $table);

            if ($tableParams[0] !== '0') {
                $tobeGeneratedModel = true;
                $sName = ZArrayHelper::getValue($tableParams, 2, 'name');
                $sTitle = ZArrayHelper::getValue($tableParams, 3, $tableName);
                $sTitle = ZInflector::humanize($sTitle);
            } else {
                $tobeGeneratedModel = false;
                Az::trace($table->name, '!! This table will not result in model generation');
                $sName = '';
                $sTitle = '';
            }

            if (isset($tableParams[1]) && $tableParams[1] === '1') {
                $tobeGeneratedCrud = true;
            } else {
                $tobeGeneratedCrud = false;
            }

            $sResult = strtr(
                $sTemplate,
                [
                    '//@attr-by-relation' => $this->attrByRelation,
                    '//@attr-by-type' => $this->attrByType,
                    '// Columns' => $this->sAllColumns,
                    '//useCoreClass' => ($coreClassName) ? 'use ' . self::Namespace_Cores . $className . "Core;" : false,
                    'ZClassName' => $className,
                    '//label-string' => $this->allLabels,
                    "ZBaseClass" => ($coreClassName) ? $coreClassName : "ZActiveRecord",
                    "'{bCrud}'" => ($tobeGeneratedCrud) ? "true" : "false",
                    "{name}" => $sName,
                    "{customTitle}" => $sTitle,
                    "//Relations" => $this->sAllRelation,
                    "{tableName}" => $tableName,
                    "'0//validateRules'" => $this->sAllRule,
                    "'0//safeRules'" => $sSafeRule,
                    "'';//searchClass" => $className,
                    '//IntegerSearchAtrribs' => $this->IntegerSearchAtrribs,
                    "= '';//StringSearchAtrribs;" => $this->StringSearchAtrribs . ';',
                    '// AddonHasOne' => $this->sHasOneAddon,
                    '// AddonHasMany' => $this->sHasManyAddon,
                ]
            );

            if ($coreClassName !== null) {

                $aMethod = get_class_methods(self::Namespace_Cores . $coreClassName);

                if (empty($aMethod)) {
                    echo Az::debug($aMethod, 'Is Not Array');
                    continue;
                }


                $aMethod = array_slice($aMethod, 0, 10);

                if (ZArrayHelper::isIn('rules', $aMethod)) {
                    Az::trace('Rules method detected!');
                    $sResult = preg_replace('/\/\/ rules-start[\s\S]+?\/\/ rules-end/', '', $sResult);
                }

                if (ZArrayHelper::isIn('search', $aMethod)) {
                    Az::trace('search method detected!');
                    $sResult = preg_replace('/\/\/ search-start[\s\S]+?\/\/ search-end/', '', $sResult);
                }

                if (ZArrayHelper::isIn('labels', $aMethod)) {
                    Az::trace('labels method detected!');
                    $sResult = preg_replace('/\/\/ labels-start[\s\S]+?\/\/ labels-end/', '', $sResult);
                }
            }

            $this->sResult = $sResult;
            $this->replace();


            $sModelPath = \Yii::getAlias('@common') . self::Path_Model;
            ZFileHelper::createDirectory($sModelPath);

            if ($tobeGeneratedModel) {
                file_put_contents("{$sModelPath}/$className.php", $this->sResult);
            }
        }
        Az::end();
        return true;
    }

    private function getAllColumns($table)
    {
        $this->sAllColumns = null;
        foreach ($table->columns as $column) {
            if (!ZArrayHelper::isIn($column->name, self::aExceptionColumn)) {
                $this->sAllColumns .= strtr(
                    $this->sSampleAllColumns,
                    [
                        '{columnName}' => $column->name,
                        '{columnType}' => $column->type,
                    ]
                );
            }
        }
    }

    private function fillRelationsArray($sTableName)
    {
        $this->sHasOneAddon = null;
        $this->sHasManyAddon = null;

        $sTableClass = $this->generateClassName($sTableName);
        $aAllRelation = $this->generateRelations();

        if (!array_key_exists($sTableClass, $aAllRelation))
            return Az::debug($sTableClass, 'There are no relations');

        $aRelation = $aAllRelation[$sTableClass];

        foreach ($aRelation as $sKeyItem => $aRelationItem) {
            if ($aRelationItem[2] === false) {
                $aMatch = [];
                preg_match("/\['\w*?' => '(\w*)'\]/", $aRelationItem[0], $aMatch);
                $this->sHasOneAddon .= strtr(
                    $this->sHasOne,
                    [
                        '{className}' => $aRelationItem[1],
                        '{attribName}' => str_replace(' => ', ', ', $aMatch[0]),
                    ]
                );
            } else {
                $aMatch = [];
                preg_match("/\['\w*?' => '(\w*)'\]/", $aRelationItem[0], $aMatch);
                $this->sHasManyAddon .= strtr(
                    $this->sHasMany,
                    [
                        '{className}' => $aRelationItem[1],
                        '{attribName}' => str_replace(' => ', ', ', $aMatch[0])
                    ]
                );
            }

        }
    }

    private function getTableComment($connection, $table)
    {
        /** @var Connection $connection */
        $command = $connection->createCommand("select obj_description('$table->name'::regclass)");

        /** @var Command $command */
        $commentResult = $command->queryAll();

        return explode("\r\n", $commentResult[0]['obj_description']);
    }

    private function setCoreClassName($className)
    {
        $fName = \Yii::getAlias('@common') . self::Path_Cores . $className . "Core.php";
        $coreClassName = null;
        if (file_exists($fName)) {
            //core exists
            return $className . "Core";
        }

    }

    private function generateSearchMethod($table)
    {
        $this->IntegerSearchAtrribs = null;
        $this->StringSearchAtrribs = null;
        $iCounter = 0;

        foreach ($table->columns as $iKey => $column) {
            $iColumnCount = \count($table->columns) - 1;
            $sNewLine = "\r\n";

            switch ($column->type) {
                case Schema::TYPE_BOOLEAN:
                case Schema::TYPE_FLOAT:
                case Schema::TYPE_DECIMAL:
                case Schema::TYPE_MONEY:
                case Schema::TYPE_DATE:
                case Schema::TYPE_TIME:
                case Schema::TYPE_DATETIME:
                case Schema::TYPE_TIMESTAMP:
                case Schema::TYPE_STRING:
                    $this->StringSearchAtrribs .= strtr(
                        $this->sSampleSearchOthers,
                        [
                            '{columnName}' => $column->name,
                            '{ifLastItem}' => $sNewLine
                        ]
                    );

                    if ($table->name === 'user')
                        Az::debug("Column = {$column->name}, iCounter = $iCounter, lastItem = $iColumnCount", 'String ');
                    break;

                case Schema::TYPE_SMALLINT:
                case Schema::TYPE_INTEGER:
                case Schema::TYPE_BIGINT:
                default:
                    $this->IntegerSearchAtrribs .= strtr(
                        $this->sSampleSearchInteger,
                        [
                            "{columnName}" => $column->name,
                        ]
                    );
                    break;
            }
            $iCounter++;
        }
    }

    private function setSafeRules($columns)
    {
        $safeRules = '';
        $safeRules .= strtr(
            $this->sSampleSafeRules,
            [/**
             * Attention! This rtrim is compulsory and has been left intentionally
             * d0nik
             */
                "{ //SafeRules }" => rtrim($columns, ', '),
            ]
        );

        return $safeRules;
    }

    private function setAttributesByType($table)
    {
        $columns = '';
        $this->attrByType = null;
        foreach ($table->columns as $column) {
            $columns .= "'$column->name', ";
            $type = $column->type;
            switch ($column->type) {
                case "timestamp":
                case "date":
                case "timestamptz":
                case "timetz":
                case "time":
                    $type = "\DateTime";
                    break;

                case "decimal":
                    $type = "int";
                    break;

                case "text":
                case "binary":
                case "varchar":
                    $type = "string";
                    break;

                case "smallint":
                case "integer":
                    $type = "int";
                    break;

                case "json":
                case "jsonb":
                    $type = "array";
                    break;
            }

            $this->attrByType .= strtr(
                $this->sAttributesByType,
                [
                    "{attrType}" => $type,
                    "{attrName}" => $column->name,
                ]
            );

        }
        return $columns;
    }

    private function setOtherRules($aRule)
    {
        $this->sAllRule = null;
        foreach ($aRule as $rule) {
            $this->sAllRule .= strtr(
                $this->sSampleOtherRules,
                [
                    "{ //OtherRules }" => $rule,
                ]
            );
        }
    }

    private function setRelations($aRelation, $className)
    {
        $this->attrByRelation = null;
        $this->sAllRelation = null;
        foreach ($aRelation as $key => $rel) {
            if ($key === $className) {
                foreach ($rel as $r) {
                    if ($r[2] === true) {
                        $tblName = Inflector::pluralize($r[1]);
                    } else {
                        $tblName = $r[1];
                    }
                    $this->sAllRelation .= strtr(
                        $this->sSampleRelationsAll,
                        [
                            '{ // ThisRelation }' => $r[0],
                            '{TableName}' => $tblName
                        ]
                    );
                    //attributes by relation
                    if ($r[2]) {
                        $this->attrByRelation .= strtr(
                            $this->sAttributesByRelation,
                            [
                                '{className}' => $r[1],
                                '{tableName}' => Inflector::pluralize(lcfirst($r[1])),
                                '{prefBracket}' => '[]',
                            ]
                        );
                    } else {
                        $this->attrByRelation .= strtr(
                            $this->sAttributesByRelation,
                            [
                                '{className}' => $r[1],
                                '{tableName}' => lcfirst($r[1]),
                                '{prefBracket}' => '',
                            ]
                        );
                    }
                }
            }
        }
    }

    private function setModelLabels($table, $connection, $tableName)
    {
        $this->allLabels = null;
        foreach ($this->generateLabels($table) as $label => $name) {
            $command = $connection->createCommand("SELECT c.column_name, pgd.title FROM pg_catalog.pg_statio_all_tables as st inner join pg_catalog.pg_description pgd on (pgd.objoid=st.relid) inner join information_schema.columns c on (pgd.objsubid=c.ordinal_position and c.table_schema=st.schemaname and c.table_name=st.relname and c.table_name = '$tableName' and c.table_schema = 'public');");
            $commentResult = $command->queryAll();

            $this->message = false;
            foreach ($commentResult as $comRes) {
                if ($comRes['column_name'] === $label) {
                    $this->message = explode("\r\n", $comRes['title'])[0];
                }
            }
            $this->allLabels .= strtr(
                $this->sLabels,
                [
                    '{attrID}' => $label,
                    '{attrName}' => ($this->message) ? $this->message : $label
                ]
            );
        }
    }

    private function getChoosenTables($sChoosed, $aTableSchema)
    {
        if ($sChoosed !== null) {
            $aChoosedTableName = explode('|', $sChoosed);
            foreach ($aTableSchema as $table) {
                if (ZArrayHelper::isIn($table->name, $aChoosedTableName))
                    $aChoosedTable[] = $table;
            }
        } else
            $aChoosedTable = $aTableSchema;

        return $aChoosedTable;
    }

    private function getSchemaName()
    {
        if (($pos = strpos($this->tableName, '.')) !== false) {
            return substr($this->tableName, 0, $pos);
        }

        return '';
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'AsrorZ Model Generator';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'This generator generates an ActiveRecord class for the specified database table.';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['db', 'ns', 'tableName', 'modelClass', 'baseClass', 'sTitle'], 'filter', 'filter' => 'trim'],
            [['ns'], 'filter', 'filter' => function ($value) {
                return trim($value, '\\');
            }],
            [['db', 'ns', 'tableName', 'baseClass', 'sTitle'], 'required'],
            [['db', 'modelClass'], 'match', 'pattern' => '/^\w+$/', 'message' => 'Only word characters are allowed.'],
            [['ns', 'baseClass'], 'match', 'pattern' => '/^[\w\\\\]+$/', 'message' => 'Only word characters and backslashes are allowed.'],
            [['tableName'], 'match', 'pattern' => '/^(\w+\.)?([\w\*]+)$/', 'message' => 'Only word characters, and optionally an asterisk and/or a dot are allowed.'],
            [['db'], 'validateDb'],
            [['ns'], 'validateNamespace'],
            [['tableName'], 'validateTableName'],
            [['modelClass'], 'validateModelClass', 'skipOnEmpty' => false],
            [['baseClass'], 'validateClass', 'params' => ['extends' => ActiveRecord::className()]],
            [['generateRelations', 'generateLabelsFromComments'], 'boolean'],
            [['enableI18N'], 'boolean'],
            [['useTablePrefix'], 'boolean'],
            [['messageCategory'], 'validateMessageCategory', 'skipOnEmpty' => false],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'ns' => 'Namespace',
            'db' => 'Database Connection ID',
            'tableName' => 'Table Name',
            'modelTitle' => 'Model Title',
            'modelClass' => 'Model Class',
            'sTitle' => 'Name Attribute',
            'baseClass' => 'Base Class',
            'generateRelations' => 'Generate Relations',
            'generateLabelsFromComments' => 'Generate Labels from DB Comments',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return array_merge(parent::hints(), [
            'ns' => 'This is the namespace of the ActiveRecord class to be generated, e.g., <code>common\actives</code>',
            'db' => 'This is the ID of the DB application component.',
            'tableName' => 'This is the name of the DB table that the new ActiveRecord class is associated with, e.g. <code>post</code>.
                The table name may consist of the DB schema part if needed, e.g. <code>public.post</code>.
                The table name may end with asterisk to match multiple table nameOn, e.g. <code>tbl_*</code>
                will match tables who name starts with <code>tbl_</code>. In this case, multiple ActiveRecord classes
                will be generated, one for each matching table name; and the class nameOn will be generated from
                the matching characters. For example, table <code>tbl_post</code> will generate <code>Post</code>
                class.',
            'modelClass' => 'This is the name of the ActiveRecord class to be generated. The class name should not contain
                the namespace part as it is specified in "Namespace". You do not need to specify the class name
                if "Table Name" ends with asterisk, in which case multiple ActiveRecord classes will be generated.',
            'baseClass' => 'This is the base class of the new ActiveRecord class. It should be a fully qualified namespaced class name.',
            'generateRelations' => 'This indicates whether the generator should generate relations based on
                foreign key constraints it detects in the database. Note that if your database contains too many tables,
                you may want to uncheck this option to accelerate the code generation process.',
            'generateLabelsFromComments' => 'This indicates whether the generator should generate attribute labels
                by using the comments of the corresponding DB columns.',
            'useTablePrefix' => 'This indicates whether the table name returned by the generated ActiveRecord class
                should consider the <code>tablePrefix</code> setting of the DB connection. For example, if the
                table name is <code>tbl_post</code> and <code>tablePrefix=tbl_</code>, the ActiveRecord class
                will return the table name as <code>{{%post}}</code>.',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function autoCompleteData()
    {
        $db = $this->getDbConnection();
        if ($db !== null) {
            return [
                'tableName' => function () use ($db) {
                    return $db->getSchema()->getTableNames();
                },
            ];
        }

        return [];
    }

    /**
     * @return Connection the DB connection as specified by [[db]].
     */
    protected function getDbConnection()
    {
        return Az::$app->getDb();
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates()
    {
        return ['model.php'];
    }

    /**
     * @inheritdoc
     */
    public function stickyAttributes()
    {
        return array_merge(parent::stickyAttributes(), ['ns', 'db', 'baseClass', 'generateRelations', 'generateLabelsFromComments']);
    }


    public function replace()
    {
        $this->sResult = str_replace("'' => ''", '', $this->sResult);

        $this->sResult = str_replace('$Q                 ->andFilterWhere', '$Q->andFilterWhere', $this->sResult);

        $this->sResult = str_replace("[
            			[['", "[\r\n\t\t\t[['", $this->sResult);

        $this->sResult = str_replace(',

    ];', ',
    ];', $this->sResult);

        $this->sResult = str_replace("\$Q->andFilterWhere([
                				'id'", "\$Q->andFilterWhere([\r\n\t\t\t\t'id'", $this->sResult);

        $this->sResult = str_replace('
;', ';', $this->sResult);

        $this->sResult = str_replace("= [
        		'", "= [\r\n\t\t'", $this->sResult);

    }

    /**
     * @return array the generated relation declarations
     */
    protected function generateRelations()
    {
        if (!$this->generateRelations) {
            return [];
        }

        $db = $this->getDbConnection();

        if (($pos = strpos($this->tableName, '.')) !== false) {
            $schemaName = substr($this->tableName, 0, $pos);
        } else {
            $schemaName = '';
        }

        $relations = [];
        foreach ($db->getSchema()->getTableSchemas($schemaName) as $table) {
            $tableName = $table->name;
            $className = $this->generateClassName($tableName);
            foreach ($table->foreignKeys as $refs) {
                $refTable = $refs[0];
                unset($refs[0]);
                $fks = array_keys($refs);
                $refClassName = $this->generateClassName($refTable);

                // Add relation for this table
                $link = $this->generateRelationLink(array_flip($refs));
                $relationName = $this->generateRelationName($relations, $className, $table, $fks[0], false);
                $relations[$className][$relationName] = [
                    "return \$this->hasOne($refClassName::class, $link);",
                    $refClassName,
                    false,
                ];

                // Add relation for the referenced table
                $hasMany = false;
                if (count($table->primaryKey) > count($fks)) {
                    $hasMany = true;
                } else {
                    foreach ($fks as $key) {
                        if (!in_array($key, $table->primaryKey, true)) {
                            $hasMany = true;
                            break;
                        }
                    }
                }
                $link = $this->generateRelationLink($refs);
                $relationName = $this->generateRelationName($relations, $refClassName, $refTable, $className, $hasMany);
                $relations[$refClassName][$relationName] = [
                    "return \$this->" . ($hasMany ? 'hasMany' : 'hasOne') . "($className::class, $link);",
                    $className,
                    $hasMany,
                ];
            }

            if (($fks = $this->checkPivotTable($table)) === false) {
                continue;
            }
            $table0 = $fks[$table->primaryKey[0]][0];
            $table1 = $fks[$table->primaryKey[1]][0];
            $className0 = $this->generateClassName($table0);
            $className1 = $this->generateClassName($table1);

            $link = $this->generateRelationLink([$fks[$table->primaryKey[1]][1] => $table->primaryKey[1]]);
            $viaLink = $this->generateRelationLink([$table->primaryKey[0] => $fks[$table->primaryKey[0]][1]]);
            $relationName = $this->generateRelationName($relations, $className0, $db->getTableSchema($table0), $table->primaryKey[1], true);
            $relations[$className0][$relationName] = [
                "return \$this->hasMany($className1::class, $link)->viaTable('" . $this->generateTableName($table->name) . "', $viaLink);",
                $className1,
                true,
            ];

            $link = $this->generateRelationLink([$fks[$table->primaryKey[0]][1] => $table->primaryKey[0]]);
            $viaLink = $this->generateRelationLink([$table->primaryKey[1] => $fks[$table->primaryKey[1]][1]]);
            $relationName = $this->generateRelationName($relations, $className1, $db->getTableSchema($table1), $table->primaryKey[0], true);
            $relations[$className1][$relationName] = [
                "return \$this->hasMany($className0::className(), $link)->viaTable('" . $this->generateTableName($table->name) . "', $viaLink);",
                $className0,
                true,
            ];
        }

        return $relations;
    }

    /**
     * Generates a class name from the specified table name.
     * @param string $tableName the table name (which may contain schema prefix)
     * @return string the generated class name
     */
    protected function generateClassName($tableName)
    {
        if (isset($this->classNames[$tableName])) {
            return $this->classNames[$tableName];
        }

        if (($pos = strrpos($tableName, '.')) !== false) {
            $tableName = substr($tableName, $pos + 1);
        }

        $db = $this->getDbConnection();
        $patterns = [];
        $patterns[] = "/^{$db->tablePrefix}(.*?)$/";
        $patterns[] = "/^(.*?){$db->tablePrefix}$/";
        if (strpos($this->tableName, '*') !== false) {
            $pattern = $this->tableName;
            if (($pos = strrpos($pattern, '.')) !== false) {
                $pattern = substr($pattern, $pos + 1);
            }
            $patterns[] = '/^' . str_replace('*', '(\w+)', $pattern) . '$/';
        }
        $className = $tableName;
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $tableName, $matches)) {
                $className = $matches[1];
                break;
            }
        }

        return $this->classNames[$tableName] = Inflector::id2camel($className, '_');
    }

    /**
     * Generates the link parameter to be used in generating the relation declaration.
     * @param array $refs reference constraint
     * @return string the generated link parameter.
     */
    protected function generateRelationLink($refs)
    {
        $pairs = [];
        foreach ($refs as $a => $b) {
            $pairs[] = "'$a' => '$b'";
        }

        return '[' . implode(', ', $pairs) . ']';
    }

    /**
     * Generate a relation name for the specified table and a base name.
     * @param array $relations the relations being generated currently.
     * @param string $className the class name that will contain the relation declarations
     * @param \yii\db\TableSchema $table the table schema
     * @param string $key a base name that the relation name may be generated from
     * @param boolean $multiple whether this is a has-many relation
     * @return string the relation name
     */
    protected function generateRelationName($relations, $className, $table, $key, $multiple)
    {
        if (!empty($key) && substr_compare($key, 'id', -2, 2, true) === 0 && strcasecmp($key, 'id')) {
            $key = rtrim(substr($key, 0, -2), '_');
        }
        if ($multiple) {
            $key = Inflector::pluralize($key);
        }
        $name = $rawName = Inflector::id2camel($key, '_');
        $i = 0;
        while (isset($table->columns[lcfirst($name)])) {
            $name = $rawName . ($i++);
        }
        while (isset($relations[$className][lcfirst($name)])) {
            $name = $rawName . ($i++);
        }

        return $name;
    }

    /**
     * Checks if the given table is a junction table.
     * For simplicity, this method only deals with the case where the pivot contains two PK columns,
     * each referencing a column in a different table.
     * @param \yii\db\TableSchema the table being checked
     * @return array|boolean the relevant foreign key constraint information if the table is a junction table,
     * or false if the table is not a junction table.
     */
    protected function checkPivotTable($table)
    {
        $pk = $table->primaryKey;
        if (count($pk) !== 2) {
            return false;
        }
        $fks = [];
        foreach ($table->foreignKeys as $refs) {
            if (count($refs) === 2) {
                if (isset($refs[$pk[0]])) {
                    $fks[$pk[0]] = [$refs[0], $refs[$pk[0]]];
                } elseif (isset($refs[$pk[1]])) {
                    $fks[$pk[1]] = [$refs[0], $refs[$pk[1]]];
                }
            }
        }
        if (count($fks) === 2 && $fks[$pk[0]][0] !== $fks[$pk[1]][0]) {
            return $fks;
        }

        return false;
    }

    /**
     * Generates the table name by considering table prefix.
     * If [[useTablePrefix]] is false, the table name will be returned without change.
     * @param string $tableName the table name (which may contain schema prefix)
     * @return string the generated table name
     */
    public function generateTableName($tableName)
    {
        if (!$this->useTablePrefix) {
            return $tableName;
        }

        $db = $this->getDbConnection();
        if (preg_match("/^{$db->tablePrefix}(.*?)$/", $tableName, $matches)) {
            $tableName = '{{%' . $matches[1] . '}}';
        } elseif (preg_match("/^(.*?){$db->tablePrefix}$/", $tableName, $matches)) {
            $tableName = '{{' . $matches[1] . '%}}';
        }
        return $tableName;
    }

    /**
     * @return array the table nameOn that match the pattern specified by [[tableName]].
     */
    protected function getTableNames()
    {
        $db = $this->getDbConnection();
        $dbSchema = $db->schema;
        $tables = $dbSchema->getTableNames();
        $tableNames = [];
        foreach ($tables as $tbl) {
            $tableNames[] = $tbl;
        }
        return $this->tableNames = $tableNames;
    }

    /**
     * Generates the attribute labels for the specified table.
     * @param \yii\db\TableSchema $table the table schema
     * @return array the generated attribute labels (name => label)
     */
    public function generateLabels($table)
    {
        $labels = [];
        foreach ($table->columns as $column) {
            if ($this->generateLabelsFromComments && !empty($column->comment)) {
                $labels[$column->name] = $column->comment;
            } elseif (!strcasecmp($column->name, 'id')) {
                $labels[$column->name] = 'ID';
            } else {
                $label = Inflector::camel2words($column->name);
                if (!empty($label) && substr_compare($label, ' id', -3, 3, true) === 0) {
                    $label = substr($label, 0, -3) . ' ID';
                }
                $labels[$column->name] = $label;
            }
        }

        return $labels;
    }

    /**
     * Generates validation rules for the specified table.
     * @param \yii\db\TableSchema $table the table schema
     * @return array the generated validation rules
     */
    public function generateRules($table)
    {
        $types = [];
        $lengths = [];
        $extensions = [];
        $email = [];
        $files = [];

        foreach ($table->columns as $column) {
            switch (true) {
                case $this->zcore->zUtilsService->checkName($column->name, 'Email'):
                    $email[] = $column->name;

            }
            switch ($column->type) {
                case Schema::TYPE_SMALLINT:
                case Schema::TYPE_INTEGER:
                case Schema::TYPE_BIGINT:
                    if ($column->name !== 'id')
                        $types['integer'][] = $column->name;
                    break;
                case Schema::TYPE_BOOLEAN:
                    $types['boolean'][] = $column->name;
                    break;
                case Schema::TYPE_FLOAT:
                case Schema::TYPE_DECIMAL:
                case Schema::TYPE_MONEY:
                    $types['number'][] = $column->name;
                    break;
                case Schema::TYPE_DATE:
                case Schema::TYPE_TIME:
                case Schema::TYPE_DATETIME:
                case Schema::TYPE_TIMESTAMP:
                case Schema::TYPE_JSON:
                case 'jsonb':
                    $types['safe'][] = $column->name;
                    break;
                default: // strings
                    if ($column->size > 0) {
                        $lengths[$column->size][] = $column->name;
                    } else {
                        $types['string'][] = $column->name;
                    }
            }


            if ($column->autoIncrement) {
                continue;
            }
            if (!$column->allowNull && $column->defaultValue === null) {
                $types['required'][] = $column->name;
            }

        }

        $rules['index'] = [];

        foreach ($types as $type => $columns) {
            $rules['index'][] = "[['" . implode("', '", $columns) . "'], '$type']";
        }

        foreach ($lengths as $length => $columns) {
            $rules['index'][] = "[['" . implode("', '", $columns) . "'], 'string', 'max' => $length]";
        }

        foreach ($email as $k => $v) {
            $rules['index'][] = "[['$v'], 'email']";
        }

        foreach ($files as $k => $v) {
            $rules['index'][] = "[['$v'], 'file', 'maxSize' => 1024*1024*100]";
        }

        foreach ($extensions as $k => $v) {
            $rules['index'][] = "[['$v'], 'file', 'extensions' => 'jpg,png,gif', 'maxSize' => 1024*1024*10]";
        }

        // Unique indexes rules
        try {
            $db = $this->getDbConnection();
            $uniqueIndexes = $db->getSchema()->findUniqueIndexes($table);
            foreach ($uniqueIndexes as $uniqueColumns) {
                // Avoid validating auto incremental columns
                if (!$this->isColumnAutoIncremental($table, $uniqueColumns)) {
                    $attributesCount = \count($uniqueColumns);

                    if ($attributesCount == 1) {
                        $rules['index'][] = "[['" . $uniqueColumns[0] . "'], 'unique']";
                    } elseif ($attributesCount > 1) {
                        $labels = array_intersect_key($this->generateLabels($table), array_flip($uniqueColumns));
                        $lastLabel = array_pop($labels);
                        $columnsList = implode("', '", $uniqueColumns);
                        $rules['index'][] = "[['" . $columnsList . "'], 'unique', 'targetAttribute' => ['" . $columnsList . "'], 'message' => 'The combination of " . implode(', ', $labels) . " and " . $lastLabel . " has already been taken.']";
                    }
                }
            }
        } catch (NotSupportedException $e) {
            // doesn't support unique indexes information...do nothing
        }

        return $rules['index'];
    }


    /**
     * Checks if any of the specified columns is auto incremental.
     * @param \yii\db\TableSchema $table the table schema
     * @param array $columns columns to check for autoIncrement property
     * @return boolean whether any of the specified columns is auto incremental.
     */
    protected function isColumnAutoIncremental($table, $columns)
    {
        foreach ($columns as $column) {
            if (isset($table->columns[$column]) && $table->columns[$column]->autoIncrement) {
                return true;
            }
        }

        return false;
    }

    /**
     * Validates the [[db]] attribute.
     */
    public function validateDb()
    {
        if (!Az::$app->has($this->db)) {
            $this->addError('db', 'There is no application component named "db".');
        } elseif (!Az::$app->get($this->db) instanceof Connection) {
            $this->addError('db', 'The "db" application component must be a DB connection instance.');
        }
    }

    /**
     * Validates the [[ns]] attribute.
     */
    public function validateNamespace()
    {
        $this->ns = ltrim($this->ns, '\\');
        $path = Az::getAlias('@' . str_replace('\\', '/', $this->ns), false);
        if ($path === false) {
            $this->addError('ns', 'Namespace must be associated with an existing directory.');
        }
    }

    /**
     * Validates the [[modelClass]] attribute.
     */
    public function validateModelClass()
    {
        if ($this->isReservedKeyword($this->modelClass)) {
            $this->addError('modelClass', 'Class name cannot be a reserved PHP keyword.');
        }
        if ((empty($this->tableName) || substr_compare($this->tableName, '*', -1, 1)) && $this->modelClass == '') {
            $this->addError('modelClass', 'Model Class cannot be blank if table name does not end with asterisk.');
        }
    }

    /**
     * Validates the [[tableName]] attribute.
     */
    public function validateTableName()
    {
        if (strpos($this->tableName, '*') !== false && substr_compare($this->tableName, '*', -1, 1)) {
            $this->addError('tableName', 'Asterisk is only allowed as the last character.');

            return null;
        }
        $tables = $this->getTableNames();
        if (empty($tables)) {
            $this->addError('tableName', "Table '{$this->tableName}' does not exist.");
        } else {
            foreach ($tables as $table) {
                $class = $this->generateClassName($table);
                if ($this->isReservedKeyword($class)) {
                    $this->addError('tableName', "Table '$table' will generate a class which is a reserved PHP keyword.");
                    break;
                }
            }
        }
    }

    public function actionClear()
    {
        $files = glob(\Yii::getAlias('@common') . '/actives/model/*'); // get all file nameOn
        if ($files) {
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }
            echo "All files cleared";
        } else {
            echo "No files found!";
        }
    }


}
