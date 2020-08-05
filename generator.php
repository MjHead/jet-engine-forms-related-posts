<?php
class JET_FRLP_Generator extends \Jet_Engine\Forms\Generators\Base {

	/**
	 * Returns generator ID
	 *
	 * @return string
	 */
	public function get_id() {
		return 'jet_related_posts';
	}

	/**
	 * Returns generator name
	 *
	 * @return string
	 */
	public function get_name() {
		return 'Related Posts';
	}

	/**
	 * Returns generated options list
	 *
	 * @return array
	 */
	public function generate( $field ) {

		$result = array();

		if ( empty( $field ) ) {
			return $result;
		}

		$post_id = get_the_ID();

		if ( ! $post_id ) {
			return $result;
		}

		$posts = get_post_meta( $post_id, $field, false );

		if ( empty( $posts ) ) {
			return $result;
		}

		foreach ( $posts as $post ) {
			$result[] = array(
				'value' => $post,
				'label' => get_the_title( $post ),
			);
		}

		return $result;

	}

}
