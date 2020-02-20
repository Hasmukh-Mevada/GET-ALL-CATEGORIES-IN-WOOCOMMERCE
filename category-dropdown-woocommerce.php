<?php
$args = array(
    'order'      => 'ASC',
    'hide_empty' => $hide_empty,
    'include'    => $ids,
    'posts_per_page' =>'-1'
);
$product_categories = get_terms( 'product_cat', $args );
echo "<select>";
foreach( $product_categories as $category ){
    echo "<option value = '" . esc_attr( $category->slug ) . "'>" . esc_html( $category->name ) . "</option>";
}
echo "</select>";
?>
//https://d31wcbk3iidrjq.cloudfront.net/WHq7HCHQ-8B2BB6EA-8D18-4643-8AA4-56C70A32176E.jpg?w=40&h=40&q=80

/*
 * Woocommerce Remove excerpt from single product
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'the_content', 20 );
