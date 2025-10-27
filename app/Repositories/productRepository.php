<?php

namespace App\Repositories;

use App\Dto\productDto;
use App\Models\product;

class productRepository extends BaseRepository
{
    /**
     * Create a new service instance.
     *
     * @return $reauest, $modal
     */
    public function __construct(product $model)
    {
        $this->setModel($model);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productDto $data)
    {
        $dataArray = $data->toArray();
        // $image = $dataArray['image'];

        // unset($dataArray['image']);

        $dataResult = $this->add($this->_model, $dataArray);

        // if ($image != null) {
        //     $imageUploaded = $this->uploadFile($image, $this->_imgPath);
        //     $dataResult->images()->create($imageUploaded);
        // }

        return true;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, productDto $data)
    {
        $result = $this->checkRecord($id);

        $dataArray = $data->toArray();
        return $result->update($dataArray);
    }
}
