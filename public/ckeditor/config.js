/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
colors = ['#D1E0E7','#F5E6F5','#F8E1A4','#C8C6A6','#A5B5E2','#D4A3D5','#A9D6E6','#E7B4D6','#A2B2E2','#C4F6A4','#A2B8B0','#F6D8B7','#D7F3B7','#F1C9A5','#B5A6D3','#E4C6E2','#C3D1F0','#B2C7E2','#E3D1E1','#8D1E1E','#8E8C2E','#8F2E8A','#4B6B0C','#3B9B2A','#9C9D1F','#3F7F1A','#9E2C3A','#1F5D3E','#0C0D2F','#0F4A7B','#3B3A2D','#4F1F4C','#4C7C3F','#1C1D7E','#4E0D8A','#7F5B5C','#5E6A0F','#8D2A0C','#5A2E1F','#7E4E0B','#1C4E1E','#1C6B8F','#9F6B5E','#9F9D9A','#1E3D9A','#4C7B9B','#9E8E9A','#1D4F7A','#8F7E9C','#2B5F8D','#4C1D9D','#2C4F9C','#1D0A4A','#8B9B6D','#9F5C7C','#5F4A0C','#1A9C8A','#1A1C1A','#2B3C4E','#0F3D9C','#4F6A1E','#4D7E8F','#4F1F9A','#7D0B3C','#5B5B4F','#9C6B4E','#4A4D3E','#6A5A3D','#6A6C2E','#5A0A5D','#6A0D3C','#1E5F1C','#4C8C6D','#4B5D1B','#4A3A0E','#7B0E7D','#0C5D5E','#7B9E8C','#2A4C8A','#3C7C7F','#8A6B0F','#9E1A1E','#6D4C5C','#2B1D9B','#2C9D8E','#7F8F1B','#2F2F7A','#4C6B6A','#1F4D6E','#2F2F5A','#4F2C1B','#0E1A1F','#0E6F6D','#9C9C2D','#5C8F3A','#7A8A6E','#7D6E4B','#4F8C3D','#2A1B4C','#6F8B6F','#2E1B1B','#9D3D2E','#8B6A0B','#4D4D6B','#0C6E9C','#2D6A1A','#7A7E5C','#3C7B8C','#9B3A2A','#8B4C8E','#9A6E9C','#7D6B2E','#0C5C8C','#6C1B5B'];
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'en';
	config.uiColor = colors[Math.floor(Math.random()*colors.length)];
	config.toolbar = [
		{ name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
		{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
		'/',
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		{ name: 'insert', items: [ 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
		'/',
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
		{ name: 'about', items: [ 'About' ] }
	];
};
