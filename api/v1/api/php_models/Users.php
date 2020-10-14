<?php

use Base\Users as BaseUsers;

/**
 * Skeleton subclass for representing a row from the 'users' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Users extends BaseUsers
{

  public static function isUserSuperAdmin($result){

    $clientsQuery = ClientsQuery::create()->filterById($result['ClientId'])->find()->toArray();
    
    if(!$clientsQuery || count($clientsQuery) === 0){
      return false;
    }

    return $clientsQuery[0]['UserId'] == $result['Id'];

  }

  public static function injectIsSuperAdmin($results){
    foreach($results as &$result){
      $result['IsSuperAdmin'] = self::isUserSuperAdmin($result);
    }
    return $results;
  }

  public static function getMaxNumberOfUsers($result){

    $clientId = is_array($result) ? $result['ClientId'] : $result;

    $clientsQuery = ClientsQuery::create()->filterById($clientId)->find()->toArray();

    if(!$clientsQuery || count($clientsQuery) === 0){
      return 0;
    }

    $clientUserId = intval($clientsQuery[0]['UserId']);

    $subscriptionQuery = UsersSubscriptionsQuery::create()
                                                  ->filterByUserId($clientUserId)
                                                  // ->filterByStatus('active')
                                                  // ->orderByDateTimeCreated()
                                                  ->find()->toArray();

    if(!$subscriptionQuery || count($subscriptionQuery) === 0){
      return 0;
    }

    $package = $subscriptionQuery[0]['Package'];

    switch($package){
      case 'basic-plan': case 'basic-plan-trial':
        return 1;
      break;
      case 'bronze-plan': case 'bronze-plan-trial':
        return 5;
      break;
      case 'silver-plan': case 'silver-plan-trial':
        return 10;
      break;
      case 'platinum-plan': case 'platinum-plan-trial':
        return 15;
      break;
      case 'gold-plan': case 'gold-plan-trial':
        return 20;
      break;
    }

    return 0;

  }

  public static function getCurrentNumberOfUsers($result){

    $clientId = is_array($result) ? $result['ClientId'] : $result;

    $clientsQuery = ClientsQuery::create()->filterById($clientId)->find()->toArray();

    if(!$clientsQuery || count($clientsQuery) === 0){
      return 0;
    }

    $clientUserId = intval($clientsQuery[0]['UserId']);

    $clientUsersQuery = UsersQuery::create()->filterByClientId($clientId)->filterByStatus([ 'active', 'inactive' ])->find()->toArray();

    if(!$clientUsersQuery){
      return 0;
    }

    return count($clientUsersQuery);

  }

  public static function injectMaxNumberOfUsers($results){
    foreach($results as &$result){
      $result['MaxNumberOfUsers'] = self::getMaxNumberOfUsers($result);
    }
    return $results;
  }

  public static function getIsUserLimitReached($clientId, $tolerance = 0){

    return (self::getCurrentNumberOfUsers($clientId) - $tolerance) >= self::getMaxNumberOfUsers($clientId);

  }

}
