/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function(config) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
    config.entities_latin = false;
	config.uiColor = '#f1f1f1';
	config.language = 'vi';
	// Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
	config.toolbar = [{
		name: 'document',
		groups: ['mode', 'document', 'doctools', 'clipboard', 'undo'],
		items: ['Source', '-', 'Save', 'Preview', 'Print', '-', 'Templates', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
	},
	{
		name: 'editing',
		groups: ['find', 'selection', 'spellchecker', 'list', 'indent', 'blocks', 'align', 'bidi'],
		items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt', '-', 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language']
	},
	{
		name: 'basicstyles',
		groups: ['basicstyles', 'cleanup'],
		items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat']
	},
	{
		name: 'links',
		items: ['Link', 'Unlink', 'Anchor']
	},
	{
		name: 'insert',
		items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe']
	}, '/',
	{
		name: 'styles',
		items: ['Styles', 'Format', 'Font', 'FontSize']
	},
	{
		name: 'colors',
		items: ['TextColor', 'BGColor']
	},
	{
		name: 'tools',
		items: ['Maximize', 'ShowBlocks']
	},
	{
		name: 'others',
		items: ['-']
	},
	{
		name: 'about',
		items: ['About']
	}];
	// Toolbar groups configuration.
	config.toolbarGroups = [{
		name: 'document',
		groups: ['mode', 'document', 'doctools']
	},
	{
		name: 'clipboard',
		groups: ['clipboard', 'undo']
	},
	{
		name: 'editing',
		groups: ['find', 'selection', 'spellchecker']
	},
	{
		name: 'forms'
	}, '/',
	{
		name: 'basicstyles',
		groups: ['basicstyles', 'cleanup']
	},
	{
		name: 'paragraph',
		groups: ['list', 'indent', 'blocks', 'align', 'bidi']
	},
	{
		name: 'links'
	},
	{
		name: 'insert'
	}, '/',
	{
		name: 'styles'
	},
	{
		name: 'colors'
	},
	{
		name: 'tools'
	},
	{
		name: 'others'
	},
	{
		name: 'about'
	}];
    
    config.filebrowserBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=files';
    config.filebrowserImageBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=images';
    config.filebrowserFlashBrowseUrl = '/kcfinder/browse.php?opener=ckeditor&type=flash';
    config.filebrowserUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=files';
    config.filebrowserImageUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=images';
    config.filebrowserFlashUploadUrl = '/kcfinder/upload.php?opener=ckeditor&type=flash';
};