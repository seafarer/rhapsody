<?php
/*
 * The template for displaying a random quote
 */

$quotes = get_field('quotes', 'option');
$quote_rand = $quotes[ array_rand( $quotes ) ];
$quote = $quote_rand['quote'];
$quote_author = $quote_rand['quote_author'];

?>

<div class="quote-container">
  <div class="quote">
    <?php print $quote; ?>
    <span class="quote-author">
      &mdash; <?php print $quote_author; ?>
    </span>
  </div>
</div>
