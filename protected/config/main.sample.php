<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>CMap::mergeArray(
            array(
                'application.models.*',
                'application.components.*',
            )
            ,require(dirname(__FILE__).'/main/import.php')
        ),

    'modules'=>CMap::mergeArray(
            array()
            ,require(dirname(__FILE__).'/main/modules.php')
        ),

    // application components
    'components'=>CMap::mergeArray(
            array(
                'db'=>array(
                    'connectionString' => 'mysql:host=localhost;dbname=sgt',
                    'emulatePrepare' => true,
                    'username' => 'root',
                    'password' => '',
                    'charset' => 'utf8',
                ),

                /*
                'cache'=>array(
                    'class'=>'system.caching.CMemCache',
                    'servers'=>array(
                        array('host'=>'server1', 'port'=>11211),
                        array('host'=>'server2', 'port'=>11211),
                    ),
                ),
                'cache'=>array(
                    //'class'=>'CDummyCache',
                    'class'=>'CDbCache',
                    'connectionID'=>'db'
                ),
                */
            )
            ,require(dirname(__FILE__).'/main/components.php')
        ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>CMap::mergeArray(
            array()
            ,require(dirname(__FILE__).'/main/params.php')
        ),
),require(dirname(__FILE__).'/main/extra.php'));