<div class="row">
	<div class="col-lg-12 col-xxl-12 m-b-30">
		<div class="card card-statistics h-100 mb-0 widget-support-list">
			<div class="card-header">
				<div class="card-heading">
					<h4 class="card-title">Data Helpdesk</h4>
				</div>
			</div>
			<div class="card-body pl-0 pr-0 scrollbar scroll_dark mCustomScrollbar _mCS_3 mCS-autoHide" style="position: relative; overflow: visible;">
				<div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0" style="max-height: none;">
					<div id="mCSB_3_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
						<?php foreach($helpdesk as $help) { ?>
						<div class="widget-text">
							<div class="media">
								<!-- <div class="dot-online">
									<div class="bg-img mr-2">
										<img class="img-fluid mCS_img_loaded" src="<?php echo base_url(); ?>assets/dashboard/img/avtar/01.jpg" alt="listwidget-img">
									</div>
									<span class="dot-online-icon bg-success"></span>
								</div> -->
								<div class="media-body ml-2">
									<h4 class="mb-0"><a href="mailto:<?= $help->email ?>"><?= $help->email ?></a></h4>
									<span>
										<?= timeago($help->tanggal_pesan); ?>
									</span>
									<p><a href="mailto:<?= $help->email ?>"><button class="btn btn-success btn-sm">Balas</button></a></p>
								</div>
							</div>
							<div class="pt-3">
								<p><?=$help->pesan ?></p>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: block;">
					<div class="mCSB_draggerContainer">
						<div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; display: block; height: 269px; max-height: 416px; top: 0px;">
							<div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
						</div>
						<div class="mCSB_draggerRail"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>