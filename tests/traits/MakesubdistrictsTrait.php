<?php

use Faker\Factory as Faker;
use App\Models\subdistricts;
use App\Repositories\subdistrictsRepository;

trait MakesubdistrictsTrait
{
    /**
     * Create fake instance of subdistricts and save it in database
     *
     * @param array $subdistrictsFields
     * @return subdistricts
     */
    public function makesubdistricts($subdistrictsFields = [])
    {
        /** @var subdistrictsRepository $subdistrictsRepo */
        $subdistrictsRepo = App::make(subdistrictsRepository::class);
        $theme = $this->fakesubdistrictsData($subdistrictsFields);
        return $subdistrictsRepo->create($theme);
    }

    /**
     * Get fake instance of subdistricts
     *
     * @param array $subdistrictsFields
     * @return subdistricts
     */
    public function fakesubdistricts($subdistrictsFields = [])
    {
        return new subdistricts($this->fakesubdistrictsData($subdistrictsFields));
    }

    /**
     * Get fake data of subdistricts
     *
     * @param array $postFields
     * @return array
     */
    public function fakesubdistrictsData($subdistrictsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'district_id' => $fake->randomDigitNotNull,
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $subdistrictsFields);
    }
}
