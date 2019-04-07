<?php

use Faker\Factory as Faker;
use App\Models\districts;
use App\Repositories\districtsRepository;

trait MakedistrictsTrait
{
    /**
     * Create fake instance of districts and save it in database
     *
     * @param array $districtsFields
     * @return districts
     */
    public function makedistricts($districtsFields = [])
    {
        /** @var districtsRepository $districtsRepo */
        $districtsRepo = App::make(districtsRepository::class);
        $theme = $this->fakedistrictsData($districtsFields);
        return $districtsRepo->create($theme);
    }

    /**
     * Get fake instance of districts
     *
     * @param array $districtsFields
     * @return districts
     */
    public function fakedistricts($districtsFields = [])
    {
        return new districts($this->fakedistrictsData($districtsFields));
    }

    /**
     * Get fake data of districts
     *
     * @param array $postFields
     * @return array
     */
    public function fakedistrictsData($districtsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'province_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $districtsFields);
    }
}
