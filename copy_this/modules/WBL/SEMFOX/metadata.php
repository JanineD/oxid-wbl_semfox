<?php
    /**
     * ./modules/WBL/SEMFOX/metadata.php
     * @author     blange <code@wbl-konzept.de>
     * @category   modules
     * @package    WBL_SEMFOX
     * @version    $id$
     */

    $sMetadataVersion      = '1.1';
    $sWBLSEMFOXOXIDConfig  = class_exists('oxRegistry', false) ? oxRegistry::getConfig() : oxConfig::getInstance();
    $sWBLSEMFOXOXIDVersion = substr($sWBLSEMFOXOXIDConfig->getVersion(), 0, 5);
    $aWBLSEMFOXClasses     = array(
        'oxarticle' => 'WBL/SEMFOX/app/model/wblsemfox_article',
        'oxsearch' => 'WBL/SEMFOX/app/model/wblsemfox_search'
    );
    $aWBLSEMFOXFiles       = array();

    $aModule = array(
        'author'      => 'WBL Konzept',
        'blocks'      => array(
            array(
                'block'    => 'widget_header_search_form',
                'file'     => 'views/blocks/widget_header_search_form.tpl',
                'template' => 'widget/header/search.tpl'
            )
        ),
        'description' => array(
            'de' => 'SEMFOX-Connector',
            'en' => 'SEMFOX-Connector'
        ),
        'email'       => 'code@wbl-konzept.de',
        'extend'      => $aWBLSEMFOXClasses,
        'files'       => $aWBLSEMFOXFiles,
        'id'          => 'WBL_SEMFOX',
        'settings'    => array(
            array(
                'group' => 'WBL_SEMFOX_GENERAL',
                'name'  => 'sWBLSEMFOXAPIKey',
                'type'  => (version_compare($sWBLSEMFOXOXIDVersion, '4.9.0', '>=')) ? 'password' : 'str'
            ),
            array(
                'group' => 'WBL_SEMFOX_GENERAL',
                'name'  => 'sWBLSEMFOXCustomerId',
                'type'  => 'str'
            ),
            array(
                'group' => 'WBL_SEMFOX_SUGGEST',
                'name'  => 'sWBLSEMFOXSuggestThrottleTime',
                'type'  => 'num',
                'value' => '50'
            ),
            array(
                'group' => 'WBL_SEMFOX_SUGGEST',
                'name'  => 'sWBLSEMFOXSuggestEnterCallback',
                'type'  => 'str',
                'value' => 'if (link) { window.location = link; } else { $("#searchParam").closest("form").trigger("submit"); }'
            ), array(
                'group' => 'WBL_SEMFOX_SUGGEST',
                'name'  => 'bWBLSEMFOXHighlight',
                'type'  => 'bool',
                'value' => true
            ),
            array(
                'group' => 'WBL_SEMFOX_SUGGEST',
                'name'  => 'bWBLSEMFOXQueryVisualizationHeadline',
                'type'  => 'str',
                'value' => 'Ihre Suche Visualisiert'
            ),
            array(
                'group' => 'WBL_SEMFOX_SUGGEST',
                'name'  => 'bWBLSEMFOXInstantVisualFeedback',
                'type'  => 'str',
                'value' => 'none'
            ),
            array(
                'group' => 'WBL_SEMFOX_CONNECTION',
                'name'  => 'sWBLSEMFOXPort',
                'type'  => 'str',
                'value' => '8585'
            ),
            array(
                'group' => 'WBL_SEMFOX_CONNECTION',
                'name'  => 'sWBLSEMFOXConnectionTimeout',
                'type'  => 'num',
                'value' => '3'
            ),
            array(
                'constraints' => 'oxid|oxartnum|oxean',
                'group'       => 'WBL_SEMFOX_ARTICLES',
                'name'        => 'sWBLSEMFOXIDField',
                'type'        => 'select',
                'value'       => 'oxartnum'
            ),
            array(
                'group' => 'WBL_SEMFOX_ARTICLES',
                'name'  => 'aWBLSEMFOXFieldMapping',
                'type'  => 'aarr',
                'value' => array(
                    'getMainCatNameForWBLSEMFOX()' => 'category',
                    'getPictureUrl()'              => 'image',
                    'oxartnum'                     => 'articleNumber',
                    'oxean'                        => 'ean',
                    'oxtitle'                      => 'name',
                )
            )
        ),
        'title'       => 'WBL SEMFOX',
        'thumbnail'   => 'wbl_logo.jpg',
        'url'         => 'http://wbl-konzept.de',
        'version'     => '1.0.0-dev'
    );