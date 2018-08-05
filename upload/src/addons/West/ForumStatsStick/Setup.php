<?php

namespace West\ForumStatsStick;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;

class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
	use StepRunnerUninstallTrait;
	public function installStep1() {
		$this->schemaManager()->createTable('xf_fss_sticked_items', function(\XF\Db\Schema\Create $table)
        {
        	$table->addColumn('sticked_item_id', 'int')->autoIncrement();
        	$table->addColumn('name', 'varchar', 256);
        	$table->addColumn('link', 'varchar', 256);
            $table->addColumn('display_order', 'int');
        });
	}
	public function uninstallStep1() {
		$this->schemaManager()->dropTable('xf_fss_sticked_items');
	}
}