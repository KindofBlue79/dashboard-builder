INSERT INTO `widgetsiconsmap` (`id`, `mainWidget`, `targetWidget`, `snap4CityType`, `icon`, `mono_multi`, `description`, `available`, `sm_based`, `defaultParametersMainWidget`, `defaultParametersTargetWidget`, `hasMainWidgetFactory`, `hasTargetWidgetFactory`, `comboName`, `widgetCategory`) VALUES
(74, 'widgetMap_OpenLayers', 'Map_OpenLayers', 'map', 'selector-widget.png', 'Multi', 'Widget showing a list of point of interests categories with a map showing the position of the POIs, a set of sources have to be provided. Using OpenLayers and ArcGIS WFS.', 'true', 'yes', '{\n	"actuatorAttribute" : null,\n	"actuatorEntity" : null,\n	"actuatorTarget" : null,\n	"attributeName" : null,\n	"cancelDate" : null,\n	"canceller" : null,\n	"chartColor" : null,\n	"chartLabelsFontColor" : "#000000",\n	"chartLabelsFontSize" : 12,\n	"color_w" : "#FFFFFF",\n	"controlsPosition" : null,\n	"controlsVisibility" : null,\n	"dataLabelsFontColor" : "#000000",\n	"dataLabelsFontSize" : 12,\n	"defaultTab" : null,\n	"enableFullscreenModal" : "no",\n	"enableFullscreenTab" : "no",\n	"entityJson" : null,\n	"fontColor" : null,\n	"fontFamily" : "Auto",\n	"fontSize" : 16,\n	"frame_color_w" : "rgb(51, 204, 255)",\n	"frequency_w" : 1200,\n	"headerFontColor" : "#FFFFFF",\n	"hospitalList" : null,\n	"infoJson" : null,\n	"infoMessage_w" : null,\n	"lastEditDate" : null,\n	"lastSeries" : null,\n	"link_w" : "none",\n	"municipality_w" : null,\n	"notificatorEnabled" : "no",\n	"notificatorRegistered" : "no",\n	"oldParameters" : null,\n	"parameters" : "{\\"queries\\":[],\\"targets\\":[]}",\n	"scaleX" : null,\n	"scaleY" : null,\n	"serviceUri" : null,\n	"showTitle" : "yes",\n	"size_columns" : 4,\n	"size_rows" : 10,\n	"styleParameters" : "{\\"activeFontColor\\":\\"rgba(0,0,0,1)\\"}",\n	"temporal_range_w" : null,\n	"udm" : null,\n	"udmPos" : null,\n	"viewMode" : "list",\n	"zoomControlsColor" : null,\n	"zoomFactor" : null\n}', '[{\n	"actuatorAttribute" : null,\n	"actuatorEntity" : null,\n	"actuatorTarget" : null,\n	"attributeName" : null,\n	"cancelDate" : null,\n	"canceller" : null,\n	"chartColor" : null,\n	"chartLabelsFontColor" : null,\n	"chartLabelsFontSize" : null,\n	"color_w" : "#FFFFFF",\n	"controlsPosition" : "topLeft",\n	"controlsVisibility" : "alwaysVisible",\n	"dataLabelsFontColor" : null,\n	"dataLabelsFontSize" : null,\n	"defaultTab" : null,\n	"enableFullscreenModal" : "yes",\n	"enableFullscreenTab" : "yes",\n	"entityJson" : null,\n	"fontColor" : "#ffffff",\n	"fontFamily" : "Auto",\n	"fontSize" : null,\n	"frame_color_w" : "rgb(51, 204, 255)",\n	"frequency_w" : null,\n	"headerFontColor" : "#FFFFFF",\n	"hospitalList" : null,\n	"infoJson" : null,\n	"infoMessage_w" : null,\n	"lastEditDate" : null,\n	"lastSeries" : null,\n	"link_w" : "gisTarget",\n	"municipality_w" : null,\n	"notificatorEnabled" : "no",\n	"notificatorRegistered" : "no",\n	"oldParameters" : null,\n	"parameters" : null,\n	"scaleX" : 1,\n	"scaleY" : 1,\n	"serviceUri" : null,\n	"showTitle" : "yes",\n	"size_columns" : 10,\n	"size_rows" : 10,\n	"styleParameters" : null,\n	"temporal_range_w" : null,\n	"udm" : null,\n	"udmPos" : null,\n	"viewMode" : "map",\n	"zoomControlsColor" : null,\n	"zoomFactor" : 1\n}]', 'yes', '["yes"]', 'SelectorAndMap', 'dataViewer');


INSERT INTO `widgets` (`id`, `id_type_widget`, `source_php_widget`, `min_row`, `max_row`, `min_col`, `max_col`, `widgetType`, `unique_metric`, `numeric_rangeOption`, `number_metrics_widget`, `color_widgetOption`, `dimMap`, `widgetCategory`, `isNodeRedSender`, `domainType`, `defaultParameters`, `hasTimer`, `hasChartColor`, `hasDataLabels`, `hasChartLabels`, `hasTimeRange`, `hasCartesianPlane`, `hasChangeMetric`, `hasAddMode`) VALUES
(59, 'widgetMap_OpenLayers', 'widgetMap_OpenLayers.php', 1, 50, 1, 50, 'Testuale', 'Map_OpenLayers', 0, 1, 1, '', 'dataViewer', 'no', '[\'webContent\']', '{}', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no');



INSERT INTO `descriptions` (`id`, `IdMetric`, `description`, `status`, `query`, `query2`, `queryType`, `metricType`, `frequency`, `processType`, `area`, `source`, `description_short`, `dataSource`, `storingData`, `municipalityOption`, `timeRangeOption`, `field1Desc`, `field2Desc`, `field3Desc`, `oldData`, `sameDataAlarmCount`, `oldDataEvalTime`, `hasNegativeValues`, `process`, `threshold`, `thresholdEval`, `boundToMetric`, `status_HTTPRetr`, `username_HTTPRetr`, `password_HTTPRetr`) VALUES
(346, 'Map_OpenLayers', 'Visualizzazione di contenuti provenienti da siti esterni. ArcGis', 'Non attivo', NULL, NULL, 'none', 'Testuale', '60000', 'API', 'Contenuti Esterni', 'Disit', 'Visualizzazione contenuti provenienti da siti esterni (ARCGIS)', 'none', 1, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 0, 'DashboardProcess', NULL, NULL, NULL, 'Non Attivo', NULL, NULL);