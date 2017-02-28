<?php
namespace App\Infrastructure\Repositories;

use App\Domain\Repositories\UploadRepositoryInterface;
use App\Infrastructure\Eloquents\Product;
use App\Infrastructure\Eloquents\ProductsPhoto;

class UploadRepository implements UploadRepositoryInterface
{
    /**
     * @var Product
     */
    protected $eloquent;

    public function __construct(Product $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function save($inputs)
    {
        $product = $this->eloquent->create($inputs);
        foreach ($inputs['photos'] as $photo) {
            $filename = $photo->store('photos');
            ProductsPhoto::create([
                'product_id' => $product->id,
                'filename' => $filename
            ]);
        }
    }
}