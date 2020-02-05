<?php

namespace Lof\HieuStudentManage\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('hieustudentmanage_studentinfo')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('hieustudentmanage_studentinfo')
            )
                ->addColumn(
                    'student_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'Student ID'
                )
                ->addColumn(
                    'name',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Name'
                )
                ->addColumn(
                    'address',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    400,
                    ['nullable' => false],
                    'Address'
                )
                ->addColumn(
                    'gender',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    null,
                    [
                        'nullable'=>false,
                        'default'=>'0'
                    ],
                    'Gender'
                )
                ->addColumn(
                    'dateofbirth',
                    \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
                    null,
                    ['nullable' => false],
                    'Date of Birth'
                )
                ->addColumn(
                    'phonenumber',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    11,
                    [
                        'nullable' => true
                    ],
                    'Phone Number'
                )
                ->setComment('Student Table')
                ->setOption('type', 'InnoDB');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('hieustudentmanage_studentinfo'),
                $setup->getIdxName(
                    $installer->getTable('hieustudentmanage_studentinfo'),
                    ['name', 'gender', 'phonenumber' , 'address', 'dateofbirth'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['name', 'gender', 'phonenumber' , 'address', 'dateofbirth'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}
