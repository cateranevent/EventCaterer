<div class="um <?php echo $this->get_class( $mode ); ?> um-<?php echo esc_attr( $form_id ); ?>">

	<div class="um-form">
	
		<form method="post" action="">
			
			<?php
			/**
			 * UM hook
			 *
			 * @type action
			 * @title um_account_page_hidden_fields
			 * @description Show hidden fields on account form
			 * @input_vars
			 * [{"var":"$args","type":"array","desc":"Account shortcode arguments"}]
			 * @change_log
			 * ["Since: 2.0"]
			 * @usage add_action( 'um_account_page_hidden_fields', 'function_name', 10, 1 );
			 * @example
			 * <?php
			 * add_action( 'um_account_page_hidden_fields', 'my_account_page_hidden_fields', 10, 1 );
			 * function my_account_page_hidden_fields( $args ) {
			 *     // your code here
			 * }
			 * ?>
			 */
			do_action( 'um_account_page_hidden_fields', $args ); ?>

			
			<div class="um-account-side uimob340-hide uimob500-hide">



				<ul>
					<?php foreach ( UM()->account()->tabs as $id => $info ) {
                        if ( isset( $info['custom'] ) || UM()->options()->get( "account_tab_{$id}" ) == 1 || $id == 'general' ) { ?>

                            <li>
                                <a data-tab="<?php echo $id ?>" href="<?php echo UM()->account()->tab_link( $id ); ?>" class="um-account-link <?php if ( $id == UM()->account()->current_tab ) echo 'current'; ?>">
                                    <?php if ( UM()->mobile()->isMobile() ) { ?>
                                        <span class="um-account-icontip uimob800-show" title="<?php echo $info['title']; ?>"><i class="<?php echo $info['icon']; ?>"></i></span>
                                    <?php } else { ?>
                                        <span class="um-account-icontip uimob800-show um-tip-w" title="<?php echo $info['title']; ?>"><i class="<?php echo $info['icon']; ?>"></i></span>
                                    <?php } ?>

                                    <span class="um-account-icon uimob800-hide"><i class="<?php echo $info['icon']; ?>"></i></span>
                                    <span class="um-account-title uimob800-hide"><?php echo $info['title']; ?></span>
                                    <span class="um-account-arrow uimob800-hide">
                                        <i class="<?php if ( is_rtl() ) { ?>um-faicon-angle-left<?php } else { ?>um-faicon-angle-right<?php } ?>"></i>
                                    </span>
                                </a>
                            </li>

                        <?php }
					} ?>
				</ul>
			</div>
			
			<div class="um-account-main" data-current_tab="<?php echo UM()->account()->current_tab; ?>">
			
				<?php
				/**
				 * UM hook
				 *
				 * @type action
				 * @title um_before_form
				 * @description Show some content before account form
				 * @input_vars
				 * [{"var":"$args","type":"array","desc":"Account shortcode arguments"}]
				 * @change_log
				 * ["Since: 2.0"]
				 * @usage add_action( 'um_before_form', 'function_name', 10, 1 );
				 * @example
				 * <?php
				 * add_action( 'um_before_form', 'my_before_form', 10, 1 );
				 * function my_before_form( $args ) {
				 *     // your code here
				 * }
				 * ?>
				 */
				do_action( 'um_before_form', $args );
				
				foreach ( UM()->account()->tabs as $id => $info ) {

                    $current_tab = UM()->account()->current_tab;

                    if ( isset( $info['custom'] ) || UM()->options()->get( 'account_tab_' . $id ) == 1 || $id == 'general' ) { ?>

                        <div class="um-account-nav uimob340-show uimob500-show">
                            <a href="#" data-tab="<?php echo $id; ?>" class="<?php if ( $id == $current_tab ) echo 'current'; ?>">
                                <?php echo $info['title']; ?>
                                <span class="ico"><i class="<?php echo $info['icon']; ?>"></i></span>
                                <span class="arr"><i class="um-faicon-angle-down"></i></span>
                            </a>
                        </div>

                        <div class="um-account-tab um-account-tab-<?php echo $id ?>" data-tab="<?php echo $id ?>">
                            <?php $info['with_header'] = true;
                            UM()->account()->render_account_tab( $id, $info, $args ); ?>
                        </div>

                    <?php }
						
				} ?>
				
			</div>
			<div class="um-clear"></div>
		</form>
		
		<?php
		/**
		 * UM hook
		 *
		 * @type action
		 * @title um_after_account_page_load
		 * @description After account form
		 * @change_log
		 * ["Since: 2.0"]
		 * @usage add_action( 'um_after_account_page_load', 'function_name', 10 );
		 * @example
		 * <?php
		 * add_action( 'um_after_account_page_load', 'my_after_account_page_load', 10 );
		 * function my_after_account_page_load() {
		 *     // your code here
		 * }
		 * ?>
		 */
		do_action( 'um_after_account_page_load' ); ?>
	
	</div>
	
</div>