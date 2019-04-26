<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        // default
        if ('/default' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\DefaultController::index',  '_route' => 'default',);
        }

        // order_products
        if ('/order/products' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\OrderProductsController::index',  '_route' => 'order_products',);
        }

        if (0 === strpos($pathinfo, '/orders')) {
            // orders_index
            if ('/orders' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\OrdersController::index',  '_route' => 'orders_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_orders_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'orders_index'));
                }

                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_orders_index;
                }

                return $ret;
            }
            not_orders_index:

            // orders_new
            if ('/orders/new' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\OrdersController::new',  '_route' => 'orders_new',);
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_orders_new;
                }

                return $ret;
            }
            not_orders_new:

            // orders_show
            if (preg_match('#^/orders/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'orders_show']), array (  '_controller' => 'App\\Controller\\OrdersController::show',));
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_orders_show;
                }

                return $ret;
            }
            not_orders_show:

            // orders_edit
            if (preg_match('#^/orders/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'orders_edit']), array (  '_controller' => 'App\\Controller\\OrdersController::edit',));
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_orders_edit;
                }

                return $ret;
            }
            not_orders_edit:

            // orders_delete
            if (preg_match('#^/orders/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'orders_delete']), array (  '_controller' => 'App\\Controller\\OrdersController::delete',));
                if (!in_array($requestMethod, ['DELETE'])) {
                    $allow = array_merge($allow, ['DELETE']);
                    goto not_orders_delete;
                }

                return $ret;
            }
            not_orders_delete:

        }

        // getOrderSum
        if ('/get_order' === $pathinfo) {
            $ret = array (  '_controller' => 'App\\Controller\\OrderProductsController::getOrderSum',  '_route' => 'getOrderSum',);
            if (!in_array($canonicalMethod, ['GET'])) {
                $allow = array_merge($allow, ['GET']);
                goto not_getOrderSum;
            }

            return $ret;
        }
        not_getOrderSum:

        // partners
        if ('/partners' === $pathinfo) {
            return array (  '_controller' => 'App\\Controller\\PartnersController::index',  '_route' => 'partners',);
        }

        if (0 === strpos($pathinfo, '/products')) {
            // products_index
            if ('/products' === $trimmedPathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\ProductsController::index',  '_route' => 'products_index',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_products_index;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'products_index'));
                }

                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_products_index;
                }

                return $ret;
            }
            not_products_index:

            // products_new
            if ('/products/new' === $pathinfo) {
                $ret = array (  '_controller' => 'App\\Controller\\ProductsController::new',  '_route' => 'products_new',);
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_products_new;
                }

                return $ret;
            }
            not_products_new:

            // products_show
            if (preg_match('#^/products/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'products_show']), array (  '_controller' => 'App\\Controller\\ProductsController::show',));
                if (!in_array($canonicalMethod, ['GET'])) {
                    $allow = array_merge($allow, ['GET']);
                    goto not_products_show;
                }

                return $ret;
            }
            not_products_show:

            // products_edit
            if (preg_match('#^/products/(?P<id>[^/]++)/edit$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'products_edit']), array (  '_controller' => 'App\\Controller\\ProductsController::edit',));
                if (!in_array($canonicalMethod, ['GET', 'POST'])) {
                    $allow = array_merge($allow, ['GET', 'POST']);
                    goto not_products_edit;
                }

                return $ret;
            }
            not_products_edit:

            // products_delete
            if (preg_match('#^/products/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                $ret = $this->mergeDefaults(array_replace($matches, ['_route' => 'products_delete']), array (  '_controller' => 'App\\Controller\\ProductsController::delete',));
                if (!in_array($requestMethod, ['DELETE'])) {
                    $allow = array_merge($allow, ['DELETE']);
                    goto not_products_delete;
                }

                return $ret;
            }
            not_products_delete:

        }

        elseif (0 === strpos($pathinfo, '/_')) {
            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_twig_error_test']), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_wdt']), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_search_results']), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler']), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_router']), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception']), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception_css']), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

        }

        // index
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'App\\Controller\\DefaultController::index',  '_route' => 'index',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_index;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'index'));
            }

            return $ret;
        }
        not_index:

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
