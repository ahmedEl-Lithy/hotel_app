<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App{
/**
 * App\Reservation
 *
 * @property-read \App\Client $client
 * @property-read \App\Room $room
 */
	class Reservation extends \Eloquent {}
}

namespace App{
/**
 * App\Room
 *
 */
	class Room extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 */
	class User extends \Eloquent {}
}

