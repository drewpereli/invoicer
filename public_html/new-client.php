<?php require_once("helpers/global.php"); ?>
<?php require_once("helpers/require-log-in.php"); ?>
<?php require_once("helpers/global-html-head.php"); ?>
<h1>New Client</h1>
<?php
	$form_fields = array(
		array("label"=>"Name", "name"=>"name", "type"=>"text", "required"=>true),
		array("label"=>"Company", "name"=>"company", "type"=>"text"),
		array("label"=>"Email", "name"=>"email", "type"=>"email", "required"=>true),
		array("label"=>"Rate", "name"=>"default_rate", "type"=>"HOURLY_RATE", "required"=>true),
		array("label"=>"Phone", "name"=>"phone", "type"=>"telephone"),
		array("label"=>"Address", "name"=>"address", "type"=>"text"),
		array("label"=>"City", "name"=>"city", "type"=>"text"),
		array("label"=>"State", "name"=>"state", "type"=>"STATE_DROPDOWN"),
		array("label"=>"Zip", "name"=>"zip", "type"=>"number")
	);
	generateForm($form_fields, "new-client");
?>
<div id="response" class="message hidden"></div>
<script type="text/javascript">
	$("#new-client_submit_btn").click(function(){
		var valid_input = validateRequiredFields("new-client_form");
		var message = valid_input ? "" : "Missing required fields";
		//Validate number
		//if valid data, send post request to the create user script
		if (valid_input)
		{
			$("#response").removeClass("hidden")
				.removeClass("bg-danger")
				.removeClass("text-danger")
				.addClass("bg-success text-success")
				.html("Processing...");
			var json = $("#new-client_form").serializeJSON();
			json.model = "Client";
			$.ajax({
				type: "POST",
				url: "helpers/CRUD/create.php",
				data: json,
			}).done(function(data){
				data = $.trim(data);
				data = $.parseJSON(data);
				if (data.success)
				{
					$("#response").html(data.message);
					window.location.replace("client.php?c=" + data.client_id);
				}
				else
				{
					$("#response").removeClass("bg-success text-success")
						.addClass("bg-danger text-danger")
						.html(data.message);
				}
			});
		}
		else
		{
			$("#response").removeClass("hidden")
				.addClass("bg-danger text-danger")
				.html(message);
		}
	});
</script>

<?php require_once("helpers/global-html-foot.php"); ?>