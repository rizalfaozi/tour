<?php

use Faker\Factory as Faker;
use App\Models\villages;
use App\Repositories\villagesRepository;

trait MakevillagesTrait
{
    /**
     * Create fake instance of villages and save it in database
     *
     * @param array $villagesFields
     * @return villages
     */
    public function makevillages($villagesFields = [])
    {
        /** @var villagesRepository $villagesRepo */
        $villagesRepo = App::make(villagesRepository::class);
        $theme = $this->fakevillagesData($villagesFields);
        return $villagesRepo->create($theme);
    }

    /**
     * Get fake instance of villages
     *
     * @param array $villagesFields
     * @return villages
     */
    public function fakevillages($villagesFields = [])
    {
        return new villages($this->fakevillagesData($villagesFields));
    }

    /**
     * Get fake data of villages
     *
     * @param array $postFields
     * @return array
     */
    public function fakevillagesData($villagesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'subdistrict_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $villagesFields);
    }
}
