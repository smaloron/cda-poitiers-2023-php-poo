<?php

$qb = new QueryBuilder;

$qb->select("*")->from("table");

echo $qb->getSQL();