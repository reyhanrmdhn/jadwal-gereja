<?php
function is_logged_in()
{
  $ci = get_instance();
  if (!$ci->session->userdata('isLoggedIn') == TRUE) {
    redirect('gotoadminpage');
  }
}

function get_excerpt($description, $limit = 100)
{
  // Remove any HTML tags from the description
  $description = strip_tags($description);

  // Explode the description into an array of words
  $words = explode(' ', $description);

  // Count the number of words
  $word_count = count($words);

  // If the description is already within the word limit, return it as is
  if ($word_count <= $limit) {
    return $description;
  }

  // If the description is longer than the word limit, extract the first $limit words
  $excerpt = implode(' ', array_slice($words, 0, $limit));

  // Add an ellipsis (...) to indicate that the text continues
  $excerpt .= '...';

  return $excerpt;
}
