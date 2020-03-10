<?php
	if(post_password_required()){
		return;
	}
?>
<div id="comments" class="comments">
	<h3 class="comment-title"><?php comments_number( esc_html__( 'No Comments', 'maxon' ), esc_html__( 'One Comment', 'maxon' ), esc_html__( '% Comments', 'maxon' ) ); ?></h3>
	<!-- COMMENT START HERE -->
	<ul class="comments-list">
		<?php 
			if( number_format_i18n( get_comments_number() ) > 0 ) {
				wp_list_comments(array(
            		'style'			=> 'ul',
            		'callback'		=> 'maxon_comments',
            		'short_ping'	=> true
				));
			}
		?>
	</ul>
	 <?php 
	 	the_comments_navigation( array(
	 		'screen_reader_text' => ' '
		) ); 
		?>						
</div>
<div class="comment-form">
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$required_text = '  ';
		$args = array(
			'id_form'           => 'commentForm',
			'class_form'           =>'comment-form',
			'title_reply'       => '<div class="comment-title">Leave a comment</div>',
			'submit_button'      =>'<button type="submit" class="comment-submit">'.esc_html__('Submit','maxon').'</button>',
			'comment_field' =>  '<textarea name="comment"'.$aria_req.' rows="5" placeholder="'.esc_html__('Write Comments','maxon').'"></textarea>',
			'fields' => apply_filters( 'comment_form_default_fields', 
			array(
				'author' => '<div class="row">
					<div class="col-md-6">
						<input type="text" name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_html__( 'Full Name *','maxon') . '" />
					</div>',
				'email' => ' <div class="col-md-6">
							<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . esc_html__( 'Email *','maxon') . '" />
						</div>
					</div>'
			) ),
			'label_submit' => esc_html__('Submit','maxon'),
		);
		comment_form($args); ?>
	</div><!-- /#respond -->
