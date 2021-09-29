<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuppliersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuppliersTable Test Case
 */
class SuppliersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SuppliersTable
     */
    protected $Suppliers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Suppliers',
        'app.Ingredients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Suppliers') ? [] : ['className' => SuppliersTable::class];
        $this->Suppliers = $this->getTableLocator()->get('Suppliers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Suppliers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SuppliersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test isName method
     *
     * @return void
     * @uses \App\Model\Table\SuppliersTable::isName()
     */
    public function testIsName(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
