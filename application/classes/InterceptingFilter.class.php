<?php
namespace User;

interface InterceptingFilter
{
  public function run(Http $http, array $queryFields, array $formFields);
}
