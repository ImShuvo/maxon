<?php

/*-----------------------------------------------------
 * Coomment Text Area
 *----------------------------------------------------*/
function maxon_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'maxon_move_comment_field_to_bottom' );

/*-----------------------------------------------------
 * Coomment List
 *----------------------------------------------------*/
if(!function_exists('maxon_comments')){
	function maxon_comments($comment,$args,$depth){
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);
		?>
		<li class="comment" id="comment-<?php comment_ID(); ?>">
			<div class="single-comment">
				<?php if(get_avatar($comment) != '') { ?>
					<div class="user-thumb">
						<?php  echo get_avatar( $comment,100,null,null,array('class'=>array('avatar-small img-responsive'))); ?>
					</div><!-- /.comment-meta -->
				<?php } ?>
				<div class="comments-body">
					<h4 class="commenter-name"><?php echo get_comment_author_link(); ?></h4><!-- /.comment-author -->
					<div class="comment-content"><p><?php comment_text(); ?></p></div>
					<div class="comments-replay-link">
						<i class="ti-back-right"></i><?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=>'Replay' ) ) ); ?>
					</div>
				</div>
			</div>
		</li>
		<?php
	}
}
