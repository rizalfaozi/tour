<?php

use Faker\Factory as Faker;
use App\Models\member;
use App\Repositories\memberRepository;

trait MakememberTrait
{
    /**
     * Create fake instance of member and save it in database
     *
     * @param array $memberFields
     * @return member
     */
    public function makemember($memberFields = [])
    {
        /** @var memberRepository $memberRepo */
        $memberRepo = App::make(memberRepository::class);
        $theme = $this->fakememberData($memberFields);
        return $memberRepo->create($theme);
    }

    /**
     * Get fake instance of member
     *
     * @param array $memberFields
     * @return member
     */
    public function fakemember($memberFields = [])
    {
        return new member($this->fakememberData($memberFields));
    }

    /**
     * Get fake data of member
     *
     * @param array $postFields
     * @return array
     */
    public function fakememberData($memberFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'first_name' => $fake->word,
            'last_name' => $fake->word,
            'age' => $fake->randomDigitNotNull,
            'phone' => $fake->word,
            'alternative_phone' => $fake->word,
            'address' => $fake->text,
            'email' => $fake->word,
            'id_card' => $fake->word,
            'passport_number' => $fake->word,
            'bank_account_number' => $fake->word,
            'departure_date' => $fake->word,
            'photo' => $fake->word,
            'visa_number' => $fake->word,
            'type' => $fake->word,
            'category_id' => $fake->randomDigitNotNull,
            'status' => $fake->randomDigitNotNull,
            'province_id' => $fake->randomDigitNotNull,
            'subdistrict_id' => $fake->randomDigitNotNull,
            'village_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $memberFields);
    }
}
