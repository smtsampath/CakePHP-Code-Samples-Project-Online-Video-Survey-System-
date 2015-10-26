/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	// Define changes to default configuration here. For example:
    // config.language = 'fr';
 
	// config.uiColor = 'blue';
	//config.extraPlugins = 'MediaEmbed';
	config.filebrowserBrowseUrl = '/app/webroot/js/ckeditor/filemanager/index.html';
    config.filebrowserImageBrowseUrl = '/app/webroot/js/ckeditor/filemanager/index.html?type=Images';
    //config.filebrowserFlashBrowseUrl = '/app/webroot/js/ckeditor/filemanager/index.html?type=Flash';
    config.filebrowserUploadUrl = '/app/webroot/js/ckeditor/filemanager/connectors/php/filemanager.php';
    config.filebrowserImageUploadUrl = '/app/webroot/js/ckeditor/filemanager/connectors/php/filemanager.php?command=QuickUpload&type;=Images';
    //config.filebrowserFlashUploadUrl = '/app/webroot/js/ckeditor/filemanager/connectors/php/filemanager.php?command=QuickUpload&type;=Flash';
    // [
    // ['Bold', 'Table', 'Format' ,'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-', 'Image', 'Style', '-', 'Source']
    // ]; 
};
