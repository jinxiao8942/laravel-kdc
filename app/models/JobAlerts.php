<?php

class JobAlerts extends \Eloquent {
	protected $table = 'job_alerts';
	protected $fillable = [
	'candidate_id',
	'job_type',
	'sector_id',
	'location_id',
	'salary_expectations',
	'keywords',
	'skill_keywords',
	'active'
	];

	public static function getJobSectors()
	{
		return DB::select("EXEC spSectors_Select");
		// return DB::connection('pronet')->table('ProNet.dbo.Sectors')->remember(10)->lists('SectorName', 'SectorId');
		// return DB::connection('pronet')->select('SELECT [SectorId],[SectorName],[Description],[CreatedOn] FROM [ProNet].[dbo].[Sectors]');
	}

	public static function getJobTypes()
	{
		return DB::connection('pronet')->table('ProNet.dbo.EmploymentTypes')->remember(10)->lists('Description', 'EmploymentTypeId');
		// return DB::connection('pronet')->select('SELECT TOP 1000 [EmploymentTypeId] ,[Description] ,[CreatedOn] FROM [ProNet].[dbo].[EmploymentTypes]');
	}

	public static function getJobLocations()
	{
		return DB::select("EXEC spLocations_Select");
		// return DB::connection('pronet')->table('ProNet.dbo.Locations')->remember(10)->lists('Description', 'LocationId');
		// return DB::connection('pronet')->select('SELECT TOP 1000 [LocationId] ,[Description] ,[CreatedOn] FROM [ProNet].[dbo].[Locations]');
	}
}

