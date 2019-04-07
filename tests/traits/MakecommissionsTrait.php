<?php

use Faker\Factory as Faker;
use App\Models\commissions;
use App\Repositories\commissionsRepository;

trait MakecommissionsTrait
{
    /**
     * Create fake instance of commissions and save it in database
     *
     * @param array $commissionsFields
     * @return commissions
     */
    public function makecommissions($commissionsFields = [])
    {
        /** @var commissionsRepository $commissionsRepo */
        $commissionsRepo = App::make(commissionsRepository::class);
        $theme = $this->fakecommissionsData($commissionsFields);
        return $commissionsRepo->create($theme);
    }

    /**
     * Get fake instance of commissions
     *
     * @param array $commissionsFields
     * @return commissions
     */
    public function fakecommissions($commissionsFields = [])
    {
        return new commissions($this->fakecommissionsData($commissionsFields));
    }

    /**
     * Get fake data of commissions
     *
     * @param array $postFields
     * @return array
     */
    public function fakecommissionsData($commissionsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'price' => $fake->word,
            'status' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $commissionsFields);
    }
}
