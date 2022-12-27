<?php

/**
 * Calculate the age of a dataset member.
 *
 * @param $birthdate array  a dataset member birthdate in TimeDate array format.
 *
 * @return string   a calculated member age.
 */
function calculateAge($birthdate) {
    $difference = date_diff(date_create($birthdate['year'] . '-' . $birthdate['month'] . '-' . $birthdate['day']), date_create(date('Y-m-d')));

    return $difference -> format('%y');
}

/**
 * Calculate the expanded age of a dataset member.
 *
 * @param $birthdate array  a dataset member birthdate in TimeDate array format.
 *
 * @return array    a calculated, expanded member age.
 */
function calculateExpandedAge($birthdate) {
	$difference = date_diff(date_create($birthdate['year'] . '-' . $birthdate['month'] . '-' . $birthdate['day']), date_create(date('Y-m-d')));

    return [
        'year' => $difference -> y,
        'month' => $difference -> m,
        'day' => $difference -> d
    ];
}

/**
 * Create an HTML member profile card component.
 *
 * @param $index numeric    the dataset index at which the object exists.
 * @param $member object    the dataset object resolved.
 *
 * @return false|string     the built HTML if it can be built; false if it cannot be built.
 */
function createProfileCard($index, $member) {
    ob_start(); ?>

	<div class="single_advisor_profile wow fadeInUp" data-wow-delay="0.2s"
	     style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">

		<!-- Team Thumb-->
		<div class="advisor_thumb">
			<a href="detail.php?member=<?= $index ?>">
				<img src="./asset/img/<?= $member['avatar'] ?>" style="height: 25rem; width: 100%; border-radius: 10px" alt="<?= $member['name'] ?>">
			</a>

			<!-- Social Info-->
			<div class="social-info">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#/"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>

		<!-- Team Details-->
		<div class="single_advisor_details_info">
			<h6><?= $member['name'] ?>&ensp;·&ensp;<?= $member['year'] ?></h6>
			<p class="designation"><?= $member['position'] ?> @ <?= $member['company'] ?></p>
		</div>
	</div>

    <?php return ob_get_clean();
} ?>