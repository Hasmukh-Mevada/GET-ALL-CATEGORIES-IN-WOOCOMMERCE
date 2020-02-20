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
