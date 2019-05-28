<?php

namespace Dusan\PhpMvc\Database\FluentApi;


use Dusan\PhpMvc\Database\Driver;

/**
 * Class Fluent
 * Simple SQL Generation tool with Fluent API Design Pattern
 * Fluent is activated by calling the query() method on DatabaseModel class
 * It supports INNER,LEFT and RIGHT Sql Joins, complex WHERE Statements, ORDER BY,
 * GROUP BY
 * Mysql syntax is only supported
 *
 * @package Dusan\PhpMvc\Database\FluentApi
 * @author  Dusan Malusev
 * @version 1.0
 */
interface FluentInterface
{
    /**
     * @api
     *
     * @param array $select
     *
     * @return $this
     */
    public function select($select = ['*']);

    public function selectDistinct($select = ['*']);

    /**
     * @return string
     * @internal
     */
    public function getSql(): string;

    /**
     * @api
     *
     * @param $column
     * @param $operator
     * @param $value
     *
     * @return Where
     */
    public function where($column, $operator, $value);

    /**
     * @api
     *
     * @param $column
     *
     * @return Where
     */
    public function whereNull($column);

    /**
     * @api
     *
     * @param $column
     *
     * @return Where
     */
    public function whereNotNull($column);

    /**
     * @api
     *
     * @param        $field
     * @param string $order
     *
     * @return $this
     */
    public function orderBy($field, $order = 'ASC');

    /**
     * @api
     *
     * @param $field
     *
     * @return Fluent
     */
    public function orderByDesc($field);

    /**
     * @api
     *
     * @param string $table reference table or class
     * @param null   $foreignKey
     *
     * @return Fluent
     * @throws \ReflectionException
     */
    public function innerJoin($table);

    /**
     * @api
     *
     * @param $items
     *
     * @return $this
     */
    public function limit($items);

    /**
     * @param      $table
     * @param null $foreignKey
     *
     * @return Fluent
     * @throws \ReflectionException
     */
    public function leftJoin($table);

    /**
     * @param      $table
     * @param null $foreignKey
     *
     * @return Fluent
     * @throws \ReflectionException
     */
    public function rightJoin($table, $foreignKey = NULL);

    public function groupBy(array $columns);

    /**
     * @param int $page
     * @param int $perPage
     *
     * @return $this
     */
    public function paginate(int $page, int $perPage);

    /**
     * Gets the data from database by previous called methods
     *
     * @return array
     * @throws \PDOException
     */
    public function get();

    public static function setDatabase(Driver $database);
}