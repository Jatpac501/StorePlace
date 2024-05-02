<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

/**
 * @OA\Tag(
 *     name="Product Management",
 *     description="API Endpoints of Product"
 * )
 */
/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="API документация",
 *         description="Описание",
 *         @OA\Contact(
 *             email="support@example.com"
 *         ),
 *     )
 * )
 */
class ProductApiController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/dashboard",
    *     summary="Получить список продуктов",
    *     @OA\Response(
    *         response=200,
    *         description="Успешный ответ",
    *         @OA\JsonContent(
    *             type="array",
    *             @OA\Items(
    *                  @OA\Property(property="id", type="integer", description="Уникальный идентификатор"),
    *                  @OA\Property(property="saler", type="integer", description="Идентификатор продавца"),
    *                  @OA\Property(property="imagesId", type="integer", description="Идентификатор изображения", nullable=true),
    *                  @OA\Property(property="name", type="string", description="Название товара"),
    *                  @OA\Property(property="price", type="integer", description="Цена товара"),
    *                  @OA\Property(property="priceOld", type="integer", description="Старая цена товара"),
    *                  @OA\Property(property="description", type="text", description="Описание товара"),
    *                  @OA\Property(property="certificate_path", type="string", description="Путь к файлу сертификата", maxLength=4096, nullable=true),
    *                  @OA\Property(property="created_at", type="string", format="date-time", description="Время создания записи"),
    *                  @OA\Property(property="updated_at", type="string", format="date-time", description="Время последнего обновления записи")
    *              )
    *         ),
    *     ),
    *     @OA\Response(
    *         response=400,
    *         description="Некорректный запрос",
    *     )
    * )
    */
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
