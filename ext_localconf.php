<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// Autoload the DomPDF classes
require_once t3lib_extMgm::extPath($_EXTKEY) . 'vendor/autoload.php';
// Disable PDFDOM autoload, since we're using composer
define('DOMPDF_ENABLE_AUTOLOAD', false);
