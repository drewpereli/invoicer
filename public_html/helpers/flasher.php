<?php require_once("helpers/global.php"); ?>
<div class="row">
	<div class="col-xs-12 col-sm-6 col-sm-offset-3">
		<?php if (isset($_SESSION["flash"]["danger"])) : ?>
			<div class="col-xs-12 text-danger bg-danger message">
				<?php flash("danger"); ?>
			</div>
		<?php elseif (isset($_SESSION["flash"]["warning"])) : ?>
			<div class="col-xs-12 text-warning bg-warning message">
				<?php flash("warning"); ?>
			</div>
		<?php elseif (isset($_SESSION["flash"]["info"])) : ?>
			<div class="col-xs-12 text-info bg-info message">
				<?php flash("info"); ?>
			</div>
		<?php elseif (isset($_SESSION["flash"]["success"])) : ?>
			<div class="col-xs-12 text-success bg-success message">
				<?php flash("success"); ?>
			</div>
		<?php endif ?>
	</div>
</div>