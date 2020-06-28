<?php
$attributes = array('id' => 'paidconfig-form','enctype' => 'multipart/form-data');
echo form_open( '', $attributes);
?>
<section class="content animated fadeInRight">
	<div class="card card-info">
		<div class="card-header">
	        <h3 class="card-title"><?php echo get_msg('paid_config_info_lable')?></h3>
	    </div>

		<div class="card-body">
	        <div class="row">
	        	<legend class="ml-3"><?php echo get_msg('paid_currency_setting')?></legend>
	          	<div class="col-md-6">
	          		<div class="form-group">
						<label><?php echo get_msg('day_label')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('day_label')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'day',
								'id' => 'day',
								'class' => 'form-control',
								'placeholder' => get_msg('day_label'),
								'value' => set_value( 'day', show_data( @$pconfig->day ), false )
							));
						?>
					</div>

					<div class="form-group">
						<label><?php echo get_msg('currency_symbol_label')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('currency_symbol_label')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'currency_symbol',
								'id' => 'currency_symbol',
								'class' => 'form-control',
								'placeholder' => get_msg('currency_symbol_label'),
								'value' => set_value( 'currency_symbol', show_data( @$pconfig->currency_symbol ), false )
							));
						?>
					</div>
	          	</div>

	          	<div class="col-md-6">
	          		<div class="form-group">
						<label><?php echo get_msg('amount_label')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('amount_label')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'amount',
								'id' => 'amount',
								'class' => 'form-control',
								'placeholder' => get_msg('amount_label'),
								'value' => set_value( 'amount', show_data( @$pconfig->amount ), false )
							));
						?>
					</div>

					<div class="form-group">
						<label><?php echo get_msg('currency_short_form')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('currency_short_form')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'currency_short_form',
								'id' => 'currency_short_form',
								'class' => 'form-control',
								'placeholder' => get_msg('currency_short_form_label'),
								'value' => set_value( 'currency_short_form', show_data( @$pconfig->currency_short_form ), false )
							));
						?>
					</div>
	          	</div>
	          	
 				<hr width="100%" size="8">
	          	<legend class="ml-3"><?php echo get_msg('paid_paypal_setting')?></legend>
	          	<div class="col-md-6">
	          		<label><?php echo get_msg('paypal_label')?></label>

					<br>
	          		<div class="form-group">
						<label><?php echo get_msg('paypal_env_label')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('paypal_env_label')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'paypal_environment',
								'id' => 'paypal_environment',
								'class' => 'form-control',
								'placeholder' => get_msg('paypal_env_label'),
								'value' => set_value( 'paypal_environment', show_data( @$pconfig->paypal_environment ), false )
							));
						?>
					</div>

					<div class="form-group">
						<label><?php echo get_msg('paypal_merchant_label')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('paypal_merchant_label')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'paypal_merchant_id',
								'id' => 'paypal_merchant_id',
								'class' => 'form-control',
								'placeholder' => get_msg('paypal_merchant_label'),
								'value' => set_value( 'paypal_merchant_id', show_data( @$pconfig->paypal_merchant_id ), false )
							));
						?>
					</div>

					<div class="form-group">
						<div class="form-check">
							<label>
							
							<?php echo form_checkbox( array(
								'name' => 'paypal_enabled',
								'id' => 'paypal_enabled',
								'value' => 'accept',
								'checked' => set_checkbox('paypal_enabled', 1, ( @$pconfig->paypal_enabled == 1 )? true: false ),
								'class' => 'form-check-input'
							));	?>

							<?php echo get_msg( 'paypal_enabled_label' ); ?>

							</label>
						</div>
					</div>
	          	</div>

	          	<div class="col-md-6">
	          		<div class="form-group">
						<label><?php echo get_msg('paypal_pub_label')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('paypal_pub_label')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'paypal_public_key',
								'id' => 'paypal_public_key',
								'class' => 'form-control',
								'placeholder' => get_msg('paypal_pub_label'),
								'value' => set_value( 'paypal_public_key', show_data( @$pconfig->paypal_public_key ), false )
							));
						?>
					</div>

					<div class="form-group">
						<label><?php echo get_msg('paypal_pri_label')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('paypal_pri_label')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'paypal_private_key',
								'id' => 'paypal_private_key',
								'class' => 'form-control',
								'placeholder' => get_msg('paypal_pri_label'),
								'value' => set_value( 'paypal_private_key', show_data( @$pconfig->paypal_private_key ), false )
							));
						?>
					</div>
	          	</div>
	          	<hr width="100%" size="8">
	          	<legend class="ml-3"><?php echo get_msg('paid_stripe_setting')?></legend>
	          	<div class="col-md-6">
	          		<label><?php echo get_msg('stripe_label')?></label>
						
					<br>
					<div class="form-group">
						<label><?php echo get_msg('stripe_publishable_key')?>
							<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('stripe_publishable_key')?>">
								<span class='glyphicon glyphicon-info-sign menu-icon'>
							</a>
						</label>
						<?php 
							echo form_input( array(
								'type' => 'text',
								'name' => 'stripe_publishable_key',
								'id' => 'stripe_publishable_key',
								'class' => 'form-control',
								'placeholder' => get_msg('stripe_publishable_key'),
								'value' => set_value( 'stripe_publishable_key', show_data( @$pconfig->stripe_publishable_key ), false )
							));
						?>
					</div>	 

					<div class="form-group">
						<div class="form-check">
							<label>
							
							<?php echo form_checkbox( array(
								'name' => 'stripe_enabled',
								'id' => 'stripe_enabled',
								'value' => 'accept',
								'checked' => set_checkbox('stripe_enabled', 1, ( @$pconfig->stripe_enabled == 1 )? true: false ),
								'class' => 'form-check-input'
							));	?>

							<?php echo get_msg( 'stripe_enable_label' ); ?>

							</label>
						</div>
					</div>         		
	          	</div>
	        </div>

	        <div class="col-md-6">
	        	<div class="form-group">

					<label><?php echo get_msg('stripe_secret_key')?>
						<a href="#" class="tooltip-ps" data-toggle="tooltip" title="<?php echo get_msg('stripe_secret_key')?>">
							<span class='glyphicon glyphicon-info-sign menu-icon'>
						</a>
					</label>
					<?php 
						echo form_input( array(
							'type' => 'text',
							'name' => 'stripe_secret_key',
							'id' => 'stripe_secret_key',
							'class' => 'form-control',
							'placeholder' => get_msg('stripe_secret_key'),
							'value' => set_value( 'stripe_secret_key', show_data( @$pconfig->stripe_secret_key ), false )
						));
					?>
				</div>	      
	        </div>
	        <!-- row -->
	    </div>
	    <!-- card body -->

	    <div class="card-footer">
            <button type="submit" class="btn btn-sm btn-primary">
				<?php echo get_msg('btn_save')?>
			</button>

			<a href="<?php echo $module_site_url; ?>" class="btn btn-sm btn-primary">
				<?php echo get_msg('btn_cancel')?>
			</a>
        </div>
	</div>
	<!-- card info -->
</section>
<?php echo form_close(); ?>