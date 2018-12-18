<?php
/**********************************************************************
    Copyright (C) WebAccounting, LLC.
	Released under the terms of the GNU General Public License, GPL,
	as published by the Free Software Foundation, either version 3
	of the License, or (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    See the License here <http://www.gnu.org/licenses/gpl-3.0.html>.
***********************************************************************/
class dashboard_app extends application
{
	function dashboard_app()
	{
		$this->application("home", _($this->help_context = "&Home"));
		

		$this->add_extensions();
	}
}


?>