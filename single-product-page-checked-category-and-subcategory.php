//Display checked category and Subcategory Display Single Product Page
function single_product_category_subcategory() { 
    	?>
			<div class="wi-100 category-subcategory">
				<?php
				global $post;
				$taxonomy = 'product_cat'; //Put your custom taxonomy term here
				$terms = wp_get_post_terms( $post->ID, $taxonomy );
				$taxonomy     = 'product_cat';
			    $orderby      = 'name';  
			    $show_count   = 0;      // 1 for yes, 0 for no
			    $pad_counts   = 0;      // 1 for yes, 0 for no
			    $hierarchical = 0;      // 1 for yes, 0 for no  
			    $title        = '';  
			    $empty        = 0;
				foreach ( $terms as $term ){
					if ($term->parent == 0) { // this gets the parent of the current post taxonomy
						$myparent = $term;
						?>
						<h3 class="wi-100 btn"><?php echo $myparent->name ; ?></h3>
						<?php
						$category_id = $myparent->term_id;
						$args2 = array(
			                'taxonomy'     => $taxonomy,
			                'child_of'     => 0,
			                'parent'       => $category_id,
			                'orderby'      => $orderby,
			                'show_count'   => $show_count,
			                'pad_counts'   => $pad_counts,
			                'hierarchical' => $hierarchical,
			                'title_li'     => $title,
			                'hide_empty'   => $empty
				        );
						$sub_cats = get_categories( $args2 );
					    if($sub_cats) { ?>
							<ul class="wi-100">
								<?php
					            foreach($sub_cats as $sub_category) {
					            	?>
					                <li><?php echo  $sub_category->name ; ?></li>
					                <?php
					            } ?>
				            </ul>
				    <?php }
					}
				}
			?>
			</div>
    	<?php
    }
