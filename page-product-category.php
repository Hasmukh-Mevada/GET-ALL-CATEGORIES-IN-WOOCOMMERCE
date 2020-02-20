<?php
	/* Template Name: Page - Product Category */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}	

	get_header();
	get_template_part( 'template-parts/entry-header' );
?>
<main id="site-content" role="main" class="wi-100 product-sub-cat section-padding sub-category-bg">
	<div class="post-inner">
		<ul class="subcat-list">
			<?php
			$args = array(
				'orderby'    => 'title',
				'order'      => 'ASC',
				'hide_empty' => $hide_empty,
				'parent'  => 0
			);
			$blogUrl = get_template_directory_uri();
			$product_cats = get_terms('product_cat', $args);
			$count = count($product_cats);
			if ( $count > 0 ){
				$cnt = 1;
				foreach ( $product_cats as $cats ) {
					$cats_id = $cats->term_id;
					$cats_link = get_term_link( $cats );
					$cats_name = $cats->name;
					$thumb_id = get_woocommerce_term_meta( $cats_id , 'thumbnail_id', true );
					$term_img = wp_get_attachment_url( $thumb_id );

					$thumbnail_id = get_woocommerce_term_meta( $cats_id->term_id, 'thumbnail_id', true ); 
					$image = wp_get_attachment_url( $thumbnail_id );

					if($thumbnail_id == "0" || $thumbnail_id == "")
					{
						$image = site_url()."/wp-content/plugins/woocommerce/assets/images/placeholder.png";
					}
					?>

					<li class="product-category product <?php if($cnt%4==1){ echo 'first'; } if($cnt%4==0){ echo 'last'; } ?>">
						<a class="wi-100 subcat-list-link" href="<?php echo $cats_link; ?>">
							<div class="subcat-list-bg d-flex align-items-center">
								<img src="<?php echo $image; ?>" alt="<?php echo $subcats_name; ?>">
							</div>
							<h2 class="subcat-list-title"><?php echo $cats_name; ?></h2>
						</a>
					</li>
					<?php
					$cnt++;
				}
			}
			?>
		</ul>
	</div>
</main>
<?php get_footer(); ?>
