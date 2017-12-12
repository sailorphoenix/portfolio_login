<?php

/**
 * @file
 *
 * RouteSubscriber class to define new admin routes.
 */

namespace Drupal\portfolio_login\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Get config.
    $config = \Drupal::config('portfolio_login.settings');
    $user_path = $config->get('portfolio_user');

    // Change path '/user/login' to custom path.
    if ($route = $collection->get('user.login')) {
      $route->setPath($user_path['login']);
    }
    if ($route = $collection->get('user.page')) {
      $route->setPath($user_path['page']);
    }    
    if ($route = $collection->get('user.pass')) {
      $route->setPath($user_path['pass']);
    }
  }
}