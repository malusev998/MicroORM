<?php
namespace Dusan\PhpMvc\Database;


/**
 * Interface CustomUpdate
 * This interface should be applied to ModelOLD subclasses,
 * it will indicate to the that developer wants custom
 * update statement for the model
 *
 * @api
 * @author Dusan Malusev <dusan.998@outlook.com>
 * @example "../../docs/CustomUpdate.php"
 * @package Dusan\PhpMvc\Database
 */
interface CustomUpdate
{
    /**
     * SQL Update statement
     * @return string
     */
    public function setUpdate(): string;

    /**
     * Binding for the SQL Update statement
     * represented as key value pair
     * Key => Binding in the string
     * Value => Value that will be bound in prepared statement
     * @return array
     */
    public function setUpdateBindings(): array;
}
