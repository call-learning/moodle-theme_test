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
 * All constant in one place
 *
 * @package   theme_imtpn
 * @copyright 2020 - CALL Learning - Laurent David <laurent@call-learning.fr>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_imtpn\local;

use core\plugininfo\theme;
use theme_boost\autoprefixer;
use moodle_url;

/**
 * Theme constants. In one place.
 *
 * @package   theme_imtpn
 * @copyright 2020 - CALL Learning - Laurent David <laurent@call-learning.fr>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class config extends \theme_clboost\local\config {
    /**
     * Get layout settings
     *
     * @return array[]
     */
    public static function get_layouts() {
        $layout = parent::get_layouts();
        // My public page.
        $layout['mypublic'] = array(
            'file' => 'myprofile.php',
            'regions' => array('side-pre'),
            'defaultregion' => 'side-pre',
        );
        return $layout;
    }

    /**
     * Setup the theme config
     *
     * @param \theme_config $theme
     * @param string $themeparentname
     */
    public static function setup_config(&$theme, $themeparentname = 'clboost') {
        global $CFG, $USER;
        $theme = parent::setup_config($theme, $themeparentname);
        $theme->removedprimarynavitems = explode(',', get_config('theme_imtpn', 'hidenodesprimarynavigation'));
        $CFG->custommenuitems = '';
        if (!empty($CFG->enableresourcelibrary)) {
            $url = new moodle_url('http://moodlepg.local/local/resourcelibrary/index.php');
            $CFG->custommenuitems .= get_string('catalogue', 'theme_imtpn') . '|' . $url->out() . "\n";
        }
    }
}
