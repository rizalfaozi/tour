<?php

use Faker\Factory as Faker;
use App\Models\roles;
use App\Repositories\rolesRepository;

trait MakerolesTrait
{
    /**
     * Create fake instance of roles and save it in database
     *
     * @param array $rolesFields
     * @return roles
     */
    public function makeroles($rolesFields = [])
    {
        /** @var rolesRepository $rolesRepo */
        $rolesRepo = App::make(rolesRepository::class);
        $theme = $this->fakerolesData($rolesFields);
        return $rolesRepo->create($theme);
    }

    /**
     * Get fake instance of roles
     *
     * @param array $rolesFields
     * @return roles
     */
    public function fakeroles($rolesFields = [])
    {
        return new roles($this->fakerolesData($rolesFields));
    }

    /**
     * Get fake data of roles
     *
     * @param array $postFields
     * @return array
     */
    public function fakerolesData($rolesFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $rolesFields);
    }
}
