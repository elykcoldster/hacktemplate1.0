jQuery(document).ready(function($){	width = $(".general").width() - 120;	$(".htmlType .mce-container").css("width",""+width+"px");	$("#wp-sg_popup_html-wrap table").css("width",""+width+"px");	$(".htmlType    #wp-sg_popup_html-editor-container").css("width",""+width+"px");		/*its statrt image uploader*/    var custom_uploader;    $('#upload_image_button').click(function(e) 	{        e.preventDefault();		        //If the uploader object has already been created, reopen the dialog        if (custom_uploader) 		{            custom_uploader.open();            return;        }        //Extend the wp.media object        custom_uploader = wp.media.frames.file_frame = wp.media({            titleFF: 'Choose Image',            button: {                text: 'Choose Image'            },            multiple: false        });        //When a file is selected, grab the URL and set it as the text field's value        custom_uploader.on('select', function() {            attachment = custom_uploader.state().get('selection').first().toJSON();			$(".ShowSelectedImage").css({'background-image': 'url("' + attachment.url + '")'});			$(".ShowSelectedImage").html("");            $('#upload_image').val(attachment.url);        });        //Open the uploader dialog        custom_uploader.open();    });	/*its finish image uploader*/		if($("#upload_image").val())	{		$(".ShowSelectedImage").html("");		$(".ShowSelectedImage").css({'background-image': 'url("' + $("#upload_image").val() + '")'});		}	//js for  main page are you shure delete this ? and jax request for delete 		$(".sgDeleteLink").bind('click',function()	{			var request = confirm("Are you sure?");		if(!request)		{			return false;		}		var popup_id = $(this).attr("sg-app-popup-id");				var data = {			action: 'delete_promotional_popup',			popup_id: popup_id		}				$.post(ajaxurl, data, function(response){			location.reload();		});	});		//	$("#wp-sg_popup_html-editor-container").removeAttr("style");	//	// jquery for page.php		if($(".promotionalPopupSelect option:selected").attr("disable"))	{		$('#previewbuttonStyle').removeAttr("disabled");	}		$(".promotionalPopupSelect").bind("change",function()	{		if($(".promotionalPopupSelect option:selected").attr("disable"))		{			$('#previewbuttonStyle').removeAttr("disabled");		}		else 		{			$('#previewbuttonStyle').prop("disabled", true);		}	});		//end page php page selection js		$(".previewbutton").bind('click',function() {			$('#gifLoader').show();		var postId = $('.choosePopupType option:selected').val();		SG_APP_POPUP_URL = $("#SG_APP_POPUP_URL").val();				var data = {			action: 'get_popup_preview',			'postId': postId,					}	    $.post(ajaxurl, data, function(response) {						$('#gifLoader').hide();			sg_popup_result = JSON.parse(response);			for(var key in sg_popup_result)			{				sg_prmomotional_iframe = sg_popup_result['iframe'];				sg_popup_shortCode = sg_popup_result['shortCode'];				if(key == 'image'){					sg_popup_image = sg_popup_result['image'];				}				if(key == 'html')				{					sg_popup_html = sg_popup_result['html'];				}				if(key == 'options')				{					options = JSON.parse(sg_popup_result['options']);				}			}							var cssNode = $('<link rel="stylesheet" type="text/css" id="sgColorbox" />').appendTo('head');					cssNode.load(function(){					initColorboxWithOptions(options);				}).attr("href", SG_APP_POPUP_URL +"/style/sgcolorbox/"+options.theme);							function initColorboxWithOptions(options)			{				title = options['title'];				sg_popup_effect = options['effect'];				sg_popup_duration = options['duration'];				sg_popup_escKey = options['escKey'];				sg_popup_scale = options['scale'];				sg_popup_scrolling = options['scrolling'];				sg_popup_closeButton = options['closeButton'];				sg_popup_overlayClose = options['overlayClose'];				sg_popup_popupFixed = options['popupFixed'];				sg_popup_FixedPostion =  options['fixedPostion'];				sg_popup_reposition = options['reposition'];				sg_popup_opacity = options['opacity'];				sg_popup_maxWidth = options['maxWidth'];				sg_popup_maxHeight = options['maxHeight'];				sg_popup_initialWidth = options['initialWidth'];				sg_popup_initialHeight = options['initialHeight'];				sg_prmomotional_width = options['width'];				sg_prmomotional_height = options['height'];				//				sg_popup_type = sg_popup_result['content'];				sg_popup_closeButton = (sg_popup_closeButton) ? true : false;				sg_popup_escKey = (sg_popup_escKey) ? true : false;				sg_popup_scrolling = (sg_popup_scrolling) ? true : false;				sg_popup_reposition = (sg_popup_reposition) ? true : false;					sg_popup_popupFixed = (sg_popup_popupFixed) ? true : false;						if(sg_popup_popupFixed !== false)				{					if(sg_popup_FixedPostion == 1)					{						popupPositionTop = "2%";						popupPositionBottom = false; 						popupPositionLeft = "0%";						popupPositionRight = false; 						sgfixedPsotonTop = 0;						sgfixedPsotonleft = 0; 					}					if(sg_popup_FixedPostion == 3)					{						popupPositionTop = "2%";						popupPositionBottom =  false; 						popupPositionLeft = false;						popupPositionRight = "0%"; 						sgfixedPsotonTop = 0;						sgfixedPsotonleft = 90;					}					if(sg_popup_FixedPostion == 5)					{							sg_popup_popupFixed = false;						popupPositionTop = false;						popupPositionBottom =  false; 						popupPositionLeft = false;						popupPositionRight =  false; 						sgfixedPsotonTop = 50;						sgfixedPsotonleft = 50;					}					if(sg_popup_FixedPostion == 7)					{						popupPositionTop = false;						popupPositionBottom = "0%"; 						popupPositionLeft = "0%";						popupPositionRight =  false; 						sgfixedPsotonTop = 90;						sgfixedPsotonleft = 0;					}					if(sg_popup_FixedPostion == 9)					{						popupPositionTop = false;						popupPositionBottom = "0%"; 						popupPositionLeft = false;						popupPositionRight = "0%"; 						sgfixedPsotonTop = 90;						sgfixedPsotonleft = 90;					}				}				if(sg_popup_popupFixed == false)				{						popupPositionTop = false;						popupPositionBottom = false; 						popupPositionLeft = false;						popupPositionRight = false;						sgfixedPsotonTop = 50;						sgfixedPsotonleft = 50;				}						setTimeout(function()				{ 					sg_html_variable = false;					sg_popup_photo = false;					if(sg_popup_type == 'html')					{						sg_popup_html = JSON.stringify(sg_popup_html).replace(/\\/g, '').replace(/rnt/g,'').replace(/rn/g,'');						sg_popup_html = sg_popup_html.replace(/\"$/, '');						sg_popup_html = sg_popup_html.replace(/^\"/, '');						//sg_popup_html = sg_popup_html.replace('"t"', '');						sg_html_variable = sg_popup_html;						if(sg_popup_html == "")						{							sg_html_variable = false;							sg_popup_photo = true;							sg_popup_image = sg_popup_result['sg_promotional_site_url'] + "/img/default-image.png";						}					}					else if(sg_popup_type== 'Image')					{						sg_popup_photo = true;						if(sg_popup_image == ""){							sg_popup_image = sg_popup_result['sg_promotional_site_url'] + "/img/default-image.png";						}					}					else if(sg_popup_type== 'iframe')					{						sg_popup_photo = false;						console.log(sgPopup.iframe());						sgPopup.iframeInitWidth();						sgPopup.iframeInitHeight();						sg_html_variable = sgPopup.iframe();										}					else if(sg_popup_type== 'shortCode')					{						sg_popup_photo = false;												sg_html_variable = sg_popup_shortCode;						alert('Preview is no available for the current popup type');						return false;											}									$.colorbox({						width: sg_prmomotional_width,						height: sg_prmomotional_height,						onOpen:function() {							$('#colorbox').removeAttr('top');							$('#colorbox').removeAttr('left');							$('#colorbox').css('top',sgfixedPsotonTop+'%');							$('#colorbox').css('left',sgfixedPsotonleft+'%');							$("#colorbox").removeAttr("class");							$("#colorbox").addClass('animated '+sg_popup_effect+'');						},						onLoad: function(){						},													onComplete: function(){						},						photo: sg_popup_photo,						html: sg_html_variable,						href: sg_popup_image,						retinaImage: false,						opacity: sg_popup_opacity,						escKey: sg_popup_escKey,						closeButton: sg_popup_closeButton,						fixed:  sg_popup_popupFixed,						top: popupPositionTop,						bottom: popupPositionBottom,						left: popupPositionLeft,						right: popupPositionRight,						scrolling: sg_popup_scrolling,						reposition: sg_popup_reposition,						overlayClose: sg_popup_overlayClose,						maxWidth: sg_popup_maxWidth,						maxHeight: sg_popup_maxHeight,						initialWidth: sg_popup_initialWidth,						initialHeight: sg_popup_initialHeight,					});						var styleNode = $("<style >*{-webkit-animation-duration: "+sg_popup_duration+"s !important;animation-duration: "+sg_popup_duration+"s !important;}</style>").appendTo("head");											var styleNode = $("<style >*{-webkit-animation-duration: "+sg_popup_duration+"s !important;animation-duration: "+sg_popup_duration+"s !important;}</style>").appendTo("head");				},1000);				$("#cboxOverlay").bind("click",resetColorbox);				$("#cboxClose").bind("click",resetColorbox);				function resetColorbox(){					$("#colorbox").css({"top":"0px","left":"0px","width": "0px","height":"0px"})				}			}		  });		 	return false;		});	//show theme model		$(".popup_theme_name").bind("mouseover",function(e)		{			$('.theme'+$(this).attr("sgpoupnumber")+'').css('display', 'block');		});		//mouse oute	$('input.popup_theme_name').bind('mouseout',function()	{		$('.theme1').css('display', 'none');		$('.theme2').css('display', 'none');		$('.theme3').css('display', 'none');		$('.theme4').css('display', 'none');		$('.theme5').css('display', 'none');			});	//effect show in the small picture	effectTimer = '';	$('select[name="effect"]').bind('change', function()	{		if (effectTimer!='') clearTimeout(effectTimer);		effectTimer = setTimeout(function(){			$("#effectShow").hide();			effectTimer = '';		},1400);		$("#effectShow").removeClass();		$("#effectShow").show();		$("#effectShow").addClass('animated '+$(this).val()+'');	});		//send alert if the title is empty	$("#promotionalSaveButton").bind("click",function(e) {		e.preventDefault();		if(!$("#popupTitleValue").val()){			alert("You cant save because your title is empty");			$("#promotionalSaveButton").attr("type","button");			return;		}		else if($("#popupTitleValue").val()){						function dimentionsRegexp()			{				var dimentionsBool1 = true;				var dimentionsBool2 = true;				$(".dimensionsContent input").each(function(){					var dimentionsValue = this.value;					var stringValue = this.value.match(/^\d+|([px]+|\%)/);					if(stringValue || dimentionsValue == '')					{						var dimentionsBool1 = true;					}					else {						$(this).next('img').css({'display': 'inline-block'});						 dimentionsBool2 = false;					}					dimentionsResultBool = dimentionsBool1 * dimentionsBool2;									});				return dimentionsResultBool;			}			if(dimentionsRegexp() == 1) {								$("#createAjaxLoader").show();				tinyMCE.triggerSave();				$.post(ajaxurl, $("#add-form").serialize(), function(response){					window.location.replace(SG_ADMIN_URL+'&saved=1&id='+response);				});			}						}	});	//its for raight main divs 		$("#dimentionsTitle").toggle(function(){		$('.dimensionsContent').fadeOut();		$('#dimentionsTitle > img').css("transform", 'rotate(0deg)');	},function(){		$('.dimensionsContent').fadeIn();		$('#dimentionsTitle > img').css("transform", 'rotate(180deg)');	});		$("#optionsTitle").toggle(function(){		$('.optionsContent').fadeOut();		$("#optionsTitle > img").css("transform", 'rotate(0deg)');	},function(){		$('.optionsContent').fadeIn();		$("#optionsTitle > img").css("transform", 'rotate(180deg)');	});	$("#generalTitle").toggle(function(){		$('.generalContent').fadeOut();		$("#generalTitle > img").css("transform", 'rotate(0deg)');	},function(){		$('.generalContent').fadeIn();		$("#generalTitle > img").css("transform", 'rotate(180deg)');	});	$("#effectsTitle").toggle(function(){		$('.effectsContent').fadeOut();		$("#effectsTitle > img").css("transform", 'rotate(0deg)');	},function(){		$('.effectsContent').fadeIn();		$("#effectsTitle > img").css("transform", 'rotate(180deg)');	});	//solve responsive problem	//its for opacity range button show result	$("#rangevalue").html($("#sg_popup_opacity").val());	//its for fixed postions	if($("#popupFixed:checked").length == 0)	{		$(".fixedWrapper").css({'display':'none'});	}	else 	{		$(".fixedWrapper").css({'display':'inline-block'});		}		$("#popupFixed").bind("click",function()	{			if($("#popupFixed:checked").length == 0){				$(".fixedWrapper").css({'display':'none'});			}	else {				$(".fixedWrapper").css({'display':'inline-block'});		}					});	//slect fixed position		$(".fixedPositionStyle").bind("click",function(){		var sgelement = $(this);		var sgpos = sgelement.attr('data-sgvalue');		$(".fixedPositionStyle").css("backgroundColor","#FFFFFF");		$(this).css("backgroundColor","rgba(70,173,208,0.5)");		$(".fixedPostion").val(sgpos);	});	$(".fixedPositionStyle").bind("mouseover",function(){		$(".fixedPositionStyle").css("backgroundColor","#FFFFFF");		$(this).css("backgroundColor","rgb(70,173,208)");		$(".fixedPositionStyle").each(function(){			if ($(this).attr("data-sgvalue") == $('.fixedPostion').val())				$(this).css("backgroundColor","rgba(70,173,208,0.5)");		});	});	$(".fixedPositionStyle").bind("mouseout",function(){		if($(".fixedPositionStyle").attr("data-sgvalue") !== $(".fixedPostion").val() ){			$(this).css("backgroundColor","#FFFFFF");		}		$(".fixedPositionStyle").each(function(){			if ($(this).attr("data-sgvalue") == $('.fixedPostion').val())				$(this).css("backgroundColor","rgba(70,173,208,0.5)");		});	});		if($('.fixedPostion').val()!=''){		$(".fixedPositionStyle").each(function(){			if ($(this).attr("data-sgvalue") == $('.fixedPostion').val())				$(this).css("backgroundColor","rgba(70,173,208,0.5)");		});		}	//tab juery	jQuery('.tabs .tab-links a').on('click', function(e)  	{        var currentAttrValue = jQuery(this).attr('href');        // Show/Hide Tabs        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();        // Change/remove current tab to active        jQuery(this).parent('li').removeClass('active').siblings().addClass('active');        e.preventDefault();    });		//content js style		imageInputValue = $("#upload_image").val();	$('.tabs ul li').bind('click',function(){		if($(this).text() == 'Image'){			$(".imageRadioButton").prop( "checked", true );			$(".htmlRadioButton").prop( "checked", false );			$(".iframeRadioButton").prop( "checked", false );			$(".shortCodeRadioButton").prop( "checked", false );		}		else if($(this).text() == 'Html'){			$(".htmlRadioButton").prop( "checked", true );			$(".imageRadioButton").prop( "checked", false );			$(".iframeRadioButton").prop( "checked", false );			$(".shortCodeRadioButton").prop( "checked", false );		}		else if($(this).text() == 'Iframe'){			$(".htmlRadioButton").prop( "checked", false );			$(".iframeRadioButton").prop( "checked", true );			$(".imageRadioButton").prop( "checked", false );			$(".shortCodeRadioButton").prop( "checked", false );		}		else if($(this).text() == 'Shortcode'){			$(".htmlRadioButton").prop( "checked", false );			$(".iframeRadioButton").prop( "checked", false );			$(".imageRadioButton").prop( "checked", false );			$(".shortCodeRadioButton").prop( "checked", true );					}	});		//reesie for html resize	//info describe 		$(".escKeyImg").hover(function(){		$(".infoEscKey").css({"display" : "inline-block"});	},function(){		$(".infoEscKey").css({"display" : "none"});	});		$(".CloseImg").hover(function(){		$(".infoCloseButton").css({"display" : "inline-block"});	},function(){		$(".infoCloseButton").css({"display" : "none"});	});		$(".scrollingImg").hover(function(){		$(".infoScrolling").css({"display" : "inline-block"});	},function(){		$(".infoScrolling").css({"display" : "none"});	});		$(".repositionImg").hover(function(){		$(".infoReposition").css({"display" : "inline-block"});	},function(){		$(".infoReposition").css({"display" : "none"});	});		$(".overlayImg").hover(function(){		$(".infoOverlayClose").css({"display" : "inline-block"});	},function(){		$(".infoOverlayClose").css({"display" : "none"});	});			$(".infoImageDuration").hover(function(){		$(".infoDuration").css({"display" : "inline-block"});	},function(){		$(".infoDuration").css({"display" : "none"});	});		$(".infoImageDelay").hover(function(){		$(".infoDelay").css({"display" : "inline-block"});	},function(){		$(".infoDelay").css({"display" : "none"});	});		$("#scrollingEvent").hover(function(){		$(".infoScrollingEvent").css({"display": 'inline-block'});	},function(){		$(".infoScrollingEvent").css({"display": 'none'});	}	);		$(".repeatPopup").hover(function(){			$(".infoSelectRepeat").css({"display": 'inline-block'});		},function(){			$(".infoSelectRepeat").css({"display": 'none'});		}	);		//error describe 	$(".dimensionsContent .errorInfo").hover(function(){		$(this).next('span').css({"display": 'inline-block'});	},function(){		$(this).next('span').css({"display": 'none'});	})		// js ranage slider	if (typeof Powerange != "undefined")	{		var dec = document.querySelector('.js-decimal');		function displayDecimalValue() {			var dec = document.querySelector('.js-decimal');		  document.getElementById('js-display-decimal').innerHTML = $(".js-decimal").attr("value");		}		var initDec = new Powerange(dec, { decimal: true, callback: displayDecimalValue, max: 1, start: $(".js-decimal").attr("value") });	}});