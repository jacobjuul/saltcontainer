(function($){
    'use strict';
    $( document ).ready( function( $ ) {
            $( '.loose-bg-color-field' ).wpColorPicker();
            $( '.loose-text-color-field' ).wpColorPicker();
    } );
})(jQuery);

(function($,CategoryImage){

	var _uploadFrame;
	var debugEnabled   = false;

	var $mUploadButton = $('#loose_category_image_upload_button');
	var $mRemoveButton = $('#loose_category_image_remove_button');
	var $mImageHolder  = $('#loose_category_image_imageholder');
	var $mAttachment   = $('#loose_category_image_attachment');


	CategoryImage = $.extend(CategoryImage,{

		options:{
			holder_max_width:180
		},

		debug:function( message ){
			if(window.console && debugEnabled){
				console.log(message);
			}
		},

		hasCategoryImage:function(){
			return ($mAttachment.val()!=='');
		},

		createPlaceHolder:function(_src){

			$mImageHolder.html('<img id="loose_category_image_image" style="diplay:none;" />');

			$('#loose_category_image_image').load(function(){

				var $el = $(this);

				var width  = $el.width();
				var height = $el.height();
				var ratio  = 0;

				var maxWidth  = CategoryImage.options.holder_max_width;

				if(width > maxWidth){
					ratio = maxWidth / width;

					$el.width(maxWidth);
					$el.height(height * ratio);
				}

				$el.fadeIn('fast');

			}).attr({
				src:_src
			});
		},
		toggleRemoveButton:function(){

			CategoryImage.debug(CategoryImage.hasCategoryImage());


			if(!CategoryImage.hasCategoryImage()){
				$mRemoveButton.css('display','none');
			}else{
				$mRemoveButton.css('display','inline-block');
			}

		},

		removePlaceHolder:function(){
			$mImageHolder.html('');
		},

		events:{

			onClickShowMediaManager:function(e){

				e.preventDefault();

				if( _uploadFrame ){
					_uploadFrame.open();
					return;
				}

				var _mediaParams = {
				    title   : CategoryImage.label.title,
				    button  : {
						text :  CategoryImage.label.button
				    },
				    library : {
						type : 'image'
				    },
				    multiple : false
				};

				if(CategoryImage.hasCategoryImage()){
					_mediaParams = $.extend(_mediaParams,{
						editing : true
					});
				}

				_uploadFrame = wp.media.frames.file_frame = wp.media(_mediaParams);
				_uploadFrame.on('select', CategoryImage.events.onSelectAttachmentFromMediaManager);
				_uploadFrame.on('open'  , CategoryImage.events.onOpenMediaManager);
				_uploadFrame.open();

			},

			onClickRemoveAttachment:function(e){
				e.preventDefault();

				$mAttachment.val('');

				CategoryImage.removePlaceHolder();
				CategoryImage.toggleRemoveButton();
			},

			onOpenMediaManager:function(){

				if(CategoryImage.hasCategoryImage()){

					var selection  = _uploadFrame.state().get('selection');
					var id         = parseInt($mAttachment.val(), 10);

					CategoryImage.debug(id);

					var attachment = wp.media.attachment(id);

					attachment.fetch();

					selection.add( attachment ? [ attachment ] : [] );
				}
			},
			onSelectAttachmentFromMediaManager:function(){

				var _attachment = _uploadFrame.state().get('selection').first().toJSON();

				CategoryImage.debug(_attachment);

				if(_attachment){
					CategoryImage.createPlaceHolder(_attachment.url);
					$mAttachment.val(_attachment.id);
				}

				CategoryImage.toggleRemoveButton();
				_uploadFrame.close();
			}
		}
	});


	$mUploadButton.on('click',CategoryImage.events.onClickShowMediaManager);
	$mRemoveButton.on('click',CategoryImage.events.onClickRemoveAttachment);

	CategoryImage.toggleRemoveButton();

})(jQuery,(typeof CategoryImage === 'undefined' ? {} : CategoryImage));