<?php
define("atomlabsDUMMYCONTENT",THEME_PATH."/inc/fungsi/content-%%%%.xml_.txt");

// include WXR file parsers

if(!class_exists('WXR_Parser')) :
	require_once('parsers.php');
endif;

if(!class_exists('WP_Builtin_Import')) :
	require_once('wordpress-importer.php');
	global $atomlabsImporter;
	
	$atomlabsImporter	= new WP_Builtin_Import;
endif;

global $atomlabsInstallation;

class atomlabsInstallation
{
	var $upload	= false;
	var $content	= array(
		'default'		=> 'Default Dummy Content',
	);
	var $setting	= array(
		'default'			=> 'Default',
	);
	var $xml;
	var $json	= array(
		'message'	=> 'There is something wrong with the system.. ugh..',
		'type'		=> 'error',
		'nextb'		=> false,
		'button'	=> '',
		'content'	=> '',
		'setting'	=> '',
	);
	var $message;
	
	// ====================================================================
	// INITIALIZATION
	// ====================================================================	
	function atomlabsInstallation()
	{
	
	}
	
	// ====================================================================
	// FORM
	// ====================================================================	
	
	function form()
	{
		?>
		<div class="input-field ">        	
            <select class="" id="atomlabs-oneclick-content" name="atomlabs_oneclick_content">
            	<option value="">Don't Use</option>
                <?php foreach($this->content as $key => $label) : ?>
                <option value="<?php echo $key; ?>"><?php echo $label; ?></option>
                <?php endforeach; ?>
			</select>
			&nbsp;&nbsp;&nbsp;
           <a href="#" id="atomlabs-oneclick-installation" class="vp-button button" onclick="scrollToBottom('atomlabs-process')">Start Installation</a>
        </div>
        
		
		
        
        <script type="text/javascript">
		jQuery('#atomlabs-oneclick-installation').click(function(){
			install	= {
				content	: jQuery("#atomlabs-oneclick-content").val()
			}
			
			data		= {
				action	: "atomlabs-installation",
				method	: "preprocess",
				data	: install
			}
			
			jQuery.ajax({
				url		: "<?php echo admin_url("admin-ajax.php"); ?>",
				type	: "POST",
				data	: data,
				beforeSend	: function(){
					jQuery('#atomlabs-process').hide();
				},
				success		: function(response){
					result		= jQuery.parseJSON(response);
					theClass	= "carefull"
					if(result.type == "error") theClass = "carefull"
					
					jQuery('#atomlabs-installation-confirm').addClass(theClass);
					jQuery('#atomlabs-installation-confirm p.the-message').html(result.message);
					
					if(result.nextb == false) jQuery('#atomlabs-installation-now').hide();
					else jQuery('#atomlabs-installation-now').show();
					
					jQuery('#atomlabs-installation-now').html(result.button).attr('data-content',result.content).attr('data-setting',result.setting);
					jQuery('#atomlabs-installation-confirm').show();
				}
			});
			
			return false;
		});
		</script>
        
        <div id="atomlabs-installation-confirm" class="atomlabs-process-message" style="display:none;" >
			<p class="the-message">Are you sure want to replace all theme and color settings from uploaded XML ? It can't be reverted</p>
            <p class="the-button">
            	<a id="atomlabs-installation-now" href="#" class="button button-primary" data-content="" data-setting=""></a>
            </p>
        </div>
        
        <div id="atomlabs-process" class="atomlabs-process-init" style="max-height:400px;overflow:auto;">
		<p>Are you sure want to install DEMO CONTENT ? It can't be reverted...</p>
        </div>
        
        <script type="text/javascript">
		
		
		
		jQuery('#atomlabs-installation-now').click(function(){
			install	= {
				content	: jQuery(this).attr('data-content')
			}
			
			data		= {
				action	: "atomlabs-installation",
				method	: "process",
				data	: install
			}
			
		//jQuery("#atomlabs-process").animate({ scrollTop: jQuery("#atomlabs-process").prop("scrollHeight") - jQuery('#atomlabs-process').height() }, 3000);
		var elm = document.getElementById('atomlabs-process');
		try
			{
			elm.scrollTop = elm.scrollHeight;
			}
		catch(e)
			{
			var f = document.createElement("input");
			if (f.setAttribute) f.setAttribute("type","text")
			if (elm.appendChild) elm.appendChild(f);
			f.style.width = "0px";
			f.style.height = "0px";
			if (f.focus) f.focus();
			if (elm.removeChild) elm.removeChild(f);
			}
 
		jQuery.ajax({
				url		: "<?php echo admin_url("admin-ajax.php"); ?>",
				type	: "POST",
				data	: data,
				beforeSend	: function(){
					jQuery('#atomlabs-installation-confirm').hide();
					jQuery('#atomlabs-process').show().html("Preparing everything.... It will take a moment.<br />Don't refresh this page<div class='buttons'><span style='margin-left: 10px;'><span id='vp-js-export-loader' class='vp-field-loader'><img src='<?php VP_Util_Res::img_out('ajax-loader.gif', ''); ?>' style='vertical-align: middle;'></span></span></div>")
				},
				success		: function(response){
					result	= jQuery.parseJSON(response);
						
					jQuery('#atomlabs-process').html(result.message);
					setTimeout(function(){
						//window.location.href	= "<?php echo admin_url("admin.php?page=vpt_option"); ?>";
					},30000)
				}
			});
			
			return false;
		});
		</script>
        <?php
	}
	
