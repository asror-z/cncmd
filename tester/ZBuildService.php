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


use asrorz\act\ZDatatablesAction;
use common\actives\model\Company;
use common\system\Az;
use common\system\helpers\ZArrayHelper;
use common\system\helpers\ZFileHelper;
use common\system\kernels\ZFrame;
use function GuzzleHttp\Psr7\str;
use yii\helpers\Inflector;
use NumberToWords\NumberToWords;

class ZBuildService extends ZFrame
{

    public $tableName;
    public $classNames;

    public $sResult;

    public $bOverwrite = false;

    public const sPathSample = '@common/service/giiapp/sample/Build.php';

    public $aExceptionColumn = [
        'id',
        'createdAt',
        'modifiedAt',
        'createdBy',
        'modifiedBy',
    ];

    public $sTemplate_Advanced = <<<PHP
    
            /**  {sType}  **/
            '{AttributeName}' => [
                true,
                function ({ZClassName} \$model) {
                    return true;
                },
                ZHInputWidget::class,
                [],
            ],


PHP;


    public $sTemplate_Block = <<<PHP
        '{ordinalNumber}' => [
            [
                '{attributeOne}',
                '{attributeTwo}',
            ],
            [
                '{attributeThree}',
                '{attributeFour}',
            ],
        ],


PHP;

    public $sTemplate_Step = <<<PHP
        '{stepTitle}Step' => [
            '{stepOne}',
            '{stepTwo}'
        ],


PHP;


    public $sTemplate_Title = <<<PHP
            '{title}' => Az::l('{title}'),\r\n
PHP;

    public $sTemplate_StepTitle = <<<PHP
            '{stepTitle}Step' => Az::l('{stepTitle}Step'),\r\n
PHP;


    private $_sReplace_Block = <<<PHP
            [
                '',
                '',
            ],
PHP;
    private $_sReplace_Item = <<<PHP
                '',
PHP;



    public function run()
    {
        $sTemplate = file_get_contents(Az::getAlias(self::sPathSample));

        $aModel = $this->zgiiapp->zCrudService->actualModels(true);

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('en');

        /** @var Company $modelClass */
        foreach ($aModel as $modelClass) {
            $modelClassName = bname($modelClass);

            $aColumn = $modelClass::aColumn;

            $sForms = null;
            $simpleAttribs = null;
            $sBlocks = null;
            $sSteps = null;
            $sTitle = null;
            $sStepsTitle = null;

            $aAttribute = [];
            $aStep = [];

            /*            if ($modelClassName !== 'lang')
                            continue;*/

            $iCount = 0;
            foreach ($aColumn as $sColumn => $sType) {

                $iCount++;
                if (!ZArrayHelper::isIn($sColumn, $this->aExceptionColumn)) {

                    /**
                     *
                     * Advanced Attributes
                     */

                    $sForms .= strtr(
                        $this->sTemplate_Advanced,
                        [
                            '{sType}' => $sType,
                            '{AttributeName}' => $sColumn,
                            '{ZClassName}' => $modelClassName,
                        ]
                    );

                    /**
                     *
                     *  Template_Block
                     */

                    $iOrdinal = ceil($iCount / 4);
                    $sOrdinalNum = ucfirst($numberTransformer->toWords($iOrdinal));

                    $aAttribute[$sOrdinalNum][] = $sColumn;

                }

            }
            $iOrdinalCount = 0;

            foreach ($aAttribute as $sOrdinalNum => $aItem) {
                $iOrdinalCount++;

                $iStep = (int)ceil($iOrdinalCount / 2);
                $aStep[$iStep][] = $sOrdinalNum;

                /**
                 *
                 * Block Template
                 */
                $sBlocks .= strtr(
                    $this->sTemplate_Block,
                    [
                        '{ordinalNumber}' => $sOrdinalNum,
                        '{attributeOne}' => ZArrayHelper::getValue($aItem, 0),
                        '{attributeTwo}' => ZArrayHelper::getValue($aItem, 1),
                        '{attributeThree}' => ZArrayHelper::getValue($aItem, 2),
                        '{attributeFour}' => ZArrayHelper::getValue($aItem, 3),
                    ]
                );

                /**
                 *
                 * Fill Title
                 */
                $sTitle .= strtr(
                    $this->sTemplate_Title,
                    [
                        '{title}' => $sOrdinalNum,
                    ]
                );
            }

            /**
             *
             * Steps
             */

            foreach ($aStep as $iIndex => $aItem) {


                $sOrdinalStepTitle = ucfirst($numberTransformer->toWords($iIndex));

                $sSteps .= strtr(
                    $this->sTemplate_Step,
                    [
                        '{stepTitle}' => $sOrdinalStepTitle,
                        '{stepOne}' => ZArrayHelper::getValue($aItem, 0),
                        '{stepTwo}' => ZArrayHelper::getValue($aItem, 1),
                    ]
                );


                $sStepsTitle .= strtr(
                    $this->sTemplate_StepTitle,
                    [
                        '{stepTitle}' => $sOrdinalStepTitle,
                    ]
                );


            }

            $sResult = strtr(
                $sTemplate,
                [
                    'ZClassName' => $modelClassName,
                    '// Blocks' => $sBlocks,
                    '// Forms' => $sForms,
                    '// Steps' => $sSteps,
                    '// Title' => $sTitle,
                    '// StepTitle' => $sStepsTitle,
                ]
            );

            $sResult = strtr(
                $sResult,
                [
                    $this->_sReplace_Block => '',
                    $this->_sReplace_Item => '',
                ]
            );

            $this->_writeToFile($sResult, $modelClassName);

        }
    }


    private function _writeToFile(string $sResult, string $sModel)
    {


        $this->sResult = $sResult;
        $sFname = \Yii::getAlias('@common') . "/actives/builds/{$sModel}Build.php";
        $sBuildPath = \Yii::getAlias('@common') . "/actives/builds/";

        if (!file_exists($sBuildPath))
            ZFileHelper::createDirectory($sBuildPath);

        if (!file_exists($sFname)) {
            Az::debug($sModel, 'Writing Build Class for');
            file_put_contents($sFname, $this->sResult);
        } else {
            if ($this->bOverwrite) {
                Az::debug($sModel, 'Overwriting Build Class for');
                file_put_contents($sFname, $this->sResult);
            } else
                Az::debug($sModel, 'Build Class is Exists');
        }

    }


    private function getAllColumns($table)
    {
        foreach ($table->columns as $column) {
            $theColumns[] = $column->name;
        }
        return $theColumns;
    }

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

    protected function getDbConnection()
    {
        return Az::$app->getDb();
    }

    private function getSchemaName()
    {
        if (($pos = strpos($this->tableName, '.')) !== false) {
            return substr($this->tableName, 0, $pos);
        }

        return '';
    }
}
