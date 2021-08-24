<?php

namespace App\Authentication;

class Authentication
{
	public function hasUserPrivileges()
	{
		return (isset($_SESSION['user']['user_privileges']) && $_SESSION['user']['user_privileges'] == true);
	}

	public function hasAdminPrivileges()
	{
		return (isset($_SESSION['user']['admin_privileges']) && $_SESSION['user']['admin_privileges'] == true);
	}

	public function hasSuperUserPrivileges()
	{
		return (isset($_SESSION['user']['superuser_privileges']) && $_SESSION['user']['superuser_privileges'] == true);
	}
}