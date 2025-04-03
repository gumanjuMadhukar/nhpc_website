/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraPlugins = 'image';
    config.filebrowserImageWindowWidth = '640';
	config.filebrowserImageWindowHeight = '480';
	
	// CKEDITOR.addCss( '.cke_editable { font-size: 14px; } @media screen and (max-device-width: 767px) and (-webkit-min-device-pixel-ratio:0) { .cke_editable { font-size: 16px !important; } }' );
};
CKEDITOR.config.allowedContent = true;
// CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
// CKEDITOR.stylesSet.add('my_styles', [
// 	{ 
// 		name: 'image', element: 'img', styles: {
// 			 width:'600px', hight: '380px'
// 			}
// 		 }
// ]);
// CKEDITOR.config.contentsCss = 'http://localhost/hollywoodkhabar/assets/css/ckfinderCss.css';

