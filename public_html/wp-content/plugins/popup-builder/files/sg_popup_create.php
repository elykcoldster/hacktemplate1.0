<?php	//if id is set, load data	if (isset($_GET['id']))	{		$id = (int)$_GET['id'];		global $wpdb;		$sgPopupData = array();		$sql = $wpdb->prepare("SELECT * FROM ". $wpdb->prefix ."sg_promotional_popup WHERE ID = %d",$id);		$sgPopupData = $wpdb->get_row($sql);		$jsonData = json_decode($sgPopupData->options);		$title = $jsonData->title;		$effect = $jsonData->effect;		$theme = $jsonData->theme;		$duration = $jsonData->duration;		$delay = $jsonData->delay;		$sgEscKey = $jsonData->escKey;		$sgScrolling = $jsonData->scrolling;		$sgCloseButton = $jsonData->closeButton;		$sgReposition = $jsonData->reposition;		$sgOverlayClose = $jsonData->overlayClose;		$sgOpacity = $jsonData->opacity;		$sgPopupFixed = $jsonData->popupFixed;		$sgFixedPostion = $jsonData->fixedPostion;		$sgMaxWidth = $jsonData->maxWidth;		$sgMaxHeight = $jsonData->maxHeight;		$sgInitialWidth = $jsonData->initialWidth;		$sgInitialHeight = $jsonData->initialHeight;		$sgWidth = $jsonData->width;		$sgHeight = $jsonData->height;		$sgOnScrolling = $jsonData->onScrolling;		$sgRepeatPopup = $jsonData->repeatPopup;		$imageStatus  =  '';		$htmlStatus = '';		$iframeStatus  = '';		if($sgPopupData->content == "image") {			$imageStatus = "checked";		}		else if($sgPopupData->content == "html") 		{ 			$htmlStatus = "checked"; 		}	}	$activeImageVariable  = "";	$activeHtmlVariable = "";	$activeIframeVariable = "";	$activeShortVariable = "";	$imageStatus  =  '';	$htmlStatus = '';	$iframeStatus = '';	$shortCodeStatus = '';	$htmlLinkVarieble = '';	$imageLinkVarieble = '';	$iframeLinkVarieble = '';	$shortCodeLinkVarieble = '';	if(!isset($sgPopupData->content) || $sgPopupData->content == "Image")	{		$imageStatus = 'checked';		$activeImageVariable  = "active";		$htmlLinkVarieble = 'active';		$imageLinkVarieble = '';		$iframeLinkVarieble = 'active';		$shortCodeLinkVarieble = 'active';	}	if($sgPopupData->content == "html")	{		$htmlStatus = "checked";		$activeHtmlVariable = "active";		$htmlLinkVarieble = '';		$imageLinkVarieble = 'active';		$iframeLinkVarieble = 'active';		$shortCodeLinkVarieble = 'active';	}	if($sgPopupData->content == "iframe")	{		$iframeStatus = 'checked';		$htmlLinkVarieble = '';		$activeIframeVariable = "active";		$imageLinkVarieble = 'active';		$iframeLinkVarieble = '';		$htmlLinkVarieble = 'active';		$shortCodeLinkVarieble = 'active';	}	if($sgPopupData->content == "shortCode")	{	$shortCodeStatus = 'checked';		$activeShortVariable = "active";		$imageLinkVarieble = 'active';		$htmlLinkVarieble = 'active';		$iframeLinkVarieble = 'active';		$shortCodeLinkVarieble = '';	}	//set intial values 	$colorbox_deafult_values = array('escKey'=> true,'closeButton' => true,'scale'=> true, 'scrolling'=> true,'opacity'=>0.8,'reposition' => true,'width' => false,'height' => false,'initialWidth'=>'300','initialHeight'=>'100','maxWidth'=>false,'maxHeight'=>false,'overlayClose'=>true,'fixed'=>false,'top'=>false,'right'=>false,'bottom'=>false,'left'=>false,"duration"=>1,"delay"=>0);	$escKey = ($colorbox_deafult_values['escKey'] == true ? 'checked' : '');	$closeButton = ($colorbox_deafult_values['closeButton'] == true ? 'checked' : '');	$scale = ($colorbox_deafult_values['scale'] == true ? 'checked' : '');	$scrolling = ($colorbox_deafult_values['scale'] == true ? 'checked' : '');	$width = $colorbox_deafult_values['width'];	$height = $colorbox_deafult_values['height'];	$reposition = ($colorbox_deafult_values['reposition'] == true ? 'checked' : '');	$overlayClose = ($colorbox_deafult_values['overlayClose'] == true ? 'checked' : '');	$opacityValue = $colorbox_deafult_values['opacity'];	$top = $colorbox_deafult_values['top'];	$right = $colorbox_deafult_values['right'];	$bottom = $colorbox_deafult_values['bottom'];	$left = $colorbox_deafult_values['left'];	$initialWidth = $colorbox_deafult_values['initialWidth'];	$initialHeight = $colorbox_deafult_values['initialHeight'];	$maxWidth = $colorbox_deafult_values['maxWidth'];	$maxHeight = $colorbox_deafult_values['maxHeight'];	$deafultFixed = $colorbox_deafult_values['fixed'];	$defaultDuration = $colorbox_deafult_values['duration'];	$defaultDelay = $colorbox_deafult_values['delay'];	//seted value	if(isset($sgEscKey)) {$sgEscKey = ($sgEscKey == '') ? '': 'checked'; } else {$sgEscKey = $escKey;}	if(isset($sgCloseButton)) {$sgCloseButton = ($sgCloseButton == '') ? '': 'checked'; } else {$sgCloseButton = $closeButton;}	if(isset($sgScrolling)) {$sgScrolling = ($sgScrolling == '') ? '': 'checked'; } else {$sgScrolling = $scrolling;}	if(isset($sgReposition)) {$sgReposition = ($sgReposition == '') ? '': 'checked'; } else {$sgReposition = $reposition;}	if(isset($sgOverlayClose)) {$sgOverlayClose = ($sgOverlayClose == '') ? '': 'checked'; } else {$sgOverlayClose = $overlayClose;}	if(isset($sgPopupFixed)) {$sgPopupFixed = ($sgPopupFixed == '') ? '': 'checked'; } else {$sgPopupFixed = $deafultFixed;}	if(isset($sgOnScrolling)) {$sgOnScrolling = ($sgOnScrolling == '') ? '': 'checked'; }	if(isset($sgRepeatPopup)) {$sgRepeatPopup = ($sgRepeatPopup == '') ? '': 'checked'; }else{$sgRepeatPopup = 'checked';}	if(!isset($sgOpacity )) {$sgOpacity = $opacityValue;}	if(!isset($sgWidth )) {$sgWidth = $width;}	if(!isset($sgHeight )) {$sgHeight = $height;}	if(!isset($sgInitialWidth )) {$sgInitialWidth = $initialWidth;}	if(!isset($sgInitialHeight)) {$sgInitialHeight = $initialHeight;}	if(!isset($sgMaxWidth)) {$sgMaxWidth = $maxWidth;}	if(!isset($sgMaxWidth)) {$sgMaxHeight = $maxHeight;}	if(!isset($duration)) {$duration = $defaultDuration;}	if(!isset($delay)) {$delay = $defaultDelay;}	$sgPopupDataIframe = ($sgPopupData->iframe) ? $sgPopupData->iframe : 'http://';	//select basa value or deafult value		$sg_popup_effects = array("No effect"=>"No Effect","flip"=>"flip","shake"=>"shake","wobble"=>"wobble","swing"=>"swing","flash"=>"flash","bounce"=>"bounce","pulse"=>"pulse","rubberBand"=>"rubberBand","tada"=>"tada","fadeIn"=>"fadeIn");	$sg_popup_theme = array("colorbox1.css","colorbox2.css","colorbox3.css","colorbox4.css","colorbox5.css");	function creaeSelect($options,$name,$selecteOption)	{		$selected ='';		$str = "";		$checked = "";		if($name == 'theme') {							$popup_style_name = 'popup_theme_name';				$firstOption = array_shift($options);				$i = 1;				foreach($options as $key){						if($key == $selecteOption) {						$checked = "checked";					}					else {						$checked ='';					}					$i++;					$str .= "<input type='radio' name=\"$name\" value=\"$key\" $checked class='popup_theme_name' sgPoupNumber=".$i.">";						}				if ($checked == ''){					$checked = "checked";				}				$str = "<input type='radio' name=\"$name\" value=\"".$firstOption."\" $checked class='popup_theme_name' sgPoupNumber='1'>".$str;				return $str;		}		else {			$str .= "<select name=$name id='sameWidthinputs' class=$popup_style_name >";			foreach($options as $key=>$option) {					if($key == $selecteOption) {					$selected = "selected";				}				else {					$selected ='';				}						$str .= "<option value='".$key."' ".$selected."  >$option</potion>";					}			$str .="</select>" ;			return $str;		}	} ?>	<?php		if(isset($_GET['saved']) && $_GET['saved']==1)		{			echo '<div id="defaultMessage" class="updated notice notice-success is-dismissible" ><p>Popup was saved</p></div>';		}	?>	<form method="POST" action="" id="add-form"><input type="hidden" name="action" value="save_popup">	<div class="crudWrapper">		<div class="cereateTitleWrapper">			<div class="Sg_title_crud">				<?php if(isset($id))					{ ?>						<h1>Edit popup</h1>				<?php }				else  { ?>					<h1>Create new popup</h1>			<?php } ?>			</div>			<div class="buttonWrapper">				<p class="submit">					<?php 					if(!SG_POPUP_PRO) { ?>						<input class="crudToPro" type="button" value="Upgrade to PRO version" onclick="window.open('<?php echo SG_POPUP_PRO_URL;?>')"><div class="clear"></div>					<?php } ?> 					<?						$cssClass = (!SG_POPUP_PRO)? "margin-top: 5px;" : '';					?>					<input type="button" id="promotionalSaveButton" class="button-primary" value="<?php _e('Save Changes') ?>" style='<?php echo $cssClass;?>' />					<img id="createAjaxLoader" src="<?php echo plugins_url('img/wpspin_light.gif', dirname(__FILE__).'../');?>" style="display: none">				</p>			</div>		</div>		<div class="clear"></div>		<div class="generalWrapper">			<div id="leftMainDiv">				<div class="general">					<div class="h2Background" id="generalTitle">						<h2>General</h2>						<img src="<?php echo plugins_url('img/down_arrow-2x.gif', dirname(__FILE__).'../');?>">					</div>					<div class="generalContent">						<div class="popupTitle">							<span class="createDescribe " >Title*:</span><input class='sameWidthinputs'  id= 'popupTitleValue' type="text" name="title" value="<?php echo esc_attr($title)?>"  required = "required"/><span class="phpErrorStyle"><?php echo $errorTitle;?></span>						</div>						<div class="tabWrapper">							<div class="tabs">								<ul class="tab-links">									<li class="<?php echo $imageLinkVarieble;?>" id="imageLink"><a href="#tab1" class="imageHref" >Image</a></li>									<li class="<?php echo $htmlLinkVarieble;?>" id="htmlLink"><a href="#tab2"  class="htmlHref">Html</a></li>									<?php if(SG_POPUP_PRO) {?>										<li class="<?php echo $iframeLinkVarieble;?>" id="iframeLink"><a href="#tab3"  class="htmlHref">Iframe</a></li> 										<li class="<?php echo $shortCodeLinkVarieble;?>" id="ShortLinkLink"><a href="#tab4"  class="shortcode">Shortcode</a></li>									<?php } ?>								</ul>								<div class="tab-content">									<div id="tab1" class="tab <?php echo $activeImageVariable;?> ">										<div class="imagetype">											<h1 class="imageHeadline">Please choose your picture</h1>											<div class="imageUploderWrapper">												<input  type="radio" name="content"  class="imageRadioButton" value="Image" <?php echo esc_html($imageStatus);?> id="displayNone" />												<input class='sameWidthinputs' id="upload_image" type="text" size="36" name="ad_image" value="<?php echo esc_attr($sgPopupData->image); ?>"  /> <input id="upload_image_button" class="button sameWidthinputs" type="button" value="Select image"  />											</div>											<div class="ShowSelectedImage">												<span class="NoImage">(No image selected)</span>											</div>										</div>									</div>									<div id="tab2" class="tab <?php echo $activeHtmlVariable;?> ">										<div class="htmlType">										<?php																							$content = wp_kses_post($sgPopupData->html);												$editor_id = 'sg_popup_html';												$settings = array(													'teeny' => true,													'tinymce' => array(														'width' => '100%',													),													'textarea_rows' => '6',													 'editor_css' => '<style> #mceu_27-body{														 width: 100%;													 } </style>',													'media_buttons' => true												);												wp_editor( $content, $editor_id, $settings ); 											?>										</div>										<input type="radio" name="content" value="html" class="htmlRadioButton " <?php echo $htmlStatus;?> id="displayNone" />									</div>									<?php if(SG_POPUP_PRO) { ?>										<div id="tab3" class="tab <?php echo $activeIframeVariable;?> ">											<div class="iframetype">													<div class="iframeContent">													<h1>Enter iframe URL</h1>													<input type="radio" name="content" value="iframe" class="iframeRadioButton " <?php echo $iframeStatus;?> id="displayNone" />													<input class='sameWidthinputs' type='text' name='iframeLink' value='<?php echo esc_attr($sgPopupDataIframe); ?>'>												</div>																								</div>										</div>													<div id="tab4" class="tab <?php echo $activeShortVariable;?> ">											<div class="iframetype">															<div class="iframeContent">													<h1>Enter shortcode</h1>													<input type="radio" name="content" value="shortCode" class="shortCodeRadioButton " <?php echo $shortCodeStatus;?> id="displayNone" />													<input class='sameWidthinputs' type='text' name='shortCode' value='<?php echo esc_attr($sgPopupData->shortCode);?>'>												</div>															</div>										</div>									<?php } ?>								</div>							</div>						</div>						<span class="createDescribe" id="themeSPan">Popup theme:</span><?php echo creaeSelect($sg_popup_theme,'theme',esc_html($theme));?><div class="theme1" id="displayNone"></div><div class="theme2" id="displayNone"></div><div class="theme3" id="displayNone" ></div><div class="theme4" id="displayNone" ></div><div class="theme5" id="displayNone"></div>					</div>				</div>				<div class="effects">					<div class="h2Background" id="effectsTitle">						<h2>Effects</h2>						<img src="<?php echo plugins_url('img/down_arrow-2x.gif', dirname(__FILE__).'../');?>">					</div>					<div class="effectsContent">						<span class="createDescribe">Effect type:</span>						<?php echo creaeSelect($sg_popup_effects,'effect',esc_html($effect));?>						<div class="effectWrapper"><div id="effectShow" ></div></div>						<span  class="createDescribe">Effect duration:</span>						<input class='sameWidthinputs' type="text" name="duration" value="<?php echo esc_attr($duration); ?>" pattern = "\d+" title="It's must be number" /><img  class='infoImageDuration' src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../');?>"> <span class="infoDuration samefontStyle">Specify how long the popup appearance animation should take (in sec).</span></br>						<span  class="createDescribe">Initial delay:</span>						<input class='sameWidthinputs' type="text" name="delay" value="<?php echo esc_attr($delay);?>"  pattern = "\d+" title="It's must be number"/><img class='infoImageDelay' src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../') ?>"><span class="infoDelay samefontStyle">Specify how long the popup appearance should be delayed after loading the page (in sec).</span></br>					</div>				</div>			</div>				<div id="rightMaindiv">				<div id="rightMain">					<div class="dimensions">						<div class="h2Background" id="dimentionsTitle" >							<h2>Dimensions</h2>							<img src="<?php echo plugins_url('img/down_arrow-2x.gif', dirname(__FILE__).'../');?>">												</div>						<div class="dimensionsContent" id="toggle">							<span  class="createDescribe">Width:</span>								<input  class='sameWidthinputs' type="text" name="width" value="<?php echo esc_attr($sgWidth); ?>"  pattern = "\d+(([px]+|\%)|)" title="It's must be number  + px or %" /><img class='errorInfo' src="<?php echo plugins_url('img/info-error.png', dirname(__FILE__).'../') ?>"><span class="validateError">It must be a number + px or %</span><br>							<span  class="createDescribe">Height:</span>								<input class='sameWidthinputs' type="text" name="height" value="<?php echo esc_attr($sgHeight);?>" pattern = "\d+(([px]+|\%)|)" title="It's must be number  + px or %" /><img class='errorInfo' src="<?php echo plugins_url('img/info-error.png', dirname(__FILE__).'../') ?>"><span class="validateError">It must be a number + px or %</span><br>							<span  class="createDescribe">Max width:</span>								<input class='sameWidthinputs' type="text" name="maxWidth" value="<?php echo esc_attr($sgMaxWidth);?>"  pattern = "\d+(([px]+|\%)|)" title="It's must be number  + px or %" /><img class='errorInfo' src="<?php echo plugins_url('img/info-error.png', dirname(__FILE__).'../') ?>"><span class="validateError">It must be a number + px or %</span><br>							<span  class="createDescribe">Max height:</span>								<input class='sameWidthinputs' type="text" name="maxHeight" value="<?php echo esc_attr($sgMaxHeight);?>"   pattern = "\d+(([px]+|\%)|)" title="It's must be number  + px or %" /><img class='errorInfo' src="<?php echo plugins_url('img/info-error.png', dirname(__FILE__).'../') ?>"><span class="validateError">It must be a number + px or %</span><br>							<span  class="createDescribe">Initial width:</span>								<input class='sameWidthinputs' type="text" name="initialWidth" value="<?php echo esc_attr($sgInitialWidth);?>"  pattern = "\d+(([px]+|\%)|)" title="It's must be number  + px or %" /><img class='errorInfo' src="<?php echo plugins_url('img/info-error.png', dirname(__FILE__).'../') ?>"><span class="validateError">It must be a number + px or %</span><br>							<span  class="createDescribe">Initial height:</span>								<input class='sameWidthinputs' type="text" name="initialHeight" value="<?php echo esc_attr($sgInitialHeight);?>"  pattern = "\d+(([px]+|\%)|)" title="It's must be number  + px or %" /><img class='errorInfo' src="<?php echo plugins_url('img/info-error.png', dirname(__FILE__).'../') ?>"><span class="validateError">It must be a number + px or %</span><br>						</div>					</div>					<div class="options">						<div class="h2Background" id="optionsTitle">							<h2>Options</h2>								<img src="<?php echo plugins_url('img/down_arrow-2x.gif', dirname(__FILE__).'../');?>" class="turnArrow">												</div>						<div class="optionsContent">							<span class="createDescribe">Dismiss on &quot;esc&quot; key:</span>							<input class='sameWidthinputs' type="checkbox" name="escKey"  <?php echo $sgEscKey;?>/>							<img class="escKeyImg" src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../');?>"> <span class="infoEscKey samefontStyle">The popup will be dismissed when user presses on 'esc' key.</span></br>							<span class="createDescribe" id="createDescribeClose">Show &quot;close&quot; button:</span>							<input class='sameWidthinputs' type="checkbox" name="closeButton" <?php echo $sgCloseButton;?> />							<img class="CloseImg" src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../');?>"> <span class="infoCloseButton samefontStyle">The popup will contain 'close' button.</span><br>							<span class="createDescribe">Enable content scrolling:</span>							<input class='sameWidthinputs' type="checkbox" name="scrolling" <?php echo $sgScrolling;?> />							<img class="scrollingImg" src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../');?>"> <span class="infoScrolling samefontStyle">If the containt is larger then the specified dimentions, then the content will be scrollable.</span><br>							<span class="createDescribe">Enable responsiveness:</span>							<input class='sameWidthinputs' type="checkbox" name="reposition" <?php echo $sgReposition;?> />							<img class="repositionImg"  src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../');?>"> <span class="infoReposition samefontStyle">The popup will be resized/repositioned automatically when window is being resized.</span><br>							<span class="createDescribe">Dissmiss on overlay click:</span> 							<input class='sameWidthinputs' type="checkbox" name="overlayClose" <?php echo $sgOverlayClose;?> />							<img class="overlayImg" src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../');?>"><span class="infoOverlayClose samefontStyle">The popup will be dismissed when user clicks beyond of the popup area.</span><br>							<?php if (SG_POPUP_PRO): ?>							<span class="createDescribe">Show while scrolling:</span> 							<input class='sameWidthinputs' type="checkbox" name="onScrolling" <?php echo $sgOnScrolling;?> />							<img id="scrollingEvent" src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../');?>"><span class="infoScrollingEvent samefontStyle">Show the popup whenever the user scrolls the page.</span><br>												<span class="createDescribe">Show popup only once:</span> 							<input class='sameWidthinputs' type="checkbox" name="repeatPopup" <?php echo $sgRepeatPopup;?> />							<img class="repeatPopup" src="<?php echo plugins_url('img/info.png', dirname(__FILE__).'../');?>"><span class="infoSelectRepeat samefontStyle">Show the popup to a user only once.</span><br>							<?php endif; ?>							<span class="createDescribe" id="createDescribeOpacitcy">Background overlay opacity:</span>							<div class="slider-wrapper">								<input type="text" class="js-decimal" value="<?php echo esc_attr($sgOpacity);?>" rel="<?php echo esc_attr($sgOpacity);?>" name="opacity"/>								<div id="js-display-decimal" class="display-box"></div>							</div><br>															<span  class="createDescribe" id="createDescribeFixed">Popup location:</span>							<input class='sameWidthinputs' type="checkbox" name="popupFixed" id="popupFixed" <?php echo $sgPopupFixed;?> /><br>							<span class="forFixWrapperStyle" >&nbsp;</span> 							<div class="fixedWrapper"  >								<div class="fixedPositionStyle" id="fixedPosition1" data-sgvalue="1"></div>								<div  id="fixedPosition2" data-sgvalue="2"></div>								<div class="fixedPositionStyle" id="fixedPosition3" data-sgvalue="3"></div>								<div  id="fixedPosition4" data-sgvalue="4"></div>								<div class="fixedPositionStyle" id="fixedPosition5" data-sgvalue="5"></div>								<div  id="fixedPosition6" data-sgvalue="6"></div>								<div class="fixedPositionStyle" id="fixedPosition7" data-sgvalue="7"></div>								<div  id="fixedPosition8" data-sgvalue="8"></div>								<div class="fixedPositionStyle" id="fixedPosition9" data-sgvalue="9"></div>							</div>							<input type="hidden" name="fixedPostion" class="fixedPostion" value="<?php echo esc_attr($sgFixedPostion);?>">						</div>					</div>				</div>				<div class="clear"></div>				<input type="hidden" class="button-primary" value="<?php echo esc_attr($sgPopupData->id);?>" name="hidden_popup_number" />			</div>			</div>	</div></form>