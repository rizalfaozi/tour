<?php

use Faker\Factory as Faker;
use App\Models\provinces;
use App\Repositories\provincesRepository;

trait MakeprovincesTrait
{
    /**
     * Create fake instance of provinces and save it in database
     *
     * @param array $provincesFields
     * @return provinces
     */
    public function makeprovinces($provincesFields = [])
    {
        /** @var provincesRepository $provincesRepo */
        $provincesRepo = App::make(provincesRepository::class);
        $theme = $this->fakeprovincesData($provincesFields);
        return $provincesRepo->create($theme);
    }

    /**
     * Get fake instance of provinces
     *
     * @param array $provincesFields
     * @return provinces
     */
    public function fakeprovinces($provincesFields = [])
    {
        return new provinces($this->fakeprovincesData($provincesFields));
    }

    /**
     * Get fake data of provinces
     *
     * @param array $postFields
     * @return array
     */
    public function fakeprovincesData($provincesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $provincesFields);
    }
}
