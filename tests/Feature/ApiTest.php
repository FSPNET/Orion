<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * Arma 3 API Test
     *
     * @return void
     */
    public function testArma3ApiServer()
    {
        $this->get(route('api.arma3.server'))
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Arma 3 - server.cfg');
    }

    public function testArma3ApiNetwork()
    {
        $this->get(route('api.arma3.network'))
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Arma 3 - network.cfg');
    }

    public function testFactorioMapGen()
    {
        $this->get(route('api.factorio.mapgen'))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee('_generated_by');
    }

    public function testFactorioMap()
    {
        $this->get(route('api.factorio.map'))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertJsonStructure([
                'difficulty_settings',
                'pollution',
                'enemy_evolution',
                'enemy_expansion',
                'unit_group',
                'steering',
                'path_finder',
                'max_failed_behavior_count',
            ]);
    }

    public function testFactorioServer()
    {
        $this->post(route('api.factorio.server', ['name' => 'test']))
            ->assertOk()
            ->assertHeader('Content-Type', 'application/json')
            ->assertSee('_generated_by');
    }

    public function testMinecraftServer()
    {
        $this->get(route('api.minecraft.server'))
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Minecraft server properties');
    }

    public function testWarbandServer()
    {
        $this->post(route('api.warband',
            ['mod'            => 'native',
             'password_admin' => 'testpassword',
             'server_name'    => 'Orion_test',
             'mission'        => 'bt',
             'port'           => '7240',
            ]))
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Orion_test');
    }
}
