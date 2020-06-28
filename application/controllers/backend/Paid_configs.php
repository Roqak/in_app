<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Likes Controller
 */

class Paid_configs extends BE_Controller {
		/**
	 * Construt required variables
	 */
	function __construct() {

		parent::__construct( MODULE_CONTROL, 'paid_config_module' );
	}

	/**
	 * Load About Entry Form
	 */

	function index( $id = "pconfig1" ) {

		if ( $this->is_POST()) {
		// if the method is post

			// server side validation
			if ( $this->is_valid_input()) {

				// save user info
				$this->save( $id );
			}
		}

		//Get Paid_config Object
		$this->data['pconfig'] = $this->Paid_config->get_one( $id );

		$this->load_form($this->data);

	}

	/**
	 * Update the existing one
	 */
	function edit( $id = "pconfig1") {

		// load user
		$this->data['pconfig'] = $this->Paid_config->get_one( $id );

		// call the parent edit logic
		parent::edit( $id );
	}

	/**
	 * Saving Logic
	 * 1) save about data
	 * 2) check transaction status
	 *
	 * @param      boolean  $id  The about identifier
	 */
	function save( $id = false ) {

		// start the transaction
		$this->db->trans_start();
		
		// prepare data for save
		$data = array();

		// day
		if ( $this->has_data( 'day' )) {
			$data['day'] = $this->get_data( 'day' );
		}

		// amount
		if ( $this->has_data( 'amount' )) {
			$data['amount'] = $this->get_data( 'amount' );
		}

		// currency_short_form
		if ( $this->has_data( 'currency_short_form' )) {
			$data['currency_short_form'] = $this->get_data( 'currency_short_form' );
		}

		// currency_symbol
		if ( $this->has_data( 'currency_symbol' )) {
			$data['currency_symbol'] = $this->get_data( 'currency_symbol' );
		}

		// paypal_environment
		if ( $this->has_data( 'paypal_environment' )) {
			$data['paypal_environment'] = $this->get_data( 'paypal_environment' );
		}

		// paypal_merchant_id
		if ( $this->has_data( 'paypal_merchant_id' )) {
			$data['paypal_merchant_id'] = $this->get_data( 'paypal_merchant_id' );
		}

		// paypal_public_key
		if ( $this->has_data( 'paypal_public_key' )) {
			$data['paypal_public_key'] = $this->get_data( 'paypal_public_key' );
		}

		// paypal_private_key
		if ( $this->has_data( 'paypal_private_key' )) {
			$data['paypal_private_key'] = $this->get_data( 'paypal_private_key' );
		}

		// 	stripe_publishable_key
		if ( $this->has_data( 'stripe_publishable_key' )) {
			$data['stripe_publishable_key'] = $this->get_data( 'stripe_publishable_key' );
		}

		// stripe_secret_key
		if ( $this->has_data( 'stripe_secret_key' )) {
			$data['stripe_secret_key'] = $this->get_data( 'stripe_secret_key' );
		}

		// if 'stripe_enabled' is checked,
		if ( $this->has_data( 'stripe_enabled' )) {
			$data['stripe_enabled'] = 1;
		} else {
			$data['stripe_enabled'] = 0;
		}

		// if 'paypal_enabled' is checked,
		if ( $this->has_data( 'paypal_enabled' )) {
			$data['paypal_enabled'] = 1;
		} else {
			$data['paypal_enabled'] = 0;
		}
	
		// save backend config
		if ( ! $this->Paid_config->save( $data, $id )) {
		// if there is an error in inserting user data,	

			// rollback the transaction
			$this->db->trans_rollback();

			// set error message
			$this->data['error'] = get_msg( 'err_model' );
			
			return;
		}
	

		// commit the transaction
		if ( ! $this->check_trans()) {
        	
			// set flash error message
			$this->set_flash_msg( 'error', get_msg( 'err_model' ));
		} else {

			if ( $id ) {
			// if user id is not false, show success_add message
				
				$this->set_flash_msg( 'success', get_msg( 'success_paid_edit' ));
			} else {
			// if user id is false, show success_edit message

				$this->set_flash_msg( 'success', get_msg( 'success_paid_add' ));
			}
		}

		
		redirect( site_url('/admin/paid_configs') );

	}

	 /**
	 * Determines if valid input.
	 *
	 * @return     boolean  True if valid input, False otherwise.
	 */
	function is_valid_input( $id = 0 ) {
 		return true;
	}
}