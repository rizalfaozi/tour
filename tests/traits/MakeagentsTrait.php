<?php

use Faker\Factory as Faker;
use App\Models\agents;
use App\Repositories\agentsRepository;

trait MakeagentsTrait
{
    /**
     * Create fake instance of agents and save it in database
     *
     * @param array $agentsFields
     * @return agents
     */
    public function makeagents($agentsFields = [])
    {
        /** @var agentsRepository $agentsRepo */
        $agentsRepo = App::make(agentsRepository::class);
        $theme = $this->fakeagentsData($agentsFields);
        return $agentsRepo->create($theme);
    }

    /**
     * Get fake instance of agents
     *
     * @param array $agentsFields
     * @return agents
     */
    public function fakeagents($agentsFields = [])
    {
        return new agents($this->fakeagentsData($agentsFields));
    }

    /**
     * Get fake data of agents
     *
     * @param array $postFields
     * @return array
     */
    public function fakeagentsData($agentsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'role_id' => $fake->randomDigitNotNull,
            'password' => $fake->word,
            'email' => $fake->word,
            'phone' => $fake->word,
            'address' => $fake->text,
            'gender' => $fake->word,
            'type' => $fake->word,
            'status' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $agentsFields);
    }
}