	// ====================================================================
	// uploadXML
	// ====================================================================	
	function preprocess()
	{
		if(empty($this->data['content']) && empty($this->data['setting'])) :
			$json	= array(
				'message'	=> "You didn't choose any options for content or theme setting",
				'type'		=> 'error',
				'nextb'		=> false,
			);
		else :
		
			$json	= array(
				'message'	=> "",
				'type'		=> 'proceed',
				'nextb'		=> true,
				'button'	=> "",
				'content'	=> $this->data['content'],
			);
			
			if(!empty($this->data['content'])) :
				$json['message'][]	= "You're about to install content <strong>".$this->content[$this->data['content']]."</strong>";
				$json['button'][]	= "content";
			endif;
			
			
			
			$json['message']	= implode("<br />",$json['message']);
			$json['button']		= "Install ".implode(" and ",$json['button']);
		
		endif;
		
		$this->json	= wp_parse_args($json,$this->json);
		
		return;
	}
	
	// ====================================================================
	// process
	// ====================================================================	
	
	function process()
	{
		$message	= array();
		if(!empty($this->data['content'])) :
			$message[]	= $this->importContent($this->data['content']);
		endif;
		
		
		$this->json['message']	= implode("<br/><br/>",$message);
	}

	// ====================================================================
	// importContent
	// ====================================================================	
	
	function importContent()
	{
		global $atomlabsImporter;
		
		$file		= str_replace("%%%%",$this->data['content'],atomlabsDUMMYCONTENT);
		
		$atomlabsImporter->fetch_attachments	= true;
		
		ob_start();
		
		$atomlabsImporter->import($file);
		
		$message.= ob_get_contents();
		
		ob_end_clean();
		
		return "<strong>Installing content</strong> : <br /><br />".$message;
	}
	

}

add_action('init','atomlabsInstallation');
add_action('wp_ajax_atomlabs-installation','atomlabsAJAXInstallation');

function atomlabsInstallation()
{
	global $atomlabsInstallation;	
	
	$atomlabsInstallation	= new atomlabsInstallation;
}

function atomlabsAJAXInstallation()
{
	global $atomlabsInstallation;
	
	if(isset($_POST['method']) && method_exists($atomlabsInstallation,$_POST['method'])) :
		$method	= $_POST['method'];
		$atomlabsInstallation->data	= $_POST['data'];
		$atomlabsInstallation->$method();
	endif;
	
	echo json_encode($atomlabsInstallation->json);
	
	exit();	
}

?>