<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Scheduled task for synchronising cohort to group memberships.
 *
 * @package     enrol_groupsync
 * @copyright   2026 Andrew Chandler
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace enrol_groupsync\task;

/**
 * Scheduled task for synchronising cohort to group memberships.
 *
 * @copyright 2026 Andrew Chandler
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class sync_task extends \core\task\scheduled_task {

    /**
     * Name for this task shown in the admin screens.
     *
     * @return string
     */
    public function get_name(): string {
        return get_string('synctask', 'enrol_groupsync');
    }

    /**
     * Run the synchronisation.
     */
    public function execute(): void {
        global $CFG;

        require_once($CFG->dirroot . '/enrol/groupsync/locallib.php');
        enrol_groupsync_sync(null, false);
    }
}
