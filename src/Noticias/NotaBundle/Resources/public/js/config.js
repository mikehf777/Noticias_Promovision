/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	config.toolbar = 'MyTool';
 
	config.toolbar_MyTool =
	[
	
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'styles', items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent'] },
	];
    
	
    
	config.language = 'es';
	config.uiColor = '#8A0808';
	config.width = 500;
	config.height = 600;
	config.removePlugins = 'resize';
	config.disableNativeSpellChecker = false;
	config.scayt_autoStartup = true;
	config.toolbarCanCollapse = false;
	config.removePlugins = 'elementspath';
};

CKEDITOR.replace( 'Nota',
	{
		toolbar : 'MyTool'
	});

CKEDITOR.replace( 'Inserto',
	{
		toolbar : 'MyTool'
	});

CKEDITOR.replace( 'Avance',
	{
		toolbar : 'MyTool'
		
	});