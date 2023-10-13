<?php

namespace App\Swagger\Controllers;

# php artisan l5-swagger:generate

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Marketplace Platform Api",
 *      description="Marketplace platform for develope",
 *      @OA\Contact(
 *          email="alexandr.statut@instafxgroup.com",
 *          name="ASt"
 *      ),
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Dev API server"
 * )
 *
 *  @OA\SecurityScheme(
 *     type="http",
 *     description="Your token must be provided by Admin",
 *     name="Api Client",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
 * )
 *
 * @OA\ExternalDocumentation(
 *     description="Docs",
 *     url="https://shop/api/documentation",
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Auth in API"
 * )
 *
 * @OA\Tag(
 *     name="Categories",
 *     description="Product categories"
 * ),
 *
 * @OA\Tag(
 *     name="Products",
 *     description="Products"
 * ),
 *
 * @OA\Tag(
 *     name="Orders",
 *     description="Orders"
 * ),
 */
class Controller {}
