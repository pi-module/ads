<?php
/**
 * Pi Engine (http://piengine.org)
 *
 * @link            http://code.piengine.org for the Pi Engine source repository
 * @copyright       Copyright (c) Pi Engine http://piengine.org
 * @license         http://piengine.org/license.txt BSD 3-Clause License
 */

/**
 * @author Hossein Azizabadi <azizabadi@faragostaresh.com>
 */

namespace Module\Ads\Installer\Action;

use Pi;
use Pi\Application\Installer\Action\Update as BasicUpdate;
use Pi\Application\Installer\SqlSchema;
use Zend\EventManager\Event;

class Update extends BasicUpdate
{
    /**
     * {@inheritDoc}
     */
    protected function attachDefaultListeners()
    {
        $events = $this->events;
        $events->attach('update.pre', [$this, 'updateSchema']);
        parent::attachDefaultListeners();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function updateSchema(Event $e)
    {
        $moduleVersion = $e->getParam('version');

        // Set propaganda model
        $propagandaModel   = Pi::model('propaganda', $this->module);
        $propagandaTable   = $propagandaModel->getTable();
        $propagandaAdapter = $propagandaModel->getAdapter();

        if (version_compare($moduleVersion, '1.3.0', '<')) {
            // Alter table field `type`
            $sql = sprintf("ALTER TABLE %s ADD `type` ENUM ('image', 'html', 'script') NOT NULL DEFAULT 'image'", $propagandaTable);
            try {
                $propagandaAdapter->query($sql, 'execute');
            } catch (\Exception $exception) {
                $this->setResult('db', [
                    'status'  => false,
                    'message' => 'Table alter query failed: '
                        . $exception->getMessage(),
                ]);
                return false;
            }
            // Alter table field `html`
            $sql = sprintf("ALTER TABLE %s ADD `html` TEXT", $propagandaTable);
            try {
                $propagandaAdapter->query($sql, 'execute');
            } catch (\Exception $exception) {
                $this->setResult('db', [
                    'status'  => false,
                    'message' => 'Table alter query failed: '
                        . $exception->getMessage(),
                ]);
                return false;
            }
            // Alter table field `script`
            $sql = sprintf("ALTER TABLE %s ADD `script` TEXT", $propagandaTable);
            try {
                $propagandaAdapter->query($sql, 'execute');
            } catch (\Exception $exception) {
                $this->setResult('db', [
                    'status'  => false,
                    'message' => 'Table alter query failed: '
                        . $exception->getMessage(),
                ]);
                return false;
            }
        }

        if (version_compare($moduleVersion, '1.3.2', '<')) {
            // Alter table field `type`
            $sql = sprintf("ALTER TABLE %s CHANGE `type` `type` ENUM('image','html','script','link') NOT NULL DEFAULT 'image'", $propagandaTable);
            try {
                $propagandaAdapter->query($sql, 'execute');
            } catch (\Exception $exception) {
                $this->setResult('db', [
                    'status'  => false,
                    'message' => 'Table alter query failed: '
                        . $exception->getMessage(),
                ]);
                return false;
            }
        }

        return true;
    }
}