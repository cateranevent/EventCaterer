/**
 * Backend script for the Content Template editor for Visual Composer, 
 * as loop elements in Views and WordPress Archives Loop output sections.
 * This initializes the Visual Composer overlay anc handles the change in user editor to BB.
 *
 * @summary Inline Content Template editor manager for Visual Composer compatibility,.
 *
 * @since 2.3.0
 * @requires jquery.js
 * @requires underscore.js
 */

/* global toolset_user_editors_vc_layout_template_i18n */

var ToolsetCommon			= ToolsetCommon || {};
ToolsetCommon.UserEditor	= ToolsetCommon.UserEditor || {};

ToolsetCommon.UserEditor.VisualComposerBackendLayoutTemplate = function( $ ) {
	
	var self = this;
	
	self.selector			= '.js-wpv-ct-listing';
    self.template_selector = '#js-wpv-layout-template-overlay-template';
    self.overlayContainer = _.template( jQuery( self.template_selector ).html() );
    self.i18n_data = {
        title: toolset_user_editors_vc_layout_template_i18n.template_overlay.title,
        url: toolset_user_editors_vc_layout_template_i18n.template_editor_url,
        button: toolset_user_editors_vc_layout_template_i18n.template_overlay.button,
        discard: toolset_user_editors_vc_layout_template_i18n.template_overlay.discard,
    };
	
	self.initVCEditors = function() {
		$( self.selector ).each( function() {
			self.initVCEditor( $( this ) );
		});
		return self;
	};
	
	self.initVCEditor = function( item ) {
		if ( 
			item.hasClass( 'js-wpv-ct-listing-user-editor-inited' ) 
			|| item.find( '.CodeMirror' ).length == 0
		) {
			// This has been inited before, or it is rendered closed
			return self;
		}
		var attributes = item.data( 'attributes' );
		_.defaults( attributes, { builder: 'basic' } );
		if ( attributes.builder == 'vc' ) {
			item.addClass( 'js-wpv-ct-listing-user-editor-inited' );
			item.find( '.js-wpv-layout-template-overlay' ).remove();
			item.find( '.js-wpv-ct-apply-user-editor:not(.js-wpv-ct-apply-user-editor-vc)' ).prop( 'disabled', false );
            item.prepend( self.overlayContainer( self.i18n_data ) );
			item.find( '.CodeMirror' ).css( { 'height' : '0px'} );
			self.updateVCCTEditorLinkTarget( item );
		}
		return self;
	};
	
	self.reloadVCEditorsLinkTarget = function() {
		$( self.selector ).each( function() {
			self.updateVCCTEditorLinkTarget( $( this ) );
		});
		return self;
	};
	
	self.updateVCCTEditorLinkTarget = function( item ) {
		var ctEditorLink = item.find( '.js-wpv-layout-template-overlay-info-link' ),
			ctEditorLinkTarget = toolset_user_editors_vc_layout_template_i18n.template_editor_url + '&ct_id=' + item.data( 'id' ),
			queryMode = Toolset.hooks.applyFilters( 'wpv-filter-wpv-edit-screen-get-query-mode', 'normal' );
		switch ( queryMode ) {
			case 'normal':
				var queryType = $( '.js-wpv-query-type:checked' ).val();
				switch ( queryType ) {
					case 'posts':
						$( '.js-wpv-query-post-type:checked' ).map( function() {
							ctEditorLinkTarget += '&preview_post_type[]=' + $( this ).val();
						});
						break;
					case 'taxonomy':
						$( '.js-wpv-query-taxonomy-type:checked' ).map( function() {
							ctEditorLinkTarget += '&preview_taxonomy[]=' + $( this ).val();
						});
						break;
					case 'users':
						$( '.js-wpv-query-users-type:checked' ).map( function() {
							ctEditorLinkTarget += '&preview_user[]=' + $( this ).val();
						});
						break;
				}
				break;
			case 'archive':
				$( '.js-wpv-settings-archive-loop input:checked' ).map( function() {
					switch ( $( this ).data( 'type' ) ) {
						case 'native':
							
							break;
						case 'post_type' :
							ctEditorLinkTarget += '&preview_post_type_archive[]=' + $( this ).data( 'name' );
							break;
						case 'taxonomy':
							ctEditorLinkTarget += '&preview_taxonomy_archive[]=' + $( this ).data( 'name' );
							break;
					}
				});
				break;
		}
		ctEditorLink.attr( 'href', ctEditorLinkTarget );
		return self;
	};
	
	$( document ).on( 'js_event_wpv_query_type_options_saved', '.js-wpv-query-type-update', function( event, queryType ) {
		self.reloadVCEditorsLinkTarget();
	});
	
	self.setInlineContentTemplateEvents = function( templateId ) {
		self.initVCEditor( $( '.js-wpv-ct-listing-' + templateId ) );
	};
	
	$( document ).on( 'js_event_wpv_ct_inline_editor_inited', function( event, templateId ) {
		self.initVCEditor( $( '.js-wpv-ct-listing-' + templateId ) );
	});
	
	self.setUserEditorToVC = function( ctId ) {
		var item = $( '.js-wpv-ct-listing-' + ctId, '.js-wpv-inline-content-template-listing' ),
			attributes = item.data( 'attributes' );
		
		attributes.builder = 'vc';
		item.data( 'attributes', attributes );
		
		if ( item.find( '.CodeMirror' ).length == 0 ) {
			item.find( '.js-wpv-content-template-open' ).trigger( 'click' );
		} else {
			self.initVCEditor( item );
		}
	};
	
	self.initHooks = function() {
		Toolset.hooks.addAction( 'wpv-action-wpv-set-inline-content-template-events', self.setInlineContentTemplateEvents );
		Toolset.hooks.addAction( 'toolset-action-toolset-set-user-editor-to-vc', self.setUserEditorToVC );
		return self;
	};
	
	self.init = function() {
		self.initVCEditors()
			.initHooks();
		
	};
	
	self.init();

};

jQuery( document ).ready( function( $ ) {
    ToolsetCommon.UserEditor.VisualComposerBackendLayoutTemplateInstance = new ToolsetCommon.UserEditor.VisualComposerBackendLayoutTemplate( $ );
});