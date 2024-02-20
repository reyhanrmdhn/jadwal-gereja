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

function generateFullMonthSchedule($services, $days, $participants, $month, $year) {
  $schedule = [];
  $participantIndex = [];

  // Initialize participant index for each role
  foreach ($participants as $role => $list) {
      $participantIndex[$role] = 0;
  }

  // Get the total number of days in the specified month
  $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

  // Flat array to store schedule items
  $flatSchedule = [];

  // Iterate over each day in the month
  for ($day = 1; $day <= $daysInMonth; $day++) {
      // Check if the current day is in the specified days
      $currentDay = date('l', strtotime("$year-$month-$day"));
      if (array_key_exists($currentDay, $days)) {
          $numServices = $days[$currentDay];

          // Only include the day in the schedule if there is at least one service scheduled
          if ($numServices > 0) {
              // Iterate over each service for the current day
              for ($i = 1; $i <= $numServices; $i++) {
                  // Check if the service index exists
                  if (isset($services[$currentDay][$i])) {
                      $service = $services[$currentDay][$i];
                      $scheduleItem = generateServiceSchedule($currentDay, $day, $i, $service, $participants, $participantIndex);

                      // Only add the service to the schedule if it has participants
                      if (!empty($scheduleItem['roles'])) {
                          $flatSchedule[] = $scheduleItem;
                      }
                  }
              }
          }
      }
  }

  // Sort the schedule items by dayOfMonth
  usort($flatSchedule, function ($a, $b) {
      return $a['dayOfMonth'] <=> $b['dayOfMonth'];
  });

  // Group the sorted schedule items by dayOfWeek
  foreach ($flatSchedule as $scheduleItem) {
      $schedule[] = $scheduleItem;
  }

  return $schedule;
}

function generateServiceSchedule($dayOfWeek, $dayOfMonth, $serviceIndex, $service, $participants, &$participantIndex) {
  $scheduleItem = [
      'dayOfWeek' => $dayOfWeek,
      'dayOfMonth' => $dayOfMonth,
      'serviceIndex' => $serviceIndex,
      'roles' => [],
  ];

  foreach ($service as $role => $quantity) {
      $selectedParticipants = selectParticipants($participants[$role], $quantity, $participantIndex[$role]);

      // Only add the role to the schedule if it has participants
      if (!empty($selectedParticipants)) {
          $scheduleItem['roles'][$role] = $selectedParticipants;

          // Update participant index for this role
          $participantIndex[$role] += $quantity;
      }
  }

  return $scheduleItem;
}

function selectParticipants($availableParticipants, $quantity, $startIndex) {
  $selectedParticipants = [];

  for ($i = 0; $i < $quantity; $i++) {
      $index = ($startIndex + $i) % count($availableParticipants);
      $selectedParticipants[] = $availableParticipants[$index];
  }

  return $selectedParticipants;
}

function getMaxIndex($array) {
  $maxRowIndex = count($array) - 1;
  $maxColIndex = 0;

  foreach ($array as $rowIndex => $row) {
      foreach ($row as $colIndex => $value) {
          // Update max column index
          $maxColIndex = max($maxColIndex, $colIndex);
      }
  }

  return $maxColIndex;
}